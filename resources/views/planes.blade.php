@extends('layouts.admin2')
@section('contenido')
@section('css')
<link rel="stylesheet" type="text/css" href="css/planes.css">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/fonts/zocial/zocial.css') }}">

@endsection
@section('js')
<script type="text/javascript">

$(".default").css({'background-image':'url("/img/tarjetas/multimarca.png")'});

$(".default").attr('disabled','disabled');

$(".nodefault").attr('disabled','disabled');
$(".nodefault").css({'background-image':'url("/img/tarjetas/multimarca.png")'});

$(".condiciones").on('click',function(){
  if($('.condiciones').is(':checked') )
  {
    $(".default").removeAttr("disabled");
    $(".nodefault").removeAttr('disabled');
  }
  else
  {
  $(".default").attr('disabled','disabled');
  $(".nodefault").attr('disabled','disabled');
  }
//
});

$(".nodefault").on('click',function(){
        $(".default").click();
});


    /*$(".default").on('click',function(){
        
        var xd1 = $("#select_1").val();
        var xd2 = $("#select_2").val();
        
        if(xd1 == null || xd1 == "")
        {
            <?php
                $amount= "0";
            ?>
            
            {{$amount}} = xd2;
        }
        
    });*/



        $('.boton-plan').on('click',function(){
            $("#plan").val($(this).data('plan'));

        })
            var vv = $("#select_1").val()
            if(vv=='m'){
                $("#paypal-button-m").show();
                $("#paypal-button-t").hide();
            }
            if(vv=='t'){
                $("#paypal-button-t").show();
                $("#paypal-button-m").hide();
            }
        $("#select_1").on('change',function(){
            var vv = $("#select_1").val()
            if(vv=='m'){
                $("#paypal-button-m").show();
                $("#paypal-button-t").hide();
            }
            if(vv=='t'){
                $("#paypal-button-t").show();
                $("#paypal-button-m").hide();
            }

        })
        var vv2 = $("#select_2").val()
            if(vv2=='m'){
                $("#paypal-button-m-p").show();
                $("#paypal-button-t-p").hide();
            }
            if(vv2=='t'){
                $("#paypal-button-t-p").show();
                $("#paypal-button-m-p").hide();
            }
        $("#select_2").on('change',function(){
            var vv2 = $("#select_2").val()
            if(vv2=='m'){
                $("#paypal-button-m-p").show();
                $("#paypal-button-t-p").hide();
            }
            if(vv2=='t'){
                $("#paypal-button-t-p").show();
                $("#paypal-button-m-p").hide();
            }
        })
</script>
@endsection
<script src="https://www.paypalobjects.com/api/checkout.js"></script>
 <script src="https://www.paypal.com/sdk/js?client-id=AcdYegJHTYnwE-9JXd7e3l_9VzRF57ZF-wKj3BMS22XPA6P2Pt9671QTYh_5asTQpTFL1zIMUBkqGSrg"
 data-namespace="paypal_sdk"></script>
 <div class="tray tray-center" style="padding-left: 10px">
          <div class=" mw1200 center-block  animated fadeIn" style="padding-top: 30px;">

<div class="admin-form theme-primary">

              <div class="panel heading-border panel-primary">
                <div class="panel-body bg-light">
{{--                   <form method="post" action="" id="form-ui">
 --}}                    <div class="section-divider mb40" id="spy1">
                      <span style="font-size: 25px">@lang('admin.txtplanesymembresias')</span>
                    </div>
                    <?php
                        $div ="";
                       $mensaje = "";
                    ?>
                    @if(session()->has('mensaje'))
                    <?php
                       $va = explode("/", session('mensaje'));

                        if (count($va)==2) {
                            if ($va[1]==0) {$div = "warning";}
                            if ($va[1]==1) {$div = "success";}
                            if ($va[1]==2) {$div="danger";}
                            $mensaje = $va[0];
                        }
                    ?>
                    <div class="alert alert-{{ $div }} alert-dismissable" style="font-size: 20px;">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">�</button>
                        {{-- <i class="fa fa-check pr10"></i>             --}}
                              {{ $mensaje }}
                    </div>
                    @else
                        <?php
                            if (count($miplan)==0) {
                                $div="warning";
                                $mensaje ="Usted no cuenta con un plan";
                            }else{

                                $nombreplan = "";

                                if($miplan[0]->id_plan == 1)
                                {
                                    $nombreplan = "Free";
                                }
                                if($miplan[0]->id_plan == 3)
                                {
                                    $nombreplan = "Laboral";
                                }
                                if($miplan[0]->id_plan == 4)
                                {
                                    $nombreplan = "Empresarial";
                                }
                                if($miplan[0]->id_plan == 5)
                                {
                                    $nombreplan = "Desc";
                                }

                                $div="success";
                                //$mensaje = "Usted cuenta con un plan hasta ".$miplan[0]->datae." ".$nombreplan;
                                $mensaje = "Usted cuenta con un plan"." ".'"'.$nombreplan.'"'." ".", que caduca el dia ".$miplan[0]->datae;
                            }
                        ?>
                       <div class="alert alert-{{ $div }} alert-dismissable" style="font-size: 20px;">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">�</button>
                          {{ $mensaje }}
                        </div>
                    @endif



                <!--<form action="paypal" method="POST" id="formulario">-->
                <div class="page-body">

                    <div class="row pricing-container">

                            <input type="hidden" name="n_plan" id="plan">
                            <div class="col-xs-12 col-sm-6 col-md-1">
                            </div>
                        <div class="col-xs-12 col-sm-6 col-md-4">


                               {{ @csrf_field() }}
                            <div class="plan">
                                <div class="header bordered-yellow">PLAN LABORAL</div>
                                <div class="price yellow" style="color: #ffce55;">
                                    <?php
                                    $completo = $planplatinum->price;
                                    $porciones = explode(",", $completo);

                                    //print_r($planplatinum);
                                    //exit();
                                    ?>

