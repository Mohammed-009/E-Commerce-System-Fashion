<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class isAdmim
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if user is authenticated
        if (Auth::check()) {
            // Check if the user is an admin
            if (auth()->user()->is_Admin == 1) {
                return $next($request);
                }
            }
        
            // Redirect to home page if not admin or not authenticated
            return redirect()->route('homePage');



        // if(auth()->user()->is_Admin==1)
        // {
        //     return $next($request);
        // }
        // else {
        //     return redirect()->route('homePage');
        // }
       
    }
}
