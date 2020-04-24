@extends('layouts.admin2')
@section('css')
  <link rel="stylesheet" type="text/css" href="{{ asset('datatable/dataTables.bootstrap.min.css') }} ">
  <link rel="stylesheet" type="text/css" href="{{ asset('datatable/responsive.bootstrap.min.css') }}">
<!--  AQUI PARA LAS AYUDAS DE PROYECTO Y ESTADO DE PROPUESTA -->

<style type="text/css">

                            .popup1 a span {
                                        display: none;
                                            }

                             .popup1 a:hover span {
                                        display: block;
                                        position: absolute;
                                        z-index: 3;
                                        /*top: 0px;*/
                                        /*left: 170px;*/
                                        margin: 0px;
                                        margin-left: 150px;
                                        padding: 10px;
                                        width: 330px;
                                        color: #335500;
                                        font-weight: normal;
                                        background: #e5e5e5;
                                        border: 1px solid #666;
                                      }




                            .popup2 a span {
                                        display: none;
                                            }

                            .popup2 a:hover span {
                                        display: block;
                                        position: absolute;
                                        z-index: 3;
                                        /*top: 0px;*/
                                        /*left: 170px;*/
                                        margin: 0px;
                                        margin-left: 130px;
                                        padding: 10px;
                                        width: 330px;
                                        color: #335500;
                                        font-weight: normal;
                                        background: #e5e5e5;
                                        border: 1px solid #666;
                                      }



</style>


<!-- FIN -->

