<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Notifications\ContactSms;

use Illuminate\Support\Facades\Notification;

use App\Http\Controllers\PaypalController;


use App\User;

use App\Admin;

use App\Contact;
use App\FAQuestion;

use DB;

class RegisterController extends Controller
{
    public function register()
    {
    	return view(app('design') . '.signup');
    }

    public function store(Request $request)
    {
    	$this->validate(request(),[
    		'all_name' => 'required',
  
            'email'  => 'required',
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

    	$role = implode(',' , $request->role);
    	$user->role =$role;

    	$user->save();

        auth()->login($user);

    	return redirect('/');
    }

    public function updateuser(Request $request, User $user)
    {

        if($request->profile_img != null){
            $profile_img = time() . '.' . $request->profile_img->getClientOriginalExtension(); // store images with current time to prevent same imges name
            $user->image = $profile_img;

            $path = public_path().'/upload/usersProfile/';

            $request->profile_img->move($path, $profile_img); 
            }

            $user->save();

         $user->update([

            //

            $user->all_name = $request->all_name,
            $user->name = $request->name,
            $user->email = $request->email,
            $user->phonenumber = $request->phonenumber,
            $user->role = $request->role,

            $user->work_field = $request->work_field,
            $user->specialization = $request->specialization,
            $user->qualification = $request->qualification,

         ]);

         return redirect('/profile');
    }

    public function addcv(Request $request, User $user)
    {
        $user->update([

        $user->bio = $request->bio,

    ]);

        return back();

    }

    public function newinterests(Request $request, User $user)
    {
         if($request->interests != null){
            $interests = implode(' , ' , $request->interests);
        }

        if($request->interests != null){
            $prefer = implode(' , ' , $request->prefered);
        }

        if($user->interests == '')
        {
        
            $user->update([

            $user->interests = $interests,

            $user->prefered_courses = $prefer,

         ]);
        }
        else
        {
            $user->update([

            $user->interests = $user->interests . ' , ' . $interests,

            $user->prefered_courses = $prefer,

             ]);
        }

        return back();

    }

    public function deleteinterest(User $user,$interest)
    {
        $userInterests = DB::table('users')->where('id', $user->id)->find('interests');

        $interestsArray = explode(' , ', $userInterests);

        unset($interestsArray[$interest]);

        $inn = implode(' , ' , $interestsArray);

         $user->update([

           $user->interests = $inn,

        ]);

         return back();

    }


    public function contact()
    {
        $questions = FAQuestion::all();
        return view(app('design') . '.contact-us',compact('questions'));
    }

    public function storecontact(Request $request)
    {
        $this->validate(request(),[
            'name' => 'required',
  
            'email'  => 'required',
            
            'message' => 'required',
        ]);

        $contact = new Contact;

        $contact->name = $request->name;

        $contact->mail = $request->email;

        $contact->message = $request->message;

        if($contact->save())
        {
            $admins = Admin::all();

            foreach ( $admins as $admin ) {
            
                 Notification::send($admin, new ContactSms($contact));
            }
        }

        session()->flash('message', 'تم إرسال رسالتك وسيتم الرد قريبا');

        return back();
    }

    public function resetpass (Request $request)
    {
        $this->validate(request(),[
            'oldpass' => 'required',
  
            'password'  => 'required|min:6',
            
            'confirm_pass' => 'required|same:password',
        ]);

        $current_password = \Auth::guard('web')->user()->password;           
        if(\Hash::check($request->input('oldpass'), $current_password))
        {          
          $user_id = \Auth::guard('web')->user()->id;                       
          $obj_user = User::find($user_id);
          $obj_user->password = \Hash::make($request->input('password'));
          $obj_user->save(); 
          
          session()->flash('message', 'تم تغيير كلمة المرور بنجاح');

          return back();

        }
        else
        {           
            return back()->withErrors();
        }  


    }

    public function withdraw($user)
    {

        $info = User::findOrFail($user);

        $paypal = new PaypalController;

        if($info->blance > 20)
        {
            $amount = $info->blance;
        }
        else
        {
            session()->flash('message', 'عفوا لا يمكن تنفيذ العملية');

            return back();
        }

        $paypalEmail = 'course-seller3@mail.com';

        $withdraw = $paypal->payout($amount, $paypalEmail);

          if ($withdraw->batch_header->batch_status == 'SUCCESS') 
          {

            $info->blance = 0;

            $info->save();

            session()->flash('message', 'تم تنفيذ السحب بنجاح');

            return redirect('/profile');


          }

          else 
          {

             session()->flash('message', 'لم يتم تنفيذ السحب يرجي المحاولة مرة أخري');

            return redirect('/profile');

          }
        
    }

}
