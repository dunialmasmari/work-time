<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\role_user;
use App\Models\tender;
use App\Models\userdetail;
use App\User;
use App\Models\cv_skill;
use App\Models\cv_recommendation;
use App\Models\cv_detail;
use App\Models\Major;
use Illuminate\Support\Collection;
use App\Models\Advertising;
use App\Models\blog;
use App\Models\compnyInfo;
use App\Models\service;
use validator;
use Carbon\Carbon;
use App\Models\job;
use PDF;
use Illuminate\Support\Facades\DB;

use App\Models\resume_report;



class ReportController extends Controller
{
    public function index()
    {       $user_id = auth()->user()->user_id;
            
          //  dd($compnyInfo,$user_info);


            
            

            $user_info=userdetail::latest()->take(5)->get();
            $compnyInfo=compnyInfo::latest()->take(5)->get();
 
            
            $usercomp= User::Join('compnyinfo', 'users.user_id', '=', 'compnyinfo.user_id')->
            select('users.user_id')->get();
            
            
            $jobsbycompany= User::Join('compnyinfo', 'users.user_id', '=', 'compnyinfo.user_id')->
             leftJoin('jobs', 'users.user_id', '=', 'jobs.user_id')
            ->select('compnyinfo.companyName',  'jobs.title','jobs.image','jobs.posted_date', 'jobs.start_date','jobs.deadline','jobs.active')
            ->whereIn('users.user_id', $usercomp)->groupBy('users.user_id')->latest('jobs.created_at')->take(5)->get();
            
            //  return dd($usercomp);
            $tendersbycompany= User::Join('compnyinfo', 'users.user_id', '=', 'compnyinfo.user_id')->
            leftJoin('tenders', 'users.user_id', '=', 'tenders.user_id')
            ->select('compnyinfo.companyName',  'tenders.title','tenders.image','tenders.posted_date', 'tenders.start_date','tenders.deadline','tenders.active')
            ->whereIn('users.user_id', $usercomp)->groupBy('users.user_id')->latest('tenders.created_at')->take(5)->get();
            //  dd( $jobsbycompany);
            //$Advertisement =  Advertising::get()->count();
           
            
            $jobtotal= job::get()->count();
            $tendertotal= tender::get()->count();
            $blogs=blog::get()->count();
            $services=service::get()->count();
            $totalcompanies = compnyInfo::get()->count();
            $totalusers=userdetail::get()->count();
            $resumetotal= resume_report::where('type','1')->get()->count();
            $coverletter= resume_report::where('type','2')->get()->count();
             
            $data=[
            'jobtotal' =>$jobtotal,
            'tendertotal'=>$tendertotal,
            'blogs'=>$blogs,
            'services'=>$services,
            'totalcompanies'=>$totalcompanies,
            'totalusers'=>$totalusers,
            'resumetotal'=>$resumetotal,
            'coverletter'=>$coverletter,
            'user_info'=>$user_info,
            'compnyInfo'=>$compnyInfo,
            'jobsbycompany'=>$jobsbycompany,
            'tendersbycompany'=>$tendersbycompany,

            ];
            //dd($data);
          //  return response()->json(['message' => 'service not found'], 404);
          return view('admin.home', $data);
    }
    public function reports()
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


