@extends('layout.app')

@section('head-links-scripts')
@endsection



@section('content')
<!-- Products -->
<section class="products-section">
    <div class="container products-container">
        <div class="title-bar">
            <h2>
                <span>os produtos</span>Mais Vendidos
            </h2>
        </div>
        <ul class="products-grid">
            @foreach($category->products as $product)

            <li class="item">
                <div class="product-image-wrapper">
                    <a href="{{ route('product.show', ['slug' => $product->slug ]) }}" title="Café Odebrecht Superior" class="product-image">
                        <img src="https://www.cafeodebrecht.com.br/media/catalog/product/cache/1/small_image/240x290/9df78eab33525d08d6e5fb8d27136e95/7/8/7896295001012_12_1_1200_72_rgb.png" alt="Café Odebrecht Superior">
                    </a>
                </div>
                <div class="infobox">
                    <h3 class="product-name"><a href="{{ route('product.show', ['slug' => $product->slug ]) }}" title="Café Odebrecht Superior">{{ $product->productTranslations[0]->name }}</a></h3>
                    <div class="no-ratings">
                        <div class="rating-box">
                            <div class="rating" style="width:0%"></div>
                        </div>
                    </div>
                    <div class="price-box">
                        <p class="old-price">
                            <span class="price" id="old-price-116">{{ $product->price }}</span>
                        </p>
                        <p class="special-price">
                            <span class="price" id="product-price-116">{{ $product->discount_price }}</span>
                        </p>
                    </div>
                    <div class="bt-add">
                        <a style="display: block;" href="{{ route('product.show', ['slug' => $product->slug ]) }}" type="button" title="Comprar" data-id="52" class="btn-ajax ajax"><span>Details</span></a>
                        <!--<button type="button" title="Comprar" data-id="52" class="btn-ajax ajax"><span>Comprar</span></button>-->
                    </div>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
</section>
@endsection



@section('javascript-scripts')

@endsection
