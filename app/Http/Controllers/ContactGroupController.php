<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactGroup;
use App\Models\Contacts;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ContactsImport;

class ContactGroupController extends Controller
{
    // Display all contact groups
    public function index()
    {
        $groups = ContactGroup::with('addedBy')->active()->orderBy('group_name')->get();
        return view('portal.contact-groups.index', compact('groups'));
    }

    // Store a new contact group
    public function store(Request $request)
    {
        try {
            \Log::info('ContactGroup store request received', $request->all());
            
            $validated = $request->validate([
                'group_name' => ['required', 'string', 'max:100', 'unique:contact_groups,group_name'],
                'description' => ['nullable', 'string', 'max:500'],
            ]);

            \Log::info('Validated data:', $validated);

            $group = ContactGroup::create([
                'group_name' => $validated['group_name'],
                'description' => $validated['description'],
                'contact_count' => 0,
                'status' => 'Active',
                'added_id' => Auth::user()->user_id ?? null,
                'added_date' => now(),
                'archived' => 'No',
            ]);

            \Log::info('Contact group created:', $group->toArray());

            return response()->json([
                'status' => 'success',
                'message' => 'Contact group created successfully',
                'group' => $group
            ]);
        } catch (\Exception $e) {
            \Log::error('Error creating contact group: ' . $e->getMessage());
            
            return response()->json([
                'status' => 'error',
                'message' => 'Error creating contact group: ' . $e->getMessage()
            ], 500);
        }
    }

    // Show a specific contact group
    public function show($id)
    {
        $group = ContactGroup::with(['contacts' => function($query) {
            $query->where('archived', 'No')->orderBy('telephone');
        }])->findOrFail($id);
        
        return view('portal.contact-groups.show', compact('group'));
    }

    // Upload contacts to a group
    public function uploadContacts(Request $request, $id)
    {
        $request->validate([
            'file' => ['required', 'file', 'mimes:xlsx,xls,csv', 'max:10240'], // Max 10MB
        ]);

        $group = ContactGroup::findOrFail($id);
        $file = $request->file('file');
        
        try {
            // Import contacts
            $import = new ContactsImport($group->group_name);
            Excel::import($import, $file);
            
            // Update contact count
            $group->updateContactCount();
            
            return response()->json([
                'status' => 'success',
                'message' => "Successfully imported {$import->getRowCount()} contacts to {$group->group_name}",
                'imported_count' => $import->getRowCount(),
                'failed_count' => $import->getFailedCount(),
                'failed_rows' => $import->getFailedRows()
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error uploading file: ' . $e->getMessage()
            ], 500);
        }
    }

    // Get contacts for a specific group
    public function getContacts($id)
    {
        $group = ContactGroup::findOrFail($id);
        $contacts = $group->contacts()->where('archived', 'No')->get(['id', 'telephone']);
        
        return response()->json([
            'status' => 'success',
            'contacts' => $contacts
        ]);
    }

    // Delete a contact group
    public function destroy($id)
    {
        $group = ContactGroup::findOrFail($id);
        
        // Archive the group
        $group->update([
            'archived' => 'Yes',
            'archived_date' => now(),
            'archived_by' => Auth::user()->user_id ?? null,
            'status' => 'Inactive',
        ]);
        
        return response()->json([
            'status' => 'success',
            'message' => 'Contact group deleted successfully'
        ]);
    }

    // Get all groups for dropdown
    public function getAllGroups()
    {
        try {
            $groups = ContactGroup::where('status', 'Active')->orderBy('group_name')->get(['id', 'group_name', 'contact_count']);
            
            \Log::info('Contact groups loaded:', $groups->toArray());
            
            return response()->json([
                'status' => 'success',
                'groups' => $groups
            ]);
        } catch (\Exception $e) {
            \Log::error('Error loading contact groups: ' . $e->getMessage());
            
            return response()->json([
                'status' => 'error',
                'message' => 'Error loading contact groups: ' . $e->getMessage()
            ], 500);
        }
    }
}
