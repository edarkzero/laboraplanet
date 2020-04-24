@extends('layouts.admin2')
@section('css')


@endsection

@section('contenido')





 <?php

//$respuesta = session('c');

//NUMERO DE PEDIDO
//$numpedido = $respuesta->order->purchaseNumber;
//NUMERO DE AUTORIZACION
//$numautori = $respuesta->order->authorizationCode;
//NOMBRE DEL COMPRADOR
//$comprador = Auth::user()->nombres." ".Auth::user()->apellidos;
//NUMERO DE TARJETA
//$numtarje = $respuesta->dataMap->CARD;
//FECHA Y HORA DEL PEDIDO
//$fechayhoralleva = session('fecha')." ".session('hora');
//IMPORTE DE LA TRANSACCION
//$importe = $respuesta->dataMap->AMOUNT;
//MONEDA DE LA TRANSACCION
//$moneda = $respuesta->order->currency;
//COMENTARIOS
//$comentarios = $respuesta->dataMap->ACTION_DESCRIPTION;



  //TARJETA DE PRUEBA - VALIDA

  //NRO TARJETA     : 4091332908678286
  //FE. VENCIMIENTO : 03/22
  // CVV            : 740


  //TARJETA DE PRUEBA - INVALIDA
  //NRO TARJETA     : 4444333322221111
  //FE. VENCIMIENTO : 03/22
  // CVV            : 740



?>

      <header id="topbar" class="alt">
      	<div class="topbar-left">
      		<ol class="breadcrumb">
            <li class="crumb-active">
              <a href="javascript:void(0);">@lang('traduccion1.sub1recibo_pago')</a>
            </li>
          </ol>
      	</div>
        <div class="topbar-right">
          <ol class="breadcrumb">
            <li class="crumb-active">
              <a href="javascript:void(0);">LABORAPLANET</a>
            </li>
            <li class="crumb-icon">
              <a href="javascript:void(0);">
                <span class="fa fa-bookmark-o"></span>
              </a>
            </li>
            <li class="crumb-link">
              <a href="javascript:void(0);">@lang('traduccion1.sub1recibo_pago')</a>
            </li>
          </ol>
        </div>
      </header>
      <br/>

