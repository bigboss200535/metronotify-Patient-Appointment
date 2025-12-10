<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Newsletter;

class NewsletterController extends Controller
{
    //
    public function newsletter_subscription(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        if (Newsletter::isSubscribed($request->email)) {
            return response()->json(['message' => 'Already subscribed.']);
        }

         $newsletter = Newsletter::create([
            'email' => $request->email,
            'date_added' => now(),
        ]);

        return response()->json(['message' => 'You have been subscribed!']);
    }
}
