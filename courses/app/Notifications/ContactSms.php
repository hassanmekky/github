<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

use App\Contact;

class ContactSms extends Notification
{
    use Queueable;

    protected $contact;

    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }

    
    public function via($notifiable)
    {
        return ['database'];
    }

    
    public function toArray($notifiable)
    {
        return [

            'data' => '<h4>' . $this->contact->name .
             '<small><i class="fa fa-clock-o"></i> 5 mins</small></h4><p>'
              . $this->contact->message . '</p>'
        ];
    }
}
