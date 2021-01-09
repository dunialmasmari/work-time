<?php

namespace App\Http\Controllers\ContactUs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Mail\ContactUs\ContactUsMail;
use Mail;

class ContactUSController extends Controller
{
    public function sendEmail(Request $request)
    {
        
     
        $data=[
            'name' => $request->name,
            'message' => $request->message,
            'Email'=> $request->email,
        ];
        
        Mail::to('infoworktime.com@gmail.com')->send(new ContactUsMail($data));
        return response()->json(['name' => $request->name,
        'message' => $request->message,
        'Email'=> $request->email,"message_sent" => "Your message has been sent successfully"],200);

    }
}
