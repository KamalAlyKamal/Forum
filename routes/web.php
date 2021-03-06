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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('{provider}/auth', [
	'uses' => 'SocialsController@auth',
	'as' => 'social.auth'
]);

Route::get('{provider}/redirect',[
	'uses' => 'SocialsController@auth_callback',
	'as' => 'social.callback'
]);

//Route Group protected by auth middleware
Route::group(['middleware' => 'auth'], function(){
	//Resource route which registers resource routes just like in the controller --resource
	Route::resource('channels', 'ChannelsController');

	Route::get('/dicussion/create', [
		'uses' => 'DiscussionsController@create',
		'as' => 'discussions.create'
	]);

	Route::post('/dicussion/store', [
		'uses' => 'DiscussionsController@store',
		'as' => 'discussions.store'
	]);

	Route::get('/discussion/{slug}', [
		'uses' => 'DiscussionsController@show',
		'as' => 'discussion'
	]);
});

Route::get('/dicuss', function () {
    return view('dicuss');
});