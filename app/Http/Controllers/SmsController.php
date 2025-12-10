<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use App\Models\Contacts as ContactsModel;

class SmsController extends Controller
{
    // View SMS Management list
    public function index()
    {
        $items = DB::table('sms')->where('archived', 'No')->orderByDesc('id')->get();
        return view('portal.sms.index', compact('items'));
    }

    // Create a new SMS
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:200'],
            'message' => ['required', 'string'],
            'group' => ['nullable', 'string', 'max:100'],
        ]);

        DB::table('sms')->insert([
            'title' => $validated['title'],
            'message' => $validated['message'],
            'group' => $validated['group'] ?? null,
            'added_by' => Auth::user()->user_id ?? null,
            // 'created_at' => now(),
            // 'updated_at' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        return back()->with('status', 'SMS created successfully');
    }

    // Show a single SMS
    public function show(string $id)
    {
        $item = DB::table('sms')->where('id', $id)->firstOr(function(){ abort(404); });
        return view('portal.sms.show', compact('item'));
    }

    // edit a single SMS
    public function edit(string $id)
    {
        $item = DB::table('sms')->where('id', $id)->firstOr(function(){ abort(404); });
        return view('portal.sms.edit', compact('item'));
    }

    // Update a single SMS
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:200'],
            'message' => ['required', 'string'],
            'group' => ['nullable', 'string', 'max:100'],
            'status' => ['nullable', 'string', 'max:100'],
        ]);

        DB::table('sms')->where('id', $id)->update([
            'title' => $validated['title'],
            'message' => $validated['message'],
            'group' => $validated['group'] ?? null,
            'status' => $validated['status'] ?? 'Active',
            'updated_at' => now(),
        ]);

        return back()->with('status', 'SMS updated successfully');
    }

    // delete a single SMS
    public function destroy(string $id)
    {
        DB::table('sms')->where('id', $id)->update([
            'archived' => 'Yes',
            'archived_date' => now(),
            'archived_by' => Auth::user()->user_id ?? null,
            'status' => 'Inactive',
        ]);

        return back()->with('status', 'SMS deleted successfully');
    }

    // Send SMS to all contacts in a group
    public function sendToAllContacts(Request $request)
    {
        $validated = $request->validate([
            'message' => ['required', 'string'],
            'group' => ['nullable', 'string', 'max:100'],
        ]);

        $query = ContactsModel::where('archived', 'No');
        if (!empty($validated['group'])) {
            $query->where('telephone_group', $validated['group']);
        }
        $contacts = $query->pluck('telephone');

        $sent = 0;
        foreach ($contacts as $tel) {
            $this->dispatchSms($tel, $validated['message']);
            $sent++;
        }

        return Response::json(['status' => 'success', 'sent' => $sent]);
    }

    protected function dispatchSms(string $telephone, string $message): void
    {
        // integrate provider here; placeholder no-op
    }
}
