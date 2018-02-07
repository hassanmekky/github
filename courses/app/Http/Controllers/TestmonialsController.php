<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
use Redirect;
use App\Testmonial;

class TestmonialsController extends Controller
{
    public function show()
    {
        $testmons = Testmonial::all();

    	return view(app('adthem') . '.testmonials', compact('testmons'));
    }

    public function store(Request $request)
    {
    	$validator = Validator::make($request->all(), [

            'name'  => 'required',
            'image' => 'required|max:1024',
            'text' => 'required',

        ]);

        if ($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $testmon = new Testmonial;

        $testmon->name = $request->name;

        $img_name = time() . '.' . $request->image->getClientOriginalExtension(); // store images with current time to prevent same imges name
    	$testmon->image = $img_name;

    	$path = public_path().'/basics/testmonials/';

    	$request->image->move($path , $img_name);

        $testmon->text =$request->text;

        $testmon->save();

        return back();
    }

    public function delete(Testmonial $testmonial)
    {
        $testmonial->delete();

        session()->flash('message', 'تم حذف المقولة بنجاح');

        return back();
    }

    public function update(Testmonial $testmonial)
    {

        return view(app('adthem') . '.edit-testmonial', compact('testmonial'));
    }

    public function postupdate(Request $request, Testmonial $testmonial)
    {

        $validator = Validator::make($request->all(), [

            'name'  => 'required',
            'image' => 'required|max:1024',
            'text' => 'required',

        ]);

        if ($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $img_name = time() . '.' . $request->image->getClientOriginalExtension(); // store images with current time to prevent same imges name

        $path = public_path().'/basics/testmonials/';

        $request->image->move($path , $img_name);

        $testmonial->update([

            'name' => $request->name,

            'image' => $img_name,

            'text' => $request->text,

        ]);

        session()->flash('message', 'تم تعديل المقولة بنجاح');

        return redirect('/admin/testmonials');

    }
}
