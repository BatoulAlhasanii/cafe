<?php

namespace App\Repositories;

use Cart;
use Session;
use App\Models\Order;
use App\Models\Product;
use App\Models\City;
use App\Models\OrderItem;
use App\Models\OrderLog;
use App\Contracts\OrderContract;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;

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

    public function findOrderByNumber($orderNumber)
    {
        try {
            $order = Order::where('order_number', $orderNumber)
            ->first();

        if ($order) {
            return $order;
        } else {
            throw new ModelNotFoundException();
        }

        } catch (ModelNotFoundException $e) {

            throw new ModelNotFoundException($e);
        }

    }

    public function updateProductsInCart() {

        if (Session::has('cart')) {
            $items = Session::get('cart')->getCartItems();

            foreach ($items as $id => $item) {
                if (!$item['is_available_item']) {
                    unset($items[$id]);
                } else {
                    $item['requested_qty'] = null;
                    $item['product']->requested_qty = null;
                    $items[$id] = $item;
                }
            }

            if ( !count($items) ) {
                Session::put('noItemsLeftInCart', true);
            }

            Session::get('cart')->setCartItems($items);
        }
    }

    public function checkItemsInCart($request) {


        if (Session::has('areItemsAvailable')) {
            $this->updateProductsInCart();
            session()->forget('areItemsAvailable');
        }

        $areItemsAvailable = true;

        $items = Session::get('cart')->getCartItems();
        $totalPrice = 0.00;
        $totalQuantity = 0;

        $productIds = array_keys($items);

        $products = Product::whereIn('id', $productIds)->lockForUpdate()->get();


        foreach ($products as $product) {

            $id = $product->id;
            $item = $items[$id];


            // Emptify new fields

            //in case cart page was refreshed
            if (array_key_exists('requested_qty', $item)) {
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
                    $areItemsAvailable = false;

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
                $areItemsAvailable = false;

                $item['is_available_item'] = false;
                $item['is_qty_available'] = false;
                $item['requested_qty'] = $item['qty'];
                $item['qty'] = 0;
            }


            $item['product'] = $product;
            //update the item in items array
            $items[$id] = $item;

            if ($item['is_available_item']) {
                $totalPrice += $item['qty'] * $item['current_price'];
                $totalQuantity += $item['qty'];
            }

        }

        session()->put('areItemsAvailable', $areItemsAvailable);

        Session::get('cart')->setCartItemsAndTotals($items, $totalPrice, $totalQuantity);

        return $products;

    }


    public function storeOrderDetails($request)
    {

        if (Session::has('cart') && count(Session::get('cart')->getCartItems()) ) {

            DB::beginTransaction();

            try {

                $products = $this->checkItemsInCart($request);


                $order = null;

                if (Session::has('areItemsAvailable') && Session::get('areItemsAvailable') && $products && count($products)) {
                    //if available -> create order
                    $order = new Order();
                    $order->fill([
                        'status' => Order::$statusPending,
                        'name' => $request->name,
                        'surname' => $request->surname,
                        'phone' => $request->phone,
                        'email' => $request->email,
                        'district' => $request->district,
                        'address' => $request->address,
                        'city_id' => $request->city_id,
                        'country_id' => $request->country_id
                    ]);

                    $sub_total = 0.00;
                    $total = 0.00;

                    if ($order) {
                        //If cart has items
                        //TODO
                        $items = Session::get('cart')->getCartItems();
                        $orderItems = [];

                        foreach ($products as $product) {

                            $id = $product->id;
                            $item = $items[$id];

                            $orderItems[] = new OrderItem([
                                'product_id' => $product->id,
                                'product_price' =>  $item['current_price'],
                                'qty' => $item['qty']
                            ]);

                            $updated = $product->update([
                                'stock' => $product->stock - $item['qty']
                            ]);

                            $sub_total += $item['qty'] * $item['current_price'];
                        }

                        $city = City::find($request->city_id);
                        $total = $sub_total + Session::get('cart')->getShippingFee();

                        $order->sub_total = $sub_total;
                        $order->shipping_fees = Session::get('cart')->getShippingFee();
                        $order->total = $total;
                    }

                    $orderCreated = $order->save();
                    if ($orderCreated) {
                        $order->orderItems()->saveMany($orderItems);

                        $firstOrderCurrentMonth = \App\Models\Order::whereYear('created_at', Carbon::now()->year)
                        ->whereMonth('created_at', Carbon::now()->month)->count();
                        $stringNumber = strval($firstOrderCurrentMonth);
                        $orderNumber = Carbon::now()->format('y-m') . '-'.str_pad($stringNumber, 4, "0", STR_PAD_LEFT);
                        $order->order_number = $orderNumber;
                        $order->save();

                        session()->forget('cart');
                        session()->forget('areItemsAvailable');

                        session()->put('order', $order);
                    }
                }

                DB::commit();
                return $order;

            } catch (\Exception $e) {
                DB::rollBack();
                throw $e;
            }
        }

    }

    public function updateOrder($request)
    {
        $order = $this->findOrderById($request->id);

        $order->status = $request->status;
        $isOrderUpdated = $order->save();

        if ($isOrderUpdated) {
            OrderLog::create([
                'order_id' => $request->id,
                'status' => $request->status,
                'user_id' => auth()->user()->id,
                'name' => auth()->user()->name
            ]);
        }

        return $order;
    }

    public function filter($orders, $request)
    {
        if (!empty(request('id'))) {
            $orders = $orders->where('id', $request->id);
        }
        if (!empty(request('order_number'))) {
            $orders = $orders->where('order_number', $request->order_number);
        }
        if (!empty(request('status')) && request('status') != -1) {
            $orders = $orders->where('status', $request->status);
        }
        if (!empty(request('name'))) {
            $orders = $orders->where('name','LIKE', '%'.$request->name.'%');
        }
        if (!empty(request('surname'))) {
            $orders = $orders->where('surname','LIKE', '%'.$request->surname.'%');
        }
        if (!empty(request('city_id')) && request('city_id') != -1) {
            $orders = $orders->where('city_id', $request->city_id);
        }
        if (!empty(request('from_date'))) {
            $orders = $orders->whereDate('created_at','>=', $request->from_date);
        }
        if (!empty(request('to_date'))) {
            $orders = $orders->whereDate('created_at','<=', $request->to_date);
        }

        return $orders;
    }

}
