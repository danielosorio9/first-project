<?php

namespace App\Http\Controllers;

use App\Mail\ContactFomMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactFormController extends Controller
{
    public function create()
    {
        return view('contact.create');
    }

    public function store()
    {
        $data = request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        Mail::to('test@test.com')->send(new ContactFomMail($data));

        // It should show some thank you message instead of a redirect but it's for testing purposes
        return redirect('/contact');
    }
}
