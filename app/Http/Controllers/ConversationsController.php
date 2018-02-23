<?php

namespace App\Http\Controllers;

use App\Conversation;
use App\PrivateMessage;
use App\User;
use Illuminate\Http\Request;

class ConversationsController extends Controller
{
    public function show($username, Request $request) {
        $user = $this->findByUsername($username);
        $me = $request->user();

        $conversation = Conversation::between($user, $me);

        return view('conversations.show', [
            'conversation' => $conversation,
            'me' =>$me,
        ]);
    }

    public function sendMessage(Conversation $conversation, Request $request) {
        $me = $request->user();
        $username = $conversation->users->except($me->id)->implode('username');
        $message = $request->input('message');
        PrivateMessage::create([
            'conversation_id' => $conversation->id,
            'user_id' => $me->id,
            'message' => $message,
        ]);

        return redirect('/conversation/'.$username);
    }

    private function findByUsername ($username) {
        return User::where('username', $username)->firstOrFail();
    }
}
