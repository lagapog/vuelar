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
Route::post('/register', 'AuthController@register');
Route::post('/login', 'AuthController@login');
Route::post('/checkUnique', 'AuthController@checkUnique');
Route::middleware('auth:api')->group(function () {
    //Authentication
    Route::post('/logout', 'AuthController@logout');
    // Users
    Route::get('/me', 'UsersController@me');
    Route::get('/users', 'UsersController@getAll');
    Route::get('/users/{username}', 'UsersController@findByUsername');
    Route::post('/users/{username}/follow', 'UsersController@follow');
    Route::post('/users/{username}/unfollow', 'UsersController@unfollow');
    // Trips
    Route::get('/trips', 'TripsController@getAll');
    Route::post('/trips/create', 'TripsController@create');
    Route::get('/trips/search/{query}', 'TripsController@search');
    Route::get('/trips/{trip}', 'TripsController@findById');
    // Comments
    Route::get('/comments/{trip}/', 'TripsController@comments');
});
