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

//Product related routes
Route::get('/', 'ProductController@index')->name('index');
Route::get('/create', 'ProductController@create')->name('create');
Route::post('/store', 'ProductController@store')->name('store');
Route::get('/product/{id}', 'ProductController@show');
Route::get('/product/{id}/delete', 'ProductController@destroy')->name('destroy');


Auth::routes();



