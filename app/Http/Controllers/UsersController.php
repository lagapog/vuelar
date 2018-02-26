<?php

namespace App\Http\Controllers;

use App\Notifications\UserFollowed;
use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function show ($username) {

        $user = $this->findByUsername($username);

        return view('users.show', [
            'user' => $user
        ]);
    }

    public function follows ($username) {

        $user = $this->findByUsername($username);

        return view('users.follows', [
            'user' => $user
        ]);
    }

    public function followers ($username) {
        $user = $this->findByUsername($username);

        return view('users.followers', [
            'user' => $user
        ]);
    }

    public function follow ($username, Request $request) {
        $user = $this->findByUsername($username);
        $me = $request->user();

        $me->follows()->attach($user);
        $user->notify(new UserFollowed($me));
        return redirect("/$username");
    }

    public function unfollow ($username, Request $request) {
        $user = $this->findByUsername($username);
        $me = $request->user();

        $me->follows()->detach($user);
        return redirect("/$username");
    }

    public function notifications ($type, Request $request) {
        $me = $request->user();
        if($type == "alerts") {
            return $me->notifications->where('type', 'App\Notifications\UserFollowed');
        }

        return $me->notifications->where('type', 'App\Notifications\MessageReceived');
    }

    private function findByUsername ($username) {
        return User::where('username', $username)->firstOrFail();
    }
}
