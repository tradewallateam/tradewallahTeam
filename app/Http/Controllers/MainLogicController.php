<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainLogicController extends Controller
{
    public function submitContactForm(Request $request)
    {
        try {
            // Validate the incoming request data
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'subject' => 'nullable|string|max:255',
                'message' => 'required|string',
            ]);

            // Store the contact message in the database
            \App\Models\Contact::create($validatedData);

            // Redirect back with a success message
            return redirect()->back()->with('success', 'Your message has been sent successfully!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'There was an error sending your message. Please try again later.');
        }
    }
}
