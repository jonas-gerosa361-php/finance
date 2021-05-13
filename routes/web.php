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
Route::post('/pay-bill', '\App\Http\Controllers\BillsController@payBill');
Route::post('/receive-income', '\App\Http\Controllers\IncomesController@receiveIncome');
Route::post('/bills/delete/{id}', '\App\Http\Controllers\BillsController@delete');
Route::match(['get', 'post'], '/bills/edit/{id}', '\App\Http\Controllers\BillsController@edit');
