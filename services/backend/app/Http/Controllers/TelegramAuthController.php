<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class TelegramAuthController extends Controller
{
    public function handleTelegramCallback(Request $request)
    {
        $data = $request->all();

        // Ensure the 'hash' key exists in the incoming data
        if (!isset($data['hash'])) {
            return redirect()->route('login')->withErrors('Invalid Telegram data.');
        }

        // Validate the incoming request using the Telegram algorithm
        if ($this->validateTelegramData($data)) {
            // Check if the user already exists
            $user = User::where('telegram_id', $data['id'])->first();

            if (!$user) {
                // Create a new user if not exists
                $user = User::create([
                    'name' => $data['first_name'] ?? 'Unknown',
                    'telegram_id' => $data['id'],
                    'password' => Hash::make(uniqid()), // Set a random password
                    'avatar' => $data['photo_url'] ?? null,
                ]);
            }

            // Log the user in
            Auth::login($user);

            return redirect()->intended('/');
        }

        return redirect()->route('login')->withErrors('Invalid Telegram data.');
    }

    private function validateTelegramData(array $data)
    {
        $check_hash = $data['hash'];
        unset($data['hash']);
        ksort($data); // Ensure data is sorted by key
        
        $data_check_string = '';
        foreach ($data as $key => $value) {
            $data_check_string .= "$key=$value\n";
        }

        $secret_key = hash('sha256', env('TELEGRAM_BOT_TOKEN'), true);
        $hash = hash_hmac('sha256', $data_check_string, $secret_key);

        return hash_equals($hash, $check_hash);
    }
}
