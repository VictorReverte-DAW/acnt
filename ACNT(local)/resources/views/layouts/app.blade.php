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

     <!-- Fonts -->
     <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
      <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.4.0.min.js"integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    
    <script type="text/javascript" src="{{asset('js/jspdf.min.js')}}" ></script>
    <script src="{{asset('js/miscript/ajax.js')}}" ></script>
    <script src="{{asset('js/miscript/script.js')}}" ></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script>
    $(document).ready(function() {
        obtenerFechaCuota();
        editar();
        crearTorneo();
        añadirPunto();
        borrarPunto();
        actualizarJuego();
        actualizarTorneo();
        actualizarReunion();

    });
    function generarPDF(){
    var doc = new jsPDF()
      doc.fromHTML($('#acta').get(0),20,20,{
          'width':155},
     
          );
      
      doc.save('Acta de la reunion.pdf')
  }
    </script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
     <!-- Plantilla--->    
    <link href="{{ asset('css/plantilla/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/plantilla/slicknav.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/plantilla/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/plantilla/magnific-popup.css') }}" rel="stylesheet">
    <link href="{{ asset('css/plantilla/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('css/plantilla/style.css') }}" rel="stylesheet">
	<link href="{{ asset('css/plantilla/responsive.css') }}" rel="stylesheet">
    
</head>

<body>

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
					<ul class="main-menu primary-menu">
                    <li><a href="{{ url('Juegos/') }}">Juegos</a></li>
						<li><a href="{{ url('Torneos/') }}">Torneos</a></li>
					<!-- Menu -->
					@if(Auth::user()->id_rol != 6 || Auth::user()->dni=='77855599R')
					
						<li><a href="{{ url('listaUsuarios/')}}">Lista de miembro</a></li>
						<li><a href="{{ url('reuniones/') }}">Reuniones</a>
						<li><a href="{{ url('contabilidad/') }}">Contabilidad</a></li>
						@endif
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
                        
                        
                    @endguest
				</nav>
            
			</div>
		</div>
	</header>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>