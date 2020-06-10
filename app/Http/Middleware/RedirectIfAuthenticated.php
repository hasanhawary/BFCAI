<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{

    public function handle($request, Closure $next, $guard = null)
    {
        if ($guard == "instructor" && Auth::guard($guard)->check()) {
            return redirect('/instructor');
        } //else {
        //     return redirect('/instructor/login');
        // }
        if ($guard == "admin" && Auth::guard($guard)->check()) {
            return redirect('/admin');
        }
        if (Auth::guard($guard)->check()) {
            
            return redirect(app()->getLocale() . '/student');
        }
        return $next($request);

    }
}
