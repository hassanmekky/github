<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;

use App\Social;
use App\Setting;

class SettingsController extends Controller
{
    public function social()
    {
    	$links = Social::all();
    	return view(app('adthem') . '.social',compact('links'));
    }

    public function addsocial(Request $request)
    {
    	$validator = Validator::make($request->all(), [

            'name' => 'required',
            'url_link' => 'required',
            
        ]);

        if ($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $link = new Social;

        $link->name = $request->name;

        $link->url_link = $request->url_link;

        $link->save();

        session()->flash('message', 'تم اضافة رابط');

        return back();

    }

    public function delete_social(Social $social)
    {
    	$social->delete();

    	return back();
    }

    public function settings()
    {
        $settings = Setting::all();

        return view(app('adthem') . '.settings',compact('settings'));
    }

    public function changelogo(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'logo' => 'required|mimes:jpeg,jpg,png,gif|max:2000',
            
        ]);

        if ($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $img_name = time() . '.' . $request->logo->getClientOriginalExtension(); // store images with current time to prevent same imges name

        $path = public_path().'/basics/logo/';

        $request->logo->move($path , $img_name);

        $logo = Setting::updateOrCreate(

                [ 'id' => 1 ],

                ['logo' => $img_name]

                );
        
        session()->flash('message', 'تم تغيير اللوجو');

        return back();

    }

    public function change_site_name(Request $request)
     {
        $validator = Validator::make($request->all(), [

            'site_name' => 'required',
            
        ]);

        if ($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $sitename = Setting::updateOrCreate(

                [ 'id' => 1 ],

                ['site_name' => $request->site_name]

                );
        
        session()->flash('message', 'تم تعديل الاسم');

        return back();

     }

}
