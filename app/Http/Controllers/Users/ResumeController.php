<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\role_user;
use App\Models\userdetail;
use App\Models\cv_skill;
use App\Models\cv_recommendation;
use App\Models\cv_detail;
use App\Models\resume_report;
use Illuminate\Support\Collection;
use validator;
use Carbon\Carbon;
use PDF;





class ResumeController extends Controller
{
    public function getUserCv()
    {    
        $user_id = auth()->user()->user_id;
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

       return view('HR.userProfile.userResume');
    }
  ///////////////////////////////cv//////////////////////////////////
    public function viewCv1()
    {
        $user_id = auth()->user()->user_id;
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
        'backgroundColor'=>'rgb(79, 157, 213)',
        'fontColor'=>'#fff'
        ];
        return view('HR.userProfile.resume.cvTemplete1',$data);
    }
    public function generatePDF1(Request $request)
    {
        $user_id = auth()->user()->user_id;
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
        'backgroundColor'=> $request->backgroundColor,
              'fontColor'=> $request->fontColor
        ];
        //$data = ['title' => 'Welcome to ItSolutionStuff.com'];
        $pdf = PDF::loadView('HR.userProfile.resume.cvTemplete1', $data);
        $date=Carbon::today();
        $resume_report = new resume_report();
        $resume_report->userdetail_id = $user_info->id;
        $resume_report->name = 'viewCv1';
        $resume_report->date = $date;
        $resume_report->type = '1';
        $resume_report->save();
        return $pdf->download('itsolutionstuff.pdf');
    }
    public function viewCv2()
    {
        $user_id = auth()->user()->user_id;
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
        'backgroundColor'=>'rgb(79, 157, 213)',
        'fontColor'=>'#fff'
        ];
        return view('HR.userProfile.resume.cvTemplete2',$data);
    }
    public function generatePDF2(Request $request)
    {  $user_id = auth()->user()->user_id;
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
        'backgroundColor'=> $request->backgroundColor,
              'fontColor'=> $request->fontColor
        ];
       // $data = ['title' => 'Welcome to ItSolutionStuff.com'];
        $pdf = PDF::loadView('HR.userProfile.resume.cvTemplete2', $data);
        $date=Carbon::today();
        $resume_report = new resume_report();
        $resume_report->userdetail_id = $user_info->id;
        $resume_report->name = 'viewCv2';
        $resume_report->date = $date;
        $resume_report->type = '1';
        $resume_report->save();
        return $pdf->download('cvTemplete2.pdf');
    }
    public function viewCv3()
    {

        $user_id = auth()->user()->user_id;
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
        'backgroundColor'=>'rgb(79, 157, 213)',
        'fontColor'=>'#fff'
        ];
        return view('HR.userProfile.resume.cvTemplete3',$data);
    }
    public function generatePDF3(Request $request)
    {
        $user_id = auth()->user()->user_id;
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
        'backgroundColor'=> $request->backgroundColor,
              'fontColor'=> $request->fontColor
        ];
        $data = ['title' => 'Welcome to ItSolutionStuff.com'];
        $pdf = PDF::loadView('HR.userProfile.resume.cvTemplete3', $data);
        $date=Carbon::today();
        $resume_report = new resume_report();
        $resume_report->userdetail_id = $user_info->id;
        $resume_report->name = 'viewCv3';
        $resume_report->date = $date;
        $resume_report->type = '1';
        $resume_report->save();
        return $pdf->download('cvTemplete3.pdf');
    }

    ///////////////////////////////cover//////////////////////////////////
    
    public function userLetters()
    {    
      
       return view('HR.userProfile.userLetters');
    }
    public function viewCover1()
    {
        $user_id = auth()->user()->user_id;
        $role_users= role_user::select()->where('user_id',$user_id)->get();
        $user_info=userdetail::where('active','1')
        ->where('user_id','=',$user_id)->first();

        $data=['user_info' => $user_info,
        'date' => 'date',
        'company' => 'company',
        'companywebsite' => 'www.your-website.com',
        'companyphone' => '111-222-3333',
        'companyemail' => 'your.name@example.com',
        'deartTitle'=>'Dear',
        'coverText' =>'<p sr-r-where><span sr-r-fld="where">Company Name</span>, <span sr-r-fld="location">Location</span></p><p sr-r-dates><span sr-r-fld="fromMonth">Jan</span> <span sr-r-fld="fromYear">2013</span> &ndash; <span sr-r-fld="toMonth">Dec</span> <span sr-r-fld="toYear">2013</span></p><div sr-r-fld="html"> <p>Describe your job responsibilities, accomplishments and technologies you have used. It is highly recommended that you use bullet points to describe your experience.</p></div>',
        'backgroundColor'=>'rgb(79, 157, 213)',
        'fontColor'=>'#fff'
        ];
        return view('HR.userProfile.coverletter.coverTemplete1', $data);
    }
    public function generateCover1(Request $request)
    { 
        $user_id = auth()->user()->user_id;
        $role_users= role_user::select()->where('user_id',$user_id)->get();
        $user_info=userdetail::where('active','1')
        ->where('user_id','=',$user_id)->first();


        //$data = ['title' => 'Welcome to ItSolutionStuff.com'];

      //  return response()->json(['success'=>$request->coverletter]);


        $data=['user_info' => $user_info,
        'date' => $request->date,
        'company' => $request->company,
        'companywebsite' => $request->website,
        'companyphone' => $request->phone,
        'companyemail' => $request->email,
        'deartTitle'=>'Dear '.$request->name,
        'coverText' =>$request->coverletter,
        'backgroundColor'=> $request->backgroundColor,
              'fontColor'=> $request->fontColor
        ];
        $pdf = PDF::loadView('HR.userProfile.coverletter.coverTemplete1', $data);
        $date=Carbon::today();
        $user_id = auth()->user()->user_id;
        $user_info=userdetail::where('active','1')
        ->where('user_id','=',$user_id)->first();
        $resume_report = new resume_report();
        $resume_report->userdetail_id = $user_info->id;
        $resume_report->name = 'coverletter'. $request->template;
        $resume_report->date = $date;
        $resume_report->type = '2';
        $resume_report->save();
        return $pdf->download('itsolutionstuff.pdf');
       return view('HR.userProfile.coverletter.coverTemplete1', $data);
    }

    public function viewCover2()
    {
        $user_id = auth()->user()->user_id;
        $role_users= role_user::select()->where('user_id',$user_id)->get();
        $user_info=userdetail::where('active','1')
        ->where('user_id','=',$user_id)->first();

        $data=['user_info' => $user_info,
        'date' => 'date',
        'company' => 'company',
        'companywebsite' => 'www.your-website.com',
        'companyphone' => '111-222-3333',
        'companyemail' => 'your.name@example.com',
        'deartTitle'=>'Dear',
        'coverText' =>'<p sr-r-where><span sr-r-fld="where">Company Name</span>, <span sr-r-fld="location">Location</span></p><p sr-r-dates><span sr-r-fld="fromMonth">Jan</span> <span sr-r-fld="fromYear">2013</span> &ndash; <span sr-r-fld="toMonth">Dec</span> <span sr-r-fld="toYear">2013</span></p><div sr-r-fld="html"> <p>Describe your job responsibilities, accomplishments and technologies you have used. It is highly recommended that you use bullet points to describe your experience.</p></div>',
        'backgroundColor'=>'rgb(79, 157, 213)',
        'fontColor'=>'#fff'
        ];
        return view('HR.userProfile.coverletter.coverTemplete2', $data);
    }
    public function viewCover3()
    {
        $user_id = auth()->user()->user_id;
        $role_users= role_user::select()->where('user_id',$user_id)->get();
        $user_info=userdetail::where('active','1')
        ->where('user_id','=',$user_id)->first();

        $data=['user_info' => $user_info,
        'date' => 'date',
        'company' => 'company',
        'companywebsite' => 'www.your-website.com',
        'companyphone' => '111-222-3333',
        'companyemail' => 'your.name@example.com',
        'deartTitle'=>'Dear',
        'coverText' =>'<p sr-r-where><span sr-r-fld="where">Company Name</span>, <span sr-r-fld="location">Location</span></p><p sr-r-dates><span sr-r-fld="fromMonth">Jan</span> <span sr-r-fld="fromYear">2013</span> &ndash; <span sr-r-fld="toMonth">Dec</span> <span sr-r-fld="toYear">2013</span></p><div sr-r-fld="html"> <p>Describe your job responsibilities, accomplishments and technologies you have used. It is highly recommended that you use bullet points to describe your experience.</p></div>',
        'backgroundColor'=>'rgb(79, 157, 213)',
        'fontColor'=>'#fff'
        ];
        return view('HR.userProfile.coverletter.coverTemplete3', $data);
    }
}
