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

Route::group(['middleware' => ['auth:api']], function (){
    // Trips
    Route::get('/trips', 'TripsController@getAll');
    // Users
    Route::get('/me', 'UsersController@me');
    Route::get('/users', 'UsersController@getAll');
    Route::get('/users/{username}', 'UsersController@findByUsername');
    Route::post('/users/{username}/follow', 'UsersController@follow');
    Route::post('/users/{username}/unfollow', 'UsersController@unfollow');
});
