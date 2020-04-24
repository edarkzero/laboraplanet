@extends('layouts.admin2')
@section('css')
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <style>
      .rslides li {
       height:100%;
      }
  </style>
@endsection



@section('js')
<script type="text/javascript">

</script>
<script type="text/javascript" src="js/laborajs/buscar_trabajadores.js"></script>
<script type="text/javascript" src="js/jquery.expander.js"></script>
<script type="text/javascript">
  $(document).ready(function() {

    $("#precio").change(function(){
        $("#buscar").click();
    });

    $("#paiss").change(function(){
        $("#buscar").click();
    });

 $("#informacion").submit(function(e) {
      e.preventDefault();

      var detalle = $("#detalle").val();
      var nombres = $("#nombres").val();
      var apellidos = $("#apellidos").val();
      var correo = $("#correo").val();
      var numero = $("#numero").val();
      var nacionalidad = $("#cbx_correo").val();

        $.ajax({
             url:'correo_solicita',
             type:'POST',
             datatype:'json',
             data:{detalle:detalle,nombres:nombres,apellidos:apellidos,correo:correo,numero:numero,nacionalidad:nacionalidad},


             beforeSend: function() {
              $("#enviarform").hide();
              $("#gifenviar").show();

            },
             success:function(response)
             {

                if(response.message == 1)
                {

                  mensaje("Nuestros especialistas te contactarán lo más pronto posible.","success");
                  $.magnificPopup.close();
                  $("#detalle").val("");
                  $("#nombres").val("");
                  $("#apellidos").val("");
                  $("#correo").val("");
                  $("#numero").val("");
                  $("#gifenviar").hide();
                  $("#enviarform").show();
                }
                else
                {
                  mensaje('Ocurrio un error.Intentelo mas tarde.',"danger")
                }
             }
        });


  });

   $("#solicita").on('click',function() {

    $.magnificPopup.open({
     fixedContentPos : false,

      removalDelay: 400,
      items: {
        src: "#modal-form"
      },
      callbacks: {
        beforeOpen: function(e) {
          this.st.mainClass = 'mfp-newspaper';
        }
      },
      midClick: true
    });

  });









      // use esta configuracion simple para valores por defecto
      //$('div.expandable p').expander();
      // *** O ***
      // configure de la siguiente manera
      $('div.expandable p').expander({
      slicePoint: 60, // si eliminamos por defecto es 100 caracteres
      expandText: '[...]', // por defecto es 'read more...'
      collapseTimer: 5000, // tiempo de para cerrar la expanci¨®n si desea poner 0 para no cerrar
      userCollapseText: '[^]' // por defecto es 'read less...'
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

  });
</script>
<?php

$titulo = "";
  if (isset(Request::only(['txtbusqueda'])['txtbusqueda'] )) {
    $titulo =Request::only(['txtbusqueda'])['txtbusqueda'] ;
  }
$precio = "";
   if (isset(Request::only(['precio'])['precio'] )) {
    $precio =Request::only(['precio'])['precio'] ;
  }
  $paiss = "";
  if (isset(Request::only(['paiss'])['paiss'] )) {
    $paiss =Request::only(['paiss'])['paiss'] ;
  }
?>
  <script type="text/javascript">
    var titulo = "{{ $titulo }}"
    var precio = "{{ $precio }}"
    var pais = "{{ $paiss }}"
    if (precio!="" || pais!=""){$(".avanzado").show();}
    $("#precio").val(precio);
    $("#paiss").val(pais);
    console.log(pais)
    var m=0;
    /*var txt = '{{ Input::get('txtbusqueda') }}';

 if (txt!='' ) {
      m = 1;
      $(".avanzado").show();
    }*/

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
@include('include.search_trabajadores')



  <div id="modal-form" class=" popup-basic admin-form mfp-with-anim mfp-hide">
          <div class="panel">
            <div class="panel-heading">
              <span class="panel-title">
                <i class="fa fa-rocket"></i>@lang('admin.solicitainformacionm')</span>
            </div>


            <form method="post" action="" id="informacion">
              <div class="panel-body p25">

                <div class="section">
                  <h5>@lang('admin.txtcuentanostunecesi') *</h5>
                  <label for="detalle" class="field prepend-icon">
                    <textarea class="gui-textarea" id="detalle" name="detalle" placeholder="@lang('admin.placeholdetallerequir')" required></textarea>
                    <label for="detalle" class="field-icon">
                      <i class="fa fa-comments"></i>
                    </label>
                  </label>
                </div>

                  <div class="section row">
                  <div class="col-md-6">
                    <h5>@lang('admin.txtnombrestitu') *</h5>
                    <label for="nombres" class="field prepend-icon">
                      <input type="text" name="nombres" id="nombres" class="gui-input" placeholder="@lang('admin.placeholnombres')" required>
                      <label for="nombres" class="field-icon">
                        <i class="fa fa-user"></i>
                      </label>
                    </label>
                  </div>


                  <div class="col-md-6">
                    <h5>@lang('admin.txtapellidostitu') *</h5>
                    <label for="apellidos" class="field prepend-icon">
                      <input type="text" name="apellidos" id="apellidos" class="gui-input" placeholder="@lang('admin.placeholapellidos')" required>
                      <label for="apellidos" class="field-icon">
                        <i class="fa fa-user"></i>
                      </label>
                    </label>
                  </div>


                </div>


                <div class="section row">
                  <div class="col-md-6">
                    <h5>@lang('admin.txtcorreoelectro') *</h5>
                    <label for="correo" class="field prepend-icon">
                      <input type="email" name="correo" id="correo" class="gui-input" placeholder="@lang('admin.txtcorreoelectro')" required>
                      <label for="correo" class="field-icon">
                        <i class="fa fa-envelope"></i>
                      </label>
                    </label>
                  </div>

                  <div class="col-md-6">
                    <h5>@lang('admin.txtwhastappti') *</h5>
                    <label for="numero" class="field prepend-icon">
                      <input type="text" name="numero" id="numero" class="gui-input" placeholder="@lang('admin.txtplaceholnum')" required>
                      <label for="numero" class="field-icon">
                        <i class="fa fa-phone"></i>
                      </label>
                    </label>
                  </div>

                </div>


               <div class="section row">
                  <div class="col-md-6">
                    <h5>@lang('traduccion1.sub1trabajadores')  *</h5>
                    <label for="correo" class="field prepend-icon">
                      <select class="form-control" id="cbx_correo" required>
                        <option value="">@lang('traduccion1.sub2trabajadores')</option>
                            @foreach($pais as $value)
                            <option value="{{ $value->id_country }}">{{ $value->name_country }}</option>
                            @endforeach
                      </select>
                    </label>
                  </div>
                <div class="col-md-6" align="center">
                        <button type="submit" id="enviarform" class="button btn-primary" style="margin-top: 28px;">@lang('admin.btnenviarform')</button>
                  </div>

                </div>





              </div>

              <div class="panel-footer">
                <!--<div class="row">-->
                <!--  <div class="col-md-4">-->

                <!--  </div>-->
                <!--  <div class="col-md-4" align="center">-->
                <!--    <button type="submit" id="enviarform" class="button btn-primary">@lang('admin.btnenviarform')</button>-->
                <!--     <img src="img/edit/estegif.gif" width="50%" height="50%" style="display: none;" id="gifenviar">-->
                <!--  </div>-->
                <!--  <div class="col-md-4">-->

                <!--  </div>-->
                <!--</div>-->

              </div>

            </form>
          </div>

        </div>




   <div class="tray tray-center" style="padding-left: 10px">
          <div class=" mw1000 center-block  animated fadeIn" style="padding-top: 30px;border-radius: 20px">
<div class="admin-form theme-primary">
  <div class="panel heading-border panel-primary">
    <div class="panel-body bg-light">
        <!--<div class="section-divider mb40" id="spy1">-->
        <!--  <span style="font-size: 25px">@lang('admin.txttrabajadoresencontra')</span>-->
        <!--</div>-->
          <div id="trabajadores_paginate">
          @foreach($trabajadores as $values)
              <div class="panel panel-info" style="border-radius: 50px">
                    <div class="panel-body" style="border: none;">
                      <div class="row">

                         <?php
                         $foto =  $values->imagen;
                         $plasmar = "";

                         if($foto!=null)
                          {
                              $plasmar =  $values->imagen;
                          }
                          else
                          {
                            $plasmar = 'img/none.png';
                          }

                         ?>
                        <div class="col-md-2" style="padding-top:14px">
                          <center>
                            <img src="{{$plasmar}}" width="130" height="120" style="border-radius: 60%; ">
                          <p style="padding-top: 10px">
                            @if ($values->id_country==0)
                            @lang('traduccion1.sub3trabajadores') <br>
                          @else
                            {{ $values->name_country  }} -  <img src="img/pais/{{ $values->codigo_pais }}.gif" width="30" height="20"><br>
                            @if($values->precio_hora!=null)
                            <div>@lang('traduccion1.sub4trabajadores'): ${{ $values->precio_hora }}</div>
                            @endif

                          @endif
                        </p>
                      </center>
                    </div>
                        <div class="col-md-7">

                                <a href="verperfil/{{ $values->id }}"  style="font-size: 20px;font-weight: bold;color: #3bafda" id="{{$values->id}}">{{ $values->nombres ." ".$values->apellidos ."   "}}</a>


                          <p>
                             <b>@lang('admin.txtperfiltrabenco')</b>
                            @if ($values->perfil==null)
                             @lang('traduccion1.sub5trabajadores') 
                              @else
                              <div class="expandable">
                                  <p>  {{ $values->perfil  }}</p>
                                </div>
                            @endif
                          </p>

                          <p>
                            <div class="admin-form theme-primary" style="width: 100%;">
                              <span class="rating block">
                              <span><i class="fa fa-user" style="float: left;padding-right:  10px;"></i>&nbsp;&nbsp;</span>
                              <div style="float: left;">
                              <input class="rating-input" id="r5" type="radio" name="custom">
                              <label class="rating-star" for="r5">
                                <i class="fa fa-star"></i>
                              </label>
                              <input class="rating-input" id="r4" type="radio" name="custom">
                              <label class="rating-star" for="r4">
                                <i class="fa fa-star"></i>
                              </label>
                              <input class="rating-input" id="r3" type="radio" name="custom">
                              <label class="rating-star" for="r3">
                                <i class="fa fa-star"></i>
                              </label>
                              <input class="rating-input" id="r2" type="radio" name="custom">
                              <label class="rating-star" for="r2">
                                <i class="fa fa-star"></i>
                              </label>
                              <input class="rating-input" id="r1" type="radio" name="custom">
                              <label class="rating-star" for="r1">
                                <i class="fa fa-star"></i>
                              </label>
                              </div>
                              </span>
                            </div>
                          </p>
                          <p>@lang('traduccion1.sub6trabajadores'): {{date('d-m-Y',strtotime($values->fecha))}}</p>
                          <?php

                             $certificadoswe = \App\Certifi_user::where('id',$values->id)->get();
                             //echo $certificadoswe;
                          ?>
                            <div class="expandable">
                          <p><b>@lang('traduccion1.sub7trabajadores'):</b>
                              <?php
                              foreach ($certificadoswe as $key) {
                                  echo $key->nombre_cer." - ";
                              }

                            ?>
                          </p>
                          <p><b>@lang('traduccion1.sub8trabajadores'):</b>
                          <?php
                          $un = $values->unoconocimiento;
                          $do =$values->dosconocimiento;
                          $tre = $values->tresconocimiento;
                            $t = "";
                            if(trim($un)!="" ||$un!=null){
                                $t =$un;
                            }
                            if(trim($do)!="" ||$do!=null){
                                if(trim($un)!="" ||$un!=null){
                                    $t.=", ";
                                }
                                $t .=$do;
                            }
                              if(trim($tre)!="" ||$tre!=null){
                                if(trim($un)!="" ||$un!=null){
                                    if(trim($do)=="" ||$do==null){
                                        $t.=", ";
                                    }
                                }else{
                                    if(trim($do)!="" ||$do!=null){
                                        $t.=", ";
                                    }
                                }
                                
                                $t .=$tre;
                            }
                            
                          ?>
                          {{ $t }}
                          </p>
                        </div>

                          <p>
                            <div class="col-md-6" style="padding: 0px;padding-bottom: 10px">@lang('traduccion1.sub9trabajadores'):
                              <?php
                              $vr = $values->reconocimiento;
if($vr==0)
  {
    $medalla = 'img/medallas-labora/medalla-inicio.png';
    $textomedalla = "INICIO";
  }
  if($vr==1)
  {
    $medalla = 'img/medallas-labora/medalla-entusiasta.PNG';
    $textomedalla ='ENTUSIASTA';
  }
  if($vr==2)
   {
    $medalla = 'img/medallas-labora/medalla-honorable.PNG';
    $textomedalla = 'HONORABLE';
   }

   if($vr==3)
   {
    $medalla = 'img/medallas-labora/medalla-asociado.PNG';
    $textomedalla = 'ASOCIADO';
   }
   if($vr==4)
   {
    $medalla ='img/medallas-labora/medalla-partner.PNG';
    $textomedalla ='PARTNER';
   }
   if($vr==5)
   {
    $medalla ='img/medallas-labora/medalla-especialista.PNG';
    $textomedalla ='ESPECIALISTA';
   }

   if($vr==6)
  {
    $medalla ='img/medallas-labora/medalla-experto.PNG';
    $textomedalla ='EXPERTO';
  }
   if($vr==7)
    {
    $medalla ='img/medallas-labora/medalla-master.PNG';
    $textomedalla ='MASTER';

    }
                              ?>
                              <img src="{{$medalla}}" width="50" height="50">{{$textomedalla}}
                            </div>

                            <div class="col-md-6" style="padding-top: 15px;">@lang('traduccion1.sub10trabajadores') {{$values->nivel}}</div>
                          </p>
                        </div>
                        <div class="col-md-1"> </div>
                        <div class="col-md-3">
                          <div style="padding-top: 10%">
                            <center>
                   <!--          <p><button class="btn btn-sm btn-primary btn-block" style="width: 150px">@lang('admin.btnadirfavov')</button></p> -->
                            <p style="padding-left: 15px">

                                 <a href="emplear/{{ $values->id }}" class="btn btn-sm btn-primary btn-block" style="width: 135px;font-size: 15px">@lang('traduccion1.sub11trabajadores')</a></p>



                              <div class="col-md-12" style="font-size: 12px;padding-left: 30px" >

                                <center>
                                  @if(Auth::guest())
                                      <div class="col-xs-6">
                                      <center>
                                      <a href="register" class="btn btn-sm btn-primary" style="width: 50px;">
                                      <img src="img/icon/favorito.png" width="30" height="30">
                                      </a>
                                      <br/>
                                     @lang('traduccion1.sub12trabajadores') 
                                      <br><br>
                                       </center>
                                         </div>
                                             <div class="col-xs-6">
                                     <center>
                                  <a href="register" class="btn btn-sm btn-primary" style="width: 50px;">
                                  <img src="img/icon/messenger.png" width="30" height="30">
                                </a>
                                @lang('traduccion1.sub13trabajadores')</center>

                                  </div>
                                      @else
                                       <div class="col-xs-6">
                                       <center>
                                       <button class="btn btn-sm btn-primary favorite" style="width: 50px;" data-id="{{ $values->id }}">
                                        <img src="img/icon/favorito.png" width="30" height="30">
                                      </button>
                                      <br/>
                                      @lang('traduccion1.sub14trabajadores')
                                      <br><br>
                                       </center>
                                     </div>
                                         <div class="col-xs-6">
                                     <center>
                                  <button class="btn btn-sm btn-primary contactar" style="width: 50px;" data-id="{{ $values->id }}">
                                  <img src="img/icon/messenger.png" width="30" height="30">
                                </button>
                                @lang('traduccion1.sub15trabajadores')&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</center>
                                  </div>
                                      @endif

                                </center>
                              </div>
                            <p style="padding-top: 20px">
                            </p>
                            </center>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  @endforeach
                    @if(count($trabajadores)==0)
                    <div class="row">
                      <div class="col-md-12" style="text-align: center;">
                        <div class="promo-title style-scope ytd-background-promo-renderer"><h2><b>@lang('admin.txtnosehanencontradores')</b></h2></div>
                        <div class="promo-body-text style-scope ytd-background-promo-renderer">@lang('admin.txtpruebaconotraspalabclave')</div>
                            {{-- <p>No hemos encontrado coincidencias, Deseas que te enviemos un email cuando se publiquen trabajos similares?</p> --}}
                          </div>
                        {{--   <div class="col-md-2">
                            <button class="btn btn-primary">NOTIFICAR</button>
                          </div> --}}
                    </div>
                    @endif

           <center>{{ $trabajadores->appends(Request::only(['txtbusqueda']))->render() }} </center>
                  </div>

    </div>
  </div>
</div>


      </div>
    </div>

@endsection
