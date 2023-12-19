<?php

namespace App\Http\Controllers;

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
} 