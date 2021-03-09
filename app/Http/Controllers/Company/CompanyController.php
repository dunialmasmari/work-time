<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\role_user;
use App\Models\tender;
use App\Models\compnyInfo;
use App\Models\Major;
use Illuminate\Support\Collection;
// use validator;
use Carbon\Carbon;
use App\Models\job;
use App\User;
use App\Models\Advertising;
use App\Events\AdminNotification;

use App\Models\service;
use App\Models\blog;
use App\Events\StatusLiked;
use Illuminate\Support\Facades\Validator;
use App\Models\interstedTendersJob;
use Illuminate\Support\Facades\Auth;
use App\Models\RealTimeNotification;
use Illuminate\Support\Facades\Hash;




class CompanyController extends Controller
{
    public function userInfo()
    {   
        // $user_id = auth()->user()->user_id;
        // $role_users= role_user::select()->where('user_id',$user_id)->get();
        // foreach($role_users as $role_user)
        // if($role_user->role_id == 5 || $role_user->role_id == 6 || $role_user->role_id == 7)
        // {     

             $user_id = auth()->user()->user_id;
             $role_users= role_user::select()->where('user_id',$user_id)->get();
             $user = User::join('compnyinfo', 'users.user_id', '=', 'compnyinfo.user_id')
               ->where('users.user_id', $user_id)
               ->where('users.active','1')
               ->where('compnyinfo.active','1');
               if ($user->exists())
               {  
                  $user =User::get();
                  $user_info=User::where('active','1')
                    ->where('user_id','=',$user_id)
                    ->get();
                  $data=['user_info' => $user_info, 'role_users' => $role_users];
                  return view('HR.company.userInfo',$data);
                }
               else 
            {
              // return response()->json(['message' => 'You do not have permation '], 404);   
              return view('HR.Erroe'); 
            }
             /* $user_info=User::where('active','1')
             ->where('user_id','=',$user_id)
             ->get(); */
              

        // }
        // else{
        //      return view('HR.Erroe');   
        // }
    }
    public function updateInfo(Request $request)
    {  
        $user_id = auth()->user()->user_id;
        // $role_users= role_user::select()->where('user_id',$user_id)->get();
        // foreach($role_users as $role_user)
        // if($role_user->role_id == 5 || $role_user->role_id == 6 || $role_user->role_id == 7)
        // {
            // $user_id = auth()->user()->user_id;
            // $role_users= role_user::select()->where('user_id',$user_id)->get();
            $compnyInfo = compnyInfo::where('user_id',$user_id);
            if($compnyInfo->exists())
            {
            $compnyInfo->user_id = $user_id;
            $compnyInfo->companyName = $request->input('companyName');
            $compnyInfo->websitelink = $request->input('websitelink');
            $compnyInfo->email = $request->input('email');
            $compnyInfo->phone = $request->input('phone');
            $compnyInfo->country = $request->input('country');
            $compnyInfo->city = $request->input('city');
            $compnyInfo->address = $request->input('address');
            $compnyInfo->aboutCompany = $request->input('aboutCompany');
            $compnyInfo->size = $request->input('size');
            $compnyInfo->type = $request->input('type');
            $compnyInfo->founded = $request->input('founded');
            $compnyInfo->industry = $request->input('industry');
            $compnyInfo->description = $request->input('description');
                $compnyInfo->Update([
                    'companyName' => $compnyInfo->companyName, 
                    'websitelink' => $compnyInfo->websitelink, 
                    'email' => $compnyInfo->email, 
                    'phone' => $compnyInfo->phone,
                    'country' => $compnyInfo->country,
                    'city' => $compnyInfo->city,
                    'address' => $compnyInfo->address,
                    'aboutCompany' => $compnyInfo->aboutCompany, 
                    'size' => $compnyInfo->size, 
                    'type' => $compnyInfo->type,
                    'founded' => $compnyInfo->founded,
                    'industry' => $compnyInfo->industry,
                    'description' => $compnyInfo->description,]);
        
                $compnyInfo = compnyInfo::where('active','1')
                ->where('user_id','=',$user_id)
                ->get();
                return redirect()->route('userInfo')->with(['compnyInfo' => $compnyInfo, 'role_users' => $role_users]);
                //return view('admin.job.job_list',['jobs' => $jobs]);
            }
            else{
                return response()->json(['message' => 'job not found'], 404);
            }
        // }
        // else{
        //      return view('HR.Erroe');   
        // }
    }
    public function updateLogo(Request $request)
    {
        // $user_id = auth()->user()->user_id;
        // $role_users= role_user::select()->where('user_id',$user_id)->get();
        // foreach($role_users as $role_user)
        // if($role_user->role_id == 5 || $role_user->role_id == 6 || $role_user->role_id == 7)
        // {  
            $user_id = auth()->user()->user_id;
            $compnyInfo = compnyInfo::where('user_id',$user_id);
            if($compnyInfo->exists())
            {
        
            if($request->logo != '')
            {
                    if($request->hasfile('logo'))
                    {
                        $imagename = time().'.'.$request->file('logo')->extension();
                        $result = $request->file('logo')->move(public_path().'/assets/uploads/Logos/', $imagename); //store('files');
                        $compnyInfo->logo = $imagename;
                    }
                    $compnyInfo->Update([
                    'logo' => $compnyInfo->logo]);
            }
            else{
                return response()->json(['message' => 'job nott found'], 404);

            }
            }else{
                    $compnyInfo = compnyInfo::where('active','1')
                    ->where('user_id','=',$user_id)
                    ->get();
                // return redirect()->route('userInfo')->with(['compnyInfo' => $compnyInfo]);
                    //return view('admin.job.job_list',['jobs' => $jobs]);
                
            
                    return response()->json(['message' => 'job not found'], 404);
            }  
    //    }
    //     else{
    //          return view('HR.Erroe');   
    //     }   
       
    }
    public function viewJobs()
    {
        // $user_id = auth()->user()->user_id;
        // $role_users= role_user::select()->where('user_id',$user_id)->get();
        // foreach($role_users as $role_user)
        // if($role_user->role_id == 5 || $role_user->role_id == 6 || $role_user->role_id == 7)
        // {
                $user_id = auth()->user()->user_id;
                $role_users= role_user::select()->where('user_id',$user_id)->get();
                $jobs=job::join('majors','jobs.major_id','=','majors.major_id')
                ->select('majors.major_name','jobs.*')
                ->where('jobs.user_id','>=',$user_id)
                ->orderByRaw('jobs.start_date DESC')
                ->paginate(8);
                
                $data=[
                    'jobs' => $jobs,
                    'role_users' => $role_users
                    ];
            return view('HR.company.job_list',$data);
        // }
        // else{
        //      return view('HR.Erroe');   
        // }  
    }
    public function addJob()
    {
        // $user_id = auth()->user()->user_id;
        // $role_users= role_user::select()->where('user_id',$user_id)->get();
        // foreach($role_users as $role_user)
        // if($role_user->role_id == 5 || $role_user->role_id == 6 || $role_user->role_id == 7)
        // {
            $user_id = auth()->user()->user_id;
            $role_users= role_user::select()->where('user_id',$user_id)->get();
            $user = User::join('compnyinfo', 'users.user_id', '=', 'compnyinfo.user_id')
              ->where('users.user_id', $user_id)
              ->where('users.active','1')
              ->where('compnyinfo.active','1');
              if ($user->exists())
              {  
                 $majors=Major::select()->get();
                 return view('HR.company.job_add',['majors' => $majors, 'role_users' => $role_users]);
       
               }
              else 
           {
            //  return response()->json(['message' => 'You do not have permation '], 404);  
            return view('HR.Erroe');  
           }

                  // }
        // else{
        //      return view('HR.Erroe');   
        // } 
    }

