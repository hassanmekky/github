<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Lesson;

class LecturesController extends Controller
{
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

        session()->flash('message', 'تم إضافة المحاضرة الى الكورس');

    	return back();


    }

    public function lesson(Lesson $lesson)
    {

        return view(app('design') . '.lesson',compact('lesson'));
    }

    public function finish(Lesson $lesson, $id)
    {
        

        $lesson->users()->attach($id);

        $courseid = $lesson->course;

    return redirect('/coursepage/'.$courseid->id);
    }

}
