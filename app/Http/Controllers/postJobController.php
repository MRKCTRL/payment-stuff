<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;

class postJobController extends Controller
{
    public function create()
    //
    {
    return view('job.creation');
}
public function store(Request $request)
{
$this->validate($request,[
    'title' => 'required|min:5',
    'feature_image' => 'required|mimes:png, jpeg, jpg',
    'description' => 'required|min:10',
    'job_type' => 'required',
    'address' => 'required',
    'date' => 'required',

]);
} 
}