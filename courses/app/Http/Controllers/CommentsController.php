<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Comment;
use Validator;

class CommentsController extends Controller
{
    public function addcomment(Request $request,$course)
    {

        $validator = Validator::make($request->all(), [
            'comtext' => 'required',

        ]);

        if ($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }

    	
		$addcomment = new Comment;

		$addcomment->comment = $request->comtext;

		$addcomment->course_id = $course;

		$addcomment->user_id = Auth::guard('web')->user()->id;

		$addcomment->save();

		return back();
	
    }
}
