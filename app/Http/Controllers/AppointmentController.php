<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class AppointmentController extends Controller
{
    /**
     * Display a listing of non-archived appointments.
     *
     * Renders the portal appointments index with all active records.
     */
    public function index()
    {
        $appointment = Appointment::where('archived', 'No')->get();
        return view('portal.appointments.index', compact('appointment'));
    }

    /**
     * Show the form to create a new appointment.
     */
    public function create()
    {
        return view('portal.appointments.create');
    }

    /**
     * Persist a newly created appointment.
     *
     * Applies validation and sets audit/status fields.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'fullname' => ['required', 'string', 'max:150'],
            'email' => ['nullable', 'string', 'lowercase', 'email', 'max:255'],
            'telephone' => ['nullable', 'string', 'max:30'],
            'service' => ['nullable', 'string', 'max:100'],
            'message' => ['nullable', 'string'],
            'appointment_date' => ['nullable', 'date'],
            'appointment_time' => ['nullable', 'date'],
            'doctor_id' => ['nullable', 'string', 'max:50'],
            'appointment_status' => ['nullable', 'string', 'max:50'],
            'confirmation' => ['nullable', 'string', 'max:50'],
        ]);

        // Create the appointment record
        Appointment::create([
            'fullname' => $validated['fullname'],
            'email' => $validated['email'] ?? null,
            'telephone' => $validated['telephone'] ?? null,
            'service' => $validated['service'] ?? null,
            'message' => $validated['message'] ?? null,
            'appointment_date' => $validated['appointment_date'] ?? null,
            'appointment_time' => $validated['appointment_time'] ?? null,
            'doctor_id' => $validated['doctor_id'] ?? null,
            'appointment_status' => $validated['appointment_status'] ?? null,
            'confirmation' => $validated['confirmation'] ?? null,
            'status' => 'Active',
            'archived' => 'No',
            'added_id' => Auth::user()->user_id ?? null,
            'added_date' => now(),
        ]);

        return back()->with('status', 'Appointment created successfully');
    }

    /**
     * Display a single appointment.
     */
    public function show(string $appointment_id)
    {
        $appointment = Appointment::findOrFail($appointment_id);
        return view('portal.appointments.show', compact('appointment'));
    }

    /**
     * Show the edit form for an appointment.
     */
    public function edit(string $appointment_id)
    {
        $appointment = Appointment::findOrFail($appointment_id);
        return view('portal.appointments.edit', compact('appointment'));
    }

    /**
     * Update an existing appointment.
     *
     * Only provided fields are changed; tracks updater.
     */
    public function update(Request $request, string $appointment_id)
    {
        $appointment = Appointment::findOrFail($appointment_id);

        $validated = $request->validate([
            'fullname' => ['nullable', 'string', 'max:150'],
            'email' => ['nullable', 'string', 'lowercase', 'email', 'max:255'],
            'telephone' => ['nullable', 'string', 'max:30'],
            'service' => ['nullable', 'string', 'max:100'],
            'message' => ['nullable', 'string'],
            'appointment_date' => ['nullable', 'date'],
            'appointment_time' => ['nullable', 'date'],
            'doctor_id' => ['nullable', 'string', 'max:50'],
            'appointment_status' => ['nullable', 'string', 'max:50'],
            'confirmation' => ['nullable', 'string', 'max:50'],
            'status' => ['nullable', 'string', 'max:100'],
        ]);

        // Update mutable fields and audit info
        $appointment->update([
            'fullname' => $validated['fullname'] ?? $appointment->fullname,
            'email' => $validated['email'] ?? $appointment->email,
            'telephone' => $validated['telephone'] ?? $appointment->telephone,
            'service' => $validated['service'] ?? $appointment->service,
            'message' => $validated['message'] ?? $appointment->message,
            'appointment_date' => $validated['appointment_date'] ?? $appointment->appointment_date,
            'appointment_time' => $validated['appointment_time'] ?? $appointment->appointment_time,
            'doctor_id' => $validated['doctor_id'] ?? $appointment->doctor_id,
            'appointment_status' => $validated['appointment_status'] ?? $appointment->appointment_status,
            'confirmation' => $validated['confirmation'] ?? $appointment->confirmation,
            'status' => $validated['status'] ?? $appointment->status,
            'updated_by' => Auth::user()->user_id ?? $appointment->updated_by,
        ]);

        return back()->with('status', 'Appointment updated successfully');
    }

    /**
     * Soft-delete an appointment by archiving it.
     */
    public function destroy(string $appointment_id)
    {
        $appointment = Appointment::findOrFail($appointment_id);

        // Mark record as archived instead of hard delete
        $appointment->archived = 'Yes';
        $appointment->archived_date = now();
        $appointment->archived_by = Auth::user()->user_id ?? null;
        $appointment->status = 'Inactive';
        $appointment->save();

        return back()->with('status', 'Appointment deleted successfully');
    }
}
