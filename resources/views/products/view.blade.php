@extends('layout.app')

@section('head-links-scripts')

<!-- CSS STYLE-->
<link rel="stylesheet" type="text/css" href="{{ asset('/Feature-rich-Product-Gallery-With-Image-Zoom-xZoom/dist/xzoom.css') }}" media="all" />


@endsection

@section('content')
<div class="main-container">
    <div class="container">
        <!-- Breadcrumb -->
        <div class="breadcrumbs">
            <ul itemscope="" itemtype="http://schema.org/BreadcrumbList">
                <li class="home" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                    <a href="https://www.cafeodebrecht.com.br/" itemprop="item" title="Ir para Página Inicial">
                    <span itemprop="name">Home</span></a>
                    <span class="separator">|</span><meta itemprop="position" content="1">
                </li>
                <li class="product" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                    <a class="current" href="https://www.cafeodebrecht.com.br/cafe-odebrecht-superior.html" title="" itemprop="item">
                        <h1 itemprop="name" class="current">Café Odebrecht Superior</h1>
                    </a>
                    <meta itemprop="position" content="2">
                </li>
            </ul>
        </div>
        <section class="product-img-details">
            <div class="product-image-gallery">
                <div class="large-5 column">
                    <div class="xzoom-container">
                        <div class="xzoom-img-container">
                            <img class="xzoom4" id="xzoom-fancy" src="https://www.cafeodebrecht.com.br/media/catalog/product/cache/1/image/800x/9df78eab33525d08d6e5fb8d27136e95/7/8/7896295001012_11_1_1200_72_rgb.png" xoriginal="https://www.cafeodebrecht.com.br/media/catalog/product/cache/1/image/800x/9df78eab33525d08d6e5fb8d27136e95/7/8/7896295001012_11_1_1200_72_rgb.png" />
                        </div>
                        <div class="xzoom-thumbs">
                            <a href="https://www.cafeodebrecht.com.br/media/catalog/product/cache/1/image/800x/9df78eab33525d08d6e5fb8d27136e95/7/8/7896295001012_11_1_1200_72_rgb.png"><img class="xzoom-gallery4" width="80" src="https://www.cafeodebrecht.com.br/media/catalog/product/cache/1/image/800x/9df78eab33525d08d6e5fb8d27136e95/7/8/7896295001012_11_1_1200_72_rgb.png"  xpreview="https://www.cafeodebrecht.com.br/media/catalog/product/cache/1/image/800x/9df78eab33525d08d6e5fb8d27136e95/7/8/7896295001012_11_1_1200_72_rgb.png" title="The description goes here"></a>
                            <a href="https://www.cafeodebrecht.com.br/media/catalog/product/cache/1/image/800x/9df78eab33525d08d6e5fb8d27136e95/7/8/7896295001012_1_1_1200_72_rgb.png"><img class="xzoom-gallery4" width="80" src="https://www.cafeodebrecht.com.br/media/catalog/product/cache/1/image/800x/9df78eab33525d08d6e5fb8d27136e95/7/8/7896295001012_1_1_1200_72_rgb.png" title="The description goes here"></a>
                            <a href="https://www.cafeodebrecht.com.br/media/catalog/product/cache/1/image/800x/9df78eab33525d08d6e5fb8d27136e95/7/8/7896295001012_12_1_1200_72_rgb.png"><img class="xzoom-gallery4" width="80" src="https://www.cafeodebrecht.com.br/media/catalog/product/cache/1/image/800x/9df78eab33525d08d6e5fb8d27136e95/7/8/7896295001012_12_1_1200_72_rgb.png" title="The description goes here"></a>
                            <a href="https://www.cafeodebrecht.com.br/media/catalog/product/cache/1/image/800x/9df78eab33525d08d6e5fb8d27136e95/7/8/7896295001012_8_1_1200_72_rgb.png"><img class="xzoom-gallery4" width="80" src="https://www.cafeodebrecht.com.br/media/catalog/product/cache/1/image/800x/9df78eab33525d08d6e5fb8d27136e95/7/8/7896295001012_8_1_1200_72_rgb.png" title="The description goes here"></a>
                        </div>
                    </div>
                </div>
                <div class="large-7 column"></div>
            </div>

            <div class="product-details">
                <div class="product-shop">
                    <div class="product-name">
						<h2 itemprop="name">Café Odebrecht Superior</h2>
                    </div>
                    <div id="info-secondaria" class="bloco-info-produto grid12-12 no-gutter">
						<div class="grid12-4 no-gutter a-left">
							<div class="availability in-stock">
								<span class="title-rating">Produto:</span> <span class="disponivel">Em estoque</span>
							</div>
                        </div>
                        <div class="grid12-3 no-gutter sku-align">
                            <span><span class="title-rating">SKU: </span><span>000204P</span></span>
                        </div>
						<div class="grid12-5 no-gutter a-right">
                            <div class="no-ratings">
                                <span class="amount ancora-avaliacoes"><a class="ancora-avaliacoes" href="#avaliacoes">Avaliação: </a></span>
                                <div class="rating-box">
                                    <div class="rating" style="width:0%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="info-extra" class="grid12-12 no-gutter">
                        <div class="extrahint-wrapper">
                            <div class="product-pricing">Café Odebrecht Superior is available for purchase in increments of 1</div>
                        </div>
                        <br>
                        <div class="block">
                            <div class="block-title">
                                <strong><span>Pdf Indisponível</span></strong>
                                <br>
                            </div>
                        </div>
                    </div>
                    <div class="box-additional bloco-info-produto">
						<div class="container2-wrapper">
                            <div class="product-options" id="product-options-wrapper">
                                <div id="atributos-principal">
                                    <div class="containerAtributo">
                                        <h3>Tamanho</h3>
                                        <ul class="outros-lista-atributos" id="dados_tamanho">
                                            <li>
                                                <a onclick="Cores.selecionar(this);" title="500g" data-idatributo="133" data-index="0" data-atributo="tamanho" data-valor="47" class="">500g</a>
                                            </li>
                                            <li>
                                                <a onclick="Cores.selecionar(this);" title="250g" data-idatributo="133" data-index="0" data-atributo="tamanho" data-valor="25" class="selecionado">250g</a>
                                            </li>
                                        </ul>
                                        <input id="campo_tamanho" data-campolabel="Tamanho" data-campocode="tamanho" data-campoindex="0" class="campos_atributo" name="atributos[tamanho]" type="hidden" value="25">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="price-qty-container preco-comprar">
                        <div class="add-to-box grid12-12 no-gutter">
                            <div class="add-to-cart v-centered-content">
                                <div class="qty-wrapper">
                                    <span class="arrow dec" title="Diminuir">-</span><input type="text" name="qty" id="qty" maxlength="3" value="1" title="Quantidade" class="input-text qty"><span class="arrow inc" title="Aumentar">+</span>
                                </div>
                            </div>
                        </div>
                        <div class="preco-prod grid12-12 no-gutter">
                            <div class="price-box">
                                <p class="old-price">
                                    <span class="price-label">De:</span>
                                    <span class="price" id="old-price-52">R$ 10,00</span>
                                </p>

                                <p class="special-price">
                                    <span class="price-label">Por:</span>
                                    <span class="price" id="product-price-52">R$ 9,00</span>
                                </p>
                                <div class="parcelaBloco no-display" data-maximo_parcelas="12" data-valor_produto="9.0000" data-maximo_parcelas_sem_juros="3" data-juros="" data-multiplos_juros="|0|0|0|0|0|6.16|6.96|7.77|8.59|9.41|10.24" data-juros_tipo="0" data-valor_minimo="30">
                                    <div class="parcela-semjuros">
                                        em até<span class="parcela" data-parcela="1">1</span><span class="xparc">x</span> de <span class="price">R$&nbsp;9,00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="add-to-cart-btn-container add-to-cart v-centered-content">
                        <button type="button" title="Comprar" class="btn-special btn-cart" onclick="">Comprar</button>
                    </div>
                    <div id="socialWrap">
                        <h4 class="pr15">Compartilhe:</h4>
                        <ul id="share-product">
                            <li>
                                <a class="icon-facebook" title="Compartilhe no Facebook" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https://www.cafeodebrecht.com.br/cafe-odebrecht-superior.html" onclick="javascript:window.open(this.href,  '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" rel="nofollow"></a>
                            </li>
                            <li>
                                <a class="icon-twitter" title="Compartilhe no Twitter" href="https://twitter.com/intent/tweet?original_referer=https://www.cafeodebrecht.com.br/cafe-odebrecht-superior.html&amp;tw_p=tweetbutton&amp;url=https://www.cafeodebrecht.com.br/cafe-odebrecht-superior.html" onclick="javascript:window.open(this.href,  '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"></a>
                            </li>
                            <li>
                                <a class="icon-gplus" title="Compartilhe no Google+" href="https://plus.google.com/share?url=https://www.cafeodebrecht.com.br/cafe-odebrecht-superior.html" onclick="javascript:window.open(this.href,  '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"></a>
                            </li>
    		    	        <li>
	        	                <a class="icon-mail-alt" title="Indique este produto para um amigo" href="https://www.cafeodebrecht.com.br/sendfriend/product/send/id/52/"></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <section class="grid-container-spaced">
            <div id="tabs-produto">
                <div class="tab-header-and-content">
                <ul class="accordion-tabs-minimal">
					<li class="">
						<a href="#descricao" class="tab-link">
							Descrição
						</a>

					</li>
					<li class="">
                        <a href="#atributos" class="tab-link is-active" id="tab-atributos">Especificações</a>
                    </li>
			    </ul>
                        <div id="descricao" class="tab-content">
                            O Café Odebrecht Superior é uma seleção dos melhores cafés paranaenses blendados com os melhores grãos do sul de minas o que determina sabor forte e encorpado de qualidade superior, torra média escura, moagem média fina. O resultado é um produto que atende as exigências de consumidores que exigem um sabor encorpado e um aroma forte.
                            <br>
                            <br>
						</div>
                        <div id="atributos" class="tab-content is-open" style="display: block;">
						    <table class="data-table" id="product-attribute-specs-table">
                                <colgroup>
                                    <col width="25%">
                                    <col>
                                </colgroup>
                                <tbody>
                                    <tr class="first odd">
                                        <th class="label">Tipo de Envase</th>
                                        <td class="data last">Alto Vácuo</td>
                                    </tr>
                                    <tr class="even">
                                        <th class="label">Validade</th>
                                        <td class="data last">540 dias após data de fabricação</td>
                                    </tr>
                                    <tr class="odd">
                                        <th class="label">Tipo de embalagem interna</th>
                                        <td class="data last">Aluminizada</td>
                                    </tr>
                                    <tr class="even">
                                        <th class="label">Tipo de embalagem externa</th>
                                        <td class="data last">Caixa de papelão</td>
                                    </tr>
                                    <tr class="odd">
                                        <th class="label">Peso da embalagem</th>
                                        <td class="data last">9 gramas (embalagem interna) + 26 gramas (caixinha)</td>
                                    </tr>
                                    <tr class="even">
                                        <th class="label">Peso da reembalagem</th>
                                        <td class="data last">360g</td>
                                    </tr>
                                    <tr class="odd">
                                        <th class="label">Composição</th>
                                        <td class="data last">100% Café Arábica</td>
                                    </tr>
                                    <tr class="even">
                                        <th class="label">Condições de Armazenamento</th>
                                        <td class="data last">Local seco e árido longe de presença de sol e produtos químicos.</td>
                                    </tr>
                                    <tr class="odd">
                                        <th class="label">Empilhamento Máximo</th>
                                        <td class="data last">8 caixas</td>
                                    </tr>
                                    <tr class="even">
                                        <th class="label">Código de barra do produto</th>
                                        <td class="data last">7896295001012</td>
                                    </tr>
                                    <tr class="last odd">
                                        <th class="label">Marca</th>
                                        <td class="data last">Café Odebrecht</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
        </div>
			    <div class="clear"></div>
		    </div>
        </section>
    </div>
