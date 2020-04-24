<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Theme CSS -->
  <link rel="stylesheet" type="text/css" href="assets/skin/default_skin/css/theme.css">
  <!-- Admin Forms CSS -->
  <link rel="stylesheet" type="text/css" href="assets/admin-tools/admin-forms/css/admin-forms.css">
  <!-- Favicon -->
  <link rel="shortcut icon" href="assets/img/favicon.ico">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script type="text/javascript">
function mostrarPassword(){
 var cambio = document.getElementById("txtPassword");
 if(cambio.type == "password"){
 cambio.type = "text";
 $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
 }else{
 cambio.type = "password";
 $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
 }
 } 
 
 $(document).ready(function () {
 //CheckBox mostrar contraseña
 $('#ShowPassword').click(function () {
 $('#Password').attr('type', $(this).is(':checked') ? 'text' : 'password');
 });
});
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
                <a href="{{ route('index') }} " type="button" class=" button btn btn-rounded btn-info btn-block"><span class="glyphicon glyphicon-arrow-left" style="right: 5%;"></span>Regresar</a>
            </div>
        <div class="admin-form theme-info mw700" style="margin-top: 3%;" id="login1">

          <div class="row mb15 table-layout">

            <div class="col-xs-6 va-m pln">
              <a href="dashboard.html" title="Return to Dashboard">
                <img src="assets/img/logos/LogoLabora.png" title="AdminDesigns Logo" class="img-responsive w250">
              </a>
            </div>

            <div class="col-xs-6 text-right va-b pr5">
              <div class="login-links">
                <a href="ingresar" class="" title="Sign In">Iniciar sesión</a>
                <span class="text-white"> | </span>
                <a href="registrar" class="active" title="Register">Registro</a>
              </div>

            </div>

          </div>

          <div class="panel panel-info mt10 br-n">

            <div class="panel-heading heading-border bg-white">
              <div class="section row mn">
                <div class="col-sm-4">
                  <a href="#" class="button btn-social facebook span-left mr5 btn-block">
                    <span>
                      <i class="fa fa-facebook"></i>
                    </span>Facebook</a>
                </div>
                <div class="col-sm-4">
                  <a href="#" class="button btn-social twitter span-left mr5 btn-block">
                    <span>
                      <i class="fa fa-linkedin"></i>
                    </span>LinkedIn</a>
                </div>
                <div class="col-sm-4">
                  <a href="#" class="button btn-social googleplus span-left btn-block">
                    <span>
                      <i class="fa fa-google-plus"></i>
                    </span>Google+</a>
                </div>
              </div>
            </div>

            <form method="post" action="{{ route('register') }}" id="account2">
       
              {{ csrf_field() }}
              <div class="panel-body p25 bg-light">
                <div class="section-divider mt10 mb40">
                  <span>Crear cuenta</span>
                </div>
                <!-- .section-divider -->

                <div class="section row">
                  <div class="col-md-6">
                    <label for="firstname" class="field prepend-icon">
                      <input type="text" name="nombre" id="firstname" class="gui-input" placeholder="Nombres...">
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
                      <input type="text" name="apellido" id="lastname" class="gui-input" placeholder="Apellidos...">
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
                    <input type="email" name="correo" id="email" class="gui-input" placeholder="Correo electrónico...">
                    <label for="email" class="field-icon">
                      <i class="fa fa-envelope"></i>
                    </label>
                  </label>
                  @if ($errors->has('correo'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('correo') }}</strong>
                                    </span>
                                @endif
                </div>
                <!-- end section -->

              <!--   <div class="section">
                  <div class="smart-widget sm-right smr-120">
                    <label for="username" class="field prepend-icon">
                      <input type="text" name="username" id="username" class="gui-input" placeholder="Nombre de usuario">
                      <label for="username" class="field-icon">
                        <i class="fa fa-user"></i>
                      </label>
                    </label>
                    <label for="username" class="button">.envato.com</label>
                  </div>
                
                </div> -->
                <!-- end section -->
                <div class="section">
                      <label class="field select">
                        <select id="language" name="language">
                          <option value="">Pais...</option>
                          <option value="EN">Perú</option>
                          <option value="FR">Chile</option>
                          <option value="SP">Brasil</option>
                          <option value="CH">Argentina</option>
                          <option value="JP">EE.UU</option>
                        </select>
                        <i class="arrow double"></i>
                      </label>
                    {{--   @if ($errors->has('nombre'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
                                @endif --}}
                    </div>


                <div class="section">
                  {{--<label for="password" class="field prepend-icon">
                    <input type="password" name="password" id="password" class="gui-input" placeholder="Contraseña">
                    <label for="password" class="field-icon">
                      <i class="fa fa-unlock-alt"></i>
                    </label>
                  </label>--}}

                     <input id="password" name="password" type="Password" Class="form-control"  placeholder="Contraseña">
                    <div class="input-group-append">
                    <button id="show_password" class="btn btn-primary" type="button" onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon"></span> </button>
                    </div>
                  @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                </div>



                <!-- end section -->

                <div class="section">
                  <label for="password-confirm" class="field prepend-icon">
                    <input type="password" name="password_confirmation" id="password-confirm" class="gui-input" placeholder="Repetir contraseña">
                    <label for="password-confirm" class="field-icon">
                      <i class="fa fa-lock"></i>
                    </label>
                  </label>
                </div>
                <!-- end section -->


                <div class="section mb15">
                <div id="foot" class="row" style="margin:0px auto; width:100%;">
            <input type="checkbox" id="terminos" name="terminos" checked>
            <a href="#" style="line-height: 13px;">Aceptar terminos y condiciones y la Política de privacidad de Laboraplanet.</a>

        </div>
                </div>
                <!-- end section -->

              </div>
              <!-- end .form-body section -->
              <div class="panel-footer clearfix">
                <button type="submit" class="button btn-primary pull-right">Crear cuenta</button>
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
  });
  </script>

  <!-- END: PAGE SCRIPTS -->

</body>

</html>
