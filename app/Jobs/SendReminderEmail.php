<?php

namespace App\Jobs;

//use App\User;
use App\Jobs\Job;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendReminderEmail extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    protected $user;

    /**
     * Create a new job instance.
     *
     * @param  User  $user
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @param  Mailer  $mailer
     * @return void
     */
    public function handle()
    {
	//$this->info('Job Start');
	print_r($this->user);
	if ($this->attempts() > 3) {
	    //$this->failed();
	}
	exit;
//	if(1==1)
//	    $this->release();
	//$this->release();
	//$this->info('Job Finished');
    }
    
    public function failed()
    {
	//$this->failed =true;
        // Called when the job is failing...
	print_r('Failed');
    }
}