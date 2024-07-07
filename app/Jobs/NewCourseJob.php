<?php

namespace App\Jobs;

use App\Mail\NewCourseMail;
use App\Models\SubscriberNotice;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Mail;

class NewCourseJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $subscribers;
    public $course;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($subscribers, $course)
    {
        $this->subscribers = $subscribers;
        $this->course = $course;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach ($this->subscribers as $subscriber) {
            Mail::to($subscriber->email)->send(new NewCourseMail($subscriber,$this->course));
        }
    }
}
