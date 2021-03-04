<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\role_user;
use App\Models\tender;
use App\Models\userdetail;
use App\Models\cv_skill;
use App\Models\cv_recommendation;
use App\Models\cv_detail;
use App\Models\Major;
use Illuminate\Support\Collection;
//use validator;
use Carbon\Carbon;
use App\Models\job;
use App\User;
use App\Models\Advertising;
use Illuminate\Support\Facades\Hash;
use App\Models\interstedTendersJob;
use Illuminate\Support\Facades\Validator;
use PDF;





class UsersController extends Controller
{
    public function userInfo()
    {       $user_id = auth()->user()->user_id;
            $role_users= role_user::select()->where('user_id',$user_id)->get();
            $user_info=userdetail::where('active','1')
            ->where('user_id','=',$user_id)->first();
            $experiences= $user_info->cv_details()->where('active','1')->where('type','1')
            ->get();
            $projects= $user_info->cv_details()->where('active','1')->where('type','3')
            ->get();
            $educations= $user_info->cv_details()->where('active','1')->where('type','2')
            ->get();
            $cv_recommendations=$user_info->cv_recommendations()->where('active','1')
            ->get();
            $skills=$user_info->cv_skills()->where('active','1')->where('type','1')
            ->get();
            $languages=$user_info->cv_skills()->where('active','1')->where('type','2')
            ->get();

            $data=['user_info' => $user_info,
            'experiences' => $experiences,
            'projects' => $projects,
            'educations' => $educations,
            'cv_recommendations' => $cv_recommendations,
            'languages' => $languages,
            'skills' => $skills,
            ];

       return view('HR.userProfile.userInfo',$data);
    }
    public function updateInfo(Request $request)
    {   $user_id = auth()->user()->user_id;
        $user_info=userdetail::where('active','1')
        ->where('user_id','=',$user_id);
        if($user_info->exists())
        {
        $user_info->fullname = $request->input('fullname');
        $user_info->gender = $request->input('gender');
        $user_info->email = $request->input('email');
        $user_info->phone = $request->input('phone');
        $user_info->country = $request->input('country');
        $user_info->city = $request->input('city');
        $user_info->userWebsite = $request->input('userWebsite');
        $user_info->aboutUser = $request->input('aboutUser');
        $user_info->status = $request->input('status');
        $user_info->Update([ 'fullname' => $user_info->fullname, 
                'gender' => $user_info->gender, 
                'email' => $user_info->email,
                'phone' => $user_info->phone,
                'country' => $user_info->country,
                'city' => $user_info->city,
                'userWebsite' => $user_info->userWebsite, 
                'aboutUser' => $user_info->aboutUser, 
                'status' => $user_info->status]);
      
            // $user_info = compnyInfo::where('active','1')
            // ->where('user_id','=',$user_id)
            // ->get();
            // return redirect()->route('userInfo')->with(['compnyInfo' => $compnyInfo]);
            //return view('admin.job.job_list',['jobs' => $jobs]);
              return redirect()->route('userProfile');
        }
        else{
            return response()->json(['message' => 'job not found'], 404);
        }
    }
    public function updateLogo(Request $request)
    {    $user_id = auth()->user()->user_id;
        $user_info=userdetail::where('active','1')
        ->where('user_id','=',$user_id);
        if($user_info->exists())
        {
       
        if($request->pic != '')
        {
                if($request->hasfile('pic'))
                {
                    $imagename = time().'.'.$request->file('pic')->extension();
                    $result = $request->file('pic')->move(public_path().'/assets/uploads/userPic/', $imagename); //store('files');
                    $user_info->pic = $imagename;
                }
                $user_info->Update(['pic' => $user_info->pic]);
                return   $this->userInfo();
        }
        else{
            return response()->json(['message' => 'job nott found'], 404);

        }
      }else{
            // $compnyInfo = compnyInfo::where('active','1')
            // ->where('user_id','=',$user_id)
            // ->get();
           // return redirect()->route('userInfo')->with(['compnyInfo' => $compnyInfo]);
            //return view('admin.job.job_list',['jobs' => $jobs]);
        
       
            return response()->json(['message' => 'job not found'], 404);
      }     
       
    }
    public function viwechangePassword()
    {
        $user_id = auth()->user()->user_id;
        $role_users= role_user::select()->where('user_id',$user_id)->get();
        foreach($role_users as $role_user)
        if($role_user->role_id == 2 || $role_user->role_id == 3 || $role_user->role_id == 4)
        {
            return view('HR.userProfile.changePassword');
        }
        else{
             return view('HR.Erroe');   
        }    
    }
    public function changpassword(Request $request)
    {
        $user_id = auth()->user()->user_id;
        $role_users= role_user::select()->where('user_id',$user_id)->get();
        foreach($role_users as $role_user)
        if($role_user->role_id == 2 || $role_user->role_id == 3 || $role_user->role_id == 4)
        {
            $user = User::where('user_id',$user_id);
            $password = auth()->user()->password;
            if($user->exists())
            {
                    if(Hash::check($request->input('old_password'), $password))
                    {
                        
                        $user->password = Hash::make($request->input('password'));
                        $user->Update(['password' => $user->password]);
                        $users = User::get();
                        return redirect()->route('userProfile');
                    }
                    else
                    {
                        echo "soryy";
                    }
                
            }
            else{
                return response()->json(['message' => 'user not found'], 404);
            }
        }
        else{
             return view('HR.Erroe');   
        }
    }

