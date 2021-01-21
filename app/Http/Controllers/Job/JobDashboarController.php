<?php

namespace App\Http\Controllers\Job;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Major;

class JobDashboarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Job::join('majors', 'jobs.major_id', '=', 'majors.major_id')
        ->select('majors.major_name', 'jobs.*' )->get();
            return view('admin.job.job',['jobs' => $jobs]);
    }

    public function addjob()
    {
        $majors=Major::select()->get();
        return view('admin.job.addjob',['majors' => $majors]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $job = new job();
        $job->user_id = $request->input('user_id');
        $job->major_id = $request->input('major_id');
        $job->title = $request->input('title');
        $job->company = $request->input('company');
        $job->description = $request->input('description');
        $job->apply_link = $request->input('apply_link');
        $job->start_date = $request->input('start_date');
        $job->deadline = $request->input('deadline');
        $job->posted_date = $request->input('posted_date');
        $job->active = $request->input('active');
        $job->location = $request->input('location');
        if($request->hasfile('image'))
        {
        $imagename = time().'.'.$request->file('image')->extension();
        $result = $request->file('image')->move(public_path().'/images/job_img/', $imagename); //store('files');
        $job->image = $imagename;
        }
        $job->save();
      
        $jobs = Job::join('majors', 'jobs.major_id', '=', 'majors.major_id')
        ->select('majors.major_name', 'jobs.*' )->get();
            return view('admin.job.job',['jobs' => $jobs]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $job = job::join('majors', 'jobs.major_id', '=', 'majors.major_id')
        ->select('majors.major_name', 'jobs.*' )->where('jobs.job_id', $id);
        if($job->exists())
        {
            $jobs = $job->get();
            $majors=Major::select()->get();
            return view('admin.job.editejob',['jobs'=> $jobs, 'majors' => $majors]);
        }
        else{
            return response()->json(['message' => 'You do not have active job '], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatejob(Request $request)
    {
        $job = job::where('job_id',$request->job_id);
        if($job->exists())
        {
            $job->title = $request->input('title');
            $job->company = $request->input('company');
            $job->description = $request->input('description');
            $job->apply_link = $request->input('apply_link');
            $job->start_date = $request->input('start_date');
            $job->deadline = $request->input('deadline');
            $job->posted_date = $request->input('posted_date');
            $job->active = $request->input('active');
            $job->location = $request->input('location');
            if($request->image != '')
            {
                if($request->hasfile('image'))
                {
                    $imagename = time().'.'.$request->file('image')->extension();
                    $result = $request->file('image')->move(public_path().'/images/job_img/', $imagename); //store('files');
                    $job->image = $imagename;
                }
                $job->Update(['title' => $job->title, 'company' => $job->company, 'description' => $job->description,
                'apply_link' => $job->apply_link, 'location' => $job->location, 'start_date' => $job->start_date,
                'deadline' => $job->deadline, 'posted_date' => $job->posted_date, 'active' => $job->active,
                'image' => $job->image,]);
            }
          else 
          {
            $job->Update($request->all());
          }
            $jobs = job::join('majors', 'jobs.major_id', '=', 'majors.major_id')
            ->select('majors.major_name', 'jobs.*' )->get();
            return view('admin.job.job',['jobs' => $jobs]);
        }
        else{
            return response()->json(['message' => 'job not found'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function jobactivation($id)
    {
        $job = job::where('job_id',$id)->where('active','1');
        if($job->exists())
        {
                $job->Update(['active' => '0']);
                $jobs = job::join('majors', 'jobs.major_id', '=', 'majors.major_id')
                ->select('majors.major_name', 'jobs.*' )->get();
                return view('admin.job.job',['jobs' => $jobs]);
        }
        else
        {
            $job = job::where('job_id',$id);
            $job->Update(['active' => '1']);
            $jobs = job::join('majors', 'jobs.major_id', '=', 'majors.major_id')
             ->select('majors.major_name', 'jobs.*' )->get();
                return view('admin.job.job',['jobs' => $jobs]);
        }
    }
}
