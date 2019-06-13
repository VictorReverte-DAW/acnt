<?php
use Illuminate\Support\Facades\DB;
?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'ACNTÁGUILAS') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.4.0.min.js"
        integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>

    <script type="text/javascript" src="{{asset('js/jspdf.min.js')}}"></script>
    <script src="{{asset('js/miscript/ajax.js')}}"></script>
    <script src="{{asset('js/miscript/script.js')}}"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>
<div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/welcome') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Right Side Of Navbar -->
                     <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('Juegos/') }}">Juegos</a>
                    </li>  
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('Torneos/') }}">Torneos</a>
                    </li>
                    <!-- Authentication Links -->
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar Sesion') }}</a>
                    </li>
                    @if (Route::has('register'))
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Registrarse') }}</a>
                    </li>
                    @endif
                    @else
                    @if(Auth::user()->id_rol != 6 || Auth::user()->dni=='77855599R')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('listaUsuarios/') }}">Registrar miembro</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('reuniones/') }}">Reuniones</a>
                    </li>
                    <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            Contabilidad
                        </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ url('contabilidad/') }}">
                                Cuotas
                            </a>
                            <a class="dropdown-item" href="#">
                               Registro
                            </a>
                        </div>
                    </li>
                    @endif
                  
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->nick }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ url('home/') }}">
                                {{ __('Perfil') }}
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Cerrar Sesion') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest
                </ul>
                </div>
            </div>
        </nav>
    <div class=" session" style="margin-top: 3%;">
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group row justify-content-center">
                
                   <span class="col-md-1 col-form-label text-md-right input-group-text">{{ __('DNI') }}</span>
               
                <div class="col-md-6">
                    <input id="dni" type="text" class="form-control{{ $errors->has('dni') ? ' is-invalid' : '' }}"
                        name="dni" value="{{ old('dni') }}" required autofocus>
                </div>
            </div>
            <div class="form-group row justify-content-center">
                <label for="Nick" class="col-md-1 col-form-label text-md-right input-group-text">Nick de <br> usuario</label>

                <div class="col-md-6">
                    <input id="nick" type="text" class="form-control{{ $errors->has('nick') ? ' is-invalid' : '' }}"
                        name="nick" value="{{ old('nick') }}" required autofocus>

                    @if ($errors->has('nick'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('nick') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group row justify-content-center">
                <label for="name" class="col-md-1 col-form-label text-md-right input-group-text">{{ __('Nombre') }}</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                        name="name" value="{{ old('name') }}" required autofocus>

                    @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group row justify-content-center">
                <label for="apellido" class="col-md-1 col-form-label text-md-right input-group-text">{{ __('Apellido') }}</label>

                <div class="col-md-6">
                    <input id="apellido" type="text"
                        class="form-control{{ $errors->has('apellido') ? ' is-invalid' : '' }}" name="apellido"
                        value="{{ old('apellido') }}" required autofocus>

                    @if ($errors->has('apellido'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('apellido') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row justify-content-center">
                <label for="email" class="col-md-1 col-form-label text-md-right input-group-text">Correo <br> Electronico</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                        name="email" value="{{ old('email') }}" required>

                    @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row justify-content-center">
                <label for="password" class="col-md-1 col-form-label text-md-right input-group-text">{{ __('Contraseña') }}</label>

                <div class="col-md-6">
                    <input id="password" type="password"
                        class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                        required>

                    @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('Contraseña') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row justify-content-center">
                <label for="password-confirm"
                    class="col-md-1 col-form-label text-md-right input-group-text">Confirmar <br> contraseña</label>

                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                        required>
                </div>
            </div>
            <div class="form-group row justify-content-center">
                <label for="Provincia" class="col-md-1 col-form-label text-md-right input-group-text">{{ __('Provincia') }}</label>
                <div class="col-md-6">
                    <input id="provincia" type="text" class="form-control" name="provincia" required>
                </div>
            </div>
            <div class="form-group row justify-content-center">
                <label for="Localidad" class="col-md-1 col-form-label text-md-right input-group-text">{{ __('Localidad') }}</label>
                <div class="col-md-6">
                    <input id="localidad" type="text" class="form-control" name="localidad" required>
                </div>
            </div>
            <div class="form-group row justify-content-center">
                <label for="Codigo Postal"
                    class="col-md-1 col-form-label text-md-right input-group-text">{{ __('Codigo Postal') }}</label>
                <div class="col-md-6">
                    <input id="cp" type="number" class="form-control" name="cp" required>
                </div>
            </div>
            <div class="form-group row justify-content-center">
                <label for="Telefono" class="col-md-1 col-form-label text-md-right input-group-text">{{ __('Telefono') }}</label>
                <div class="col-md-6">
                    <input id="telefono" type="number" class="form-control" name="telefono" minlength=9 maxlength=9
                        required>
                </div>
            </div>
            <div class="form-group row justify-content-center">
                <label for="Fecha Nacimiento"
                    class="col-md-1 col-form-label text-md-right input-group-text">Fecha<br> Nacimiento</label>
                <div class="col-md-6">
                    <input id="fnac" type="date" class="form-control" name="fnac" required>
                </div>
            </div>

            <input id="id_rol" type="hidden" class="form-control" name="id_rol" value=6 min=6 max=6>

            <input id="esMiembro" type="hidden" class="form-control" name="esMiembro">
            <div class="form-group row justify-content-center">
            <div class="row">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-lg btn-block btn-custom">
                        {{ __('Registrarse') }}
                    </button>
                </div>
            </div>
            </div>
        </form>