<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

class SessionsController extends Controller
{
    public function login_get()
    {
        return view(app('design') . '.signup');
    }
    public function login_post(Request $request)
    {
        if($request->has('remember'))
        {
            $remember = true;
        }
        else
        {
            $remember = false;
        }
    	if(Auth::guard('web')->attempt(['email'=>$request->input('email'),'password'=>$request->input('password')],$remember))
    	{

    		return redirect('/profile');

    	}

        return back()->withErrors([
                'message' => 'Email or Password Not Correct'
                 ]);
    }

    public function logout()
    {
    	auth()->guard('web')->logout();

    	return redirect('/');

    }
}
