@extends('admin-layout.app')

@section('head-links-scripts')
@endsection


@section('content')
    <div class="page-content container orders-page">
        <div class="page-title">
            <h1>Orders</h1>
        </div>

        <div class="main-content">
            <table class="data-table">
                <thead>
                    <tr class="first last">
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
            <div class="pagination-wrapper">
                {{ $orders->appends(request()->query())->links() }}
            </div>
        </div>
    </div>
@endsection
