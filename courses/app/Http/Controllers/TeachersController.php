<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use App\User;

use App\Course;

class TeachersController extends Controller
{
    public function teachers()
    {

    	$teachers = DB::table('users')->get();

    	return view(app('adthem') . '.teachers', compact('teachers'));
    }

    public function teacher_courses(User $teacher)
    {

    	$courses = Course::whereIn('user_id', $teacher)->get();

    	return view(app('adthem') . '.teacher_course', compact('courses'));
    }


}
