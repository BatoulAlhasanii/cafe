@extends('layout.app')

@section('head-links-scripts')

@endsection


@section('content')
<div class="main-container">
    <div class="container">
        <div class="cart">
            <div class="title-buttons">
                <h1>Carrinho de compras</h1>
                <ul class="checkout-types">
                    <li>
                        <button type="button" title="Fechar Pedido" class="button btn-proceed-checkout btn-checkout" onclick="window.location='https://www.cafeodebrecht.com.br/checkout/onepage/';">Fechar Pedido</button>
                    </li>
                </ul>
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
                {{print_r($cart)}}

                <form action="https://www.cafeodebrecht.com.br/checkout/cart/updatePost/" method="post" class="the-cart-form">
                    <input name="form_key" type="hidden" value="TNgRvcDLNgl0LW6z">
                    <fieldset>
                        <div class="cart-table-wrapper">
                            <table id="shopping-cart-table" class="data-table cart-table">
                                <colgroup>
                                    <col class="col-img" width="1">
                                    <col>
                                    <col class="col-unit-price" width="1">
                                    <col width="1">
                                    <col class="col-total" width="1">
                                    <col class="col-delete" width="1">
                                </colgroup>
                                <thead>
                                    <tr class="first last">
                                        <th class="col-img" rowspan="1">&nbsp;</th>
                                        <th rowspan="1"><span class="nobr">Nome do Produto</span></th>
                                        <th rowspan="1" class="a-center">Quantidade</th>
                                        <th class="col-unit-price a-center" colspan="1"><span class="nobr">Preço Unitário</span></th>
                                        <th class="a-center" colspan="1">Subtotal</th>
                                        <th class="a-center" colspan="1">Remover</th>
                                    </tr>
                                </thead>
                                    <tfoot>
                                    <tr class="first last">
                                        <td>
                                            <button type="button" title="Continuar Comprando" class="btn-continue btn-inline button" onclick="setLocation('https://www.cafeodebrecht.com.br/capsula-odebrecht-superior.html')">Voltar para loja</button>
                                        </td>
                                        <td colspan="50" class="a-right last">
                                            <button type="button" class="btn-limpar btn-inline" title="Limpar Carrinho" onclick="setLocation('https://www.cafeodebrecht.com.br/checkout/cart/clear/')">Limpar Carrinho</button>
                                            <button type="submit" name="update_cart_action" value="update_qty" title="Atualizar Valores" class="btn-update btn-inline">Atualizar Valores</button>
                                        </td>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <tr class="first odd">
                                        <td class="a-center">
                                            <a href="https://www.cafeodebrecht.com.br/capsula-odebrecht-gourmet.html" title="Café Odebrecht Espresso em Cápsula Compatível com Nespresso" class="product-image">
                                                <img src="https://www.cafeodebrecht.com.br/media/catalog/product/cache/1/thumbnail/120x/9df78eab33525d08d6e5fb8d27136e95/c/a/capsula-gourmet.jpeg" width="120" height="120" alt="Café Odebrecht Espresso em Cápsula Compatível com Nespresso">
                                            </a>
                                        </td>
                                        <td>
                                            <h2 class="product-name">
                                                <a href="https://www.cafeodebrecht.com.br/capsula-odebrecht-gourmet.html">Café Odebrecht Espresso em Cápsula Compatível com Nespresso</a>
                                            </h2>
                                        </td>
                                        <td class="a-center qty">
                                            <div class="box-qty">
                                                <input name="cart[1437][qty]" value="1" size="4" title="Qtd." class="input-text qty" maxlength="12"><span class="arrow inc" title="Aumentar">+</span><span class="arrow dec" title="Diminuir">-</span>
                                            </div>
                                        </td>
                                        <td class="a-center unitario">
                                            <span class="cart-price"><span class="price">R$ 9,90</span</span>
                                        </td>
                                        <td class="a-center total">
                                            <span class="cart-price"><span class="price">R$ 9,90</span></span>
                                        </td>
                                        <td class="a-center remove last">
                                            <a href="https://www.cafeodebrecht.com.br/checkout/cart/delete/id/1437/form_key/TNgRvcDLNgl0LW6z/uenc/aHR0cHM6Ly93d3cuY2FmZW9kZWJyZWNodC5jb20uYnIvY2hlY2tvdXQvY2FydC8,/" title="Remover item" class="small remover remove-ajax">
                                                <i class="icon-cancel"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr class="last even">
                                        <td class="a-center">
                                            <a href="https://www.cafeodebrecht.com.br/capsula-odebrecht-superior.html" title="Café Odebrecht Superior em Cápsula Compatível com Nespresso" class="product-image">
                                                <img src="https://www.cafeodebrecht.com.br/media/catalog/product/cache/1/thumbnail/120x/9df78eab33525d08d6e5fb8d27136e95/c/a/capsula-superior.jpeg" width="120" height="120" alt="Café Odebrecht Superior em Cápsula Compatível com Nespresso">
                                            </a>
                                        </td>
                                        <td>
                                            <h2 class="product-name">
                                                <a href="https://www.cafeodebrecht.com.br/capsula-odebrecht-superior.html">Café Odebrecht Superior em Cápsula Compatível com Nespresso</a>
                                            </h2>
                                        </td>
                                        <td class="a-center qty">
                                            <div class="box-qty">
                                                <input name="cart[1438][qty]" value="1" size="4" title="Qtd." class="input-text qty" maxlength="12"><span class="arrow inc" title="Aumentar">+</span><span class="arrow dec" title="Diminuir">-</span>
                                            </div>
                                        </td>
                                        <td class="a-center unitario">
                                            <span class="cart-price"><span class="price">R$ 9,90</span></span>
                                        </td>
                                        <td class="a-center total">
                                            <span class="cart-price"><span class="price">R$ 9,90</span></span>
                                        </td>
                                        <td class="a-center remove last">
                                            <a href="https://www.cafeodebrecht.com.br/checkout/cart/delete/id/1438/form_key/TNgRvcDLNgl0LW6z/uenc/aHR0cHM6Ly93d3cuY2FmZW9kZWJyZWNodC5jb20uYnIvY2hlY2tvdXQvY2FydC8,/" title="Remover item" class="small remover remove-ajax">
                                                <i class="icon-cancel"></i>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </fieldset>
                </form>
                <div class="cart-collaterals">
                <div class="grid12-4 no-gutter total-wrap-cart">
                    <div class="totals">
                        <table id="shopping-cart-totals-table">
                            <colgroup>
                                <col>
                                <col width="1">
                            </colgroup>
                            <tfoot>
                                <tr>
                                    <td style="" class="a-right" colspan="1">
                                        <strong>Valor Total</strong>
                                    </td>
                                    <td style="" class="a-right">
                                        <strong><span class="price">R$ 19,80</span></strong>
                                    </td>
                                </tr>
                            </tfoot>
                            <tbody>
                                <tr>
                                    <td style="" class="a-right" colspan="1">
                                        Subtotal    </td>
                                    <td style="" class="a-right">
                                        <span class="price">R$ 19,80</span>    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <ul class="checkout-types bottom">
                        <li><button type="button" title="Fechar Pedido" class="button btn-proceed-checkout btn-checkout" onclick="window.location='https://www.cafeodebrecht.com.br/checkout/onepage/';">Fechar Pedido</button></li>
                    </ul>
                </div>
                <div class="grid-full no-gutter"></div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('javascript-scripts')

@endsection
