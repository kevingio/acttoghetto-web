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

Auth::routes();

Route::get('/admin/transactions', function () {
    return view('admin.web.transactions.index');
});

Route::get('/admin/products', function () {
    return view('admin.web.product.index');
});

Route::get('/admin/banner-promo', function () {
    return view('admin.web.banner-promo');
});

Route::get('/admin/category', function () {
    return view('admin.web.masterData.category.index');
});

Route::get('/admin/brands', function () {
    return view('admin.web.masterData.brand');
});

Route::get('/admin/size', function () {
    return view('admin.web.masterData.size');
});

Route::get('/checkout', 'HomeController@myCart');

Route::get('/', 'HomeController@landing')->name('landing');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile', 'HomeController@getProfile')->name('show-profile');

Route::post('/profile', 'HomeController@updateProfile')->name('update-profile');

Route::post('/transaction/{id}/upload', 'TransactionController@uploadProof')->name('upload-proof');

Route::post('/change-password', 'HomeController@changePassword')->name('change-password');

Route::resource('brand', 'BrandController');

Route::resource('category', 'CategoryController');

Route::resource('product', 'ProductController');

Route::resource('transaction', 'TransactionController');

/* Ajax from Admin Dashboard */
Route::any('ajax/{page}', function ($page) {
    return app()->call('\App\Http\Controllers\\'.studly_case($page).'Controller@ajax');
});
