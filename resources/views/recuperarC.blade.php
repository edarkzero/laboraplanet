<!DOCTYPE html>
<html>

<head>
    <!--<meta http-equiv="Content-Type" content="text/html; charset=gb18030">-->
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>LaboraPlanet</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="assets/skin/default_skin/css/theme.css">
  <link rel="stylesheet" type="text/css" href="assets/admin-tools/admin-forms/css/admin-forms.css">
  <!-- Favicon -->
  <link rel="shortcut icon" href="{{ asset('img/siosi3.png')}}" style="width=100%;">
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
      <section id="content" class="animated fadeIn">
        <div class="admin-form theme-info mw500" style="margin-top: 10%;" id="login">
          <div class="row mb15 table-layout">

            <div class="col-xs-6 pln">
              <a href="{{route('index')}}" title="Ir al Inicio">
                <img src="assets/img/logos/LogoLabora.png" class="img-responsive w250">
              </a>
            </div>

           <div class="col-xs-6 text-right va-b pr5">
              <div class="login-links">
                <a href="login" class="active" title="Sign In">Login</a>
                <span class="text-white"> | </span>
                <a href="register" class="" title="Register">@lang('traduccion1.sub1recuperarC')</a>
              </div>
            </div>
          </div>
          
          <!--<div id="paragif">-->
          <!--    <h1>HOLA MUNDO!</h1>-->
          <!--</div>-->
    
          <div class="panel panel-info heading-border br-n" id="1div">
            <div id="paragif" align="center" hidden>
                <br/>
                <img src="img/edit/estegif.gif" width="50%" height="50%">
            </div>

              <div class="panel-body p15 pt25" id="mostrar2" hidden>
                  <form id="update" method="POST" action="update_recuperar">
            <div class="panel-heading">
              <center><span class="panel-title"> @lang('traduccion1.sub2recuperarC')  </span></center>
           </div>                                       
                          <div class="section">
                            <div class="input-group">
                          <span class="input-group-addon">
                            <i class="fa fa-lock"></i>
                          </span>
                          <input class="form-control" id="new_pass" name="new_pass" type="password" required="" placeholder="Contraseña  nueva">
                        </div>
                          </div>
                          
                      <div class="section">
                            <div class="input-group">
                          <span class="input-group-addon">
                            <i class="fa fa-lock"></i>
                          </span>
                          <input class="form-control" id="new_pass_con" required="" name="new_pass_con" type="password" placeholder="Confirma tu nueva contraseña">
                        </div> 
                          </div>
                          <input type="text" name="correousu" id="correousu" hidden>
                      <div><center><button type="submit" class="btn btn-rounded btn-primary btn-block">@lang('traduccion1.sub3recuperarC')</button></center></div> 
                  </form>
              </div>


              <div class="panel-body p15 pt25" id="mostrar" hidden>
                <form id="confirm">

            <div class="panel-body" align="center">
              <p>@lang('traduccion1.sub4recuperarC')</p>
              <hr class="short alt">
              <p>@lang('traduccion1.sub5recuperarC')</p>                  
              <center><input type="text" name="" class="form-control" maxlength="8" id="codigo" style="text-align: center;width: 50%" placeholder="--------" required></center>
            </div>
            <div class=" text-right">
              <center><button class="btn btn-info" type="submit">@lang('admin.btnconfirmarcontrase')</button></center>
            </div>
            <br/>
            </form>
            <div class="text-left" id="reenvio">
              <i class="fa fa-info pr10"></i>
              <a href="javascript:void(0);" id="reenviar" data-correo="" onclick="envioemail(this);">@lang('traduccion1.sub6recuperarC')</a>
            </div>
              </div>
            <form  id="contact">
              <div class="panel-body p15 pt25">
                <div class="alert alert-micro alert-border-left alert-info pastel alert-dismissable mn">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <i class="fa fa-info pr10"></i> @lang('traduccion1.sub7recuperarC')
                </div>
              </div>
              <div class="panel-footer p25 pv15">
                <div class="section mn">
                  <div class="smart-widget sm-right smr-80">
                    <label for="email" class="field prepend-icon">
                      <input type="email" name="email" id="email" class="gui-input" placeholder="Tu correo electrónico" required>
                      <label for="email" class="field-icon">
                        <i class="fa fa-envelope-o"></i>
                      </label>
                    </label>
                    <button type='submit' for="email" class="button">@lang('traduccion1.sub8recuperarC')</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
          
          
        </div>
      </section>
    </section>
  </div>


  
  <script src="vendor/jquery/jquery-1.11.1.min.js"></script>
  <script src="vendor/jquery/jquery_ui/jquery-ui.min.js"></script>
  <script src="vendor/plugins/canvasbg/canvasbg.js"></script>
  <script src="assets/js/utility/utility.js"></script>
  <script src="assets/js/demo/demo.js"></script>
  <script src="assets/js/main.js"></script>
  <script src="js/laborajs/recuperarC.js"></script>
  <script src="{{ asset('js/notify.min.js')}}"></script>
  <script src="{{ asset('vendor/plugins/pnotify/pnotify.js')}}"></script>


  <!-- Page Javascript -->
<!--   <script type="text/javascript">
  jQuery(document).ready(function() {

    "use strict";

    // Init Theme Core      
    // Core.init();

    // Init Demo JS
    Demo.init();

    // Init CanvasBG and pass target starting location
    CanvasBG.init({
      Loc: {
        x: window.innerWidth / 2.1,
        y: window.innerHeight / 2.2
      },
    });

  });
  </script> -->

  <!-- END: PAGE SCRIPTS -->

</body>

</html>