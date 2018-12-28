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

Route::get('/', function () {
    return view('welcome');
});


Route::get('create-product', 'ProductController@create');

Route::post('create-product', 'ProductController@store')->name('create-product');

Route::get('test', 'ProductController@getExistingProducts');