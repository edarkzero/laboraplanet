@extends('layouts.admin2')

@section('css')

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/skin/default_skin/css/theme.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin-tools/admin-forms/css/admin-forms.css')}}">

  <!-- NO INDEX -->
<meta name="googlebot" content="noindex, nofollow" />
<!-- FIN -->
@endsection



@section('js')
  <script type="text/javascript" src="{{ asset('assets/js/bootbox/bootbox.min.js') }}"></script>
<?php
$titulo = "";
  if (isset(Request::only(['txtbusqueda'])['txtbusqueda'] )) {
    $titulo =Request::only(['txtbusqueda'])['txtbusqueda'] ;
  }
?>
  <script type="text/javascript">
    var titulo = "{{ $titulo }}";
  </script>

  <script type="text/javascript" src="js/laborajs/paginate.js"></script>
    <script type="text/javascript" src="js/jquery.expander.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $("#presupuesto").change(function(){
        $("#buscar").click();
    });

    $("#pais").change(function() {
        $("#buscar").click();
    });

    $("#estados").change(function() {
      $("#buscar").click();
    });
    
    $("#categoria").change(function() {
      $("#buscar").click();     
    });

      // use esta configuracion simple para valores por defecto
      //$('div.expandable p').expander();
      // *** O ***
      // configure de la siguiente manera
      $('div.expandable p').expander({
      slicePoint: 30, // si eliminamos por defecto es 100 caracteres
      expandText: '[...]', // por defecto es 'read more...'
      collapseTimer: 5000, // tiempo de para cerrar la expanci�0�3���0�10��3n si desea poner 0 para no cerrar
      userCollapseText: '[^]' // por defecto es 'read less...'
    });
  });
</script>
  <script type="text/javascript">
    function notyf()
    {
       bootbox.confirm({
       title:" .: CONFIRMACION DE NOTIFICACION :.",
       message:"Se le enviara una notificación cuando se publiquen  nuevos Requerimientos relacionados con la palabra  ingresada.",
       callback:function(result){
      if (result==true)
      {
       mensaje('Se le notificara cuando se publique un proyecto!','success');
      }
      else
      {
       mensaje('OK','danger');
      }
    }
  });
    }


    function PublicarParecido(parecido)
    {
      /*publicar_trabajo/{parecido}*/
      var url='publicar_parecido/'+parecido;
      window.location.href=url;
    }


    var m=0;
    var presupuesto = '{{ Input::get('presupuesto') }}';
    var pais = '{{ Input::get('pais') }}';
    var estado = '{{ Input::get('estado') }}';
    var categoria = '{{ Input::get('categoria') }}';
    var habilidad = '{{ Input::get('habilidad') }}';
    var tipo = '{{ Input::get('tipo_trabajo') }}';

    $("#presupuesto").val(presupuesto);
    $("#pais").val(pais);
    $("#estados").val(estado);
    $("#categoria").val(categoria);
    $("#habilidad").val(habilidad);
    $("#tipo_trabajo").val(tipo);

    if (estado!='' || categoria!='' || habilidad!='' || tipo!='') {
      m = 1;
      $(".avanzado").show();
    }

       $("#mostrar").on('click',function(){
        // alert("asdas");
        if (m==0) {
        $(".avanzado").show();m=1;

        }else{
            $(".avanzado").hide();m=0;
        }
      });

  </script>

@endsection




@section('contenido')
@include('include.search_proyecto')



        <div class="tray tray-center" style="padding-left: 10px" id="todo">

          <div class=" mw1000 center-block  animated fadeIn" style="padding-top: 30px;">
            <div class="admin-form theme-primary">
                     @if($status = Session::get('status'))
        <div class="alert alert-success alert-dismissable" style="font-size: 20px;">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            <i class="fa fa-check pr10"></i>
              <strong>@lang('traduccion2.txtenhorabuenabutra')</strong> {{$status}}
        </div>

        @endif
              <div class="panel heading-border panel-primary">
                <div class="panel-body bg-light">
                    <div class="section-divider mb40" id="spy1">
                      {{-- @foreach( $proyect as $values) --}}
                      <span style="font-size: 25px">@lang('traduccion2.txttitlerequencontr')</span>
                      {{-- <span style="font-size: 25px">{{ $values->titulo }}</span> --}}
                          {{-- {{ print_r($proyect."") }} --}} {{-- @endforeach --}}

                    </div>
                    <br/>
                    <div id="users">
        @foreach($proyect as $values)
            <div class="panel panel-info">
                    <div class="panel-heading" style="padding: 0px;padding-left: 20px;background-color: #4fc1e9">
                      <span class="panel-icon"></span>
                      <span style="color: white">{{ $values->titulo }}</span>
                      <span style="float: right;color:red;padding-right: 20px">@if($values->urgente!=null) @lang('traduccion2.txttextourgente')  @endif  </span>
                   </div>
                    <div class="panel-body">
                      <div class="row">
                        <div class="col-md-2"><center>
                               <?php $img = $values->logo_empresa;
                              //print_r($values);
                            if ($img==null) {
                              $img= $values->imagen;
                              if ($img==null) {
                                $img ="img/edit/31626.jpg";
                              }
                            }

                           ?>
                          <center><img src="{{ $img }}" width="130" height="120px"></center>
                            <br/>
                            @if($values->codigo_pais == null)
                            @else
                     <img src="img/pais/{{ $values->codigo_pais }}.gif" width="30" height="20">
                            @endif

                            </center>
                          </div>
                        <div class="col-md-7">
                              <?php
                          $nombre = $values->nombre_empresa;
                          if ($nombre==null) {
                            $nombre=$values->nombres." ".$values->apellidos;
                          }
                          ?>
                          <p><b>@lang('traduccion2.txtempresabutra')</b> {{ $nombre }}</p>
                          <div class="expandable">
                            <p><b>@lang('traduccion2.txtdescripcionbutra')</b> {{ $values->descripcion }}</p>
                          </div>
              <div class="expandable">
