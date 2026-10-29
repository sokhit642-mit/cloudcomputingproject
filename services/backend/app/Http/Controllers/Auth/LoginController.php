<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/home';
    protected function authenticated()
    {
        $role = Auth::user()->role_as;
    
        if ($role == '1') {
            // Admin role
            return redirect('admin/dashboard')->with('message', 'Welcome back to Admin Dashboard');
        } elseif ($role == '2') {
            // Super Admin role
            return redirect('admin/dashboard')->with('message', 'Welcome back to Super Admin Dashboard');
        } else {
            // Regular User role (role 0)
            return redirect('/')->with('message', __('front_alert.Logged In Successfully'));
        }
    }
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function userlogout()
    {
        // Mark the user as inactive before logging out
    
        // Perform the logout
        Auth::logout();
    
        return redirect('/')->with('message', 'You have been logged out successfully.');
    }
}
