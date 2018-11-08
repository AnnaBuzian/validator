<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/admin/user', 'Admin\UserController@index')->name('admin.user');

Route::get('/admin/file/upload', 'Admin\FileController@index')->name('admin.file');

Route::get('/resource/categories', function () {
    return \App\Http\Resources\Category::collection(\App\Entity\Category::all());
});
