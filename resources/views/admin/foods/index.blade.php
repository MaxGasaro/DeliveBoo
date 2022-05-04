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
                            <th scope="col text-uppercase">#</th>
                            <th scope="col text-uppercase">image</th>
                            <th scope="col text-uppercase">name</th>
                            <th scope="col text-uppercase">description</th>
                            <th scope="col text-uppercase">price</th>
                            <th scope="col text-uppercase">visible</th>
                            <th scope="col text-uppercase">category</th>
                            <th scope="col text-uppercase">azioni</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($foods as $food )
                            <tr>
                                <td scope="row">{{$food->id}}</td>
                                <td>{{$food->img}}</td>
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
                                <td>
                                    <a href="{{route('admin.foods.show', $food->id)}}" class="btn btn-primary">Show</a>
                                    <a href="{{route('admin.foods.edit', $food->id)}}" class="btn btn-warning">Edit</a>
                                    <form action="{{route('admin.foods.destroy', $food->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
    
                                        <button type="submit" class="btn btn-danger">Remove</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection