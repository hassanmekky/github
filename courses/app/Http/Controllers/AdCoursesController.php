<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Notifications\RefuseCourse;

use Illuminate\Support\Facades\Notification;

use DB;
use Validator;
use App\Course;
use App\Category;
use App\RefusedCourses;
use App\User;
use App\Question;
use App\Answer;
use App\Rating;


class AdCoursesController extends Controller
{

    public function courses()
    {
    	$courses = Course::orderBy('id', 'desc')->paginate(6);

    	return view(app('adthem') . '.courses', compact('courses'));
    }

     public function newcourse()
    {
    	$categories = DB::table('categories')->get();

    	$users = DB::table('users')->get();

    	return view(app('adthem') . '.addcourse', compact('categories', 'users'));
    }

    public function store(Request $request)
    {
         $validator = Validator::make($request->all(), [

            'title' => 'required',
  
            'prev_know'  => 'required',
            'intro_video' => 'required|mimes:mp4,mov,ogg,qt | max:20000',
            'exp_gender' => 'required',
            'course_price' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'image'   => 'required|mimes:jpg,gif,png,gpeg | max:2000'

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

    	$course->user_id = $request->user_id;

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


    	$course->save();

        session()->flash('message', 'تم إضافة الدورة بنجاح');


    	return back();

    }

    public function course(Course $course)
    {
        $Avgrate = Rating::where('course_id',$course->id)->avg('rating');

        $courserate = round($Avgrate,1);

        return view(app('adthem') . '.course',compact('course','courserate'));
    }

    public function delete(Course $course) 
    {
        $course->delete();

        $course->lesson()->delete();

        return back();
    }

    public function publish(Course $course) 
    {
        $course->update([
            $course->publish = 1,
        ]);
        
        return back();
    }

    public function courserefused(Course $course) 
    {
        
       return view(app('adthem') . '.course-refused', compact('course'));
    }

    public function refusedstore(Request $request,course $course) 
    {
        $course->update([
            $course->refused = 1,
        ]);

        $refused = new RefusedCourses;

        $refused->course_id = $course->id;

        $refused->reasons = $request->reasons;

        if($refused->save())
        {
            $user = $course->user()->get();

           // $user->notify(new RefuseCourse($refused));

            Notification::send($user, new RefuseCourse($refused));
        }
        
        return back();
    }

    public function removerefused(Course $course) 
    {
        $course->update([
            $course->refused = 0,
        ]);
        
        return back();
    }

    public function update(Course $course) 
    {

        $categories = DB::table('categories')->get();

        $users = DB::table('users')->get();

        return view(app('adthem') . '.editcourse', compact('course','categories','users'));

    }

    public function postupdate(Request $request, Course $course) 
    {

         $validator = Validator::make($request->all(), [

            'title' => 'required',
  
            'prev_know'  => 'required',
            'description' => 'required',
            'intro_video' => 'required|mimes:mp4,mov,ogg,qt | max:20000',
            'exp_gender' => 'required',
            'course_price' => 'required',
            //'start_date' => 'required|date|date_format:Y-m-d',
            //'end_date' => 'required|date|date_format:Y-m-d',
            //'image'   => 'required|mimes:jpg,gif,png,jpeg | max:2000'

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

        if($request->cert_price == '')
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
            'user_id' => $request->user_id,

        ]);

        session()->flash('message', 'تم تعديل الدورة');

        return back();


    }

     public function addtest($course)
    {
        return view(app('adthem') . '.addtest',compact('course'));
    }

    public function storetest(Request $request, $course)
    {
        $validator = Validator::make($request->all(), [

            'question' => 'required',

            'answer_1'  => 'required',
            'answer_2' => 'required',
            'answer_3' => 'required',
            'answer_4' => 'required',

        ]);

        if ($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }
        else
        {
            $question = new Question;

            $question->course_id = $course;

            $question->question = $request->question;

            $question->save();

            for($i = 1 ; $i <= 4; $i++)
            {
                $answer = new Answer;

                $answer->answer = $request->input('answer_' . $i);

                if($request->input('iscorrect_' . $i) != null)
                {
                    $answer->is_correct = $request->input('iscorrect_' . $i);
                }

                $answer->question_id = $question->id;

                $answer->save();

            }

             session()->flash('message', 'تم إضافة السؤال بنجاح');

             return back();

        }


    }

    public function showtest(Course $course)
    {
        $questions = Question::where('course_id',$course->id)->get();

        return view(app('adthem') . '.showtest',compact('course','questions'));
    }
    
}