<div class="row">
	<div class="col-md-3">

	</div>
	<div class="col-md-6">

              <div class="admin-form theme-success tab-pane mw900" id="order3" role="tabpanel">
                <div class="panel panel-success heading-border">
                  <div class="panel-heading">
                    <span class="panel-title">
                      <i class="fa fa-shopping-cart"></i> @lang('traduccion1.sub2recibo_pago')  </span>
                  </div>

                  <form method="post" action="/" id="form-order3">
                    <div class="panel-body p25">
                    	<div class="row">
                    		<div class="col-md-3"></div>
                    		<div class="col-md-3">
                    		<div class="section">
                        		<label class="field option">
                          			<em class="small-text text-muted"> @lang('traduccion1.sub3recibo_pago')</em>
                        		</label>
                      		</div>
                    		</div>
                    		<div class="col-md-3">
                    			<p id="numpedido"><?php echo $_GET['numpedido']; ?></p>
                    		</div>
                    		<div class="col-md-3"></div>
                    	</div>
                    	<div class="row">
                    		<div class="col-md-3"></div>
                    		<div class="col-md-3">
                    		<div class="section">
                        		<label class="field option">
                          			<em class="small-text text-muted">@lang('traduccion1.sub4recibo_pago'):</em>
                        		</label>
                      		</div>
                    		</div>
                    		<div class="col-md-3">
                    			<p id="numautori"><?php  echo $_GET['numautori']; ?></p>
                    		</div>
                    		<div class="col-md-3"></div>
                    	</div>
                    	<div class="row">
                    		<div class="col-md-3"></div>
                    		<div class="col-md-3">
                    		<div class="section">
                        		<label class="field option">
                          			<em class="small-text text-muted">@lang('traduccion1.sub5recibo_pago'):</em>
                        		</label>
                      		</div>
                    		</div>
                    		<div class="col-md-3">
                    			<p><?php  echo $_GET['comprador']; ?></p>
                    		</div>
                    		<div class="col-md-3"></div>
                    	</div>
                    	<div class="row">
                    		<div class="col-md-3"></div>
                    		<div class="col-md-3">
                    		<div class="section">
                        		<label class="field option">
                          			<em class="small-text text-muted">@lang('traduccion1.sub6recibo_pago'):</em>
                        		</label>
                      		</div>
                    		</div>
                    		<div class="col-md-3">
                    			<p><?php  echo $_GET['numtarje'];  ?></p>
                    		</div>
                    		<div class="col-md-3"></div>
                    	</div>
                    	<div class="row">
                    		<div class="col-md-3"></div>
                    		<div class="col-md-3">
                    		<div class="section">
                        		<label class="field option">
                          			<em class="small-text text-muted">@lang('traduccion1.sub7recibo_pago'):</em>
                        		</label>
                      		</div>
                    		</div>
                        <?php

                        # http://www.lawebdelprogramador.com

                        # tiene que recibir la hora inicial y la hora final

                        function RestarHoras($horaini,$horafin)

                        {

                            $f1 = new DateTime($horaini);

                            $f2 = new DateTime($horafin);

                            $d = $f1->diff($f2);

                            return $d->format('%H:%I:%S');

                        }



                        $horaini="21:45:32";

                        $horafin="05:00:00";

                        //echo RestarHoras($horaini,$horafin); //Devolvera 04:00:00

                        ?>
                    		<div class="col-md-3">
                          <?php
                              $uno = explode(" ",$_GET['fechayhoralleva']);
                          ?>
                    			<p><?php echo $uno[0]." ".RestarHoras($_GET['fechayhoralleva'],"05:00:00"); ?></p>
                    		</div>
                    		<div class="col-md-3"></div>
                    	</div>
                    	<div class="row">
                    		<div class="col-md-3"></div>
                    		<div class="col-md-3">
                    		<div class="section">
                        		<label class="field option">
                          			<em class="small-text text-muted">@lang('traduccion1.sub8recibo_pago'):</em>
                        		</label>
                      		</div>
                    		</div>
                    		<div class="col-md-3">
                    			<p><?php echo $_GET['importe'];  ?></p>
                    		</div>
                    		<div class="col-md-3"></div>
                    	</div>
                    	<div class="row">
                    		<div class="col-md-3"></div>
                    		<div class="col-md-3">
                    		<div class="section">
                        		<label class="field option">
                          			<em class="small-text text-muted">@lang('traduccion1.sub9recibo_pago'):</em>
                        		</label>
                      		</div>
                    		</div>
                    		<div class="col-md-3">
                    			<p><?php  echo $_GET['moneda'];  ?></p>
                    		</div>
                    		<div class="col-md-3"></div>
                    	</div>
                    	<div class="row">
                    		<div class="col-md-3"></div>
                    		<div class="col-md-3">
                    		<div class="section">
                        		<label class="field option">
                          			<em class="small-text text-muted">@lang('traduccion1.sub10recibo_pago'):</em>
                        		</label>
                      		</div>
                    		</div>
                    		<div class="col-md-3">
                    			<p><?php  echo $_GET['comentarios']; ?></p>
                    		</div>
                    		<div class="col-md-3"></div>
                    	</div>
                    </div>
                    <?php
                      $numpedido = $_GET['numpedido'];
                      $numautori = $_GET['numautori'];
                      $comprador = $_GET['comprador'];
                      $numtarje = $_GET['numtarje'];
                      $fechayhoralleva = $_GET['fechayhoralleva'];
                      $importe = $_GET['importe'];
                      $moneda =  $_GET['moneda'];
                      $comentarios = $_GET['comentarios'];
                      $idtransac = $_GET['idtransac'];
                    ?>
                    <div class="panel-footer">
                    	<div class="row">
                    		<div class="col-md-3"></div>
                    		<div class="col-md-3">
                    			<a href="imprimir_recibo/{{ $numpedido }}/{{ $numautori }}/{{ $comprador }}/{{ $numtarje }}/{{ $fechayhoralleva }}/{{ $importe }}/{{ $moneda }}/{{ $comentarios }}/{{ $idtransac  }}" target="_blank" id="imprimir"  class="btn btn-rounded btn-default btn-block">@lang('traduccion1.sub11recibo_pago')</a>
                    		</div>
                    		<div class="col-md-3">
                    			<a href="{{ route('aspirantes',$_GET['pro']) }}"  class="btn btn-rounded btn-success btn-block">@lang('traduccion1.sub12recibo_pago')</a>
                    		</div>
                    		<div class="col-md-3"></div>
                    	</div>

                    </div>

                  </form>
                </div>
              </div>


	</div>
	<div class="col-md-3">

	</div>
</div>






@endsection


@section('js')
{{-- <script src="js/laborajs/recibo.js"></script> --}}

@endsection
