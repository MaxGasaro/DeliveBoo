@extends('admin.layouts.app')

@section('pageTitle','DeliveBoo')

@section('content') 

    <div class="container">
        <div class="row">
            <div class="col-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col text-uppercase">#</th>
                            <th scope="col text-uppercase">Customer Name</th>
                            <th scope="col text-uppercase">Address</th>
                            <th scope="col text-uppercase">comment</th>
                            <th scope="col text-uppercase">price</th>
                            <th scope="col text-uppercase">phone</th>
                            <th scope="col text-uppercase">date</th>
                            <th scope="col text-uppercase">status order</th>
                            <th scope="col text-uppercase">azioni</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($orders as $order )
                            <tr>
                                <td scope="row">{{$order->id}}</td>
                                <td>{{$order->customer_name}}</td>
                                <td>{{$order->customer_address}}</td>
                                <td>{{substr($order->comment,0,30)}}</td>
                                <td>{{$order->price}}</td>
                                <td>{{$order->customer_phone}}</td>
                                <td>{{$order->date}}</td>
                                <td>{{$order->status_order}}</td>
                                <td >
                                    <a href="{{route('admin.orders.show', $order->id)}}" class="btn btn-primary">Show</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection