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
cart-page-wrapper
@endsection

@section('content')
@if(Session::has('cart') && count(Session::get('cart')->getCartProducts()) > 0)
<div class="main-container cart-page">
    <div class="container">
        <div class="cart">
            <div class="title-buttons">
                <h1>Shopping Cart</h1>
                <div class="checkout-types">
                        <a title="Proceed To Checkout" class="button btn-proceed-checkout btn-checkout" href="{{ route('checkout.index') }}">Proceed To Checkout</a>
                </div>
            </div>
            <ul class="messages">
            </ul>
            <form method="post" enctype="multipart/form-data">
                @csrf
                <div class="cart-table-wrapper">
                    <table id="shopping-cart-table" class="data-table cart-table">
                        <thead>
                            <tr class="first last">
                                <th class="col-img">&nbsp;</th>
                                <th>Product Name</th>
                                <th class="a-center">Quantity</th>
                                <th class="col-unit-price a-center">Subtotal</th>
                                <th class="a-center">Total</th>
                                <th class="a-center">Remove</th>
                            </tr>
                        </thead>
                            <tfoot>
                            <tr class="first last">
                                <td>
                                    <a href="{{ route('home') }}" class="btn-with-row btn-inline">Back to store</a>
                                </td>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach(Session::get('cart')->getCartProducts() as $product)

                            <tr id="product-row-{{ $product->id }}" class="{{ !$product->is_available_item ? 'error-table-row': ''}}">
                                <td class="a-center">
                                    <a href="{{ route('product.show', ['slug' => $product->slug ]) }}" title="Café Odebrecht Espresso em Cápsula Compatível com Nespresso" class="product-image">
                                        <img src="{{ asset( '/storage/' . explode(',', $product->images)[0] )}}" width="120" height="120" alt="Café Odebrecht Espresso em Cápsula Compatível com Nespresso">
                                    </a>
                                </td>
                                <td>
                                    <h2 class="product-name">
                                        <a href="{{ route('product.show', ['slug' => $product->slug ]) }}">{{ $product->productTranslations->where('lang', app()->getLocale())->first()->name }}</a>
                                    </h2>
                                </td>
                                <td class="a-center qty">
                                    <div>
                                        <div class="box-qty">
                                            <input type="number" name="qty" id="product-qty-field-{{ $product->id }}" value="{{ $product->qty }}" min="{{ $product->stock > 0 ? 1 : 0 }}" max="{{ $product->stock }}" class="product-qty-field input-text qty"><span id="product-inc-qty-{{ $product->id }}" class="arrow inc" title="Aumentar">+</span><span id="product-dec-qty-{{ $product->id }}" class="arrow dec" title="Diminuir">-</span>
                                        </div>
                                        <div id="warning-msg-{{ $product->id }}" class="warning-msg">{{ $product->stock }} items left!</div>
                                        @if (!$product->is_available_item)
                                            <div class="error-product-message">This product is not available anymore.</div>
                                        @elseif ($product->is_available_item && !$product->is_qty_available)
                                            <div class="error-product-message">{{ $product->qty }} items left! The requested quantity is not available anymore.</div>
                                        @endif

                                    </div>
                                </td>
                                <td class="a-center">
                                    <span class="cart-price"><span id="current-price-{{ $product->id }}" class="price">{{ $product->current_price }} {{ config('currency.' . app()->getLocale()) }}</span</span>
                                </td>
                                <td class="a-center total">
                                    <span class="cart-price"><span id="total-price-{{ $product->id }}" class="price">{{ $product->current_price * $product->qty }} {{ config('currency.' . app()->getLocale()) }}</span></span>
                                </td>
                                <td class="a-center remove last">
                                    <a data-product-id="{{ $product->id }}" class="remove-item-btn small remover remove-ajax">
                                        <i class="icon-cancel"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div id="load-overlay">
                        <div class="wrapper-spinner">
                            <div class="loader"></div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="cart-collaterals">
                <div class="total-wrap-cart">
                    <div class="totals">
                        <table id="shopping-cart-totals-table">
                            <tfoot>
                                <tr>
                                    <td class="a-right">
                                        <strong>Total</strong>
                                    </td>
                                    <td class="a-right">
                                        <strong><span id="cart-total" class="price">{{ Session::get('cart')->getCartTotals()['total'] }} {{ config('currency.' . app()->getLocale()) }}</span></strong>
                                    </td>
                                </tr>
                            </tfoot>
                            <tbody>
                                <tr>
                                    <td class="a-right">
                                        Subtotal    </td>
                                    <td class="a-right">
                                        <span id="cart-sub-total" class="price">{{ Session::get('cart')->getCartTotals()['sub_total'] }} {{ config('currency.' . app()->getLocale()) }}</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="checkout-types bottom">
                        <a title="Proceed To Checkout" class="button btn-proceed-checkout btn-checkout" href="{{ route('checkout.index') }}">Proceed To Checkout</a>
                    </div>
                </div>
                <div class="grid-full no-gutter"></div>
            </div>
        </div>

    </div>
</div>
@else
<div class="main-container empty-cart-page">
    <div class="empty-cart container">
        <div class="page-title">
            <h1>Empty cart</h1>
        </div>
        <div class="empty-cart-message flex-column">
            <h1 class="icon-emo-unhappy">What a pity!</h1>
            <p>There are no items in your cart.</p>
            <a href="{{ route('home') }}" class="btn-continue btn-inline btn-with-row">Back to store</a>
        </div>
    </div>
</div>
@endif
@endsection


@section('javascript-scripts')
<script>


</script>
@endsection
