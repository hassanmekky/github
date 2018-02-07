<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;

use App\Course;

use DB;

class AdCategoriesController extends Controller
{
    public function categories()
    {
    	$categories = Category::get();
    	return view(app('adthem') . '.categories' , compact('categories'));
    }

   public function store(Request $request)
   {

   		$this->validate(request(),[
    		'name' => 'required',

    	]);

   		$category = new Category;

   		$category->name = $request->name;

   		$category->save();

      session()->flash('message', 'تم إضافة القسم بنجاح');


   		return back();
   }
}
