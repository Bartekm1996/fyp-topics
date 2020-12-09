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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'App\Http\Controllers\TopicsController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::post('user/changeAdminRights', ['as' => 'user.changeAdminRights', 'uses' => 'App\Http\Controllers\UserController@changeAdminRights']);
    Route::post('ticket/create', ['as' => 'ticket.create', 'uses' => 'App\Http\Controllers\TicketController@create']);
    Route::post('ticket/markAsResolved', ['as' => 'ticket.markAsResolved', 'uses' => 'App\Http\Controllers\TicketController@markAsResolved']);
    Route::get('logging', 'App\Http\Controllers\LogMessageController@index')->name('logging');
    Route::get('tickets', 'App\Http\Controllers\TicketController@index')->name('tickets');
    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::get('upgrade', function () {return view('pages.upgrade');})->name('upgrade');
	Route::get('map', function () {return view('pages.maps');})->name('map');
	Route::get('icons', function () {return view('pages.icons');})->name('icons');
	Route::get('messages', function () {return view('pages.messages');})->name('messages');
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);

    Route::get('progress', 'App\Http\Controllers\ProgressController@index')->name('progress');
    Route::post('progress', 'App\Http\Controllers\ProgressController@store');

    Route::get('search', 'App\Http\Controllers\UserController@search')->name('search');

    Route::get('topics', 'App\Http\Controllers\TopicsController@index')->name('topics');
    Route::post('topics', 'App\Http\Controllers\TopicsController@store');
    Route::delete('topics', 'App\Http\Controllers\TopicsController@delete');
    Route::patch('topics', 'App\Http\Controllers\TopicsController@patch');

    Route::get('requests', 'App\Http\Controllers\RequestsController@index')->name('requests');
    Route::patch('review', 'App\Http\Controllers\RequestsController@review');
    Route::patch('idle', 'App\Http\Controllers\RequestsController@idle');
    Route::patch('decline', 'App\Http\Controllers\RequestsController@decline');
    Route::patch('accept', 'App\Http\Controllers\RequestsController@accept');
});



