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

//without lang
Route::post('/product/add-to-cart', 'App\Http\Controllers\Site\ProductController@addToCart')->name('product.add.cart');



Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home');
Route::get('/category/{slug}', 'App\Http\Controllers\Site\CategoryController@show')->name('category.show');
Route::get('/product/{slug}', 'App\Http\Controllers\Site\ProductController@show')->name('product.show');
Route::get('/cart', 'App\Http\Controllers\Site\ProductController@showCart')->name('cart.show');
