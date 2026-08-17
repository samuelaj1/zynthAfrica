<?php

namespace App\Http\Controllers;

use App\Jobs\SendOneSignalEmailJob;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){

        return view('index');

    }

    public function submitContact(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'organisation' => 'required|string|max:255',
            'phone' => 'nullable|string|max:50',
            'partnership_type' => 'required|in:sponsorship,strategic-partnership,investment,media-partnership,institutional-collaboration,other',
            'message' => 'required|string|max:5000',
        ]);

        $contact = (object) [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'organisation' => $validated['organisation'],
            'phone' => isset($validated['phone']) ? $validated['phone'] : null,
            'partnership_type' => $validated['partnership_type'],
            'message' => $validated['message'],
        ];

        $subject = 'New Partnership Enquiry - ZYNTH Africa';

        SendOneSignalEmailJob::dispatch(
            ['samuelagyekumhene@gmail.com','zynthafrica@outlook.com'],
            $subject,
            'emails.new_contact',
            [
                'contact' => $contact,
            ]
        );

        return back()->with(
            'success',
            'Thank you for your interest in partnering with ZYNTH Africa. Your enquiry has been sent successfully.'
        );
    }

}
