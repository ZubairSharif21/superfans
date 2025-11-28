<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function create(Request $request)
    {
        $chat = new Chat();
        $chat->user_id = $request->user_id;
        $chat->influencer_id = $request->influencer_id;
        $chat->save();
    }

    public function retrieveChat(int $influencer_id)
    {
        return Chat::where(['user_id' => auth()->id(), 'influencer_id' => $influencer_id])->first();
    }
    
   public function sendMessage(Request $request)
    {
        $request->validate([
            'message' => 'required|string',
            'chat_id' => 'required|integer',
            'receiver_id' => 'required|integer',
        ]);

        $sender_id = auth()->user()->id;

        $message = Message::create([
            'message' => $request->message,
            'chat_id' => $request->chat_id,
            'sender_id' => $sender_id,
            'receiver_id' => $request->receiver_id,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => $message
        ]);
    }

 public function getMessages(Request $request)
    {
        $messages = Message::where('chat_id', $request->chat_id)
            ->orderBy('created_at', 'asc')
            ->get();

        return response()->json($messages);
    }


}
