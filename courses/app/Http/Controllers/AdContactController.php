<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use Mail;

class AdContactController extends Controller
{
    public function showmails()
    {
    	$mails = Contact::all();
    	return view(app('adthem') . '.mailbox' ,compact('mails'));
    }

    public function compose(Contact $contact)
    {
    	return view(app('adthem') . '.compose',compact('contact'));
    }

    public function send(Request $request)
    {
    	$title = $request->input('subject');
        $content = $request->input('content');
        $to = $request->input('email');

        Mail::send('emails.contact-response', ['title' => $title, 'content' => $content], function ($message) use($to,$title)
        {

        	$message->subject($title);
            $message->from('elalom@gmail.com', 'Admin Ahmed');

            $message->to($to);

        });

        return back();
    }
}
