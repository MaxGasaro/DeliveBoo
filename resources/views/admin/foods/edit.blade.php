@extends('admin.layouts.app')

@section('pageTitle')
    Modifica - {{$food->name}}
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
               <h1>Modifica del piatto: {{$food->name}}</h1>

               <form method="POST" action="{{route('admin.foods.update', $food->id)}}" enctype="multipart/form-data">
                   @csrf
                   @method('PUT')
                    @if ($food->img)
                        <div class="form-group">
                            <h3>Immagine attuale</h3>
                            <img src="{{asset('storage/' . $food->img)}}" alt="img" class="w-50">
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="img">Immagine</label>
                        <input type="file" class="form-control" id="img" name="img" >
                    </div>

                    <div class="form-group">
                        <label for="name">Nome Piatto</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{old('name', $food->name)}}" required>
                    </div>

                    <div class="form-group">
                        <label for="price">Prezzo</label>
                        <input type="number" step="0.01" min="0.05" class="form-control" id="price" name="price" value="{{old('price', $food->price)}}" required>
                    </div>

                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="visible" name="visible" {{old('visible', $food->visible)? 'checked' : ''}} >
                        <label class="form-check-label" for="visible">Disponibile</label>
                    </div>
                    <div class="form-group">
                        <label for="category_id">Scegli una categoria</label>
                        <select class="form-control" id="category_id" name="category_id" >
                            <option value="">Nessuna categoria</option>
                            @foreach ($categories as $category )
                                <option {{( old('category_id', $food->category_id) == $category->id )? 'selected':''}} value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    

                    <div class="form-group">
                        <label for="description">Descrizione Piatto</label>
                        <textarea  class="form-control" name="description" id="description" cols="30" rows="10" required>{{old('description', $food->description)}}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
        </div>
    </div>
@endsection