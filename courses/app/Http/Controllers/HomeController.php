<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Course;

use App\Testmonial;

use App\Category;
use App\Certificate;
use App\QuizResults;
use App\About;


class HomeController extends Controller
{
    public function index()
    {

    	$courses = Course::where('publish',1)->limit(6)->latest()->get();

        $testmons = Testmonial::all();

    	return view(app('design') . '.home',compact('courses','testmons'));
    }

    public function about()
    {

        $aboutinfo = About::where('id',1)->get();

        return view(app('design') . '.about',compact('aboutinfo'));
    }

    public function privacy()
    {
        return view(app('design') . '.privacy');
    }

    public function profile()
    {
    	$categories = Category::get();

        $courses = Course::get();

        $certs = Certificate::where('user_id',Auth::guard('web')->user()->id)->get();

        $fincourses = QuizResults::where('user_id',Auth::guard('web')->user()->id)->get();

    
    	return view(app('design') . '.profile', compact('categories', 'courses','certs','fincourses'));
    }
}
