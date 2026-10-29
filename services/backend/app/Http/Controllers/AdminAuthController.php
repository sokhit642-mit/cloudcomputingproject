<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;

class AdminAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        $credentials = $request->only('email', 'password');
    
        if (Auth::guard('admin')->attempt($credentials)) {
            // Check if the authenticated user is an admin (role 1) or super admin (role 2)
            $user = Auth::guard('admin')->user();
            if ($user->role == 1 || $user->role == 2) {
                return redirect()->intended('admin/dashboard')->with('message', 'Login successful!');
            }
        }
    
        return redirect()->back()->withErrors(['error' => 'Invalid credentials.']);
    }
    

    public function logoutadmin()
    {
        Auth::guard('admin')->logout();

        return redirect('/admin/login')->with('message', 'You have been logged out successfully.');
    }
    // public function logout(Request $request)
    // {
    //     Auth::guard('admin')->logout();
    //     return redirect()->route('adminLogin');
    // }
}

