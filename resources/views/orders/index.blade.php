@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Orders</div>

                    <div class="panel-body weather-block">

                        <table class="table table-bordered">
                            <tr>
                                <th>ID</th>
                                <th>Partner Name</th>
                                <th>Amount</th>
                                <th>Products <br/>Name / price / quantity</th>
                                <th>Status</th>
                            </tr>
                            @forelse ($orders as $order)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->partnerName }}</td>
                                    <td>{{ $order->amount() }}</td>
                                    <td>
                                        @forelse ($order->orderProducts as $orderProduct)
                                            {{ $orderProduct->productName }} / {{ $orderProduct->price }} / {{ $orderProduct->quantity }}<br>
                                        @empty
                                            <p>No data</p>
                                        @endforelse
                                    </td>
                                    <td>{{ $order->statusName }}</td>
                                </tr>
                            @empty
                                <tr><p>No data</p></tr>
                            @endforelse
                        </table>

                        {{ $orders->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection