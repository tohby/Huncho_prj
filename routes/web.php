<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'HomeController@index');
Route::get('/profile', 'HomeController@profile');
Route::get('/inventories', 'HomeController@products');
Route::get('/inventories/{id}', 'HomeController@product');
Route::get('/{id}/buy', 'HomeController@buy');
Route::get('/invoice/{id}', 'HomeController@invoice');
Route::put('/profile', 'HomeController@storeProfile');
Route::post('/order', 'HomeController@order');
Route::post('/search', 'HomeController@search');
Route::post('/feedback', 'HomeController@feedback_submit');
Route::post('/checkout', 'HomeController@checkout');


Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/', 'AdminController@index');
    Route::get('/profile', 'UsersController@profile');
    Route::put('/profile', 'UsersController@updateProfile');
    Route::resource('brands','BrandController');
    Route::resource('products','ProductController');
    Route::resource('users','UsersController');
    Route::resource('orders','OrderController');
});