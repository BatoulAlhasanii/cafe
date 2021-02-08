<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\CategoryContract;
use App\Contracts\ProductContract;

class HomeController extends Controller
{

    protected $categoryRepository;
    protected $productRepository;

    public function __construct(CategoryContract $categoryRepository, ProductContract $productRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->productRepository = $productRepository;
    }


    public function index() {
        $categories = $this->categoryRepository->getCoffeeCategories();
        $products = $this->productRepository->listFeaturedProducts();
        return view('site.home.home', compact(['categories', 'products']));
    }
}
