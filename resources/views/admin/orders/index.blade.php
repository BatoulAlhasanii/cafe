@extends('admin-layout.app')

@section('head-links-scripts')
@endsection


@section('content')
    <div class="page-content container orders-page">
        <div class="page-title">
            <h1>Orders</h1>
        </div>

        <div class="main-content">
            <form method="GET" action="#" enctype="multipart/form-data">
                @csrf
                <div class="form-wrapper filter-form">
                    <div class="form-group col-3">
                        <label for="id">Id</label>
                        <input id="id" type="number" name="id" value="{{ request('id') }}" placeholder="Id" class="form-control">
                    </div>
                    <div class="form-group col-3">
                        <label for="order_number">Order Number</label>
                        <input id="order_number" type="number" name="order_number" value="{{ request('order_number') }}" placeholder="Order Number" class="form-control">
                    </div>
                    <div class="form-group col-3">
                        <label for="status">Order Status</label>
                        <select id="status" name="status" class="form-control">
                            <option value="-1" selected>All</option>
                            @foreach (\App\Models\Order::$orderStatus as $status)
                                @if ( intval(request('status')) === intval($status['id']) )
                                <option value="{{ $status['id'] }}" selected>{{ $status['name'] }}</option>
                                @else
                                <option value="{{ $status['id'] }}">{{ $status['name'] }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-3">
                        <label for="name">Name</label>
                        <input id="name" type="text" name="name" value="{{ request('name') }}" placeholder="Name" class="form-control">
                    </div>
                    <div class="form-group col-3">
                        <label for="surname">Surname</label>
                        <input id="surname" type="text" name="surname" value="{{ request('surname') }}" placeholder="Surname" class="form-control">
                    </div>
                    <div class="form-group col-3">
                        <label for="city_id">City</label>
                        <select id="city_id" class="form-control" name="city_id">
                            <option value="-1">All</option>
                            @foreach($cities as $city)
                                @if ( intval(request('city_id')) === intval($city->city_id) )
                                <option value="{{ $city->city_id }}" selected>{{ $city->name }}</option>
                                @else
                                <option value="{{ $city->city_id }}">{{ $city->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-3">
                        <label for="from_date">From Date</label>
                        <input id="from_date" type="date" class="form-control"  name="from_date" value="{{ request('from_date') }}">
                    </div>

                    <div class="form-group col-3">
                        <label for="to_date">To Date</label>
                        <input id="to_date" type="date" class="form-control"  name="to_date" value="{{ request('to_date') }}">
                    </div>

                    <div class="buttons-wrapper filter-btns-wrapper form-group col-12">
                            <button type="submit" class="btn submit-btn">Filter</button>
                            <a href="{{ route('orders.index') }}" class="btn submit-btn">Clear Filter</a>
                    </div>
                </div>
            </form>
            <div class="table-wrapper">
            <table class="data-table">
                <thead>
                    <tr class="first last">
                        <th>Order Id</th>
                        <th>Order Number</th>
                        <th>Status</th>
                        <th>Name</th>
                        <th>Surname</th>
                        <th>City</th>
                        <th>Address</th>
                        <th>Total</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td class="a-center">
                            {{ $order->id }}
                        </td>
                        <td class="a-center">
                            {{ $order->order_number }}
                        </td>
                        <td class="a-center">
                            @if (\App\Models\Order::$statusWaitingForDelivery === $order->status)
                                <span class="badge-alert">{{ \App\Models\Order::$orderStatus[$order->status]['name'] }}</span>
                            @elseif(\App\Models\Order::$statusDelivered === $order->status)
                                <span class="badge-success">{{ \App\Models\Order::$orderStatus[$order->status]['name'] }}</span>
                            @else
                                <span class="badge-warning">{{ \App\Models\Order::$orderStatus[$order->status]['name'] }}</span>
                            @endif
                        </td>
                        <td class="a-center">
                            {{ $order->name }}
                        </td>
                        <td class="a-center">
                            {{ $order->surname }}
                        </td>
                        <td class="a-center">
                            {{ $order->city->cityTranslations->where('lang', 'en')->first()->name }}
                        </td>
                        <td class="a-center">
                            {{ $order->address }}
                        </td>
                        <td class="a-center">
                            {{ $order->total }} {{ config('currency.en') }}
                        </td>
                        <td class="a-center">
                            <a href="{{ route('orders.edit', ['id' => $order->id]) }}">Edit</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
            <div class="pagination-wrapper">
                {{ $orders->appends(request()->query())->links() }}
            </div>
        </div>
    </div>
@endsection
