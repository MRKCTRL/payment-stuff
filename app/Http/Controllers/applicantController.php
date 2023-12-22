<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class applicantController extends Controller
{
    //
    public function index()
    {
        $listing = Listing::latest()->withCount('users')->where('user_id', auth()->user()->id)->get();
        

        return view('applicant.index', compact('listings'));
    }

    public function show(Listing $listings){
        $listing = Listing::with('users')->where('sluf',$listings->slug)->first();

        return view('applicants.show', compact('listing'));

    }
}
 