<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFbUserRequest;
use App\SocialProfile;
use App\User;
use Illuminate\Http\Request;
use Socialite;

class SocialAuthController extends Controller
{
    public function facebook () {
        return Socialite::driver('facebook')->redirect();
    }

    public function callback () {
        $user = Socialite::driver('facebook')->user();
        $existing = User::whereHas('socialProfiles', function ($query) use ($user) {
            $query->where('social_id', $user->id);
        })->first();

        if($existing !== null) {
            auth()->login($existing);
            return redirect('/home');
        }else{
            session()->flash('fbUser', $user);

            return view('auth.facebook',[
                'user' => $user,
            ]);
        }
    }

    public function register (Request $request) {
        $data = session('fbUser');
        $username = $request->input('username');

        $user = User::create([
            'name' => $data['name'],
            'email' => $data->email,
            'avatar' => $data->avatar,
            'username' => $username,
            'password' => bcrypt($data['id']),
        ]);

        SocialProfile::create([
            'social_id' => $data['id'],
            'user_id' => $user->id,
        ]);
        auth()->login($user);
        return redirect('home');
    }
}
