<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Session;
use Illuminate\Support\Facades\View;
use App\Models\Setting;
use App\Models\Category;

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
        View::composer(['site.products.search_results'], function ($view) {
            $activateDiscount = Setting::where('setting_name', Setting::$activateDiscountName)->first();
            $isDiscountActivated = intval($activateDiscount->setting_value);
            $view->with('isDiscountActivated', $isDiscountActivated);
        });
        View::composer(['site.flavors.view'], function ($view) {
            $activateDiscount = Setting::where('setting_name', Setting::$activateDiscountName)->first();
            $isDiscountActivated = intval($activateDiscount->setting_value);
            $view->with('isDiscountActivated', $isDiscountActivated);
        });

        View::composer(['layout.header'], function ($view) {
            $categories = Category::where('parent_id', Category::$coffeeId)
                ->where('is_active', true)
                ->with(array('categoryTranslations' => function($query) {
                    $query->where('lang', app()->getLocale())->select('category_id', 'name');
                }))->get();
            $view->with('categories', $categories);
        });

    }
}
