<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/home');
});

//TODO: create middleware to auth
Route::get('/home', '\App\Http\Controllers\HomeController@index');
Route::get('/cadastrar', '\App\Http\Controllers\HomeController@create');
Route::post('/cadastrar', '\App\Http\Controllers\HomeController@store');
