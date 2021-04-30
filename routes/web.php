<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/home');
});

//TODO: create middleware to auth
Route::get('/home', '\App\Http\Controllers\HomeController@index');
