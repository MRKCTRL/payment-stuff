<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class subscriptionController extends Controller
{
    //
    public function subscribe()
    {
        return view('subscription.index');
    }
    public function initPayment(Request $request)
    // $request->pri
    {
        
    }
}
