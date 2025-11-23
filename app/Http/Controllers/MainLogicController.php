<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MainLogicController extends Controller
{
    public function submitContactForm(Request $request)
    {
        try {

            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'subject' => 'nullable|string|max:255',
                'phone_number' => 'nullable|digits_between:10,10',
                'message' => 'required|string',
            ]);
            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            Contact::create($request->only('name', 'email', 'subject', 'phone_number', 'message'));

            return redirect()->back()->with('success', 'Your message has been sent successfully!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'There was an error sending your message. Please try again later.');
        }
    }
}
