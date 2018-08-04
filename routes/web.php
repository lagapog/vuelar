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
Route::get('/auth/{provider}', 'SocialAuthController@redirectToProvider');
Route::get('/auth/{provider}/callback', 'SocialAuthController@handleProviderCallback');

Route::get('{any}/{another?}/{end?}', 'PagesController@index');

Route::match(['get', 'post'], '/conversation/{username}', 'ConversationsController@show');
Route::post('/conversation/{conversation}/{user}', 'ConversationsController@sendMessage');

// Route::get('/api/notifications/{type}', 'UsersController@notifications');


