@extends('layout.app')

@section('head-links-scripts')

@endsection


@section('content')
<div class="main-container cart-page">
    <div class="container">
        <div class="cart">
            <div class="title-buttons">
                <h1>Carrinho de compras</h1>
                <div class="checkout-types">
                        <a title="Fechar Pedido" class="button btn-proceed-checkout btn-checkout" href="{{ route('checkout.index') }}">Fechar Pedido</a>
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
                                <th>Nome do Produto</th>
                                <th class="a-center">Quantidade</th>
                                <th class="col-unit-price a-center">Preço Unitário</th>
                                <th class="a-center">Subtotal</th>
                                <th class="a-center">Remover</th>
                            </tr>
                        </thead>
                            <tfoot>
                            <tr class="first last">
                                <td>
                                    <button type="button" title="Continuar Comprando" class="btn-continue btn-inline button" onclick="setLocation('https://www.cafeodebrecht.com.br/capsula-odebrecht-superior.html')">Voltar para loja</button>
                                </td>
                                <td colspan="5" class="a-right last">
                                    <button type="button" class="btn-limpar btn-inline" title="Limpar Carrinho" onclick="setLocation('https://www.cafeodebrecht.com.br/checkout/cart/clear/')">Limpar Carrinho</button>
                                    <button type="submit" name="update_cart_action" value="update_qty" title="Atualizar Valores" class="btn-update btn-inline">Atualizar Valores</button>
                                </td>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach(Session::get('cart')->getCartProducts() as $product)
                            <tr id="product-row-{{ $product->id }}">
                                <td class="a-center">
                                    <a href="{{ route('product.show', ['slug' => $product->slug ]) }}" title="Café Odebrecht Espresso em Cápsula Compatível com Nespresso" class="product-image">
                                        <img src="{{ asset( explode(',', $product->images)[0] )}}" width="120" height="120" alt="Café Odebrecht Espresso em Cápsula Compatível com Nespresso">
                                    </a>
                                </td>
                                <td>
                                    <h2 class="product-name">
                                        <a href="{{ route('product.show', ['slug' => $product->slug ]) }}">{{ $product->productTranslations[0]->name }}</a>
                                    </h2>
                                </td>
                                <td class="a-center qty">
                                    <div>
                                        <div class="box-qty">
                                            <input type="number" name="qty" id="product-qty-field-{{ $product->id }}" value="{{ $product->qty }}" min="{{ $product->stock > 0 ? 1 : 0 }}" max="{{ $product->stock }}" class="product-qty-field input-text qty"><span id="product-inc-qty-{{ $product->id }}" class="arrow inc" title="Aumentar">+</span><span id="product-dec-qty-{{ $product->id }}" class="arrow dec" title="Diminuir">-</span>
                                        </div>
                                        <div id="warning-msg-{{ $product->id }}" class="warning-msg">Only {{ $product->stock }} items left!</div>
                                    </div>
                                </td>
                                <td class="a-center">
                                    <span class="cart-price"><span id="current-price-{{ $product->id }}" class="price">{{ $product->getCurrentPrice() }} {{ config('currency.' . app()->getLocale()) }}</span</span>
                                </td>
                                <td class="a-center total">
                                    <span class="cart-price"><span id="total-price-{{ $product->id }}" class="price">{{ $product->getCurrentPrice() * $product->qty }} {{ config('currency.' . app()->getLocale()) }}</span></span>
                                </td>
                                <td class="a-center remove last">
                                    <a data-product-id="{{ $product->id }}" title="Remover item" class="remove-item-btn small remover remove-ajax">
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
                                        <strong>Valor Total</strong>
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
                        <a title="Fechar Pedido" class="button btn-proceed-checkout btn-checkout" href="{{ route('checkout.index') }}">Fechar Pedido</a>
                    </div>
                </div>
                <div class="grid-full no-gutter"></div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('javascript-scripts')
<script>


</script>
@endsection
