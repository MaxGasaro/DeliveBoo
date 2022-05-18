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
                            <th scope="col text-uppercase">Nome cliente</th>
                            <th scope="col text-uppercase">Indirizzo</th>
                            <th scope="col text-uppercase">Commento</th>
                            <th scope="col text-uppercase">Prezzo</th>
                            <th scope="col text-uppercase">Telefono</th>
                            <th scope="col text-uppercase">Data</th>
                            <th scope="col text-uppercase">Stato ordine</th>
                            <th scope="col text-uppercase">Azioni</th>
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
                                    <a href="{{route('admin.orders.show', $order->id)}}" class="btn btn-primary">Mostra</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection