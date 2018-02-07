<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

use Auth;

use App\Question;
use App\Answer;
use App\Course;

use App\QuizResults;

class Quizzes extends Controller
{
    public function addques(Request $request, $course)
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

    public function testshow(Course $course)
    {
        $questions = Question::where('course_id',$course->id)->get();

        return view(app('design') . '.test-show', compact('questions','course'));
    }

    public function teach_test(Course $course)
    {
        $questions = Question::where('course_id',$course->id)->get();

        return view(app('design') . '.update-test', compact('questions','course'));
    }

    public function testresult(Request $request, Course $course)
    {
        $validator = Validator::make($request->all(), [

            'questions' => 'required',

        ]);

        if ($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $score = 0;

        foreach ($request->get('questions') as $question_id => $answer_id) {
            $question = Question::find($question_id);

            $correct = Answer::where('question_id',$question_id)->where('id', $answer_id)
                                ->where('is_correct',1)->count() > 0 ;

            if($correct)
            {
                $score += 1;
            }

        }

        $userid = Auth::guard('web')->user()->id;

        $quizresult = QuizResults::updateOrCreate(

                [ 'user_id' => $userid, 'course_id' => $course->id ],

                ['score' => $score ]

                );


         return view(app('design') . '.test-result',compact('score','course'));
    }
}