            $Advertisement =  Advertising::get()->count();
            $Advertising_Positions =  Advertising::groupBy('Advertising_Position')->select('Advertising_Position', \DB::raw('count(*) as Total'))->get();
            $label=[];
            $addata=[];
            foreach( $Advertising_Positions as $ads){
                $labels[]=$ads->Advertising_Position;
                $addata[]=$ads->Total;
            }
            $blogs=blog::get()->count();
            $services=service::get()->count();
            $allusers=User::get()->count();
            $active_users=userdetail::where('active','1')->get()->count();
            $unactive_users=userdetail::where('active','0')->get()->count();
            $user_info=userdetail::get()->count();
            $active_company = compnyInfo::where('active','1')->get()->count();
            $unactive_company = compnyInfo::where('active','0')->get()->count();
            $compnyInfo = compnyInfo::get()->count();
            $usercomp= User::Join('compnyinfo', 'users.user_id', '=', 'compnyinfo.user_id')->
            select('users.user_id')->get();
             $jobsbycompany= User::Join('compnyinfo', 'users.user_id', '=', 'compnyinfo.user_id')->
             leftJoin('jobs', 'users.user_id', '=', 'jobs.user_id')
            ->select('compnyinfo.companyName', DB::raw('COUNT(jobs.job_id) as total_jobs'))
            ->whereIn('users.user_id', $usercomp)->groupBy('users.user_id')->get();
            $joblabel=[];
            $jobdata=[];
            foreach( $jobsbycompany as $ads){
                $joblabel[]=$ads->companyName;
                $jobdata[]=$ads->total_jobs;
            }
          
         //  return dd($usercomp);
            $tendersbycompany= User::Join('compnyinfo', 'users.user_id', '=', 'compnyinfo.user_id')->
            leftJoin('tenders', 'users.user_id', '=', 'tenders.user_id')
            ->select('compnyinfo.companyName', DB::raw('COUNT(tenders.tender_id) as total_tenders'))
            ->whereIn('users.user_id', $usercomp)->groupBy('users.user_id')->get();
            $tenderlabel=[];
            $tenderdata=[];
            foreach( $tendersbycompany as $ads){
                $tenderlabel[]=$ads->companyName;
                $tenderdata[]=$ads->total_tenders;
            }
            $jobactivetotal= job::where('active','1')->get()->count();
            $jobunactivetotal= job::where('active','0')->get()->count();
            $jobtotal= job::get()->count();
            $tenderactivetotal= tender::where('active','1')->get()->count();
            $tenderunactivetotal= tender::where('active','0')->get()->count();
            $tendertotal= tender::get()->count();
            $resumetotal= resume_report::where('type','1')->get()->count();
            $viewCv1= resume_report::where('name','viewCv1')->get()->count();
            $viewCv2= resume_report::where('name','viewCv2')->get()->count();
            $viewCv3= resume_report::where('name','viewCv3')->get()->count();
            $coverletter= resume_report::where('type','2')->get()->count();
            $coverletter1= resume_report::where('name','coverletter1')->get()->count();
            $coverletter2= resume_report::where('name','coverletter2')->get()->count();
            $coverletter3= resume_report::where('name','coverletter3')->get()->count();


            $data=[
             'Advertisement' => $Advertisement,
             'Adv_Plabels'=>$labels,
             'Adv_Pdata'=>$addata,
             'blogs' => $blogs,
             'services'=>$services,
             'allusers'=>$allusers,
            'user_info'=>$user_info,


            'joblabel'=>$joblabel,
            'jobdata'=>$jobdata,
            'tenderlabel'=>$tenderlabel,
            'tenderdata'=>$tenderdata,
            'active_company'=>$active_company,
            'unactive_company'=>$unactive_company,
            'compnyInfo'=>$compnyInfo,
            
             

            'jobactivetotal'=>$jobactivetotal,
            'jobunactivetotal'=>$jobunactivetotal,
            'jobtotal'=>$jobtotal,
            'tenderactivetotal'=>$tenderactivetotal,
            'tenderunactivetotal'=>$tenderunactivetotal,
            'tendertotal'=>$tendertotal,

            'resumetotal'=>$resumetotal,
            'viewCv1'=>$viewCv1,
            'viewCv2'=>$viewCv2,
            'viewCv3'=>$viewCv3,
             
            'coverletter'=>$coverletter,
            'coverletter1'=>$coverletter1,
            'coverletter2'=>$coverletter2,
            'coverletter3'=>$coverletter3
              
            ];
            //dd($data);
          //  return response()->json(['message' => 'service not found'], 404);
          return view('admin.Reports', $data);
    }
}
