<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/home');
});

//TODO: create middleware to auth
Route::get('/home', '\App\Http\Controllers\HomeController@index');
Route::post('/home', '\App\Http\Controllers\HomeController@index');

Route::prefix('/incomes')->group(function () {
    Route::get('/create', '\App\Http\Controllers\IncomesController@create');
    Route::post('/create', '\App\Http\Controllers\IncomesController@store');
    Route::post('/receive', '\App\Http\Controllers\IncomesController@receiveIncome');
    Route::get('/edit/{id}', '\App\Http\Controllers\IncomesController@edit');
    Route::post('/edit/{id}', '\App\Http\Controllers\IncomesController@update');
    Route::post('/delete/{id}', '\App\Http\Controllers\IncomesController@delete');
});

Route::prefix('/bills')->group(function () {
    Route::get('/create', '\App\Http\Controllers\BillsController@create');
    Route::post('/create', '\App\Http\Controllers\BillsController@store');
    Route::get('/{id}/pay', '\App\Http\Controllers\BillsController@showPayView');
    Route::post('/{id}/pay', '\App\Http\Controllers\BillsController@pay');
    Route::get('/edit/{id}', '\App\Http\Controllers\BillsController@edit');
    Route::post('/edit/{id}', '\App\Http\Controllers\BillsController@update');
    Route::post('/delete/{id}', '\App\Http\Controllers\BillsController@delete');
});

Route::prefix('/categories')->group(function () {
    Route::get('/', '\App\Http\Controllers\CategoriesController@index');
    Route::get('/create', '\App\Http\Controllers\CategoriesController@create');
    Route::post('/create', '\App\Http\Controllers\CategoriesController@store');
    Route::get('/edit/{id}', '\App\Http\Controllers\CategoriesController@edit');
    Route::post('/edit/{id}', '\App\Http\Controllers\CategoriesController@update');
    Route::post('/delete/{id}', '\App\Http\Controllers\CategoriesController@delete');
});

Route::prefix('/accounts')->group(function () {
    Route::get('/', '\App\Http\Controllers\AccountsController@index');
    Route::get('/create', '\App\Http\Controllers\AccountsController@create');
    Route::post('/create', '\App\Http\Controllers\AccountsController@store');
    Route::get('/edit/{id}', '\App\Http\Controllers\AccountsController@edit');
    Route::post('/edit/{id}', '\App\Http\Controllers\AccountsController@update');
    Route::post('/delete/{id}', '\App\Http\Controllers\AccountsController@destroy');
});
