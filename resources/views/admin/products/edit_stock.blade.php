@extends('admin-layout.app')

@section('head-links-scripts')
@endsection


@section('content')
    <?php
        $translation = null;
        if(!empty($product)) {
            $translation = $product->productTranslations->where('lang','en')->first();
            $category = $product->category->categoryTranslations->where('lang','en')->first();
        }
    ?>

    <div class="page-content form-container form-page">
        <div class="page-title">
            <h1>Edit Stock</h1>
        </div>
        @include('admin.components.session_messages')
        <div class="main-content">
            <form method="POST" action="{{ route('products.stock.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="view-wrapper">
                    <div class="field-wrapper col-6">
                        <div class="field-label">Name</div>
                        <div class="field-value">{{ $translation->name }}</div>
                        <br>
                        <div class="field-label">Category</div>
                        <div class="field-value">
                                {{ $category->name }}
                        </div>
                        <br>
                        <div class="field-label">Stock</div>
                        <div class="field-value">
                                {{ $product->stock }}
                        </div>
                        <br>
                        <div class="field-label">Price</div>
                        <div class="field-value">
                                {{ $product->price }} {{ config('currency.en') }}
                        </div>
                    </div>
                    <div class="field-wrapper col-6">
                        <div class="field-value">
                            @if($product->images)
                                <img class="product-view-img" src="{{ asset('/storage/' . explode(',', $product->images)[0]) }}">
                            @endif
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
                <div class="form-wrapper">
                    <div class="form-group col-6">
                        <label for="operator">Increase/Decrease</label>
                        <select id="operator" name="operator" class="form-control">
                        @foreach (['operator' => 'Operator',\App\Models\Product::$increaseProductLabel => '+',\App\Models\Product::$decreaseProductLabel => '-'] as $key => $val)
                            @if ( old('operator') === $key )
                            <option value="{{ $key }}" selected>{{ $val }}</option>
                            @else
                            <option value="{{ $key }}">{{ $val }}</option>
                            @endif
                        @endforeach
                        </select>
                        @error('operator')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-6">
                        <label for="quantity">Quantity</label>
                        <input id="quantity" type="text" name="quantity" value="{{ old('quantity') ?? 0 }}" placeholder="Quantity" class="form-control">
                        @error('quantity')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="buttons-wrapper form-group col-12">
                        <div>
                            <button type="submit" class="btn submit-btn">Update</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
