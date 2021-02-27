<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Contracts\CategoryContract;
use App\Contracts\ProductContract;
use App\Http\Controllers\BaseController;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ProductController extends BaseController
{

    protected $categoryRepository;

    protected $productRepository;

    public function __construct(
        CategoryContract $categoryRepository,
        ProductContract $productRepository
    )
    {
        $this->categoryRepository = $categoryRepository;
        $this->productRepository = $productRepository;
    }

    public function index()
    {
        $products = $this->productRepository->listProducts();

        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = $this->categoryRepository->listCategories('name', 'asc');

        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $this->validate($request, Product::rules());

        $product = $this->productRepository->createProduct($request);

        if (!$product) {
            return $this->responseRedirectBack('Error occurred while creating product.', 'error', true, true);
        }
        return $this->responseRedirect('products.index', 'Product added successfully' ,'success',false, false);
    }

    public function edit($id)
    {
        $product = $this->productRepository->findProductById($id);
        $categories = $this->categoryRepository->listCategories('name', 'asc');

        return view('admin.products.edit', compact('categories', 'product'));
    }

    public function editStock($id)
    {
        $product = $this->productRepository->findProductById($id);

        return view('admin.products.edit_stock', compact('product'));
    }

    public function update(Request $request)
    {
        $this->validate($request, Product::editRules());

        $product = $this->productRepository->updateProduct($request);

        if (!$product) {
            return $this->responseRedirectBack('Error occurred while updating product.', 'error', true, true);
        }
        return $this->responseRedirect('products.index', 'Product updated successfully' ,'success',false, false);
    }

    public function updateStock(Request $request)
    {
        $this->validate($request, Product::editStockRules());

        $product = $this->productRepository->updateStock($request);

        if (!$product) {
            return $this->responseRedirectBack('Error occurred while updating product.', 'error', true, true);
        }
        return $this->responseRedirect('products.index', 'Product updated successfully' ,'success',false, false);
    }
}
