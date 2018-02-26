<?php

namespace App\Http\Controllers;

use App\Conversation;
use App\PrivateMessage;
use App\User;
use App\Notifications\MessageReceived;
use Illuminate\Http\Request;

class ConversationsController extends Controller
{
    public function show($username, Request $request) {
        $user = $this->findByUsername($username);
        $me = $request->user();

        $conversation = Conversation::between($user, $me);

        return view('conversations.show', [
            'conversation' => $conversation,
            'me' => $me,
            'user' => $user,
        ]);
    }

    public function sendMessage(Conversation $conversation, User $user, Request $request) {
        $me = $request->user();
        $message = $request->input('message');
        PrivateMessage::create([
            'conversation_id' => $conversation->id,
            'user_id' => $me->id,
            'message' => $message,
        ]);
        $user->notify(new MessageReceived($me));
        return redirect("/conversation/$user->username");
    }

    private function findByUsername ($username) {
        return User::where('username', $username)->firstOrFail();
    }
}
