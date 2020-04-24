@extends('layouts.admin2')
@section('css')
  <!--<link rel="stylesheet" type="text/css" href="datatable/dataTables.bootstrap.min.css">-->
  <link rel="stylesheet" type="text/css" href="datatable/responsive.bootstrap.min.css">

<style type="text/css">

                            #popup1 a[id='axd1'] span[id='spaxd1'] {
                                        display: none;
                                            }

                             #popup1 a[id='axd1']:hover span[id='spaxd1'] {
                                        display: block;
                                        position: absolute;
                                        z-index: 3;
                                        /*top: 0px;*/
                                        /*left: 170px;*/
                                        margin: 0px;
                                        margin-left: -250px;
                                        padding: 10px;
                                        width: 330px;
                                        color: #335500;
                                        font-weight: normal;
                                        background: #e5e5e5;
                                        border: 1px solid #666;
                                      }



</style>



@endsection
@section('contenido')


 <div class="tray tray-center" style="padding-left: 10px">
          <div class=" mw1200 center-block  animated fadeIn" style="padding-top: 30px;">
          <div class="admin-form theme-primary">
              <div class="panel heading-border panel-primary">
                <div class="panel-body bg-light">
                  <form method="post" action="" id="form-ui">
                    <div class="section-divider mb40" id="spy1">
                      <span style="font-size: 25px"> @lang('admin.txtmistrabajostra') </span>
                    </div>

            <div class="col-md-12">
              <div class="panel panel-visible" id="spy2">
                <div class="panel-heading" style="padding: 0px;">
                  <div class="panel-title hidden-xs" style="font-size: 20px;">
                    &nbsp;<span class="glyphicon glyphicon-tasks"></span>[]</div>
                </div>
                <div class="panel-body pn">
                  <table id="datatable2" class="table table-striped table-bordered nowrap " style="width:100%">
                      <thead>
                      <tr>
                        <th style="width: auto;">@lang('traduccion1.sub1trabajos') </th>
                        <th>@lang('traduccion1.sub2trabajos')</th>
                        <th>@lang('admin.tableempleadortra')</th>
                        <th style="width: 10%">@lang('traduccion1.sub3trabajos')</th>
                        <th>@lang('admin.tableestadodelaprotra')</th>
                        <th>@lang('admin.tableacuerdostra')</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($trabajos as $values)


                      <tr>
                        <td>
                          <input type="hidden" value="{{ $values->titulo }}" id="proy_"{{ $values->id_project }}>
                          <a href="javascript:void(0);" data-id="{{ $values->id_project }}" onclick="titulo(this);">{{ $values->titulo }}</a>
                        </td>
                        <td><center>
                          <input type="hidden" value="{{ $values->presentation }}" id="final_{{ $values->id_trabajo_aplicado  }}">
                          <input type="hidden" value="{{ round($values->sinnueve,2) }}" id="costo_{{ $values->id_trabajo_aplicado  }}">
                          <input type="hidden" value="{{ $values->time_finish  }}" id="tiempo_{{ $values->id_trabajo_aplicado  }}">
                          <input type="hidden" value="{{ $values->titulo }}" id="titulo_{{ $values->id_trabajo_aplicado }}" />
                          <input type="hidden" value="{{ $values->type_time }}" id="tipo__{{ $values->id_trabajo_aplicado }}" />
                          <input type="hidden" value="{{ $values->date_contract}}" id="fecha_{{ $values->id_trabajo_aplicado }}" />
                          <a href="javascript:modal('{{ $values->id_trabajo_aplicado }}')"><i class="fa fa-credit-card"></i></a></center></td>
                        <td>
                          <input type="hidden" value="{{ $values->usuario }}" id="usu_"{{ $values->id_user_employer }}>
                          <a href="javascript:usuario('{{ $values->id_user_employer }}')">{{ $values->usuario }}</a>
                        </td>
                        <td>

