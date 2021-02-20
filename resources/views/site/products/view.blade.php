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
            <ul>
                <li class="home">
                    <a href="{{ route('home') }}" itemprop="item" title="Ir para Página Inicial">
                    <span>Home</span></a>
                    <span class="separator">|</span>
                </li>
                <li class="category">
                    <a href="{{ route('category.show', ['slug' => $product->category->slug ]) }}" itemprop="item" title="Ir para Página Inicial">
                    <span>{{ $product->category->categoryTranslations[0]->name }}</span></a>
                    <span class="separator">|</span>
                </li>
                <li class="product">
                    <a class="current" href="{{ route('product.show', ['slug' => $product->slug ]) }}" title="" itemprop="item">
                        <h1 class="current">{{ $product->productTranslations[0]->name }}</h1>
                    </a>
                </li>
            </ul>
        </div>
        <ul class="messages">
        </ul>
        <section class="product-img-details">
            <div class="product-image-gallery">
                <div class="large-5 column">
                    <div class="xzoom-container">
                        <div class="xzoom-img-container">
                            <img class="xzoom4" id="xzoom-fancy" src="{{ asset( '/storage/' . explode(',', $product->images)[0] )}}" xoriginal="{{ asset( '/storage/' . explode(',', $product->images)[0] )}}" />
                        </div>
                        <div class="xzoom-thumbs">
                            @foreach(explode(',', $product->images) as $image)
                            <a href="{{ asset( '/storage/' . $image ) }}"><img class="xzoom-gallery4" width="80" src="{{ asset( '/storage/' . $image ) }}" title="The description goes here"></a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="large-7 column"></div>
            </div>

            <div class="product-details">
                <form method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="product-shop">
                        <div class="product-name">
                            <h2 itemprop="name">{{ $product->productTranslations[0]->name }}</h2>
                        </div>
                        <div id="info-secondaria" class="bloco-info-produto grid12-12 no-gutter">
                            <div class="grid12-4 no-gutter a-left">
                                <div class="availability in-stock">
                                    <span class="title-rating">Product:</span> <span class="disponivel">{{ $product->stock > 0 ? 'Available' : 'Unavailable' }}</span>
                                </div>
                            </div>
                            <div class="grid12-3 no-gutter sku-align">
                                <span><span class="title-rating">SKU: </span><span>{{ $product->sku }}</span></span>
                            </div>
                            <div class="grid12-5 no-gutter a-right">
                                <div class="no-ratings">
                                    <div class="rating-box">
                                        <div class="rating" style="width:0%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="info-extra" class="grid12-12 no-gutter">
                            <br>
                            <div class="block">
                                <div class="block-title">
                                    <strong><span></span></strong>
                                    <br>
                                </div>
                            </div>
                        </div>
                        <div class="price-qty-container preco-comprar">
                            <div class="add-to-box grid12-12 no-gutter">
                                <div class="add-to-cart v-centered-content">
                                    <div class="qty-wrapper">
                                        <span id="product-dec-qty-{{ $product->id }}" class="arrow dec">-</span><input type="number" name="qty" id="product-qty-field-{{ $product->id }}"  min="{{ ($product->stock > 0 && $product->stock > Session::get('cart')->getProductQty($product->id)) ? 1 : 0 }}" max="{{ $product->stock > Session::get('cart')->getProductQty($product->id) ? ($product->stock - Session::get('cart')->getProductQty($product->id)) : 0 }}" value="{{ ($product->stock > 0 && $product->stock > Session::get('cart')->getProductQty($product->id)) ? 1 : 0 }}" class="input-text qty"><span id="product-inc-qty-{{ $product->id }}" class="arrow inc">+</span>
                                    </div>
                                    <div id="warning-msg-{{ $product->id }}" class="warning-msg">{{ $product->stock > Session::get('cart')->getProductQty($product->id) ? ($product->stock - Session::get('cart')->getProductQty($product->id)) : 0 }} items left!</div>
                                </div>
                            </div>
                            <div class="preco-prod grid12-12 no-gutter">
                                @if($isDiscountActivated && $product->discount_price > 0  && $product->discount_price < $product->price)
                                <div class="price-box">
                                    <p class="old-price">
                                        <span class="price-label">from:</span>
                                        <span class="price">{{ $product->price }} {{ config('currency.' . app()->getLocale()) }}</span>
                                    </p>

                                    <p class="special-price">
                                        <span class="price-label">to:</span>
                                        <span class="price">{{ $product->discount_price }} {{ config('currency.' . app()->getLocale()) }}</span>
                                    </p>
                                    <div class="price-statement no-display">
                                        <div>
                                            up to <span class="price-num">1</span><span class="xmark">x</span> from <span class="price">{{ $product->discount_price }} {{ config('currency.' . app()->getLocale()) }}</span>
                                        </div>
                                    </div>
                                </div>
                                @else
                                <div class="price-box">
                                    <p class="regular-price">
                                        <span class="price">{{ $product->price }} {{ config('currency.' . app()->getLocale()) }}</span>
                                    </p>
                                    <div class="price-statement no-display">
                                        <div>
                                            up to <span class="price-num">1</span><span class="xmark">x</span> from <span class="price">{{ $product->price }} {{ config('currency.' . app()->getLocale()) }}</span>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="add-to-cart-btn-container add-to-cart v-centered-content">
                                <input type="hidden" name="product-id" value="{{ $product->id }}">
                                <button type="button" id="add-to-cart-btn" title="Comprar" class="btn-special btn-cart"><span class="submitting">Adding..</span><span class="submit">Add to cart</span></button>
                        </div>
                        <div id="socialWrap">
                            <h4 class="pr15">Social media:</h4>
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
                </form>
            </div>
        </section>
        <section class="grid-container-spaced">
            <div id="tabs-produto">
                <div class="tab-header-and-content">
                        <ul class="accordion-tabs-minimal">
                            <li class="">
                                <a href="#descricao" class="tab-link is-active">
                                    Description
                                </a>
                            </li>
                            <li class="">
                                <a href="#atributos" class="tab-link" id="tab-atributos">Specifications</a>
                            </li>
                        </ul>
                        <div id="descricao" class="tab-content is-open">
                            {{ $product->productTranslations[0]->description }}
                            <br>
                            <br>
						</div>
                        <div id="atributos" class="tab-content">
                            <br>
						    <table class="data-table" id="product-attribute-specs-table">
                                <colgroup>
                                    <col width="25%">
                                    <col>
                                </colgroup>
                                <tbody>
                                <!--
                                    (json_decode( strval($product->productTranslations[0]->attribute_value) ) as $key => $value)
                                    <tr class="first odd">
                                        <th class="label"></th>
                                        <td class="data last"></td>
                                    </tr>

                                -->
                                @if($product->productTranslations[0]->attribute_value)
                                    @foreach(explode(',' ,$product->productTranslations[0]->attribute_value) as $variable)
                                        @if(count(explode(':', $variable)) === 2)
                                            <tr class="first odd">
                                                <th class="label">{{ trim(explode(':', $variable)[0]) }}</th>
                                                <td class="data last">{{ trim(explode(':', $variable)[1]) }}</td>
                                            </tr>
                                        @endif
                                    @endforeach
                                @endif
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
