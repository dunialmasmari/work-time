<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\tender;
use App\Models\Major;
use Illuminate\Support\Collection;
use validator;
use Carbon\Carbon;
use App\Models\job;
use App\Models\Advertising;
use App\Models\service;
use App\Models\blog;
use App\Events\StatusLiked;
use App\Events\AdminNotification;







class HomeController extends Controller
{
    public function viewHome()
    {
            $date=Carbon::today();
            $tenders=tender::where('active','1')
            ->where('deadline','>=',$date)
            ->where('start_date','<=',$date)
            ->orderByRaw('start_date DESC')
            ->paginate(4);
            
            $jobs=job::join('majors','jobs.major_id','=','majors.major_id')
            ->select('majors.major_name','jobs.*')
            ->where('jobs.active','1')
             ->where('jobs.deadline','>=',$date)
             ->where('jobs.start_date','<=',$date)
             ->orderByRaw('jobs.start_date DESC')
             ->paginate(4);

             $advers=Advertising::select('*')->where('active','1')->inRandomOrder()->get();
             $services =service::where('active','1')->get();
             $blogs=blog::where('active','1')->orderByRaw('created_at DESC')->get();


             //print_r($advers);
            
             $data=['tenders' => $tenders,
                   'jobs' => $jobs,
                   'advers'=>$advers,
                   'services'=>$services,
                   'blogs'=>$blogs,
                  ];

                  $dataevent1 =[
                    'user_name'  => 'haifaa nabeel',
                    'comment' => 'haifaa nabeel comment ',
               ];
               $dataevent =
                  [ 
                    'type'=>'add company',
                    'message'  => 'new message in your email',
                    'time' => $date,
                    'id'=>0,
                  ];
              event(new AdminNotification($dataevent)); 

              event(new StatusLiked($dataevent1));
        return view('HR.home',$data);
    }
}
