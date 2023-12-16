<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class userController extends Controller
{
    //
    public function createSeeker()
        {
            return view('user.seeker-register');
        }
}
