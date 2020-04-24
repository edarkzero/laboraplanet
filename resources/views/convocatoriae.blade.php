<!DOCTYPE html>
<html>

<head><meta http-equiv="Content-Type" content="text/html; charset=euc-jp">


  <title>LaboraPlanet</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Theme CSS -->
  <link rel="stylesheet" type="text/css" href="assets/skin/default_skin/css/theme.css">
  <!-- Admin Forms CSS -->
  <link rel="stylesheet" type="text/css" href="assets/admin-tools/admin-forms/css/admin-forms.css">
  <!-- Favicon -->
  <link rel="shortcut icon" href="{{ asset('img/siosi3.png')}}" style="width=100%;">


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

 <link rel="stylesheet" type="text/css" href=" {{ asset('vendor/plugins/select2/css/select2.css')}}">
<script type="text/javascript">




function mostrarPassword(){
 var cambio = document.getElementById("password");
 if(cambio.type == "password"){
 cambio.type = "text";
 $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
 }else{
 cambio.type = "password";
 $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
 }
 }

 function mostrarPassword2(){
 var cambio2 = document.getElementById("password_confirmation");
 if(cambio2.type == "password"){
 cambio2.type = "text";
 $('.icon2').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
 }else{
 cambio2.type = "password";
 $('.icon2').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
 }
 }



</script>
</head>

<body class="external-page sb-l-c sb-r-c">


  <!-- Start: Main -->
  <div id="main" class="animated fadeIn">

    <!-- Start: Content-Wrapper -->
    <section id="content_wrapper">

      <!-- begin canvas animation bg -->
      <div id="canvas-wrapper">
        <canvas id="demo-canvas"></canvas>
      </div>
      <!-- Begin: Content -->
      <section id="content">
          <div class="col-xs-1" style="width: 150px;">
                <a href="{{ route('index') }} " type="button" class=" button btn btn-rounded btn-info btn-block"><span class="glyphicon glyphicon-arrow-left" style="right: 5%;"></span>@lang('admin.btnregresarl')</a>
            </div>
        <div class="admin-form theme-info mw700" style="margin-top: 3%;" id="login1">

          <div class="row mb15 table-layout">

            <div class="col-xs-6 va-m pln">
              <a href="dashboard.html" title="Return to Dashboard">
                <img src="assets/img/logos/LogoLabora.png" title="AdminDesigns Logo" class="img-responsive w250">
              </a>
            </div>

            <div class="col-xs-6 text-right va-b pr5" style="padding: 0;">
              <div class="login-links">
                <a href="login" class="" title="Sign In">@lang('admin.iniciarsesion')</a>
                <span class="text-white"> | </span>
                <a href="register" class="active" title="Register">@lang('admin.registrologin')</a>
              </div>

            </div>

          </div>
<form method="post" action="{{ route('register') }}" id="account2">
          <div class="panel panel-info mt10 br-n">

            <div class="panel-heading heading-border bg-white">
 <div class="row" style="margin-bottom: 15px">
  <div class="col-md-6 col-lg-3"></div>
  <div class="col-md-6 col-lg-3">
  <h3><input type="radio" name="combo" value="1" id="chcontratar" required>@lang('traduccion1.sub1register')  </h3>    
</div>
  <div class="col-md-6 col-lg-3">
  <h3><input type="radio" name="combo" value="2" id="chtrabajar" required>@lang('traduccion1.sub2register')</h3>   
</div>
<div class="col-md-6 col-lg-3"></div>
</div>               
                
              <div class="section row mn">
<!--               <div class="col-sm-4">
                  <a href="{{ route('social.auth','facebook') }}" class="button btn-social facebook span-left mr5 btn-block">
                    <span>
                      <i class="fa fa-facebook"></i>
                    </span>Facebook</a>
                </div> -->

                <div class="col-sm-4">
                  <!--<a href="<?php  echo $linkedin->getAuthUrl() ?>" class="button btn-social twitter span-left mr5 btn-block">
                    <span>
                      <i class="fa fa-linkedin"></i>
                    </span>LinkedIn</a>-->
                </div>
                <div class="col-sm-4">
