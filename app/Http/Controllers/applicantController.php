<?php

namespace App\Http\Controllers;

use App\Mail\shortListMail;
use App\Models\Listing;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;


class applicantController extends Controller
{
    //
    public function index()
    {
        $listing = Listing::latest()->withCount('users')->where('user_id', auth()->user()->id)->get();
        

        return view('applicant.index', compact('listings'));
    }

    public function show(Listing $listings){
        $this->authorize('view', $listings);
        // if($listings->user_id != auth()->id()) {
        //     abort(403);
        // }
        $listing = Listing::with('users')->where('sluf',$listings->slug)->first();

        return view('applicants.show', compact('listing'));

    }
    public function shortlist($listingId, $userId)
    {
        $listing = Listing::find($listingId);
        $user = User::find($userId);
        if($listing) {
            $listing->users()->updateExistingPivot($userId,['shortlisted' => true]);
            Mail::to($user->email)->queue(new shortListMail($user->name, $listing->title));

            return back()->with('success', 'User is shortlisted successfully');
        }
        return back();
    }
    public function apply($listingId)
    {
       $user = auth()->user();
       $user->listings()->syncWithoutDetaching($listingId);
       return back()->with('success', 'Your application was successfully submitted');
    }

}
 