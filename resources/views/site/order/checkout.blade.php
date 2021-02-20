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
checkout-page-wrapper
@endsection

@section('content')
<div class="main-container col1-layout checkout">
    <div class="container">
        <form id="checkout-form" method="post" action="{{ route('checkout.placeOrder') }}" enctype="multipart/form-data">
            @csrf
            <div class="col1-button grid-container">
                <div class="text-wrapper">
                    <h1>Payment</h1>
                    <p>Confirm the delivery address for your order and select a form of payment.</p>
                </div>
                <div class="btn-wrapper">
                    <button type="button" class="btn-checkout button-top">Proceed to Payment</button>
                </div>
            </div>
            @if (Session::has('message'))
                <p class="alert alert-success">{{ Session::get('message') }}</p>
            @endif

            <div class="columns-container">
                <div class="col3-left">
                    <div id="div_billing_address_form">
                        <div class="osc-title">
                            <span class="number">1</span><h2 class="title">Billing Address</h2>
                        </div>
                        <div class="inputs-wrapper">
                            <div class="form_billing_fs field_pf">
                                <div class="field_row">
                                    <div class="col-unique">
                                        <label class="osc_label" for="name">Name<em class="osc_required">*</em></label>
                                        <input id="name" name="name" value="{{ old('name') }}" type="text" class="input-text osc_input required-field">
                                    </div>
                                    @error('name')
                                    <div class="alert-msg">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form_billing_fs field_pf">
                                <div class="field_row">
                                    <div class="col-unique">
                                        <label class="osc_label" for="surname">Surname<em class="osc_required">*</em></label>
                                        <input id="surname" name="surname" value="{{ old('surname') }}" type="text" class="input-text osc_input required-field">
                                    </div>
                                    @error('surname')
                                    <div class="alert-msg">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form_billing_fs">
                                <div class="field_row">
                                    <div class="col-unique">
                                        <label class="osc_label" for="phone">Phone<em class="osc_required">*</em></label>
                                        <input id="phone" name="phone" value="{{ old('phone') }}" type="tel" class="minTel input-text osc_input required-field">
                                    </div>
                                    @error('phone')
                                    <div class="alert-msg">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form_billing_fs">
                                <div class="field_row">
                                    <div class="col-unique">
                                        <label class="osc_label" for="email">Email<em class="osc_required">*</em></label>
                                        <input id="email" name="email" value="{{ old('email') }}" type="email" class="minTel input-text osc_input required-field">
                                    </div>
                                    @error('email')
                                    <div class="alert-msg">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form_billing_fs">
                                <div class="field_row">
                                    <div class="col-unique">
                                        <label class="osc_label" for="country_id">Country<em class="osc_required">*</em></label>
                                        <select id="country_id" class="billing_select required-field" name="country_id" readonly>
                                            <option value="{{ $country->id }}" selected="selected">{{ $country->countryTranslations[0]->name }}</option>
                                        </select>
                                    </div>
                                    @error('country_id')
                                    <div class="alert-msg">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form_billing_fs">
                                <div class="field_row">
                                    <div class="col-unique">
                                        <label class="osc_label" for="city_id">City<em class="osc_required">*</em></label>
                                        <select id="city_id" class="billing_select required-field" name="city_id">
                                            <option value="">Select city...</option>
                                            @foreach($cities as $city)
                                                @if ( intval(old('city_id')) === intval($city->id) )
                                                <option value="{{ $city->id }}" selected>{{ $city->cityTranslations[0]->name }}</option>
                                                @else
                                                <option value="{{ $city->id }}">{{ $city->cityTranslations[0]->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('city_id')
                                    <div class="alert-msg">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form_billing_fs">
                                <div class="field_row">
                                    <div class="col-unique">
                                        <label class="osc_label" for="district">District</label>
                                        <input id="district" name="district" value="{{ old('district') }}" type="text" class="input-text  osc_input">
                                    </div>
                                    @error('district')
                                    <div class="alert-msg">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form_billing_fs">
                                <div class="field_row">
                                    <div class="col-unique">
                                        <label class="osc_label" for="address">Address<em class="osc_required">*</em></label>
                                        <textarea id="address" name="address" class="input-text  osc_input required-field" rows="4">{{ old('address') }}</textarea>
                                    </div>
                                    @error('address')
                                    <div class="alert-msg">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="osc-validation">
                                <span><em class="osc_required">*</em> Required field</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col3-right">
                    <div class="border">
                        <div class="review-container">
                            <div class="osc-title">
                                <span class="number">2</span><h2 class="title">Order Review</h2>
                            </div>
                            <br>
                            <div id="checkout-review-load">
                                <div id="checkout-review-table-wrapper">
                                    <table class="data-table" id="checkout-review-table">
                                        <thead>
                                            <tr class="headers-osc">
                                                <th rowspan="1">Product</th>
                                                <th colspan="1" class="a-center">Price</th>
                                                <th rowspan="1" class="a-center">Quantity</th>
                                                <th colspan="1" class="a-center">Subtotal</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <td style="" class="a-right" colspan="3">
                                                    Subtotal
                                                </td>
                                                <td style="" class="a-right">
                                                    <span class="price">{{ Session::get('cart')->getCartTotals()['sub_total'] }} {{ config('currency.' . app()->getLocale()) }}</span>
                                                </td>
                                            </tr>
                                                <tr>
                                                <td style="" class="a-right" colspan="3">
                                                    <strong>Total</strong>
                                                </td>
                                                <td style="" class="a-right">
                                                    <strong><span class="price">{{ Session::get('cart')->getCartTotals()['total'] }} {{ config('currency.' . app()->getLocale()) }}</span></strong>
                                                </td>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php
                                                $areItemsNotAvailable = Session::has('areItemsAvailable') && (Session::get('areItemsAvailable') === false);

                                            ?>
                                            @foreach(Session::get('cart')->getCartProducts() as $product)
                                            <tr class="bodies-osc {{ $areItemsNotAvailable  && !$product->is_available_item ? 'error-table-row': ''}}">
                                                <td>
                                                    <div class="img-wrapper">
                                                        <img class="img-product" src="{{ asset( '/storage/' . explode(',', $product->images)[0] )}}" width="50">
                                                        <div class="hover-img"> <img src="{{ asset( '/storage/' . explode(',', $product->images)[0] )}}"> </div>
                                                    </div>
                                                    <h3 class="product-name">{{ $product->productTranslations->where('lang', app()->getLocale())->first()->name }}</h3>
                                                </td>
                                                <td class="a-right">
                                                    <span class="cart-price">
                                                        <span class="price">{{ $product->current_price }} {{ config('currency.' . app()->getLocale()) }}</span>
                                                    </span>
                                                </td>
                                                <td class="a-center">
                                                    {{ $product->qty }}

                                                    @if ($areItemsNotAvailable  && !$product->is_available_item)
                                                        <div class="error-product-message">This product is not available anymore.</div>
                                                    @elseif ($areItemsNotAvailable  && $product->is_available_item && !$product->is_qty_available)
                                                        <div class="error-product-message">{{ $product->qty }} items left! The requested quantity is not available anymore.</div>
                                                    @endif
                                                </td>
                                                <td class="a-right">
                                                    <span class="cart-price">
                                                            <span class="price">{{ $product->qty * $product->current_price }} {{ config('currency.' . app()->getLocale()) }}</span>
                                                    </span>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="alert-container">
                            <div class="alert">Alerta</div>
                        </div>
                        <div class="back-to-cart">
                            <a title="Voltar para o carrinho" href="">Forgot an item?</a>
                        </div>
                    </div>
                    <div class="button-container">
                        <div class="btn-wrapper">
                            <button type="button" class="submit-checkout-form btn-checkout">Proceed to Payment</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection


@section('javascript-scripts')
<script>
    $(document).ready(function() {
        $('.submit-checkout-form').click(function () {
            var isValid = true;
            $('.submit-checkout-form').attr('disabled', true);
            $('.required-field').each(function() {
                if (!$(this).val()) {
                    isValid = false;
                    $(this).addClass('error');
                } else if ($(this).hasClass('error')) {
                    $(this).removeClass('error');
                }
            });

            if (isValid) {
                $('#checkout-form').submit();
            } else {
                $('.submit-checkout-form').attr('disabled', false);
            }
        });
    });
</script>
@endsection
