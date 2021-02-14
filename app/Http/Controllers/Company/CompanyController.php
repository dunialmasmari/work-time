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
use validator;
use Carbon\Carbon;
use App\Models\job;
use App\Models\Advertising;





class CompanyController extends Controller
{
    public function userInfo()
    {       $user_id = auth()->user()->user_id;
            $role_users= role_user::select()->where('user_id',$user_id)->get();
            $user_info=compnyInfo::where('active','1')
            ->where('user_id','=',$user_id)
            ->get();
             $data=['user_info' => $user_info];

        return view('HR.company.userInfo',$data);
    }
    public function updateInfo(Request $request)
    {  $user_id = auth()->user()->user_id;
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
            return redirect()->route('userInfo')->with(['compnyInfo' => $compnyInfo]);
            //return view('admin.job.job_list',['jobs' => $jobs]);
        }
        else{
            return response()->json(['message' => 'job not found'], 404);
        }
    }
    public function updateLogo(Request $request)
    {  $user_id = auth()->user()->user_id;
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
       
    }
    public function viewJobs()
    {
            $user_id = auth()->user()->user_id;
            $role_users= role_user::select()->where('user_id',$user_id)->get();
            $jobs=job::join('majors','jobs.major_id','=','majors.major_id')
            ->select('majors.major_name','jobs.*')
             ->where('jobs.user_id','>=',$user_id)
             ->orderByRaw('jobs.start_date DESC')
             ->paginate(8);
            
             $data=[
                   'jobs' => $jobs,
                  ];
        return view('HR.company.job_list',$data);
    }
    public function addJob()
    {
        $majors=Major::select()->get();
        return view('HR.company.job_add',['majors' => $majors]);
    }
    public function storeJob(Request $request){
        $user_id = auth()->user()->user_id;
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
        $job->active = $request->input('active');
        $job->location = implode(",", $request->input('location'));
        if($request->hasfile('image'))
        {
        $imagename = time().'.'.$request->file('image')->extension();
        $result = $request->file('image')->move(public_path().'/assets/uploads/jobs/images/', $imagename); //store('files');
        $job->image = $imagename;
        }
        $job->save();
      
        $jobs = Job::join('majors', 'jobs.major_id', '=', 'majors.major_id')
        ->select('majors.major_name', 'jobs.*' )->get();
        return redirect()->route('viewJobs')->with(['jobs' => $jobs]);
    }
    public function viewTenders()
    {     
        $user_id = auth()->user()->user_id;
        $tenders = tender::join('majors', 'tenders.major_id', '=', 'majors.major_id')
        ->select('majors.major_name', 'tenders.*' )
        ->where('tenders.user_id','=',$user_id)->get();
        $data=[
            'tenders' => $tenders,
           ];
      return view('HR.company.tenders_list',$data);

    }
    public function addTender()
    {
        $majors=Major::select()->get();
        return view('HR.company.tender_add',['majors' => $majors]);
    }
    public function storeTender(Request $request){
        $user_id = auth()->user()->user_id;
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
        $tender->active = $request->input('active');
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
      
        $tenders = tender::join('majors', 'tenders.major_id', '=', 'majors.major_id')
        ->select('majors.major_name', 'tenders.*' )->get();
            //return view('admin.tender.tender_list',['tenders' => $tenders]);
            return redirect()->route('viewTenders')->with(['tenders' => $tenders]);
    }









    public function viewApplications()
    {
            $date=Carbon::today();
            $tenders=tender::where('active','1')
            ->where('deadline','>=',$date)
            ->where('start_date','<=',$date)
            ->orderByRaw('start_date DESC')
            ->paginate(4);
            
            $jobs=job::join('majors','jobs.major_id','=','majors.major_id')
            ->select('majors.major_name','jobs.*')
            ->where('jobs.active','1')
             ->where('jobs.deadline','>=',$date)
             ->where('jobs.start_date','<=',$date)
             ->orderByRaw('jobs.start_date DESC')
             ->paginate(4);

             $advers=Advertising::select('*')->where('active','1')->get();
             //print_r($advers);
            
             $data=['tenders' => $tenders,
                   'jobs' => $jobs,
                   'advers'=>$advers,
                  ];

        return view('HR.home',$data);
    }
    public function viewJobApplications()
    {
            $date=Carbon::today();
            $tenders=tender::where('active','1')
            ->where('deadline','>=',$date)
            ->where('start_date','<=',$date)
            ->orderByRaw('start_date DESC')
            ->paginate(4);
            
            $jobs=job::join('majors','jobs.major_id','=','majors.major_id')
            ->select('majors.major_name','jobs.*')
            ->where('jobs.active','1')
             ->where('jobs.deadline','>=',$date)
             ->where('jobs.start_date','<=',$date)
             ->orderByRaw('jobs.start_date DESC')
             ->paginate(4);

             $advers=Advertising::select('*')->where('active','1')->get();
             //print_r($advers);
            
             $data=['tenders' => $tenders,
                   'jobs' => $jobs,
                   'advers'=>$advers,
                  ];

        return view('HR.home',$data);
    }
    public function applicationsDetail()
    {
            $date=Carbon::today();
            $tenders=tender::where('active','1')
            ->where('deadline','>=',$date)
            ->where('start_date','<=',$date)
            ->orderByRaw('start_date DESC')
            ->paginate(4);
            
            $jobs=job::join('majors','jobs.major_id','=','majors.major_id')
            ->select('majors.major_name','jobs.*')
            ->where('jobs.active','1')
             ->where('jobs.deadline','>=',$date)
             ->where('jobs.start_date','<=',$date)
             ->orderByRaw('jobs.start_date DESC')
             ->paginate(4);

             $advers=Advertising::select('*')->where('active','1')->get();
             //print_r($advers);
            
             $data=['tenders' => $tenders,
                   'jobs' => $jobs,
                   'advers'=>$advers,
                  ];

        return view('HR.home',$data);
    }
}