<!--
value="m"
value="t"
-->
<select class="form-control" id="select_1">
  <option value="">-- Seleccione tiempo --</option>
  <option value="{{$porciones[0]}}">${{$porciones[0]}} <label>/ MES</label> </option>
  <option value="{{ $porciones[1] }}">${{ $porciones[1] }} <label>/ TRIMESTRAL  </label> <label>, AHORRA 20% APROX.</label> </option>
</select>


                              </div>

                                <ul>
                                    <?php
                                    $completo = $planplatinum->description;
                                    $porciones1 = explode(",",$completo);
                                    ?>
                                    @foreach ($porciones1 as $pla)
                                    <li>{{$pla}}</li>
                                    @endforeach
                                </ul>
                                  <!--<div id="paypal-button-container"></div>-->

<script>
  window.paypal_sdk.Buttons({
    createOrder: function(data, actions) {
      // This function sets up the details of the transaction, including the amount and line item details.
      return actions.order.create({
        purchase_units: [{
          amount: {
            value: '1'
          },
          description:"Plan laboral mensual"
        }]
      });
    },
    onApprove: function(data, actions) {
      // This function captures the funds from the transaction.
      return actions.order.capture().then(function(details) {
        // This function shows a transaction success message to your buyer.
        // console.log(data)
        alert("Pago realizado con exito")
        // alert('Transaction completed by ' + details.payer.name.given_name);
      });
    },
    onCancel: function(data, actions) {
                    console.log('user cancelled-', data);
                },
                onError: function(data, actions) {
                    console.log('error occured-s', data);
                }
  }).render('#paypal-button-container');
  //This function displays Smart Payment Buttons on your web page.