    public function storeJob(Request $request)
    {
        //$user_id = auth()->user()->user_id;
        $user_id = auth()->user()->user_id;
        // $role_users= role_user::select()->where('user_id',$user_id)->get();
        // foreach($role_users as $role_user)
        // if($role_user->role_id == 5 || $role_user->role_id == 6 || $role_user->role_id == 7)
        // {
            $role_users= role_user::select()->where('user_id',$user_id)->get();
            $user = User::join('compnyinfo', 'users.user_id', '=', 'compnyinfo.user_id')
            ->where('users.user_id', $user_id)
            ->where('users.active','1')
            ->where('compnyinfo.active','1');
            if ($user->exists())
            {  
/*                   if($request->hasfile('image'))
                          {
                       $imagename = time().'.'.$request->file('image')->extension();
                       $result = $request->file('image')->move(public_path().'/assets/uploads/jobs/images/', $imagename); //store('files');
                       $image = $imagename;
                          } 
                          else
                          {
                       $image=null;
                          }
                       $job =job::create([
                       'user_id'=> $user_id,
                       'major_id'=> $request->input('major_id'),
                       'title'=> $request->input('title'),
                       'company'=> $request->input('company'),
                       'email'=> $request->input('email'),
                       'register_here'=> $request->input('register_here'),
                       'recommendation'=> $request->input('recommendation'),
                       'description'=> $request->input('description'),
                       'apply_link'=> $request->input('apply_link'),
                       'start_date'=> $request->input('start_date'),
                       'deadline'=> $request->input('deadline'),
                       'posted_date'=> $request->input('posted_date'),
                       'active'=>2,
                       'location'=> implode(",", $request->input('location')),
                       'image'=>$image,
                       ]);
                       dd($job->id); */

                        $job = new job();
                       $job->user_id = $user_id;
                       $job->major_id = $request->input('major_id');
                       $job->title = $request->input('title');
                       $job->company = $request->input('company');
                       $job->email = $request->input('email');
                       $job->register_here = $request->input('register_here');
                       $job->recommendation = $request->input('recommendation');
                       $job->description = $request->input('description');
                       $job->apply_link = $request->input('apply_link');
                       $job->start_date = $request->input('start_date');
                       $job->deadline = $request->input('deadline');
                       $job->posted_date = $request->input('posted_date');
                       $job->active =2;
                       $job->location = implode(",", $request->input('location'));
                       if($request->hasfile('image'))
                          {
                              $imagename = time().'.'.$request->file('image')->extension();
                              $result = $request->file('image')->move(public_path().'/assets/uploads/jobs/images/', $imagename); //store('files');
                              $job->image = $imagename;
                          } 
                        $job->save();
                        $job_id=$job->id;
                        //dd($job_id);
                
                          /* add to notification */
                                 $date=Carbon::today();
                                 $notify=RealTimeNotification::create([
                                     'type'=>'post-job',
                                     'id_type'=>$job_id,
                                     'see_it'=>0,
                                     'create_time'=>$date,
                                 ]);
                             //dd($notify);
                                 $dataevent =
                                 [ 
                                   'type'=>'post-job',
                                   'message'  => 'new posting job ',
                                   'time' => $date,
                                   'id'=> $job_id
                                 ];
                             event(new AdminNotification($dataevent)); 
                           /* end notification */

                $jobs = Job::join('majors', 'jobs.major_id', '=', 'majors.major_id')
                ->select('majors.major_name', 'jobs.*' )->get();  
                return redirect()->route('viewJobs')->with(['jobs' => $jobs, 'role_users' => $role_users]);
             }
            else 
         {
          //  return response()->json(['message' => 'You do not have permation '], 404);  
          return view('HR.Erroe');  
         }
        // }
        // else{
        //      return view('HR.Erroe');   
        // } 
    }

