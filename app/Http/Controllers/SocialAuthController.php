<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFbUserRequest;
use App\SocialProfile;
use App\User;
use Illuminate\Http\Request;
use Socialite;

class SocialAuthController extends Controller
{
    public function redirectToProvider ($provider) {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback ($provider) {
        $socialiteUser = Socialite::driver($provider)->user();
        if($socialiteUser->email == null) {
            $socialiteUser->email = bcrypt($socialiteUser->name);
        }
        $user = $this->findOrCreateUser($provider, $socialiteUser);
        $data = [
            'grant_type' => 'password',
            'client_id' => '2',
            'client_secret' => 'QYWxTbRJzq07s4MaNVha8QBE31dUcokKs3Y15CQ1',
            'username' => $user->email,
            'password' => $user->email,
        ];
        $request = Request::create('/oauth/token', 'POST', $data);
        $response = app()->handle($request);
        $data = json_decode($response->getContent());

        return view('auth.provider', [
            'token' => $data->access_token,
            'user' => $user,
            'status' => 200
        ]);
    }

    public function findOrCreateUser($provider, $socialiteUser) {
        if ($user = $this->findUserBySocialId($provider, $socialiteUser->getId())) {
            return $user;
        }
        if ($user = $this->findUserByEmail($provider, $socialiteUser->getEmail())) {
            $this->addSocialAccount($provider, $user, $socialiteUser);
            return $user;
        }
        $user = User::create([
            'username' => str_random(15),
            'name' => $socialiteUser->getName(),
            'email' => $socialiteUser->getEmail(),
            'password' => bcrypt($socialiteUser->getEmail()),
            'avatar' => $socialiteUser->getAvatar(),
        ]);
        $this->addSocialAccount($provider, $user, $socialiteUser);
        return $user;
    }
    public function findUserBySocialId($provider, $id) {
        $SocialProfile = SocialProfile::where('provider', $provider)
            ->where('provider_id', $id)
            ->first();
        return $SocialProfile ? $SocialProfile->user : false;
    }

    public function findUserByEmail($provider, $email) {
        return  !$email ? null : User::where('email', $email)->first();
    }

    public function addSocialAccount($provider, $user, $socialiteUser) {
        SocialProfile::create([
            'user_id' => $user->id,
            'provider' => $provider,
            'provider_id' => $socialiteUser->getId(),
            'token' => $socialiteUser->token,
        ]);
    }
}
