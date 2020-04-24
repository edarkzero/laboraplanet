@extends('layouts.admin2')
@section('css')
   	<link rel="stylesheet" type="text/css" href="datatable/dataTables.bootstrap.min.css">
  	<link rel="stylesheet" type="text/css" href="datatable/responsive.bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href=" {{ asset('vendor/plugins/select2/css/select2.css')}}">

@endsection

@section('js')
 <script type="text/javascript" src="select2/select2.min.js"></script>
<script type="text/javascript" src="datatable/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="datatable/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="datatable/dataTables.responsive.min.js"></script>
  <script src="vendor/plugins/bstimeout/bs-timeout.js"></script>
    <script src="vendor/plugins/jquerymask/jquery.maskedinput.min.js"></script>
  <script type="text/javascript" src="js/laborajs/dinero.js"></script>
<script type="text/javascript">
      $.sessionTimeout({
        keepAliveUrl: '',
        logoutUrl: 'dinero',
        redirUrl: 'dinero',
        warnAfter: 60000,
        redirAfter: 300000,
         ajaxType: '',
        // countdownBar: true,
        countdownMessage: 'Redireccionamiento  en {timer} segundos.',
        onStart: function (opts) {},
    });
</script>
@endsection

@section('contenido')

	   <div class="tray tray-center" style="padding-left: 10px">
          <div class=" mw1200 center-block  animated fadeIn" style="padding-top: 30px;">
           <div class="panel">
  <div >
    <ul class="nav panel-tabs-border panel-tabs panel-tabs-left">
      <li class="active"><a href="#tab2_1" data-toggle="tab" aria-expanded="false">@lang('admin.menutransaccion')</a></li>
      <li class=""><a href="#tab2_2" data-toggle="tab" aria-expanded="true">@lang('admin.menudepositar')</a></li>
      <li><a href="#tab2_3" data-toggle="tab" aria-expanded="false">@lang('admin.menuasociar')</a></li>
    </ul>
  </div>
  <div class="panel-body">
    <div class="tab-content pn br-n">
      <div id="tab2_1" class="tab-pane active">

         <div class="tray tray-center" style="padding-left: 10px">
          <div class=" mw1000 center-block  animated fadeIn" style="padding-top: 30px;">
          <div class="admin-form theme-primary">
              <div class="panel heading-border panel-primary">
                <div class="panel-body bg-light">
                    <div class="section-divider mb40" id="spy1">
                      <span style="font-size: 25px"> @lang('admin.txttuspagosld') </span>
                    </div>
                    <p style="font-size: 15px">@lang('admin.txtpuedesrealizarelpago')</p><br>
                      <span >     </span>

            <div class="col-md-12">
              <div class="panel panel-visible" id="spy2">
                <div class="panel-heading" style="padding: 0px;">
                  <div class="panel-title hidden-xs" style="font-size: 20px;color: #3498db">
                    &nbsp;<span class="glyphicon glyphicon-tasks"></span>@lang('admin.txthistorialld')</div>
                </div>
                <div class="panel-body pn">
                  <table id="datatable1" class="table table-striped table-bordered nowrap datatable" style="width:100%">
                    <thead>
                      <tr>
                        <th>@lang('admin.tablecodigopago1')</th>
                        <th>@lang('admin.tablemovimientopago1')</th>
                        <th>@lang('admin.tabledescripcionpago1')</th>
                        <th>@lang('admin.tableusuariopago1')</th>
                        <th>@lang('admin.tableimportepago1')</th>
                        <th>@lang('admin.tablefechapago1')</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($movimientos as $value)
                    <tr>
                      <td>{{ $value->id_move }}</td>
                      <td>{{ $value->move }}</td>
                      <td>{{ $value->description }}</td>
                      @if($value->id_contratado!=null)
                        <td>{{ $value->nombres." ".$value->apellidos }}</td>
                      @else
                        <td>{{ Auth::user()->nombres." ".Auth::user()->apellidos }}</td>
                      @endif
                      <td>{{ $value->import_move }}</td>
                      <td>{{ $value->datae.'-' }}{{ $value->estado }}</td>
                    </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>



                </div>

               </div>
        	</div>
    	  </div>
    	  </div>

      </div>
        <?php
      $valor = 0;
      ?>
      <div id="tab2_2" class="tab-pane">
        <div class="tray tray-center" style="padding-left: 10px">
          <div class=" mw1000 center-block  animated fadeIn" style="padding-top: 30px;">
          <div class="admin-form theme-primary">
              <div class="panel heading-border panel-primary">
                <div class="panel-body bg-light">
                    <div class="section-divider mb40" id="spy1">
                      <span style="font-size: 25px"> @lang('admin.txttusingresos') </span>
                    </div>
                    <p style="font-size: 15px">@lang('admin.txttusaldoesinsfu')</p><br>
            <div class="col-md-12">
              <div class="panel panel-visible">
                <div class="panel-heading" style="padding: 0px;">
                  <div class="panel-title hidden-xs" style="font-size: 20px;color: #3498db">
                    &nbsp;<span class="glyphicon glyphicon-tasks"></span>@lang('admin.txthistorialld')</div>
                </div>
                <div class="panel-body pn">
                  <table id="datatable2" class="table table-striped table-bordered nowrap datatable" style="width:100%">
                    <thead>
                      <tr>
                        <th>@lang('admin.tablecodigopago1')</th>
                        <th>@lang('admin.tablemovimientopago1')</th>
                        <th>@lang('admin.tabledescripcionpago1')</th>
                        <th>@lang('admin.tableusuariopago1')</th>
                        <th>@lang('admin.tableimportepago1')</th>
                        <th>@lang('admin.tablefechapago1')</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($movimientos1 as $value)
                      <?php $valor +=  $value->import_move;?>
                      <tr>
                        <td>{{ $value->id_move }}</td>
                        <td>{{ $value->move }}</td>
                        <td>{{ $value->description }}</td>
                        <td>{{ $value->nombres." ".$value->apellidos }}</td>
                      <td>{{ $value->import_move }}</td>
                      <td>{{ $value->datae }}</td>
                    </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
                </div>
               </div>
        	</div>
    	  </div>
    	  </div>
      </div>
      <div id="tab2_3" class="tab-pane">
       <div class="tray tray-center" style="padding-left: 10px">
          <div class=" mw1000 center-block  animated fadeIn" style="padding-top: 30px;">
          <div class="admin-form theme-primary">
              <div class="panel heading-border panel-primary">
                <div class="panel-body bg-light">
                    <div class="section-divider mb40" id="spy1">
                      <span style="font-size: 25px"> @lang('admin.txtasociarcuenta')</span>
                    </div>
            <div class="col-md-12">
              <div class="col-md-5" style="background: #f2f2f2;border-radius: 20px;">
              	<div class="row" style="padding-top: 20px;padding-left: 20px ">
 					<div class="col-md-7"><h4> @lang('admin.txtsaldoenlaboraplanet')</h4></div>
                    <div class="col-md-5"><h4><a href="javascript:void(0);" style="text-decoration: none;">@lang('admin.txtiraldetalle') &nbsp;&nbsp;<i class="fa fa-chevron-circle-right"></i></a></h4></div>
                </div>
                <div class="col-md-12" style="margin-top:5px;">
                                <h3 style="margin-top: 10px; font-weight: 600;" class="col-md-12">$ {{ $valor  }} USD</h3><br>
                                <p style="margin-left: 10px;">@lang('admin.txtestevalorpuedevariar')</p>
                            </div>
                <div class="col-md-12" style="margin-top:15px;">
                                <p class="col-md-12">@lang('admin.txtnonecesitatenersaldopara')</p>
                            </div>
                            <div class="col-md-12" style="margin-top:15px; margin-bottom:3px;">
                                <a style="text-decoration: none;" href="#" class="col-md-12">@lang('admin.txtretirarsaldold')</a>
                            </div>
                            <div class="col-md-12" style="margin-top:3px; margin-bottom:15px;">
                                <a style="text-decoration: none;" href="planes" class="col-md-12">@lang('admin.txtadquirirmembresia')</a>
                            </div>
              </div>
              <div class="col-md-7">
              	<div class="row" style="padding-left:  20px">
              		<div class="col-md-4"><center><a href="javascript:void(0);" class="mostrar" data-m='1'><img src="img/tarjetas/TarjetaB.png" style="width: 100%;max-width: 350px;max-height: 100px"></a></center></div>
              		<div class="col-md-4"><center><a href="javascript:void(0);" class="mostrar" data-m='2'><img src="img/tarjetas/TarjetaP.png" style="width: 100%;max-width: 350px;max-height: 100px"></a></center></div>
              		<div class="col-md-4"><center><a href="javascript:void(0);" class="mostrar" data-m='3'><img src="img/tarjetas/TarjetaPM.png" style="width: 100%;max-width: 350px;margin-top: -10px;max-height: 150px"></a></center></div>
              	<div class="col-md-12 m2 panel-mostrar" >
              		<form id="formulario2">

              		<h3>@lang('admin.txtdatosdelatarjetapaypal')</h3>
              		<div class="row">
                      <div class="col-md-12">
                        <div class="section">
                          <label class="field">
							<input type="number" name="numTarjetaP" id="numero_tarjeta_p" class="gui-input" placeholder="@lang('admin.placeholdercuentapay')" required>
                          </label>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="section">
                          <label class="field">
							<input type="text" name="numTarjetaP" id="nombre_titular_p" class="gui-input" placeholder="@lang('admin.placeholdernombredel')" required>
                          </label>
                        </div>
                      </div>

                    </div>
              		<div class="form-group">
              			<center><input type="submit" value="@lang('admin.btnasociarpay')" class="btn btn-primary"></center>
              		</div>
              		</form>
              	</div>
              	<div class="col-md-12 m1 panel-mostrar" style="display: none;">
              		<form id="formulario1">
              		<h3>@lang('admin.txtdatosdelatarjetaban')</h3><br>
              		              		<div class="row">

              			<div class="col-md-12">
              			<div class="section">
                          <label class="field select">
                            <select id="tipo_t" required>
                               <option value="" style="display: none;">@lang('admin.placeholdercbotipodetar')</option>
                                        <option value="1">American Express</option>
                                        <option value="2">Discover</option>
                                        <option value="3">MasterCard</option>
                                        <option value="4">Visa</option>
                            </select>
                            <i class="arrow double"></i>
                          </label>
                        </div>
                        </div>
                    </div>
              		<div class="row">
                      <div class="col-md-12">
                        <div class="section">
                          <label class="field">
                            <input type="text" id="n_tarjeta" class="gui-input" placeholder="@lang('admin.placeholdernumerotarjeta')" required>
                          </label>
                        </div>
                      </div>
                  </div>
                  <div class="row">
    				<div class="col-md-12">

                        <div class="section">

                          <label class="field">

                            <input type="text"  id="codigo_s" class="gui-input" placeholder="@lang('admin.placeholcodigosegurida')" required>
                            <div class="btn-group dropright">
                                            <a href="javascript:void(0);" style="" class="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-question-circle" style="font-size: 30px" data-original-title="" title=""></i></a>
                                              <ul class="dropdown-menu" style="left:0; margin-left: 100%; margin-top:-170px; background: #fff; border: 1px solid #CDCDCD; width:250px;">
                                                <div style="margin: 0px; padding:10px 0px; background: #666666; text-align: center;">
                                                    <h5 style="color:#fff; margin:0px auto;">@lang('admin.modalcodigodeseguridad')</h5>
                                                </div>
                                                <div style="margin: 10px; text-align: justify">
                                                    @lang('admin.modalenlastarjetas') <strong>@lang('admin.modalmastercadvisa') </strong> @lang('admin.modalestecodigocvc')<br>
                                                    <img src="img/tarjetas/tarjeta.png" alt="tarjeta" style="width:80%; margin:0px auto; margin-left:10%; margin-bottom: 15px;">
                                                    <div style="margin: 0px; padding:10px 0px; text-align: justify; border-top:1px solid #B5B5B5">
                                                      @lang('admin.modalenlastarjetasamercian')
                                                    </div>
                                                    <img src="img/tarjetas/TarjetaAmerican.png" alt="tarjeta" style="width:80%; margin:0px auto; margin-left:10%; margin-bottom: 15px;">
                                                </div>
                                              </ul>
                                        </div>
                          </label>
                        </div>
                      </div>

				   </div>
				   <div class="row">
{{-- 				   	<div class="col-md-12">
                        <div class="section">
                          <label class="field prepend-icon">
                            <input type="text" name="tooltip1" id="fecha_v" class="dateee" placeholder="Fecha de Vencimiento">
                            <label for="tooltip1" class="field-icon">
                              <i class="fa fa-flag"></i>
                            </label>
                          </label>
                        </div>
                      </div> --}}


                                            <div class="col-md-12">
                                              <div class="form-group">
                                                <div class="input-group date" id="datetimepicker2">
                                                  <span class="input-group-addon cursor">
                                                  <i class="fa fa-calendar"></i>
                                                  </span>

                                                  <input type="text" class="form-control dateee" id="fecha_v" placeholder="Fecha de Vencimiento">


                                                </div>
                                              </div>
                                            </div>



				   </div>
 				<div class="row">
				   	<div class="col-md-6">
				   	   <div class="section">
				   			<label class="field">
				   			<input type="text" id="nombre_t" class="gui-input" placeholder="@lang('admin.placeholnombretitular')" required>
				   			</label>
				   		</div>
				   	</div>
				   	 	<div class="col-md-6">
				   	   <div class="section">
				   			<label class="field">
				   			<input type="text" id="apellido_t" class="gui-input" placeholder="@lang('admin.placeholapellidotitular')" required>
				   			</label>
				   		</div>
				   	</div>
				   </div>

				    <div class="row">
				   	<div class="col-md-12">
				   	   <div class="section">

				   			 <label class="field">
				   			<input type="text" id="direccion" class="gui-input" placeholder="@lang('admin.placeholdireccionfacturac')" required>
				   		</label>
				   		</div>
				   	</div>
				   </div>
				   <div class="row">
				   <div class="col-md-6">
                        <div class="section">
                            <select id="pais" name="country" class="select2" style="width: 100%" required>
                              <option value=""></option>
                            	@foreach($pais as $value)
                              		<option value="{{ $value->id_country }}">{{ $value->name_country }}</option>
                            	@endforeach
                            </select>
                        </div>
                      </div>
				   	 	<div class="col-md-6">
                        <div class="section">
                            <select id="ciudad" style="width: 100%" required>
                              <option value=""></option>
                            </select>
                        </div>
                      </div>
				   </div>
				    <div class="row">
				   	<div class="col-md-12">
				   	   <div class="section">
				   			 <label class="field">
				   			<input type="text" id='provincia' class="gui-input" placeholder="@lang('admin.placeestadoprov')" required>
				   		</label>
				   		</div>
				   	</div>
				   </div>
				     <div class="row">
				   	<div class="col-md-12">
				   	   <div class="section">
				   			 <label class="field">
				   			<input type="text" id="codigo_p" class="gui-input" placeholder="@lang('admin.placecodigopostar')" required>
				   		</label>
				   		</div>
				   	</div>
				   </div>
              		<div class="form-group">
              			<center><input type="submit" value="@lang('admin.btnasociarpay')" class="btn btn-primary" ></center>
              		</div>
              	</form>
              	</div>
              	<div class="col-md-12 m3 panel-mostrar" style="display: none;">
              		<form id="formulario3">
              		<h3>@lang('admin.txtlinkdepaypal')</h3><br>
              		<div class="form-group">
              			{{-- <label>Link PayPal.Me</label> --}}
              			<input type="number" name="" class="gui-input" placeholder="@lang('admin.placeholdertxtlinkpay')" id="numero_tarjeta_p2">
              		</div>
              		<div class="form-group">
              			<center><input type="submit" value="@lang('admin.btnasociarpay')" class="btn btn-primary"></center>
              		</div>
              		</form>
              	</div>
              	</div>
              </div>




            </div>
     <div class="col-md-12"><br><br>
              <div class="panel panel-visible">
                <div class="panel-heading" style="padding: 0px;">
                  <div class="panel-title hidden-xs" style="font-size: 20px;color: #3498db">
                    &nbsp;<span class="glyphicon glyphicon-tasks"></span>@lang('admin.txttarjetasycuentasasocia')</div>
                </div>
                <div class="panel-body pn">
                  <table id="datatable3" class="table table-striped table-bordered nowrap datatable" style="width:100%;font-size: 12px">
                    <thead>
                      <tr>
                        <th>@lang('admin.tablecodigopago1')</th>
                        <th>@lang('admin.tablenumerodecuenta')</th>
                        <th>@lang('admin.tabletitular')</th>
                        <th>@lang('admin.tablefechadevenci')</th>
                        <th>@lang('admin.tablecodigodeseguridad')</th>
                        <th>@lang('admin.tablecorreo')</th>
                        <th>@lang('admin.tableciudad')</th>
                        <th>@lang('admin.tableprovincia')</th>
                        <th>@lang('admin.tabletipocuenta')	</th>
                        <th>@lang('admin.tableaccionespro')</th>
                      </tr>
                    </thead>
                    <tbody>


                      @foreach($cuentas as $value)
                      <?php
                      $type = "";
                        if($value->type_card==2){

                          $t = $value->type_card_bancaria;
                            if($t==1) {
                              $type="American Express";
                              }else if($t==2){
                                $type="Discover";
                              }else if($t==3){
                                $type="MasterCard";
                              }else if($t==4){
                                $type="Visa";
                              }
                            }else{
                              $type="PayPal";
                            }
                      ?>
                      <tr class="fila">
                      <td>{{ $value->id_account }}</td>
                      <td>{{ $value->number_account }}</td>
                      <td>{{ $value->name_headline." ".$value->last_name_headline }}</td>
                      <td>{{ $value->datae }}</td>
                      <td>{{ $value->code_security }}</td>
                      <td>{{ $value->email }}</td>
                      <td>{{ $value->name_departament }}</td>
                      <td>{{ $value->state_or_province }}</td>
                      <td>{{ $type }}</td>
                      <td><button class="btn btn-rounded btn-danger"  data-id='{{ $value->id_account }}'><i class="fa fa-trash"></i></button></td>
                      </tr>
                      @endforeach


                    </tbody>
                  </table>
                </div>
              </div>
            </div>
                </div>
               </div>
        	</div>
    	  </div>
    	  </div>
      </div>
    </div>
  </div>
</div>
          </div>
        </div>
@endsection
