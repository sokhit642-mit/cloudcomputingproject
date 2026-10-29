<?php

namespace App\Http\Controllers;

use App\Models\Token;
use Illuminate\Http\Request;

class TokenController extends Controller
{
    // public function updateToken(Request $request)
    // {
    //     $request->validate([
    //         'token' => 'required|string',
    //     ]);

    //     $newToken = $request->input('token');

    //     Token::updateOrCreate(
    //         ['name' => 'api_current_token'], // Identifier
    //         ['token' => $newToken]          // New token value
    //     );

    //     return response()->json(['message' => 'Token updated successfully!', 'token' => $newToken], 200);
    // }
    public function updateToken(Request $request)
    {
        $request->validate([
            'token' => 'required|string',
        ]);

        $tokenWithPrefix = $request->input('token');
        $token = str_replace('Bearer ', '', $tokenWithPrefix); // Remove 'Bearer ' prefix

        Token::updateOrCreate(
            ['name' => 'api_current_token'], // Identifier for the token
            ['token' => $token]             // Save only the token value
        );

        return response()->json(['message' => 'Token updated successfully!', 'token' => $token], 200);
    }


    // Get the current token
    public function getToken()
    {
        $token = Token::where('name', 'api_current_token')->first();

        if (!$token) {
            return response()->json(['message' => 'Token not found'], 404);
        }

        return response()->json(['token' => $token->token], 200);
    }

}
