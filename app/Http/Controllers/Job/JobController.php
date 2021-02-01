<?php

namespace App\Http\Controllers\Job;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Major;
use App\Mail\ApplyJob\ApplayingJobMail;
use Mail;
set_time_limit(300);

class JobController extends Controller
{
    
    public function viewJobs()
    {
        $jobs=job::where('active','1')
        ->where('deadline','>=',now())
        ->where('start_date','<=',now())
        ->orderByRaw('start_date DESC')
        ->paginate(2);
        $data=['jobs' => $jobs];

        return view('HR.jobs',$data);
    }

    public function viewJobId($id)
    {
        
        $jobs=job::join('majors','jobs.major_id','=','majors.major_id')
        ->select('majors.major_name','jobs.*')
        ->where('jobs.job_id', $id);
        
        $jobsAll=job::where('active','1')
        ->where('deadline','>=',now())
        ->where('start_date','<=',now())
        ->orderByRaw('start_date DESC')
        ->get();
        //$data=['jobs' => $jobs];
        
        if ($jobs->exists())
        {
            $reqs=job::select('requerment')->where('job_id', $id)->get();
            $reqs_ar=json_decode($reqs);
            $jobs=$jobs->get();
            $data=['jobs' => $jobs,
                   'jobsAll' => $jobsAll,
                   'reqs_ar' => $reqs_ar
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
            'comp_email' => $request->comp_email,
            'user_email' => $request->user_email,
            'user_cv'=> $user_cv,
            'user_recom'=> $user_recom,
        ];

        //print_r($data);
        Mail::to($request->comp_email)->send(new ApplayingJobMail($data));
       return redirect()->back()->with(['success' => __('fields_web.apisuccessmesages.title')]);
    }
}
