<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Session;
use Illuminate\Support\Facades\View;
use App\Models\Setting;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (!Session::has('cart')) {
            $cart = new \App\Models\Cart();
            session()->put('cart', $cart);
        }

        View::composer(['site.home.home'], function ($view) {
            $activateDiscount = Setting::where('setting_name', Setting::$activateDiscountName)->first();
            $isDiscountActivated = intval($activateDiscount->setting_value);
            $view->with('isDiscountActivated', $isDiscountActivated);
        });
        View::composer(['site.categories.view'], function ($view) {
            $activateDiscount = Setting::where('setting_name', Setting::$activateDiscountName)->first();
            $isDiscountActivated = intval($activateDiscount->setting_value);
            $view->with('isDiscountActivated', $isDiscountActivated);
        });
        View::composer(['site.products.view'], function ($view) {
            $activateDiscount = Setting::where('setting_name', Setting::$activateDiscountName)->first();
            $isDiscountActivated = intval($activateDiscount->setting_value);
            $view->with('isDiscountActivated', $isDiscountActivated);
        });

    }
}
