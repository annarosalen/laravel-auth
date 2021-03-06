<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('update/user/icon', 'HomeController@updateIcon') -> name('update-icon');

Route::get('clear/user/icon', 'HomeController@clearIcon') -> name('clear-icon');

