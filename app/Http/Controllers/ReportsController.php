<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use App\Models\Appointment;
use App\Models\User;
use App\Models\Sms;
use App\Models\Enquiry;
use App\Models\Contacts as ContactsModel;

class ReportsController extends Controller
{
    public function appointments()
    {
        // generate appointment reports
        $active = Appointment::where('archived', 'No')->count();
        $archived = Appointment::where('archived', 'Yes')->count();
        $upcoming5 = Appointment::where('archived', 'No')
            ->whereBetween('appointment_date', [now()->startOfDay(), now()->addDays(5)->endOfDay()])
            ->count();
        $byStatus = Appointment::select('appointment_status', DB::raw('count(*) as count'))
            ->where('archived', 'No')
            ->groupBy('appointment_status')
            ->get();

        return response()->json([
            'active' => $active,
            'archived' => $archived,
            'upcoming_5_days' => $upcoming5,
            'by_status' => $byStatus,
        ]);
    }

    // generate user reports
    public function users()
    {
        $active = User::where('status', 'Active')->where('archived', 'No')->count();
        $inactive = User::where('status', 'Inactive')->where('archived', 'No')->count();
        $blocked = User::where('is_blocked', true)->where('archived', 'No')->count();
        $archived = User::where('archived', 'Yes')->count();

        return response()->json([
            'active' => $active,
            'inactive' => $inactive,
            'blocked' => $blocked,
            'archived' => $archived,
        ]);
    }

    public function enquiries()
    {
        $active = Enquiry::where('status', 'Active')->where('archived', 'No')->count();
        $archived = Enquiry::where('archived', 'Yes')->count();
        $unread = Enquiry::where('read_status', 'No')->where('archived', 'No')->count();
        $replied = Enquiry::where('replied', 'Yes')->where('archived', 'No')->count();

        return response()->json([
            'active' => $active,
            'archived' => $archived,
            'unread' => $unread,
            'replied' => $replied,
        ]);
    }

    public function contacts()
    {
        $active = ContactsModel::where('archived', 'No')->count();
        $archived = ContactsModel::where('archived', 'Yes')->count();
        $byGroup = ContactsModel::select('telephone_group', DB::raw('count(*) as count'))
            ->where('archived', 'No')
            ->groupBy('telephone_group')
            ->orderBy('count', 'desc')
            ->get();

        return response()->json([
            'active' => $active,
            'archived' => $archived,
            'by_group' => $byGroup,
        ]);
    }
  
    // 
    public function sms()
    {
        $active = Sms::where('archived', 'No')->count();
        $archived = Sms::where('archived', 'Yes')->count();
        $byGroup = DB::table('sms')
            ->select('group', DB::raw('count(*) as count'))
            ->where('archived', 'No')
            ->groupBy('group')
            ->orderBy('count', 'desc')
            ->get();

        return response()->json([
            'active' => $active,
            'archived' => $archived,
            'by_group' => $byGroup,
        ]);
    }
}
