<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::post('user/changeAdminRights', ['as' => 'user.changeAdminRights', 'uses' => 'App\Http\Controllers\UserController@changeAdminRights']);
    Route::post('ticket/create', ['as' => 'ticket.create', 'uses' => 'App\Http\Controllers\TicketController@create']);
    Route::get('logging', 'App\Http\Controllers\LogMessageController@index')->name('logging');
    Route::get('progress', 'App\Http\Controllers\ProgressController@index')->name('progress');
    Route::get('tickets', 'App\Http\Controllers\TicketsController@index')->name('tickets');
    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::get('upgrade', function () {return view('pages.upgrade');})->name('upgrade');
	Route::get('map', function () {return view('pages.maps');})->name('map');
	Route::get('icons', function () {return view('pages.icons');})->name('icons');
	Route::get('messages', function () {return view('pages.messages');})->name('messages');
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});



