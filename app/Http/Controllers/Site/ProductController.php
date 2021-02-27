<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Contracts\ProductContract;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    protected $productRepository;


    public function __construct(ProductContract $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function show($slug)
    {
        $product = $this->productRepository->findProductBySlug($slug);

        return view('site.products.view', compact('product'));
    }

    public function search(Request $request)
    {
        $products = $this->productRepository->search($request);

        return view('site.products.search_results', compact('products'));
    }

}
