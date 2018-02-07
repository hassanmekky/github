<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use AdminAuth;
use Redirect;
use Validator;

use App\User;
use App\Category;
use App\Course;
use App\FAQuestion;
use App\Certificate;
use App\QuizResults;
use App\Message;
use App\Rating;
use App\Alert;
use App\Comment;
use App\About;
use DB;

class AdminController extends Controller
{
    
    public function login()
    {
    	return view(app('adthem') . '.login');
    }

    public function post_login(Request $request)
    {
    	if($request->has('remember'))
    	{
    		$remember = true;
    	}
    	else
    	{
    		$remember = false;
    	}
    	if(Auth::guard('admin')->attempt(['email'=>$request->input('email'),'password'=>$request->input('password')],$remember))
    	{
    		session()->flash('success','You Are Login Successfully');
    		return redirect()->intended('admin');
    	}
    	else 
    	{
    		session()->flash('error','You Can\'t Login please Check your Email and Password, then try Again ');
    	}
    }

    public function logout()
    {
    	Auth::guard('admin')->logout();
    	return redirect('admin/login');
    }

    public function index()
    {
        $cats = Category::all();
        $courses = Course::all();
        $users = User::all();
        $latestCourses = Course::orderBy('id', 'desc')->take(3)->get();
        $messages = Message::all();
        $alerts = Alert::all();
        $comments = Comment::all();
        $ratings = Rating::all();

    	return view(app('adthem') . '.dashboard',
            compact('cats','courses','users','latestCourses','messages','alerts','comments','ratings'));
    }

    public function profile(User $user)
    {
        return view(app('adthem') . '.profile',compact('user'));
    }

    public function delete_faq($question)
    {
        $ques = FAQuestion::find($question);

        $ques->delete();

        return back();

    }

    public function update_faq(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [

            'question' => 'required',
  
            'answer'  => 'required',

        ]);

        if ($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $question = FAQuestion::find($id);

        $question->update([

            'question' => $request->question,

            'answer' => $request->answer,

        ]);

        return redirect('admin/faquestions');

    }

    public function showcert()
    {
        $certs = Certificate::all();

        return view(app('adthem') . '.certificates',compact('certs'));
    }

    public function showexams()
    {
        $exams = QuizResults::all();

        return view(app('adthem') . '.exams',compact('exams'));
    }

    public function showabout()
    {
        $aboutinfo = About::where('id',1)->get();

        return view(app('adthem') . '.about',compact('aboutinfo'));
    }

     public function change_about_para(Request $request)
     {
        $validator = Validator::make($request->all(), [

            'paragraph' => 'required',
            
        ]);

        if ($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $about = About::updateOrCreate(

                [ 'id' => 1 ],

                ['paragraph' => $request->paragraph]

                );
        
        session()->flash('message', 'تم تعديل النص');

        return back();

     }

     public function change_about_image(Request $request)
     {
       $validator = Validator::make($request->all(), [

            'image' => 'required|mimes:jpeg,jpg,png,gif|max:2000',
            
        ]);

        if ($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $img_name = time() . '.' . $request->image->getClientOriginalExtension(); // store images with current time to prevent same imges name

        $path = public_path().'/basics/aboutpic/';

        $request->image->move($path , $img_name);

        $about = About::updateOrCreate(

                [ 'id' => 1 ],

                ['image' => $img_name]

                );
        
        session()->flash('message', 'تم تغيير الصورة');

        return back();

     }
    
}
