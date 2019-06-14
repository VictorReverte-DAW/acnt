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
    <script src="https://code.jquery.com/jquery-3.4.0.min.js"integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    
    <script type="text/javascript" src="{{asset('js/jspdf.min.js')}}" ></script>
    <script src="{{asset('js/miscript/ajax.js')}}" ></script>
    <script src="{{asset('js/miscript/script.js')}}" ></script>
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Plantilla--->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <link href="{{ asset('css/plantilla/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/plantilla/slicknav.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/plantilla/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/plantilla/magnific-popup.css') }}" rel="stylesheet">
    <link href="{{ asset('css/plantilla/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('css/plantilla/style.css') }}" rel="stylesheet">
	<link href="{{ asset('css/plantilla/responsive.css') }}" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
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
<div class="flex-center position-ref full-height session">
    <form method="POST" action="{{ route('login') }}">
               @csrf

            <div id="session_table">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                  </div>
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus placeholder="Correo Electronico">

                     @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                    @endif
                </div>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-lock-open"></i></span>
                  </div>
                  <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Contraseña">

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                </div>
                <div class="row">
            <div class="col-12">
                <button id="login" class="btn btn-lg btn-block btn-custom">  {{ __('Iniciar Sesion') }}</button>
              </div>
             
              </div>
            </div>
            </form>
                    <!--Plantilla-->
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
