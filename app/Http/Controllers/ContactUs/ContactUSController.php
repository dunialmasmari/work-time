<?php

namespace App\Http\Controllers\ContactUs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Mail\ContactUs\ContactUsMail;
use Mail;

class ContactUSController extends Controller
{

    public function viewContact()
    {
        return view('HR.contact');
    }
    public function sendEmail(Request $request)
    {
        $data=[
            'name' => $request->name,
            'message' => $request->message,
            'Email'=> $request->email,
        ];
        
        Mail::to('infoworktimeym@gmail.com')->send(new ContactUsMail($data));
        //return response()->json(['name' => $request->name,
        //'message' => $request->message,
        //'Email'=> $request->email,"message_sent" => "Your message has been sent successfully"],200);
        //return redirect()->back()->with(['success' => __('fields_web.apisuccessmesages.title')]);
        //return redirect()->route('contacthr')->withSuccess([__('fields_web.apisuccessmesages.title')]);//->with(['success' => __('fields_web.apisuccessmesages.title')]);
        return redirect()->route('contacthr')->with(['success' => __('fields_web.apisuccessmesages.title')]);
    //     Session::flash('success', 'Hello &nbsp;'.$data['name'].'&nbsp;Thank You for choosing us. Will reply to your query as soon as possible');

    // return redirect()->back();


    }
}
