<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

use App\Course;

class NewCourseSub extends Notification
{
    use Queueable;

    
    protected $course;

    public function __construct(Course $course)
    {
        $this->course = $course;
    }

    
    public function via($notifiable)
    {
        return ['database'];
    }


    public function toArray($notifiable)
    {
        return [
           'data' => 'عضو جديد أشترك فى دورة' .  $this->course->course_name
        ];
    }
}
