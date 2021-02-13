@extends('admin-layout.app')

@section('head-links-scripts')
@endsection


@section('content')
    <div class="page-content container">
        <div class="page-title">
            <h1>Products</h1>
        </div>
        <a href="{{ route('products.create') }}" class="custom-btn">+ Add Product</a>
        <div class="main-content">
            <table class="data-table">
                <thead>
                    <tr class="first last">
                        <th class="col-img">Image</th>
                        <th>Name</th>
                        <th>Weight</th>
                        <th>Stock</th>
                        <th>Price</th>
                        <th>Discount Price</th>
                        <th>Shown to Customer</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <?php
                        $translation = $product->productTranslations->where('lang','en')->first();
                    ?>
                    <tr>
                        <td class="a-center img-content">
                            @if($product->images)
                                <img src="{{ asset('/storage/' . explode(',', $product->images)[0]) }}">
                            @endif
                        </td>
                        <td>
                            {{ $translation->name }}
                        </td>
                        <td class="a-center">
                            {{ $product->unit_amount }} {{ $translation->unit }}
                        </td>
                        <td class="a-center">
                            {{ $product->stock }}
                        </td>
                        <td class="a-center">
                            {{ $product->price }} {{ config('currency.en') }}
                        </td>
                        <td class="a-center">
                            {{ $product->discount_price }} {{ config('currency.en') }}
                        </td>
                        <td class="a-center">
                            @if($product->is_active)
                                <span class="success">Yes</span>
                            @else
                                <span class="danger">No</span>
                            @endif
                        </td>
                        <td class="a-center">
                            <a href="{{ route('products.edit', ['id' => $product->id]) }}">Edit</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="pagination-wrapper">
                {{ $products->appends(request()->query())->links() }}
            </div>
        </div>
    </div>
@endsection
