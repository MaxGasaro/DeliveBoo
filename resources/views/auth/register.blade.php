@extends('layouts.app')

@section('content')


{{-- NAVBAR --}}
<nav class="navbar navbar-expand-lg navbar-light bg-white navbar_container">
    <a href="#" class="logo">
        <img src="{{ asset('img/Deliveroo-Logo.jpg')}}" alt="Deliveboo Logo">
        <font color="#00ccbc"><b>Deliveboo</b></font>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Inizia
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="#">Consegna</a>
            <a class="dropdown-item" href="#">Ritiro</a>
            <a class="dropdown-item" href="#">Spesa</a>
          </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Servizi
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="#">Marketing</a>
              <a class="dropdown-item" href="#">Packaging</a>
              <a class="dropdown-item" href="#">Forniture</a>
              <a class="dropdown-item" href="#">Integrazione del Sistema di Cassa</a>
              <a class="dropdown-item" href="#">Fotografia</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Assistenza
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="#">Contattaci</a>
              <a class="dropdown-item" href="#">Aiuto</a>
              <a class="dropdown-item" href="#">Restaurant Hub</a>
              <a class="dropdown-item" href="#">COVID-19</a>
            </div>
          </li>
      </ul>
    </div>
  </nav>
{{-- FINE NAVBAR --}}


{{-- REGISTER SECTION --}}
<div class="background_top_container1">
    <div class="background_top_container2">

        <div class="container">
            <div class="row">
                <div class="col-md-7 text-secondary">
                    <div class="my-3">
                        <h1><font color="black">Diventa un partenr di Deliveboo</font></h1>
                        <p>Insieme possiamo aiutarti a raggiungere sempre più clienti</p>
                    </div>
                    <div class="card form_container">
                        <div class="card-header">{{ __('Register') }}</div>
        
                        <div class="card-body">
                            <form id="register-form" method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                                @csrf
        
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
        
                                <div class="form-group row">
                                    <label for="image" class="col-md-3 col-form-label">Restaurant Image</label>
        
                                    <div class="col-md-6">
                                        <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="null" >
        
                                        @error('image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="form-group row">
                                    <label for="name" class="col-md-3 col-form-label">Restaurant Name<strong>*</strong></label>
        
                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
        
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
        
        
        
                                <div class="form-group row">
                                    <label for="email" class="col-md-3 col-form-label">{{ __('E-Mail Address') }}<strong>*</strong></label>
        
                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
        
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="form-group row">
                                    <label for="address" class="col-md-3 col-form-label">{{ __('address') }}<strong>*</strong></label>
        
                                    <div class="col-md-6">
                                        <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address">
        
                                        @error('address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="form-group row">
                                    <label for="p_iva" class="col-md-3 col-form-label">P.IVA<strong>*</strong></label>
        
                                    <div class="col-md-6">
                                        <input id="p_iva" type="text" pattern="[0-9]+" maxlength="11" minlength="11" class="form-control @error('p_iva') is-invalid @enderror" name="p_iva" value="{{ old('p_iva') }}" required autocomplete="p_iva">
                                        <small>Deve essere composta da 11 numeri</small>
                                        @error('p_iva')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="form-group row">
                                    <label for="owner" class="col-md-3 col-form-label">{{ __('owner') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="owner" type="text" class="form-control @error('owner') is-invalid @enderror" name="owner" value="{{ old('owner') }}"  autocomplete="owner">
        
                                        @error('owner')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="form-group row">
                                    <label for="typology_list" class="col-md-3 col-form-label">Typologies<strong>*</strong>
                                        <small class="d-block">Flaggare almeno 1</small>
                                    </label>
                                    
                                    
                                    <div class="col-md-6 pl-5">
                                        <div class="row row-cols-2 flex-wrap">
                                            @foreach ($typologies as $typology)
                                            <div class="col align-content-stretch">
                                                <input class="form-check-input control-check" type="checkbox" name="typologies[]" id="typolgy_{{$typology->id}}" {{in_array($typology->id, old("typologies", [])) ? 'checked' : ''}} value="{{$typology->id}}">
                                                    <label class="form-check-label" for="typolgy_{{$typology->id}}">{{$typology->name}}</label>    
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    
                                </div>
        
                                
                                <div class="form-group row">
                                    <label for="password" class="col-md-3 col-form-label">{{ __('Password') }}<strong>*</strong></label>
        
                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password" required onChange="onChange()">
        
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="form-group row">
                                    <label for="password-confirm" class="col-md-3 col-form-label">{{ __('Confirm Password') }}<strong>*</strong></label>
        
                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password" required onChange="onChange()">
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <div class="my-3 col-md-7 text-left">
                                        <strong>I campi contrassegnati(*) sono obbligatori</strong>
                                    </div>
                                </div>
        
                                <div class="form-group row">
                                    <div class="col-md-8">
                                        <button id="register" type="submit" class="btn w-50 text-white btn_green">
                                           <b>{{ __('Register') }}</b>
                                        </button>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-12 oofset-md-3 terms_and_conditions">
                                        <p class="mt-3">Cliccando "Register" dichiaro di aver letto e compreso i <a href="#"><b><font color="#7a7d7d">termini e condizioni di Deliveboo per i ristoranti</font></b></a>.</p>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- FINE REGISTER SECTION --}}
@endsection
