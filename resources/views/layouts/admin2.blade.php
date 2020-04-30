<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">@php $idioma = app()->getLocale(); @endphp
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>LaboraPlanet</title>

  <!---->

  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="keywords" content=""/>
  <meta name="description" content="La mayor red de autoempleo y trabajo desde casa, contrata excelentes profesionales freelance certificados. Chat en vivo, videollamadas y  grupos de interés para un proyecto exitoso.">
  <meta name="author" content="Labora Planet">

<meta name="google-site-verification" content="2PXj6yctEMAAzsnaUM4S0HBVznD1fbC0gQQghDnZ-00" />
<meta name="googlebot" content="noimageindex" />


  <meta name="userId" content="{{ Auth::check() ?  Auth::user()->id : 'null'}}">

  <link rel="stylesheet" type="text/css" href="{{ asset('assets/skin/default_skin/css/theme.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ asset('vendor/plugins/slick/slick.css')}}">

  <!-- Favicon -->
  <link rel="shortcut icon" href="{{ asset('img/siosi3.png')}}" style="width=100%;">


  <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin-tools/admin-forms/css/admin-forms.css')}}">

  <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css?v=3')}}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/estilos.css')}}">
  <link rel="stylesheet" href="{{ asset('css/responsiveslides.css')}}">
  <link rel="stylesheet" href="{{ asset('css/estilos-slider.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ asset('vendor/plugins/magnific/magnific-popup.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/fonts/icomoon/icomoon.css') }} ">
  <link rel="stylesheet" type="text/css" href=" {{ asset('vendor/plugins/select2/css/select2.css')}}">
  <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-150395955-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-150395955-1');
</script>

@yield('css')
<style type="text/css">
  #box {
    background:rgba(0,0,0,.8);
  }

</style>
<style type="text/css">

  #box {
    background: rgba(0,0,0,.8);
  }



.box {
    border-radius: 3px;
    padding: 10px 25px;
    box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
    text-align: right;
    display: block;
    margin-top: 60px;
}

.coloractivo {
  color:#37bc9b;
}

.colorinactivo {
  color: red;
}


.category:hover {
  transform: scale(1.15);
  z-index: 500;
  -webkit-transition: .5s all ease;
  -moz-transition: .5s all ease;
  transition: .5s all ease;
}




</style>


 <!-- METAS PARA FACEBOOK-->

<meta property="og:url" content="https://www.laboraplanet.com">
<meta property="og:image" content="https://www.laboraplanet.com/img/LogoVertical.png">
<meta property="og:description" content="La mayor red de autoempleo y trabajo desde casa, contrata excelentes profesionales freelance certificados. Chat en vivo, videollamadas y  grupos de interés para un proyecto exitoso.">
<meta property="og:title" content="LaboraPlanet">
<meta property="og:site_name" content="LaboraPlanet">
<meta property="og:see_also" content="https://www.laboraplanet.com">

<!-- METAS PARA TWITEER-->
<meta name="twitter:card" content="summary">
<meta name="twitter:url" content="https://www.laboraplanet.com">
<meta name="twitter:title" content="LaboraPlanet">
<meta name="twitter:description" content="La mayor red de autoempleo y trabajo desde casa, contrata excelentes profesionales freelance certificados. Chat en vivo, videollamadas y  grupos de interés para un proyecto exitoso.">
<meta name="twitter:image" content="https://www.laboraplanet.com/img/LogoVertical.png">

<!-- METAS PARA GOOGLE+ -->
<meta itemprop="name" content="LaboraPlanet">
<meta itemprop="description" content="La mayor red de autoempleo y trabajo desde casa, contrata excelentes profesionales freelance certificados. Chat en vivo, videollamadas y  grupos de interés para un proyecto exitoso.">
<meta itemprop="image" content="https://www.laboraplanet.com/img/LogoVertical.png">
</head>
<body class="sb-top sb-top-lg" style="margin:0px">
<script>
    window.laravel_base_path = '{{ route('index') }}';
</script>
<?php $contar =0;?>
  <!-- Start: Main -->
  <div id="main">

    <!-- Start: Header -->
    <header class="navbar navbar-fixed-top navbar-shadow bg-dark" >
     <!--bien-->
      <div class="navbar-branding">
        <a class="navbar-brand" href="{{ route('index')}}">
         <img src="{{ asset('img/LogoLabora.png')}}" alt="" width="100%">
        </a>
      </div>
      
      <ul class="nav navbar-nav navbar-left">
              <li class="dropdown menu-merge">
          <div class="navbar-btn btn-group">
            <button data-toggle="dropdown" class="btn btn-sm dropdown-toggle">
              @if($idioma == "es")
                ES &nbsp;<span class="fa fa-globe"> </span>
              @endif

              @if($idioma == "en")
                EN &nbsp;<span class="fa fa-globe"></span>
              @endif

              @if($idioma == "por")
                PT &nbsp;<span class="fa fa-globe"></span>
              @endif

               @if($idioma == "fra")
                FR &nbsp;<span class="fa fa-globe"></span>
              @endif


              <span class="caret"></span>
            </button>
            <ul class="dropdown-menu pv5 animated animated-short flipInX" role="menu">
                <li>
                <a href="{{route('locale','es')}}">
                   Español - ES </a>
              </li>
              <li>
                <a href="{{route('locale','en')}}">
                   English - EN </a>
              </li>
              <li>
                <a href="{{route('locale','por')}}">
                   Português - PT </a>
              </li>
            <li>
                <a href="{{route('locale','fra')}}">
                   Frances - FR </a>
              </li>
            </ul>
          </div>
        </li>

      </ul>
