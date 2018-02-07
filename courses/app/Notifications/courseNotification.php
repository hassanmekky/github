<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

use App\Alert;

class courseNotification extends Notification
{
    use Queueable;

  

    protected $alert;

    public function __construct(Alert $alert)
    {
       $this->alert = $alert;
    }

   
    public function via($notifiable)
    {
        return ['database'];
    }

  

    public function toArray($notifiable)
    {
        return [
            'user' => 'المدرس',
            'data' => 'تنويه جديد :' .  $this->alert->title . '<br> فى' .$this->alert->course()->value('course_name')
        ];
    }
}
