<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ACNTÁGUILAS</title>



    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
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
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

</head>

<body>
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
					<ul class="main-menu primary-menu">
                    <li><a href="{{ url('Juegos/') }}">Juegos</a></li>
						<li><a href="{{ url('Torneos/') }}">Torneos</a></li>
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
    <!-- Hero section -->
	<section class="hero-section overflow-hidden">
		<div class="hero-slider owl-carousel">
			<div class="hero-item set-bg d-flex align-items-center justify-content-center text-center" data-setbg="img/bd2.jpg">
				<div class="container">
				<h2>Comienza el juego</h2>
					<p>Apunte a nuestros torneos y gana distintos premios </p>
				</div>
			</div>
		</div>
	</section>
	<!-- Hero section end-->
    <!-- Intro section -->
	<section class="intro-section">
		<div class="container">
			<h1 class="intro-text-box text-box text-white text-center">ACNTÁGUILAS</h1>
			<p class="text-center">ACNTÁGUILAS son las siglas de "Asociacion Cultural y de las nuevas tecnologias de Águilas".<br>
			Somos una asociacion que tenemos como objetivo la realizacion de eventos, como:
			</p>
			<div class="row" style="margin-top: 52px">
				<div class="col-md-4">
					<div class="intro-text-box text-box text-white">
						<h3 class="text-center">Torneos</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida....</p>
					</div>
				</div>
				<div class="col-md-4">
					<div class="intro-text-box text-box text-white">
						<h3 class="text-center">Lan_Party</h3>
						<p>Ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum  labore suspendisse ultrices gravida....</p>
					</div>
				</div>
				<div class="col-md-4">
					<div class="intro-text-box text-box text-white">
						<h3 class="text-center">Eventos</h3>
						<p>Sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida ncididunt ut labore ....</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Intro section end -->


	<!-- Blog section -->
	<section class="blog-section spad">
		<div class="container">
			<div class="row">
				<div class="col-xl-9 col-lg-8 col-md-7">
					<div class="section-title text-white">
						<h2>Eventos realizados</h2>
					</div>
					<!-- Blog item -->
					<div class="blog-item">
						<div class="blog-thumb">
							<img src="./img/blog/1.jpg" alt="">
						</div>
						<div class="blog-text text-box text-white">
							<h3>Lan Party</h3>
							<p>Lan Party en ÁGUILAS, participa en todo tipo de juegos como, Fornite, league of legend, y ganas grandes premios todo patrocinado por "logodesbloqueado".<br>
							Ubicado en la casa de la Juventud de Águilas</p>
						</div>
					</div>
					<!-- Blog item -->
					<div class="blog-item">
						<div class="blog-thumb">
							<img src="./img/blog/2.jpg" alt="">
						</div>
						<div class="blog-text text-box text-white">
							<h3>Torneo de Hearthstone</h3>
							<p>Participa en el torneo de hearstone y gana premios.Ádemas por participar ganaras
								la skin de "Nemesis" para totalmente gratuito<br>
								Ubicado en la teteria "Pandora" en la terza de  "Centro Comercial Águilas Plaza"
							</p>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-lg-4 col-md-5 sidebar">
					<div id="stickySidebar">
						<div class="widget-item">
							<h4 class="widget-title">Redes Sociales</h4>
							<div class="trending-widget">
								<div class="tw-item">
									<div class="tw-text">
										
										<h5 clas="align-items-center"><img src="./img/icons/Redes/instagram.svg" alt="#" style="width: 10%;display: inline-flex;    margin-right: 6%;"><a href="https://www.instagram.com/acntaguilas/" class="text-white" style="text-decoration:none;">Instagram</a></h5>
									</div>
								</div>
								<div class="tw-item">
									<div class="tw-text">
										<h5 clas="align-items-center"><img src="./img/icons/Redes/twitter.svg" alt="#" style="width: 10%;display: inline-flex;    margin-right: 6%;"><a href="https://twitter.com/AcntAguilas" class="text-white" style="text-decoration:none;">Twitter</a></h5>
									</div>
								</div>
								<div class="tw-item">
									<div class="tw-text">
										<h5 clas="align-items-center"><img src="./img/icons/Redes/email.svg" alt="gmail" style="width: 10%;display: inline-flex;    margin-right: 6%;">acntaguilas@gmail.com
</h5>
									</div>
								</div>
						</div>
					</div>
				</div>
			</div>
		
		</div>
	</section>
	<!-- Blog section end -->
	<section>
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3169.1559468924065!2d-1.5751801843550284!3d37.40978874084649!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd64c91c0ac695bf%3A0xa1833723dbc53b07!2sEstacion+Autobuses+Aguilas!5e0!3m2!1ses!2ses!4v1560475679446!5m2!1ses!2ses" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
	</section>
	<!-- Footer section -->
	<footer class="footer-section">
			<div class="copyright"><a href="">Victor Reverte Gomez</a> 2019 @ All rights reserved</div>
		</div>
	</footer>
        <!--Plantilla-->
        <script src="https://code.jquery.com/jquery-3.4.0.min.js"
        integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg=" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
 
    <script src="{{ asset('js/plantilla/jquery.slicknav.min.js') }}"></script>
    <script src="{{ asset('js/plantilla/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/plantilla/jquery.sticky-sidebar.min.js') }}"></script>
    <script src="{{ asset('js/plantilla/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('js/plantilla/main.js') }}"></script>
      <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/script.js') }}"></script>


</body>

</html>