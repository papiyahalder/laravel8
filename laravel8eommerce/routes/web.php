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
        Route::get('/category', 'App\Http\Controllers\Admin\CategoryController@index')->name('admin.category');
        Route::get('/category/add', 'App\Http\Controllers\Admin\CategoryController@create')->name('add.category');
        Route::post('/category/store', 'App\Http\Controllers\Admin\CategoryController@store')->name('store.category');
        Route::get('/category/edit', 'App\Http\Controllers\Admin\CategoryController@edit')->name('edit.category');

    });
     
});

