@extends('admin.layouts.app')

@section('pageTitle')
    DeliveBoo - {{$food->name}}
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">Dettaglio Piatto: {{$food->name}}</h1>

                <div class="card">
                    @if (isset($food->img))
                        <img src="{{asset('storage/'.$food->img)}}" class="card-img-top img-fluid" alt="img">
                    @else
                        <img src="{{asset('img/fallback_img.jpg')}}" alt="fallback_img" class="card-img-top img-fluid" >
                    @endif
                    <div class="card-body">
                        <h2 class="card-title">{{$food->name}}</h2>
                        <p class="card-text"> <strong>Descrizione:</strong>  {{$food->description}}</p>
                        <span><strong>Prezzo:</strong> {{$food->price}} &euro;</span>
                        <span> <strong>Categoria:</strong>  {{isset($food->category)? $food->category->name : '-'}}</span>
                        @if ($food->visible)
                            <p>Attualmente Disponibile</p> 
                        @else
                        <p>Non Disponibile</p> 
                        @endif
                            
                       
                    </div>
 
                   
                </div>

            </div>
           
        </div>

        <a href="{{route('admin.foods.index')}}" class="btn btn-primary mt-2">Go Back</a>
    </div>
@endsection