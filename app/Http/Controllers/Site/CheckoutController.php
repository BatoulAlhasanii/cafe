<?php

namespace App\Http\Controllers\Site;

use Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Contracts\OrderContract;
use App\Contracts\CountryContract;
use App\Contracts\CityContract;
use App\Contracts\CartContract;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;


class CheckoutController extends Controller
{
    protected $orderRepository;
    protected $countryRepository;
    protected $cityRepository;
    protected $cartRepository;

    public function __construct(OrderContract $orderRepository, CountryContract  $countryRepository, CityContract  $cityRepository, CartContract $cartRepository)
    {
        $this->orderRepository = $orderRepository;
        $this->countryRepository = $countryRepository;
        $this->cityRepository = $cityRepository;
        $this->cartRepository = $cartRepository;
    }

    public function index()
    {
        $previousRoute = app('router')->getRoutes()->match(app('request')->create(url()->previous()))->getName();

        if ($previousRoute !== 'checkout.placeOrder' && $previousRoute !== 'cart.show' && $previousRoute !== 'checkout.index') {
            return redirect()->route('cart.show');
        }

        if (!Session::has('areItemsAvailable')) {
            $this->cartRepository->updateProductsInCart();
        }

        $country = $this->countryRepository->listCountries()[0];
        $cities = $this->cityRepository->listCitiesByCountry($country->id);

        return view('site.order.checkout', compact(['country', 'cities']));
    }

    public function placeOrder(Request $request)
    {

        $this->validate($request, Order::rules());

        $order = $this->orderRepository->storeOrderDetails($request);

        // You can add more control here to handle if the order is not stored properly
        if ($order) {
            //$this->payPal->processPayment($order);
            //Do Payment
            //flush cart
            return redirect()->back()->with('message','Order was placed');
        } else {
            return redirect()->back()->withInput();
        }

        return redirect()->back()->with('message','Order not placed');
    }

    public function complete(Request $request)
    {
        $paymentId = $request->input('paymentId');
        $payerId = $request->input('PayerID');

        $status = $this->payPal->completePayment($paymentId, $payerId);

        $order = Order::where('order_number', $status['invoiceId'])->first();
        $order->status = 'processing';
        $order->payment_status = 1;
        $order->payment_method = 'PayPal -'.$status['salesId'];
        $order->save();

        Cart::clear();
        return view('site.pages.success', compact('order'));
    }
}
