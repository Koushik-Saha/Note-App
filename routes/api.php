<?php

use Illuminate\Http\Request;

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

Route::post('login', 'ApiController@login');
Route::post('register', 'ApiController@register');

Route::group(['middleware' => 'auth.jwt'], function () {
    Route::get('logout', 'ApiController@logout');

    Route::get('user', 'ApiController@getAuthUser');

    Route::get('notes', 'NoteController@index');
    Route::get('notes/{id}', 'NoteController@show');
    Route::post('notes', 'NoteController@store');
    Route::put('notes/{id}', 'NoteController@update');
    Route::delete('notes/{id}', 'NoteController@destroy');
});
