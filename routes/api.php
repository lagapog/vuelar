<?php

use Illuminate\Http\Request;
use App\Trip;
use App\User;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/users', function () {
    return User::all();
});

Route::middleware('auth:api')->get('/trips', function() {
    return Trip::with('user')->all();
});