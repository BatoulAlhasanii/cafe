<?php

namespace App\Contracts;

interface OrderContract
{
    public function listOrders(string $order = 'id', string $sort = 'desc', array $columns = ['*']);

    public function findOrderById(int $id);

    public function findOrderByNumber($orderNumber);

    public function updateProductsInCart();

    public function checkItemsInCart($request);

    public function storeOrderDetails($request);

    public function updateOrder($request);

    public function filter($orders, $request);
}
