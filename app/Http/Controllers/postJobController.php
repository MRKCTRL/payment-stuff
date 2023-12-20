<?php

namespace App\Http\Controllers;

use App\Http\Requests\jobEditFormRequest;
use App\Http\Requests\jobPostFormRequest;
use App\Models\Listing;
use App\Post\JobPost;
use Symfony\Contracts\Service\Attribute\Required;



class postJobController extends Controller
{
    protected $job;
    public function __construct(JobPost $job)
    {
        $this->job = $job;
    }
    public function index()
    {
        $jobs = Listing::where('user_id', auth()->user()->id)->get();
    return view('job.index', compact('jobs'));
    }
    public function create()
    //
    {
    return view('job.creation');
    }
public function store(jobPostFormRequest $request)
{
    // dd

        $this->job->store($request); 
        return back();
    } 
    public function edit(Listing $listing)
    {
        return view('job.edit',compact('listing'));
    }
    public function update($id, jobEditFormRequest $request)
    {
       $this->job->updatePost($id , $request);

        return back()->with('success', 'Your job post has been successful updated');
    }

} 