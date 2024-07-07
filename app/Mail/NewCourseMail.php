<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewCourseMail extends Mailable
{
    use Queueable, SerializesModels;

    public $subscriber;
    public $course;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subscriber, $course)
    {
        $this->subscriber = $subscriber;
        $this->course = $course;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subscriber = $this->subscriber;
        $course = $this->course;
        return $this->subject('دورة جديدة')
            ->view('front.student.emails.new-course-mail', compact('subscriber', 'course'));
    }
}
