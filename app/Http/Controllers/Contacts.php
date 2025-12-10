<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use App\Models\Contacts as ContactsModel;

class Contacts extends Controller
{
    /**
     * List non-archived contacts for portal management.
     */
    public function index()
    {
        $contacts = ContactsModel::where('archived', 'No')->orderByDesc('id')->get();
        return view('portal.contacts.index', compact('contacts'));
    }

    /**
     * Create a new contact.
     *
     * Expects: telephone (required), telephone_group (optional).
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'telephone' => ['required', 'string', 'max:50'],
            'telephone_group' => ['nullable', 'string', 'max:100'],
        ]);

        // Insert contact
        ContactsModel::create([
            'telephone' => $validated['telephone'],
            'telephone_group' => $validated['telephone_group'] ?? null,
        ]);

        return back()->with('status', 'Contact added successfully');
    }

    /**
     * Show a single contact.
     */
    public function show(string $id)
    {
        $contact = ContactsModel::findOrFail($id);
        return view('portal.contacts.show', compact('contact'));
    }

    /**
     * Show edit form for a contact.
     */
    public function edit(string $id)
    {
        $contact = ContactsModel::findOrFail($id);
        return view('portal.contacts.edit', compact('contact'));
    }

    /**
     * Update contact details.
     *
     * Expects: telephone (required), telephone_group (optional).
     */
    public function update(Request $request, string $id)
    {
        $contact = ContactsModel::findOrFail($id);

        $validated = $request->validate([
            'telephone' => ['required', 'string', 'max:50'],
            'telephone_group' => ['nullable', 'string', 'max:100'],
        ]);

        // Persist changes
        $contact->update([
            'telephone' => $validated['telephone'],
            'telephone_group' => $validated['telephone_group'] ?? null,
        ]);

        return back()->with('status', 'Contact updated successfully');
    }

    /**
     * Soft-delete a contact by archiving.
     */
    public function destroy(string $id)
    {
        $contact = ContactsModel::findOrFail($id);
        $contact->archived = 'Yes';
        $contact->archived_date = now();
        $contact->archived_by = Auth::user()->user_id ?? '';
        $contact->save();

        return back()->with('status', 'Contact deleted successfully');
    }

    /**
     * Import contacts from CSV.
     *
     * File must be CSV with header row: telephone, telephone_group.
     */
    public function import(Request $request)
    {
        $request->validate([
            'file' => ['required', 'file', 'mimes:csv,txt'],
        ]);

        $path = $request->file('file')->getRealPath();

        // Read CSV, skip header, insert rows
        if (($handle = fopen($path, 'r')) !== false) {
            $row = 0;
            while (($data = fgetcsv($handle, 1000, ',')) !== false) {
                $row++;
                if ($row === 1) {
                    continue;
                }
                $telephone = $data[0] ?? null;
                $group = $data[1] ?? null;
                if ($telephone) {
                    ContactsModel::create([
                        'telephone' => trim($telephone),
                        'telephone_group' => $group ? trim($group) : null,
                    ]);
                }
            }
            fclose($handle);
        }

        return back()->with('status', 'Contacts imported successfully');
    }

    /**
     * Export contacts to CSV for Excel.
     *
     * Columns: telephone, telephone_group.
     */
    public function export()
    {
        $contacts = ContactsModel::where('archived', 'No')->orderBy('telephone_group')->orderBy('telephone')->get(['telephone', 'telephone_group']);

        $filename = 'contacts_' . now()->format('Ymd_His') . '.csv';
        $headers = [
            'Content-Type' => 'text/csv; charset=UTF-8',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ];

        // Stream CSV directly to client
        $callback = function () use ($contacts) {
            $output = fopen('php://output', 'w');
            fputcsv($output, ['telephone', 'telephone_group']);
            foreach ($contacts as $c) {
                fputcsv($output, [$c->telephone, $c->telephone_group]);
            }
            fclose($output);
        };

        return Response::stream($callback, 200, $headers);
    }
}