</div>

@endsection

@section('javascript-scripts')
<!-- get jQuery from the google apis -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<!-- XZOOM JQUERY PLUGIN  -->
<script type="text/javascript" src="{{ asset('/Feature-rich-Product-Gallery-With-Image-Zoom-xZoom/dist/xzoom.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('/Feature-rich-Product-Gallery-With-Image-Zoom-xZoom/example/hammer.js/1.0.5/jquery.hammer.min.js') }}"></script>
<script>
    (function ($) {
    $(document).ready(function() {
        $('.xzoom4, .xzoom-gallery4').xzoom({tint: '#006699', Xoffset: 15});

        //Integration with hammer.js
        var isTouchSupported = 'ontouchstart' in window;

        if (isTouchSupported) {
            //If touch device
            $('.xzoom4').each(function(){
                var xzoom = $(this).data('xzoom');
                xzoom.eventunbind();
            });


        $('.xzoom4').each(function() {
            var xzoom = $(this).data('xzoom');
            $(this).hammer().on("tap", function(event) {
                event.pageX = event.gesture.center.pageX;
                event.pageY = event.gesture.center.pageY;
                var s = 1, ls;

                xzoom.eventmove = function(element) {
                    element.hammer().on('drag', function(event) {
                        event.pageX = event.gesture.center.pageX;
                        event.pageY = event.gesture.center.pageY;
                        xzoom.movezoom(event);
                        event.gesture.preventDefault();
                    });
                }




            xzoom.openzoom(event);
            });
        });

        } else {
            //If not touch device



            //Integration with magnific popup plugin
            $('#xzoom-magnific').bind('click', function(event) {
                var xzoom = $(this).data('xzoom');
                xzoom.closezoom();
                var gallery = xzoom.gallery().cgallery;
                var i, images = new Array();
                for (i in gallery) {
                    images[i] = {src: gallery[i]};
                }
                $.magnificPopup.open({items: images, type:'image', gallery: {enabled: true}});
                event.preventDefault();
            });
        }
    });
})(jQuery);
</script>
@endsection
