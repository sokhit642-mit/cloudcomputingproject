<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\ForgotPasswordMail;

class AuthController extends Controller
{
    public function showForgotPasswordForm()
    {
        return view('auth.forgot-password');
    }

    public function sendResetToken(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return redirect()->back()->with('error', 'If the email is registered, you will receive a password reset link.');
        }

        // Generate reset token and expiration
        $token = Str::random(60);
        $user->update([
            'password_reset_token' => $token,
            'password_reset_expires_at' => now()->addMinutes(60),
        ]);

        // Generate reset URL
        $resetUrl = route('reset.password.form', ['token' => $token]);

        // Send email
        Mail::to($user->email)->send(new ForgotPasswordMail($resetUrl));

        return redirect()->back()->with('message', 'Reset password link sent to your email.');
    }

    public function showResetPasswordForm($token)
    {
        return view('auth.reset-password', ['token' => $token]);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::where('password_reset_token', $request->token)
                    ->where('password_reset_expires_at', '>=', now())
                    ->first();

        if (!$user) {
            return redirect()->back()->with('error', 'Invalid or expired token.');
        }
        if (auth()->user()->password_reset_expires_at && auth()->user()->password_reset_expires_at->isPast()) {
            return redirect()->back()->with('message', 'Password reset has expired.');
        }
        

        $user->update([
            'password' => Hash::make($request->password),
            'password_reset_token' => null,
            'password_reset_expires_at' => null,
        ]);

        return redirect()->route('login')->with('message', 'Password reset successfully!');
    }
}

