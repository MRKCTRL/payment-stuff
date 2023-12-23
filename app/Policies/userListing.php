<?php

namespace App\Policies;

use App\Models\Listing;
use App\Models\User;

class userListing
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }
    public function view(User $user, Listing $listing)
    {
        return $user->id === $listing->user_id ;
    }
}
