<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function contactSave(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'min:2', 'max:100'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'regex:/^[0-9]{10,15}$/'], // allows only numbers between 10-15 digits
            'message' => ['nullable', 'string', 'max:1000'],
        ]);
        $admin = User::find(1);
        $contact = Contact::create($request->all());
        Mail::to($admin->email)->send(new ContactMail($contact));
        return back()->with('success', 'Your message has sent successfully');
    }
}
