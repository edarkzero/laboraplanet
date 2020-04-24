@extends('layouts.admin2')

@section('css')
  <link rel="stylesheet" type="text/css" href="{{ asset('vendor/plugins/ladda/ladda.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/fonts/zocial/zocial.css') }}">
@endsection

@section('js')
<script type="text/javascript">
    var id = '{{ $p->id }}';
    // console.log(id);

    // background: url("https://static-content.vnforapps.com/v2/img/button/ES/navy/default/PayWith.png");
    $(".default").css({'background-image':'url("/img/tarjetas/multimarca.png")'});

</script>
@endsection

@section('contenido')


 <div class="tray tray-center" style="padding-left: 10px">
          <div class=" mw1200 center-block  animated fadeIn" style="padding-top: 30px;">
<div class="admin-form theme-primary tab-pane active" id="login2" role="tabpanel">
                <div class="panel panel-primary heading-border">
                  <div class="panel-heading">
                    <span class="panel-title">
                      <i class="fa fa-sign-in"></i>@lang('traduccion2.txttituloformago') {{ $p->titulo }} </span>
                  </div>
                  <!-- end .form-header section -->

                  <form method="post" action="<?php echo "$p->id/paypal_u"  ?>" >
                    {{ csrf_field() }}
                    <input type="hidden" name="proyecto" id="proyecto" value="">
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
                                  <?php
                                  $total =$p->presupuesto;
                                  $pagar =0;

                                  if($total<=400)
                                  {
                                     $pagar = ($total*0.07)+$total;
                                  }
                                  if($total>400 && $total<4000)
                                  {
                                     $pagar = ($total*0.06)+$total;
                                  }
                                  if($total>4000 && $total<6000)
                                  {
                                    $pagar = ($total*0.05)+$total;
                                  }
                                  if($total>6000)
                                  {
                                    $pagar = ($total*0.06)+$total;
                                  }

                                  ?>
                              <input type="text" name="username" id="username" class="gui-input" disabled placeholder="10 {{-- {{$pagar}} --}}">
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
                              <input type="text" name="username" id="username" class="gui-input" disabled placeholder="10 {{-- {{$pagar}} --}}">
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
                         <button type="submit" class="zocial paypal" id="enviar" style="height: 43px"><b>@lang('traduccion2.txtpagaconpayformago')</b></button>
                           </form>
                        </div>
                        <div class="col-md-2">
                                             <?php

         $nombre = Auth::user()->nombres;
         $apellido = Auth::user()->apellidos;
         $email = Auth::user()->correo;
         $amount = $pagar;
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

         $sessionToken =create_token($entorno,$amount,$key);

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
  <form action=\"https://www.laboraplanet.com/pago_paypal/$p->id?entorno=$entorno&purchaseNumber={$numorden}&amount={$amount}\" method='post'>
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
      data-timeouturl=\"https://www.laboraplanet.com/pago_paypal/$p->id\"
     /></script>
  </form>";
   echo $formulario;


      }




                        ?>

                        </div>

                        <div class="col-md-4">

                        </div>

                     </div>


                    </div>




                  <!--<div class="panel-footer" align="center">-->
                  <!--  <div class="row">-->
                  <!--    <div class="col-md-4">-->

                  <!--    </div>-->

                  <!--    <div class="col-md-4">-->
                        <!--  <img src="{{ asset('img/tarjetas/visa.png') }}" width="40" height="20">-->
                        <!--<img src="{{ asset('img/tarjetas/mastercad.jpg') }}" width="40" height="20">-->
                        <!--<img src="{{ asset('img/tarjetas/dinnerclub.png') }}" width="40" height="20">-->
                        <!--<img src="{{ asset('img/tarjetas/american.png') }}" width="40" height="20">   -->
                        <!--<br/><br/>-->


                  <!--    </div>-->

                  <!--    <div class="col-md-4">-->

                  <!--    </div>-->
                  <!--  </div>-->
                  <!--</div>-->





                </div>

              </div>


        </div>
    </div>

@endsection
