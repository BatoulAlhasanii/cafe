<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\ProductContract;
use App\Models\Cart;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    protected $productRepository;


    public function __construct(ProductContract $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function showCart(Request $request)
    {
        $cart = $this->getCart($request);

        $productsInfo = $cart->getCartProducts();

        return view('site.order.cart', compact('productsInfo'));
    }

    public function getCart($request)
    {
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

    public function removeItem(Request $request)
    {
        $productId = $request->input('productId');

        $cart = $this->getCart($request);
        $cart->removeItem($productId);

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
