<?php

namespace App\Http\Controllers\Job;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function viewJobs()
    {
        return view('HR.jobs');
    }

    public function viewJobId($id)
    {
        
        return view('HR.jobDetails');           

    } 
}
