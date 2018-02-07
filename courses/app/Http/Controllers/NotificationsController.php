<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\courseNotification;

use Auth;

use App\Notifications\SendAll;

use App\Alert;
use App\Course;
use App\Message;

use App\User;

use Illuminate\Support\Facades\Notification;
use StreamLab\StreamLabProvider\Facades\StreamLabFacades;


class NotificationsController extends Controller
{
   public function addalert(Request $request,Course $course)
   {

   	$alert = new Alert();

   	$alert->title = $request->title;

   	$alert->subject = $request->subject;

   	$alert->course_id = $course->id;

   	if($alert->save())
   	{
   		$users = $course->users()->get();

   		//Notification::send($users, new courseNotification($alert)) ;

   		foreach($users as $user)
   		{
   			$user->notify(new courseNotification($alert));

            $us = 'المدرس';

   			$data =  'تنويه جديد :' .  $alert->title . ':<br> فى' .$alert->course()->value('course_name');
   			
   		}
         StreamLabFacades::pushMessage('wood','courseNotification',[$data,$us]); //channel , Event name
   		

   		
   	}
      session()->flash('message', ' تم ارسال التنبيه');

   	return back();

   }

   public function sendall(Request $request,Course $course)
   {

   	$message = new Message();

   	$message->message = $request->message;

   	$message->course_id = $course->id;

   	if($message->save())
   	{
   		$users = $course->users()->get();

   		//Notification::send($users, new courseNotification($alert)) ;
   		foreach($users as $user)
   		{
   			$user->notify(new SendAll($message));
   			
   		}
   		
   	}

      session()->flash('message', ' تم ارسال الرسالة للمشتركين');

   	return back();

   }

   public function seenAll()
   {
       foreach(Auth::guard('web')->user()->unreadNotifications as $noti)
      {
          $noti->markAsRead(); 
      }
   }
}