@endsection
@section('contenido')
<input type='hidden' value='{{$id}}' id='apli_pro'>
{{-- @include('include.search_proyecto') --}}



          @if(count($aspirant)==0)
          <br><br><br><br>
          <div class="row">
    <div class="col-md-12" style="text-align: center;">
       <div class="promo-title style-scope ytd-background-promo-renderer"><h2><b>@lang('traduccion2.txtsinaspirantes')</b></h2></div>
      <div class="promo-body-text style-scope ytd-background-promo-renderer">@lang('traduccion2.txtnotieaspirantespr')</div>
      </div>
          </div>
          <br><br><br>
          <center><a href="{{ url('proyectos') }}" class="btn btn-primary">@lang('traduccion2.btnvolverapx')</a></center><br>
            @else
            <div class="tray tray-center" style="padding-left: 10px">
          <div class=" mw1200 center-block  animated fadeIn" style="padding-top: 30px;">
          <div class="admin-form theme-primary">
              <div class="panel heading-border panel-primary">
                <div class="panel-body bg-light">
                  {{-- <form method="post" action="" id="form-ui"> --}}
                    <div class="section-divider mb40" id="spy1">
                      <span style="font-size: 25px"> {{ $aspirant[0]->titulo }} </span>
                    </div>
            <div class="col-md-12">
              <div class="panel panel-visible" id="spy2">
                <div class="panel-heading" style="padding: 0px;">
                  <div class="panel-title hidden-xs" style="font-size: 20px;">
                    &nbsp;<span class="glyphicon glyphicon-tasks"></span>[@lang('traduccion2.txttitleaspirantes')]</div>
                </div>
                <div class="panel-body pn">
                  <table id="datatable20" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                      <tr>
                        <th style="width: auto;">@lang('traduccion2.filatxtrequerimi')</th>
                        <th>@lang('traduccion2.filatxtpropuesta')</th>
                        <th>@lang('traduccion2.txttitleaspirantes')</th>
                        <th>@lang('traduccion2.filatxtestadoreque')</th>
                        <th>@lang('traduccion2.filatxtestadopropues')</th>
                        <th>@lang('traduccion2.filatxtacuerdos')</th>
                        <th>@lang('traduccion2.filatxtacciones')</th>
                      </tr>
                    </thead>
                    <tbody>





                      @foreach($aspirant as $value)

                      {{-- {{ $value->estado }} --}}
                     <tr id="tr_{{ $value->id_trabajo_aplicado }}" style="padding: 0px;">
                     <td><a href="javascript:titulo('{{ $value->id_project }}')">{{ $value->titulo }}</a></td>
                     <td><center><a href="javascript:propuesta('{{ $value->id_trabajo_aplicado }}','{{ $value->id_project }}')"><i class="fa fa-credit-card"></i></a></center></td>
                     <td><center><a href="javascript:usuario('{{ $value->id_user_employee }}','{{ $value->id_trabajo_aplicado }}')">
                        @if($value->usuario==null || $value->usuario==null)
                      {{ $value->nombres." ".$value->apellidos }} {{$value}}
                      @else
                      {{$value->usuario}}
                      @endif
                  </a>
                  </center>
                </td>
                      <td style="padding: 0px;">
                        <center>
                        @switch($value->estad)
                            @case(1)
                                <div class="popup1">
                                  <a  style="text-decoration: none;">
                                    <span >
                                      @lang('traduccion2.txtaunnohasrevisado')
                                    </span>
                                <img src="{{ asset('img/publicado.png') }}" alt="publicado">
                                 <h6><small>@lang('traduccion2.txtpublicadoxd')</small></h6>
                                  </a>
                                </div>
                                @break
                            @case(2)
                                <div class="popup1">
                                  <a  style="text-decoration: none;">
                                    <span >
                                      @lang('traduccion2.txtaunnohasrevisado')
                                    </span>
                                <img src="{{ asset('img/publicado.png') }}" alt="publicado">
                                <h6><small>@lang('traduccion2.txtpublicadoxd')</small></h6>
                                  </a>
                                </div>
                                @break
                            @case(3)
                                <div class="popup1">
                                  <a style="text-decoration: none;">
                                    <span >
                                      @lang('traduccion2.txtyarevisastealgun')
                                    </span>
                                 <img src="{{ asset('img/evaluacion_p.png') }}" alt="evaluacion">
                                 <h6><small>@lang('traduccion2.txtevaluandoxd')</small></h6>
                                  </a>
                                </div>
                                @break
                            @case(4)
                                <div class="popup1">
                                  <a style="text-decoration: none;">
                                    <span>
                                      @lang('traduccion2.txttieneuncolaborador')
                                    </span>
                                  <img src="{{ asset('img/trabajando.png') }}" alt="trabajando">
                                  <h6><small>@lang('traduccion2.txttrabajandoxd')</small></h6>
                                  </a>
                                </div>
                                @break
                            @case(5)
                                <div class="popup1">
                                  <a  style="text-decoration: none;">
                                    <span >
                                      @lang('traduccion2.txtrequerimientoconclu')
                                    </span>
                                  <img src="{{ asset('img/finalizado_p.png') }}" alt="finalizado">
                                  <h6><small>@lang('traduccion2.txtfinalizadoxd')</small></h6>
                                  </a>
                                </div>
                                @break

                               @default
                        @endswitch
                         </center>
                      </td>
                      <td>

                              @switch($value->state_aplication)
                                @case(1)
                                <center>
                                  <div class="popup2">
                                    <a style="text-decoration: none;">
                                      <span >
                                        @lang('traduccion2.txtaunnosreviprop')
                                      </span>
                                    <img src="{{ asset('img/pendiente.png') }}" alt="PENDIENTE"  align="center">
                                    <h6><small>@lang('traduccion2.txtpendientexd')</small></h6>
                                    </a>
                                  </div>
                                 </center>
                                @break

                                @case(2)
                                <center>
                                  <div class="popup2">
                                    <a  style="text-decoration: none;">
                                      <span>
                                        @lang('traduccion2.txtpropuestavista')
                                      </span>
                                <img src="{{ asset('img/visto.png') }}" alt="VIO PROPUESTA"  align="center" height="50">
                                <h6><small>@lang('traduccion2.txtvistoxd')</small></h6>
                                    </a>
                                  </div>
                                 </center>
                                @break

                                @case(3)
                                <center>
                                  <div class="popup2">
                                    <a style="text-decoration: none;">
                                      <span>
                                        @lang('traduccion2.txthasrevisadoperfilcolabo')
                                      </span>
                                <img src="{{ asset('img/evaluacion.png') }}" alt="EVALUACION DE USUARIO"  align="center" height="50">
                                <h6><small>@lang('traduccion2.txtevaluacionxd')</small></h6>
                                    </a>
                                  </div>
                                 </center>
                                @break

                                @case(4)
                                <center>
                                  <div class="popup2">
                                    <a style="text-decoration: none;">
                                      <span>
                                        @lang('traduccion2.txthascontratado')
                                      </span>
                                <img src="{{ asset('img/contratado.png') }}" alt="CONTRATADO"  align="center" height="50">

                                 <a id="cambiarl" class="btn btn-primary"  data-id="{{$value->id_trabajo_aplicado}}" data-id_usuario='{{ $value->id }}' data-proyecto="{{$value->id_project}}">@lang('traduccion2.txtaprobarentrega')</a>
                                    </a>
                                  </div>

                                </center>
                                @break

                                @case(5)
                                <center>
                                  <div clas="popup2">
                                    <a  style="text-decoration: none;">
                                      <span>
                                        @lang('traduccion2.txthasconcluido')
                                      </span>
                                <img src="{{ asset('img/finalizado.png') }}" alt="FINALIZADO"  align="center" height="50">
                                <h6><small>@lang('traduccion2.txtfinalizadoxd')</small></h6>
                                    </a>
                                  </div>
                                 </center>
                                @break

                              @endswitch

                      </td>
                      <td> <center><a href="javascript:acuerdos('{{ $value->id_trabajo_aplicado }}','{{ $value->id }}','{{ $value->titulo }}')"><i class="fa fa-folder-open"></i></a> </center></td>
                      <td>
                        <center>




                             @if($value->state_aplication == 1)
                             <a class="btn btn-xs btn-info btn-block" title="ACEPTAR PROPUESTA" onclick="modalxd(this)" data-id="{{$value->id_trabajo_aplicado}}" data-id_usuario='{{$value->id}}' data-proyecto="{{$value->id_project}}">@lang('traduccion2.btnaceptarpropuesta')</a>
                             @endif

                             @if($value->state_aplication == 2)
                             <a class="btn btn-xs btn-info btn-block" title="ACEPTAR PROPUESTA" onclick="modalxd(this)" data-id="{{$value->id_trabajo_aplicado}}" data-id_usuario='{{$value->id}}' data-proyecto="{{$value->id_project}}">@lang('traduccion2.btnaceptarpropuesta')</a>
                             @endif

                             @if($value->state_aplication == 3)
                             <a class="btn btn-xs btn-info btn-block" title="ACEPTAR PROPUESTA" onclick="modalxd(this)" data-id="{{$value->id_trabajo_aplicado}}" data-id_usuario='{{$value->id}}' data-proyecto="{{$value->id_project}}">@lang('traduccion2.btnaceptarpropuesta')</a>
                             @endif

                             @if($value->state_aplication == 4)

                             @endif

                            <br/>
                          <button type="button" class="btn btn-xs btn-danger" title='Eliminar Aspirante de Proyecto' data-id="{{ $value->id_trabajo_aplicado }}" data-usuas="{{ $value->usuario }}" data-token="{{ csrf_token() }}" onclick="eliminar(this)">
                            <i class="fa fa-trash"></i>
                          </button>
                        </center>
                      </td>
                     </tr>
                    @endforeach
                    </tbody>
                   </table>
                </div>
              </div>
            </div>


                {{-- <center><button class="btn btn-primary" style="width: 15%">Volver</button></center> --}}
                <center><a href="{{ url('proyectos') }}" class="btn btn-primary">@lang('traduccion2.btnvolverapx')</a></center>
                    {{-- </form> --}}
                  </div>
                </div>
              </div>
            </div>
          </div>
            @endif


                      {{-- ///////////////////MODAL PERFIL////////////////////////// --}}
    <div id="perfil-proyecto" class="popup-basic popup-lg admin-form mfp-with-anim mfp-hide">
          <div class="panel">
            <div class="panel-heading">
              <span class="panel-title">
                {{-- </i>Proyecto</span> --}}
                      <center><b><h2 style="color: black" id="titulo" class="heading"></h2></b></center>
            </div>
              <div class="panel-body">
                <div class="row">
                    <div class="col-sm-6">
                        <label style="color: black"><h4><b> @lang('traduccion2.txtnombrempresa') </b></h4></label>
                    </div>
                    <div class="col-sm-6">
                        <label><h4><b id="nombreempre"></b></h4></label>
                    </div>
                </div>

                <div class="row">
                  <div class="col-sm-6">
                    <label style="color: black"><h4><b> @lang('traduccion2.filatxtestadoreque'): </b></h4></label>
                  </div>
                  <div class="col-sm-6">
                    <label><h4><b id="estado"></b></h4></label>
                  </div>
                </div>


                 <div class="row">
                  <div class="col-sm-6">
                    <label style="color: black"><h4><b> @lang('traduccion2.txtdescripcionempresa') </b></h4></label>
                  </div>
                  <div class="col-sm-6">
                    <label ><h4><b id="descripcion"></b></h4></label>
                  </div>
                </div>



                  <div class="row">
                  <div class="col-sm-6">
                    <label style="color: black"><h4><b> @lang('traduccion2.txtfechapublicaempresa') </b></h4></label>
                  </div>
                  <div class="col-sm-6">
                    <label ><h4><b id="fechapubli"></b></h4></label>
                  </div>
                </div>

                     <div class="row">
                  <div class="col-sm-6">
                    <label style="color: black"><h4><b> @lang('traduccion2.txtpresupuestoempresa') </b></h4></label>
                  </div>
                  <div class="col-sm-6">
                    <label ><h4><b id="presupuestopubli"></b></h4></label>
                  </div>
                </div>



                <div class="row">
                  <div class="col-sm-6">
                    <label style="color: black"><h4><b> @lang('traduccion2.txttiemporequerempresa') </b></h4></label>
                  </div>
                  <div class="col-sm-6">
                    <label ><h4><b id="cantidadTiem"></b></h4></label>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-6">
                    <label style="color: black"><h4><b> @lang('traduccion2.txtconocimientoempresa') </b></h4></label>
                  </div>
                  <div class="col-sm-6">
                    <!--<label ><h4><b id="habilidadespubli"></b></h4></label>-->
                    <label class="field prepend-icon">
                    <textarea id="habilidadespubli" class="form-control" disabled=""></textarea>
                    <label for="present" class="field-icon">
                      <i class="fa fa-comments"></i>
                    </label>

                  </label>
                  </div>
                </div>


              </div>
              <div class="panel-footer">
                <center>
                <button  class="button btn-primary exe" id="cerrar3"> @lang('traduccion2.btncerrarmodal') </button>
                </center>
              </div>
        </div>
      </div>

 {{-- ///////////////////MODAL PROPUESTA////////////////////////// --}}

    <div id="modal-form" class="popup-basic admin-form mfp-with-anim mfp-hide" >
          <div class="panel">
            <div class="panel-heading">
              <span class="panel-title" style="color: black">
                <i class="fa fa-rocket"></i>@lang('traduccion2.txttitlepropuesta')</span>
            </div>
                <input type="hidden" id="es" name="es">
            <!-- end .panel-heading section -->

            {{-- <form method="POST"  id="form-invitar"> --}}
              <div class="panel-body" style="padding-bottom: 0px">

                    <label style="color: black" for="firstname" class="field prepend-icon"><b>@lang('traduccion2.txtpresentacionprop')</b><br><br>
                      <p id="ver"></p>
                      </label>
                    <br><br>
           <div class="section row">
                  <div class="col-md-6">
                    <label style="color: black" for="firstname" class="field prepend-icon">
                      <b>@lang('traduccion2.txtpropuestaeconprop')</b>
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
                    <label style="color: black" for="firstname" class="field prepend-icon">
                      <b>@lang('traduccion2.txtterminaratrabajaprop')</b>
                    </label>
                  </div>

                  <div class="col-md-6">
                    <label for="lastname" class="field prepend-icon">
                      <p id="ver3"></p>
                      <input type="text" id="prec" class="form-control" style="display: none;">
                      <label for="lastname" class="field-icon">
                      </label>
                    </label>
                  </div>
                </div>
                <div class="section row">
                  <div class="col-md-6">
                    <label style="color: black" for="firstname" class="field prepend-icon">
                      <b>@lang('traduccion2.txtdocumentoadjuntoprop') </b>
                    </label>
                  </div>
                  <div class="col-md-6">
                    <div id="descargar">
                    </div>
                  </div>
                </div>
                   <div class="section row">
                  <div class="col-md-6">
                    <label style="color: black" for="firstname" class="field prepend-icon">
                      <b>@lang('traduccion2.txtfechapropuesprop') </b>
                    </label>
                  </div>
                  <div class="col-md-6">
                    <div id="fecha">
                    </div>
                  </div>
                </div>
              </div>
  <br><br>
              <div class="panel-footer">
                <center>
                <button  class="button btn-primary exe" id="cerrar">@lang('traduccion2.btncerrarmodal') </button>
                </center>
              </div>

          {{-- </form> --}}

          </div>
        </div>


        {{-- ///////////////////MODAL UPDATE////////////////////////// --}}
    <div id="update" class="popup-basic popup-lg mfp-with-anim mfp-hide">
      <div class="panel panel-system">
        <div class="panel-heading">
          <span class="panel-title">
            <i id="titulo2" style="color: black">@lang('traduccion2.titlemodalpagopag')</i></span>
        </div>
        <div class="panel-body">




        <div class="div-center">

          <p><h5 style="line-height: 1.5">@lang('traduccion2.txtopago1')  <span id="nomcli"></span> @lang('traduccion2.txtopago2')  <span id="nompro"></span> @lang('traduccion2.txtopago3') <span id="money"></span>@lang('traduccion2.txtopago4')</h5></p>
          <!-- <h5 >Has seleccionado al trabajador <span id="nomcli"></span> para trabajar en tu proyecto: <span id="nompro" ></span></h5> -->
<!--           <h5 style="line-height: 1.5">Para comenzar a trabajar con <span>{{Auth::user()->nombres." ".Auth::user()->apellidos}}</span> realiza el pago por la suma de $ <span id="money"></span>,en este monto se encuentra</h5> -->
          <!-- <h5>incluido el 13% de la comisión</h5> -->
        </div>


      <div class="div-center" align="center">
          <img src="../img/pagar.png" height="250" width="250" align="center">
          <br>

        </div>


        <div class="div-center">
          <p >
          <h5 style="line-height: 1.5">
            @lang('traduccion2.txtopago5')
          </h5>
          </p>
          <p></p><p></p>
          <p><h5 style="line-height: 1.5"> @lang('traduccion2.txtopago6')</h5></p>

        </div>



              {{-- ///////////////////MODAL usuario////////////////////////// --}}
    <div id="usuario" class="popup-basic admin-form mfp-with-anim popup-xl mfp-hide">

          <div class="panel">
            <div class="panel-heading" style="padding: 0px;">
              <span class="panel-title" style="color: black">
              </i>@lang('traduccion2.txtperfilaspiranteasp')</span>
            </div >
              <div class="panel-body">
                <div class="row">

                    <div class="col-md-3" style="padding-top:14px">
                      <center>
                          <img  alt="" id="imgusu" height="100px" width="130px" style="border-radius: 60%;" >
                          {{-- <p style="padding-top: 10px" id="pais_"></p> --}}
                          <br/><br/>
                          <p id="paiss"></p>
                          <p id="precio_p"></p>
                      </center>
                    </div>


                    <div class="col-md-9">
                         <p  style="font-size: 20px;font-weight: bold;color: #3bafda" id="usu"></p>

                          <p>
                            <b>@lang('traduccion2.txtperfilaspiranteasp')</b>
                            <label id="perfilu"></label>
                          </p>
                            <p>
                            <div class="admin-form theme-primary" style="width: 100%;">
                              <span class="rating block">
                              <span><i class="fa fa-user" style="float: left;padding-right:  10px;"></i>&nbsp;&nbsp;
                              <div style="float:left" class="estrellaswe"></div>
                          <!--    <div style="float: left;">
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
                              </div>-->
                              </span>
                            </div>
                          </p>
                          <p>
                            <b> @lang('traduccion2.txtmienbrodesasp')</b>
                            <label id="fechai"></label>
                          </p>

                          <p>
                            <b> @lang('traduccion2.txturllinkedinasp') </b>
                            <a href="" target="_blank" id="url"></a>
                          </p>


                          <p>
                            <b>@lang('traduccion2.txtcertificacasp')</b>
                            <label id="certificado"></label>
                          </p>


                          <p>
                            <div class="col-md-6" style="padding: 0px;padding-bottom: 10px">
                              <b>@lang('traduccion2.txtreconocimasp')</b>
                              <img src="" width="50" height="50" id="medalla_i"><label id="texto_m"></label>
                            </div>

                            <div class="col-md-6" style="padding-top: 15px;">
                              <b>@lang('traduccion2.txtnivelenlaplaasp')</b>Nivel
                              <label id="nivel"></label>
                            </div>
                          </p>
                    </div>

                </div>



                <div class="row">


                  <div class="col-md-6" >


                    <div class="section-divider mv15" >
                          <span>@lang('traduccion2.titleexperiacialaboraasp')</span>
                    </div>


                          <div class="experu" style="overflow: scroll;height: 120px">

                          </div>




                  </div>
                  <div class="col-md-6">
                    <div class="section-divider mv15">
                          <span>@lang('traduccion2.titleeduacionasp')</span>
                    </div>
                    <div class="educu" style="overflow: scroll;height: 120px">

                    </div>
                  </div>
                </div>

                <br/>



                <div class="row" >

                  <div class="col-md-6">
                     <span class="panel-title fw600 text-info" style="font-size: 15px;">@lang('admin.txtcalificaciones')</span>
                      <div class="panel">
                  <div class="panel-body panel-scroller scroller-sm scroller-pn pn comentarioswe"  style="overflow: scroll;height: 140px">

                    <div  style="padding: 10px; background-color: #E6E6E6;margin: 5px;width: 100%" >

                    <p style="float:right;"></p>
                    <br/>
                    <p>Usuario:</p>
                    <p>Calificacion:</p>
                    <p>Comentario:</p>

                    </div>

             </div>
           </div>



                  </div>
                  <div class="col-md-6">
                    <br/><br/><br/>
                    <div class="col-md-4"  style="border: solid 2px green;width: 200px;text-align: center;font-size: 13px">
                    <b><p>@lang('traduccion2.txttilerequeaplicaasp')<h5 id="contrar"></h5></p></b>
                    </div>
                    <div class="col-md-1">
                    </div>
                    <div class="col-md-4" style="border: solid 2px green;width: 200px;text-align: center;font-size: 13px">
                      <b><p>@lang('traduccion2.txttilerequerealizasp') <h5 id="contrar2"></h5> </p></b>
                    </div>
                  </div>
                </div>

                <div class="row">




                 <div class="col-md-12">
                   <div class="col-12 divider text-center" style="margin-top:20px;">
                </div>
                  <label style="color: black"><h3><b>@lang('traduccion2.txttielconocimientoasp')</b></h3></label>
                  <tr>
                  <div id="habilidades"></div>
                </tr>
              </div>
            </div>
              </div>
              <div class="panel-footer">
                <center>

                <a class="button btn-primary weed" onclick="modalxd(this)" >@lang('traduccion2.btncontratarasp') </a>
                <button  class="button btn-primary exe" id="cerrar2">@lang('traduccion2.btncerrarmodal') </button>
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
            <input  type="hidden" id="usua" name="usua">
            <input  type="hidden" id="id31" name="id31">
            {{-- <input  type="show" id="pro" name="pro"> --}}
            {{-- <label id="titulo2"></label> --}}
            <button class="btn btn-primary" id="añadir-acuerdo" data-dismiss="modal" data-backdrop="true">Añadir Acuerdo</button>
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
                <span class="button btn-primary">Selecione</span>
                <input type="file" class="gui-file" name="file" id="file" onchange="document.getElementById('uploader1').value = this.value;">
                <input type="text" name="uploader1" class="gui-input" id="uploader1" placeholder="Selecione un Archivo">
                <label class="field-icon">
                  <i class="fa fa-upload"></i>
                </label>
              </label>
            </div>
            <div class="row" style="text-align: right;">
            <div class="col-md-12">
               <div class="box-footer">
               <button type="submit" class="btn btn-primary" id="añadir">Agregar Publicacion</button>
               </div>

            <div class="row" style="text-align: right;">
              <div class="col-md-12">
               <button type="button" class="btn btn-primary" id="btneditar">Editar</button>
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
                  <table id="datatas" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                      <tr>
                      <th style="color: black">Fecha</th>
                      <th style="color: black">Asunto</th>
                      <th style="color: black">Acuerdo</th>
                      <th style="color: black">Archivos</th>
                      <th style="color: black">Estado</th>
                      <th class="td-actions" style="color: black">Acciones</th>
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
        <button type="button" class="btn btn-primary exe">Cerrar</button>
      </center>
    </div>
        </div>
      </div>



<div class="admin-form theme-primary tab-pane active">
     <center>
          <a onclick="redict(this)" data-id ="" class="button btn-primary" id="redi" style="width:40%;font-weight:bold;">@lang('traduccion2.btnaceptarpag')</a>
          <a  data-id ="" href="javascript:void(0);"class="button btn-social mfp-close" id="redi" style="width:40%">
             <span></span>@lang('traduccion2.btnaceptarcan')
          </a>
     </center>
</div>




        </div>
      </div>
    </div>

    <div id="liberar-fondos" class="popup-basic popup-lg mfp-with-anim mfp-hide">
      <div class="panel panel-system">
        <div class="panel-heading">
          <span class="panel-title">
            <i id="titulo2" style="color: black">LIBERAR FONDOS</i></span>
        </div>
        <div class="panel-body">
        <div class="div-center">

          <p><h4 style="line-height: 1.5">Usted esta apunto de transferir el dinero a la cuenta del trabajador  <span id="nomcli1"></span> .</h4></p>

        </div>

<div class="admin-form theme-primary tab-pane active">
            <center>
                  <a href="javascript:void(0);" class="button btn-primary" id="redi" style="width:40%;font-weight:bold;">@lang('traduccion2.btnaceptarpag')</a>
                      <a  data-id ="" class="button btn-social mfp-close" id="redi" style="width:40%">
                          <span></span>@lang('traduccion2.btnaceptarcan')
                      </a>
            </center>
</div>




        </div>
      </div>
    </div>




<div id="evaluar" class="popup-basic admin-form mfp-with-anim mfp-hide">
          <div class="panel">
            <div class="panel-heading">
              <span class="panel-title" style="color: black">
                Califique el trabajo del freelancer</span>
            </div>
                <input type="hidden" id="invi" name="invi">
            <!-- end .panel-heading section -->


              <div class="panel-body" style="padding-bottom: 0px">

                <div class="section row">
                  <div class="col-md-12">
                    <label style="color: black;font-size: 20px" for="firstname" class="field prepend-icon">
                      <center><b>Puntuación: </b></center>

                    </label>
                    <center><br>
                           <div><span id="puntuacione" style="font-size: 40px"></span></div>
                    </center>
                  </div>
                </div>
                <div class="section row">
                  <div class="col-md-12">
                    <label style="color: black;font-size: 15px" for="firstname" class="field prepend-icon">
                      <center><b>Comentario: </b> </center>
                    </label>
                    <br><br>
                          <label class="field prepend-icon">
                            <textarea class="gui-textarea" id="comments" name="comments" placeholder="Comentario....."></textarea>
                            <label for="comment" class="field-icon">
                              <i class="fa fa-comments"></i>
                            </label>
                            <span class="input-footer">
                              {{-- <strong>Hint:</strong>Don't be negative or off topic! just be awesome...</span> --}}
                          </label>

                  </div>

                </div>

              </div>

              <div class="panel-footer">
                <center>
                <button class="button btn-primary" id="guardar">Calificar </button>
                </center>
              </div>



          </div>
        </div>


{{--     <button class="btn btn-danger remove">Delete</button>--}}





@endsection
@section('js')
{{-- <script>
    $(document).on("click", ".remove", function(e) {
      e.preventDefault();
        bootbox.confirm("Are you sure you want to delete?", function(result) {
            if(result){
              // console.log('user confirmed');
              $("#confirmar").modal('show');
            }else {
            // console.log("user declined");
        }
        });
    });
</script> --}}
<script type="text/javascript" src="{{  asset('datatable/jquery.dataTables.min.js') }} "></script>
<script type="text/javascript" src="{{ asset('datatable/dataTables.bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('datatable/dataTables.responsive.min.js') }} "></script>
<script type="text/javascript" src="{{ asset('js/laborajs/aspirante.js') }} "></script>
<script type="text/javascript" src="{{ asset('assets/js/bootbox/bootbox.min.js') }}"></script>
  <script src="{{ asset('js/starrr.js') }}"></script>
<script type="text/javascript">

  // Core.init();


  $('#puntuacione').starrr({
        rating:0,
       change:function(e,valor){
           $("#invi").val(valor);
              }
          });

          function titulo(id) {
          	// alert("sadasdasdas");

          	$.ajax({
          		url:'../aspirante-detalle',
          		type:'POST',
          		datatype:'json',
          		data:{id:id},
          		success:function(response){

                var nom_empre = response.proyec[0].nombre_empresa;
                var nom_per = response.proyec[0].nombres +" "+response.proyec[0].apellidos;
                //console.log(nom_per+"  ---   "+nom_empre);

                if(nom_empre == "" || nompro == null || nom_empre==null)
                {
                  $("#nombreempre").html(nom_per);
                }
                else {
                  $("#nombreempre").html(nom_empre);
                }


          		    var fechapu = response.proyec[0].fecha_publicacion;

          		        var sepfech = fechapu.split('-');

          		        var llevafecha = sepfech[2]+'/'+sepfech[1]+'/'+sepfech[0];


          			    $("#fechapubli").html(llevafecha);

                    $("#presupuestopubli").html("$/"+response.proyec[0].presupuesto);

                    $("#habilidadespubli").html(response.proyec[0].habilidades);



          			    $("#titulo").html(response.proyec[0].titulo);




          			  var estado = response.proyec[0].estado;

          			    if(estado == 1)
          			    {
          			      $("#estado").html("Publicado");
          			    }
          			    if(estado == 2)
          			    {
          			      $("#estado").html("Trabajando");
          			    }
          			    if(estado == 3)
          			    {
          			      $("#estado").html("Evaluacion");
          			    }

          			  var tipo_proyecto = response.proyec[0].tipo_proyecto;

          			  if(tipo_proyecto == 1)
          			  {
          			     $("#tipo_proyecto").html("Por proyecto terminado");
          			  }
          			  if(tipo_proyecto == 2)
          			  {
          			      $("#tipo_proyecto").html("Por horas específicas");
          			  }
          			  if(tipo_proyecto == 3)
          			  {
          			      $("#tipo_proyecto").html("Part time");
          			  }
          			  if(tipo_proyecto == 4)
          			  {
          			     $("#tipo_proyecto").html("Full time");
          			  }

          			  var tipo_trabajo = response.proyec[0].tipo_trabajo;

          			  if(tipo_trabajo == 1)
          			  {
          			    $("#tipo_trabajo").html("Es un proyecto nuevo");
          			  }
          			  if(tipo_trabajo == 2)
          			  {
          			    $("#tipo_trabajo").html("Modificacion de Proyecto existente");
          			  }
          			  if(tipo_trabajo == 3)
          			  {
          			    $("#tipo_trabajo").html("Pequeña modificación");
          			  }


                      var tiempo_entrega = response.proyec[0].tiempo_entrega;
                      var entrega = "";
                      if(tiempo_entrega == 1)
                      {
                          entrega = "Horas";
                      }
                      if(tiempo_entrega == 2)
                      {
                          entrega="Días";
                      }
                      if(tiempo_entrega == 3)
                      {
                          entrega = "Semanas";
                      }
                      if(tiempo_entrega == 4)
                      {
                          entrega = "Meses";
                      }

                      $("#cantidadTiem").html(response.proyec[0].cantidad_tiempo+" "+entrega);


                      var forma_pago = response.proyec[0].forma_pago;

                      if(forma_pago == 1)
                      {
                          $("#formaP").html("Por proyecto terminado");
                      }
                      if(forma_pago == 2)
                      {
                          $("#formaP").html("Por horas especificas");
                      }
                      if(forma_pago == 3)
                      {
                          $("#formaP").html("Part Time");
                      }
                      if(forma_pago == 4)
                      {
                          $("#formaP").html("Full time");
                      }


                $("#descripcion").html(response.proyec[0].descripcion);
          		}
          	});
          	 $.magnificPopup.open({

                fixedContentPos : false,
                                removalDelay: 400,
                                items: {
                                  src: "#perfil-proyecto"
                                },
                                callbacks: {
                                  beforeOpen: function(e) {
                                    this.st.mainClass = 'mfp-newspaper';
                                  }
                                },
                                midClick: true
                              });
          }






       function usuario(usuario,id){
        var d = $("#apli_pro").val();
$.ajax({
  url:'../aspirante-usuario',
  type:'POST',
  datatype:'json',
  data:{id:usuario,id_p:d},
  success:function(response){

    // var ArrayContent = response.length; perfil

 var con=0;
 var conPro=0;
 var con6=0;
 var tabla="";

var fecha = response.usuario[0].fecha;

var idusu = response.usuario[0].id;

var idproye = response.proyecto2[0].id;

var url = response.usuario[0].urllinkedin;

var datai = id;

$(".weed").attr('data-id_usuario',idusu);
$(".weed").attr('data-proyecto',idproye);
$(".weed").attr('data-id',datai);

// console.log(idusu);
if (fecha!=null) {
  let ff = new Date(fecha)
$("#fechai").html((ff.getDate()+1)+"-"+(ff.getMonth()+1)+"-"+ff.getFullYear());
}

if(url!=null) {
  $("#url").html(url);
  $("#url").attr("href",url);
}
else {
  $("#url").html('---');
}

var nivel = response.usuario[0].nivel
if (nivel) {
  $("#nivel").html(nivel);
}
var uuu = response.usuario[0];
 var pais_ = uuu.name_country;
 if(pais_!=null||pais_!=""||pais_!=undefined){
     var co_p =uuu.codigo_pais;
     $("#paiss").html(pais_+" - <img src='../img/pais/"+co_p+".gif' width='30' height='20'>");
 }else{
     $("#paiss").html("Sin Nacionalidad");
 }
 var pre_h = uuu.precio_hora;
 if(pre_h!=null||pre_h!=""||pre_h!=undefined){
     $("#precio_p").html("Precio por hora: $"+pre_h);
 }else{
     $("#precio_p").html("");
 }

 var perfilc = response.usuario[0].perfil.length;

 var re = response.usuario[0].reconocimiento;
 var medalla = "img/medallas-labora/medalla-inicio.png"
 var textomedalla = "INICIO"
if(re==0)
  {
    medalla = 'img/medallas-labora/medalla-inicio.png';
    textomedalla = "INICIO";
  }
  if(re==1)
  {
    medalla = 'img/medallas-labora/medalla-entusiasta.PNG';
    textomedalla ='ENTUSIASTA';
  }
  if(re==2)
   {
    medalla = 'img/medallas-labora/medalla-honorable.PNG';
    textomedalla = 'HONORABLE';
   }

   if(re==3)
   {
    medalla = 'img/medallas-labora/medalla-asociado.PNG';
    textomedalla = 'ASOCIADO';
   }
   if(re==4)
   {
    medalla ='img/medallas-labora/medalla-partner.PNG';
    textomedalla ='PARTNER';
   }
   if(re==5)
   {
    medalla ='img/medallas-labora/medalla-especialista.PNG';
    textomedalla ='ESPECIALISTA';
   }

   if(re==6)
  {
    medalla ='img/medallas-labora/medalla-experto.PNG';
    textomedalla ='EXPERTO';
  }
   if(re==7)
    {
    medalla ='img/medallas-labora/medalla-master.PNG';
    textomedalla ='MASTER';

    }
    $("#texto_m").html(textomedalla);
    $("#medalla_i").attr('src',"../"+medalla)
 var imagenusu = response.usuario[0].imagen;
let c = ""

  response.habilidades.forEach((value,i)=>{
    if (i!=0) {c+=", "}


    let lvl = value.level_format
    let text = "Nivel Inicio"
    if (lvl==1) {text = "Nivel Basico"}
    if (lvl==2) {text= "Nivel Intermedio"}
    if (lvl==3) { text = "Nivel Avanzado"}
    c+= value.ability.toUpperCase() + " - "+ text
  // console.log(c);
  })
    $("#certificado").html(c)

var xd= "{{ asset('img/none.png') }}"

if(imagenusu != null)
{
    var d = imagenusu.substr(0,4)
    if(d!="http"){
        $("#imgusu").attr('src',"/"+imagenusu)
    }else{
        $("#imgusu").attr('src',imagenusu)
    }

}
else
{
      $("#imgusu").attr('src',xd);
}


 if(usuario !==0)
{
  $("#usu").html(response.usuario[0].nombres+" "+response.usuario[0].apellidos);
}
else
{
  $("#usu").html('-SIN NOMBRE DE USUARIO-');
}

if(perfilc !==0)
{
  $("#perfilu").html(response.usuario[0].perfil);
}
else
{
  $("#perfilu").html('-SIN PERFIL-');
}
if(response.usuario[0].telefono !== null)
{
  $("#telefono").html(response.usuario[0].telefono);
}
else
{
  $("#telefono").html('-SIN TELEFONO-');
}



    $("#nacionalidad").html('**********');
    $("#correo").html(response.usuario[0].correo);
    $.each(response.usuario,function(indice,value){
      con=con+1;
      if (value.state_aplication==6) {
        con6=con6+1;
      }
    })
    $.each(response.proyecto,function(indice,value){
      conPro=conPro+1;
    })
$("#contrar").html(con);
$("#contrar2").html(con6);
$("#contrar3").html(conPro);
    $.each(response.usuario,function(indice,value){

      var conocimi1 = value.unoconocimiento;
      var conocimi2 = value.dosconocimiento;
      var conocimi3 = value.tresconocimiento;
      //console.log(conocimi2);


      if (conocimi1 != 0 && conocimi1 != "" && conocimi1 != null) {
        var sep= conocimi1.split(',');
        $.each(sep,function(indice,value) {
          tabla+='<td><span class="panel bg-primary light">'+value+'</span>&nbsp;&nbsp;&nbsp;</td>';
        });


          if(conocimi2 != 0 && conocimi2 != "" && conocimi2 != null){
            var sep2 = conocimi2.split(',');
            $.each(sep2,function(indice,value) {
              tabla+='<td><span class="panel bg-primary light">'+value+'</span>&nbsp;&nbsp;&nbsp;</td>';
            });

            if(conocimi3 != 0 && conocimi3 != "" && conocimi3 != null){
                var sep3 = conocimi3.split(',');
                $.each(sep3,function(indice,value) {
                  tabla+='<td><span class="panel bg-primary light">'+value+'</span>&nbsp;&nbsp;&nbsp;</td>';
                });
            }
          }
          else {

          }
      }
      else {
            tabla+='<p style="color:red;">NO INGRESO CONOCIMIENTOS</p>';

      }

      // var sep = conocimi1.split(',');
      // var sep2 = conocimi2.split(',');
      // $.each(sep,function(indice,value) {
      //   tabla+='<td><span class="panel bg-primary light">'+value+'</span>&nbsp;&nbsp;&nbsp;</td>';
      // });
      // $.each(sep2,function(indice,value) {
      //   tabla+='<td><span class="panel bg-primary light">'+value+'</span>&nbsp;&nbsp;&nbsp;</td>';
      // });

    })

    $("#habilidades").html(tabla);

    //PARA LAS ESTRELLAS DEL USUARIO

      var cuantoson  = response.comen.length;
      var guarda = 0;
      var daprom = 0;



           if(cuantoson == 0 || cuantoson == "")
           {
              $(".estrellaswe").html('<i class="fa fa-star-o"  style="color: #f1c40f;font-size: 20px"></i><i class="fa fa-star-o"  style="color: #f1c40f;font-size: 20px"></i><i class="fa fa-star-o"  style="color: #f1c40f;font-size: 20px"></i><i class="fa fa-star-o"  style="color: #f1c40f;font-size: 20px"></i><i class="fa fa-star-o"  style="color: #f1c40f;font-size: 20px"></i>');
           }
           else
           {

      $.each(response.comen,function(indice,value) {

          guarda += value.qualification;
          daprom = Math.round(guarda/cuantoson);

          });


          if (daprom == 0)
          {

          }
          else
          {
            $(".estrellaswe").html('');
            for(var i=1; 5>=i;i++)
            {
              if(daprom>=i)
              {
                $(".estrellaswe").append('<i class="fa fa-star" style="color: #f1c40f;font-size: 20px"></i>');
              }
              else
              {
                $(".estrellaswe").append('<i class="fa fa-star-o"  style="color: #f1c40f;font-size: 20px"></i>');
              }
            }
          }


  }


    //FIN



//PARA LOS COMENTARIOS DEL USUARIO

        var comentarios = response.comen;




        $(".comentarioswe").html('');

        if(comentarios == 0 || comentarios =="" || comentarios == null)
        {

          $(".comentarioswe").html('<br> <center><div class="aparacewe" style="width: 100%;">NO TIENE COMENTARIOS</div></center>');

        }
        else
        {

          $.each(response.comen,function(indice,value) {
            var us = value.usuario;
            var fechap = value.date_finish;

            var parte1 = fechap.split(' ');

            var parte2 = parte1[0].split('-');

            var fechareal = parte2[2]+"-"+parte2[1]+"-"+parte2[0];


            $(".comentarioswe").append(
            '<div class="estrecon" hidden></div>'+
            '<div style="padding: 10px; background-color: #E6E6E6;margin: 5px;width: 100%">'+
                '<p style="float:right;">'+fechareal+'</p><br/>'+
                '<p>Usuario:'+us.nombres+' '+''+us.apellidos+'</p>'+
                '<p>Calificacion:'+'sss'+'</p>'+
                '<p>Comentario:'+value.commit_finish+'</p>'+
            '</div>'
              );



          });

        }
//FIN

//PARA LAS EXPERIENCIAS LABORALES

    var experiencia = response.experiencia;


    if(experiencia == 0 || experiencia == "" || experiencia == null)
    {
        $(".experu ").html('<center><p style="color: red;">NO REGISTRO DATOS</p></center>');
    }
    else
    {
        $(".experu").html('');
        $.each(response.experiencia,function(indice,value) {

              //
              var ds = value.date_start;
              var de = value.date_end;
              //
              var fi = ds.split('-');
              var fechainicio = fi[2]+'/'+fi[1]+'/'+fi[0];
              //

              var ff = de.split('-');
              var fechafin = ff[2]+'/'+ff[1]+'/'+ff[0];

              var completafe = '';

              if (fechafin == '01/01/1970') {
                  completafe = fechainicio + ' - ' + 'Actualmente';
              }
              else {
                  completafe = fechainicio + ' - ' + fechafin;
              }



            $(".experu").append(
                '<div style="border-style: dotted;"><div style="padding: 5px;"><span class="imoon imoon-office"> : <span>'+ value.company +'</span></span><br/>'+
                '<span class="imoon imoon-user3"> : <span>'+ value.charge +'</span></span><br/>'+
                '<span class="imoon imoon-clock"> : <span>'+ completafe +'</span></span><br/>'+
                '<span class="imoon imoon-flag"> : <span>'+ value.name_country + ' - ' + value.name_departament +'</span></span><br/>'+
                '<span class="imoon imoon-paragraph-left"> : <span>'+ value.description_profile +'</span></span></div></div><br/>'
            );

        });
    }


//FIN


//PARA LA EDUCACION DEL Usuario

var educacion = response.educacion;

//console.log(educacion);

// console.log(educacion);

if(educacion == 0 || educacion == null || educacion == "")
{
    $(".educu").html('<center><p style="color: red;">NO REGISTRO DATOS</p></center>');
}
else
{
  $(".educu").html('');
  $.each(response.educacion,function(indice,value) {
        //
        var tipo = value.type_study;
        var llevatipo = '';
        if(tipo == 0)
        {
          llevatipo = 'Tecnico';
        }
        else if (tipo == 1)
        {
          llevatipo = 'Universitario';
        }
        else if (tipo == 2) {
          llevatipo = 'Maestria';
        }
        else if (tipo == 3) {
          llevatipo = 'Doctorado';
        }
        else {
          llevatipo = '----';
        }
        //
        //
        var dss = value.date_start;
        var dee = value.date_end;

        var fie = dss.split("-");
        var fechainicioe = fie[2]+'/'+fie[1]+'/'+fie[0];

        var ffe = dee.split("-");
        var fechafine = ffe[2]+'/'+ffe[1]+'/'+ffe[0];
        //
      $(".educu").append(
        '<div style="border-style: dotted;"><div style="padding: 5px;"><span class="imoon imoon-office"> : <span>'+ value.institute +'</span></span><br/>'+
        '<span class="imoon imoon-user3"> : <span>'+ llevatipo +'</span></span><br/>'+
        '<span class="imoon imoon-newspaper"> : <span>'+ value.degree +'</span></span><br/>'+
        '<span class="imoon imoon-clock"> : <span>'+ fechainicioe+ ' - '+ fechafine +'</span></span><br/>'+
        '<span class="imoon imoon-flag"> : <span>'+ value.name_country + ' - ' + value.name_departament +'</span></span></div></div><br/>'
      );
  });

}


//FIN

      if(response.parajs == 0)
      {




      }
      else
      {
        //-- PARA MOSTRAR LA FILA ACTUALIZADA

        var tabla = $("#datatable20").DataTable();

        var temp = tabla.row($('#tr_'+id).closest('tr')).data();

        var temp2 = tabla.rows().data();




  // var d = $("#datatable20").DataTable();
var e = tabla.rows().data();
for (var i = 0; i < e.length; i++) {
  // console.log(d.row(i).data()[3]);
  var ddd = tabla.row(i).data();
  ddd[3]='<center><div class="popup1"><a style="text-decoration:none"><span>Ya revisaste algunos perfiles.</span><img src="{{ asset('img/evaluacion_p.png') }}" alt="EVALUACION"  align="center" height="50"><h6><small>Evaluando</small></h6></a></div></center>';
  tabla.row(i).data(ddd).draw();
}
//<h6><small>Trabajando</small></h6>




  temp[4] = '<center><div class="popup2"><a style="text-decoration:none"><span>Has revisado el perfil de este colaborador. </span><img src="{{ asset('img/evaluacion.png') }}" alt="EVALUACION"  align="center" height="50"><h6><small>Evaluación</small></h6></a></div></center>';

         tabla.row($('#tr_'+id).closest('tr')).data(temp).invalidate();

         $("#spaxd1").html('Ya revisaste algunos perfiles.');
         $("#spaxd2").html('Has revisado el perfil de este colaborador. ');


        // temp[0] = response.propuest[0]

      }




  }
});

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
};


  function propuesta(id,id2){



    var x1 = id;
    var x2 = id2;

    var tiempo="";
    var documentoas="";
    $.ajax({
      url:'../propuesta-detalle',
      type:'POST',
      datatype:'json',
      data:{id:id,id2:id2},
      success:function(response){

        //console.log(response.parajs);
        //-- PARA MOSTRAR LA PROPUESTA EN EL MODAL

        $("#fecha").html(response.propuest[0].date_contract);
        $("#ver").html(response.propuest[0].presentation);
        $("#ver2").html("$/"+" "+response.propuest[0].economic_proposal);

      var tiempo="";
      var vtiem = response.propuest[0].type_time;
        
        if(vtiem == 1)
        {
            
        }
        else
        {
            tiempo = "N/D";
        }
        
    if (vtiem == 1) {
    tiempo = "Horas";
} else if (vtiem == 2) {
  tiempo = "Días";
}  else if (vtiem == 3) {
  tiempo = "Semanas";
} else if (vtiem == 4) {
  tiempo = "Meses";
} 
else {
  tiempo = "N/D";
}


        $("#ver3").html(response.propuest[0].time_finish+" "+ tiempo);
        if (response.propuest[0].document==null || response.propuest[0].document==0) {
          documentoas="<p>Sin Documento</p>";
        }else{
          documentoas='<a href="../down/'+response.propuest[0].id_trabajo_aplicado+'"  class="btn-small" ><i class="fa fa-cloud-download" id="descargar"></i></a>';
        }
        $("#descargar").html(documentoas);

        //-- FIN


        if(response.parajs == 0)
        {

        }
        else
        {
          //-- PARA MOSTRAR LA FILA ACTUALIZADA

        var tabla = $("#datatable20").DataTable();

        var temp = tabla.row($('#tr_'+id).closest('tr')).data();

        //<img src="{{ asset('img/visto.png') }}" alt="VIO PROPUESTA" title="VIO PROPUESTA" align="center" height="50">

        temp[4] = '<center><div class="popup2"><a style="text-decoration:none"><span>Propuesta vista.</span><img src="{{ asset('img/visto.png') }}"  align="center" height="50"><h6><small>Visto</small></h6></a></div></center>';

         tabla.row($('#tr_'+id).closest('tr')).data(temp).invalidate();

         $("#spaxd2").html('Propuesta vista');


        // temp[0] = response.propuest[0]
        }






      }



    });

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
   }






</script>

@endsection
