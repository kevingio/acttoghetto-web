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
date_default_timezone_get('Asia/Jakarta');

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/profile', 'HomeController@getProfile')->name('show-profile');

Route::post('/profile', 'HomeController@updateProfile')->name('update-profile');

Route::post('/change-password', 'HomeController@changePassword')->name('change-password');

Route::resource('brand', 'BrandController');

Route::resource('category', 'CategoryController');

Route::resource('product', 'ProductController');

Route::resource('transaction', 'TransactionController');
