<?php

namespace App\Http\Controllers\Job;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Major;

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
        
        
        if ($jobs->exists())
        {
            $jobs=$jobs->get();
            $data=['jobs' => $jobs];
            return view('HR.jobDetails',$data);           
         } 
        else 
        {
        return response()->json(["message" => "Job not found!"], 404);
        }
                 

    } 
}
