<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointment = Appointment::where('archived', 'No')->get();

        return view('portal.appointments.index', compact('appointment'));
    }




}
