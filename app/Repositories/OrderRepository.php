<?php

namespace App\Repositories;

use Cart;
use Session;
use App\Models\Order;
use App\Models\Product;
use App\Models\City;
use App\Models\OrderItem;
use App\Contracts\OrderContract;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class OrderRepository extends BaseRepository implements OrderContract
{
    public function __construct(Order $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    public function listOrders(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->model->orderBy('id', 'desc')->paginate(config('settings.items_per_page'));
    }

    public function findOrderById(int $id)
    {
        try {
            return $this->findOneOrFail($id);

        } catch (ModelNotFoundException $e) {

            throw new ModelNotFoundException($e);
        }

    }

    public function storeOrderDetails($request)
    {

        $order = new Order();
        $order->fill([
            'status' => Order::$statusPending,
            'name' => $request->name,
            'surname' => $request->surname,
            'postcode' => $request->postcode,
            'phone1' => $request->phone1,
            'phone2' => $request->phone2,
            'address' => $request->address,
            'city_id' => $request->city_id,
            'country_id' => $request->country_id
        ]);

        $sub_total = 0.00;
        $total = 0.00;

        if ($order) {
            //If cart has items
            //TODO
            $items = Session::get('cart')->getCartProducts();
            $orderItems = [];
            foreach ($items as $item)
            {
                $product = Product::find($item->id);

                $orderItems[] = new OrderItem([
                    'product_id' => $product->id,
                    'product_price' =>  $item->qty * $product->getCurrentPrice(),
                    'qty' => $item->qty
                ]);

                $sub_total += $item->qty * $product->getCurrentPrice();
            }

            $city = City::find($request->city_id);
            $total = $sub_total + $city->shipping_fees;

            $order->sub_total = $sub_total;
            $order->shipping_fees = $city->shipping_fees;
            $order->total = $total;
        }

        $orderCreated = $order->save();
        if ($orderCreated) {
            $order->orderItems()->saveMany($orderItems);
        }

        return $order;
    }

    public function updateOrder($request)
    {
        $order = $this->findOrderById($request->id);

        $order->status = $request->status;
        $order->save();

        return $order;
    }

    public function findOrderByNumber($orderNumber)
    {
        return Order::where('order_number', $orderNumber)->first();
    }
}
