@extends('layout.app')

@section('head-links-scripts')
@endsection



@section('content')
<!-- Products -->
<section class="products-section">
    <div class="container products-container">
        <div class="page-title search-results-title">
            <h3>@lang("Search results for") '{{ request('q') }}'</h3>
        </div>
        <ul class="products-grid">
            @foreach($products as $product)

            <li class="item">
                <div class="product-image-wrapper">
                    <a href="{{ route('product.show', ['slug' => $product->slug ]) }}" title="Café Odebrecht Superior" class="product-image">
                        <img src="{{ asset( '/storage/' . explode(',', $product->images)[0] ) }}" alt="Café Odebrecht Superior">
                    </a>
                </div>
                <div class="infobox">
                    <h3 class="product-name"><a href="{{ route('product.show', ['slug' => $product->slug ]) }}" title="Café Odebrecht Superior">{{ $product->productTranslations[0]->name }}</a></h3>
                    <div class="no-ratings">
                        <div class="rating-box">
                            <div class="rating" style="width:0%"></div>
                        </div>
                    </div>
                    @if($isDiscountActivated && $product->discount_price > 0  && $product->discount_price < $product->price)
                    <div class="price-box">
                        <p class="old-price">
                            <span class="price" id="old-price-116">{{ $product->price }} {{ config('currency.' . app()->getLocale()) }}</span>
                        </p>
                        <p class="special-price">
                            <span class="price" id="product-price-116">{{ $product->discount_price }} {{ config('currency.' . app()->getLocale()) }}</span>
                        </p>
                    </div>
                    @else
                        <div class="price-box">
                            <p class="regular-price">
                                <span class="price" id="old-price-116">{{ $product->price }} {{ config('currency.' . app()->getLocale()) }}</span>
                            </p>
                        </div>
                    @endif
                    <div class="bt-add">
                        <a style="display: block;" href="{{ route('product.show', ['slug' => $product->slug ]) }}" type="button" title="Comprar" data-id="52" class="btn-ajax ajax"><span>@lang("Details")</span></a>
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
