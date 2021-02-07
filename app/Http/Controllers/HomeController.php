<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index() {
        $categories = \App\Models\Category::where('parent_id', \App\Models\Category::$coffeeId)
        ->where('is_active', true)
        ->with(array('CategoryTranslations' => function($query) {
            $query->where('lang', app()->getLocale())->select('category_id', 'name');
        }))->get();

        return view('site.home.home', compact('categories'));
    }
}