</script>
                               <!-- <div id="paypal-button-container"></div>-->
                          <!--      <div id="paypal-button-m"></div>

                                <div id="paypal-button-t" style="display:none"></div>-->
                                <!--<p>O</p>-->

                            <div class="" style="border:solid 5px black;">
         <?php
         $nombre = Auth::user()->nombres;
         $apellido = Auth::user()->apellidos;
         $email = Auth::user()->correo;
         $codigo = Auth::user()->id;
         $numdoc = Auth::user()->documento;
         $date1 = new DateTime(date('Y-m-d'));
         $date2 = new DateTime(Auth::user()->fecha);
         $diff = $date1->diff($date2);
         $dias = $diff->days;

         $amount = 1;
         $userTokenId = "ba52586f-32d8-4434-aaf3-ff6327a687c3";
         $entorno = "prd";

         if(isset($amount)) {
          switch ($entorno) {
            case 'dev':
                $usr = usrtest;
                $pwd = pwdtest;
              break;
            case 'prd':
                $usr = usr;
                $pwd = pwd;
                break;

          }



        $key = securitykey($entorno,$usr,$pwd);

        // echo "LLAVE: ",$key."<br/>";

         setcookie("key",$key);

         $sessionToken =create_token($entorno,$amount,$key,$email,$codigo,$numdoc,$dias);

         // echo "SESSION-TOKEN :", $sessionToken;


        if(isset($nombre)) {
          $nombre = $nombre;
        }else {
          $nombre = "";
        }
        if(isset($apellido)) {
          $apellido = $apellido;
        }else {
          $apellido = "";
        }
        if(isset($email)) {
          $email = $email;
        }else {
          $email = "";
        }
        if(isset($userTokenId)){
          $userTokenId = $userTokenId;
        }else {
          $userTokenId = "";
        }

        $arrayPost = array("sessionToken"=>$sessionToken,"amount"=>$amount,"nombre"=>$nombre,"apellido"=>$apellido,"email"=>$email,"userTokenId"=>$userTokenId,"entorno"=>$entorno,"key"=>$key);
  }

  //PARA GENERAR EL BOTON

      if(isset($sessionToken)) {
          if(isset($nombre)){
            $nombre = $nombre;
          }else {
            $nombre="";
          }
          if(isset($apellido)){
            $apellido = $apellido;
          }else {
            $apellido = "";
          }
          if(isset($email)){
            $email = $email;
          }else {
            $email = "";
          }
          if(isset($userTokenId)) {
            $userTokenId = $userTokenId;
          }else {
            $userTokenId="";
          }

          switch ($entorno) {
            case 'dev':
                $urljs="https://static-content-qas.vnforapps.com/v2/js/checkout.js?qa=true";
                $merchantId = merchantidtest;
                break;
            case 'prd':
                $urljs="https://static-content.vnforapps.com/v2/js/checkout.js";
                $merchantId = merchantidprd;
                break;
          }

  $merchantId;
  $amount = $amount;
  $sessionToken = $sessionToken;
  $numorden = contador();

  $token = csrf_field() ;

  /**  <form action=\"../$user_employee/$proyecto?entorno=$entorno&purchaseNumber={$numorden}&amount={$amount}\" method='post'>  **/

  // SI ESTA BIEN CAMBIAR LA RUTA y esperar a que se pueda en formato testting;

  //TARJETA DE PRUEBA

  //NRO TARJETA     : 4091332908678286
  //FE. VENCIMIENTO : 03/22
  // CVV            : 740








  $formulario="
  <form action=\"https://www.laboraplanet.com/planes?entorno=$entorno&purchaseNumber={$numorden}&amount={$amount}\" method='post'>
          $token
    <script class='weed' src=\"$urljs\"
      data-sessiontoken=\"$sessionToken\"
      data-merchantid=\"$merchantId\"
      data-channel=\"web\"
      data-buttonsize=\"\"
      data-buttoncolor=\"\"
      data-merchantlogo =\"https://www.laboraplanet.com/img/LogoVertical.png\"
      data-merchantname=\"\"
      data-formbuttoncolor=\"#2d9a7f\"
      data-showamount=\"\"
      data-purchasenumber=\"$numorden\"
      data-amount=\"$amount\"
      data-cardholdername=\"$nombre\"
      data-cardholderlastname=\"$apellido\"
      data-cardholderemail=\"$email\"
      data-usertoken=\"$userTokenId\"
      data-recurrence=\"\"
      data-frequency=\"\"
      data-recurrencetype=\"\"
      data-recurrenceamount=\"\"
      data-documenttype=\"0\"
      data-documentid=\"\"
      data-beneficiaryid=\"TEST1123\"
      data-productid=\"\"
      data-phone=\"\"
      data-timeouturl=\"https://www.laboraplanet.com/planes/\"
    /></script>
  </form>";
   echo $formulario;


      }



  ?>

                        </div>
<br/>
<input type='checkbox' name='condiciones' class="condiciones"/> &nbsp;<label for='condiciones'><a href='https://www.laboraplanet.com/terminos' target="_blank">Acepto los términos y condiciones</a></label>
<script>

 //   console.log(value+"------")
    paypal.Button.render({
  env: 'production',
  client: {
	production: 'AcdYegJHTYnwE-9JXd7e3l_9VzRF57ZF-wKj3BMS22XPA6P2Pt9671QTYh_5asTQpTFL1zIMUBkqGSrg'
//	sandbox:'AUPPwekyYvpd-xQGO2k58U-lduN8N8DvFykmT0afPfavPL-VPSOAf_hspUzCMxapjTDMIHHqfLs4X1dB'
  },
  payment: function (data, actions) {
	return actions.payment.create({
	  transactions: [{
		amount: {
		  total:'{{$porciones[1]}}'.trim()/* */,
		  currency: 'USD'
		},
		description:"Plan laboral trimestral"

	  }]
	});
  },
  onAuthorize: function (data, actions) {
	return actions.payment.execute()
	  .then(function () {

	  //	window.location = "https://www.laboraplanet.com"
	    window.location = "paypal_proceso?paymentID="+data.paymentID+"&payerID="+data.payerID+"&token="+data.paymentToken+"&pid=123456"
	  });
  }
}, '#paypal-button-t');

    paypal.Button.render({
  env: 'production',
  client: {
	production: 'AcdYegJHTYnwE-9JXd7e3l_9VzRF57ZF-wKj3BMS22XPA6P2Pt9671QTYh_5asTQpTFL1zIMUBkqGSrg'

  },
  payment: function (data, actions) {
	return actions.payment.create({
	  transactions: [{
		amount: {
		  total:'{{$porciones[0]}}'.trim()/* */,
		  currency: 'USD'
		},
        description:"Plan laboral mensual"
	  }]
	});
  },
  onAuthorize: function (data, actions) {
	return actions.payment.execute()
	  .then(function () {
	  	 console.log(data)
	  	          window.location = "paypal_proceso?paymentID="+data.paymentID+"&payerID="+data.payerID+"&token="+data.paymentToken+"&pid=123456"
	  	//window.location = "https://www.laboraplanet.com"
		//window.location = "http://localhost/paypal/orderDetails.php?paymentID="+data.paymentID+"&payerID="+data.payerID+"&token="+data.paymentToken+"&pid=123456 ?>";
	  });
  }
}, '#paypal-button-m');


