<?php

namespace App\Http\Controllers\Notification;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
//use validator;
use App\Models\tender;
use App\Models\Major;
use Carbon\Carbon;
use App\Models\job;
use App\Models\Advertising;
use App\Models\service;
use App\Models\blog;
use App\Events\StatusLiked;
use Illuminate\Support\Facades\Validator;
use App\Models\interstedTendersJob;



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
        $advers=Advertising::select('*')->where('active','1')->inRandomOrder()->get();

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
        $advers=Advertising::select('*')->where('active','1')->inRandomOrder()->get();
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
    public function viewCreatNotify()
    {
        $majorTender=Major::where('type','1')->where('active','1')->get();
        $majorJob=Major::where('type','0')->where('active','1')->get();
        $majors = Major::where('active','1')->get();
        $data=['majors' => $majors,
               'majorTender' =>$majorTender,
               'majorJob' =>$majorJob,
              ];
        return view('HR.createNotifaction',$data);

    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'type' => ['required'],
            'major_id' => ['required'],
            
        ]);
    }



    public function createNotification(Request $request)
    { 
             $this->validator($request->all())->validate();

             
             $interstedTendersJob = interstedTendersJob::create([
                'name' => $request->name,
                'email' => $request->email,
                'type' => $request->type,
                'major_id' => $request->major_id,
              ]);
              //return Redirect()->back()->with(['message' => 'The Message']);
              /* session()->flash('success', __('fields_web.apisuccessmesages.title'));
               return redirect()->back(); */
             // return redirect()->back()->with(['success' => __('fields_web.apisuccessmesages.title')]);

             /* $majors = Major::where('active','1')->get();
             $data=['majors' => $majors,
                   
                   ];
        return view('HR.createNotifaction',$data);
 */
    }

    public function getall()
    {
        
        //return response()->json($data,200);
        }

        public function adminNotifications($data)
        {
            $notify=RealTimeNotification::create([
                'type'=>$data['type'],
                'id_type'=>$data['id_type'],
                'see_it'=>$data['see_it'],
                'create_time'=>$data['create_time'],
            ]);
        }
}
