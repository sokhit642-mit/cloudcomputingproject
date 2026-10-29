<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AdminloginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Show the admin login form.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('admin.Login.adminlogin'); // Adjust the view path as necessary
    }

    /**
     * Handle an admin login request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        // Validate the form data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        // Attempt to log in with the 'admin' guard
        if (Auth::guard('admin')->attempt($credentials)) {
            // Authentication passed, redirect to admin dashboard
            return redirect()->intended('admin/dashboard')->with('message', 'Admin Login successful!');
        }

        // Authentication failed, redirect back with errors
        return redirect()->back()->withErrors(['error' => 'Invalid credentials.']);
    }

    /**
     * Log the admin out of the application.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logoutadmin()
    {
        Auth::guard('admin')->logout();

        return redirect('/admin/login')->with('message', 'You have been logged out successfully.');
    }
}
