@extends('layout.app')

@section('head-links-scripts')

@endsection


@section('content')
<div class="main-container col1-layout checkout">
    <div class="container">
        <form id="checkout-form" method="post" action="{{ route('checkout.placeOrder') }}" enctype="multipart/form-data">
            @csrf
            <div class="col1-button grid-container">
                <div class="text-wrapper">
                    <h1>Pagamento</h1>
                    <p>Confirme o endereço de entrega do seu pedido e selecione uma forma de pagamento.</p>
                </div>
                <div class="btn-wrapper">
                    <button type="button" class="btn-checkout button-top">Finalizar compra</button>
                </div>
            </div>
            @if (Session::has('message'))
                <p class="alert alert-success">{{ Session::get('message') }}</p>
            @endif

            <div class="columns-container">
                <div class="col3-left">
                    <div id="div_billing_address_form">
                        <div class="osc-title">
                            <span class="number">1</span><h2 class="title">Endereço de Cobrança</h2>
                        </div>
                        <fieldset class="form_billing_fs field_pf">
                            <div class="field_row">
                                <div class="col-unique">
                                    <label class="osc_label" for="osc_field_billing_name">Name<em class="osc_required">*</em></label>
                                    <input id="osc_field_billing_name" type="text" class="input-text osc_input billing_input billing_required required-field" name="name">
                                </div>
                                @error('name')
                                <div class="alert-msg">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </fieldset>
                        <fieldset class="form_billing_fs field_pf">
                            <div class="field_row">
                                <div class="col-unique">
                                    <label class="osc_label" for="osc_field_billing_lastname">Surname<em class="osc_required">*</em></label>
                                    <input id="osc_field_billing_lastname" type="text" class="input-text osc_input billing_input billing_required required-field" name="surname">
                                </div>
                                @error('surname')
                                <div class="alert-msg">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </fieldset>
                        <fieldset class="form_billing_fs">
                            <div class="field_row">
                                <div class="col-unique">
                                    <label class="osc_label" for="osc_field_billing_cep">Postcode<em class="osc_required">*</em></label>
                                    <input id="osc_field_billing_cep" type="text" class="input-text osc_input billing_input billing_required" name="postcode" maxlength="5">
                                    <a class="fieldpart-postcode-link osc_anchor" target="_blank" href="http://www.buscacep.correios.com.br/sistemas/buscacep/default.cfm">Não sabe o CEP?</a>
                                </div>
                                @error('postcode')
                                <div class="alert-msg">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </fieldset>
                        <fieldset class="form_billing_fs">
                            <div class="field_row">
                                <div class="col-unique">
                                    <label class="osc_label" for="osc_field_billing_address">Address<em class="osc_required">*</em></label>
                                    <input id="osc_field_billing_address" type="text" class="input-text  osc_input billing_input billing_required required-field" name="address">
                                </div>
                                @error('address')
                                <div class="alert-msg">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </fieldset>
                        <fieldset class="form_billing_fs">
                            <div class="field_row">
                                <div class="col-unique">
                                    <label class="osc_label" for="osc_field_billing_region">Country<em class="osc_required">*</em></label>
                                    <select id="osc_field_billing_region" class="billing_select billing_input billing_required required-field" name="country_id" readonly>
                                        <option value="{{ $country->id }}" selected="selected">{{ $country->countryTranslations[0]->name }}</option>
                                    </select>
                                </div>
                                @error('country_id')
                                <div class="alert-msg">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </fieldset>
                        <fieldset class="form_billing_fs">
                            <div class="field_row">
                                <div class="col-unique">
                                    <label class="osc_label" for="osc_field_billing_region">City<em class="osc_required">*</em></label>
                                    <select id="osc_field_billing_region" class="billing_select billing_input billing_required required-field" name="city_id">
                                        <option value="">Select city...</option>
                                        @foreach($cities as $city)
                                        <option value="{{ $city->id }}">{{ $city->cityTranslations[0]->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('city_id')
                                <div class="alert-msg">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </fieldset>
                        <fieldset class="form_billing_fs">
                            <div class="field_row">
                                <div class="col-unique">
                                    <label class="osc_label" for="osc_field_billing_cellphone">Phone 1<em class="osc_required">*</em></label>
                                    <input id="osc_field_billing_telephone" type="tel" class="minTel input-text osc_input billing_input billing_required required-field" name="phone1">
                                </div>
                                @error('phone1')
                                <div class="alert-msg">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </fieldset>
                        <fieldset class="form_billing_fs ">
                            <div class="field_row">
                                <div class="col-unique">
                                    <label class="osc_label" for="osc_field_billing_cellphone">Phone 2<em class="osc_required">*</em></label>
                                    <input id="osc_field_billing_cellphone" max-length="15" type="tel" class="minCel input-text osc_input billing_input billing_cellphone billing_required required-field" name="phone2">
                                </div>
                                @error('phone2')
                                <div class="alert-msg">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </fieldset>
                        <br>
                        <div class="osc-validation">
                            <span><em class="osc_required">*</em> Campo Obrigatório</span>
                        </div>
                    </div>
                </div>

                <div class="col3-middle">
                    <div class="shipping-container">
                        <div id="shipping_methods">
                            <div class="osc-title">
                                <span class="number">3</span><h2 class="title">Métodos de Envio</h2>
                            </div>
                            <div id="ship-method">
                                <div id="co-shipping-method-form">
                                    <div id="checkout-shipping-method-load">
                                        <p>Informe o CEP para ver prazo e preço</p>
                                        <ul id="shipping_error" class="error_osc_msg">
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="payment-container">
                        <div id="div_payment_method_form">
                            <div class="osc-title">
                                <span class="number">4</span><h2 class="title">Métodos de Pagamento</h2>
                            </div>
                            <div class="paymentmethod_div_header">
                                <div class="pay-method">
                                    <div id="co-payment-form">
                                        <fieldset>
                                            <dl class="sp-methods" id="checkout-payment-method-load">
                                                <dt>
                                                    <p>Informe um método de envio para selecionar um método de pagamento</p>
                                                </dt>
                                                <dt>
                                                    <label for="p_method_mp_transparente" style="color: #b9b9b9;">Cartão de Crédito </label>
                                                </dt>
                                                <dt>
                                                    <label for="p_method_pagarme_boleto" style="color: #b9b9b9;">Boleto Bancário - Pagar.me </label>
                                                </dt>
                                                <dt>
                                                    <label for="p_method_mp_boleto" style="color: #b9b9b9;">Boleto </label>
                                                </dt>
                                                <dt>
                                                    <label for="p_method_pagarme_cc" style="color: #b9b9b9;">Cartão de Crédito </label>
                                                </dt>
                                            </dl>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col3-right">
                    <div class="border">
                        <div class="review-container">
                            <div class="osc-title">
                                <span class="number">5</span><h2 class="title">Revisão do Pedido</h2>
                            </div>
                            <br>
                            <div id="checkout-review-load">
                                <div id="checkout-review-table-wrapper">
                                    <table class="data-table" id="checkout-review-table">
                                        <thead>
                                            <tr class="headers-osc">
                                                <th rowspan="1">Produto</th>
                                                <th colspan="1" class="a-center">Preço</th>
                                                <th rowspan="1" class="a-center">Qtd.</th>
                                                <th colspan="1" class="a-center">Subtotal</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <td style="" class="a-right" colspan="3">
                                                    Subtotal
                                                </td>
                                                <td style="" class="a-right">
                                                    <span class="price">R$ 49,74</span>
                                                </td>
                                            </tr>
                                                <tr>
                                                <td style="" class="a-right" colspan="3">
                                                    <strong>Valor Total</strong>
                                                </td>
                                                <td style="" class="a-right">
                                                    <strong><span class="price">R$ 49,74</span></strong>
                                                </td>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            @foreach(Session::get('cart')->getCartProducts() as $product)
                                            <tr class="bodies-osc">
                                                <td>
                                                    <div class="img-wrapper">
                                                        <img class="img-product" src="{{ asset( explode(',', $product->images)[0] )}}" width="50">
                                                        <div class="hover-img"> <img src="{{ asset( explode(',', $product->images)[0] )}}"> </div>
                                                    </div>
                                                    <h3 class="product-name">{{ $product->productTranslations[0]->name }}</h3>
                                                </td>
                                                <td class="a-right">
                                                    <span class="cart-price">
                                                        <span class="price">R$ {{ $product->price }}</span>
                                                    </span>
                                                </td>
                                                <td class="a-center">{{ $product->qty }}</td>
                                                <td class="a-right">
                                                    <span class="cart-price">
                                                            <span class="price">R$ {{ $product->price }}</span>
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
                            <a title="Voltar para o carrinho" href="https://www.cafeodebrecht.com.br/checkout/cart">Esqueceu de algum item?</a>
                        </div>
                    </div>
                    <div class="button-container">
                        <div class="img-wrapper">
                            <img src="https://www.cafeodebrecht.com.br/skin/frontend/cafe/2018/images/selos/selo-seguranca.png" alt="Site Seguro Criptogradia SSL de 256 bits" title="Site Seguro Criptogradia SSL de 256 bits" class="seloSeguro">
                        </div>
                        <div class="btn-wrapper">
                            <button type="button" class="submit-checkout-form btn-checkout">Finalizar compra</button>
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
