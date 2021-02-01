<?php

namespace App\Mail\ApplyJob;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ApplayingJobMail extends Mailable
{
    use Queueable, SerializesModels;
        
      public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Job Applying')->view('email.jobsApplying') ;//->attach(public_path('/assets/Jobs_req/user_cv/'), [
                    //'as' => $this->data['user_cv'],
                    //'mime' => 'application/pdf',
               // ]);;
    }
}
