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

Route::get('/{any}', 'PagesController@index');
Route::get('/trips/{any}', 'PagesController@index');

Route::get('/trips', 'TripsController@search');
Route::get('/trips/create', 'TripsController@create');
Route::post('/trips/store', 'TripsController@store');



Route::match(['get', 'post'], '/conversation/{username}', 'ConversationsController@show');
Route::post('/conversation/{conversation}/{user}', 'ConversationsController@sendMessage');

// Route::get('/api/notifications/{type}', 'UsersController@notifications');


