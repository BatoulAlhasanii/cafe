<?php

namespace App\Models;

class Cart
{
    public $items;
    public $totalQuantity;
    public $totalPrice;

    public function __construct()
    {
        $this->emptyBasket();
    }

    //  $float = (float)$num;

    public function equalize($val)
    {
        return (float)$val;
    }

    public function emptyBasket()
    {
        $this->items = [];
        $this->totalPrice = $this->totalQuantity = 0;
    }

    public function addToCart($product, $id, $qtyToAdd = 1)
    {
        $qtyToAdd = $this->equalize($qtyToAdd);
        $product->price = $this->equalize($product->price);

        $newItem = [
            'qty'   => 0,
            'price' => $product->price,
            'item'  => $product
        ];

        if (!empty($this->items) && array_key_exists($id, $this->items)) {
            $newItem = $this->items[$id];
        }

        $newItem['qty'] += $qtyToAdd;
        $newItem['price'] = $newItem['qty'] * $product->price;

        /* update cart information */
        $this->items[$id] = $newItem;
        $this->totalQuantity += $qtyToAdd;
        $this->totalPrice += $qtyToAdd * $product->price;
    }

    public function removeFromCart($product, $id, $qtyToRemove = 1)
    {

        $qtyToRemove = $this->equalize($qtyToRemove);
        $product->price = $this->equalize($product->price);


        if (!empty($this->items) && array_key_exists($id, $this->items)) {
            $this->items[$id]['qty'] -= $qtyToRemove;
            $this->items[$id]['price'] = $this->items[$id]['qty'] * $product->price;

            if ($this->items[$id]['qty'] <= 0) {
                unset($this->items[$id]);
            }

            $this->totalQuantity -= $qtyToRemove;
            $this->totalPrice -= $qtyToRemove * $product->price;
        }
    }

    public function removeItem($id)
    {
        if (!empty($this->items) && array_key_exists($id, $this->items)) {
            unset($this->items[$id]);
        }
    }

    public function setProductQty($product, $id, $qtyToSet)
    {
        $qtyToSet = $this->equalize($qtyToSet);
        $product->price = $this->equalize($product->price);

        $this->addToCart($product, $id, $qtyToSet);
        $this->removeFromCart($product, $id, $this->items[$id]['qty'] - $qtyToSet);
    }

    public function getCartProducts()
    {
        $productsInfo = [];
        foreach ($this->items as $item) {
            $product = $item["item"];
            $product->qty = $item["qty"];

           /* foreach ($item as $key => $value) {
                if($key != "item") {
                    $data[$key] = $value;
                }
               // $data[$key] = $value;
            }*/

            $productsInfo[] = $product;
        }

        return $productsInfo;
    }

    public function getTotalCartAmount() {
        return $this->totalPrice;
    }

    public function getCartCount() {
        return $this->totalQuantity;
    }
}
