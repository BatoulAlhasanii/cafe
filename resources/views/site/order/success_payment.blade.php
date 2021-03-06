@extends('layout.app')

@section('head-links-scripts')
@endsection

@section('title')
@lang("Successful Payment")
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
    <div class="container">
        <div>
            <h1 class="icon-emo-happy">@lang("Successful Payment")</h1>
            <p>@lang("Thanks for Shopping with Us")</p>
            <div class="view-wrapper">
                <div class="order-info">
                    <div>@lang("Order Number"): {{ $order->order_number }}</div>
                    <div>{{ $order->name }} {{ $order->surname }}</div>
                    <div>{{ $order->phone }}</div>
                    <div>{{ $order->email }}</div>
                    <div>{{ $order->city->cityTranslations->where('lang', app()->getLocale())->first()->name }} {{ $order->district ? ', ' .$order->district : '' }}</div>
                    <div>{{ $order->address }}</div>
                </div>
                <div class="col-12 table-wrapper">
                    <table class="data-table">
                        <thead>
                            <tr class="first last">
                                <th class="col-img">@lang("Image")</th>
                                <th>@lang("Product Name")</th>
                                <th>@lang("Quantity")</th>
                                <th>@lang("Price")</th>
                                <th>@lang("Total")</th>
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
                                    {{ $orderItem->product_price }} {{ config('currency.' . app()->getLocale()) }}
                                </td>
                                <td class="a-center">
                                    {{ $orderItem->product_price * $orderItem->qty }} {{ config('currency.' . app()->getLocale()) }}
                                </td>
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="4" class="a-center">
                                    <strong>@lang("Subtotal")</strong>
                                </td>
                                <td class="a-center">
                                    {{ $order->sub_total }} {{ config('currency.' . app()->getLocale()) }}
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4" class="a-center">
                                    <strong>@lang("Shipping Fee")</strong>
                                </td>
                                <td class="a-center">
                                    {{ $order->shipping_fees }} {{ config('currency.' . app()->getLocale()) }}
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4" class="a-center">
                                    <strong>@lang("Total")</strong>
                                </td>
                                <td class="a-center">
                                    {{ $order->total }} {{ config('currency.' . app()->getLocale()) }}
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
