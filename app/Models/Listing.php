<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;
    protected $fillable = [ 
        'user_id',
        'title',
        'description',
        'roles',
        'job_type',
        'address',
        'salary',
        'application_close_date',
        'feature image',
        'slug'
    ]; 
    public function users()
    {
        return $this->belongsToMany(User::class, 'lister_user', 'listing_id', 'user_id')
        ->withPivot('shortlisted')
        ->withTimeStamps();
    }
}
 