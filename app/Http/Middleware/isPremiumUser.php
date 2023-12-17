<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class isPremiumUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if($request->user()->user_trial > date('-Y-m-d') || $request->user()->billingDebit > date('-Y-m-d')) {
             return $next($request);
        }
       return redirect()->route('subscribe')->with('message', 'Please subscribe to continue to post a job');
    }
}
