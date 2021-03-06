@extends('layout.app')

@section('head-links-scripts')
@endsection

@section('title')
{{ $category->categoryTranslations[0]->name }}
@endsection

@section('content')
<!-- Products -->
<section class="products-section">
    <div class="container products-container">
        <div class="breadcrumbs">
            <ul>
                <li class="home">
                    <a href="{{ route('home') }}">
                    <span>@lang("Home")</span></a>
                    <span class="separator">|</span>
                </li>
                <li class="category">
                    <a href="{{ route('category.show', ['slug' => $category->slug ]) }}">
                    <span class="current">{{ $category->categoryTranslations[0]->name }}</span></a>
                </li>
            </ul>
        </div>
        <div class="page-title category-title">
            <h3>{{ $category->categoryTranslations[0]->name }}</h3>
        </div>
        <ul class="products-grid">
            @foreach($category->products as $product)

            <li class="item">
                <div class="product-image-wrapper">
                    <a href="{{ route('product.show', ['slug' => $product->slug ]) }}" class="product-image">
                        <img src="{{ asset( '/storage/' . explode(',', $product->images)[0] ) }}" alt="Café Odebrecht Superior">
                    </a>
                </div>
                <div class="infobox">
                    <h3 class="product-name"><a href="{{ route('product.show', ['slug' => $product->slug ]) }}">{{ $product->productTranslations[0]->name }}</a></h3>
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
                        <a style="display: block;" href="{{ route('product.show', ['slug' => $product->slug ]) }}" type="button" data-id="52" class="btn-ajax ajax"><span>@lang("Details")</span></a>
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
