@extends('layouts.admin2')
@section('css')
  <link rel="stylesheet" type="text/css" href="{{ asset('datatable/dataTables.bootstrap.min.css') }} ">
  <link rel="stylesheet" type="text/css" href="{{ asset('datatable/responsive.bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/plugins/ladda/ladda.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/fonts/zocial/zocial.css') }}">

@endsection
@section('js')
<script type="text/javascript">
    // console.log(id);

    // background: url("https://static-content.vnforapps.com/v2/img/button/ES/navy/default/PayWith.png");
     $(".default").css({'background-image':'url("/img/tarjetas/multimarca.png")'});
    $(".default").attr('disabled','disabled');

    $(".condiciones").on('click',function(){
      if($('.condiciones').is(':checked') )
      {
        $(".default").removeAttr("disabled");
      }
      else
      {
      $(".default").attr('disabled','disabled');
      }
    //
    });
    
    
    

</script>
@endsection
@section('contenido')
<script src="https://www.paypalobjects.com/api/checkout.js"></script>

 <div class="tray tray-center" style="padding-left: 10px">
          <div class=" mw1200 center-block  animated fadeIn" style="padding-top: 30px;">
<div class="admin-form theme-primary tab-pane active" id="login2" role="tabpanel">

  <?php
  $user_employee = $dato->id_user_employee;
  $proyecto = $dato->id_project;

  ?>
                <div class="panel panel-primary heading-border">
                  {{-- <div class="panel-heading">
                    <span class="panel-title">
                      <i class="fa fa-sign-in"></i>Titulo:{{ $dato }}</span>
                  </div> --}}
                  <!-- end .form-header section -->

                  <form method="post" action="<?php echo "../$user_employee/$proyecto/paypal" ?>" >
                    {{ csrf_field() }}
                    <input type="hidden" name="proyect" id="proyect" value="">
                    <div class="panel-body p25 pt10">
                      <div class="section row">
                        <div class="col-md-12">
                          <div class="section-divider mv40">
                            <span>@lang('traduccion2.txtdepositarmodeformago')</span>
                          </div>


                          <div class="section">

                            <div class="form-row ">
                                <div class="col-md-4 form-group" style="padding-top: 8px">@lang('traduccion2.txtimportedeldeformago')</div>
                                <div class="col-md-4 form-group">
                              <label for="username" class="field prepend-icon">
                              <input type="text" name="username" id="username" class="gui-input" disabled placeholder="{{ $dato->economic_proposal }}">
                              <label for="username" class="field-icon">
                                $
                              </label>
                            </label>
                                </div>
                                <div class="col-md-4 form-group">
                                     <label for="username" class="field prepend-icon">
                                      <input type="text" disabled name="username" id="username" class="gui-input" disabled placeholder="USD">
                                      <label for="username" class="field-icon">

                                      </label>
                                    </label>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-4 form-group" style="padding-top: 8px">@lang('traduccion2.txtbonosformago')</div>
                                <div class="col-md-4 form-group">
                              <label for="username" class="field prepend-icon">
                              <input type="text" name="username" id="username" class="gui-input" disabled placeholder="0">
                              <label for="username" class="field-icon">
                                $
                              </label>
                            </label>
                                </div>
                                <div class="col-md-4 form-group">
                                     <label for="username" class="field prepend-icon">
                                      <input type="text" disabled name="username" id="username" class="gui-input" disabled placeholder="USD">
                                      <label for="username" class="field-icon">

                                      </label>
                                    </label>
                                </div>

                            </div>
                         <div class="form-row">
                            <div class="col-md-12"><hr style="margin-top: 0px;margin-bottom: 10px"></div>

                                <div class="col-md-4 form-group" style="padding-top: 10px"><b style="font-size:15px">@lang('traduccion2.txttotalformago')</b></div>
                                <div class="col-md-4 form-group">
                              <label for="username" class="field prepend-icon">
                              <input type="text" name="username" id="username" class="gui-input" disabled placeholder="{{ $dato->economic_proposal }}">
                              <label for="username" class="field-icon">
                                $
                              </label>
                            </label>
                                </div>
                                <div class="col-md-4 form-group">
                                     <label for="username" class="field prepend-icon">
                                      <input type="text" disabled name="username" id="username" class="gui-input" disabled placeholder="USD">
                                      <label for="username" class="field-icon">

                                      </label>
                                    </label>
                                </div>

                            </div>
                          </div>


                        </div>

                      </div>

                    </div>
                        <div class="panel-footer" align="center">

                      <div class="row">
                        <div class="col-md-4">

                        </div>
                        <div class="col-md-2">
                              <!--<div id="paypal-button-m"></div>-->

