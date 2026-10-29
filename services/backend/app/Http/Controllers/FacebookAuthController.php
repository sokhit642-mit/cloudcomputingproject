<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Http;

class FacebookAuthController extends Controller
{
    public function facebookpage()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function facebookredirect()
    {
        try {
            $facebookUser = Socialite::driver('facebook')->user();

            // Get the Facebook user ID and access token
            $facebookId = $facebookUser->id;
            $accessToken = $facebookUser->token;

            // Use the access token to fetch the high-resolution profile picture
            $response = Http::get("https://graph.facebook.com/{$facebookId}/picture?type=large&redirect=false&access_token={$accessToken}");
            $avatarUrl = $response->json()['data']['url'];

            // Check if the user already exists in the database
            $existingUser = User::where('facebook_id', $facebookId)->first();

            if ($existingUser) {
                // Update the avatar field if necessary
                $existingUser->update(['avatar' => $avatarUrl]);

                // Log in the existing user
                Auth::login($existingUser);
            } else {
                // Create a new user and log them in
                $newUser = User::create([
                    'name' => $facebookUser->name,
                    'email' => $facebookUser->email,
                    'facebook_id' => $facebookId,
                    'avatar' => $avatarUrl, // Store the Facebook avatar URL in avatar
                ]);

                Auth::login($newUser);
            }

            return redirect()->intended('/')->with('message', __('front_alert.Logged In Successfully'));

        } catch (\Throwable $th) {
            return redirect()->intended('/');
            // ->with('message', __('front_alert.Logged In Successfully'))
            // dd('Something went wrong! ' . $th->getMessage());
        }
    }
}
