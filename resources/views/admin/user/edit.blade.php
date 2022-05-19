@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Modifica Profilo</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.user.update', $user->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="modal" tabindex="-1" id="typology-selection">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title">Prima di continuare...</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <p>Seleziona almeno una tipologia</p>
                                </div>
                              </div>
                            </div>
                        </div>

                        @if ($user->image)
                            <div class="form-group row">
                                <div class="offset-md-4 col-md-6">
                                    <img src="{{asset('storage/' . $user->image)}}" alt="img" class="img-fluid">
                                </div>
                            </div>
                        @endif
                        <div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label text-md-right">Immagine</label>
                            <div class="col-md-6">
                                <input type="file" class="form-control" id="image" name="image" >
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nome ristorante</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $user->name) }}" required autocomplete="name" autofocus >

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Indirizzo e-mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{  $user->email }}" required autocomplete="email" disabled>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Indirizzo') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address', $user->address) }}" required autocomplete="address">

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="p_iva" class="col-md-4 col-form-label text-md-right">P.IVA</label>

                            <div class="col-md-6">
                                <input id="p_iva" type="text" pattern="[0-9]+" maxlength="11" minlength="11" class="form-control @error('p_iva') is-invalid @enderror" name="p_iva" value="{{ $user->p_iva }}" required autocomplete="p_iva" disabled>

                                @error('p_iva')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="owner" class="col-md-4 col-form-label text-md-right">{{ __('Proprietario') }}</label>

                            <div class="col-md-6">
                                <input id="owner" type="text" class="form-control @error('owner') is-invalid @enderror" name="owner" value="{{ old('owner',$user->owner ) }}"  autocomplete="owner">

                                @error('owner')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="typology_list" class="col-md-4 col-form-label text-md-right">Tipologie</label>

                            <div class="col-md-6 pl-5">
                                <div class="row row-cols-2 flex-wrap">
                                    @foreach ($typologies as $typology)

                                        @if ($errors->any())
                                            <div class="custom-control custom-checkbox">
                                                <input name="typologies[]" type="checkbox" class="custom-control-input control-check" id="typology_{{$typology->id}}" value={{$typology->id}} {{in_array($typology->id, old('typologies'))?'checked':''}}>
                                                <label class="custom-control-label" for="typology_{{$typology->id}}">{{$typology->name}}</label>
                                            </div>
                                        @else
                                            <div class="custom-control custom-checkbox">
                                                <input name="typologies[]" type="checkbox" class="custom-control-input control-check" id="typology_{{$typology->id}}" value={{$typology->id}} {{$user->typologies->contains($typology->id)?'checked':''}}  >
                                                <label class="custom-control-label" for="typology_{{$typology->id}}">{{$typology->name}}</label>
                                            </div>
                                        @endif

                                    @endforeach
                                </div>
                            </div>
                            
                        </div>


                        <div class="form-group row my-2 ">
                            <div class="col-md-8 offset-md-2 ">
                                <div class="row">
                                    <div class="col-6">
                                        <button class="btn btn-primary w-100" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                            Cambia password
                                        </button>
                                    </div>
                                    <div class="col-6">
                                        <button id="register" type="submit" class="btn btn-primary w-100">
                                            Salva cambiamenti
                                        </button>
                                    </div>
                                </div>
                                
                            </div>
                            
                        </div>
                        
                        

                        <div class="collapse" id="collapseExample">
                            <div class="card card-body col-md-8 offset-md-2 mt-2">
                                <h3>Cambio Password</h3>
                                <div class="form-group">
                                    <label for="new_password">Password (lasciare vuoto per non aggiornare)</label>
                                    <input type="password" class="form-control" id="new_password" name="new_password">
                                </div>
        
                                <div class="form-group">
                                    <label for="new_password_confirmation">Conferma Password</label>
                                    <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation">
                                </div>
                            </div>
                        </div>

            
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
