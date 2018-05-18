<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\User;

class AuthController extends Controller
{
    public function register() {
        User::create([
            'name' => request('name'),
            'username' => request('username'),
            'email' => request('email'),
            'avatar' => 'https://picsum.photos/300/300?image=67',
            'password' => bcrypt(request('password'))
        ]);

        return response()->json(['status' => 201]);
    }
    public function login() {
        // Check if a user with the specified username exists
        $user = User::whereUsername(request('username'))->first();

        if (!$user) {
            return response()->json([
                'message' => 'Wrong username or password',
                'status' => 422
            ], 422);
        }
        // If a user with the username was found - check if the specified password
        // belongs to this user
        if (!Hash::check(request('password'), $user->password)) {
            return response()->json([
                'message' => 'Wrong username or password',
                'status' => 422
            ], 422);
        }
        $data = [
            'grant_type' => 'password',
            'client_id' => '2',
            'client_secret' => 'fLBW8vjDo4rbYxUEJzCk2GJiVGoI9EZ0y2Tp4PFW',
            'username' => $user->email,
            'password' => request('password'),
        ];
        $request = Request::create('/oauth/token', 'POST', $data);
        $response = app()->handle($request);
            
        if ($response->getStatusCode() != 200) {
            return response()->json([
                'message' => 'Wrong email or password',
                'status' => 422
            ], 422);
        }
        // Get the data from the response
        $data = json_decode($response->getContent());

        // Format the final response in a desirable format
        return response()->json([
            'token' => $data->access_token,
            'user' => $user,
            'status' => 200
        ]);
    }
    public function logout() {
        $accessToken = auth()->user()->token();
        $refreshToken = DB::table('oauth_refresh_tokens')
            ->where('access_token_id', $accessToken->id)
            ->update([
                'revoked' => true
            ]);
        $accessToken->revoke();
        return response()->json(['status' => 200]);
    }
}
