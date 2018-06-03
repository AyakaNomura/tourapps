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

// 観光者ユーザ登録
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('user_signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('user_signup.post');