</script>
                                <br/><br/>
                            </div>

                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-2">
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4">

                            <div class="plan">
                                <div class="header bordered-yellow">PLAN EMPRESARIAL</div>
                                <div class="price yellow" style="color: #ffce55;">

                                <?php
                                $completo2 = $plangolden->price;
                                $porciones2= explode(",", $completo2);
                                ?>

<!--
value='m'
value='t'
-->
                                <select class="form-control" id="select_2">
                                  <option value="">-- Seleccione tiempo --</option>
                                  <option value='{{$porciones2[0]}}'>${{$porciones2[0]}} <label>/ MES</label> </option>
                                  <option value='{{ $porciones2[1] }}'>${{ $porciones2[1] }} <label>/ TRIMESTRAL  </label> <label>, AHORRA 20% APROX.</label> </option>
                                </select>

                                </div>

                                <ul>
                                    <?php
                                    $completo = $plangolden->description;
                                    $porciones1 = explode(",",$completo);
                                    ?>
                                    @foreach ($porciones1 as $pla)
                                    <li>{{$pla}}</li>
                                    @endforeach
                                </ul>
                                <!--<div id="paypal-button-m-p"></div>-->
                                <div id="paypal-button-t-p" style="display:none"></div>
                              <!--<p>o</p>-->
                            <div class="" style="border:solid 5px black;">
<button type="button" class="start-js-btn modal-opener nodefault" style="width: 187px;height: 40px;"></button>

                        </div>
                        <br/>
                        <input type="checkbox" name="condiciones" class="condiciones">
                        <label for="condiciones"><a href="https://www.laboraplanet.com/terminos" target="_blank">Acepto los términos y condiciones</a></label>

<script>

    paypal.Button.render({
  env: 'production',
  client: {
	production: 'AcdYegJHTYnwE-9JXd7e3l_9VzRF57ZF-wKj3BMS22XPA6P2Pt9671QTYh_5asTQpTFL1zIMUBkqGSrg'
  },
  payment: function (data, actions) {
	return actions.payment.create({
	  transactions: [{
		amount: {
		  total:'{{$porciones[1]}}'.trim()/* */,
		  currency: 'USD'
		},
		        description:"Plan empresarial trimestral"

	  }]
	});
  },
  onAuthorize: function (data, actions) {
	return actions.payment.execute()
	  .then(function () {
	  		  	          window.location = "paypal_proceso?paymentID="+data.paymentID+"&payerID="+data.payerID+"&token="+data.paymentToken+"&pid=123456"

		//window.location = "http://localhost/paypal/orderDetails.php?paymentID="+data.paymentID+"&payerID="+data.payerID+"&token="+data.paymentToken+"&pid=123456 ?>";
	  });
  }
}, '#paypal-button-t-p');

    paypal.Button.render({
  env: 'production',
  client: {
	production: 'AcdYegJHTYnwE-9JXd7e3l_9VzRF57ZF-wKj3BMS22XPA6P2Pt9671QTYh_5asTQpTFL1zIMUBkqGSrg'
  },
  payment: function (data, actions) {
	return actions.payment.create({
	  transactions: [{
		amount: {
		  total:'{{$porciones[0]}}'.trim()/* */,
		  currency: 'USD'
		},
		        description:"Plan empresarial mensual"

	  }]
	});
  },
  onAuthorize: function (data, actions) {
	return actions.payment.execute()
	  .then(function () {
	  	          window.location = "paypal_proceso?paymentID="+data.paymentID+"&payerID="+data.payerID+"&token="+data.paymentToken+"&pid=123456"

		//window.location = "http://localhost/paypal/orderDetails.php?paymentID="+data.paymentID+"&payerID="+data.payerID+"&token="+data.paymentToken+"&pid=123456 ?>";
	  });
  }
}, '#paypal-button-m-p');


</script>


                                <!--<button class="zocial paypal boton-plan" data-plan='m-4'>@lang('traduccion1.paga_con_paypal')</button>
                                -->
                                <br/><br/>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-1">
                        </div>
                    </div>
                </div>

                <!-- OTRO PLAN -->

                  <div class="page-body">

                    <div class="row pricing-container">




                        </div>
                    </div>
                <!--</form>-->
            </div>
        </div>
    </div>
    </div>
</div>
@endsection
