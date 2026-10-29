<?php

namespace App\Http\Controllers\Admin;

use App\Models\Chatid;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Http;

class TelegramController extends Controller
{
    public function showFormget()
    {
        // $chatid = Chatid::first();
        return view('admin.chatid.get');
    }
    public function showFormcgange()
    {
        $chatid = Chatid::first();
        return view('admin.chatid.change', compact('chatid'));
    }
    public function saveTelegramChatId(Request $request)
    {
        // Validate the chat ID
        $request->validate([
            'chat_id' => 'required|string',
        ]);

        // Check if a chat ID already exists (assuming there's only one admin or one record)
        $chatIdRecord = Chatid::first();

        if ($chatIdRecord) {
            // If the chat ID record exists, update it with the new chat ID
            $chatIdRecord->chat_id = $request->chat_id;
            $chatIdRecord->save();
            // ('message', __('alert.Brand_added_success'), 'success');
            return redirect()->back()->with('message', ('Telegram Chat ID updated successfully!'), 'success');
        } else {
            // If no chat ID record exists, return an error message
            return redirect()->back()->with('message', ('No existing Telegram Chat ID found to update.'), 'warning');
        }
    }

    // public function getChatId(Request $request)
    // {
    //     // Telegram Bot Token
    //     $botToken = '8065406790:AAH3pgMiJDjSllHctHhqSZhy6PBem6cgFvA';
        
    //     // Make the API request to get updates
    //     $response = Http::get("https://api.telegram.org/bot{$botToken}/getUpdates");

    //     // Check if the response is successful and contains messages
    //     if ($response->successful()) {
    //         // Get chat ID from the response (Assume the first message in the update)
    //         $updates = $response->json();
    //         if (!empty($updates['result'])) {
    //             $chatId = $updates['result'][0]['message']['chat']['id']; // Extract chat ID
    //             return view('admin.chatid.index', ['chat_id' => $chatId]);
    //         } else {
    //             return view('admin.chatid.index', ['error' => 'No updates found. Please send a message to the bot first.']);
    //         }
    //     } else {
    //         return view('admin.chatid.index', ['error' => 'Failed to get updates from Telegram API.']);
    //     }
    // }

    public function getChatId(Request $request)
    {
        // Your existing Telegram Bot Token (same bot, different chat)
        $botToken = '8065406790:AAH3pgMiJDjSllHctHhqSZhy6PBem6cgFvA'; // Replace with your existing bot token

        // Make the API request to get updates (including offset to skip old updates)
        $response = Http::get("https://api.telegram.org/bot{$botToken}/getUpdates?offset=-1");

        // Check if the response is successful and contains messages
        if ($response->successful()) {
            // Get updates from the response
            $updates = $response->json();
            
            // Check if there are any updates (messages) in the result
            if (!empty($updates['result'])) {
                // Loop through updates and extract chat IDs
                foreach ($updates['result'] as $update) {
                    $chatId = $update['message']['chat']['id']; // Extract chat ID
                    // You can log or return the chat ID here
                    return view('admin.chatid.get', ['chat_id' => $chatId]);
                }
            } else {
                // If no updates found, return a message telling the user to send a message first
                return back()->with('message', ('No updates found. Please send a message to the bot from the new chat first.'),'warning');
            }
        } else {
            // If request fails, return an error message
            return back()->with('message', ('Failed to get updates from Telegram API.'), 'error');
        }
    }

  
}