<!---->

      <ul class="nav navbar-nav navbar-right">
        @if (!Auth::guest())
        <!-- DESDE AQUI PARA LOS MENSAJES -->
        @if(Request::url()!=route('listar_chat') && Request::url()!=route('listar_trabajador'))
            @if(Auth::user()->flag == 1)
            <li class="dropdown menu-merge" id="app">
              <general v-bind:lista="{{ Auth::user()->chat }}" v-bind:chats="[]" v-bind:user="[{{ Auth::user()->id }},`{{ Auth::user()->nombres." ".Auth::user()->apellidos }}`,`{{ Auth::user()->imagen }}`]"></general>
            </li>
            @elseif(Auth::user()->flag == 2)
            <li class="dropdown menu-merge" id="app">
              <general v-bind:lista="{{ Auth::user()->chat }}" v-bind:chats="[]" v-bind:user="[{{ Auth::user()->id }},`{{ Auth::user()->nombres." ".Auth::user()->apellidos }}`,`{{ Auth::user()->imagen }}`]"></general>
            </li>
            @endif
        @endif
         <!-- FIN DE LOS MENSAJES -->
        <?php $contar =1; ?>
        @if(Auth::user()->flag == 1)
        <li class="dropdown menu-merge">
            <div class="navbar-btn btn-group">
                <button data-toggle="dropdown" class="btn btn-sm dropdown-toggle">
                <span class="fa fa-bell-o fs14 va-m"></span>
                <?php $cont = 0 ; ?>
                @foreach(Auth::user()->noty as $not)
                    @if($not->viewed == 0)
                    <?php $cont++; ?>
                    @endif
                @endforeach
                <?php if($cont == 0){ $cont = ""; } ?>
               <span class="badge badge-danger"><?php echo $cont; ?></span>
                </button>
            <div class="dropdown-menu dropdown-persist w350 animated animated-shorter fadeIn" role="menu">
              <div class="panel mbn">
                  <div class="panel-menu">
                     <span class="panel-icon"><i class="fa fa-clock-o"></i></span>
                     <span class="panel-title fw600">@lang('traduccion1.sub1admin2')</span>
                     <button class="btn btn-default light btn-xs pull-right" type="button"><i class="fa fa-refresh"></i></button>
                  </div>

                  <div class="panel-body panel-scroller scroller-navbar scroller-overlay scroller-pn pn">
                      <ol class="timeline-list">
                   @foreach(Auth::user()->noty as $not)

            @if( $not->type_notification == "Proyecto")
                   <?php
                    $cc = explode("/",$not->url);
                    //print_r($cc);
                    $urll = "";
                    $var = "";
                    if (count($cc)==1) {
                      $urll=$cc[0];
                    }elseif (count($cc)==2) {
                      $urll =$cc[0];
                      $var = $cc[1];
                    }
                    // print_r(count($cc));exit();
                   ?>

                  <li id="xd" cod-not="{{$not->id_notification}}" <?php if(trim($not->url)!=""){ ?> onclick="ver(this)"<?php } ?> class="timeline-item" @if($not->viewed == 0) style="background: #E0F9EE;cursor:pointer;"@endif>
                  <div class="timeline-icon bg-dark light">
                      <span class="fa fa-tags"></span>
                  </div>
                      <div class="timeline-desc" style="padding-top:-60px">
                        <?php $xd  = "ble"; ?>
                            <b style="font-size: 10px;">{{$not->date_done}}</b>
                          <br/>
                        <b>{{$not->type_notification}}</b> {{$not->description}} <a href='{{ route('proyectoDetalle',$var) }}' target="_blank">"{{ $not->titlep }}"</a> @lang('traduccion1.sub2admin2')
                      </div>
                  {{-- <div class="timeline-date"></div> --}}
                  <br/>

                        <div class="row" align="center">
                          <div class="col-md-12">

                            <a href="{{ route('aplicar',$cc[1]) }}" target="_blank" class="btn btn-rounded btn-info btn-block">@lang('traduccion1.sub3admin2')</a>
                          </div>

                          <!--<div class="col-md-6">-->
                          <!--  <button type="button" class="btn btn-rounded btn-success btn-block">Contactar</button>-->
                          <!--</div>-->
                        </div>

              </li>

            @elseif($not->type_notification == "Actualizacion")

                   <?php
                    $cc = explode("/",$not->url);
                    //print_r($cc);
                    $urll = "";
                    $var = "";
                    if (count($cc)==1) {
                      $urll=$cc[0];
                    }elseif (count($cc)==2) {
                      $urll =$cc[0];
                      $var = $cc[1];
                    }
                    // print_r(count($cc));exit();
                   ?>

                  <li id="xd" cod-not="{{$not->id_notification}}" <?php if(trim($not->url)!=""){ ?> onclick="ver(this)"<?php } ?> class="timeline-item" @if($not->viewed == 0) style="background: #E0F9EE;cursor:pointer;"@endif>
                  <div class="timeline-icon bg-dark light">
                      <span class="fa fa-tags"></span>
                  </div>
                  <div class="timeline-desc" style="padding-top:-60px">
                    <?php $xd  = "ble"; ?>
                    <b style="font-size: 10px;">{{$not->date_done}}</b>

                        <br/>
                        <b>{{$not->type_notification}}</b> {{$not->description}} <a href='{{ route('proyectoDetalle',$var) }}' target="_blank">"{{ $not->titlep }}"</a> @lang('traduccion1.sub4admin2').
                      </div>

                  <br/>

                        <div class="row" align="center">
                          <div class="col-md-12">
                            <a href="{{ $not->url }}" target="_blank" class="btn btn-rounded btn-info btn-block">@lang('traduccion1.sub5admin2')</a>
                          </div>

                          <!--<div class="col-md-6">-->
                          <!--  <button type="button" class="btn btn-rounded btn-success btn-block">Contactar</button>-->
                          <!--</div>-->
                        </div>

              </li>



                  @else
                   <?php
                    $cc = explode("/",$not->url);
                    //print_r($cc);
                    $urll = "";
                    $var = "";
                    if (count($cc)==1) {
                      $urll=$cc[0];
                    }elseif (count($cc)==2) {
                      $urll =$cc[0];
                      $var = $cc[1];
                    }
                    // print_r(count($cc));exit();
                   ?>

                  <li id="xd" cod-not="{{$not->id_notification}}" <?php if(trim($not->url)!=""){ ?> onclick="location.href='{{ route($urll,$var) }}';ver(this)"<?php } ?> class="timeline-item" @if($not->viewed == 0) style="background: #E0F9EE;cursor:pointer;"@endif>
                  <div class="timeline-icon bg-dark light">
                      <span class="fa fa-tags"></span>
                  </div>
                  <div class="timeline-desc" style="padding-top:-60px">
                    <b style="font-size: 10px;">{{$not->date_done}}</b>
                          <br/>
                        <b>{{$not->type_notification}}</b> {{$not->description}}
                      </div>



              </li>




                    @endif

                  @endforeach
                    </ol>
                  </div>
                  <div class="panel-footer text-center p7">
                    {{-- <a href="javascript:void(0);" class="link-unstyled"> View All </a> --}}
                  </div>
              </div>
            </div>
          </div>
        </li>

        @elseif(Auth::user()->flag == 2)

     <li class="dropdown menu-merge">
          <div class="navbar-btn btn-group">
            <button data-toggle="dropdown" class="btn btn-sm dropdown-toggle">
              <span class="fa fa-bell-o fs14 va-m"></span>
              <?php $cont = 0 ; ?>
                @foreach(Auth::user()->noty as $not)
                    @if($not->viewed == 0)
                    <?php $cont++; ?>
                    @endif
                @endforeach
                <?php if($cont == 0){ $cont = ""; } ?>
               <span class="badge badge-danger"><?php echo $cont; ?></span>

            </button>
            <div class="dropdown-menu dropdown-persist w350 animated animated-shorter fadeIn" role="menu">
              <div class="panel mbn">

                  <div class="panel-menu">
                     <span class="panel-icon"><i class="fa fa-clock-o"></i></span>
                     <span class="panel-title fw600">@lang('traduccion1.sub6admin2')</span>
                     <button class="btn btn-default light btn-xs pull-right" type="button"><i class="fa fa-refresh"></i></button>
                  </div>

                  <div class="panel-body panel-scroller scroller-navbar scroller-overlay scroller-pn pn">
                      <ol class="timeline-list">
                   @foreach(Auth::user()->noty as $not)
                   <?php
                    $cc = explode("/",$not->url);
                    //print_r($cc);
                    $urll = "";
                    $var = "";
                    if (count($cc)==1) {
                      $urll=$cc[0];
                    }elseif (count($cc)==2) {
                      $urll =$cc[0];
                      $var = $cc[1];
                    }
                    // print_r(count($cc));exit();
                   ?>

                  <li id="xd" cod-not="{{$not->id_notification}}" <?php if(trim($not->url)!=""){ ?> onclick="location.href='{{ route($urll,$var) }}';ver(this)"<?php } ?> class="timeline-item" @if($not->viewed == 0) style="background: #E0F9EE;cursor:pointer;"@endif>
                  <div class="timeline-icon bg-dark light">
                      <span class="fa fa-tags"></span>
                  </div>
                      <div class="timeline-desc" style="padding-top:-60px">
                        <b style="font-size: 10px;">{{$not->date_done}}</b>
                        <br/>
                        <b>{{$not->type_notification}}</b> {{$not->description}}
                      </div>

                  <br/>
     @if( $not->type_notification == "Proyecto")
                        <div class="row" align="center">
                          <div class="col-md-12">

                            <a href="{{ $not->url }}" target="_blank" class="btn btn-rounded btn-info btn-block">@lang('traduccion1.sub7admin2')</a>
                          </div>

                          <!--<div class="col-md-6">-->
                          <!--  <button type="button" class="btn btn-rounded btn-success btn-block">Contactar</button>-->
                          <!--</div>-->
                        </div>
                    @else

                    @endif
              </li>
                  @endforeach
                    </ol>
                  </div>
                  <div class="panel-footer text-center p7">
                    <a href="javascript:void(0);" class="link-unstyled"> View All </a>
                  </div>
              </div>
            </div>
          </div>
        </li>

        @endif








     <li class="dropdown menu-merge">
          <div class="navbar-btn btn-group">
            <button data-toggle="dropdown" class="btn btn-sm dropdown-toggle" >
                    @if(Auth::user()->estado==1)
                    <i class="fa fa-user coloractivo"  id="estadousu"></i>
                     @else
                    <i class="fa fa-user colorinactivo"  id="estadosu"></i>
                    @endif
            </button>
            <ul class="dropdown-menu pv5 animated animated-short flipInX" role="menu">
              <li>
                <a href="javascript:void(0);" id="activo"><span class="fa fa-user mr10" style="color: green"></span>@lang('traduccion1.sub8admin2')  </a>
                <a href="javascript:void(0);" id="inactivo"><span class="fa fa-user mr10" style="color: red "></span> @lang('traduccion1.sub9admin2') </a>
              </li>
            </ul>
          </div>
        </li>
           <li class="dropdown menu-merge" id="listar">
          <a href="javascript:void(0);" class="dropdown-toggle fw600 p15" data-toggle="dropdown">
              <?php
            if (Auth::user()->imagen==null) {
              $mostrar ='img/none.png';
            }else{
              $mostrar=Auth::user()->imagen;
            }
            ?>
             <img src="{{ asset($mostrar) }}" alt="avatar" class="mw30 br64" id="img2" >
            @php $nombre=Auth::user()->nombres."  ".Auth::user()->apellidos

            @endphp
             <span class="hidden-xs pl15">{{ $nombre }}</span>
            <span class="caret caret-tp hidden-xs"></span>
            </a>
              <ul class="dropdown-menu list-group dropdown-persist w250" role="menu">
            <li class="dropdown-header clearfix">
            </li>

                <li class="list-group-item">
                <a href="javascript:void(0);" class="animated animated-short fadeInUp"><span class="fa fa-user"> </span>@lang('traduccion1.sub10admin2')  <span class="caret ml5"></span></a>

              </li>
      <a href="javascript:void(0);" id="pcolaborador" type="button" class="btn btn-success br2 btn-xs fs12 dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
     @lang('traduccion1.sub11admin2') 
      </a>

      <a href="javascript:void(0);" id="pempleador" type="button" class="btn btn-success br2 btn-xs fs12 dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
  @lang('traduccion1.sub12admin2')    
      </a>
      <br/>



              <li class="list-group-item">
                <a href="{{ url('seguridad') }}" class="animated animated-short fadeInUp"><span class="fa fa-lock"></span> @lang('admin.seguridadycontraarriba')</a>
              </li>
              <li class="list-group-item">
                <a href="javascript:void(0);" class="animated animated-short fadeInUp salir"><span class="fa fa-heart"></span> @lang('admin.invitaramigosarriba') </a>
              </li>
              <li class="list-group-item">
                <a href="javascript:void(0);" class="animated animated-short fadeInUp"><span class="fa fa-cog"></span> @lang('traduccion1.sub13admin2') </a>
              </li>
              <li class="dropdown-footer">
                <a href="{{ url('/logout') }}" class="">
                <span class="fa fa-power-off pr5"></span> @lang('admin.cerrarsesionarriba') </a>
              </li>
            </ul>
        </li>
        @else
        <li id="app"></li>
       @endif

        <li id="toggle_sidemenu_t">
            <span class="fa fa-caret-up"></span>
        </li>
      </ul>
    </header>
    <!-- End: Header -->

    <!-- Start: Sidebar -->
    <aside id="sidebar_left" class="" style="background-color: rgba(55,188,155,0.7);position: fixed;">


      <div class="sidebar-left-content nano-content" >

        <ul class="nav sidebar-menu">


            @if ($contar==0)
          <li>
            <a href="{{ route('index')}}" style="color: white;" name="xd">
              <span class="glyphicon glyphicon-home"></span>
              <span class="sidebar-title">@lang('admin.inicio')</span>
            </a>
          </li>

          <li class="active" style="border: solid 2px #FFF;">
            <a href="{{route('publicar_trabajo')}}" style="color: white;">
              <span class="glyphicon glyphicon-book"></span>
              <span class="sidebar-title">@lang('traduccion1.sub14admin2')</span>
            </a>
          </li>

          <li>
            <a href="{{route('buscar_trabajo')}}" style="color: white;">
              <span class="fa fa-columns"></span>
              <span class="sidebar-title">@lang('admin.trabajar')</span>
            </a>
          </li>

          <li>
            <a  href="{{route('login')}}" style="color: white;">
              <span class="glyphicon glyphicon-fire"></span>
              <span class="sidebar-title">@lang('admin.ingresar')</span>
            </a>
          </li>

          <li>
            <a  href="{{route('register')}}" style="color: white;">
              <span class="glyphicon glyphicon-check"></span>
              <span class="sidebar-title">@lang('admin.registro')</span>
            </a>
          </li>

          <li>
            <a  href="{{route('contacto')}}" style="color: white;">
              <span class="glyphicon glyphicon-shopping-cart"></span>
              <span class="sidebar-title">@lang('admin.contacto')</span>
            </a>
          </li>
          <li>
            <a  href="{{ route('laborapl') }}" style="color: white;">
              <span class="fa fa-question-circle"></span>
              <span class="sidebar-title">@lang('traduccion1.sub15admin2')</span>
            </a>
          </li>
               @else


            @if( Auth::user()->flag == 1)
                <li>
            <a href="{{ url('inicio')}}" style="color: white;">
              <span class="glyphicon glyphicon-home"></span>
              <span class="sidebar-title">@lang('admin.inicio') </span>
            </a>
          </li>
               <li>
            <a class="accordion-toggle" style="@if(Auth::user()->tpu=='E') background:#454241 ;color: #3498db; @else color: white; @endif" href="javascript:void(0);">
                    <span class="glyphicon glyphicon-book"></span>
              <span class="sidebar-title">@lang('admin.emplearmenuau')</span>
             <span class="caret"></span>
            </a>
    <ul class="nav sub-nav" style="width: 200%">
              <li>
                <a href="{{ asset('publicar_trabajo')}}">
                  <span class="glyphicon glyphicon-book"></span> @lang('traduccion1.sub16admin2')</a>
              </li>
              <li>
                <a href="{{ asset('trabajadores')}}">
                  <span class="glyphicon glyphicon-equalizer"></span> @lang('admin.emencutrabaau') </a>
              </li>
              <li>
                <a href="{{ asset('trabajadores_favoritos')}}">
                  <span class="glyphicon glyphicon-book"></span> @lang('admin.emtrabafavau') </a>
              </li>
              <li>
                <a href="{{ asset('trabajadores_certificados')}}">
                  <span class="glyphicon glyphicon-equalizer"></span>@lang('admin.emtrabacertau')</a>
              </li>
              <li>
                <a href="{{ asset('proyectos')}}">
                  <span class="glyphicon glyphicon-book"></span> @lang('traduccion1.sub17admin2') </a>
              </li>

            </ul>
          </li>

         <li>
            <a class="accordion-toggle" style="color: white;" href="javascript:void(0);">
                    <span class="glyphicon glyphicon-book"></span>
              <span class="sidebar-title">@lang('admin.trabajarmenuau')</span>
             <span class="caret"></span>
            </a>
    <ul class="nav sub-nav" style="width: 200%">
              <li>
                <a href="{{ asset('buscar_trabajo')}}">
                  <span class="glyphicon glyphicon-book"></span>@lang('traduccion1.sub18admin2')</a>
              </li>
              <li>
                <a href="{{ asset('certificar')}}">
                  <span class="glyphicon glyphicon-equalizer"></span>@lang('traduccion1.sub19admin2')</a>
              </li>
              <li>
                <a href="{{ asset('clientes_favoritos')}}">
                  <span class="glyphicon glyphicon-book"></span>@lang('admin.traclienfavau')</a>
              </li>
              <li>
                <a href="{{ asset('trabajos')}}">
                  <span class="glyphicon glyphicon-equalizer"></span>@lang('admin.tramistrabajau')</a>
              </li>
              <li>
                <a href="{{ asset('planes')}}">
                  <span class="glyphicon glyphicon-book"></span>@lang('admin.traplanesymenau')</a>
              </li>
              <li>
                 <a id="notificar" href="javascript:void(0);">
                  <span class="glyphicon glyphicon-book"></span>@lang('admin.tranotifiau')</a>

              </li>
            </ul>

          </li>
          <li>
            <a  href="{{ asset('dinero')}}" style="color: white;">
              <span class="glyphicon glyphicon-fire"></span>
              <span class="sidebar-title">@lang('admin.dineromenuau')</span>
            </a>
          </li>
         <li>
            <a class="accordion-toggle" style="color: white;" href="javascript:void(0);">
                    <span class="glyphicon glyphicon-book"></span>
              <span class="sidebar-title">@lang('admin.ayudamenuau')</span>
             <span class="caret"></span>
            </a>
    <ul class="nav sub-nav" style="width: 200%">
              <li>
                <a href="javascript:void(0);">
                  <span class="glyphicon glyphicon-book"></span>@lang('admin.ayuobtenersoau')</a>
              </li>
              <li>
                <a href="javascript:void(0);">
                  <span class="glyphicon glyphicon-equalizer"></span>@lang('admin.ayupregunau')</a>
              </li>

            </ul>

          </li>
          
          {{-- <li style="with:10px;">
             <a class="accordion-toggle" style="color: white;" href="{{ route('formhijos') }}">
               <span>
                 <pre>La familia es importante. <br/>Solicitud de beneficios para trabajadores con niños.</pre>
               </span>
             </a>
           </li> --}}

           <li style="with:10px;">
              <a class="accordion-toggle" style="color: white;" href="{{ route('formhijos') }}">
                <span style="padding-top:18px;">
                  <pre>APOYO SOCIAL</pre>
                </span>
              </a>
            </li>

          @elseif(Auth::user()->flag ==2 )

                <li>
            <a href="{{ url('inicio')}}" style="color: white;">
              <span class="glyphicon glyphicon-home"></span>
              <span class="sidebar-title">@lang('admin.inicio') </span>
            </a>
          </li>
               <li>
            <a class="accordion-toggle" style="color: white;" href="javascript:void(0);">
                    <span class="glyphicon glyphicon-book"></span>
              <span class="sidebar-title">@lang('admin.emplearmenuau')</span>
             <span class="caret"></span>
            </a>
    <ul class="nav sub-nav" style="width: 200%">
              <li>
                <a href="{{ asset('publicar_trabajo')}}">
                  <span class="glyphicon glyphicon-book"></span> @lang('admin.emcrearproau') </a>
              </li>
              <li>
                <a href="{{ asset('trabajadores')}}">
                  <span class="glyphicon glyphicon-equalizer"></span> @lang('admin.emencutrabaau') </a>
              </li>
              <li>
                <a href="{{ asset('trabajadores_favoritos')}}">
                  <span class="glyphicon glyphicon-book"></span> @lang('admin.emtrabafavau') </a>
              </li>
              <li>
                <a href="{{ asset('trabajadores_certificados')}}">
                  <span class="glyphicon glyphicon-equalizer"></span>@lang('admin.emtrabacertau')</a>
              </li>
              <li>
                <a href="{{ asset('proyectos')}}">
                  <span class="glyphicon glyphicon-book"></span> @lang('admin.emmisproyeau') </a>
              </li>

            </ul>
          </li>

         <li>
            <a class="accordion-toggle" style="color: white;" href="javascript:void(0);">
                    <span class="glyphicon glyphicon-book"></span>
              <span class="sidebar-title">@lang('admin.trabajarmenuau')</span>
             <span class="caret"></span>
            </a>
    <ul class="nav sub-nav" style="width: 200%">
              <li>
                <a href="{{ asset('buscar_trabajo')}}">
                  <span class="glyphicon glyphicon-book"></span>@lang('admin.trabuscatraau')</a>
              </li>
              <li>
                <a href="{{ asset('certificar')}}">
                  <span class="glyphicon glyphicon-equalizer"></span>@lang('admin.tracertifihabau')</a>
              </li>
              <li>
                <a href="{{ asset('clientes_favoritos')}}">
                  <span class="glyphicon glyphicon-book"></span>@lang('admin.traclienfavau')</a>
              </li>
              <li>
                <a href="{{ asset('trabajos')}}">
                  <span class="glyphicon glyphicon-equalizer"></span>@lang('admin.tramistrabajau')</a>
              </li>
              <li>
                <a href="{{ asset('planes')}}">
                  <span class="glyphicon glyphicon-book"></span>@lang('admin.traplanesymenau')</a>
              </li>
              <li>
                 <a id="notificar" href="javascript:void(0);">
                  <span class="glyphicon glyphicon-book"></span>@lang('admin.tranotifiau')</a>

              </li>
            </ul>

          </li>
          <li>
            <a  href="{{ asset('dinero')}}" style="color: white;">
              <span class="glyphicon glyphicon-fire"></span>
              <span class="sidebar-title">@lang('admin.dineromenuau')</span>
            </a>
          </li>
         <li>
            <a class="accordion-toggle" style="color: white;" href="javascript:void(0);">
                    <span class="glyphicon glyphicon-book"></span>
              <span class="sidebar-title">@lang('admin.ayudamenuau')</span>
             <span class="caret"></span>
            </a>
    <ul class="nav sub-nav" style="width: 200%">
              <li>
                <a href="javascript:void(0);">
                  <span class="glyphicon glyphicon-book"></span>@lang('admin.ayuobtenersoau')</a>
              </li>
              <li>
                <a href="javascript:void(0);">
                  <span class="glyphicon glyphicon-equalizer"></span>@lang('admin.ayupregunau')</a>
              </li>

            </ul>

          </li>


          @endif

      @endif
        </ul>
      </div>
    </aside>

    <section id="content_wrapper" class="animated fadeInDown">

 @yield('contenido')




