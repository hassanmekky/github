<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\PaypalController;

use App\Notifications\NewCourseSub;

use Illuminate\Support\Facades\Notification;


use Validator;
use Auth;

use App\Course;

use App\Category;
use App\User;

use App\Rating;
use App\Admin;
use App\Alert;

class CoursesController extends Controller
{
    public function course_intro(Course $course)
    {
        $Avgrate = Rating::where('course_id',$course->id)->avg('rating');

        $courserate = round($Avgrate,1);

    	return view(app('design') . '.course-intro', compact('course','courserate'));
    }

    public function addcourse()
    {
    	$categories = Category::get();
    	return view(app('design') . '.addcourse-form',compact('categories'));
    }

    public function store(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), [

            'title' => 'required',
  
            'prev_know'  => 'required',
            'intro_video' => 'required',
            'exp_gender' => 'required',
            'course_price' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',

        ]);

        if ($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }


    	$course = new Course;

    	$course->course_name = $request->title;

    	$course->prev_know = $request->prev_know;

    	$vid_name = time() . '.' . $request->intro_video->getClientOriginalExtension(); // store images with current time to prevent same imges name
    	$course->intro_video = $vid_name;

    	$path = public_path().'/courses/course/';

    	$request->intro_video->move($path , $vid_name); // move Uploaded image To public/upload folder

    	$course->description = $request->description;

    	$exp_gender = implode(',' , $request->exp_gender);

    	$course->exp_gender = $exp_gender;

    	if($request->course_price == '')
    	{
    		$course->course_price = 'مجاني';
    	} 
    	else
    	{
    		$course->course_price = $request->course_price;
    	}

    	$img_name = time() . '.' . $request->image->getClientOriginalExtension(); // store images with current time to prevent same imges name
    	$course->image = $img_name;

    	$request->image->move($path , $img_name);


    	$course->category_id = $request->category_id;

    	$course->user_id = $user->id;

    	// certificate

    	$course->cert_name = $request->cert_name;

    	$course->cert_orgnization = $request->cert_orgnization;


    	if($request->cert_price == '')
    	{
    		$course->cert_price = 'مجاني';
    	} 
    	else
    	{
    		$course->cert_price = $request->cert_price;
    	}

        $course->start_date = $request->start_date;

        $course->end_date = $request->end_date;


    	$course->save();

        session()->flash('message', 'تم إضافة الدورة بنجاح');

        return back();

    }

    public function delete(Course $course) 
    {
        $course->delete();

        $course->lesson()->delete();

        session()->flash('message', 'تم حذف الدورة بنجاح');

        return back();
    }

    public function payNow(Request $request,$course)
    {

        $coursePay = Course::find($course);

        if(!empty($coursePay))
        {
            $paypal_class = new PaypalController();
            return $paypal_class->getCheckout($coursePay->course_price,$coursePay->course_name,$coursePay->id);
        }
        else
        {
            return back();
        }

    }

    public function getDone(Request $request,Course $course)
    {

        $course->users()->attach(Auth::guard('web')->user()->id);

        $course_user = Course::where('id',$course->id)->value('user_id');

        $user = User::where('id',$course_user);

        $user->update([

            $user->blance  =  (0.8 * $course->course_price), 

        ]);

        $admins = Admin::all();

        foreach ( $admins as $admin ) {

            Notification::send($admin, new NewCourseSub($course));

        }

        session()->flash('message', 'تم الاشتراك, شكرا للاشتراك فى هذه الدورة');

        return redirect('/coursepage/'.$course->id);
        

    }

    public function getCancel(Request $request)
    {
        
    }

    public function subscribe(Course $course, $id)
    {
        
        
        $course->users()->attach($id);

        session()->flash('message', 'تم الاشتراك, شكرا للاشتراك فى هذه الدورة');

        return back();
        
    }

    public function courseout(Course $course)
    {
        
        
        $course->users()->detach(Auth::guard('web')->user()->id);


        session()->flash('message', 'تم الانسحاب من الدورة');

        return back();
        
    }

    public function coursepage(Course $course)
    {

        $Avgrate = Rating::where('course_id',$course->id)->avg('rating');

        $courserate = round($Avgrate,1);

        return view(app('design') . '.course-page',compact('course','courserate'));

    }

    public function coursealerts(Course $course)
    {
        $alerts = Alert::where('course_id',$course->id)->orderBy('id', 'desc')->get();
        return view(app('design') . '.course-alerts',compact('course','alerts'));

    }

    public function coursecomments(Course $course)
    {
        return view(app('design') . '.course-comments',compact('course'));

    }

    public function rate(Request $request, $course, $id)
    {

        $this->validate(request(),[
            'comment' => 'required',
  
            'rating'  => 'required',
            
        ]);

        $rate = Rating::updateOrCreate(

                [ 'course_id' => $course, 'user_id' => $id ],

                ['rating' => $request->rating, 'comment' => $request->comment ]

                );
        
        session()->flash('message', 'شكرا لتقييمك هذه الدورة');

        return back();

    }

    public function allcourses()
    {
        $categories = Category::all();

        $courses = Course::orderBy('id', 'desc')
                ->paginate(6);

        return view(app('design') . '.all-courses',compact('categories','courses'));
    }

    public function addquiz($course)
    {
        return view(app('design') . '.addtest',compact('course'));
    }

    public function updatecourse(Course $course)
    {
        $categories = Category::all();

        return view(app('design') . '.course-update',compact('course','categories'));
    }

    public function postupdate(Request $request, Course $course) 
    {

         $validator = Validator::make($request->all(), [

            'title' => 'required',
  
            'prev_know'  => 'required',
            'description' => 'required',
            'intro_video' => 'required|max:20000',
            'exp_gender' => 'required',
            'course_price' => 'required',
            'start_date' => 'required|date|date_format:Y-m-d',
            'end_date' => 'required|date|date_format:Y-m-d',
            'image'   => 'required| max:2000'

        ]);

        if ($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }


        $vid_name = time() . '.' . $request->intro_video->getClientOriginalExtension(); // store images with current time to prevent same imges name
        $path = public_path().'/courses/course/';

        $request->intro_video->move($path , $vid_name); 

        if($request->course_price == '')
        {
            $courseprice = 'مجاني';
        } 
        else
        {
            $courseprice = $request->course_price;
        }

        $img_name = time() . '.' . $request->image->getClientOriginalExtension(); // store images with current time to prevent same imges name

        $request->image->move($path , $img_name);

        if($request->cert_price == '' && $request->cert_name != null )
        {
            $certprice = 'مجاني';
        } 
        else
        {
            $certprice = $request->cert_price;
        }

        $ex_gender = implode(',' , $request->exp_gender);


        $course->update([

            'course_name' => $request->title,
            'prev_know' => $request->prev_know,
            'intro_video' => $vid_name,
            'description' => $request->description,
            'exp_gender' => $ex_gender,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'image' => $img_name,
            'course_price' => $courseprice,
            'cert_name' => $request->cert_name,
            'cert_orgnization' => $request->cert_orgnization,
            'cert_price' => $certprice,
            'category_id' => $request->category_id,
        ]);

        session()->flash('message', 'تم تعديل الدورة');

        return back();


    }

}
