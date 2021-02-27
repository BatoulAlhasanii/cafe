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

$locale = Request::segment(1);

if (in_array($locale, Config::get('app.available_locales'))) {
    \App::setLocale($locale);
} else {
    $locale = '';
}


Route::get('locale/{locale}', function($locale){

    session(['locale' => $locale]);
    app()->setLocale($locale);

    $path = str_replace(url('/'). '/' , '', url()->previous());
    $path = explode('/', $path);

    array_shift($path);

    $newUrl = url('/').'/'. implode('/', $path) ;

    return redirect()->to($newUrl);

})->name('locale');


//without lang
Route::post('/product/add-to-cart', 'App\Http\Controllers\Site\CartController@addToCart')->name('product.add.cart');
Route::post('/product/remove-item', 'App\Http\Controllers\Site\CartController@removeItem')->name('cart.remove.item');
Route::post('/product/set-quantity', 'App\Http\Controllers\Site\CartController@setProductQty')->name('cart.set.quantity');
Route::post('/cart/set-shipping-fee', 'App\Http\Controllers\Site\CartController@setShippingFee')->name('cart.set.shippingFee');
Route::post('/checkout', 'App\Http\Controllers\Site\CheckoutController@placeOrder')->name('checkout.placeOrder');


Route::group(['prefix' => 'K7JCVFW4RGtFkLKk0pDQWZciE4EONEhlUmO'], function () { //

    Auth::routes(['register' => false, // Registration Routes...
        'reset' => false, // Password Reset Routes...
        'verify' => false, // Email Verification Routes...
    ]);

    Route::group(['middleware' => ['auth']], function () {
        Route::group(['middleware' => ['permission:manage-database|view-dashboard']], function () {
            Route::get('/dashboard', 'App\Http\Controllers\Admin\HomeController@index')->name('dashboard');
        });
        Route::group(['middleware' => ['permission:manage-database|view-categories']], function () {
            Route::get('/categories', 'App\Http\Controllers\Admin\CategoryController@index')->name('categories.index');
        });
        Route::group(['middleware' => ['permission:manage-database|create-categories']], function () {
            Route::get('/categories/create', 'App\Http\Controllers\Admin\CategoryController@create')->name('categories.create');
            Route::post('/categories', 'App\Http\Controllers\Admin\CategoryController@store')->name('categories.store');
        });
        Route::group(['middleware' => ['permission:manage-database|edit-categories']], function () {
            Route::get('/categories/{id}', 'App\Http\Controllers\Admin\CategoryController@edit')->name('categories.edit');
            Route::put('/categories/{id}', 'App\Http\Controllers\Admin\CategoryController@update')->name('categories.update');
        });
        Route::group(['middleware' => ['permission:manage-database|view-products']], function () {
            Route::get('/products', 'App\Http\Controllers\Admin\ProductController@index')->name('products.index');
        });
        Route::group(['middleware' => ['permission:manage-database|create-products']], function () {
            Route::get('/products/create', 'App\Http\Controllers\Admin\ProductController@create')->name('products.create');
            Route::post('/products', 'App\Http\Controllers\Admin\ProductController@store')->name('products.store');
        });
        Route::group(['middleware' => ['permission:manage-database|edit-products']], function () {
            Route::get('/products/{id}', 'App\Http\Controllers\Admin\ProductController@edit')->name('products.edit');
            Route::get('/products/stock/{id}', 'App\Http\Controllers\Admin\ProductController@editStock')->name('products.stock.edit');
            Route::put('/products/{id}', 'App\Http\Controllers\Admin\ProductController@update')->name('products.update');
            Route::put('/products/stock/{id}', 'App\Http\Controllers\Admin\ProductController@updateStock')->name('products.stock.update');
        });

        Route::group(['middleware' => ['permission:manage-database|view-orders']], function () {
            Route::get('/orders', 'App\Http\Controllers\Admin\OrderController@index')->name('orders.index');
            Route::get('/orders/show/{id}', 'App\Http\Controllers\Admin\OrderController@show')->name('orders.show');
        });
        Route::group(['middleware' => ['permission:manage-database|update-orders']], function () {
            Route::get('/orders/{id}', 'App\Http\Controllers\Admin\OrderController@edit')->name('orders.edit');
            Route::put('/orders/{id}', 'App\Http\Controllers\Admin\OrderController@update')->name('orders.update');
        });

        Route::group(['middleware' => ['permission:manage-database|view-users']], function () {
            Route::get('/users', 'App\Http\Controllers\Admin\UserController@index')->name('users.index');
        });
        Route::group(['middleware' => ['permission:manage-database|create-users']], function () {
            Route::get('/users/create', 'App\Http\Controllers\Admin\UserController@create')->name('users.create');
            Route::post('/users', 'App\Http\Controllers\Admin\UserController@store')->name('users.store');
        });
        Route::group(['middleware' => ['permission:manage-database|edit-users']], function () {
            Route::get('/users/{id}', 'App\Http\Controllers\Admin\UserController@edit')->name('users.edit');
            Route::put('/users/{id}', 'App\Http\Controllers\Admin\UserController@update')->name('users.update');
        });
        Route::group(['middleware' => ['permission:manage-database|view-settings']], function () {
            Route::get('/settings', 'App\Http\Controllers\Admin\SettingController@index')->name('settings.index');
        });
        Route::group(['middleware' => ['permission:manage-database|update-settings']], function () {
            Route::get('/settings/{id}', 'App\Http\Controllers\Admin\SettingController@edit')->name('settings.edit');
            Route::put('/settings/{id}', 'App\Http\Controllers\Admin\SettingController@update')->name('settings.update');
        });
    });

});


Route::get('product/search', 'App\Http\Controllers\Site\ProductController@search')->name('product.search');

Route::group([
    'prefix' => $locale,
    'middleware' => 'setlocale'], function() {
        Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home');
        Route::get('/category/{slug}', 'App\Http\Controllers\Site\CategoryController@show')->name('category.show');
        Route::get('/product/{slug}', 'App\Http\Controllers\Site\ProductController@show')->name('product.show');
        Route::get('/cart', 'App\Http\Controllers\Site\CartController@showCart')->name('cart.show');
        Route::get('/checkout', 'App\Http\Controllers\Site\CheckoutController@index')->name('checkout.index');
        Route::get('/successful-payment/{orderNumber}', 'App\Http\Controllers\Site\CheckoutController@showSuccessfulPayment')->name('checkout.successful-payment');

        Route::get('/about-us', 'App\Http\Controllers\InfoController@aboutUs')->name('about-us');
        Route::get('/delivery-policy', 'App\Http\Controllers\InfoController@deliveryPolicy')->name('delivery-policy');
        Route::get('/history-of-coffee', 'App\Http\Controllers\InfoController@history')->name('history');
        Route::get('/privacy-policy', 'App\Http\Controllers\InfoController@privacyPolicy')->name('privacy-policy');
        Route::get('/return-policy', 'App\Http\Controllers\InfoController@returnPolicy')->name('return-policy');
        Route::get('/terms-of-service', 'App\Http\Controllers\InfoController@termsOfService')->name('terms-of-service');
});
