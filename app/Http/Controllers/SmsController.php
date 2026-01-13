<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use App\Models\Contacts as ContactsModel;
use App\Models\Sms;

class SmsController extends Controller
{
    // View SMS Management list
    public function index()
    {
        $items = Sms::where('archived', 'No')->orderByDesc('id')->get();
        return view('portal.sms.index', compact('items'));
    }

    // Create a new SMS for sending and storing
    public function store(Request $request)
    {
        $validated = $request->validate([
            'message' => ['required', 'string', 'max:160'],
            'recipient_number' => ['required', 'string', 'max:20'],
            'send_type' => ['required', 'string', 'in:individual,bulk'],
        ]);

        // Create SMS record
        $sms = Sms::create([
            'sms_content' => $validated['message'],
            'recipient_number' => $validated['recipient_number'],
            'sms_type' => 'individual',
            'status' => 'pending',
            'archived' => 'No',
            'added_id' => Auth::user()->user_id ?? null,
            'added_date' => now(),
        ]);

        // dispatch SMS 
        $this->dispatchSms($validated['recipient_number'], $validated['message']);

        // Update status to delivered
        $sms->update(['status' => 'delivered']);

        return response()->json([
            'status' => 'success',
            'message' => 'SMS sent successfully',
            'sms_id' => $sms->id
        ]);
    }

    // Show a single SMS
    public function show(string $id)
    {
        $item = Sms::where('id', $id)->firstOrFail();
        return view('portal.sms.show', compact('item'));
    }

    // edit a single SMS
    public function edit(string $id)
    {
        $item = Sms::where('id', $id)->firstOrFail();
        return view('portal.sms.edit', compact('item'));
    }

    // Update a single SMS
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'sms_content' => ['required', 'string'],
            'recipient_number' => ['required', 'string', 'max:20'],
            'status' => ['nullable', 'string', 'max:50'],
        ]);

        $sms = Sms::where('id', $id)->firstOrFail();
        $sms->update([
            'sms_content' => $validated['sms_content'],
            'recipient_number' => $validated['recipient_number'],
            'status' => $validated['status'] ?? $sms->status,
        ]);

        return back()->with('status', 'SMS updated successfully');
    }

    // delete a single SMS
    public function destroy(string $id)
    {
        $sms = Sms::where('id', $id)->firstOrFail();
        $sms->update([
            'archived' => 'Yes',
            'archived_date' => now(),
            'archived_by' => Auth::user()->user_id ?? null,
            'status' => 'deleted',
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'SMS deleted successfully'
        ]);
    }

    // Send SMS to all contacts in a group
    public function sendToAllContacts(Request $request)
    {
        $validated = $request->validate([
            'message' => ['required', 'string', 'max:160'],
            'group' => ['nullable', 'string', 'max:100'],
        ]);

        $query = ContactsModel::where('archived', 'No');
        if (!empty($validated['group'])) {
            $query->where('telephone_group', $validated['group']);
        }
        $contacts = $query->pluck('telephone');

        $sent = 0;
        $failed = 0;

        foreach ($contacts as $tel) {
            try {
                // Create SMS record
                $sms = Sms::create([
                    'sms_content' => $validated['message'],
                    'recipient_number' => $tel,
                    'sms_type' => 'bulk',
                    'status' => 'pending',
                    'archived' => 'No',
                    'added_id' => Auth::user()->user_id ?? null,
                    'added_date' => now(),
                ]);

                // sens SMS sending
                $this->dispatchSms($tel, $validated['message']);
                
                // Update status to delivered (in real app, this would be updated by webhook/callback)
                $sms->update(['status' => 'delivered']);
                
                $sent++;
            } catch (\Exception $e) {
                $failed++;
            }
        }

        return Response::json([
            'status' => 'success', 
            'sent' => $sent,
            'failed' => $failed,
            'message' => "SMS sent to {$sent} contacts. {$failed} failed."
        ]);
    }

    // Get SMS statistics
    public function getStatistics()
    {
        $total = Sms::where('archived', 'No')->count();
        $delivered = Sms::where('archived', 'No')->where('status', 'delivered')->count();
        $notDelivered = Sms::where('archived', 'No')->where('status', '!=', 'delivered')->count();

        return response()->json([
            'total_sent' => $total,
            'delivered' => $delivered,
            'not_delivered' => $notDelivered,
        ]);
    }

    protected function dispatchSms(string $telephone, string $message): void
    {
            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://sms.nalosolutions.com/smsbackend/Resl_Nalo/send-message/',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>'{
                "key": "j1kch!t!zb4@stsx!xs67lf)0uhdo@6xdqbevwr8n5ji)h01(ztu7egtlrxkne6e",
                "msisdn": "233".$telephone,
                "message": $message,
                "sender_id": "WebEdge"
            }',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Accept: application/json',
            ),
            ));

        $response = curl_exec($curl);

        curl_close($curl);
        // echo $response;
        \Log::info("SMS sent to {$telephone}: {$message}");
    }
}
