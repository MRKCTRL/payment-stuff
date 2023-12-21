<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterationFormRequest;
use Illuminate\Http\Request;
use app\Models\User;
// use App\Http\Requests\SeekerRegisterationRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class userController extends Controller
{
    //
    const JOB_SEEK = 'seeker';
    const JOB_POSTER = 'employer';
    public function createSeeker()
        {
            return view('user.seeker-register');
        }

        public function createEmployer()
        {
            return view('user.employer-register');
        }


        public function storeSeeker( RegisterationFormRequest $request)
        {
            // request()->validate([
            // 'name'=> ['required', 'string','max:225'],
            // 'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            // 'password' => ['required']

        // ]);
         $user = User::create([
            // 'name'=> $request->get('name')
            'name'=> request('name'),
            'email'=> request('email'),
            'password'=> bcrypt(request('password')),
            'user_type'=> self::JOB_SEEK,
            
        ]);
        

        Auth::loginn($user);
        $user->SendEmailVerifcationNotification();
        return response()->json('success');

        // \Carbon\Carbon::parse($date)->format('Y-m-d');
        // return redirect()->route('login')->with('successMessage', 'Your account was created');
        // back();
    }
 public function storeEmloyer( RegisterationFormRequest  $request)
        {
            
        $user = User::create([
            // 'name'=> $request->get('name')
            'name'=> request('name'),
            'email'=> request('email'),
            'password'=> bcrypt(request('password')),
            'user_type'=> self::JOB_POSTER,
             'user_trial' => now()->addWeek()
        ]);
        Auth::login($user);
        $user->SendEmailVerifcationNotification();
        
        return response()->json('success');
        // return redirect()->route('login')->with('successMessage', 'Your account was created');
    }

    public function login()
    {
        return view('user.login');
    }
    public function postLogin(Request $request)
    {
        $request->validate([
            'email'=> 'required',
            'password' => 'required'
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)){
            return redirect()->intended('/dashboard');
        }

        return 'wrong password or email';
    }
public function logout()
{
    auth()->logout();
    
    return redirect()->route('login');
}

public function  profile()
{
    return view('profile.index');
}
public function seekerProfile()
{
    return view('seeker.profile');
}

public function changePassword(Request $request)
{
    $request->validate([
        'current_password' => 'required',
        'password' => 'required|min:8|confirmed',

    ]);

    $user = auth()->user();
    if(!Hash::check($request->current_password, $user->password)) {
        return back()->with('error', 'Current password is incorrect');

    }
    $user->password = Hash::make($request->password);
    $user->save();

    return back()->with('success', 'Your password has been updated successfully');
}
public function uploadResume(Request $request){
    $this->validate($request, [
        'resume' => 'requred|mimes:pdf,doc,docx',
    ]);

    if($request->hasFile('resume')) {
           $resume= $request->file('resume')->store('resume', 'public');

            User::find(auth()->user->id)->update(['resume' => $resume]);
             return back()->with('success',  'Your resume has been uploaded successfully');

        }
}

public function update(Request $request)
{
 if($request->hasFile('profile_pic')) {
           $imagepath = $request->file('profilr_pic')->store('profile', 'public');

            User::find(auth()->user->id)->update(['profile_pic' => $imagepath]);

        }
        User::find(auth()->user()->id)->update($request->except('profile_pic'));

        return back()->with('success',  'Your profile has been updated');
}
}
