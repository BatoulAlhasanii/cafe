<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\OrderContract;
use App\Http\Controllers\BaseController;
use App\Contracts\CityContract;
use App\Contracts\CountryContract;
use App\Contracts\SettingContract;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends BaseController
{
    protected $orderRepository;
    protected $countryRepository;
    protected $cityRepository;
    protected $settingRepository;

    public function __construct(OrderContract $orderRepository, CountryContract  $countryRepository, CityContract  $cityRepository, SettingContract $settingRepository)
    {
        $this->orderRepository = $orderRepository;
        $this->countryRepository = $countryRepository;
        $this->cityRepository = $cityRepository;
        $this->settingRepository = $settingRepository;
    }

    public function index(Request $request)
    {


        $country = $this->countryRepository->listCountries()[0];
        $cities = $this->cityRepository->listCitiesByCountry($country->id);

        if (!empty(request('_token'))) {

            $orders = Order::query();

            $orders = $this->orderRepository->filter($orders, $request);

            $orders = $orders->orderBy('id', 'DESC')->paginate(config('settings.items_per_page'));

        } else {
            $orders = $this->orderRepository->listOrders();
        }


        return view('admin.orders.index', compact('orders', 'cities'));
    }

    public function show($orderNumber)
    {
        $order = $this->orderRepository->findOrderByNumber($orderNumber);

        $this->setPageTitle('Order Details', $orderNumber);
        return view('admin.orders.show', compact('order'));
    }

    public function edit($id)
    {
        $order = $this->orderRepository->findOrderById($id);

        if($order) {
            $tax = $this->settingRepository->getOrderTax($order->created_at);
        }

        return view('admin.orders.edit', compact('order','tax'));
    }

    public function update(Request $request)
    {
        $this->validate($request, Order::editRules());

        $order = $this->orderRepository->updateOrder($request);

        if (!$order) {
            return $this->responseRedirectBack('Error occurred while updating order.', 'error', true, true);
        }
        return $this->responseRedirect('orders.index', 'Order updated successfully' ,'success',false, false);
    }
}
