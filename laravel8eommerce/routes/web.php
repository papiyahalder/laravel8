<?php

use Illuminate\Support\Facades\Route;
// use Auth;

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

Route::get('/', 'App\Http\Controllers\FrontendController@index');
Route::get('/admin/login', 'App\Http\Controllers\Admin\AdminController@index');
Route::post('/admin/login', 'App\Http\Controllers\Admin\AdminController@login')->name('login');
   


// Auth::routes();

Route::prefix('/admin')->group(function () {
    // return view('admin.admin _dashboard');
    // Route::get('dashboard', 'App\Http\Controllers\Admin\AdminController@dashboard');
    // Route::match(['get','post'],'/login', 'App\Http\Controllers\Admin\AdminController@login');
     
    // Route::get('/dashboard', 'App\Http\Controllers\Admin\AdminController@dashboard');
    // Route::get('login', 'App\Http\Controllers\Admin\AdminController@index'); 
    // Route::post('login', 'App\Http\Controllers\Admin\AdminController@login')->name('login');
    Route::group(['middleware'=>['admin']],function () {
        Route::get('/dashboard', 'App\Http\Controllers\Admin\AdminController@dashboard');
        Route::get('logout', 'App\Http\Controllers\Admin\AdminController@logout');

        // ----------------------Admin Category------------------------------//
        Route::get('/category/show', 'App\Http\Controllers\Admin\CategoryController@search');
        Route::get('/category', 'App\Http\Controllers\Admin\CategoryController@index')->name('admin.category');
        Route::get('/category/add', 'App\Http\Controllers\Admin\CategoryController@create')->name('add.category');
        Route::post('/category/store', 'App\Http\Controllers\Admin\CategoryController@store')->name('store.category');
        Route::get('/category/edit/{id}', 'App\Http\Controllers\Admin\CategoryController@edit')->name('edit.category');
        Route::post('/category/update/{id}', 'App\Http\Controllers\Admin\CategoryController@update')->name('update.category');
        Route::post('/update-status', 'App\Http\Controllers\Admin\CategoryController@status');
        Route::get('destroy/category/{id}', 'App\Http\Controllers\Admin\CategoryController@destroy')->name('category.destroy');

        // -------------------------------Admin Brand-------------------------//
        Route::get('/brand/show', 'App\Http\Controllers\Admin\BrandController@index')->name('admin.brand');
        Route::get('/brand/add', 'App\Http\Controllers\Admin\BrandController@create')->name('add.brand');
        Route::post('/brand/store', 'App\Http\Controllers\Admin\BrandController@store')->name('store.brand');
        Route::get('/brand/edit/{id}', 'App\Http\Controllers\Admin\BrandController@edit')->name('edit.brand');
        Route::post('/brand/update/{id}', 'App\Http\Controllers\Admin\BrandController@update')->name('update.brand');
        Route::get('/brand/destroy/{id}', 'App\Http\Controllers\Admin\BrandController@destroy')->name('brand.destroy');
   
        // --------------------------Admin Product--------------------------//
        Route::get('/product/show', 'App\Http\Controllers\Admin\ProductController@index')->name('admin.product');
        Route::get('/product/add', 'App\Http\Controllers\Admin\ProductController@create')->name('add.product');
        Route::post('/product/store', 'App\Http\Controllers\Admin\ProductController@store')->name('store.product');
        Route::get('/product/edit/{id}', 'App\Http\Controllers\Admin\ProductController@edit')->name('edit.product');
        Route::post('/product/update/{id}', 'App\Http\Controllers\Admin\ProductController@update')->name('update.product');
        Route::post('/product/update/image/{id}', 'App\Http\Controllers\Admin\ProductController@updateImage')->name('update.image');
        Route::get('/product/destroy/{id}', 'App\Http\Controllers\Admin\ProductController@destroy')->name('delete.product');
        // Route::post('/products/image-update','Admin\ProductController@updateImage')->name('update-image');
        
         // --------------------------Admin Coupon--------------------------//
         Route::get('/coupon', 'App\Http\Controllers\Admin\CouponController@index')->name('admin.coupon');
         Route::get('/coupon/add', 'App\Http\Controllers\Admin\CouponController@create')->name('add.coupon');
         Route::post('/coupon/store', 'App\Http\Controllers\Admin\CouponController@store')->name('store.coupon');
         Route::get('/coupon/edit/{id}', 'App\Http\Controllers\Admin\CouponController@edit')->name('edit.coupon');
         Route::post('/coupon/update/{id}', 'App\Http\Controllers\Admin\CouponController@update')->name('update.coupon');


         Route::get('/category/show', 'App\Http\Controllers\CategoryController@index');
    });
     
});

