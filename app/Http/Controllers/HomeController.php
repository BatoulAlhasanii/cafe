<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\CategoryContract;
use App\Contracts\ProductContract;
use App\Contracts\FlavorContract;

class HomeController extends Controller
{
    protected $categoryRepository;
    protected $productRepository;
    protected $flavorRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(CategoryContract $categoryRepository,
        ProductContract $productRepository,
        FlavorContract $flavorRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->productRepository = $productRepository;
        $this->flavorRepository = $flavorRepository;
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        $categories = $this->categoryRepository->getCoffeeCategories();
        $flavors = $this->flavorRepository->getFlavors();
        $products = $this->productRepository->listFeaturedProducts();
        return view('site.home.home', compact(['categories','flavors','products']));
    }
}
