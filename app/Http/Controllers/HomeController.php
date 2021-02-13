<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\CategoryContract;
use App\Contracts\ProductContract;

class HomeController extends Controller
{
    protected $categoryRepository;
    protected $productRepository;


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(CategoryContract $categoryRepository, ProductContract $productRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->productRepository = $productRepository;
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        $categories = $this->categoryRepository->getCoffeeCategories();
        $products = $this->productRepository->listFeaturedProducts();
        return view('site.home.home', compact(['categories', 'products']));
    }
}
