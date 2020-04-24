@extends('layouts.admin2')

@section('css')
<style type="text/css">
  .list-group-item{
    font-size: 15px;

 }

</style>

@endsection



@section('contenido')


<div class="tray tray-center" style="padding-left: 10px">
  	<div class=" mw1000 center-block  " style="padding-top: 30px;border-radius: 20px">
<div class="panel panel-primary panel-border  top mt30 ">

                <div class="panel-body bg-light">
                  <div class="list-group list-group-links list-group-spacing-xs mbn">
                    <input type="hidden" name="" value="{{ $trabajador->id }}" id="id_usuario">
                    <input type="hidden" name="" value="{{$trabajador->nombres.' '.$trabajador->apellidos}}" id="nom">
                      <div class="list-group-header"> @lang('traduccion2.txttileselccioneemple') </div>

                  <?php $select=null; ?>
              <div class="panel">
              <div class="panel-heading" style="float: top">
                  <div class="form-group">
                    <label for="inputSelect" class="col-lg-3 control-label">@lang('traduccion2.txttitleproyecemple')</label>

                      @if(count($proyecto)==0)
                      <div class="bs-component"style="padding-top: 5px">
                       <a href="../publicar_trabajo">@lang('traduccion2.txtparacontrataraemple')</a>
                      </div>
                      @else
                      <div class="col-lg-8">
                      <div class="bs-component"style="padding-top: 5px">
                        <select class="form-control" id="selectp">
                          <option value="">@lang('traduccion2.txtopcionseleccionemple') </option>

                        </select>
                      </div>
                       </div>
                      @endif

                  </div>

              </div>
                <form id="emplear">
              <div class="panel-body">
            @foreach($proyecto as $value)
            <?php $select .='<option value="'.$value->id.'">'. $value->titulo.'</option>';?>

                      <div class="row panel center-block" id="proyecto_{{ $value->id }}" style=";padding-left: 5%;padding-right: 5%; border-radius: 50px;display: none;">
                        <div class="col-md-5">
                          <label class="list-group-item"> @lang('traduccion2.txtdescripcionemple') <br>
                          <b class="text-primary">{{ $value->descripcion }} </b>
                         </label>
                         <br>
                          <label class="list-group-item"> @lang('traduccion2.txtduracionemple') <br>
                          <?php
                          $tiempo = "";

                          if($value->tiempo_entrega == "1")
                          {
                            $tiempo = "Horas";
                          }
                          if( $value->tiempo_entrega== "2")
                          {
                            $tiempo = 'Dias';
                          }
                          if($value->tiempo_entrega == "3")
                          {
                            $tiempo = 'Semanas';
                          }
                          if($value->tiempo_entrega == "4")
                          {
                            $tiempo = 'Meses';
                          }

                          ?>
                            <b class="text-primary">{{$value->cantidad_tiempo}} {{$tiempo}} </b>
                         </label>
                        </div>
                        <div class="col-md-5">
                         <label class="list-group-item"> @lang('traduccion2.txtconocimientoempresa') <br>
                            <b class="text-primary">{{ $value->habilidades }} </b>
                         </label>
                         <br>
                         <label class="list-group-item"> @lang('traduccion2.txtmontoacordemple') <br>
                            <b class="text-primary"><input type="number" required value="{{ $value->presupuesto }}" id="acuerdo_{{ $value->id }}" class="form-control" style="width: 150px">  </b>
                         </label>
                        </div>
                        <div class="col-md-2">
                           <center>
                           <label class="list-group-item"> @lang('traduccion2.txtpresupuestoemple') <br>
                            <b class="text-primary">{{ $value->presupuesto }} </b>
                         </label>
                          </center>
                        </div>
                      </div>
            @endforeach

              </div>
              <div class="panel-footer" ><center>
                <div class="botones" style="display: none">
                <button class="btn btn-primary"> @lang('traduccion2.btncontratarasp') </button> &nbsp;&nbsp;&nbsp;
                <a href="../trabajadores" class="btn btn-primary">@lang('traduccion2.btnvolverapx')</a> </div></center>
              </div>
                   </form>
            </div>



                  </div>
                </div>
            </div>

	</div>
</div>
   <div id="update" class="popup-basic popup-lg mfp-with-anim mfp-hide">
      <div class="panel panel-system">
        <div class="panel-heading">
          <span class="panel-title">
            <i id="titulo2" style="color: black">@lang('traduccion2.titlemodalpagopag')</i></span>
        </div>
        <div class="panel-body">


        <div class="div-center">

          <p><h5 style="line-height: 1.5">@lang('traduccion2.txtopago1') <span id="nomcli"></span> @lang('traduccion2.txtopago2') <span id="nomproyec"></span> @lang('traduccion2.txtopago3') <span id="monto"></span>@lang('traduccion2.txtopago4')</h5></p>

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

<div class="admin-form theme-primary tab-pane active">
    <center>
                  <a onclick="redict(this)" data-id ="" class="button btn-primary" id="redi" style="width:40%;font-weight:bold;">@lang('traduccion2.btnaceptarpag')</a>
                                        <a  data-id ="" href="{{route('trabajadores','v')}}" class="button btn-social mfp-close" id="redi" style="width:40%">
                                      <span>
                                        <!--<i class="fa fa-usd"></i>-->
                                      </span>@lang('traduccion2.btnaceptarcan')</a>
                                      </center>
            </div>
        </div>
      </div>
    </div>

@endsection
@section('js')
<script type="text/javascript">
  var select = '{!! $select !!}';
  $("#selectp").append(select);
</script>
<script type="text/javascript" src="{{ asset('js/laborajs/emplear.js') }}"></script>
@endsection
