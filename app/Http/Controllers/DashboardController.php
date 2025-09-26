<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Enquiry;
use App\Models\User;
use App\Models\Appointment;

class DashboardController extends Controller
{
    public function index()
    {
        $current_hour = Carbon::now()->format('H');

            if($current_hour>=0 && $current_hour<=12)
            {
                $greeting = 'Good Morning';
            }
            elseif ($current_hour>=12 && $current_hour<=18)
            {
                $greeting = 'Good Afternoon';
            }
            elseif ($current_hour>=18 && $current_hour<=24) 
            {
                $greeting = 'Good Evening';
            }
            else{
                $greeting = 'Hello!';
            }

         $enquiry = Enquiry::where('archived', 'No')->count();
         $contact = Enquiry::where('archived', 'No')->where('page_type', 'contact')->count();

         $appointments = Appointment::where('archived', 'No')->count();
         $total_appointments = Appointment::where('archived', 'No')->count();
         $users = User::where('archived', 'No')->count();

        return view('portal.dashboard', compact('greeting', 'enquiry', 'appointments', 'contact', 'users', 'total_appointments'));



    }
}
