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


//トップページ(ツアープラン一覧を表示)
Route::get('/', 'ToursController@index');

// 観光者ユーザ登録
Route::get('user_signup', 'Auth\RegisterController@showRegistrationForm')->name('user_signup.get');
Route::post('user_signup', 'Auth\RegisterController@register')->name('user_signup.post');

// ガイドユーザ登録
Route::get('guide_signup', 'Guide\RegisterController@showRegistrationForm')->name('guide_signup.get');
Route::post('guide_signup', 'Guide\RegisterController@register')->name('guide_signup.post');


// 観光者ログイン認証
Route::get('user_login', 'Auth\LoginController@showLoginForm')->name('user_login');
Route::post('user_login', 'Auth\LoginController@login')->name('user_login.post');
Route::get('user_logout', 'Auth\LoginController@logout')->name('user_logout.get');

// ガイドログイン認証
Route::get('guide_login', 'Guide\LoginController@showLoginForm')->name('guide_login');
Route::post('guide_login', 'Guide\LoginController@login')->name('guide_login.post');
Route::get('guide_logout', 'Guide\LoginController@logout')->name('guide_logout.get');

// ガイドマイページ
Route::resource('guides', 'GuidesController');


//ToursController@indexはトップページで呼び出されるので、それ以外の処理を記述
Route::resource('tours', 'ToursController',['only' => ['store', 'create', 'show', 'update', 'destroy', 'edit']]);

// 観光者マイページ
Route::group(['middleware' => 'auth'], function () {
    Route::resource('users', 'UsersController', ['only' => ['index', 'show']]);
    Route::group(['prefix' => 'users/{id}'], function () {
        Route::post('join', 'UserJoinController@store')->name('user.join');
        Route::delete('unjoin', 'UserJoinController@destroy')->name('user.dont_join');
        Route::get('joinings', 'UsersController@joinings')->name('user.joinings');
    });
    Route::post('search', 'UserSearchController@search')->name('user.search');
});