<div class="expandDiv">
{{ $values->habilidades }}
</div>
                        </td>
                        <td style="padding: 0px;">
                          <center>
                          @switch($values->state_aplication)
                            @case(1)
                            <div id="popup1">
                              <a id="axd1"  style="text-decoration: none;">
                                <span id="spaxd1">
                                   @lang('traduccion1.sub4trabajos')
                                </span>
                            <img src="{{ asset('img/pendiente.png') }}" alt="PENDIENTE"  align="center">
                           <h6><small>@lang('traduccion1.sub5trabajos')</small></h6>
                              </a>
                            </div>
                            @break

                            @case(2)
                            <div id="popup1">
                              <a id="axd1"  style="text-decoration: none;">
                                <span id="spaxd1">
                                 @lang('traduccion1.sub6trabajos') 
                                </span>
                                <img src="{{ asset('img/visto.png') }}" alt="VIO PROPUESTA"  align="center" height="50">
                                <h6><small>Visto</small></h6>
                              </a>
                            </div>

                            @break

                            @case(3)
                            <div id="popup1">
                              <a id="axd1"  style="text-decoration: none;">
                                <span id="spaxd1">
                                 @lang('traduccion1.sub7trabajos') 
                                </span>
                                <img src="{{ asset('img/evaluacion.png') }}" alt="EVALUACION DE USUARIO"  align="center" height="50">
                                <h6><small>@lang('traduccion1.sub8trabajos')</small></h6>
                              </a>
                            </div>

                            @break

                            @case(4)
                            <div id="popup1">
                              <a id="axd1"  style="text-decoration: none;">
                                <span id="spaxd1">
                                 @lang('traduccion1.sub9trabajos') 
                                </span>
                                <img src="{{ asset('img/contratado.png') }}" alt="CONTRATADO"  align="center" height="50">
                                <h6><small>@lang('traduccion1.sub10trabajos')</small></h6>
                              </a>
                            </div>

                            @break

                            @case(5)
                            <div id="popup1">
                              <a id="axd1" style="text-decoration: none;">
                                <span id="spaxd1">
                                 @lang('traduccion1.sub11trabajos') 
                                </span>
                                 <img src="{{ asset('img/finalizado.png') }}" alt="CONTRATADO"  align="center" height="50">
                                 <h6><small>@lang('traduccion1.sub12trabajos')</small></h6>
                              </a>
                            </div>

                            @break

                            @default

                        @endswitch
                      </center>
                         </td>
                        <td><center><a href="javascript:acuerdos('{{ $values->id_trabajo_aplicado }}','{{ $values->id_project }}','{{ $values->id }}','{{ $values->titulo }}')"><i class="fa fa-folder-open"></i></a></center></td>
                      </tr>
                      @endforeach
                    </tbody>
                   </table>
                </div>
              </div>
            </div>



                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>



 {{-- ///////////////////MODAL PROPUESTA////////////////////////// --}}

    <div id="modal-form" class="popup-basic admin-form mfp-with-anim mfp-hide" >
          <div class="panel">
            <div class="panel-heading">
              <span class="panel-title">
                <i class="fa fa-rocket"></i>.: @lang('traduccion1.sub13trabajos') :.</span>
            </div>
                <input type="hidden" id="es" name="es">
            <!-- end .panel-heading section -->

            {{-- <form method="POST"  id="form-invitar"> --}}
              <div class="panel-body" style="padding-bottom: 0px">

                  <label for="" class="field prepend-icon"><b>@lang('traduccion1.sub14trabajos'):</b><br><br>
                      <p id="namereque"></p>
                  </label>

                  <br/><br/>

                    <label for="firstname" class="field prepend-icon"><b>@lang('traduccion1.sub15trabajos'):</b><br><br>
                      <p id="ver"></p>
                      </label>
                    <br><br>
           <div class="section row">
                  <div class="col-md-6">
                    <label for="firstname" class="field prepend-icon">
                      <b>@lang('traduccion1.sub16trabajos'):</b>
                      <label for="firstname" class="field-icon">
                      </label>
                    </label>
                  </div>

                  <div class="col-md-6">
                    <label for="lastname" class="field prepend-icon">
                      <p id="ver2"></p>
                      <input type="text" id="prec" name="prec" class="form-control" style="display: none;">
                      <label for="lastname" class="field-icon">
                      </label>
                    </label>
                  </div>
                </div>
                
             <div class="section row">
                  <div class="col-md-6">
                    <label for="firstname" class="field prepend-icon">
                      <b>Fecha de propuesta:</b>
                      <label for="firstname" class="field-icon">
                      </label>
                    </label>
                  </div>

                  <div class="col-md-6">
                    <label for="lastname" class="field prepend-icon">
                      <p id="verxd1"></p>
                      <input type="text" id="fecha" name="fecha" class="form-control" style="display: none;">
                      <label for="fecha" class="field-icon">
                      </label>
                    </label>
                  </div>
                </div>              
                
                
                
                <div class="section row">
                  <div class="col-md-6">
                    <label for="firstname" class="field prepend-icon">
                      <b>@lang('traduccion1.sub17trabajos'):</b>
                    </label>
                  </div>

                  <div class="col-md-6">
                    <label for="lastname" class="field prepend-icon">
                        <div id="mostrar_div_t" style="display:none">
                        <input type="text" class="form-control" style="width: 40%;float:left" id="cantidad_t">
                            <select class="form-control" style="width: 40%;float:left" id="tipo_t">
                                <option value="1">Horas</option>
                                <option value="2">Dias</option>
                                <option value="3">Semanas</option>
                                <option value="4">Meses</option>
                            </select>
                        </div>
                        
                      <p id="ver3"></p>
                      <label for="lastname" class="field-icon">
                      </label>
                    </label>
                  </div>
                </div>
              </div>

              <div class="panel-footer">
                <center>
                  <button  class="button btn-primary" id="editar"> @lang('traduccion1.sub18trabajos')
                </button>

                <button  class="button btn-primary" id="guardar" onclick="guardar()" style="display: none;"> @lang('traduccion1.sub19trabajos') </button>
                <button  class="hiden button btn-primary" id="cancelar" style="display: none;"> @lang('traduccion1.sub20trabajos') </button>
                <button  class="button btn-primary" id="cerrar">@lang('traduccion1.sub21trabajos') </button>
                </center>
              </div>

          {{-- </form> --}}

          </div>
        </div>



                {{-- ///////////////////MODAL usuario-empleador////////////////////////// --}}
    <div id="usuario-empleador" class="popup-basic admin-form mfp-with-anim mfp-hide" >
          <div class="panel">
            <div class="panel-heading">
              <span class="panel-title">
                </i>@lang('traduccion1.sub22trabajos')</span>
            </div>
              <div class="panel-body">
                <div class="row">
                  <div class="col-sm-4" style="height: 100%;">
                    <center>
                    <img  alt="" id="imgusu" height="120px" width="130px" style="border-radius: 60%;" >
                    <br/><br/>
                    <img id="pais_emp"  width="30" height="20">
                    </center>
                  </div>
                  <div class="col-sm-8" style="left: 2.5%;position: relative;bottom: 20px">
                      <h3 id="nombres" style="color:green"></h3>
                    <span class="imoon imoon-home" title="@lang('traduccion1.sub23trabajos')"> : <span id="direccion_emp"></span></span> <br/><br/>
                    <span class="fa fa-phone" title="@lang('traduccion1.sub24trabajos')"> : <span id="telefono_emp"></span></span> <br/><br/>
                    <span class="fa fa-qrcode" title="@lang('traduccion1.sub25trabajos')"> : <span id="nit_emp"></span> </span>
                  </div>
                </div>

                <div class="row">
                <div class="col-12 divider text-center" style="margin-top:20px;">
                </div>
                <div class="col-md-12">
                  <div class="row mb10" id="spy7">
             <div class="col-md-3"></div>
              <div class="col-md-4" style="border: solid 2px green;width: 200px;text-align: center;font-size: 13px">
                <p >@lang('traduccion1.sub26trabajos') <h5 id="contrar3"></h5> </p>
              </div>

                    </div>
                </div>
                 <div class="col-md-12">
                  <label><h3><b>@lang('traduccion1.sub27trabajos'):</b></h3></label>
                  <p id="descrip_emp"></p>
              </div>
            </div>
              </div>
              <div class="panel-footer">
                <center>
                <!--<button  class="button btn-primary"> Contactar </button>-->
                <button  class="button btn-primary" id="cerrar3">@lang('traduccion1.sub28trabajos') </button>
                </center>
              </div>
        </div>
      </div>


      {{-- ///////////////////MODAL usuario////////////////////////// --}}
<div id="usuario" class="popup-basic admin-form mfp-with-anim mfp-hide" >
<div class="panel">
  <div class="panel-heading">
    <span class="panel-title">
      </i>@lang('traduccion1.sub29trabajos')</span>
  </div>
    <div class="panel-body">
      <div class="row">
        <div class="col-sm-4" style="height: 100%;">
          <center>
            <img  alt="" id="imgusuu" height="120px" width="130px" style="border-radius: 60%;">
            <br/><br/>
            <img id="pais_empu"  width="30" height="20">
          </center>
        </div>
        <div class="col-sm-8" style="left: 2.5%;position: relative;bottom: 20px">
          <br/><br/><br/>
            <h3 id="nombresu" style="color:green"></h3>
        </div>
      </div>
      <div class="row">
      <div class="col-12 divider text-center" style="margin-top:20px;">
      </div>
      <div class="col-md-12">
        <div class="row mb10" id="spy7">
   <div class="col-md-3"></div>
    <div class="col-md-4" style="border: solid 2px green;width: 200px;text-align: center;font-size: 13px">
      <p >@lang('traduccion1.sub30trabajos') <h5 id="contrar3u"></h5> </p>
    </div>

          </div>
      </div>
       <div class="col-md-12">
        <label><h3><b>@lang('traduccion1.sub31trabajos'):</b></h3></label>
        <p id="descrip_empu"></p>
    </div>
  </div>
    </div>
    <div class="panel-footer">
      <center>
      <!--<button  class="button btn-primary"> Contactar </button>-->
      <button  class="button btn-primary" id="cerrar2">@lang('traduccion1.sub32trabajos') </button>
      </center>
    </div>
</div>
</div>






                {{-- /////////////////// ---- MODAL PARA VER EL PERFIL DEL PROYECTO ----- ////////////////////////// --}}

    <div id="perfil-proyecto" class="popup-basic popup-lg admin-form mfp-with-anim mfp-hide">
          <div class="panel">
            <div class="panel-heading">
              <span class="panel-title" style="color: black;text-align: center;">
                </i><b> .: @lang('traduccion1.sub33trabajos') :. </b></span>
            </div>
              <div class="panel-body">
                <div class="section-divider mb40" id="spy1">
                      <b><span id="titulo"></span></b>
                    </div>


                    <div class="row">
                      <div class="col-sm-6">
                        <label for="" style="color:black"><b>@lang('traduccion1.sub34trabajos'):</b></label>
                      </div>
                      <div class="col-sm-6">
                      
                              <label id="nom_empresa"></label>
                    
                      </div>
                    </div>

                    <br/>

                    <div class="row">
                      <div class="col-sm-6">
                        <label for="" style="color: black"><b>@lang('traduccion1.sub35trabajos'): </b></label>
                      </div>
                      <div class="col-sm-6">
                        
                          <label id="estado"></label>
                       
                      </div>
                    </div>

                    <br/>

                    <div class="row">
                      <div class="col-sm-6">
                        <label for="" style="color: black"><b>@lang('traduccion1.sub36trabajos'): </b></label>
                      </div>
                      <div class="col-sm-6">
                       
                            <label id="descripcion"></label>
                        
                      </div>
                    </div>

                    <br/>

                    <div class="row">
                      <div class="col-sm-6">
                        <label for="" style="color: black"><b>@lang('traduccion1.sub37trabajos'): </b></label>
                      </div>
                      <div class="col-sm-6">
                        
                        <label id="fechapubli"></label>
                        
                      </div>
                    </div>

                    <br/>
                    <div class="row">
                      <div class="col-sm-6">
                        <label for="" style="color: black"><b>@lang('traduccion1.sub38trabajos'): </b></label>
                      </div>
                      <div class="col-sm-6">
                        
                        <label id="presupuesto"></label>
                        
                      </div>
                    </div>

                    <br/>

                <div class="row">
                  <div class="col-sm-6">
                    <label for="" style="color: black"><b>@lang('traduccion1.sub39trabajos'): </b></label>
                  </div>
                  <div class="col-sm-6">
                   
                    <label id="cantidadTiem"></label>
                    
                  </div>
                </div>

                <br/>
                <div class="row">
                      <div class="col-sm-6">
                        <label for="" style="color:black"><b>@lang('traduccion1.sub40trabajos'):</b></label>
                      </div>
                      <div class="col-sm-6">
                        
                              <!--<label id="habilidades"></label>-->
                <label class="field prepend-icon">
                    <textarea id="habilidades" class="form-control" disabled></textarea>
                    <label for="present" class="field-icon">
                      <i class="fa fa-comments"></i>
                    </label>

                  </label>                              
                              
                       
                      </div>
                    </div>
                    <br>

              </div>
              <div class="panel-footer">
                <center>
                <!--<button  class="button btn-primary"> Contactar </button>-->
                <button  class="button btn-primary" id="cerrar4"> @lang('traduccion1.sub41trabajos') </button>
                </center>
              </div>
        </div>
      </div>

                   {{-- ///////////////////MODAL ACUERDOS////////////////////////// --}}
{{-- <form class="form-group" action="trabajos_submit" method="POST" accept-charset="utf-8" enctype="multipart/form-data"> --}}
    <div id="acuerdos" class="popup-basic popup-lg mfp-with-anim mfp-hide">
      <div class="panel panel-system">
        <div class="panel-heading">
          <span class="panel-title">
            <i id="titulo2" style="color: black"></i></span>
        </div>
        <div class="panel-body">
        <div class="row" style="text-align: right;">
          <div class="col-md-12">
            <input type="hidden" id="id1" name="id1">
            <input type="hidden" id="id2" name="id2">
            <input type="hidden" id="id31" name="id31">
            {{-- <input  type="show" id="pro" name="pro"> --}}
            {{-- <label id="titulo2"></label> --}}
            <button class="btn btn-primary" id="añadir-acuerdo" data-dismiss="modal" data-backdrop="true">@lang('traduccion1.sub42trabajos')</button>
          </div>
        </div>
      <br>

   <form  id="f_agregar_publicacion"  method="post"  action="agregar_publicacion_usuario" class="formarchivo" >
   <meta name="csrf-token" content="{{ csrf_token() }}">
  <div class="row">
    <input type="hidden" name="ide" id="ide">
    {{-- <input type="show" name="2" id="2">
    <input type="show" name="3" id="3"> --}}
    <div class="col-md-6">
      <input type="text" name="asunto" id="asunto" placeholder="Asunto del acuerdo" class="form-control"><br>
      <textarea placeholder="Escribe aquí el acuerdo" id="acuerdo" name="acuerdo" class="form-control" cols="50" rows="2"></textarea>
    </div>
    <div class="col-md-6">
          <input type="text" name="codigo" hidden="" id="codigo" value="">
     <div class="admin-form theme-primary">
              <!-- File Uploaders -->
       <div class="row">
          <div class="col-lg-12">
            <div class="section" id="verr">
               <label class="field prepend-icon append-button file">
                <span class="button btn-primary">@lang('traduccion1.sub43trabajos')</span>
                <input type="file" class="gui-file" name="file" id="file" onchange="document.getElementById('uploader1').value = this.value;">
                <input type="text" name="uploader1" class="gui-input" id="uploader1" placeholder="@lang('traduccion1.sub44trabajos')">
                <label class="field-icon">
                  <i class="fa fa-upload"></i>
                </label>
              </label>
            </div>
            <div class="row" style="text-align: right;">
            <div class="col-md-12">
               <div class="box-footer">
               <button type="submit" class="btn btn-primary" id="añadir">@lang('traduccion1.sub45trabajos')</button>
               </div>

            <div class="row" style="text-align: right;">
              <div class="col-md-12">
               <button type="button" class="btn btn-primary" id="btneditar">@lang('traduccion1.sub46trabajos')</button>
              </div>
            </div>
            </div>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <br>

  <div class="col-md-12">
              <div class="panel panel-visible" id="spy2">
                <div class="panel-heading" style="padding: 0px;">
                  <div class="panel-title hidden-xs" style="font-size: 20px;">
                    &nbsp;<span class="glyphicon glyphicon-tasks"></span>[]</div>
                </div>
                <div class="panel-body pn">
                  <table id="datatable3" class="table table-striped table-bordered nowrap " style="width:100%">
                      <thead>
                      <tr>
                      <th>@lang('traduccion1.sub47trabajos')</th>
                      <th>@lang('traduccion1.sub48trabajos')</th>
                      <th>@lang('traduccion1.sub49trabajos')</th>
                      <th>@lang('traduccion1.sub50trabajos')</th>
                      <th>@lang('traduccion1.sub51trabajos')</th>
                      <th class="td-actions">@lang('traduccion1.sub52trabajos')</th>
                  </tr>
                    </thead>
                    <tbody id="agrements">
                    </tbody>
                   </table>
                </div>
              </div>
            </div>



    </div>
    <div class="modal-footer">
       <center>
        <button type="button" class="btn btn-primary" onclick="$('.mfp-close').click()">@lang('traduccion1.sub53trabajos')</button>
      </center>
    </div>
        </div>
      </div>




@endsection

@section('js')
<script type="text/javascript" src="datatable/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="datatable/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="datatable/dataTables.responsive.min.js"></script>
<script type="text/javascript" src="js/laborajs/trabajos.js"></script>
<script type="text/javascript" src="{{ asset('js/jquery.expander2.js') }}"></script>
<script type="text/javascript">
$(document).ready(function() {

  $('div.expandDiv').expander({
    slicePoint: 30, //It is the number of characters at which the contents will be sliced into two parts.
    widow: 2,
    expandSpeed: 0, // It is the time in second to show and hide the content.
    userCollapseText: '[^^]' // Specify your desired word default is Less.
  });

  $('div.expandDiv').expander();
});

</script>

 <script>

 function usuario(usuario){

 $.ajax({
   url:'usuario-detalle',
   type:'POST',
   datatype:'json',
   data:{id:usuario},
   success:function(response){

  var con=0;
  var conPro=0;
  var con6=0;
  var tabla="";


 //DATOS DEL USUARIO
  var nombres_usux = response.usuario[0].nombres+' '+ response.usuario[0].apellidos;
  var imagen_usux = response.usuario[0].imagen;
  var pais_usux = response.usuario2[0].codigo_pais;
  var perfil_usux = response.usuario[0].perfil;
 //DATOS DE LA EMPRESA
  var nom_empresax = response.usuario[0].nombre_empresa;
  var direc_empresax = response.usuario[0].direccion_empresa;//
  var tele_empresax = response.usuario[0].telefono_empresa;//
  var desc_empresax = response.usuario[0].descripcion;
  var logo_empresax = response.usuario[0].logo_empresa;
  var pais_empresax = response.usuario[0].codigo_pais;//
  var ruc_empresax = response.usuario[0].nit;




 if (nom_empresax == null && direc_empresax == null && tele_empresax == null && desc_empresax == null && logo_empresax == null && pais_empresax== null && ruc_empresax == null )
 {
 var xd3= "{{ asset('img/none.png') }}";

   if(imagen_usux != null)
 {
     var d = imagen_usux.substr(0,4)
     if(d!="http"){
         $("#imgusuu").attr('src',"/"+imagen_usux)
     }else{
         $("#imgusuu").attr('src',imagen_usux)
     }

 }
 else
 {
       $("#imgusuu").attr('src',xd3);
 }

 var xd4 = "{{ asset('img/x.png') }}"

 var ass2 = "{{  asset('img/pais/') }}";

 if(pais_usux != null)
 {
   $("#pais_empu").attr('src',ass2+'/'+pais_usux+'.gif');
 }
 else {
   $("#pais_empu").attr('src',xd4);
 }


$("#nombresu").html(nombres_usux);
$("#descrip_empu").html(perfil_usux);



$("#contrar3u").html(response.proyecto);

   $.magnificPopup.open({
        fixedContentPos : false,
                        removalDelay: 400,
                        items: {
                          src: "#usuario"
                        },
                        callbacks: {
                          beforeOpen: function(e) {
                            this.st.mainClass = 'mfp-newspaper';
                          }
                        },
                        midClick: true
                      });
 }
 
 else
 {
   // console.log('ALGO SI ESTA LLENO WE :v')
   $("#nombres").html(nom_empresax);
   $("#direccion_emp").html(direc_empresax);
   $("#telefono_emp").html(tele_empresax);
   $("#nit_emp").html(ruc_empresax);
   $("#descrip_emp").html(desc_empresax);

 var xd= "{{ asset('img/none.png') }}";


   if(logo_empresax != null)
 {
     var d = logo_empresax.substr(0,4)
     if(d!="http"){
         $("#imgusu").attr('src',"/"+logo_empresax)
     }else{
         $("#imgusu").attr('src',logo_empresax)
     }

 }
 else
 {
       $("#imgusu").attr('src',xd);
 }

var xd2 = "{{ asset('img/x.png') }}"

var ass = "{{  asset('img/pais/') }}";

if(pais_empresax != null)
{
  $("#pais_emp").attr('src',ass+'/'+pais_empresax+'.gif');
}
else {
  $("#pais_emp").attr('src',xd2);
}



   $("#contrar3").html(response.proyecto);

   $.magnificPopup.open({
        fixedContentPos : false,
                        removalDelay: 400,
                        items: {
                          src: "#usuario-empleador"
                        },
                        callbacks: {
                          beforeOpen: function(e) {
                            this.st.mainClass = 'mfp-newspaper';
                          }
                        },
                        midClick: true
                      });

 }


   }
 });


 };




    $.magnificPopup.close({
      fixedContentPos : false,
                      removalDelay: 400,
                      items: {
                        src: "#era"

                      },
                      callbacks: {
                        beforeOpen: function(e) {
                          this.st.mainClass = 'mfp-newspaper';
                        }
                      },
                      midClick: true
                    });
 </script>

@endsection
