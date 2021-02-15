<?php

namespace App\Repositories;

use App\Contracts\CartContract;
use Illuminate\Support\Facades\Session;
use App\Models\Cart;
use App\Models\Product;

/**
 * Class CartRepository
 *
 * @package \App\Repositories
 */
class CartRepository implements CartContract
{
    public function getCart($request) {

        if (Session::has('cart')) {
            $cart = Session::get('cart');
        } else {
            $cart = new Cart();
            $request->session()->put('cart', $cart);
        }

        return $cart;
    }

    public function updateCart(){

        if (Session::has('cart')) {

            $items = Session::get('cart')->getCartItems();
            $totalPrice = 0.00;
            $totalQuantity = 0;

            foreach ($items as $id => $item) {

                $product = Product::find($item['product']->id);


                // Emptify new fields

                //in case cart page was refreshed
                if(array_key_exists('requested_qty', $item)) {
                    if($item['requested_qty'] !== null) {
                        $item['qty'] = $item['requested_qty'];
                    }
                }

                $item['is_available_item'] = null; //Item still available in stock
                $item['is_qty_available'] = null; //Requested quantity is available in stock
                $item['requested_qty'] = null;  //The available qty if the requsted qty is not available anymore




                if ($product->is_active) {
                    if ($item['qty'] <= $product->stock) {
                        $item['is_qty_available'] = true;
                        $item['is_available_item'] = true;
                        $item['requested_qty'] = $item['qty'];
                    } else {
                        $item['is_qty_available'] = false;
                        $item['requested_qty'] = $item['qty'];
                        if ($product->stock > 0) {
                            $item['qty'] = $product->stock;
                            $item['is_available_item'] = true;
                        } else {
                            $item['qty'] = 0;
                            $item['is_available_item'] = false;
                        }
                    }
                    $item['current_price'] = $product->getCurrentPrice();
                } else {
                    $item['is_available_item'] = false;
                    $item['is_qty_available'] = false;
                    $item['requested_qty'] = $item['qty'];
                    $item['qty'] = 0;
                    $product->stock = 0;
                }


                $product->is_available_item = $item['is_available_item'];
                $product->is_qty_available = $item['is_qty_available'];
                $product->requested_qty = $item['requested_qty'];

                $item['product'] = $product;

                //update the item in items array
                $items[$id] = $item;

                if ($item['is_available_item']) {
                    $totalPrice += $item['qty'] * $item['current_price'];
                    $totalQuantity += $item['qty'];
                }

            }

            Session::get('cart')->setCartItems($items, $totalPrice, $totalQuantity);
        }
    }
}
