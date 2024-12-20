<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    public function index(){
        return view('contact');
    }

    function post_message(Request $request){

        $request->validate([
            'email' => 'required|email'
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'subject' => $request->subject,
            'message' => $request->message


        ];

        Mail::to('kipdaniks@gmail.com')->send(new ContactFormMail($data));

        return redirect()->back()->with('msg', 'Thanks for contacting us. Your message has been sent successfully.');
    }

    public function test_view(){
        return view('contact_mail');
    }
}
