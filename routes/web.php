<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/home');
});

//TODO: create middleware to auth
Route::get('/home', '\App\Http\Controllers\HomeController@index');
Route::get('/create-bill', '\App\Http\Controllers\BillsController@create');
Route::post('/create-bill', '\App\Http\Controllers\BillsController@store');
Route::get('/create-income', '\App\Http\Controllers\IncomesController@create');
Route::post('/create-income', '\App\Http\Controllers\IncomesController@store');