<br>





   <footer>

    <div class="footer-container bg-dark">
      <div style="border: 1px solid #FFF;">
        <div class="col-md-2">

        </div>
        <div class="col-md-4">
        <br/>
        <img src="{{asset('img/LogoLabora.png')}}" width="200" height="50">
        <p>@lang('traduccion1.sub20admin2')</p>
        </div>
        <div class="col-md-6" align="right">
          <br/>
              <div class="main-copy-redes">
                  <div class="footer-redes" style="width:55%">
                      <a href="javascript:void(0);" class="fa fa-facebook"></a>
                      <a href="javascript:void(0);" class="fa fa-twitter"></a>
                      <a href="javascript:void(0);" class="fa fa-youtube-play"></a>
                      <a href="javascript:void(0);" class="fa fa-whatsapp" style="font-size:15px"></a>
                  </div>
              </div>

        </div>

      </div>
      <div class="footer-main" align="center">
        <div class="footer-columna" >
             <h3 style="font-size: 13px;">@lang('admin.laboraplanetf')</h3>

            <ul class="empu">
            <li class="quit"><a href="{{ route('proposito') }}" class="it" style="font-size: 12px;"> @lang('admin.proposito') </a></li><br/>
            <li class="quit"><a href="{{ route('vision') }}" class="it" style="font-size: 12px;"> @lang('admin.vision') </a></li><br/>
            <li class="quit"><a href="{{ route('mision') }}" class="it" style="font-size: 12px;"> @lang('admin.mision') </a></li>
          </ul>
        </div>

        <div class="footer-columna" >
            <h3 style="font-size: 13px;">@lang('admin.condicionesf')</h3>

            <ul class="empu">
            <li class="quit"><a href="{{ route('politica') }}" class="it" style="font-size: 12px;"> @lang('admin.politicaprivacidad')<a></li><br/>
            <li class="quit"><a href="{{ route('terminos') }}" class="it" style="font-size: 12px;"> @lang('admin.codigosdeconducta') </a></li><br/>
            <li class="quit"><a href="javascript:void(0);" class="it" style="font-size: 12px;"> @lang('admin.tasasycomisiones')</a></li><br/>
          </ul>
        </div>

        <div class="footer-columna" >
        <h3 style="font-size: 13px;">@lang('admin.serviciode')</h3>
        {{-- <hr/> --}}
          <ul class="empu">
            <li class="quit"><a href="{{ route('construccion') }}" class="it" style="font-size: 12px;">@lang('traduccion1.sub21admin2')  </a></li><br/>
            <li class="quit"><a href="javascript:void(0);" class="it" style="font-size: 12px;">  @lang('admin.preguntasfre')</a></li><br/>
            <li class="quit"><a href="{{ route('construccion') }}" class="it" style="font-size: 12px;"> @lang('traduccion1.sub22admin2')  </a></li><br/>
          </ul>
        </div>
      </div>
    </div>


  </footer>

  <div id="modal-form-amigo" class="popup-basic admin-form mfp-with-anim mfp-hide" >
        <div class="panel">
          <div class="panel-heading">
            <span class="panel-title">
              <i class="fa fa-rocket"></i>@lang('admin.titleinviaramigomod')</span>
          </div>
          <!-- end .panel-heading section -->

          <form method="POST"  id="form-invitar">
            <div class="panel-body" style="padding-bottom: 0px">

                     <label for="firstname" class="field prepend-icon">
                    <input type="text" name="firstname" id="nombre_amigo" required class="gui-input" placeholder="Nombre del Amigo">
                    <label for="firstname" class="field-icon">
                      <i class="fa fa-user"></i>
                    </label>
                  </label>
                  <br><br>




                  <label for="firstname" class="field prepend-icon">
                    <input type="email" name="firstname" id="correo_amigo" required class="gui-input" placeholder="@lang('admin.placegolcorreoamigomod')">
                    <label for="firstname" class="field-icon">
                      <i class="fa fa-user"></i>
                    </label>
                  </label>
                  <br><br>

         <div class="section">
                <label for="comment" class="field prepend-icon">
                  <textarea class="gui-textarea" id="comentario" required name="comment" placeholder="@lang('admin.placegolescribamoda')"></textarea>
                  <label for="comment" class="field-icon">
                    <i class="fa fa-comments"></i>
                  </label>
                </label>
              </div>
            </div>
            <div class="panel-footer">
              <center>
              <button type="submit" class="button btn-primary"> @lang('admin.btninvitarmodal') </button>
              </center>
            </div>

        </form>

        </div>
      </div>


    </section>

  </div>
  <div class="modal"  role="dialog" id="sss" style="/*z-index: 1030;*/z-index: 2000;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">@lang('traduccion1.sub23admin2')</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="font-size: 15px">
        <p>@lang('traduccion1.sub24admin2')<b id="usu_c"></b>@lang('traduccion1.sub25admin2') <b>$</b> <b id="monto_c"></b>.</p>
      </div>
      <div class="modal-footer">
        <a href="#" class="btn btn-primary" id="pie_modal">@lang('traduccion1.sub26admin2')</a>
        <a href="{{route('index','v')}}" class="btn btn-secondary">@lang('traduccion1.sub27admin2')</a>

      </div>
    </div>
  </div>
