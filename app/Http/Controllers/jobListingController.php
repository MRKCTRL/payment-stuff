<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\User;
use Illuminate\Http\Request;

class jobListingController extends Controller
{
    //
    public function index(Request $request)
    {
        $salary = $request->query('sort');
        $date = $request->query('date');
        $jobType = $request->query('job_type');

        $listings = Listing::query();
        if($salary === 'salary_high_to_low'){
            $listing->orderByRaw('CAST(salary AS UNSIGNED)DESC');
        }elseif($salary === 'salary_low_high'){
            $listing->orderByRaw('CAST(salary AS UNSIGNED) ASC');        
        }

        if($date === 'latest'){
            $listing->orderBy('created_at', 'desc');
        }elseif($date === 'oldest'){
            $listing->orderBy('created_at', 'asc');        
        } 
        if($jobType === 'Fulltime'){
            $listing->where('job_type', 'fulltime');
        }elseif($jobType === 'Partime'){
            $listing->where('job_type', 'partime');        
        }elseif($jobType === 'Casual'){
            $listing->where('job_type', 'casual');        
        }elseif($jobType === 'contract'){
            $listing->where('job_type', 'contract');        
        }
        
        
        

        $job = $listing->with('profile')->get();
        // return $jobs->load('profile')
        return view('home', compact('job'));
    }
    public function show(Listing $listing)
    {
        return view('show', compact('listing'));
    }
    public function company($id)
    {
        $company =User::with('jobs')->where('id', $id)->where('user_type', 'employer')->first();
        return view('company', compact('company'));
    }
}
