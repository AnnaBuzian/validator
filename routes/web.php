<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/checking', 'CheckingController@start')->name('checking');

Route::get('/statistic', 'StatisticController@index')->name('statistic');

Route::get('/admin/user', 'Admin\UserController@index')->name('admin.user');

Route::get('/social-auth/{provider}', 'Auth\SocialController@redirectToProvider')->name('auth.social');

Route::get('/social-auth/{provider}/callback', 'Auth\SocialController@handleProviderCallback')->name('auth.social.callback');

Route::get('/resource/categories', function () {
    return \App\Http\Resources\Category::collection(\App\Entity\Category::all());
});