</div>
</body>

</html>

      <script src="https://cdn.rawgit.com/mattdiamond/Recorderjs/08e7abd9/dist/recorder.js"></script>


 <script src="{{ asset('js/app.js?v=14') }}"></script>
  <script src= "{{ asset('vendor/jquery/jquery-1.11.1.min.js')}}"></script>
  <script src="{{ asset('vendor/jquery/jquery_ui/jquery-ui.min.js')}}"></script>
  <script src="{{ asset('js/responsiveslides.min.js')}}"></script>
  <!-- Theme Javascript -->
  <script src="{{ asset('vendor/plugins/magnific/jquery.magnific-popup.js')}}"></script>
  <script  src="{{ asset('select2/select2.min.js') }}"></script>
  <script src="{{ asset('assets/js/utility/utility.js')}}"></script>
  <script src="{{ asset('assets/js/demo/demo.js')}}"></script>
  <script src="{{ asset('assets/js/main.js')}}"></script>
  <script src="{{ asset('vendor/plugins/slick/slick.js')}}"></script>
  <script src="{{ asset('js/laborajs/cambio_estado.js')}}"></script>
  <script src="{{ asset('js/notify.min.js')}}"></script>
  <script src="{{ asset('vendor/plugins/pnotify/pnotify.js')}}"></script>


  <script type="text/javascript">

