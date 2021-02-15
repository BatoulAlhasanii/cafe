<?php

namespace App\Contracts;

/**
 * Interface CartContract
 * @package App\Contracts
 */
interface CartContract
{
    public function getCart($request);

    public function updateCart();

    public function updateProductsInCart();
}
