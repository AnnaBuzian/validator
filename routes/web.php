<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/checking', 'CheckingController@start')->name('checking.start');

Route::get('/statistic', 'StatisticController@index')->name('statistic');

Route::get('/social-auth/{provider}', 'Auth\SocialController@redirectToProvider')->name('auth.social');

Route::get('/social-auth/{provider}/callback', 'Auth\SocialController@handleProviderCallback')->name('auth.social.callback');

Route::get('/resource/categories', function () {
    return \App\Http\Resources\Category::collection(\App\Entity\Category::all());
});


// Admin

Route::get('/admin/file/upload', 'Admin\FileController@index')->name('admin.file');

Route::get('/resource/categories', function () {
    return \App\Http\Resources\Category::collection(\App\Entity\Category::all());
});

Route::resource('users', 'Admin\UserController', ['only' => [
    'index', 'edit', 'update', 'destroy'
]]);

Route::resource('file', 'Admin\FileController', ['only' => [
    'index', 'upload', 'store', 'destroy'
]]);

Route::get('/file/index','Admin\FileController@index')->name('file.index');
Route::post('/file/upload','Admin\FileController@showUploadFile')->name('file.upload');