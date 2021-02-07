<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\CategoryContract;

class HomeController extends Controller
{

    protected $categoryRepository;

    public function __construct(CategoryContract $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }


    public function index() {
        $categories = $this->categoryRepository->getCoffeeCategories();

        return view('site.home.home', compact('categories'));
    }
}
