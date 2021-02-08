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
                <li class="success-msg">
                    <ul>
                        <li>
                            <span></span>
                        </li>
                    </ul>
                </li>
            </ul>
                <!--
                @foreach ($productsInfo as $index => $product)
                <h1> product #{{$index+1}} </h1>
                <p> {{$product->id}}  </p>
                <p> {{$product->price}}  </p>
                <p>  {{$product->qty}} </p>

                @endforeach

                <h2> number of products </h2>
                {{Session::get('cart')->getCartCount()}}
                <h2> total cart amount </h2>
                {{Session::get('cart')->getTotalCartAmount()}}
                -->
                <form action="https://www.cafeodebrecht.com.br/checkout/cart/updatePost/" method="post" class="the-cart-form">
                    <input name="form_key" type="hidden" value="TNgRvcDLNgl0LW6z">
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
                                <tr>
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
                                        <div class="box-qty">
                                            <input name="cart[1437][qty]" value="{{ $product->qty }}" size="4" title="Qtd." class="input-text qty" maxlength="12"><span class="arrow inc" title="Aumentar">+</span><span class="arrow dec" title="Diminuir">-</span>
                                        </div>
                                    </td>
                                    <td class="a-center unitario">
                                        <span class="cart-price"><span class="price">R$ {{ $product->price }}</span</span>
                                    </td>
                                    <td class="a-center total">
                                        <span class="cart-price"><span class="price">R$ {{ $product->discount_price }}</span></span>
                                    </td>
                                    <td class="a-center remove last">
                                        <a href="https://www.cafeodebrecht.com.br/checkout/cart/delete/id/1437/form_key/TNgRvcDLNgl0LW6z/uenc/aHR0cHM6Ly93d3cuY2FmZW9kZWJyZWNodC5jb20uYnIvY2hlY2tvdXQvY2FydC8,/" title="Remover item" class="small remover remove-ajax">
                                            <i class="icon-cancel"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
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
                                        <strong><span class="price">R$ {{ Session::get('cart')->getTotalCartAmount() }}</span></strong>
                                    </td>
                                </tr>
                            </tfoot>
                            <tbody>
                                <tr>
                                    <td class="a-right">
                                        Subtotal    </td>
                                    <td class="a-right">
                                        <span class="price">R$ {{ Session::get('cart')->getTotalCartAmount() }}</span></td>
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

@endsection
