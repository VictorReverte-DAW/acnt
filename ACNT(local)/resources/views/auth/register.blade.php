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
    <!--Plantilla-->
    <link href="{{ asset('css/plantilla/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/plantilla/slicknav.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/plantilla/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/plantilla/magnific-popup.css') }}" rel="stylesheet">
    <link href="{{ asset('css/plantilla/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('css/plantilla/style.css') }}" rel="stylesheet">
	<link href="{{ asset('css/plantilla/responsive.css') }}" rel="stylesheet">
    
</head>

<body>
<div id="app">
<div id="preloder">
		<div class="loader"></div>
	</div>
<header class="header-section">
		<div class="header-warp">
			<div class="header-bar-warp d-flex">
				<!-- site logo -->
				<a href="/" class="site-logo">
					<img src="./img/logo.png" alt="">
				</a>
                
				<nav class="top-nav-area w-100">
                @guest
					<div class="user-panel">
						<a href="{{ route('login') }}">Iniciar Sesion</a> /
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Registrar</a>
					</div>
                    <ul class="main-menu primary-menu">
                    <li><a href="{{ url('Juegos/') }}">Juegos</a></li>
						<li><a href="{{ url('Torneos/') }}">Torneos</a></li>
                    @endif
                    @else
					<!-- Menu -->
                      
                        @if(Auth::user()->id_rol != 6 || Auth::user()->dni=='77855599R')
						<li><a href="{{ url('listaUsuarios/')}}">Lista de miembro</a></li>
						<li><a href="{{ url('reuniones/') }}">Reuniones</a>
						<li><a href="{{ url('contabilidad/') }}">Contabilidad</a>
							<ul class="sub-menu">
								<li><a href="game-single.html">Contabilidad</a></li>
								<li><a href="game-single.html">Movimientos</a></li>
							</ul>
						</li>
                        <li><a href="games.html">{{ Auth::user()->nick }}</a>
							<ul class="sub-menu">
								<li><a href="{{ url('home/') }}">  {{ __('Perfil') }}</a></li>
								<li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar Sesion') }}
                                    </a></li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
							</ul>
						</li>
                        </ul>
                        @endif
                        
                    @endguest
				</nav>
            
			</div>
		</div>
	</header>
    <div class="session">
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
        </div>
        <script src="https://code.jquery.com/jquery-3.4.0.min.js"
        integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg=" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="{{ asset('js/plantilla/jquery.slicknav.min.js') }}"></script>
    <script src="{{ asset('js/plantilla/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/plantilla/jquery.sticky-sidebar.min.js') }}"></script>
    <script src="{{ asset('js/plantilla/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('js/plantilla/main.js') }}"></script>
        </body>
</html>