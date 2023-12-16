<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\User;
use App\Http\Requests\SeekerRegisterationRequest;
use Illuminate\Support\Facades\Auth;

class userController extends Controller
{
    //
    const JOB_SEEK = 'seeker';
    public function createSeeker()
        {
            return view('user.seeker-register');
        }
        public function storeSeeker( SeekerRegisterationRequest $request)
        {
            // request()->validate([
            // 'name'=> ['required', 'string','max:225'],
            // 'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            // 'password' => ['required']

        // ]);
        User::create([
            // 'name'=> $request->get('name')
            'name'=> request('name'),
            'email'=> request('email'),
            'password'=> bcrypt(request('password')),
            'user_type'=> self::JOB_SEEK
        ]);
        return back();
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
    }
}
