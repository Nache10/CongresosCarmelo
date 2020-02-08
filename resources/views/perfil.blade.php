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

    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
          <div class="col-md-9 ftco-animate pb-5 text-center">
            <h1 class="mb-3 bread">{{Auth::user()->name}}</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>{{Auth::user()->name}} <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section ftco-no-pt ftco-no-pb">
    	<div class="container">
    		<div class="row d-flex">
    			<div class="col-md-6 d-flex">
    			    
    			    @if(Auth::user()->img === 'default.jpg')
    				<div class="img img-video d-flex align-self-stretch align-items-center justify-content-center justify-content-md-end" style="background-image:url({{url('assets/images/default.jpg')}})">
    				@else 
    				<div class="img img-video d-flex align-self-stretch align-items-center justify-content-center justify-content-md-end" style="background-image:url({{url('assets/images/profilepics/'.Auth::user()->img)}})">
    				@endif
    				@if(Auth::user()->type === 'ponente')
    					<a href="https://vimeo.com/45830194" class="icon-video popup-vimeo d-flex justify-content-center align-items-center">
    						<span class="icon-play"></span>
    					</a>
    				@endif

    				</div>
    			</div>
    			<div class="col-md-6 pl-md-5 py-md-5">
    				<div class="row justify-content-start pt-3 pb-3">
		          <div class="col-md-12 heading-section ftco-animate">
		          	<span class="subheading">Welcome to Congresos</span>
		            <h2 class="mb-4">{{Auth::user()->name}}</h2>
                    <form action="{{url('/editprofile')}}" method="POST" enctype="multipart/form-data">
                      @csrf
                        <label for="name">Nombre</label>
                        <input type="text" placeholder="{{Auth::user()->name}}" value="{{Auth::user()->name}}" name="name" id="name">
                        <label for="username">Username</label>
                        <input type="text" placeholder="{{Auth::user()->username}}" value="{{Auth::user()->username}}" name="username" id="username">
                        <label for="email">Email</label>
                        <input type="email" placeholder="{{Auth::user()->email}}" value="{{Auth::user()->email}}" name="email" id="email">
                        <label for="foto">Foto de perfil</label>
                        <input type="file" name="foto" id="foto">
                				@if(Auth::user()->type === 'asistente' && $mostrar)
                				<label for="pago">Justificante de pago</label>
                        <input type="file" name="pago" id="foto">
                        @endif
                        <input type="hidden" value="{{Auth::user()->id}}" name="iduser">
                        <input type="submit" value="Editar Perfil">
                    </form>
		            
		          </div>
		        </div>
	        </div>
        </div>
    	</div>
    </section>

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
      $('.postlogoutA').click(function(){
          $('.postlogout').submit();
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
            <input type="submit" value="Set Congress">
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