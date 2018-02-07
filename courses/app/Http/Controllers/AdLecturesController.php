<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Course;

use App\Lesson;

class AdLecturesController extends Controller
{
    public function addlecture(Course $course)
    {

    	return view(app('adthem') . '.addlecture' ,compact('course'));
    }

    public function storelecture(Request $request, $course)
    {

    	$lecture = new Lesson;

    	$lecture->lesson_name = $request->lesson_name;

    	$video_name = time() . '.' . $request->lesson_video->getClientOriginalExtension(); // store file with current time to prevent same imges name
    	$lecture->lesson_video = $video_name;

    	$path = public_path().'/courses/lessons/';

    	$request->lesson_video->move($path , $video_name); // move Uploaded file To public/upload folder


    	$lecture->description = $request->description;

    	$file_name = time() . '.' . $request->lesson_files->getClientOriginalExtension(); // store file with current time to prevent same imges name
    	$lecture->files = $file_name;

    	$path = public_path().'/courses/files/';

    	$request->lesson_files->move($path , $file_name); // move Uploaded file To public/upload folder

    	$lecture->order = $request->order;

    	$lecture->course_id = $course;

    	$lecture->save();

        session()->flash('message', 'تم إضافة الدرس بنجاح');

    	return back();


    }
}