<!--                 <a href="{{ route('social.auth','google') }}" class="button btn-social googleplus span-left btn-block">
                    <span>
                      <i class="fa fa-google-plus"></i>
                    </span>Google+</a> -->
                </div>
              </div>
            </div>

            

              {{ csrf_field() }}
              <div class="panel-body p25 bg-light">
                <div class="section-divider mt10 mb40">
                  <span>Crea tu cuenta para continuar, si eres usuario, <a href="{{route('login')}}">@lang('traduccion2.txtcreatucuentaconv2')</a></span>
                </div>
                <!-- .section-divider -->

                <div class="section row">
                  <div class="col-md-6">
                    <label for="firstname" class="field prepend-icon">
                      <input type="text" name="nombre" id="firstname" class="gui-input" placeholder="@lang('admin.nombresre')">
                      <label for="firstname" class="field-icon">
                        <i class="fa fa-user"></i>
                      </label>

                    </label>
                     @if ($errors->has('nombre'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
                                @endif
                  </div>
                  <!-- end section -->

                  <div class="col-md-6">
                    <label for="lastname" class="field prepend-icon">
                      <input type="text" name="apellido" id="lastname" class="gui-input" placeholder="@lang('admin.apellidosre')">
                      <label for="lastname" class="field-icon">
                        <i class="fa fa-user"></i>
                      </label>
                    </label>
                    @if ($errors->has('apellido'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('apellido') }}</strong>
                                    </span>
                                @endif
                  </div>
                  <!-- end section -->
                </div>
                <!-- end .section row section -->

                <div class="section">
                  <label for="email" class="field prepend-icon">

                    <input type="hidden" name="flag" id="flag" class="gui-input" value="2">
                    <input type="email" name="correo" id="email" class="gui-input" placeholder="@lang('admin.correore')">
                    <label for="email" class="field-icon">
                      <i class="fa fa-envelope"></i>
                    </label>
                  </label>
                  @if ($errors->has('correo'))
                                    <span class="help-block">
                                        <strong style="color: red;">{{ $errors->first('correo') }}</strong>
                                    </span>
                                @endif
                </div>

                <div class="section">
                     <label class="field ">
                          <select name="pais" id="pais" style="width:100%">
                              <option value=""></option>
                          @foreach($pais as $value)
                            <option value="{{$value->id_country}}">{{$value->name_country}}</option>
                          @endforeach
                          <select>
                          {{--
                             <input type="text" class="gui-input"  disabled style="font-weight: bolder" placeholder="{{ $pais }}">
                        <i class="arrow double"></i>
                          --}}
                    
                      </label>
               </div>




        <div class="section">
         <div class="input-group">
                <input id="password" name="password" type="password" class="form-control" placeholder="@lang('admin.ingresecontrare')">

           <div class="input-group-append">
            <button id="show_password" class="btn btn-primary" type="button" onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon"></span> </button>
               </div>
           </div>
             <b><p id="aqui" style="color: red;"></p></b>
        @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong style="color: red;">{{ $errors->first('password') }} </strong>
                                    </span>
                                @endif
        </div>

          <div class="section">
         <div class="input-group">
                <input id="password_confirmation" name="password_confirmation" type="password" class="form-control" placeholder="@lang('admin.repetircontrare')">
           <div class="input-group-append">
            <button id="show_password2" class="btn btn-primary" type="button" onclick="mostrarPassword2()"> <span class="fa fa-eye-slash icon2"></span> </button>
               </div>
           </div>

                </div>




                <div class="section mb15">
                <div id="foot" class="row" style="margin:0px auto; width:100%;">
            <input type="checkbox" id="terminos" name="terminos" required checked>
<a href="{{route('terminos')}}"  style="line-height: 13px;"> &nbsp;@lang('admin.aceptarterminosre')</a>

        </div>
                </div>
                <!-- end section -->

              </div>
              <!-- end .form-body section -->
              <div class="panel-footer clearfix">
                <button type="submit" class="button btn-primary pull-right">@lang('admin.btncrearcuenta')</button>
              </div>
              <!-- end .form-footer section -->
            </form>
          </div>
        </div>

      </section>
      <!-- End: Content -->

    </section>
    <!-- End: Content-Wrapper -->

  </div>
  <!-- End: Main -->

  <!-- BEGIN: PAGE SCRIPTS -->

  <!-- jQuery -->
  <script src="vendor/jquery/jquery-1.11.1.min.js"></script>
  <script type="text/javascript" src="select2/select2.min.js"></script>
   <script src="vendor/jquery/jquery_ui/jquery-ui.min.js"></script>


  <!-- CanvasBG Plugin(creates mousehover effect) -->
  <script src="vendor/plugins/canvasbg/canvasbg.js"></script>

  <!-- Theme Javascript -->
  <script src="assets/js/utility/utility.js"></script>

  <script src="assets/js/main.js"></script>

  <!-- Page Javascript -->
  <script type="text/javascript">
  jQuery(document).ready(function() {
    "use strict";
    // Init Theme Core
    Core.init();


    // Init CanvasBG and pass target starting location
    CanvasBG.init({
      Loc: {
        x: window.innerWidth / 2.1,
        y: window.innerHeight / 4.2
      },
    });

    $("#password").keyup(function(e){
        var texto = $("#password").val();

        if(texto.length >=6)
        {
          $("#aqui").html(" ");
        }
        else
        {
          $("#aqui").html("Contraseña debe tener al menos 6 caracteres");
        }
    });

$("#password").on('keydown', function(e) {
  var keyCode = e.keyCode || e.which;

  if (keyCode == 9) {
    e.preventDefault();

    $("#password_confirmation").focus();
  }
});




  });

 $("#pais").select2({placeholder:"Seleccione Pais"})

  </script>

  <!-- END: PAGE SCRIPTS -->

</body>

</html>
