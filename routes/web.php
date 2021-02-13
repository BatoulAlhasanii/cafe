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

Route::group(['prefix' => '' /** TODO Add prefix for security e.g. admin-xvq734r9v54k85e8*/], function () { //

    Auth::routes(['register' => false, // Registration Routes...
        'reset' => false, // Password Reset Routes...
        'verify' => false, // Email Verification Routes...
    ]);

    Route::get('/dashboard', 'App\Http\Controllers\Admin\HomeController@index')->name('dashboard');
    Route::get('/categories', 'App\Http\Controllers\Admin\CategoryController@index')->name('categories.index');
    Route::get('/categories/create', 'App\Http\Controllers\Admin\CategoryController@create')->name('categories.create');
    Route::post('/categories', 'App\Http\Controllers\Admin\CategoryController@store')->name('categories.store');
    Route::get('/categories/{id}', 'App\Http\Controllers\Admin\CategoryController@edit')->name('categories.edit');
    Route::put('/categories/{id}', 'App\Http\Controllers\Admin\CategoryController@update')->name('categories.update');

    Route::get('/products', 'App\Http\Controllers\Admin\ProductController@index')->name('products.index');
    Route::get('/products/create', 'App\Http\Controllers\Admin\ProductController@create')->name('products.create');
    Route::post('/products', 'App\Http\Controllers\Admin\ProductController@store')->name('products.store');
    Route::get('/products/{id}', 'App\Http\Controllers\Admin\ProductController@edit')->name('products.edit');
    Route::put('/products/{id}', 'App\Http\Controllers\Admin\ProductController@update')->name('products.update');

});

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home');
Route::get('/category/{slug}', 'App\Http\Controllers\Site\CategoryController@show')->name('category.show');
Route::get('/product/{slug}', 'App\Http\Controllers\Site\ProductController@show')->name('product.show');
Route::get('/cart', 'App\Http\Controllers\Site\CartController@showCart')->name('cart.show');
Route::get('/checkout', 'App\Http\Controllers\Site\CheckoutController@index')->name('checkout.index');
Route::post('/checkout', 'App\Http\Controllers\Site\CheckoutController@placeOrder')->name('checkout.placeOrder');

//Auth::routes();

