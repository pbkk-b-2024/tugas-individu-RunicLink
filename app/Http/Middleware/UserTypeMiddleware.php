<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserTypeMiddleware
{
    public function handle(Request $request, Closure $next, $userType)
    {
        if (Auth::check() && Auth::user()->userType == $userType) {
            return $next($request);
        }

        return redirect('/noaccess');
    }
}
