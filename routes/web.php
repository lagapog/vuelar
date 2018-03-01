<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'PagesController@index');
Auth::routes();

Route::get('/auth/facebook', 'SocialAuthController@facebook');
Route::get('/auth/facebook/callback', 'SocialAuthController@callback');
Route::post('/auth/facebook/register', 'SocialAuthController@register');

Route::get('/trips', 'TripsController@search');
Route::get('/trips/create', 'TripsController@create');
Route::post('/trips/store', 'TripsController@store');
Route::get('/api/trips/{trip}/comments', 'TripsController@comments');
Route::get('/trips/{trip}', 'TripsController@show');

Route::match(['get', 'post'], '/conversation/{username}', 'ConversationsController@show');
Route::post('/conversation/{conversation}/{user}', 'ConversationsController@sendMessage');

Route::get('/api/notifications/{type}', 'UsersController@notifications');
Route::get('/{username}/follows', 'UsersController@follows');
Route::get('/{username}/followers', 'UsersController@followers');
Route::post('/{username}/follow', 'UsersController@follow');
Route::post('/{username}/unfollow', 'UsersController@unfollow');
Route::get('/{username}', 'UsersController@show');


