<?php

namespace App\Http\Controllers\Site;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Contracts\ProductContract;
use App\Http\Controllers\Controller;
use App\Contracts\AttributeContract;
use Illuminate\Support\Facades\Session;

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

    /*  public function addToCart(Request $request)
    {
        dd($request->all());
        $product = $this->productRepository->findProductById($request->input('productId'));
        $options = $request->except('_token', 'productId', 'price', 'qty');

        Cart::add(uniqid(), $product->name, $request->input('price'), $request->input('qty'), $options);

        return redirect()->back()->with('message', 'Item added to cart successfully.');
    }*/

    public function showCart(Request $request)
    {
        $cart = $this->getCart($request);
        return view('site.order.cart', compact('cart'));
    }

    public function getCart($request)
    {
     //   dd($request->session());
        if (Session::has('cart')) {
            $cart = Session::get('cart');
        } else {
            $cart = new Cart();
            $request->session()->put('cart', $cart);
        }

        return $cart;
    }

    public function addToCart(Request $request)
    {
        $productId = $request->input('productId');
        $qtyToAdd = $request->input('quantity');

        $product = $this->productRepository->findProductById($productId);

        $cart = $this->getCart($request);
        $cart->addToCart($product, $productId, $qtyToAdd);
        return response()->json([
            'status' => 'true',
            'message' => 'Item added to cart successfully.'
        ]);

        //  return redirect()->back()->with('message', 'Item added to cart successfully.');
    }

    public function removeFromCart(Request $request)
    {
        $productId = $request->input('productId');
        $qtyToRemove = $request->input('quantity');

        $product = $this->productRepository->findProductById($productId);

        $cart = $this->getCart($request);
        $cart->removeFromCart($product, $productId, $qtyToRemove);

        return response()->json([
            'status' => 'true',
            'message' => 'Item removed from cart successfully.'
        ]);

        //  return redirect()->back()->with('message', 'Item removed from cart successfully.');
    }

    public function setProductQty(Request $request)
    {
        $productId = $request->input('productId');
        $qtyToSet = $request->input('quantity');

        $product = $this->productRepository->findProductById($productId);

        $cart = $this->getCart($request);
        $cart->setProductQty($product, $productId, $qtyToSet);

        return response()->json([
            'status' => 'true',
            'message' => 'Item quantity updated successfully.'
        ]);

        //  return redirect()->back()->with('message', 'Item removed from cart successfully.');

    }

}
