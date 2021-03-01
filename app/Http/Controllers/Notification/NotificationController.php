<?php

namespace App\Http\Controllers\Notification;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use validator;
use App\Models\tender;
use App\Models\Major;
use Carbon\Carbon;
use App\Models\job;
use App\Models\Advertising;
use App\Models\service;
use App\Models\blog;
use App\Events\StatusLiked;







class NotificationController extends Controller
{
    public function viewNotifications()
    {
        return view('admin.Notifications.notifications_list');

    }

    public function viewMessages()
    {
        return view('admin.Notifications.messages_list');

    }

    public function viewTender($id)
    {
        $tenders=tender::join('majors','tenders.major_id','=','majors.major_id')
        ->select('majors.major_name','tenders.*')
        ->where('tenders.tender_id', $id);
        $advers=Advertising::select('*')->where('active','1')->where('Advertising_Position','2')->get();

        if ($tenders->exists())
        {
            $tenders=$tenders->get();
            $data=['tenders' => $tenders,
                   'advers' => $advers,
                  ];
                  return view('admin.Notifications.postTender',$data);           
         } 
        else 
        {
        return response()->json(["message" => "Tender not found!"], 404);
        }

    }

    public function viewJob($id)
    {


        $date=Carbon::today();
        $jobs=job::join('majors','jobs.major_id','=','majors.major_id')
        ->select('majors.major_name','jobs.*')
        ->where('jobs.job_id', $id);
        
        $jobsAll=job::where('active','1')
        ->where('deadline','>=',$date)
        ->where('start_date','<=',$date)
        ->orderByRaw('start_date DESC')
        ->get();
        $advers=Advertising::select('*')->where('active','1')->where('Advertising_Position','2')->get();
        //$data=['jobs' => $jobs];
        
        if ($jobs->exists())
        {
            $jobs=$jobs->get();
            
            $data=['jobs' => $jobs,
                   'jobsAll' => $jobsAll,
                   'advers' => $advers,
                   ];
                   return view('admin.Notifications.postJob',$data);
                } 
        else 
        {
        return response()->json(["message" => "Job not found!"], 404);
        }

    }
}
