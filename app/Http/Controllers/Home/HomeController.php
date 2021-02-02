<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\tender;
use App\Models\Major;
use Illuminate\Support\Collection;
use validator;
use Carbon\Carbon;
use App\Models\job;




class HomeController extends Controller
{
    public function viewHome()
    {
            $tenders=tender::where('active','1')
            ->where('deadline','>=',now())
            ->where('start_date','<=',now())
            ->orderByRaw('start_date DESC')
            ->paginate(4);
            
            $jobs=job::join('majors','jobs.major_id','=','majors.major_id')
            ->select('majors.major_name','jobs.*')
            ->where('jobs.active','1')
             ->where('jobs.deadline','>=',now())
             ->where('jobs.start_date','<=',now())
             ->orderByRaw('jobs.start_date DESC')
             ->paginate(4);
            $data=['tenders' => $tenders,
                   'jobs' => $jobs
                  ];

        return view('HR.home',$data);
    }
}
