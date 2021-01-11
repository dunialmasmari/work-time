<?php

namespace App\Console\Commands;
 
use Illuminate\Console\Command;
use App\Models\Tender;
use App\Models\userProf;
use Illuminate\Support\Facades\Mail; 
use App\Mail\Notifies\NotifyEmail;
use Carbon\Carbon;

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
        $date=Carbon::today();
        $tenders=tender::join('majors','tenders.major_id','=','majors.major_id')
        ->select('majors.major_name','tenders.*')
        ->where('tenders.active','1')
        ->where('tenders.start_date',$date)->get(); //get all tenders where active and show today
      foreach($tenders as $tender)
        {
            //$user=userprof::select('userProfs_email')->get();
            $emails=userprof::pluck('userProfs_email')->toArray(); //get all email of table that want notify emails for all tenders
                foreach($emails as $email)
               { 
                   $data=[
                    'major_name'=>$tender->major_name,
                    'tender_id'=> $tender->tender_id,
                    'major_id'=> $tender->major_id,
                    'title'=> $tender->title,
                    'image'=>$tender->image,
                    'company'=> $tender->company,
                ];
                   Mail::To($email)->send(new NotifyEmail ($data) ); //send notify 
               }
        }
     }
}
