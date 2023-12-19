<?php

namespace App\Post;

use App\Models\Listing;
use Illuminate\Support\Str;

class JobPost {

    protected $listing;
    public function __construct(Listing $listing)
    {
      $this->listing = $listing;
    }
    public function store($data)
    {
        $featureImage = $data->file('feature_image');
        $imagePath = $data->file('feature_image')->store('images', 'public');
        // $post = new Listing;
        $this->listing->feature_image = $imagePath;
        $this-> listing->user_id = auth()->user()->id;
        $this->listing->title = $data['description'];
        $this->listing->title = $data['title'];
        $this->listing->roles = $data['roles'];
        $this->listing->job_type = $data['job_type'];
        $this->listing->address = $data['address'];
        $this->listing->application_close_date = \Carbon\Carbon::createFromFormat('d/m/Y',$data['date)'])->format('Y-m-d');
        $this->listing->salary = $data['salary'];
        $this->listing->slug = Str::slug($data['title']).'.'. Str::uuid();
        $this->listing->save();
    }
}
