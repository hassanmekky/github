<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

use App\RefusedCourses;

class RefuseCourse extends Notification
{
    use Queueable;

    
    protected $refused;

    public function __construct(RefusedCourses $refused)
    {
        $this->refused = $refused;
    }

   
    public function via($notifiable)
    {
        return ['database'];
    }

    
    
    public function toArray($notifiable)
    {
        return [

            'user' => 'Admin',
           
            'data' => 'تم رقض نشر دورتك ' . $this->refused->course()->value('course_name') .'  وذلك ' . $this->refused->reasons . ' المزيد'
        ];
    }
}
