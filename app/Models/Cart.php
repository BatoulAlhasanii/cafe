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

        $newItem = [
            'qty'   => 0,
            'current_price' => 0.00,
            'product'  => $product
        ];

        if (!empty($this->items) && array_key_exists($id, $this->items)) {
            $newItem = $this->items[$id];
        }

        $newItem['current_price'] = $product->getCurrentPrice();

        $newItem['qty'] += $qtyToAdd;

        /* update cart information */
        $this->items[$id] = $newItem;
        $this->calculateCartTotals();
    }
/*
    public function removeFromCart($product, $id, $qtyToRemove = 1)
    {

        $qtyToRemove = $this->equalize($qtyToRemove);
        $product->price = $this->equalize($product->price);


        if (!empty($this->items) && array_key_exists($id, $this->items) && $qtyToRemove <= $this->items[$id]['qty']) {

            $this->items[$id]['qty'] -= $qtyToRemove;
            $this->items[$id]['price'] = $this->items[$id]['qty'] * $product->getCurrentPrice();

            if ($this->items[$id]['qty'] <= 0) {
                unset($this->items[$id]);
            }

            $this->totalQuantity -= $qtyToRemove;
            $this->totalPrice -= $qtyToRemove * $product->price;
        }
    }
*/
    public function removeItem($id)
    {
        if (!empty($this->items) && array_key_exists($id, $this->items)) {
            unset($this->items[$id]);
            $this->calculateCartTotals();
        }
    }

    public function setProductQty($product, $id, $qtyToSet)
    {
        $qtyToSet = $this->equalize($qtyToSet);

        if (!empty($this->items) && array_key_exists($id, $this->items)) {
            $this->items[$id]['qty'] = $qtyToSet;
            $this->calculateCartTotals();
        }
    }

    public function getCartProductById($productId)
    {
        $item = $this->items[$productId];
        $product = $item['product'];

        $product->qty = $item['qty'];
        $product->current_price = $item['current_price'];
        $product->total = $item['qty'] * $item['current_price'];

        return $product;
    }

    public function calculateCartTotals()
    {
        $this->totalPrice = 0.00;
        $this->totalQuantity = 0;

        foreach ($this->items as $item) {
            $this->totalPrice += $item["qty"] * $item["current_price"];
            $this->totalQuantity += $item["qty"];

        }
    }

    public function getCartProducts()
    {
        $productsInfo = [];
        foreach ($this->items as $item) {
            $product = $item["product"];
            $product->qty = $item["qty"];
            $product->current_price = $item["current_price"];
            $product->total = $item['qty'] * $item['current_price'];

            $productsInfo[] = $product;
        }

        return $productsInfo;
    }

    public function getTotalCartAmount() {
        return $this->totalPrice;
    }

    public function getCartTotals() {
        return [
            'sub_total' => $this->totalPrice,
            'shipping_fee' => 10,
            'total' => $this->totalPrice + 10
        ];
    }

    public function getCartCount() {
        return $this->totalQuantity;
    }
}
