<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Congresos Fancy Para Carmelo</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="{{url('assets/css/open-iconic-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/animate.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/aos.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/icomoon.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/style.css')}}">
  </head>
  <body>
    
	  <nav class="navbar px-md-0 navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active"><a href="{{url('/')}}" class="nav-link">Home</a></li>
  	          <li class="nav-item"><a href="{{ url('login') }}"  class="nav-link">Log In</a></li>
  	          <li class="nav-item"><a href="{{ url('register') }}" class="nav-link">Sign in</a></li>
  	            	          <!--<li class="nav-item active"><a href="#" class="nav-link postlogoutA">Log out</a></li>-->

	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->

    <div class="hero-wrap js-fullheight" style="background-image: url('{{url('assets/images/bg_1.jpg')}}');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
          <div class="col-md-12 ftco-animate">
            @isset($resetpass)
                <div class="alert alert-success" role="alert">
                    Contraseñida actualizada con exito
                </div>
            @endisset
            @isset($registro)
                <div class="alert alert-success" role="alert">
                    Registro completado checkea tu correo para saber la contraseñida.
                </div>
            @endisset
            @isset($verify)
                <div class="alert alert-warning" role="alert">
                    Tu correo no ha sido verificado. Sigue las instrucciones que hemos mandado a tu email.
                </div>
            @endisset
            @isset($alta)
                <div class="alert alert-success" role="alert">
                    Tu email ha sido dado de alta. No olvides cambiar la contraseñida al hacer login
                </div>
            @endisset
            @yield('content')
            @if(!\Request::is('login') && !\Request::is('register'))  
          	<h2 class="subheading">Hola Carmelo</h2>
          	<h1 class="mb-4 mb-md-0">Congresos</h1>
          	<div class="row">
          		<div class="col-md-7">
          			<div class="text">
	          			<p>Sitio de congresos para la clase de carmelo y un interminable texto que nunca acabarás de leer. no vale para nada, insisto, deberias parar de leer. Estoy haciendo relleno.</p>
	          			<div class="mouse">
							<a href="#" class="mouse-icon">
								<div class="mouse-wheel"><span class="ion-ios-arrow-round-down"></span></div>
							</a>
						</div>
					</div>
          		</div>
          	</div>
          	@endif
          </div>
        </div>
      </div>
    </div>

    <footer class="ftco-footer ftco-bg-dark ftco-section">
      <div class="container">
        
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="{{url('assets/js/jquery.min.js')}}"></script>
  <script src="{{url('assets/js/jquery-migrate-3.0.1.min.js')}}"></script>
  <script src="{{url('assets/js/popper.min.js')}}"></script>
  <script src="{{url('assets/js/bootstrap.min.js')}}"></script>
  <script src="{{url('assets/js/jquery.easing.1.3.js')}}"></script>
  <script src="{{url('assets/js/jquery.waypoints.min.js')}}"></script>
  <script src="{{url('assets/js/jquery.stellar.min.js')}}"></script>
  <script src="{{url('assets/js/owl.carousel.min.js')}}"></script>
  <script src="{{url('assets/js/jquery.magnific-popup.min.js')}}"></script>
  <script src="{{url('assets/js/aos.js')}}"></script>
  <script src="{{url('assets/js/jquery.animateNumber.min.js')}}"></script>
  <script src="{{url('assets/js/scrollax.min.js')}}"></script>
  <script src="{{url('assets/js/main.js')}}"></script>
    
  </body>
</html>