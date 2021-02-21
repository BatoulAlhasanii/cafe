@extends('admin-layout.app')

@section('head-links-scripts')
@endsection


@section('content')
    <div class="page-content form-container form-page">
        <div class="page-title">
            <h1>View Order</h1>
        </div>
        <div class="main-content">
            <div class="view-wrapper">
                <div class="field-wrapper col-6">
                    <div class="field-label">Order Number</div>
                    <div class="field-value">{{ $order->order_number . $order->id }}</div>
                </div>
                <div class="field-wrapper col-6">
                    <div class="field-label">Order Status</div>
                    <div class="field-value">{{ \App\Models\Order::$orderStatus[$order->status]['name'] }}</div>
                </div>
                <div class="field-wrapper col-6">
                    <div class="field-label">Full Name</div>
                    <div class="field-value">{{ $order->name }} {{ $order->surname }}</div>
                </div>
                <div class="field-wrapper col-6">
                    <div class="field-label">Phone</div>
                    <div class="field-value">{{ $order->phone }}</div>
                </div>
                <div class="field-wrapper col-6">
                    <div class="field-label">Email</div>
                    <div class="field-value">{{ $order->email }}</div>
                </div>
                <div class="field-wrapper col-6">
                    <div class="field-label">City</div>
                    <div class="field-value">{{ $order->city->cityTranslations->where('lang', 'en')->first()->name }}</div>
                </div>
                <div class="field-wrapper col-6">
                    <div class="field-label">District</div>
                    <div class="field-value">{{ $order->district }}</div>
                </div>
                <div class="field-wrapper col-12">
                    <div class="field-label">Adderess</div>
                    <div class="field-value">{{ $order->address }}</div>
                </div>
                <div class="col-12 table-wrapper">
                    <h3>Order Items</h3>
                    <table class="data-table">
                        <thead>
                            <tr class="first last">
                                <th class="col-img">Image</th>
                                <th>Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order->orderItems as $orderItem)
                            <?php
                                $product = $orderItem->product;
                                $translation = $product->productTranslations->where('lang','en')->first();
                            ?>
                            <tr>
                                <td class="a-center img-content">
                                    @if($product->images)
                                        <img src="{{ asset('/storage/' . explode(',', $product->images)[0]) }}">
                                    @endif
                                </td>
                                <td>
                                    {{ $translation->name }}
                                </td>
                                <td class="a-center">
                                    {{ $orderItem->qty }}
                                </td>
                                <td class="a-center">
                                    {{ $orderItem->product_price }} {{ config('currency.en') }}
                                </td>
                                <td class="a-center">
                                    {{ $orderItem->product_price * $orderItem->qty }} {{ config('currency.en') }}
                                </td>
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="4" class="a-center">
                                    <strong>Subtotal without tax</strong>
                                </td>
                                <td class="a-center">
                                    {{ $order->sub_total - ($order->sub_total * ($tax/100)) }} {{ config('currency.en') }}
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4" class="a-center">
                                    <strong>Tax ({{ $tax  }} %)</strong>
                                </td>
                                <td class="a-center">
                                    {{  $order->sub_total * ($tax/100) }} {{ config('currency.en') }}
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4" class="a-center">
                                    <strong>Subtotal</strong>
                                </td>
                                <td class="a-center">
                                    {{ $order->sub_total }} {{ config('currency.en') }}
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4" class="a-center">
                                    <strong>Shipping fee</strong>
                                </td>
                                <td class="a-center">
                                    {{ $order->shipping_fees }} {{ config('currency.en') }}
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4" class="a-center">
                                    <strong>Total</strong>
                                </td>
                                <td class="a-center">
                                    {{ $order->total }} {{ config('currency.en') }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-12 table-wrapper">
                    <h3>Order Log</h3>
                    <table class="data-table">
                        <thead>
                            <tr class="first last">
                                <th>Status</th>
                                <th>User</th>
                                <th>Date Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="a-center">
                                    Created
                                </td>
                                <td class="a-center">
                                    Customer
                                </td>
                                <td class="a-center">
                                    {{ $order->created_at }}
                                </td>
                            </tr>
                            @foreach($order->orderLogs as $orderLog)
                            <tr>
                                <td class="a-center">
                                    @if (\App\Models\Order::$statusWaitingForDelivery === $orderLog->status)
                                        <span class="badge-alert">{{ \App\Models\Order::$orderStatus[$orderLog->status]['name'] }}</span>
                                    @elseif(\App\Models\Order::$statusDelivered === $orderLog->status)
                                        <span class="badge-success">{{ \App\Models\Order::$orderStatus[$orderLog->status]['name'] }}</span>
                                    @else
                                        <span class="badge-warning">{{ \App\Models\Order::$orderStatus[$orderLog->status]['name'] }}</span>
                                    @endif
                                </td>
                                <td class="a-center">
                                    {{ $orderLog->name }}
                                </td>
                                <td class="a-center">
                                    {{ $orderLog->created_at }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