    public function ViewUserNotifaction()
    {
        $user_id = auth()->user()->user_id;
        $user_info=interstedTendersJob::where('user_id',$user_id)->first();
        $majorTender=Major::where('type','1')->where('active','1')->get();
        $majorJob=Major::where('type','0')->where('active','1')->get();
        $majors = Major::where('active','1')->get();
        $data=['majors' => $majors,
               'majorTender' =>$majorTender,
               'majorJob' =>$majorJob,
               'user_info'=> $user_info
              ];
        return view('HR.userProfile.UsercreateNotifaction',$data);

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



    public function UsercreateNotification(Request $request)
    { 
           //  $this->validator($request->all())->validate();
           $user_id = auth()->user()->user_id;
           $user_info=interstedTendersJob::where('user_id',$user_id);
           if($user_info->exists())
           {
             // dd( $request); 
             $user_info->Update([
                'name' => $request->name,
                'email' => $request->email,
                'type' => $request->type,
                'major_id' =>  implode(",",  $request->major_id),
              ]);
            //  return redirect()->route('userProfile');
            return redirect()->route('userProfile');

          }
          else{
            $interstedTendersJob = new interstedTendersJob();
            $interstedTendersJob->user_id = $user_id;
            $interstedTendersJob->email = $request->email;
            $interstedTendersJob->name = $request->name;
            $interstedTendersJob->type = $request->type;
            $interstedTendersJob->major_id =  implode(",",  $request->major_id);
            $interstedTendersJob->save();
            return redirect()->route('userProfile');
          }
    }
    public function updateCvDetails(Request $request)
    {   $user_id = auth()->user()->user_id;
        $user_info=userdetail::where('active','1')
        ->where('user_id','=',$user_id)->first();
        $cv_detail = cv_detail::where('id',$request->id)
        ->where('userdetail_id',$user_info->id);
        if($cv_detail->exists())
        {
            $cv_detail->userdetail_id = $user_info->id;
            $cv_detail->active = 1;
            $cv_detail->title = $request->input('title');
            $cv_detail->subtitle = $request->input('subtitle');
            $cv_detail->type = $request->input('type');
            $cv_detail->start_date = $request->input('start_date');
            $cv_detail->end_date = $request->input('end_date');
            $cv_detail->description = $request->input('description');
            $cv_detail->Update([
                'title' => $cv_detail->title, 
                'subtitle' => $cv_detail->subtitle, 
                'type' => $cv_detail->type, 
                'start_date' => $cv_detail->start_date,
                'end_date' => $cv_detail->end_date,
                'description' => $cv_detail->description]);
      
                return response()->json(['success'=>'Ajax request submitted successfully']);
        }
        else{
            return response()->json(['message' => 'job not found'], 404);
        }
    }
    public function AddCvDetails(Request $request){
        $user_id = auth()->user()->user_id;
        $user_info=userdetail::where('active','1')
        ->where('user_id','=',$user_id)->first();
        $cv_detail = new cv_detail();
        $cv_detail->userdetail_id = $user_info->id;
        $cv_detail->active = 1;
        $cv_detail->title = $request->input('title');
        $cv_detail->subtitle = $request->input('subtitle');
        $cv_detail->type = $request->input('type');
        $cv_detail->start_date = $request->input('start_date');
        $cv_detail->end_date = $request->input('end_date');
        $cv_detail->description = $request->input('description');
        
        $cv_detail->save();
        return response()->json(['success'=>'Ajax request submitted successfully']);
        // $cv_detail = Job::join('majors', 'jobs.major_id', '=', 'majors.major_id')
        // ->select('majors.major_name', 'jobs.*' )->get();
        // return redirect()->route('viewJobs')->with(['jobs' => $jobs]);
    }
    public function updateCvSkills(Request $request)
    {   $user_id = auth()->user()->user_id;
        $user_info=userdetail::where('active','1')
        ->where('user_id','=',$user_id)->first();
        $cv_skill = cv_skill::where('id',$request->id)
        ->where('userdetail_id',$user_info->id);
        if($cv_skill->exists())
        {
        $cv_skill->name = $request->input('name');
        $cv_skill->value = $request->input('value');
        $cv_skill->Update([
            'name' => $cv_skill->name, 
            'value' => $cv_skill->value]);
      
            // $compnyInfo = compnyInfo::where('active','1')
            // ->where('user_id','=',$user_id)
            // ->get();
            // return redirect()->route('userInfo')->with(['compnyInfo' => $compnyInfo]);
            //return view('admin.job.job_list',['jobs' => $jobs]);
        }
        else{
            return response()->json(['message' => 'job not found'], 404);
        }
    }
    public function AddCvSkills(Request $request){
        $user_id = auth()->user()->user_id;
        $user_info=userdetail::where('active','1')
        ->where('user_id','=',$user_id)->first();
        $cv_skill = new cv_skill();
        $cv_skill->userdetail_id = $user_info->id;
        $cv_skill->active = 1;
        $cv_skill->name = $request->input('name');
        $cv_skill->value = $request->input('value');
        $cv_skill->type = $request->input('type');
        $cv_skill->save();
      
        // $cv_detail = Job::join('majors', 'jobs.major_id', '=', 'majors.major_id')
        // ->select('majors.major_name', 'jobs.*' )->get();
        // return redirect()->route('viewJobs')->with(['jobs' => $jobs]);
    }
    public function updateCvRecommendations(Request $request)
    {   $user_id = auth()->user()->user_id;
        $user_info=userdetail::where('active','1')
        ->where('user_id','=',$user_id)->first();
        $cv_recommendation = cv_recommendation::where('id',$request->id)
        ->where('userdetail_id',$user_info->id);
        if($cv_recommendation->exists())
        {
        $cv_recommendation->userdetail_id = $user_info->id;
        $cv_recommendation->name = $request->input('name');
        $cv_recommendation->email = $request->input('email');
        $cv_recommendation->phone = $request->input('phone');
        $cv_recommendation->description = $request->input('description');
        $cv_recommendation->Update([
            
            'name' => $cv_recommendation->name, 
            'email' => $cv_recommendation->email,
            'phone' => $cv_recommendation->phone,
            'description' => $cv_recommendation->description]);
      
            // $compnyInfo = compnyInfo::where('active','1')
            // ->where('user_id','=',$user_id)
            // ->get();
            // return redirect()->route('userInfo')->with(['compnyInfo' => $compnyInfo]);
            //return view('admin.job.job_list',['jobs' => $jobs]);
        }
        else{
            return response()->json(['message' => 'job not found'], 404);
        }
    }
    public function AddCvRecommendations(Request $request){
        $user_id = auth()->user()->user_id;
        $user_info=userdetail::where('active','1')
        ->where('user_id','=',$user_id)->first();
        $cv_recommendation = new cv_recommendation();
        $cv_recommendation->userdetail_id = $user_info->id;
        $cv_recommendation->active = 1;
        $cv_recommendation->name = $request->input('name');
        $cv_recommendation->email = $request->input('email');
        $cv_recommendation->phone = $request->input('phone');
        $cv_recommendation->description = $request->input('description');
        $cv_recommendation->save();
      
        // $cv_detail = Job::join('majors', 'jobs.major_id', '=', 'majors.major_id')
        // ->select('majors.major_name', 'jobs.*' )->get();
        // return redirect()->route('viewJobs')->with(['jobs' => $jobs]);
    }
    public function deleteCvDetails(Request $request)
    {
        $user_id = auth()->user()->user_id;
        $user_info=userdetail::where('active','1')
        ->where('user_id','=',$user_id)->first();
        $cv_detail = cv_detail::where('id',$request->id)
        ->where('userdetail_id',$user_info->id);
            if($cv_detail->exists())
            {
                    $cv_detail->Update(['active' => '0']);
                    // $tenders = tender::join('majors', 'tenders.major_id', '=', 'majors.major_id')
                    // ->select('majors.major_name', 'tenders.*' )->get();
                    // //return view('admin.tender.tender_list',['tenders' => $tenders]);
                    // return redirect()->route('controlpanel.tender.index')->with(['tenders' => $tenders]);

            }
    } 
    public function deleteCvSkills(Request $request)
    {
        $user_id = auth()->user()->user_id;
        $user_info=userdetail::where('active','1')
        ->where('user_id','=',$user_id)->first();
        $cv_skill = cv_skill::where('id',$request->id)
        ->where('userdetail_id',$user_info->id);
            if($cv_skill->exists())
            {
                    $cv_skill->Update(['active' => '0']);
                    // $tenders = tender::join('majors', 'tenders.major_id', '=', 'majors.major_id')
                    // ->select('majors.major_name', 'tenders.*' )->get();
                    // //return view('admin.tender.tender_list',['tenders' => $tenders]);
                    // return redirect()->route('controlpanel.tender.index')->with(['tenders' => $tenders]);

            }
    }
    public function deleteCvRecommendations(Request $request)
    {
        $user_id = auth()->user()->user_id;
        $user_info=userdetail::where('active','1')
        ->where('user_id','=',$user_id)->first();
        $cv_recommendation = cv_recommendation::where('id',$request->id)
        ->where('userdetail_id',$user_info->id);
            if($cv_recommendation->exists())
            {
                    $cv_recommendation->Update(['active' => '0']);
                    // $tenders = tender::join('majors', 'tenders.major_id', '=', 'majors.major_id')
                    // ->select('majors.major_name', 'tenders.*' )->get();
                    // //return view('admin.tender.tender_list',['tenders' => $tenders]);
                    // return redirect()->route('controlpanel.tender.index')->with(['tenders' => $tenders]);


            }
    }
  
  ///////////////////////////////cv//////////////////////////////////
    public function viewCv1()
    {
        return view('HR.userProfile.resume.cvTemplete1');
    }
    public function generatePDF1()
    {
        $data = ['title' => 'Welcome to ItSolutionStuff.com'];
        $pdf = PDF::loadView('HR.userProfile.resume.cvTemplete1', $data);
        return $pdf->download('itsolutionstuff.pdf');
    }

    public function viewCv2()
    {
        return view('HR.userProfile.resume.cvTemplete2');
    }
    public function generatePDF2()
    {
        $data = ['title' => 'Welcome to ItSolutionStuff.com'];
        $pdf = PDF::loadView('HR.userProfile.resume.cvTemplete2', $data);
        return $pdf->download('cvTemplete2.pdf');
    }
    public function viewCv3()
    {
        return view('HR.userProfile.resume.cvTemplete3');
    }
    public function generatePDF3()
    {
        $data = ['title' => 'Welcome to ItSolutionStuff.com'];
        $pdf = PDF::loadView('HR.userProfile.resume.cvTemplete3', $data);
        return $pdf->download('cvTemplete3.pdf');
    }

    ///////////////////////////////cover//////////////////////////////////
    public function viewCover1()
    {
        return view('HR.userProfile.coverletter.coverTemplete1');
    }
    public function generateCover1()
    {
        $data = ['title' => 'Welcome to ItSolutionStuff.com'];
        $pdf = PDF::loadView('HR.userProfile.coverletter.coverTemplete1', $data);
        return $pdf->download('itsolutionstuff.pdf');
    }

    public function viewCover2()
    {
        return view('HR.userProfile.coverletter.coverTemplete2');
    }
    public function generateCover2()
    {
        $data = ['title' => 'Welcome to ItSolutionStuff.com'];
        $pdf = PDF::loadView('HR.userProfile.coverletter.coverTemplete2', $data);
        return $pdf->download('cvTemplete2.pdf');
    }
    public function viewCover3()
    {
        return view('HR.userProfile.coverletter.coverTemplete3');
    }
    public function generateCover3()
    {
        $data = ['title' => 'Welcome to ItSolutionStuff.com'];
        $pdf = PDF::loadView('HR.userProfile.coverletter.coverTemplete3', $data);
        return $pdf->download('cvTemplete3.pdf');
    }
}
