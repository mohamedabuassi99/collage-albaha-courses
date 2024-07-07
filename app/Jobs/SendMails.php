<?php

namespace App\Jobs;

use App\Mail\SendMailToAll;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Mail;

class SendMails implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $registrations;

    //  public $course_name;
    public function __construct($registrations)
    {
        $this->registrations = $registrations;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach ($this->registrations as $registration) {
            Mail::to($registration->student->email)->send(new SendMailToAll($registration->student, $registration->course));
        }
    }
}
