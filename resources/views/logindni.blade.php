<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login DNI</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
  <!-- Favicon -->
  <link rel="shortcut icon" href="{{ asset('img/siosi3.png')}}" style="width=100%;">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">

		<div class="container-login100" style="background-image: url('img/edit/bg-01.jpg');">
		
			
			
			<div class="wrap-login100">

  @if(Auth::user()->pass_dinero <> null)

        @if($status = Session::get('status'))
        <div class="alert alert-success alert-dismissable" style="font-size: 12px;">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            <i class="fa fa-check pr10"></i>
               {{$status}}
        </div>
        @endif
				<form class="login100-form validate-form" method="POST">
				{{ csrf_field() }}
						
				<span class="login100-form-title p-b-43" >
						<img src="img/LogoLabora.png" alt="logo" width="100%" height="100%">
					</span>
				@if(isset($texto))
				<center>
				<div style="font-size: 17px;color:red">{{ $texto }}</div>
				</center>
				@endif
				@if(isset($error))
				<center>
				<div style="font-size: 17px;color:red">{{ $error }}</div>
				</center> 
				@endif



					<div class="wrap-input100 validate-input" data-validate = "Ingrese N° DNI">
						<input class="input100" type="text" name="username" placeholder="DNI">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Ingrese Contraseña">
						<input class="input100" type="password" name="pass" placeholder="@lang('admin.placeholcontrald')">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							@lang('admin.btningresarld')
						</button> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<a href="{{route('index')}}" class="login100-form-btn">
							< @lang('admin.btnregresld')
						</a>
		
					</div>
					<br/>
				<div >
				<!--	<a href="recuperarC" style="float: right;color: white">@lang('admin.btnolvidemild')</a>	-->				
				</div>
				</form>
				



  @else
<form class="login100-form validate-form" method="POST" action="generar_clave" id="clave_dinero">
				{{ csrf_field() }}
						
				<span class="" >
						<img src="img/LogoLabora.png" alt="logo" width="100%" height="100%">
					</span>


			{{-- <div> --}}
					<center><p style="color: white;">BIENVENIDO A LA OPCION DINERO!</p></center>
					<p style="color: white;">PARA PODER INGRESAR DEBES GENERAR TU CLAVE-DINERO, RECUERDA NO COMPARTIR TU CLAVE POR NINGUN MOTIVO</p>
			{{-- </div> --}}

				<br/>



				@if(isset($diferentes))<center>
				<div style="font-size: 17px;color:red;"><b>{{ $diferentes }}</b></div></center> <br/>
				@endif


				
					<div class="wrap-input100 validate-input" data-validate="Ingrese Contraseña">
						<input class="input100" type="password" name="pass" placeholder="@lang('admin.placeholcontrald')" required>
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Ingrese Contraseña">
						<input class="input100" type="password" name="pass_validate" placeholder="Confirmar Contraseña" required>
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Generar Clave
						</button> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<a href="{{route('index')}}" class="login100-form-btn">
							< @lang('admin.btnregresld')
						</a>
		
					</div>
					<br/>
				<div >
					<!--<a href="recuperarC" style="float: right;color: white">@lang('admin.btnolvidemild')</a>-->					
				</div>
				</form>
				

  @endif



			</div>


		</div>

	</div>

	

<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
	 
	<script src="{{ asset('js/notify.min.js')}}"></script>

	<script src="{{ asset('js/laborajs/logindinero.js') }}"></script>


</body>
</html>