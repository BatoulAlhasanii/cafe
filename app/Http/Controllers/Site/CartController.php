<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\ProductContract;
use App\Contracts\CartContract;
use App\Contracts\CityContract;
use App\Models\Cart;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    protected $productRepository;
    protected $cartRepository;
    protected $cityRepository;

    public function __construct(ProductContract $productRepository, CartContract $cartRepository, CityContract  $cityRepository)
    {
        $this->productRepository = $productRepository;
        $this->cartRepository = $cartRepository;
        $this->cityRepository = $cityRepository;
    }

    public function showCart(Request $request)
    {
        //Session::flush('cart');
        //if no items left in cart after removing unavailable products in checkout
        //, redirection from checkout to cart will happen and there will be
        //error flash message
        if (Session::has('noItemsLeftInCart')) {
            session()->flash('error', ['No items left in cart']);
            session()->forget('noItemsLeftInCart');
        }

        $this->cartRepository->updateCart();
        $cart = $this->cartRepository->getCart($request);


        return view('site.order.cart');
    }


    public function addToCart(Request $request)
    {
        $this->validate($request, [
            'productId' => 'required|exists:products,id',
            'quantity' => ['required', 'integer', 'min:1', new \App\Rules\ValidateProductAddedQty()]
        ]);

        $productId = $request->input('productId');
        $qtyToAdd = $request->input('quantity');

        $product = $this->productRepository->findProductById($productId);

        $cart = $this->cartRepository->getCart($request);
        $cart->addToCart($product, $productId, $qtyToAdd);
        return response()->json([
            'status' => 'true',
            'message' => 'Item added to cart successfully.',
            'cart_count' => Session::get('cart')->getCartCount()
        ]);

        //  return redirect()->back()->with('message', 'Item added to cart successfully.');
    }

    public function removeItem(Request $request)
    {
        $this->validate($request, [
            'productId' => 'required|exists:products,id'
        ]);

        $productId = $request->input('productId');

        $cart = $this->cartRepository->getCart($request);
        $cart->removeItem($productId);

        return response()->json([
            'status' => 'true',
            'message' => 'Item removed from cart successfully.',
            'cart_count' => Session::get('cart')->getCartCount(),
            'cart_totals' => Session::get('cart')->getCartTotals(),
            'currency' => config('currency.' . app()->getLocale())
        ]);

        //  return redirect()->back()->with('message', 'Item removed from cart successfully.');
    }

    public function setProductQty(Request $request)
    {
        $this->validate($request, [
            'productId' => 'required|exists:products,id',
            'quantity' => ['required', 'integer', 'min:1', new \App\Rules\ValidateProductSettedQty()]
        ]);

        $productId = $request->input('productId');
        $qtyToSet = $request->input('quantity');
        $product = $this->productRepository->findProductById($productId);

        $cart = $this->cartRepository->getCart($request);
        $cart->setProductQty($product, $productId, $qtyToSet);

        return response()->json([
            'status' => 'true',
            'message' => 'Item quantity updated successfully.',
            'cart_count' => Session::get('cart')->getCartCount(),
            'product' => Session::get('cart')->getCartProductById($productId),
            'cart_totals' => Session::get('cart')->getCartTotals(),
            'currency' => config('currency.' . app()->getLocale())
        ]);

        //  return redirect()->back()->with('message', 'Item removed from cart successfully.');

    }

    public function setShippingFee(Request $request)
    {
        $this->validate($request, [
            'city_id' => 'required|exists:cities,id'
        ]);

        $city = $this->cityRepository->findCityById($request->city_id);

        $cart = $this->cartRepository->getCart($request);

        $cart->setCityShippingFee($city->shipping_fees);

        return response()->json([
            'status' => 'true',
            'cart_totals' => Session::get('cart')->getCartTotals(),
            'currency' => config('currency.' . app()->getLocale())
        ]);
    }
}
