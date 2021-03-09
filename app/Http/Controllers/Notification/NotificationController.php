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
use Illuminate\Support\Facades\Auth;
use App\Models\role_user;
use App\Models\RealTimeNotification;
use App\User;
use App\Models\compnyInfo;
use App\Mail\Notifies\NotifyEmailAcceptUser;
use App\Mail\Notifies\NotifyEmailRejectUser;
use Mail;




class NotificationController extends Controller
{
    public function viewNotifications()
    {
        $user_id = auth()->user()->user_id;
        $role_users= role_user::select()->where('user_id',$user_id)->get();
        foreach($role_users as $role_user)
        if($role_user->role_id == 1 || $role_user->role_id == 8)
        {
            $notifications=RealTimeNotification::where('type','!=','message')->get();

             $data=[
                'role_users' => $role_users,
                'notifications' => $notifications,
             ];
            return view('admin.Notifications.notifications_list',$data);
        }
        else
        {
            return response()->json(['message' => 'You do not have permation '], 404);   
        }
        //return view('admin.Notifications.notifications_list');

    }
    public function readNotifcations($id)
    {
        $notRead=RealTimeNotification::where('id',$id)
                    ->Update(['see_it' => '0']);

            return redirect()->route('Notifications');
    }

    public function notreadNotifcations($id)
    {
        $notRead=RealTimeNotification::where('id',$id)
                    ->Update(['see_it' => '1']);

            return redirect()->route('Notifications');
    }

    public function notReadNotification($type,$id)
    {
        if($type == 'add-company')
        {
            $notRead=RealTimeNotification::where('type',$type)->where('id_type',$id)
                    ->Update(['see_it' => '0']);

            return redirect()->route('Companies');
        }
        if($type == 'post-job')
        {
            $notRead=RealTimeNotification::where('type',$type)->where('id_type',$id)
                    ->Update(['see_it' => '0']);

            return redirect()->route('JobsPosting');
        }
        if($type == 'post-tender')
        {
            $notRead=RealTimeNotification::where('type',$type)->where('id_type',$id)
                    ->Update(['see_it' => '0']);

            return redirect()->route('TendersPosting');
        }
        if($type == 'message')
        {
            $notRead=RealTimeNotification::where('type','message')
                   ->where('id',$id)
                   ->Update(['see_it' => '0']);

            return redirect()->route('Messages');
        }
    }

    public function viewMessages()
    {
        $user_id = auth()->user()->user_id;
        $role_users= role_user::select()->where('user_id',$user_id)->get();
        foreach($role_users as $role_user)
        if($role_user->role_id == 1 || $role_user->role_id == 8)
        {
            $notifications=RealTimeNotification::where('type','message')->get();

            $data=[
               'role_users' => $role_users,
               'notifications' => $notifications,
            ];
            return view('admin.Notifications.messages_list',$data);
        }
        else
        {
            return response()->json(['message' => 'You do not have permation '], 404);   
        }
        //return view('admin.Notifications.messages_list');

    }

    public function viewMessageDetails($id)
    {
        $user_id = auth()->user()->user_id;
        $role_users= role_user::select()->where('user_id',$user_id)->get();
        foreach($role_users as $role_user)
        if($role_user->role_id == 1 || $role_user->role_id == 8)
        {

            $notifications=RealTimeNotification::where('type','message')->where('id',$id)->get();

            $readNotification=RealTimeNotification::where('type','message')
            ->where('id',$id);
             if ($readNotification->exists())
                {
                   $readNotification=RealTimeNotification::where('type','message')
                   ->where('id',$id)
                   ->Update(['see_it' => '1']);
                   $data=[
                    'role_users' => $role_users,
                    'notifications' => $notifications,
                 ];
                   return view('admin.Notifications.message',$data);

                }        
        }
        else
        {
            return response()->json(['message' => 'You do not have permation '], 404);   
        }
        //return view('admin.Notifications.messages_list');

    }

