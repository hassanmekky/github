<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\PaypalController;
use App\Course;
use App\Certificate;
use Auth;

use App\Admin;

class CertificatesController extends Controller
{


    public function certificate(Course $course)
    {
    	$id = Auth::guard('web')->user()->id;

    	$cert = Certificate::updateOrCreate(

                [ 'course_id' => $course->id, 'user_id' => $id ]

                );
        
        return view(app('design') . '.certificate',compact('course'));
    }

    public function buycert(Request $request,$course)
    {

        $certPay = Course::find($course);

        if(!empty($certPay))
        {
            $paypal_class = new PaypalController();
            return $paypal_class->getCert($certPay->cert_price,$certPay->cert_name,$certPay->id);
        }
        else
        {
            return back();
        }

    }

    public function certgetdone(Request $request,Course $course)
    {

    	$id = Auth::guard('web')->user()->id;

    	$cert = Certificate::updateOrCreate(

                [ 'course_id' => $course->id, 'user_id' => $id ]

                );

        /*$course->users()->attach(Auth::guard('web')->user()->id);

        $admins = Admin::all();

        foreach ( $admins as $admin ) {

            Notification::send($admin, new NewCourseSub($course));

        }*/

        session()->flash('message', 'تم الحصول على الشهادة');

         return view(app('design') . '.certificate',compact('course'));
        

    }

    public function certgetcancel(Request $request)
    {
        
    }

    public function downloadcert(Course $course)
    {
    	
        return view(app('design') . '.certificate',compact('course'));
    }


}