document.get

  jQuery(document).ready(function() {

    "use strict";
    Core.init();
        // Demo.init();
    $(function() {
      $(".rslides").responsiveSlides({
        timeout: 3000,
      });
    });


    $("#pcolaborador").on('click',function(){
     location.href="{{route('perfil')}}";
     $("#mcolaborador").addClass('active');
    });
  $("#pie_modal").on('click',function(){
    $("#acp").click();
  });

    $("#pempleador").on('click',function(){
      location.href = "{{route('perfil2')}}";
    });
  });

  $("pre").click(function(){
    location.href = '{{ route('formhijos') }}'
  });



  function  ver(x)
{
 var codigo = $(x).attr('cod-not');
 var upnotifi = "upnotifi";
     $.ajax({
            url:"{{route('upnotifi')}}",
            type:'POST',
            dataType:'json',
            data:{codigo:codigo},

            success:function(response)
            {
              var url = null;
              $.each(response.data,function(key,value){
                //url = value.url;
                //console.log(url);
              });
             // window.location.href = url;

            }
     });


}


 $("#notificar").on('click',function(){
         $("#listar").removeClass('open');
     $.magnificPopup.open({
      fixedContentPos : false,
                      removalDelay: 400,
                      items: {
                        src: "#modal-form2"
                      },
                      callbacks: {
                        beforeOpen: function(e) {
                          this.st.mainClass = 'mfp-rotateDown';
                        }
                      },
                      midClick: true
                    });
  });


     $("#form-invitar").submit(function(e) {
         e.preventDefault();
         var correo_amigo = $("#correo_amigo").val();
         var comentario = $("#comentario").val();
         var nombre_amigo = $("#nombre_amigo").val();


         $.ajax({
              url:'{{route("invitar")}}',
              type:'POST',
              dataType:'json',
              data:{correo_amigo:correo_amigo,comentario:comentario,nombre_amigo:nombre_amigo},
              success:function(response)
              {
                 mensaje('El correo fue enviado con exito!','success');
              }
         });
         cerrarmodal();


    });


    $("#activo").click(function(){
        var estado = 1;

        $.ajax({
            url:'{{route("cambio_estado")}}',
            type:'POST',
            dataType:'json',
            data:{estado:estado},
            success:function(response)
            {
                $("#estadousu").removeClass('fa fa-user colorinactivo').addClass('fa fa-user coloractivo');
            }
      });
        notifyActivo();

    });

    $("#inactivo").click(function(){
        var estado =0;

        $.ajax({
            url:'{{route("cambio_estado")}}',
            type:'POST',
            dataType:'json',
            data:{estado:estado},
            success:function(response)
            {
                $("#estadousu").removeClass('fa fa-user coloractivo').addClass('fa fa-user colorinactivo');
            }
        });
        notifyInactivo();

    });






   $(".salir").on('click',function(){
     // $("#listar").removeClass('open');
     $.magnificPopup.open({
      fixedContentPos : false,
                      removalDelay: 400,
                      items: {
                        src: "#modal-form-amigo"
                      },
                      callbacks: {
                        beforeOpen: function(e) {
                          this.st.mainClass = 'mfp-rotateDown';
                        }
                      },
                      midClick: true
                    });
  })



