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

    /*  public function addToCart(Request $request)
    {
        dd($request->all());
        $product = $this->productRepository->findProductById($request->input('productId'));
        $options = $request->except('_token', 'productId', 'price', 'qty');

        Cart::add(uniqid(), $product->name, $request->input('price'), $request->input('qty'), $options);

        return redirect()->back()->with('message', 'Item added to cart successfully.');
    }*/

}
