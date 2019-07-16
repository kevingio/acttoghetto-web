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

Route::get('/admin/products', function () {
    return view('admin.web.product.index');
});

Route::get('/admin/banner-promo', function () {
    return view('admin.web.banner-promo');
});

Route::get('/admin/brands', function () {
    return view('admin.web.masterData.brand.index');
});

Route::get('/', 'HomeController@landing')->name('landing');

Route::get('/admin', function () {
    return redirect('/admin/transaction');
});

Route::middleware(['role:3'])->group(function () {
    Route::get('/checkout', 'HomeController@myCart');

    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/profile', 'HomeController@getProfile')->name('show-profile');

    Route::post('/profile', 'HomeController@updateProfile')->name('update-profile');

    Route::post('/transaction/{id}/upload', 'TransactionController@uploadProof')->name('upload-proof');

    Route::post('/change-password', 'HomeController@changePassword')->name('change-password');

    Route::resource('product', 'ProductController');

    Route::resource('transaction', 'TransactionController');

    /* Ajax from Customer */
    Route::any('ajax/{page}', function ($page) {
        return app()->call('\App\Http\Controllers\\'.studly_case($page).'Controller@ajax');
    });
});

Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:1,2'])->group(function () {
    Route::resource('transaction', 'Admin\TransactionController');

    // Route::resource('brand', 'Admin\BrandController');

    Route::resource('category', 'Admin\CategoryController');

    Route::resource('size', 'Admin\SizeController');

    /* Ajax from Admin Dashboard */
    Route::any('ajax/{page}', function ($page) {
        return app()->call('\App\Http\Controllers\Admin\\'.studly_case($page).'Controller@ajax');
    });
});
