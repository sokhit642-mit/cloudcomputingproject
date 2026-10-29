<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
       

        if(!Auth::user()->role_as == '1' && $role_as == '2'){
            return redirect('/')->with('status','Access Denied. As you are not Admin');
        }

        // Redirect unauthorized users
        return redirect('/')->with('error', 'You do not have access to this section.');
    }
}
