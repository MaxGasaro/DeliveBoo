@extends('admin.layouts.app')

@section('pageTitle','DeliveBoo')

@section('content') 

    <div class="container">
        <div class="row">
            <div class="col-12">
                <a href="{{route('admin.foods.create')}}" class="btn btn-primary mb-2">Aggiungi piatto</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col text-uppercase">Immagine</th>
                            <th scope="col text-uppercase">Nome</th>
                            <th scope="col text-uppercase">Descrizione</th>
                            <th scope="col text-uppercase">Prezzo</th>
                            <th scope="col text-uppercase">Visibile</th>
                            <th scope="col text-uppercase">Categoria</th>
                            <th scope="col text-uppercase">Azioni</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($foods as $food )
                            <tr>
                                <td class="w-25">
                                    @if (isset($food->img))
                                      <img src="{{asset('storage/' . $food->img)}}" alt="foto" class="img-fluid" >
                                    @else
                                      <img src="{{asset('img/fallback_img.jpg')}}" alt="fallback_img" class="img-fluid" >
                                    @endif
                                </td>
                                <td>{{$food->name}}</td>
                                <td>{{substr($food->description,0,30)}}</td>
                                <td>{{$food->price}}</td>
                                <td>
                                    @if ($food->visible)
                                        <p>Disponibile</p> 
                                    @else
                                        <p>Non Disponibile</p> 
                                    @endif
                                </td>
                                <td>{{isset($food->category)? $food->category->name : '-' }}</td>
                                <td class="d-flex">
                                    <a href="{{route('admin.foods.show', $food->id)}}" class="btn btn-primary">Mostra</a>
                                    <a href="{{route('admin.foods.edit', $food->id)}}" class="btn btn-warning mx-2">Modifica</a>

                                        <!-- Button trigger modal -->
                                    <!--nella onclick passare prima l'id e poi il nome della rotta-->
                                    <button type="button" class="btn btn-danger" onclick="btnDelete('{{$food->id}}', 'foods');" data-toggle="modal" data-target="#cancel" >
                                        Rimuovi
                                    </button>
                                    
                                    <!-- Modal -->
                                    <div class="modal fade" id="cancel" tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                                <div class="modal-header">
                                                    <h5 class="modal-title">Eliminazione</h5>
                                                    <button type="button" class="close" data-dismiss="modal" >
                                                        <span >&times;</span>
                                                    </button>
                                                </div>

                                                <div class="modal-body">
                                                    <p>Sei sicuro di voler cancellare il piatto ?</p>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Chiudi</button>
                                                    <form action="" method="POST" name="myForm" id='myForm'>
                                                        @csrf
                                                        @method('DELETE') 
                                                        
                                                        <button type="submit"  class="btn btn-danger">Rimuovi</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection