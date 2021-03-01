<?php

namespace App\Http\Controllers\ContactUs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Mail\ContactUs\ContactUsMail;
use Mail;
use Carbon\Carbon;
use  App\Models\RealTimeNotification;
use App\Events\AdminNotification;



class ContactUSController extends Controller
{

    public function viewContact()
    {

        /*$date=Carbon::today();
             $notify=RealTimeNotification::create([
                'type'=>5,
                'id_type'=>0,
                'see_it'=>0,
                'create_time'=>$date,
            ]); */
        

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
        /* add to notification  */
          $date=Carbon::today();
            $notify=RealTimeNotification::create([
                'type'=>'message',
                'id_type'=>0,
                'see_it'=>0,
                'create_time'=>$date,
            ]);
        
               
            $dataevent =
            [ 
              'type'=>'message',
              'message'  => 'new message in your email',
              'time' => $date,
              'id'=> 0
            ];
        event(new AdminNotification($dataevent)); 
        /* end add to notification  */

        //return response()->json(['name' => $request->name,
        //'message' => $request->message,
        //'Email'=> $request->email,"message_sent" => "Your message has been sent successfully"],200);
        //return redirect()->back()->with(['success' => __('fields_web.apisuccessmesages.title')]);
        //return redirect()->route('contacthr')->withSuccess([__('fields_web.apisuccessmesages.title')]);//->with(['success' => __('fields_web.apisuccessmesages.title')]);
        return redirect()->route('contacthr')->with(['success' => __('fields_web.apisuccessmesages.title')]);
         //Session::flash('success', 'Hello &nbsp;'.$data['name'].'&nbsp;Thank You for choosing us. Will reply to your query as soon as possible');

    // return redirect()->back();


    }
}
