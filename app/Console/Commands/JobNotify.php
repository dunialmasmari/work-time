<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Job;
use App\Models\interstedTendersJob;
use App\Models\userNotify;
use Illuminate\Support\Facades\Mail; 
use App\Mail\Notifies\NotifyEmailJop;
use Carbon\Carbon;

class JobNotify extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:notify_email2';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send notify email for all users if any job show in home site every day';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $date=Carbon::today();
        $jobs=job::join('majors','jobs.major_id','=','majors.major_id')
        ->select('majors.major_name','jobs.*')
        ->where('jobs.active','1')
        ->where('jobs.start_date',$date)->get(); //get all jobs where active and show today
        //print_r($jobs); echo $date;
        
        foreach ($jobs as $job )
        {
            $users=interstedTendersJob::all();
            foreach($users as $user)
            {   if($user->type== 2  )
               {
                  $majorsArray= explode(', ', $user->major_id);
                  foreach($majorsArray as $major)
                  {
                   if($major == 0 || $major == $job->major_id)
                   {
                    $data=[
                        'type'=>'job',
                        'major_name'=>$job->major_name,
                        'job_id'=> $job->job_id,
                        'major_id'=> $job->major_id,
                        'title'=> $job->title,
                        'image'=>$job->image,
                        'company'=> $job->company,
                        'location'=> $job->location,
                        'email'=>$user->email,
                    ];
                    
                    $delay=now()->addSeconds(20);
                    Mail::To($user->email)->send(new NotifyEmailJop ($data) );
                   }
                }
               }

               if($user->type== 3  )
               {
                $majorsArray= explode(', ', $user->major_id);
                foreach($majorsArray as $major)
                {
                   if($major == 0 || $major == $job->major_id )
                   {
                    $data=[
                        'major_name'=>$job->major_name,
                        'job_id'=> $job->job_id,
                        'major_id'=> $job->major_id,
                        'title'=> $job->title,
                        'image'=>$job->image,
                        'company'=> $job->company,
                        'location'=> $job->location,
                        'email'=>$user->email,
                    ];
                    
                    $delay=now()->addSeconds(20);
                    Mail::To($user->email)->send(new NotifyEmailJop ($data) );
                   }
               }
            }
           }
        }
     
    }
}