    public function viewTenders()
    {     
        // $user_id = auth()->user()->user_id;
        // $role_users= role_user::select()->where('user_id',$user_id)->get();
        // foreach($role_users as $role_user)
        // if($role_user->role_id == 5 || $role_user->role_id == 6 || $role_user->role_id == 7)
        // {
            $user_id = auth()->user()->user_id;
            $role_users= role_user::select()->where('user_id',$user_id)->get();
            $user = User::join('compnyinfo', 'users.user_id', '=', 'compnyinfo.user_id')
            ->where('users.user_id', $user_id)
            ->where('users.active','1')
            ->where('compnyinfo.active','1');
               if ($user->exists())
                   { 
                      $user_id = auth()->user()->user_id;
                      $role_users= role_user::select()->where('user_id',$user_id)->get();
                      $tenders = tender::join('majors', 'tenders.major_id', '=', 'majors.major_id')
                      ->select('majors.major_name', 'tenders.*' )
                      ->where('tenders.user_id','=',$user_id)
                      ->get();
                      $data=[
                          'tenders' => $tenders,
                          'role_users' => $role_users,
                      ];
                       return view('HR.company.tenders_list',$data);
                    }
                else 
                 {
                  //  return response()->json(['message' => 'You do not have permation '], 404);  
                  return view('HR.Erroe');  
                 }
        // }
        // else{
        //  return view('HR.Erroe');   
        // } 

    }

