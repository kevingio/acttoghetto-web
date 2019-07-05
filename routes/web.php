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

Route::get('/detail', function () {
    return view('web.product.detail');
});

Route::get('/transactions', function () {
    return view('web.user.transactions');
});


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/profile', 'HomeController@getProfile');

Route::post('/profile', 'HomeController@updateProfile');

Route::resource('brand', 'BrandController');

Route::resource('category', 'CategoryController');

Route::resource('product', 'ProductController');
