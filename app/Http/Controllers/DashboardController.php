<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Enquiry;
use App\Models\User;
use App\Models\Appointment;
use App\Models\Contacts;
// use Illuminate\Support\Str;

class DashboardController extends Controller
{
    public function index()
    {
        
        $current_hour = Carbon::now()->format('H');
        $start = Carbon::now()->startOfMonth();
        $end = Carbon::now()->endOfMonth();

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

        $contact = Enquiry::where('archived', 'No')->where('page_type', 'contact')->count();

        $appointment_month = Appointment::where('archived', 'No')->where('appointment_date', [$start, $end])->count();

        $total_appointments = Appointment::where('archived', 'No')->count();

        $contacts = Contacts::where('archived', 'No')->count();
         
        $enquiry_month = Enquiry::where('archived', 'No')->where('added_date', [$start, $end])->count();

        $enquiry_total = Enquiry::where('archived', 'No')->count();

        $recent_enquiry = Enquiry::where('archived', 'No')->get();
        
        $users = User::where('archived', 'No')->paginate(5);

        return view('portal.dashboard', compact('users', 'contacts', 'recent_enquiry','greeting', 'appointment_month', 'contact', 'total_appointments', 'enquiry_month', 'enquiry_total'));    
    }

}
