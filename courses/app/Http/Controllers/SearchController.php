<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;

use Illuminate\Pagination\LengthAwarePaginator;

use App\Course;
use App\Category;

class SearchController extends Controller
{
    public function search(Request $request)
    {

        $validator = Validator::make($request->all(), [

        'searchtext' => 'required',

        ]);

        if ($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }
    	
    	$courses = Course::where('course_name', 'like', '%'.$request->searchtext.'%')->paginate(6);
    	

    	return view(app('design') . '.search-result', compact('courses'));
    }

    /*public function search(Request $request)
    {
        if($request->searchtext != null){
            $courses = Course::where('course_name', 'like', '%'.$request->searchtext.'%')->paginate(6);
        }

        if($request->coursename != null){
            $coursename = Course::where('course_name', 'like', '%'.$request->coursename.'%')->paginate(6);
        }

        if($request->courseteacher != null){
            $text = $request->courseteacher;
            $courseteacher = Course::whereHas('user', function($query) use ($text){
                return $query->where('name', $text);
            })->paginate(6);
        }

        if($request->coursetype != null){

            if($request->coursetype == 'مجاني'){
            $coursetype = Course::where('course_price', 'like', '%'.$request->coursetype.'%')->paginate(6);
            }
            else{
                $coursetype = Course::where('course_price', '!=', '%'.$request->coursetype.'%')->paginate(6);
            }
        }

        $total = $courses->total() + $coursename->total() + $courseteacher->total() + $coursetype->total();

        $items = array_merge($courses->items(), $coursename->items(), $courseteacher->items(), $coursetype->items());

        $itemsCollection = collect($items)->unique();

        $currentPage = LengthAwarePaginator::resolveCurrentPage();

        $pag = new LengthAwarePaginator($itemsCollection, $total, 6, $currentPage);


        return view(app('design') . '.search-result', compact('pag'));
    }*/

    public function catresult(Category $category)
    {
        $catid = $category->id;
        $courses = Course::whereHas('category', function($query) use($catid){
            return $query->where('category_id', $catid);

        })->paginate(6);

        return view(app('design') . '.category-result', compact('courses','category'));
    }
}
