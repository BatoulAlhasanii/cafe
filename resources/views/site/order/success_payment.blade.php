@extends('layout.app')

@section('head-links-scripts')
@endsection

@section('header')
  @include('layout.simple-header')
@endsection

@section('footer')
  @include('layout.simple-footer')
@endsection

@section('page-wrapper')
success-payment-page-wrapper
@endsection

@section('content')
<div class="main-container successful-payment-page">
    <div class="empty-cart container">
        <div class="empty-cart-message flex-column">
            <h1 class="icon-emo-happy">Successful Payment</h1>
            <p>Thanks for shopping with us</p>
            <div class="view-wrapper">
                <div class="field-wrapper col-12">
                    <div class="field-value">Order Number: {{ $order->order_number . $order->id }}</div>
                </div>
                <div class="field-wrapper col-12">
                    <div class="field-value">{{ $order->name }} {{ $order->surname }}</div>
                </div>
                <div class="field-wrapper col-12">
                    <div class="field-value">{{ $order->phone }}</div>
                </div>
                <div class="field-wrapper col-12">
                    <div class="field-value">{{ $order->email }}</div>
                </div>
                <div class="field-wrapper col-12">
                    <div class="field-value"></div>
                </div>
                <div class="field-wrapper col-12">
                    <div class="field-label">District</div>
                    <div class="field-value">{{ $order->city->cityTranslations->where('lang', 'en')->first()->name }} {{ $order->district ? ', ' .$order->district : '' }}</div>
                </div>
                <div class="field-wrapper col-12">
                    <div class="field-label">Adderess</div>
                    <div class="field-value">{{ $order->address }}</div>
                </div>
                <div class="col-12 table-wrapper">
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
            </div>

        </div>
    </div>
</div>
@endsection