    public function viewTenderdetilse($id)
    {
        // $user_id = auth()->user()->user_id;
        // $role_users= role_user::select()->where('user_id',$user_id)->get();
        // foreach($role_users as $role_user)
        // if($role_user->role_id == 5 || $role_user->role_id == 6 || $role_user->role_id == 7)
        // { 
            $user_id = auth()->user()->user_id;
            $role_users= role_user::select()->where('user_id',$user_id)->get();
            $user = User::join('compnyinfo', 'users.user_id', '=', 'compnyinfo.user_id')
            ->where('users.user_id', $user_id)
            ->where('users.active','1')
            ->where('compnyinfo.active','1');
               if ($user->exists())
                   { 
                         $user_id = auth()->user()->user_id;
                         $role_users= role_user::select()->where('user_id',$user_id)->get();
                         $tenders=tender::join('majors','tenders.major_id','=','majors.major_id')
                         ->select('majors.major_name','tenders.*')
                         ->where('tenders.tender_id', $id);
                     
                         if ($tenders->exists())
                         {
                             $tenders=$tenders->get();
                                 return view('HR.company.tender_detilse',['tenders' => $tenders, 'role_users' => $role_users]);           
                         } 
                         else 
                         {
                         return response()->json(["message" => "Tender not found!"], 404);
                         }
                    }
                else 
                   {
                    //  return response()->json(['message' => 'You do not have permation '], 404); 
                    return view('HR.Erroe');   
                   }
        // }
        // else{
        //  return view('HR.Erroe');   
        // } 

    }

    public function viewJobdetilse($id)
    {
        // $user_id = auth()->user()->user_id;
        // $role_users= role_user::select()->where('user_id',$user_id)->get();
        // foreach($role_users as $role_user)
        // if($role_user->role_id == 5 || $role_user->role_id == 6 || $role_user->role_id == 7)
        // {
            $user_id = auth()->user()->user_id;
            $role_users= role_user::select()->where('user_id',$user_id)->get();
            $user = User::join('compnyinfo', 'users.user_id', '=', 'compnyinfo.user_id')
            ->where('users.user_id', $user_id)
            ->where('users.active','1')
            ->where('compnyinfo.active','1');
               if ($user->exists())
                   {
                        $user_id = auth()->user()->user_id;
                        $role_users= role_user::select()->where('user_id',$user_id)->get();
                        $jobs=job::join('majors','jobs.major_id','=','majors.major_id')
                        ->select('majors.major_name','jobs.*')
                        ->where('jobs.job_id', $id);
                        if ($jobs->exists())
                        {
                            $jobs=$jobs->get();
                            return view('HR.company.job_detilse',['jobs' => $jobs, 'role_users' => $role_users]);
                        } 
                        else 
                        {
                        return response()->json(["message" => "Job not found!"], 404);
                        }
                    }
                else 
                    {
                      // return response()->json(['message' => 'You do not have permation '], 404);  
                      return view('HR.Erroe');  
                    }
        // }
        // else{
        //  return view('HR.Erroe');   
        // }
    }

