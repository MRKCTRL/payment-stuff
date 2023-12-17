<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
        
    public function index()
        // if(Auth::check())
        {
            return view('dashboard');
        // }
        // return back('login');    
   }
   public  function verify()
   {
   return view('user.verify');
}
    public function resend(Request $request)
    {
        $user =Auth::user();

        if($user->hasVerifiedEmail)
        {
            return redirect()->route('home')->with('success', 'Your email was verified');
        }

        $user->sendEmailVerificationNotification;
        return back()->with('success', 'Verification has been sent check your inbox, spam and junk folder');
    }
}