@extends('admin-layout.app')

@section('head-links-scripts')
@endsection


@section('content')
    <?php
        $translations = null;
        if(!empty($product)) {
            $translations = $product->productTranslations;
        }
    ?>

    <div class="page-content form-container form-page">
        <div class="page-title">
            <h1>Edit Order</h1>
        </div>
        <div class="main-content">
            <form method="POST" action="{{ route('orders.update', $order->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="view-wrapper">
                    <div class="field-wrapper col-6">
                        <div class="field-label">Full Name</div>
                        <div class="field-value">{{ $order->name }} {{ $order->surname }}</div>
                    </div>
                    <div class="field-wrapper col-6">
                        <div class="field-label">Order Status</div>
                        <div class="field-value">{{ \App\Models\Order::$orderStatus[$order->status]['name'] }}</div>
                    </div>
                    <div class="field-wrapper col-6">
                        <div class="field-label">Phone 1</div>
                        <div class="field-value">{{ $order->phone1 }}</div>
                    </div>
                    <div class="field-wrapper col-6">
                        <div class="field-label">Phone 2</div>
                        <div class="field-value">{{ $order->phone2 }}</div>
                    </div>
                    <div class="field-wrapper col-6">
                        <div class="field-label">City</div>
                        <div class="field-value">{{ $order->city->cityTranslations->where('lang', 'en')->first()->name }}</div>
                    </div>
                    <div class="field-wrapper col-12">
                        <div class="field-label">Adderess</div>
                        <div class="field-value">{{ $order->address }}</div>
                    </div>
                    <div class="col-12 table-wrapper">
                        <table class="data-table">
                            <thead>
                                <tr class="first last">
                                    <th class="col-img">Image</th>
                                    <th>Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($order->orderItems as $orderItem)
                                <?php
                                    $product = $orderItem->product;
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
                                        {{ $orderItem->qty }}
                                    </td>
                                    <td class="a-center">
                                        {{ $orderItem->product_price }} {{ config('currency.en') }}
                                    </td>
                                    <td class="a-center">
                                        {{ $orderItem->product_price * $orderItem->qty }} {{ config('currency.en') }}
                                    </td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td colspan="4" class="a-center">
                                        <strong>Subtotal</strong>
                                    </td>
                                    <td class="a-center">
                                        {{ $order->sub_total }} {{ config('currency.en') }}
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="a-center">
                                        <strong>Shipping fee</strong>
                                    </td>
                                    <td class="a-center">
                                        {{ $order->shipping_fees }} {{ config('currency.en') }}
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="a-center">
                                        <strong>Total</strong>
                                    </td>
                                    <td class="a-center">
                                        {{ $order->total }} {{ config('currency.en') }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="form-wrapper">
                    <div class="form-group col-6">
                        <label for="status">Order Status</label>
                        <select id="status" name="status" class="form-control">
                        @foreach (\App\Models\Order::listOrderStatus() as $statusId)
                            <?php
                                $status = \App\Models\Order::$orderStatus[$statusId];
                            ?>
                            @if ( old('status') === $status['id'] || ( empty(old('status')) && $order->status  === $status['id']) )
                            <option value="{{ $status['id'] }}" selected>{{ $status['name'] }}</option>
                            @else
                            <option value="{{ $status['id'] }}">{{ $status['name'] }}</option>
                            @endif
                        @endforeach
                        </select>
                        @error('status')
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

