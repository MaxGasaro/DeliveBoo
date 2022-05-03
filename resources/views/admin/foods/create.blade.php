@extends('admin.layouts.app')

@section('pageTitle','DeliveBoo')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
               <h1>Aggiungi un nuovo piatto al menù</h1>

               <form method="POST" action="{{route('admin.foods.store')}}" enctype="multipart/form-data">
                   @csrf
                    <div class="form-group">
                        <label for="img">Immagine</label>
                        <input type="file" class="form-control" id="img" name="img" >
                    </div>

                    <div class="form-group">
                        <label for="name">Nome Piatto</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}" required>
                    </div>

                    <div class="form-group">
                        <label for="price">Prezzo</label>
                        <input type="number" step="0.01" class="form-control" id="price" name="price" value="{{old('price')}}" required>
                    </div>

                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="visible" name="visible" {{old('visible')? 'checked' : ''}} >
                        <label class="form-check-label" for="visible">Disponibile</label>
                    </div>

                    <div class="form-group">
                        <label for="description">Descrizione Piatto</label>
                        <textarea  class="form-control" name="description" id="description" cols="30" rows="10" required>{{old('description')}}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
        </div>
    </div>
@endsection