<?php

namespace App\Contracts;

interface OrderContract
{
    public function storeOrderDetails($request);

    public function listOrders(string $order = 'id', string $sort = 'desc', array $columns = ['*']);

    public function findOrderByNumber($orderNumber);
}
