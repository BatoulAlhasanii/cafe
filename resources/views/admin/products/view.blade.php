@extends('admin-layout.app')

@section('head-links-scripts')
@endsection

@section('title')
Product Details
@endsection

@section('content')
    <?php
        $translation = null;
        if(!empty($product)) {
            $translation = $product->productTranslations->where('lang','en')->first();
            $category = $product->category->categoryTranslations->where('lang','en')->first();
            $flavor = $product->flavor->flavorTranslations->where('lang','en')->first();
        }
    ?>

    <div class="page-content form-container form-page">
        <div class="page-title">
            <h1>Product Details</h1>
        </div>
        @include('admin.components.session_messages')
        <div class="main-content">
            <div class="view-wrapper">
                <div class="field-wrapper col-6">
                    <div class="field-label">Name</div>
                    <div class="field-value">{{ $translation->name }}</div>
                </div>
                <div class="field-wrapper col-6">
                    <div class="field-label">Category</div>
                    <div class="field-value">{{ $category->name }}</div>
                </div>
                <div class="field-wrapper col-6">
                    <div class="field-label">Flavor</div>
                    <div class="field-value">{{ $flavor->name }}</div>
                </div>
                <div class="field-wrapper col-6">
                    <div class="field-label">Stock</div>
                    <div class="field-value">{{ $product->stock }}</div>
                </div>
                <div class="field-wrapper col-6">
                    <div class="field-label">SKU</div>
                    <div class="field-value">{{ $product->sku }}</div>
                </div>
                <div class="field-wrapper col-6">
                    <div class="field-label">Price</div>
                    <div class="field-value">{{ $product->price }} {{ config('currency.en') }}</div>
                </div>
                <div class="field-wrapper col-6">
                    <div class="field-label">Discount Price</div>
                    <div class="field-value">{{ $product->discount_price }} {{ config('currency.en') }}</div>
                </div>
                <div class="field-wrapper col-6">
                    <div class="field-label">Featured</div>
                    <div class="field-value">
                        @if($product->is_featured)
                            <span class="success">Yes</span>
                        @else
                            <span class="danger">No</span>
                        @endif
                    </div>
                </div>
                <div class="field-wrapper col-6">
                    <div class="field-label">Shown To Customer</div>
                    <div class="field-value">
                        @if($product->is_active)
                            <span class="success">Yes</span>
                        @else
                            <span class="danger">No</span>
                        @endif
                    </div>
                </div>
                <div class="field-wrapper col-12">
                    <div class="field-label">Description</div>
                    <div class="field-value">{{ $translation->description }}</div>
                </div>
                <div class="field-wrapper col-12">
                    <div class="field-label">Attribute:Value</div>
                    <div class="field-value">{{ $translation->attribute_value }}</div>
                </div>
                <div class="field-wrapper col-12">
                    <div class="field-value">
                        @foreach(explode(',', $product->images) as $image)
                            <img class="product-view-img" src="{{ asset('/storage/' .  $image) }}">
                        @endforeach
                    </div>
                </div>
                <div class="col-12 table-wrapper">
                    <h3>Stock Edition Log</h3>
                    <table class="data-table">
                        <thead>
                            <tr class="first last">
                                <th>Action</th>
                                <th>Quantity</th>
                                <th>Resulting Stock</th>
                                <th>User</th>
                                <th>Date Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($product->productLogs as $productLog)
                            <tr>
                                <td class="a-center operator">
                                    @if($productLog->action === \App\Models\Product::$increaseProductLabel)
                                        <span class="success">+</span>
                                    @else
                                        <span class="danger">-</span>
                                    @endif
                                </td>
                                <td class="a-center">
                                    {{ $productLog->quantity }}
                                </td>
                                <td class="a-center">
                                    {{ $productLog->stock }}
                                </td>
                                <td class="a-center">
                                    {{ $productLog->name }}
                                </td>
                                <td class="a-center">
                                    {{ $productLog->created_at }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
