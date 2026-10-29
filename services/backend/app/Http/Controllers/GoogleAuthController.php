<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }
    public function callback()
    {
        try {
            $google_user = Socialite::driver('google')->user();

            $user = User::where('google_id', $google_user->getId())->first();

            if(!$user) {

                $new_user = User::create([
                    'name' => $google_user->getName(),
                    'email' => $google_user->getEmail(),
                    'google_id' => $google_user->getId(),
                    'avatar' => $google_user->getAvatar(),
                    
                 
                   
                ]);
               

                Auth::login($new_user);
                
                return redirect()->intended('/')->with('message',__('front_alert.Logged In Successfully'));

            }else{
                Auth::login($user);
                return redirect()->intended('/')->with('message',__('front_alert.Logged In Successfully'));
            }

           


        } catch(\Throwable $th){
            dd('Something went wrong!'. $th->getMessage());
        }
    }
}
