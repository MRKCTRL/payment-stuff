<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\User;

class userController extends Controller
{
    //
    const JOB_SEEK = 'seeker';
    public function createSeeker()
        {
            return view('user.seeker-register');
        }
        public function storeSeeker()
        {
        User::create([
            // 'name'=> $request->get('name')
            'name'=> request('name'),
            'email'=> request('email'),
            'password'=> bcrypt(request('password')),
            'user_type'=> self::JOB_SEEK
        ]);
        return back();
    }
}
