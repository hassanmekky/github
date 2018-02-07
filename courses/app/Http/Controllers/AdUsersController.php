<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Category;
use Validator;

use DB;

class AdUsersController extends Controller
{
    public function users()
    {
    	$users = DB::table('users')->get();

    	return view(app('adthem') . '.users' ,compact('users'));
    }

    public function newuser()
    {
    	$categories = DB::table('categories')->get();
    	return view(app('adthem') . '.adduser', compact('categories'));
    }

    public function store(Request $request)
    {
    	$this->validate(request(),[
    		'all_name' => 'required',
            'username' => 'required',
            'email'  => 'required|email',
            'password' => 'required|min:6',
            'phonenumber' => 'numeric|required',
            'country' => 'required',
            'gender' => 'required',
            'role' => 'required',

        ]);

    	$user = new User;
    	$user->all_name = $request->all_name;
    	$user->name = $request->username;
    	$user->email = $request->email;
    	$user->password = bcrypt($request->password);
    	$user->phonenumber = $request->phonenumber;
    	$user->country = $request->country;
    	$user->gender = $request->gender;

    	$role = implode(' , ' , $request->role);
    	$user->role =$role;

    	if($request->interests != null){
    		$interest = implode(' , ' , $request->interests);
    		$user->interests = $interest;
    	}
    	else
    	{
    	 $user->interests = $request->interests;
    	}

    	$user->save();

    	return back( );
    	
    }

    public function deleteuser(User $user)
    {
        $user->delete();

        return back();
    }

    public function userupdate(User $user)
    {
        $categories = Category::all();
        return view(app('adthem') . '.edituser', compact('user','categories'));
    }

     public function storeupdate(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), [

            'all_name' => 'required',
            'username' => 'required',
            'email'  => 'required|email',
            'password'  => 'required|min:6',
            'password2' => 'required|same:password',
            'phonenumber' => 'numeric|required',
            'country' => 'required',
            'gender' => 'required',
            'interests' => 'required',
            'role' => 'required',
        ]);

        if ($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $role = implode(' , ' , $request->role);

       
        $interest = implode(' , ' , $request->interests);
           // $user->interests = $interest;

        $user->update([

        $user->all_name = $request->all_name,
        $user->name = $request->username,
        $user->email = $request->email,
        $user->password = bcrypt($request->password),
        $user->phonenumber = $request->phonenumber,
        $user->country = $request->country,
        $user->role = $role,
        $user->interests = $interest,
        $user->gender = $request->gender,

        ]);

        session()->flash('message', 'تم تعديل البيانات');

        return back();
        
    }

    public function userpause(User $user)
    {
        $user->update([

            $user->pause = 1 ,

        ]);

        return back();

    }

    public function canceluserpause(User $user)
    {
        $user->update([

            $user->pause = 0 ,

        ]);

        return back();
        
    }

}
