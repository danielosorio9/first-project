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

        // Another way that does the same:
        // session()->flash('message', 'Thanks for your message. We\'ll be in touch.');
        // return redirect('/contact');

        return redirect('/contact')->with('message', 'Thanks for your message. We\'ll be in touch.');
    }
}
