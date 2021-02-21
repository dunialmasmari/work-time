<?php

namespace App\Http\Controllers\Job;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Major;
use App\Mail\ApplyJob\ApplayingJobMail;
use Mail;
use App\Models\JobApplyer;
use Carbon\Carbon;
set_time_limit(300);
use App\Models\Advertising;


class JobController extends Controller
{
    
    public function viewJobs()
    {
        $date=Carbon::today();
        $jobs=job::where('active','1')
        ->where('deadline','>=',$date)
        ->where('start_date','<=',$date)
        ->orderByRaw('start_date DESC')
        ->paginate(8);
        $data=['jobs' => $jobs,];

        return view('HR.jobs',$data);
    }

    public function viewJobId($id)
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
            return view('HR.jobDetails',$data);           
         } 
        else 
        {
        return response()->json(["message" => "Job not found!"], 404);
        }
                 
    } 
    public function sendCV(Request $request)
    {

        if($request->hasfile('user_cv'))
            {
            $user_cv_f = time().'.'.$request->file('user_cv')->extension();
            $result = $request->file('user_cv')->move(public_path().'/assets/Jobs_req/user_cv', $user_cv_f); //store('files');
            $user_cv = $user_cv_f;
            }
            if($request->hasfile('user_recommendation'))
            {
            $user_recommendation = time().'.'.$request->file('user_recommendation')->extension();
            $result = $request->file('user_recommendation')->move(public_path().'/assets/Jobs_req/user_recom', $user_recommendation); //store('files');
            $user_recom = $user_recommendation;
            }
            else
            {
                $user_recom = null;
            }
            
        $data=[
            'job_id'=> $request->job_id,
            'job_name'=> $request->job_name,
            'user_name' =>$request->user_name,
            'comp_name' =>$request->comp_name,
            'comp_email' => $request->comp_email,
            'user_email' => $request->user_email,
            'user_cv'=> $user_cv,
            'user_recom'=> $user_recom,
        ];
        

        //print_r($data);
        Mail::to($request->comp_email)->send(new ApplayingJobMail($data));

        $applyer=new jobapplyer();
        $applyer->job_id = $request->job_id;
        $applyer->user_name = $request->user_name;
        $applyer->user_email = $request->user_email;
        $applyer->cv_file = $user_cv;
        $applyer->recom_file = $user_recom;
        $applyer->save();

       return redirect()->back()->with(['success' => __('fields_web.apisuccessmesages.title')]);
    }
}