    public function viewTender($id)
    {
        $user_id = auth()->user()->user_id;
        $role_users= role_user::select()->where('user_id',$user_id)->get();
        foreach($role_users as $role_user)
        if($role_user->role_id == 1 || $role_user->role_id == 8)
        {
            //$blogs = blog::get();
            //return view('admin.Notifications.messages_list',['role_users' => $role_users]);
            $tenders=tender::join('majors','tenders.major_id','=','majors.major_id')
            ->select('majors.major_name','tenders.*')
            ->where('tenders.tender_id', $id);
            $advers=Advertising::select('*')->where('active','1')->inRandomOrder()->get();

             if ($tenders->exists())
            {
                  $tenders=$tenders->get();
                      $data=['tenders' => $tenders,
                             'advers' => $advers,
                             'role_users' => $role_users,
                        ];
                     return view('admin.Notifications.postTender',$data);           
            } 
            else 
             {
                    return response()->json(["message" => "Tender not found!"], 404);
              }
        }
        else
        {
            return response()->json(['message' => 'You do not have permation '], 404);   
        }


        /* $tenders=tender::join('majors','tenders.major_id','=','majors.major_id')
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
        } */

    }

    public function viewJob($id)
    {
        $user_id = auth()->user()->user_id;
        $role_users= role_user::select()->where('user_id',$user_id)->get();
        foreach($role_users as $role_user)
        if($role_user->role_id == 1 || $role_user->role_id == 8)
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
                        'role_users' => $role_users,
                        ];
                        return view('admin.Notifications.postJob',$data);
                     } 
             else 
             {
             return response()->json(["message" => "Job not found!"], 404);
             }
            }
         else
          {
           return response()->json(['message' => 'You do not have permation '], 404);   
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
            'email' => ['required', 'string', 'email', 'max:255'],
            'type' => ['required'],
            'major_id' => ['required'],

            
        ]);
    }



    public function createNotification(Request $request)
    { 
             $this->validator($request->all())->validate(); 
             $user_info=interstedTendersJob::where('email',$request->email);
             if($user_info->exists())
             {
               // dd( $request); 
               $user_info->Update([
                  'name' => $request->name,
                  'user_id' => '0',
                  'email' => $request->email,
                  'type' => $request->type,
                  'major_id' =>  implode(",",  $request->major_id),
                ]);
              //  return redirect()->route('userProfile');
          
  
            }
            else{
             $interstedTendersJob = interstedTendersJob::create([
                'name' => $request->name,
                'user_id' => '0',
                'email' => $request->email,
                'type' => $request->type,
                'major_id' =>  implode(",",  $request->major_id),
              ]);
             }
              return redirect()->route('homehr');
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

        public function viewNewCompany()
        {
            $user_id = auth()->user()->user_id;
            $role_users= role_user::select()->where('user_id',$user_id)->get();
            foreach($role_users as $role_user)
            if($role_user->role_id == 1 || $role_user->role_id == 8)
            {
                $users = User::join('role_users', 'users.user_id', '=', 'role_users.user_id')
                   ->join('compnyinfo', 'users.user_id', '=', 'compnyinfo.user_id')
                   ->select('users.*', 'compnyinfo.*', 'role_users.role_id')
                   ->where('compnyinfo.active', '2')
                   ->where('users.active', '2')
                   ->where('role_users.role_id', '5')
                   ->orwhere('role_users.role_id', '6')
                   ->orwhere('role_users.role_id', '7')
                   ->get();
                   $data=[
                          'users' => $users,
                          'role_users' => $role_users
                   ];
                return view('admin.Notifications.CompanyUser_list',$data);
            }
            else
            {
                return response()->json(['message' => 'You do not have permation '], 404);   
            }
            //return view('admin.Notifications.notifications_list');
    
        }

        public function acceptAccount($id)
        {
            $user_id = auth()->user()->user_id;
            $role_users= role_user::select()->where('user_id',$user_id)->get();
            foreach($role_users as $role_user)
            if($role_user->role_id == 1 || $role_user->role_id == 8)
            {
                $user = User::join('compnyinfo', 'users.user_id', '=', 'compnyinfo.user_id')
               ->where('users.user_id', $id)
               ->where('users.active','2')
               ->where('compnyinfo.active','2');
                 if ($user->exists())
                 {   

                    $user = User::join('compnyinfo', 'users.user_id', '=', 'compnyinfo.user_id')
                    ->where('users.user_id', $id)
                    ->Update(['users.active' => '1', 'compnyinfo.active' => '1']);
                    /**/                         
                    $userAcceptname = User::select('name')->where('user_id', $id)->get();
                    $userAcceptemail = User::select('email')->where('user_id', $id)->get();
                       //dd($userAcceptname);
                     $dataEmail=[
                        'Name' => $userAcceptname,
                        'Email'=> $userAcceptemail,
                       ];
                       Mail::to($userAcceptemail)->send(new NotifyEmailAcceptUser($dataEmail));

                    return redirect()->back()->with(['success' => __('fields_web.apisuccessmesages.title')]);
                 

                }

                 else 
                 {
                 return response()->json(["message" => "Account not found!"], 404);
                 }


            }
            else
            {
                return response()->json(['message' => 'You do not have permation '], 404);   
            }
        }

        public function rejectAccount($id)
        {
            $user_id = auth()->user()->user_id;
            $role_users= role_user::select()->where('user_id',$user_id)->get();
            foreach($role_users as $role_user)
            if($role_user->role_id == 1 || $role_user->role_id == 8)
            {
                $user = User::join('compnyinfo', 'users.user_id', '=', 'compnyinfo.user_id')
               ->where('users.user_id', $id)
               ->where('users.active','2')
               ->where('compnyinfo.active','2');
                 if ($user->exists())
                 {
                    $user = User::join('compnyinfo', 'users.user_id', '=', 'compnyinfo.user_id')
                    ->where('users.user_id', $id)
                    ->Update(['users.active' => '3', 'compnyinfo.active' => '3']);

                    $userAcceptname = User::select('name')->where('user_id', $id)->get();
                    $userAcceptemail = User::select('email')->where('user_id', $id)->get();
                       //dd($userAcceptname);
                     $dataEmail=[
                        'Name' => $userAcceptname,
                        'Email'=> $userAcceptemail,
                       ];
                       Mail::to($userAcceptemail)->send(new NotifyEmailRejectUser($dataEmail));
                   
                     return redirect()->back()->with(['success' => __('fields_web.apisuccessmesages.title')]);
                 }

                 else 
                 {
                 return response()->json(["message" => "Job not found!"], 404);
                 }


            }
            else
            {
                return response()->json(['message' => 'You do not have permation '], 404);   
            }
        }


        public function viewNewJobs()
        {
            $user_id = auth()->user()->user_id;
            $role_users= role_user::select()->where('user_id',$user_id)->get();
            foreach($role_users as $role_user)
            if($role_user->role_id == 1 || $role_user->role_id == 8)
            {
                //$users = User::join('role_users', 'users.user_id', '=', 'role_users.user_id')
                $jobs = Job::join('majors', 'jobs.major_id', '=', 'majors.major_id')
                        ->select('majors.major_name', 'jobs.*' )
                        ->where('jobs.active', '2')
                        ->get();
                $usersAll=User::select('user_id','name')->get();
                $date=Carbon::today();
                $dateTodays=['today'=> $date];
                   $data=[
                          'jobs' => $jobs,
                          'role_users' => $role_users,
                          'usersAll'=> $usersAll,
                          'dateTodays'=>$dateTodays,
                   ];
                   //return response()->json($data);
                return view('admin.Notifications.posting_jobs_list',$data);
            }
            else
            {
                return response()->json(['message' => 'You do not have permation '], 404);   
            }
            //return view('admin.Notifications.notifications_list');
    
        }

        public function acceptJob($id)
        {
            $user_id = auth()->user()->user_id;
            $role_users= role_user::select()->where('user_id',$user_id)->get();
            foreach($role_users as $role_user)
            if($role_user->role_id == 1 || $role_user->role_id == 8)
            {
                $jobs = Job::join('majors', 'jobs.major_id', '=', 'majors.major_id')
                        ->where('jobs.job_id', $id)
                        ->where('jobs.active', '2');
                
                 if ($jobs->exists())
                 {
                    $jobs = Job::join('majors', 'jobs.major_id', '=', 'majors.major_id')
                    ->where('jobs.job_id', $id)
                    ->Update(['jobs.active' => '1']);
                   
                     return redirect()->back()->with(['success' => __('fields_web.apisuccessmesages.title')]);
                 }

                 else 
                 {
                 return response()->json(["message" => "Account not found!"], 404);
                 }


            }
            else
            {
                return response()->json(['message' => 'You do not have permation '], 404);   
            }
        }

        public function rejectJob($id)
        {
            $user_id = auth()->user()->user_id;
            $role_users= role_user::select()->where('user_id',$user_id)->get();
            foreach($role_users as $role_user)
            if($role_user->role_id == 1 || $role_user->role_id == 8)
            {
                $jobs = Job::join('majors', 'jobs.major_id', '=', 'majors.major_id')
                        ->where('jobs.job_id', $id)
                        ->where('jobs.active', '2');
                
                 if ($jobs->exists())
                 {
                    $jobs = Job::join('majors', 'jobs.major_id', '=', 'majors.major_id')
                    ->where('jobs.job_id', $id)
                    ->Update(['jobs.active' => '3']);
                   
                     return redirect()->back()->with(['success' => __('fields_web.apisuccessmesages.title')]);
                 }

                 else 
                 {
                 return response()->json(["message" => "Job not found!"], 404);
                 }


            }
            else
            {
                return response()->json(['message' => 'You do not have permation '], 404);   
            }
        }

        public function viewNewTenders()
        {
            $user_id = auth()->user()->user_id;
            $role_users= role_user::select()->where('user_id',$user_id)->get();
            foreach($role_users as $role_user)
            if($role_user->role_id == 1 || $role_user->role_id == 8)
            {
                //$users = User::join('role_users', 'users.user_id', '=', 'role_users.user_id')
                $tenders = tender::join('majors', 'tenders.major_id', '=', 'majors.major_id')
                        ->select('majors.major_name', 'tenders.*' )
                        ->where('tenders.active', '2')
                        ->get();
                $usersAll=User::select('user_id','name')->get();
                $date=Carbon::today();
                $dateTodays=['today'=> $date];
                   $data=[
                          'tenders' => $tenders,
                          'role_users' => $role_users,
                          'usersAll'=> $usersAll,
                          'dateTodays'=>$dateTodays,
                   ];
                   //return response()->json($data);
                return view('admin.Notifications.posting_tenders_list',$data);
            }
            else
            {
                return response()->json(['message' => 'You do not have permation '], 404);   
            }
            //return view('admin.Notifications.notifications_list');
    
        }

        public function acceptTender($id)
        {
            $user_id = auth()->user()->user_id;
            $role_users= role_user::select()->where('user_id',$user_id)->get();
            foreach($role_users as $role_user)
            if($role_user->role_id == 1 || $role_user->role_id == 8)
            {
                $tenders = tender::join('majors', 'tenders.major_id', '=', 'majors.major_id')
                        ->where('tenders.tender_id', $id)
                        ->where('tenders.active', '2');
                
                 if ($tenders->exists())
                 {
                    $tenders = tender::join('majors', 'tenders.major_id', '=', 'majors.major_id')
                    ->where('tenders.tender_id', $id)
                    ->Update(['tenders.active' => '1']);
                   
                     return redirect()->back()->with(['success' => __('fields_web.apisuccessmesages.title')]);
                 }

                 else 
                 {
                 return response()->json(["message" => "Tender not found!"], 404);
                 }


            }
            else
            {
                return response()->json(['message' => 'You do not have permation '], 404);   
            }
        }

        public function rejectTender($id)
        {
            $user_id = auth()->user()->user_id;
            $role_users= role_user::select()->where('user_id',$user_id)->get();
            foreach($role_users as $role_user)
            if($role_user->role_id == 1 || $role_user->role_id == 8)
            {
                $tenders = tender::join('majors', 'tenders.major_id', '=', 'majors.major_id')
                        ->where('tenders.tender_id', $id)
                        ->where('tenders.active', '2');
                
                 if ($tenders->exists())
                 {
                    $tenders = tender::join('majors', 'tenders.major_id', '=', 'majors.major_id')
                    ->where('tenders.tender_id', $id)
                    ->Update(['tenders.active' => '3']);
                   
                     return redirect()->back()->with(['success' => __('fields_web.apisuccessmesages.title')]);
                 }

                 else 
                 {
                 return response()->json(["message" => "Tender not found!"], 404);
                 }


            }
            else
            {
                return response()->json(['message' => 'You do not have permation '], 404);   
            }
        }

}
