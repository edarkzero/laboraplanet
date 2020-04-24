<!DOCTYPE html>
<html>

<head>
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <title>LaboraPlanet</title>


  <!-- Font CSS (Via CDN) -->
  <link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700'>

  <!-- Theme CSS -->
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/skin/default_skin/css/theme.css') }}">

  <!-- Favicon -->
<link rel="shortcut icon" href="{{ asset('img/siosi3.png')}}" style="width=100%;">

</head>

<body class="external-page external-alt sb-l-c sb-r-c">

  <!-- Start: Main -->
  <div id="main" class="animated fadeIn">
      <br/><br/><br/><br/>

    <section id="content_wrapper">


      <section id="content">

        <div class="center-block mt70" style="max-width: 625px">


          <div class="row table-layout">

            <div class="col-xs-8 pln">
               <h2 class="text-dark mbn confirmation-header"><i class="fa fa-check text-success"></i> @lang('traduccion2.txttehemosenviado')</h2>
            </div>

            <div class="col-xs-4 text-right va-b">
              <div class="meta-links alt">
                <a href="javascript:void(0);" class="">-</a>
                <span class="ph5"> | </span>
                <a href="javascript:void(0);" class="active">-</a>
              </div>
            </div>

          </div>


          <div class="panel mt15">
              <div class="panel-body pt30 p25 pb15">

                <p class="lead">@lang('traduccion2.txtholaconfir') {{ Auth::user()->nombres }},</p>

                <hr class="alt short mv25">

                <p class="lh25 text-muted fs15"> @lang('traduccion2.txtvealabandeja') </p>
                  <br/>
                <p class="text-right mt20" id="ocultar"><a href="javascript:void(0);" onclick="rconfirmacion(this);" data-correo="{{ Auth::user()->correo  }}" class="active">@lang('traduccion2.txtclickaquiconfir')</a></p>
                <p class="text-right mt20" style="display: none;" id="mostrar">
                  <img src="img/cargando.gif" width="20" height="20">
                </p>

              </div>
          </div>


          <div class="login-links mt30">
            <p> @lang('traduccion2.txttodoslosdereconfir')</p>
          </div>

        </div>

      </section>


    </section>


  </div>





  <!-- jQuery -->
  <script src="{{ asset('vendor/jquery/jquery-1.11.1.min.js') }}"></script>
  <script src="{{ asset('vendor/jquery/jquery_ui/jquery-ui.min.js') }}"></script>

  <!-- Theme Javascript -->
  <script src="{{ asset('assets/js/utility/utility.js') }}"></script>
  <script src="{{ asset('assets/js/demo/demo.js') }}"></script>
  <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{ asset('js/laborajs/seguridad.js') }}"></script>
  <script src="{{ asset('vendor/plugins/pnotify/pnotify.js')}}"></script>

  <!-- Page Javascript -->
  <script type="text/javascript">
  jQuery(document).ready(function() {

    "use strict";

    // Init Theme Core
    Core.init();

    // Init Demo JS
    Demo.init();

  });
  </script>

  <!-- END: PAGE SCRIPTS -->

</body>

</html>