    public function addTender()
    {
        // $user_id = auth()->user()->user_id;
        // $role_users= role_user::select()->where('user_id',$user_id)->get();
        // foreach($role_users as $role_user)
        // if($role_user->role_id == 5 || $role_user->role_id == 6 || $role_user->role_id == 7)
        // {$user_id = auth()->user()->user_id;

            $user_id = auth()->user()->user_id;
            $role_users= role_user::select()->where('user_id',$user_id)->get();
            $user = User::join('compnyinfo', 'users.user_id', '=', 'compnyinfo.user_id')
            ->where('users.user_id', $user_id)
            ->where('users.active','1')
            ->where('compnyinfo.active','1');
               if ($user->exists())
                   {
                        $user_id = auth()->user()->user_id;
                        $role_users= role_user::select()->where('user_id',$user_id)->get();
                        $majors=Major::select()->get();

                        return view('HR.company.tender_add',['majors' => $majors, 'role_users' => $role_users]);
                    
                   }
                else 
                   {
                    //  return response()->json(['message' => 'You do not have permation '], 404); 
                    return view('HR.Erroe');   
                   }
        // }
        // else{
        //  return view('HR.Erroe');   
        // }
    }
    public function storeTender(Request $request)
    {
        // $user_id = auth()->user()->user_id;
        // $role_users= role_user::select()->where('user_id',$user_id)->get();
        // foreach($role_users as $role_user)
        // if($role_user->role_id == 5 || $role_user->role_id == 6 || $role_user->role_id == 7)
        // {
            $user_id = auth()->user()->user_id;
            $role_users= role_user::select()->where('user_id',$user_id)->get();
            $user = User::join('compnyinfo', 'users.user_id', '=', 'compnyinfo.user_id')
              ->where('users.user_id', $user_id)
              ->where('users.active','1')
              ->where('compnyinfo.active','1');
              if ($user->exists())
               {  
                      $user_id = auth()->user()->user_id;
                      $role_users= role_user::select()->where('user_id',$user_id)->get();
                      $tender = new tender();
                      $tender->user_id = $user_id;
                      $tender->major_id = $request->input('major_id');
                      $tender->title = $request->input('title');
                      $tender->company = $request->input('company');
                      $tender->description = $request->input('description');
                      $tender->apply_link = $request->input('apply_link');
                      $tender->start_date = $request->input('start_date');
                      $tender->deadline = $request->input('deadline');
                      $tender->posted_date = $request->input('posted_date');
                      $tender->active = 2;
                      $tender->location = implode(",", $request->input('location'));
                      if($request->hasfile('filename'))
                        {
                          $filename = time().'.'.$request->file('filename')->extension();
                          $result = $request->file('filename')->move(public_path().'/assets/uploads/tenders/pdf/', $filename); //store('files');
                          $tender->filename = $filename;
                        }
                      if($request->hasfile('image'))
                        {
                          $imagename = time().'.'.$request->file('image')->extension();
                          $result = $request->file('image')->move(public_path().'/assets/uploads/tenders/images/', $imagename); //store('files');
                          $tender->image = $imagename;
                        }
                      $tender->save();
                      $tender_id=$tender->id;
                  //dd( $tender->id);

                  
                        /* add to notification */
                              $date=Carbon::today();
                              $notify=RealTimeNotification::create([
                                  'type'=>'post-tender',
                                  'id_type'=>$tender_id,
                                  'see_it'=>0,
                                  'create_time'=>$date,
                              ]);
                            //dd ($notify);
                              $dataevent =
                              [ 
                                'type'=>'post-tender',
                                'message'  => 'new posting tender ',
                                'time' => $date,
                                'id'=> $tender_id
                              ];
                           event(new AdminNotification($dataevent)); 
                        /* end notification */
                           $tenders = tender::join('majors', 'tenders.major_id', '=', 'majors.major_id')
                          ->select('majors.major_name', 'tenders.*' )->get();
                          //return view('admin.tender.tender_list',['tenders' => $tenders]);
                      return redirect()->route('viewTenders')->with(['tenders' => $tenders, 'role_users' => $role_users]);
                }
                else 
                {
                  // return response()->json(['message' => 'You do not have permation '], 404); 
                  return view('HR.Erroe');   
                }
          
        // }
        // else{
        //  return view('HR.Erroe');   
        // }
    }





}
