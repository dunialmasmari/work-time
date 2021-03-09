<?php

namespace App\Console\Commands;
 
use Illuminate\Console\Command;
use App\Models\Tender;
use App\Models\userProf;
use App\Models\userNotify;
use App\Models\interstedTendersJob;
use Illuminate\Support\Facades\Mail; 
use App\Mail\Notifies\NotifyEmail;
use Carbon\Carbon;
use App\Models\RealTimeNotification;

class TenderNotify extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:notify_email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send notify email for all users if any tender show in home site every day';

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
        {
            $date=Carbon::today();
            $tenders=tender::join('majors','tenders.major_id','=','majors.major_id')
            ->select('majors.major_name','tenders.*')
            ->where('tenders.active','1')
            ->where('tenders.start_date',$date)->get(); //get all tenders where active and show today
            //print_r($tenders); echo $date;

          foreach($tenders as $tender)
            {
                $users=interstedTendersJob::all();
            foreach($users as $user)
            {   if($user->type== 2  )
               {
                $majorsArray= explode(', ', $user->major_id);
                foreach($majorsArray as $major)
                {
                 if($major == 0 || $major ==  $tender->major_id)
                   {
                    $data=[
                        'major_name'=>$tender->major_name,
                        'tender_id'=> $tender->tender_id,
                        'major_id'=> $tender->major_id,
                        'title'=> $tender->title,
                        'image'=>$tender->image,
                        'company'=> $tender->company,
                        'location'=> $tender->location,
                        'email'=>$user->email,
                    ];
                    
                    $delay=now()->addSeconds(20);
                    Mail::To($user->email)->send(new NotifyEmail ($data) );
                   }
                }
               }

               if($user->type== 3  )
               {
                $majorsArray= explode(', ', $user->major_id);
                foreach($majorsArray as $major)
                {
                   if($major == 0 || $major == $tender->major_id )
                   {
                    $data=[
                        'type'=>'tender',
                        'major_name'=>$tender->major_name,
                        'tender_id'=> $tender->tender_id,
                        'major_id'=> $tender->major_id,
                        'title'=> $tender->title,
                        'image'=>$tender->image,
                        'company'=> $tender->company,
                        'location'=> $tender->location,
                        'email'=>$user->email,
                    ];

                    /* $dateday=Carbon::today();
                    $dateNow = Carbon::parse($dateday)->format('Y - m - d');
                      $notify=RealTimeNotification::create([
                            'type'=>'add-tender',
                            'id_type'=>$tender->tender_id,
                            'see_it'=>0,
                            'create_time'=>$dateday,
                        ]); */

                    
                    $delay=now()->addSeconds(20);
                    Mail::To($user->email)->send(new NotifyEmail ($data) );
                   }
                }
               }
            }
               
            $dateday=Carbon::today();
            $dateNow = Carbon::parse($dateday)->format('Y - m - d');
              $notify=RealTimeNotification::create([
                    'type'=>'add-tender',
                    'id_type'=>$tender->tender_id,
                    'see_it'=>0,
                    'create_time'=>$dateday,
                ]);
        
                //for more majors and more location 
                //$user=userprof::select('userProfs_email')->get();
                //$emails=userprof::pluck('userProfs_email')->toArray(); //get all email of table that want notify emails for all tenders
/*                 $users=userNotify::select('user_email','major_name','location_name')->get();
                foreach($users as $user)
                   { 
                    $major_ar=explode(',', $user->major_name);
                    $location_ar=explode(',', $user->location_name);
                    $tender_loc_ar=explode(',', $tender->location);
                        foreach($major_ar as $maj)
                        { 
                            
                            if($tender->major_name == $maj)
                            {
                                foreach($location_ar as $loc)
                                {
                                    foreach($tender_loc_ar as $loc_tend)

                                   { 
                                       if($loc_tend == $loc)
                                    {
                                        $data=[
                                                    'major_name'=>$tender->major_name,
                                                    'tender_id'=> $tender->tender_id,
                                                    'major_id'=> $tender->major_id,
                                                    'title'=> $tender->title,
                                                    'image'=>$tender->image,
                                                    'company'=> $tender->company,
                                                    'location'=> $tender->location,
                                                ];
                                                 echo $user->user_email;
                                                 print_r($data);
                                                 $delay=now()->addSeconds(20);
                                                 Mail::To($user->user_email)->send(new NotifyEmail ($data) );
                                                //$job = (Mail::To($user->user_email)->send(new NotifyEmail ($data) ));
                                                //->delay($delay);
                                                 //echo $delay;
                                                    
                                                 
                                    
                                           //dispatch($job);
                                                
                                            //break;
                                    }
                                    else
                                    {
                                      continue;
                                    }
                                   }
                                }
                                
                            }
                            else
                            {
                                continue;
                            }
                            
                        }
                   } */
            }
         }
    
    }
     /*  { 
        $date=Carbon::today();
        $tenders=tender::join('majors','tenders.major_id','=','majors.major_id')
        ->select('majors.major_name','tenders.*')
        ->where('tenders.active','1')
        ->where('tenders.start_date',$date)->get(); //get all tenders where active and show today
      foreach($tenders as $tender)
        {
            //$user=userprof::select('userProfs_email')->get();
            //$emails=userprof::pluck('userProfs_email')->toArray(); //get all email of table that want notify emails for all tenders
            $users=usernotifies::select('user_email','major_name','location_name')->get();
            foreach($users as $user)
               { 
                   if(array_search($tender->major_name, $user->major_name)==true)
                   {
                      if(array_search($tender->location, $user->location_name)==true)
                      {
                        $data=[
                            'major_name'=>$tender->major_name,
                            'tender_id'=> $tender->tender_id,
                            'major_id'=> $tender->major_id,
                            'title'=> $tender->title,
                            'image'=>$tender->image,
                            'company'=> $tender->company,
                        ];
                           //Mail::To($email)->send(new NotifyEmail ($data) ); //send notify
                      }

                   }
                   
               }
        }
     }*/
}
