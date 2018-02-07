<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
use App\FAQuestion;
use Redirect;

class FAQuestionsController extends Controller
{
    
    public function index()
    {
        $questions = FAQuestion::orderBy('id', 'desc')->get();

        return view(app('adthem') . '.faquestions',compact('questions'));
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
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

        $question = new FAQuestion;

        $question->question = $request->question;

        $question->answer = $request->answer;

        $question->save();

        session()->flash('message', 'تم إضافة السؤال');

        return back();
    }

    
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        $question = FAQuestion::find($id);

        return view(app('adthem') . '.editfaq', compact('question'));
    }

    
    public function update(Request $request, $id)
    {
        

    }

    
    public function destroy($id)
    {
        $question = FAQuestion::find($id);

        $question->delete();

        return back();
    }
}
