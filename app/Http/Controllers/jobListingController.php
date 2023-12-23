<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class jobListingController extends Controller
{
    //
    public function index()
    {
        $job = Listing::with('profile')->get();
        // return $jobs->load('profile')
        return view('home', compact('job'));
    }
    public function show(Listing $listing)
    {
        return view('show', compact('listing'));
    }
}
