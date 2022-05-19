@extends('admin.layouts.app')

@section('pageTitle')
    DeliveBoo - {{$order->customer_name}}
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">Dettaglio Ordine:</h1>

                <div class="card">
                    
                    <div class="card-body">
                        <h2 class="card-title">Nome cliente: {{$order->customer_name}}</h2>
                        <p class="card-text"> <strong>Indirizzo:</strong>  {{$order->customer_address}}</p>
                        <p class="card-text"> <strong>Telefono:</strong>  {{$order->customer_phone}}</p>
                        <p><strong>Prezzo totale:</strong> {{$order->price}} &euro;</p>
                        <p><strong>Data acquisto:</strong> {{$order->date}}</p>
                        
                        @if (isset($order->comment))
                            <h3>Commento cliente: </h3>
                            <p>{{$order->comment}}</p>
                        @endif

                        <h3>Cibi ordinati:</h3>
                        <ul>
                            @foreach ($order->foods as $food)
                                <li>{{$food->name}}</li>
                            @endforeach
                        </ul>
                            
                    </div>
                   
                </div>

            </div>
           
        </div>

        <a href="{{route('admin.orders.index')}}" class="btn btn-primary mt-2">Torna indietro</a>
    </div>
@endsection