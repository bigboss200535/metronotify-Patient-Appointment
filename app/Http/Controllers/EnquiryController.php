<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Enquiry;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class EnquiryController extends Controller
{
    public function index()
    {
         // Example if you want to fetch all enquiries
        $enquiries = Enquiry::orderBy('enquiry_id', 'desc')->get();

        return response()->json([
            'status' => 'success',
            // 'data' => $enquiries
        ], 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'fullname'  => 'required|string|max:200',
            'telephone' => 'required|string|max:20',
            'email'     => 'nullable|email|max:150',
            'subject'   => 'nullable|string|max:200',
            'service'   => 'nullable|string|max:100',
            'message'   => 'required|string|min:3|max:255',
            'page_name' => 'nullable|string|min:3',
            'page_type' => 'nullable|string|min:3',
        ]);
       

       $enquiry = Enquiry::create([
            'fullname'   => $validated['fullname'] ?? null,
            'telephone'  => $validated['telephone'],
            'email'      => $validated['email'] ?? null,
            'subject'    => $validated['subject'] ?? null,
            'service'    => $validated['service'] ?? null,
            'message'    => $validated['message'],
            'page_name'  => $validated['page_name'] ?? null,
            'page_type'  => $validated['page_type'] ?? null,
            // 'type' => $validated['type'] ?? null,
            'status'     => 'Active',
            'archived'   => 'No',
        ]);

        return response()->json([
            'status'  => 'success',
            'message' => 'Enquiry submitted successfully!',
            // 'data'    => $enquiry
        ], 201);
    }

    public function bookappointment(Request $request)
    {

        $validated = $request->validate([
            'fullname'  => 'required|string|max:200',
            'email'     => 'nullable|email|max:150',
            'telephone' => 'required|string|max:20',
            'service'   => 'nullable|string|max:100',
            'message'   => 'required|string|min:3|max:255',
        ]);
       
       $appointment = Appointment::create([
            'fullname'   => $validated['fullname'],
            'telephone'  => $validated['telephone'],
            'email'      => $validated['email'] ?? null,
            'service'    => $validated['service'],
            'message'    => $validated['message'],
            'appointment_date'  => now(),
            'appointment_time'  => now(),
            'status'     => 'Active',
            'archived'   => 'No',
        ]);

        return response()->json([
            'status'  => 'success',
            'message' => 'Appointment submitted successfully!',
            'data' => $appointment,
        ], 201);
    }
}
