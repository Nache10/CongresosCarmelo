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
    <style>
      .hero-wrap .overlay {

        background: #f200ff;
        background: -moz-linear-gradient(45deg, #1d4bce 0%, #4b6725 100%);
        background: -webkit-gradient(left bottom, right top, color-stop(0%, #1d4bce), color-stop(100%, #4b6725));
        background: -webkit-linear-gradient(45deg, #1d4bce 0%, #4b6725 100%);
        background: linear-gradient(45deg, #1d4bce 0%, #4b6725 100%);
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#1d4bce', endColorstr='#4b6725', GradientType=1 );
    }

    form{
      display:flex;
      flex-wrap:wrap;
      justify-content:center;
      align-items:center;
    }
    form>*{
      width:50%;
      margin-bottom:20px;
    }
    input[type="submit"]{
      width:100%;
      cursor:pointer;
    }
    input[type="password"]{
      padding-left:8px;
    }
    .modal-body h5{
      width:100%;
      text-align:center;
      margin-top:20px;
      margin-bottom:50px;
    }
    </style>
  </head>
  <body>
    
	  <nav class="navbar px-md-0 navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active dropdown">
	            <a class="nav-link">Hola {{Auth::user()->name}}
	              <ul class="dropdown-menu">
	                <li class="nav-item active btn" data-toggle="modal" data-target="#ResetPassModal">Reset Password</li>
                  <li class="nav-item active btn"><a class="nav-link text-dark" href="{{url('profile')}}">View Profile</a></li>
	              </ul>
	            </a>
	          </li>
	          <li class="nav-item active"><a href="{{url('/home')}}" class="nav-link">Home</a></li>
	          @if( Auth::user()->type == 'ponente' )
            <li class="nav-item active"><a class="nav-link btn" data-toggle="modal" data-target="#PonenciaModal">Añadir Ponencia</a></li>
            @endif
	          @if( Auth::user()->type == 'admin' || Auth::user()->type == 'comite')
	          <li class="nav-item active dropdown">
	            <a class="nav-link">Admin Stuff
	              <ul class="dropdown-menu">
	                <li class="nav-item active btn" data-toggle="modal" data-target="#CongresoModal">Añadir Congreso</li>
	                <li class="nav-item active btn" data-toggle="modal" data-target="#AltaUserModal">Alta de usuarios</li>
	              </ul>
	            </a>
	          </li>
	          @endif
	          <li class="nav-item active"><a href="#" class="nav-link postlogoutA">Log out</a></li>
	          <form class="postlogout" action="{{url('logout')}}" method="POST" >
	              @csrf
  	          </form>
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
            @if(Auth::user()->type == 'asistente')
              @isset($varpago)
                @if(!$varpago)
                  <div class="alert alert-danger" role="alert">
                      Aún no has hecho el pago por el congreso. Accede a tu perfil para rellenarlo.
                  </div>
                @elseif($varpago)
                  <div class="alert alert-warning" role="alert">
                      Pago pendiente de verificacion
                  </div>
                @endif
              @endisset
            @endif
            
            @isset($congress)
              @if($congress == 'ok')
                <div class="alert alert-success" role="alert">
                    Congreso iniciado!
                </div>
              @elseif($congress == 'notok')
                <div class="alert alert-warning" role="alert">
                    ya existe un congreso!
                </div>
              @endif
            @endisset
            
            @isset($ealta)
              @if($ealta == 'ok')
                <div class="alert alert-success" role="alert">
                    Alta realizada!
                </div>
              @elseif($ealta == 'notok')
                <div class="alert alert-warning" role="alert">
                    Error al dar de alta el usuario!
                </div>
              @endif
            @endisset

            @isset($resetpass)
              <div class="alert alert-danger" role="alert">
                  fallo al resetear contraseña
              </div>
            @endisset
            @isset($eponencia)
              <div class="alert alert-danger" role="alert">
                  ya existe una ponencia con ese nombre o esa url
              </div>
            @endisset
            @isset($gponencia)
              <div class="alert alert-success" role="alert">
                  ponencia creada con exito
              </div>
            @endisset
            @yield('content')
            @if(!\Request::is('login') && !\Request::is('register'))  
          	<h2 class="subheading">Hola {{Auth::user()->name}}</h2>
          	<h1 class="mb-4 mb-md-0">{{$congreso->titulo}}</h1>
          	<h3 class="mb-4 mb-md-0 text-white"> El precio por asistente es de: {{$congreso->precio}} €</h3>
          	<br><br>

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


@if($varpago === null)
<section class="ftco-section">
   		<div class="container">
   			<div class="row">
   				@foreach($ponencias as $ponencia)
            <div class="col-md-12">
             <div class="case">
             	<div class="row">
             		<div class=" col-md-6 col-lg-6 col-xl-8 d-flex" >
             			<a class="img w-100 mb-3 mb-md-0" style="background-image: url({{url('assets/images/image_1.jpg')}});"></a>
             		</div>
             		<div class="col-md-6 col-lg-6 col-xl-4 d-flex">
             			<div class="text w-100 pl-md-3">
             				<span class="subheading">Tematica</span>
             				<h2><a>{{$ponencia->titulo}}</a></h2>
             				<ul class="media-social list-unstyled">
                      <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                      <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                      <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                    </ul>
             				<div class="meta">
             					<p class="mb-0"><a href="#">11/13/2019</a> | <a href="#">12 min read</a></p>
             				</div>
             				<p>Click para iniciar la ponencia</p>
 			    					<a href="{{$ponencia->video}}" class="ponencia icon-video popup-vimeo d-flex justify-content-center align-items-center" data-idponencia="{{$ponencia->id}}" data-iduser="{{Auth::user()->id}}">
          						<span class="icon-play"></span>
          					</a>
             			</div>
             		</div>
             	</div>
             </div>
            </div>
            @endforeach
   			</div>
   		</div>
   	</section>
  @endif



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
  <script>
      var genericAjax = function (url, data, type, callBack) {
            $.ajax({
                url: url,
                data: data,
                type: type,
                dataType : 'json', // fuerza que la devolución no sea en texto sino json
            })
            .done(function( respuestaDeLaPaginaWebQueHeSolicitado ) {   // Suele ser texto, pero carmelo ha hecho que la llamada te devuelva un 
                                                                        // json(variable con formato json).
                console.log('ajax done');
                callBack( respuestaDeLaPaginaWebQueHeSolicitado );
            })
            .fail(function( xhr, status, errorThrown ) {
                console.log('ajax fail');
            })
            .always(function( xhr, status ) {
                console.log('ajax always');
            });
      };
  
  
      $('.postlogoutA').click(function(){
          $('.postlogout').submit();
      });
      

      $('.icon-video').click(function(){
            var jsidponencia = $(this).attr('data-idponencia');
            var jsiduser = $(this).attr('data-iduser');

            genericAjax('gettokencsrf',null,'get',function(res){
              genericAjax('userponencia',{ iduser : jsiduser , idponencia : jsidponencia, _token : res.csrf_token },'post',function(response){
                if(response.guardado == 'ok'){
                  var vuelta = `<div class="alert alert-success" role="alert">
                                  Gracias por ver el video, mira tu corredo.
                              </div>`;
                  $('.ftco-animate').first().append(vuelta);
                } 
              });
            });
            
            
      });
      
  </script>
    
  </body>
</html>





<div class="modal fade" id="ResetPassModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <h5>Fill the form to reset the password</h5>
        <form action="{{url('resetpassword')}}" method="POST">
          @csrf
            <label for="currentpass">Current Password</label>
            <input type="password" placeholder="Current password" name="currentpass" id="currentpass">
            <label for="newpass">New Password</label>
            <input type="password" placeholder="New password" name="newpass" id="newpass">
            <label for="confirmpass">Confirm Password</label>
            <input type="password" placeholder="Confirm new password" name="confirmpass" id="confirmpass">
            <input type="submit" value="Reset">
        </form>
        
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="CongresoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <h5>Fill the form set a congress</h5>
        <form action="{{url('congreso')}}" method="POST">
          @csrf
            <label for="title">Title</label>
            <input type="text" placeholder="Set congress's title" name="titulo" id="titulo">
            <label for="descripcion">Description</label>
            <input type="text" placeholder="description" name="descripcion" id="descripcion">
            <label for="precio">Price</label>
            <input type="number" placeholder="Price" name="precio" id="precio">
            <input type="submit" value="Set Congreso">
        </form>
        
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="PonenciaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <h5>Fill the form set a ponencia</h5>
        <form action="{{url('ponencia')}}" method="POST">
          @csrf
            <label for="titulo">Title</label>
            <input type="text" placeholder="Title" name="titulo" id="titulo">
            <label for="video">Video</label>
            <input type="text" placeholder="video" name="video" id="video">
            <input type="submit" value="Set Ponencia">
        </form>
        
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="AltaUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <h5>Register new people</h5>
        <form action="{{url('/altausers')}}" method="POST">
          @csrf
            <label for="name">Name</label>
            <input type="text" placeholder="Name: " name="name" id="name">
            <label for="username">Username</label>
            <input type="text" placeholder="Username: " name="username" id="username">
            <label for="email">Email</label>
            <input type="email" placeholder="Email: " name="email" id="email">
            <label for="type">Type: </label>
            <select name="type">
              <option value="asistente" selected> </option> 
              <option value="asistente"> asistente </option> 
              <option value="ponente"> ponente </option> 
              <option value="comite"> comite </option> 
            </select>
            <input type="submit" value="Set User">
        </form>
        
      </div>
    </div>
  </div>
</div>