<?php

namespace App\Http\Controllers;

use App\Notifications\UserFollowed;
use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function me(Request $request) {
        $user = $request->user();
        return User::with(['trips', 'follows', 'followers'])
            ->where('username', $user->username)
            ->firstOrFail();
    }

    public function getAll() {
        return User::all();
    }

    public function findByUsername ($username, Request $request) {
        $me = $request->user();
        $user = User::with(['trips', 'follows', 'followers'])
            ->where('username', $username)
            ->firstOrFail();
        $user->isFollow = $me->isFollowing($user);
        return $user;
    }

    public function follow ($username, Request $request) {
        $user = User::where('username', $username)->firstOrFail();
        $me = $request->user();

        $me->follows()->attach($user);
        $user->notify(new UserFollowed($me));
    }

    public function unfollow ($username, Request $request) {
        $user = User::where('username', $username)->firstOrFail();
        $me = $request->user();

        $me->follows()->detach($user);
    }

    // public function notifications ($type, Request $request) {
    //     $me = $request->user();
    //     if($type == "alerts") {
    //         return $me->notifications->where('type', 'App\Notifications\UserFollowed');
    //     }

    //     return $me->notifications->where('type', 'App\Notifications\MessageReceived');
    // }
}
