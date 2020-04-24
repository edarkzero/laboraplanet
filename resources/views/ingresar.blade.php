<!DOCTYPE html>
<html>

<head>
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Font CSS (Via CDN) -->
{{-- <link rel="stylesheet" type="text/css" href="assets/fonts/glyphicons-pro/glyphicons-pro.css">  --}}
 {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> --}}
  <!-- Theme CSS -->
  <link rel="stylesheet" type="text/css" href="assets/skin/default_skin/css/theme.css">
  <link rel="stylesheet" type="text/css" href="vendor/plugins/slick/slick.css">
  <!-- Admin Forms CSS -->
  <link rel="stylesheet" type="text/css" href="assets/admin-tools/admin-forms/css/admin-forms.css">
  <!-- Favicon -->

  <link rel="shortcut icon" href="assets/img/favicon.ico">
</head>
<body class="external-page sb-l-c sb-r-c">
  <!-- Start: Main -->
  <div id="main" class="animated fadeIn">
    <!-- Start: Content-Wrapper -->
    <section id="content_wrapper" style="min-width: 100%;">
      <!-- begin canvas animation bg -->
      <div id="canvas-wrapper">
        <canvas id="demo-canvas"></canvas>
      </div>
      <!-- Begin: Content -->
      <section id="content">
          <div class="col-xs-1" style="width: 150px;">
                <a href="{{route('index')}}" type="button" class=" button btn btn-rounded btn-info btn-block"><span class="glyphicon glyphicon-arrow-left" style="right: 5%;"></span>Regresar</a>
            </div>

        <div class="admin-form theme-info" id="login1">
          <div class="row mb15 table-layout">
            <div class="col-xs-6 va-m pln">
              <!-- <a href="dashboard.html" title="Return to Dashboard"> -->
                <img src="assets/img/logos/LogoLabora.png" title="LogoLabora Logo" class="img-responsive w250">
              <!-- </a> -->
            </div>
            <div class="col-xs-6 text-right va-b pr5">
              <div class="login-links">
                <a href="ingresar" class="active" title="Sign In">Iniciar sesión</a>
                <span class="text-white"> | </span>
                <a href="registrar" class="" title="Register">Registro</a>
                  <li class="dropdown menu-merge">
          <div class="navbar-btn btn-group">
            <button data-toggle="dropdown" class="btn btn-sm dropdown-toggle">
              @if($idioma == "es")
               <span class="flag-xs flag-es"></span>
              @endif

              @if($idioma == "en")
              <span class="flag-xs flag-us"></span>
              @endif

              @if($idioma == "por")
               <span><img src="{{asset('img/edit/br.gif')}}" alt="portugues"></span>
              @endif

              <span class="caret"></span>
            </button>
            <ul class="dropdown-menu pv5 animated animated-short flipInX" role="menu">
                <li>
                <a href="locale/es">
                  <span class="flag-xs flag-es"></span> Español - ES </a>
              </li>
              <li>
                <a href="locale/en">
                  <span class="flag-xs flag-us"></span> English - EN </a>
              </li>
              <li>
                <a href="locale/por">
                  <span><img src="{{asset('img/edit/br.gif')}}" alt="portugues"></span> Português - PT </a>
              </li>
            </ul>
          </div>
        </li>


              </div>
            </div>
          </div>
          <div class="panel panel-info mt10 br-n">
            <div class="panel-heading heading-border bg-white">
              <div class="section row mn">
                <div class="col-sm-4">
                  <a href="javascript:void(0);" class="button btn-social facebook span-left mr5 btn-block">
                    <span>
                      <i class="fa fa-facebook"></i>
                    </span>Facebook</a>
                </div>
                <div class="col-sm-4">
                  <a href="javascript:void(0);" class="button btn-social twitter span-left mr5 btn-block">
                    <span>
                      <i class="fa fa-linkedin"></i>
                    </span>LinkedIn</a>
                </div>
                <div class="col-sm-4">
                  <a href="javascript:void(0);" class="button btn-social googleplus span-left btn-block">
                    <span>
                      <i class="fa fa-google-plus"></i>
                    </span>Google+</a>
                </div>
              </div>
            </div>
            <!-- end .form-header section -->
            <form method="post" action="{{ route('login') }}">
                    {{ csrf_field() }}
              <div class="panel-body bg-light p30">
                <div class="row">
                  <div class="col-sm-7 pr30">
                    <div class="section">
                      <label for="username" class="field-label text-muted fs18 mb10">Correo electrónico</label>
                      <label for="username" class="field prepend-icon">
                        <input id="email" type="email" class="form-control" name="correo" value="{{ old('correo') }}" required autofocus placeholder="Ingrese su correo electrónico">
                        <label for="username" class="field-icon">
                          <i class="fa fa-user"></i>
                        </label>
                      </label>
                    </div>
                    <!-- end section -->
                    <div class="section">
                      <label for="username" class="field-label text-muted fs18 mb10">Contraseña</label>
                      <label for="pass" class="field prepend-icon">
                         <input id="password" type="password" class="form-control" name="pass" required placeholder="Ingrese su contraseña">

                        <label for="password" class="field-icon">
                          <i class="fa fa-lock"></i>
                        </label>
                      </label>
                    </div>
                    <!-- end section -->
                  </div>
                  <div class="col-sm-5 pr10">
          <!--               <h2 class="text-center"> Slider with Autoplay </h2> -->
                      <div class="slick-autoplay">
                        <div class="">
                          <img src="img/edit/1.jpg" width="100%" height="150.5px" style="background-color: ;margin-top: 6.5%;">
                        </div>
                        <div class="">
                          <img src="img/edit/2.jpg" width="100%" height="150.5px" style="background-color: ;margin-top: 6.5%;">
                        </div>
                        <div class="">
                          <img src="img/edit/3.jpg" width="100%" height="150.5px" style="background-color: ;margin-top: 6.5%;">
                        </div>
                    </div>
              </div>
                </div>
              </div>
              <!-- end .form-body section -->
              <div class="panel-footer clearfix p10 ph15">
                <button type="submit" class="button btn-primary mr10 pull-right">Iniciar sesión</button>
                <div class="form-group" style="text-align: left;">
                <a class="link" href="recuperarC" style="font-size: 16px; margin-top: 1%;">
                ¿Olvidaste tu contraseña?
                </a>
                </div>
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
   <style>
  /* demo slider styles */
    .slick-slide h1 {
    background: #FFF;
    border: 1px solid #DDD;
    /*width: 100%;*/
    height: 150px;
    /*height: 100%;*/
    line-height: 100%;
    /*margin: 15%;*/
    text-align: center;
    /*font-weight: 600%;*/
    /*font-size: 32px;  */
    color: #3498db;
  }
  </style>
  <!-- End: Main -->
  <!-- jQuery -->
  <script src="vendor/jquery/jquery-1.11.1.min.js"></script>
  <script src="vendor/jquery/jquery_ui/jquery-ui.min.js"></script>
  <!-- CanvasBG Plugin(creates mousehover effect) -->
  <script src="vendor/plugins/canvasbg/canvasbg.js"></script>
  <!-- Theme Javascript -->
  <script src="assets/js/utility/utility.js"></script>
  {{-- <script src="assets/js/demo/demo.js"></script> --}}
  <script src="assets/js/main.js"></script>
  <!-- Page Javascript -->
  <script src="vendor/plugins/slick/slick.js"></script>
  <script type="text/javascript">
  jQuery(document).ready(function() {
    // Init Theme Core
    Core.init();

    // Init CanvasBG and pass target starting location
    CanvasBG.init({
      Loc: {
        x: window.innerWidth / 2,
        y: window.innerHeight / 3.3
      },
    });

  });
      $('.slick-autoplay').slick({
      dots: true,
      slidesToShow: 1,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 800,
    });
  </script>
  <!-- END: PAGE SCRIPTS -->
</body>
</html>
