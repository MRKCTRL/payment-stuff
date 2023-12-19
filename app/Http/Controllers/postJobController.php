<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;
use Illuminate\Http\Str;

class postJobController extends Controller
{
    public function create()
    //
    {
    return view('job.creation');
}
public function store(Request $request)
{
    // dd
$this->validate($request,[
    'title' => 'required|min:5',
    'feature_image' => 'required|mimes:png, jpeg, jpg|max:2048',
    'description' => 'required|min:10',
    'job_type' => 'required',
    'address' => 'required',
    'date' => 'required',
    'salary' => 'required'
        ]);
        $imagePath = $request->file('feature_image')->store('images', 'public');
        $post = new Listing;
        $post->feature_image = $imagePath;
        $post-> user_id = auth()->user()->id;
        $post->title = $request->description;
        $post->roles = $request->roles;
        $post->job_type = $request->job_type;
        $post->address = $request->address;
        $post->application_close_date = \Carbon\Carbon::createFromFormat('d/m/Y',$request->date)->format('Y-m-d');
        $post->salary = $request->salary;
        $post->slug = Str::slug($request->title).'.'. Str::uuid();
        $post->save();
        return back();
    } 
}