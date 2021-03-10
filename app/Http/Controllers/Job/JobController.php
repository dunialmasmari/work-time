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
    public function filterActiveTenderField()
    {
        $date=Carbon::today();
        $jobs=job::where('active','1')
        ->where('deadline','>=',$date)
        ->where('start_date','<=',$date)->get();
        $majors=Major::get();
        $major_ar=array();
        $compa_ar=array();
        $loca_ar=array();
        foreach($majors as $major)
        {  
            foreach($jobs as $job)
            {
                if($job->major_id == $major->major_id)
                {
                    $name=$major->major_name ; 
                    $id=$major->major_id;
                    $major_ar[]=['id'=>$id,'name'=>$name];
                break;
                }
            }
        }
        foreach($jobs as $job)
            {
                $compa_ar[]=$job->company;
            }
            //$compa_ar=array_unique($compa_ar);
        $compa_ar = array_values( array_flip( array_flip( $compa_ar ) ) );
        foreach($jobs as $job)
        {
           $ar= explode(',',$job->location);
           foreach($ar as $a){
            $loca_ar[]=$a;
           }
        }
        //$loca_ar=array_unique($loca_ar);
        $loca_ar = array_values( array_flip( array_flip( $loca_ar ) ) );
         
        $filters=['majors'=>$major_ar,'companies'=>$compa_ar,'locations'=>$loca_ar];
        //print_r($filters);

        return $filters;
    } 

    
    public function viewJob()
    {
        $date=Carbon::today();
        $jobs=job::where('active','1')
        ->where('deadline','>=',$date)
        ->where('start_date','<=',$date)
        ->orderByRaw('start_date DESC')
        ->paginate(20);
        $data=['jobs' => $jobs,];

        return view('HR.jobs',$data);
    }
    public function viewJobs(Request $request)
    {

        $filterFileds=  $this->filterActiveTenderField();
        $date=Carbon::today();

        $id=$request->input('major_id');
        $comp=$request->input('company');
        $loc=$request->input('location');
        $id_ar=$id;
        $comp_ar= $comp;
        $loc_ar=$loc;
        //////no filters 
        if($id == '' && $comp == '' && $loc == '') 
        {
            $jobs=job::where('active','1')
            ->where('deadline','>=',$date)
            ->where('start_date','<=',$date)
            ->orderByRaw('start_date DESC')
            ->paginate(20);
            $data=[
                'major_id'=>$id,
                'company'=>$comp,
                'location'=>$loc,
                'jobs'=>$jobs,
               
            ]+  $filterFileds;
           return view('HR.jobs',$data);
    
        }
        //////////filtter by major_id
        if($id != '' && $comp == '' && $loc == '')
        {
           $job= job::whereIn('major_id',$id_ar)->where('active','1')
           ->where('deadline','>=',$date)
           ->where('start_date','<=',$date)
           ->orderByRaw('start_date DESC')
           ->paginate(20);
                $data=[
                    'major_id'=>$id,
                    'company'=>$comp,
                    'location'=>$loc,
                    'jobs'=>$job,
                    
            ]+  $filterFileds;
               return view('HR.jobs',$data);
    
        }
                //////////filtter by company name
        if($id == '' && $comp != '' && $loc == '')
        {
            $jobs=   job::whereIn('company',$comp_ar)->where('active','1')
            ->where('deadline','>=',$date)
            ->where('start_date','<=',$date)
            ->orderByRaw('start_date DESC')
            ->paginate(20);
                $data=[
                    'major_id'=>$id,
                    'company'=>$comp,
                    'location'=>$loc,
                    'jobs'=>$jobs,
                   
            ]+  $filterFileds;
               return view('HR.jobs',$data);
        }
        //////////filtter by location 
        if($id == '' && $comp == '' && $loc != '')
        {
            $jo=[];
            $j =job::where('active','1')
            ->where('deadline','>=',$date)
            ->where('start_date','<=',$date)
            ->orderByRaw('start_date DESC')
            ->paginate(20);
               foreach($j as $job){
                   $jo_loc = explode(',', $job->location);
                  
                 foreach($loc_ar as $va){
                     foreach( $jo_loc as $joloc)
                    if($joloc == $va){
                        $jo[]=$job->job_id;
                       
                    }
                    }
               }
               $jobs =job::whereIn('job_id',  $jo)->where('active','1')
               ->where('deadline','>=',$date)
               ->where('start_date','<=',$date)
               ->orderByRaw('start_date DESC')
               ->paginate(20);
            $data=[
                    'major_id'=>$id,
                    'company'=>$comp,
                    'location'=>$loc,
                    'jobs'=>$jobs,
                   
            ]+  $filterFileds;
             
               return view('HR.jobs',$data);
        }
        //////////filtter by major_id and company name
        if($id != '' && $comp != '' && $loc == '')
        {
            $jobs= job::whereIn('major_id',$id_ar)->whereIn('company',$comp_ar)->where('active','1')
            ->where('deadline','>=',$date)
            ->where('start_date','<=',$date)
            ->orderByRaw('start_date DESC')
            ->paginate(20);
                    $data=[
                        'major_id'=>$id,
                        'company'=>$comp,
                        'location'=>$loc,
                        'jobs'=>$jobs,
                       
            ]+  $filterFileds;
                   return view('HR.jobs',$data);
        }
        //////////filtter by major_id and location
        if($id != '' && $comp == '' && $loc != '')
        {
            $j =job::whereIn('major_id',$id_ar)->where('active','1')
            ->where('deadline','>=',$date)
            ->where('start_date','<=',$date)
            ->orderByRaw('start_date DESC')
            ->paginate(20);


            $jo=[];

              
            foreach($j as $job){
                $jo_loc = explode(',', $job->location);
               
              foreach($loc_ar as $va){
                  foreach( $jo_loc as $joloc)
                 if($joloc == $va){
                     $jo[]=$job->job_id;
                    
                 }
                 }
            }
            $jobs =job::whereIn('job_id',  $jo)->where('active','1')
            ->where('deadline','>=',$date)
            ->where('start_date','<=',$date)
            ->orderByRaw('start_date DESC')
            ->paginate(20);
         $data=[
                 'major_id'=>$id,
                 'company'=>$comp,
                 'location'=>$loc,
                 'jobs'=>$jobs,
                
         ]+  $filterFileds;
          
            return view('HR.jobs',$data);
        }
        //////////filtter by company name and location
        if($id == '' && $comp != '' && $loc != '')
        {
            $j =job::whereIn('company',$comp_ar)->where('active','1')
            ->where('deadline','>=',$date)
            ->where('start_date','<=',$date)
            ->orderByRaw('start_date DESC')
            ->paginate(20);

            $jo=[];

              
            foreach($j as $job){
                $jo_loc = explode(',', $job->location);
               
              foreach($loc_ar as $va){
                  foreach( $jo_loc as $joloc)
                 if($joloc == $va){
                     $jo[]=$job->job_id;
                    
                 }
                 }
            }
            $jobs =job::whereIn('job_id',  $jo)->where('active','1')
            ->where('deadline','>=',$date)
            ->where('start_date','<=',$date)
            ->orderByRaw('start_date DESC')
            ->paginate(20);
         $data=[
                 'major_id'=>$id,
                 'company'=>$comp,
                 'location'=>$loc,
                 'jobs'=>$jobs,
                
         ]+  $filterFileds;
          
            return view('HR.jobs',$data);
        }
        //////////filtter by major id , company name and location
        if($id != '' && $comp != '' && $loc != '')
        {
            $j =job::whereIn('major_id',$id_ar)->whereIn('company',$comp_ar)->where('active','1')
            ->where('deadline','>=',$date)
            ->where('start_date','<=',$date)
            ->orderByRaw('start_date DESC')
            ->paginate(20);
            $jo=[];

              
            foreach($j as $job){
                $jo_loc = explode(',', $job->location);
               
              foreach($loc_ar as $va){
                  foreach( $jo_loc as $joloc)
                 if($joloc == $va){
                     $jo[]=$job->job_id;
                    
                 }
                 }
            }
            $jobs =job::whereIn('job_id',  $jo)->where('active','1')
            ->where('deadline','>=',$date)
            ->where('start_date','<=',$date)
            ->orderByRaw('start_date DESC')
            ->paginate(20);
         $data=[
                 'major_id'=>$id,
                 'company'=>$comp,
                 'location'=>$loc,
                 'jobs'=>$jobs,
                
         ]+  $filterFileds;
          
            return view('HR.jobs',$data);
        }
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
        $advers=Advertising::select('*')->where('active','1')->where('Advertising_Position','2')->get();
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