<script type="text/javascript">
       paypal.Button.render({
  env: 'production',
  client: {
    production: 'AcdYegJHTYnwE-9JXd7e3l_9VzRF57ZF-wKj3BMS22XPA6P2Pt9671QTYh_5asTQpTFL1zIMUBkqGSrg'
  },
  payment: function (data, actions) {
    return actions.payment.create({
      transactions: [{
        amount: {
          total:'{{ $dato->economic_proposal }}'.trim()/* */,
          currency: 'USD'
        },
        description:"{{$proyecto}}.Realizar pago al usuario .{{$user_employee}}"
      }]
    });
  },
  onAuthorize: function (data, actions) {
    return actions.payment.execute()
      .then(function () {
         window.location = "../../pago_p?paymentID="+data.paymentID+"&payerID="+data.payerID+"&token="+data.paymentToken+"&pid=123456"
        //window.location = "https://www.laboraplanet.com"
        //window.location = "http://localhost/paypal/orderDetails.php?paymentID="+data.paymentID+"&payerID="+data.payerID+"&token="+data.paymentToken+"&pid=123456 ?>";
      });
  }
}, '#paypal-button-m');
</script>
                         <!--<button type="submit" class="zocial paypal" id="enviar" style="height: 43px;width: 162px;"><b>@lang('traduccion2.txtpagaconpayformago')</b></button>-->
                         </form>
                        </div>
                        <div class="col-md-2">
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
         $amount = $dato->economic_proposal;
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
  <form action=\"https://www.laboraplanet.com/pago/$user_employee/$proyecto?entorno=$entorno&purchaseNumber={$numorden}&amount={$amount}\" method='post'>
          $token
    <script src=\"$urljs\"
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
      data-timeouturl=\"https://www.laboraplanet.com/pago/$user_employee/$proyecto/\"
    /></script>
  </form>";
   echo $formulario;


      }



  ?>

                        </div>

                        <div class="col-md-4">

                        </div>

                     </div>
 <br/>
                     <input type='checkbox' name='condiciones' class="condiciones"/> &nbsp;<label for='condiciones'><a href='https://www.laboraplanet.com/terminos' target="_blank">Acepto los términos y condiciones</a></label>
                    

                    </div>

                    <!--    <div class="panel-footer" align="center">-->
                    <!--  <div class="row">-->
                    <!--    <div class="col-md-4">-->

                    <!--    </div>-->
                    <!--    <div class="col-md-4">-->
                        <!--<img src="{{ asset('img/tarjetas/visa.png') }}" width="40" height="20">-->
                        <!--<img src="{{ asset('img/tarjetas/mastercad.jpg') }}" width="40" height="20">-->
                        <!--<img src="{{ asset('img/tarjetas/dinnerclub.png') }}" width="40" height="20">-->
                        <!--<img src="{{ asset('img/tarjetas/american.png') }}" width="40" height="20">  -->
                        <!--<br/><br/>-->



                    <!--    </div>-->
                    <!--    <div class="col-md-4">-->

                    <!--    </div>-->
                    <!-- </div>-->
                    <!--</div> -->
                </div>
                <!-- end .admin-form section -->
              </div>


        </div>
    </div>



@endsection