<!-- Nuestro parrafo a mostrar-->
<p><b>@lang('traduccion2.txtconocimiebutra')</b></b> {{$values->habilidades}}</p>
</div>


                            <p style="font-size: 8px;"></p>


                          <p><b>@lang('admin.estadobt')</b>
                           @switch($values->estado)
                                @case(1)
                                    @lang('traduccion2.txtpublicadoxd')
                                    @break
                                @case(2)
                                    @lang('traduccion2.txtpublicadoxd')
                                    @break
                                @case(3)
                                    @lang('traduccion2.txtevaluacionxd')
                                    @break
                                @case(4)
                                    @lang('traduccion2.txttrabajandoxd')
                                    @break
                                @case(5)
                                    @lang('traduccion2.txtfinalizadoxd')
                                    @break
                                @default

                            @endswitch</p>
                          <p><b>@lang('traduccion2.txttiempobutra')</b> {{ $values->cantidad_tiempo }}
                            @switch($values->tiempo_entrega)
                                @case(1)
                                    @lang('traduccion2.opcselectiemp2')
                                  @break
                                @case(2)
                                    @lang('traduccion2.opcselectiemp3')
                                  @break
                                @case(3)
                                    @lang('traduccion2.opcselectiemp4')
                                  @break
                                @case(4)
                                    @lang('traduccion2.opcselectiemp5')
                                  @break
                                @default

                            @endswitch

                          </p>


                          <p><b>@lang('traduccion2.txtpresupuestabutra') </b>${{ $values->presupuesto }}</p>
                        </div>
                        <div class="col-md-3">
                          <center>
                            <p>{{ $values->presupuesto }}-USD</p>
                           @if(Auth::guest())
                          <a href="register"><p><button class="btn btn-sm btn-primary btn-block" style="width: 150px">@lang('admin.btnaplicar')</button></p></a>
                          @else
                          <a href="aplicar/{{$values->id}}"><p><button class="btn btn-sm btn-primary btn-block" style="width: 150px">@lang('admin.btnaplicar')</button></p></a>
                          @endif
                          <p><button class="btn btn-sm btn-primary btn-block" style="width: 150px" onclick="PublicarParecido('{{$values->id}}');">@lang('admin.btnpublicarparecido')</button></p>
                          {{-- Hoy --}}{{-- {{ $values->fecha_publicacion }} --}}
                          @php
                            $date= $values->fecha_publicacion  ;
                            $fechaI=date_create($date);
                            $fechaF=date_create(date("Y/m/d"));
                            $dife=date_diff($fechaI,$fechaF);
                            $datedif = $dife->days;
                             // echo $datedif;
                            if($datedif==0){
                              $datedif="Hoy";
                              echo $datedif;
                            }else{
                              $datedif='Hace '.$datedif.'  dias';
                              echo $datedif;
                            }
                          @endphp

                          </center>
                        </div>
                      </div>
                    </div>
                  </div>
    @endforeach
    @if(count($proyect)==0)
    <div class="row">
    <div class="col-md-1"></div>

    <div class="col-md-6" style="text-align: center;">
       <div class="promo-title style-scope ytd-background-promo-renderer"><h2><b>@lang('admin.txtnosehanencontradores')</b></h2></div>
      <div class="promo-body-text style-scope ytd-background-promo-renderer">@lang('admin.txtpruebaconotraspalabclave')</div>
    </div>

    <div class="col-md-3" style="text-align: left;">
      <br>
      <button type="button" class="btn btn-hover btn-success btn-block" onclick="notyf();"> @lang('admin.btnnotificarfake') </button>
    </div>

    <div class="col-md-1"></div>

    </div>
@endif

            <center>{{ $proyect->appends(Request::only(['txtbusqueda']))->render() }} </center>
</div>

                </div>
              </div>
            </div>
          </div>
        </div>


@endsection
