<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterationFormRequest;
use Illuminate\Http\Request;
use app\Models\User;
// use App\Http\Requests\SeekerRegisterationRequest;
use Illuminate\Support\Facades\Auth;

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

        // \Carbon\Carbon::parse($date)->format('Y-m-d');
        return redirect()->route('login')->with('successMessage', 'Your account was created');
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
}
