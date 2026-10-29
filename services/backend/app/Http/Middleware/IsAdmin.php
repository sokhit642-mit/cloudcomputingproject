<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    public function handle($request, Closure $next)
    {
        if (Auth::guard('admin')->check() && Auth::guard('admin')->user()->role_as == 1) {
            return $next($request);
        }

        return redirect()->route('adminLogin')->with('message', 'Access Denied. You are not authorized to access this page.');
    }
}

