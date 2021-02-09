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
Route::post('/product/add-to-cart', 'App\Http\Controllers\Site\CartController@addToCart')->name('product.add.cart');
Route::post('/product/remove-item', 'App\Http\Controllers\Site\CartController@removeItem')->name('cart.remove.item');
Route::post('/product/set-quantity', 'App\Http\Controllers\Site\CartController@setProductQty')->name('cart.set.quantity');


Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home');
Route::get('/category/{slug}', 'App\Http\Controllers\Site\CategoryController@show')->name('category.show');
Route::get('/product/{slug}', 'App\Http\Controllers\Site\ProductController@show')->name('product.show');
Route::get('/cart', 'App\Http\Controllers\Site\CartController@showCart')->name('cart.show');
Route::get('/checkout', 'App\Http\Controllers\Site\CheckoutController@index')->name('checkout.index');
Route::post('/checkout', 'App\Http\Controllers\Site\CheckoutController@placeOrder')->name('checkout.placeOrder');