$("#guardnotif").on('click',function() {



    $.magnificPopup.close();
     mensaje('Configuracion Exitosa','success');


});

var recognition;
  var recognizing = false;
  if (!('webkitSpeechRecognition' in window)) {
    console.log('API NO SOPORTADA');
  } else {

    recognition = new webkitSpeechRecognition();
    recognition.lang = "es-VE";
    recognition.continuous = true;
    recognition.interimResults = true;

    recognition.onstart = function() {
      recognizing = true;
      console.log("empezando a eschucar");
    }
    recognition.onresult = function(event) {

     for (var i = event.resultIndex; i < event.results.length; i++) {
      if(event.results[i].isFinal)
        document.getElementById("txtbusqueda").value += event.results[i][0].transcript;
        }

      //texto
    }
    recognition.onerror = function(event) {
    }
    recognition.onend = function() {
      recognizing = false;
      console.log("terminó de eschucar, llegó a su fin");

    }

  }


  $("#procesar").click(function() {
      if (recognizing == false) {
      recognition.start();
      recognizing = true;
      $("#icon").removeClass('fa fa-microphone-slash').addClass('fa fa-microphone');
    //   $("#icon").html("&nbsp; Escuchando...");

    } else {
      recognition.stop();
      recognizing = false;

      $("#icon").removeClass('fa fa-microphone').addClass('fa fa-microphone-slash');
    //   $("#icon").html(" ");

    }
  });

  $("#procesar2").click(function() {
      if (recognizing == false) {
      recognition.start();
      recognizing = true;
      $("#icon2").removeClass('fa fa-microphone-slash').addClass('fa fa-microphone');
      $("#icon2").html("&nbsp; Escuchando...");

    } else {
      recognition.stop();
      recognizing = false;

      $("#icon2").removeClass('fa fa-microphone').addClass('fa fa-microphone-slash');
      $("#icon2").html(" ");

    }
  });

    $("#procesar3").click(function() {
      if (recognizing == false) {
      recognition.start();
      recognizing = true;
      $("#icon3").removeClass('fa fa-microphone-slash').addClass('fa fa-microphone');
      $("#icon3").html("&nbsp; Escuchando...");

    } else {
      recognition.stop();
      recognizing = false;

      $("#icon3").removeClass('fa fa-microphone').addClass('fa fa-microphone-slash');
      $("#icon3").html(" ");

    }
  });


@if(isset($_GET['v']))
            new PNotify({
              title: "Buscar nuevo trabajador",
              text: "No te desanimes sigue buscando al genio que necesitas",
              addclass: 'stack_top_right',
              type: "info",
              width: "40%",
              delay:5000
            });
@endif
 $("#txtbusqueda").focus();
  </script>
@yield('js')
