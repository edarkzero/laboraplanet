@extends('layouts.admin2')
@section('css')
<meta name="description" content="La mayor red de autoempleo y trabajo desde casa, contrata excelentes profesionales freelance certificados. Chat en vivo, videollamadas y  grupos de interés para un proyecto exitoso.">
<meta name="google-site-verification" content="7cDO9LcWNud47D_4e7C0c3KxLQisYXbAbW3h939dEOE" />

 <!-- METAS PARA FACEBOOK-->
<meta property="og:url" content="https://www.laboraplanet.com">
<meta property="og:image" content="https://www.laboraplanet.com/img/LogoVertical.png">
<meta property="og:description" content="La mayor red de autoempleo y trabajo desde casa, contrata excelentes profesionales freelance certificados. Chat en vivo, videollamadas y  grupos de interés para un proyecto exitoso.">
<meta property="og:title" content="LaboraPlanet">
<meta property="og:site_name" content="LaboraPlanet">
<meta property="og:see_also" content="https://www.laboraplanet.com">
<!-- METAS PARA TWITEER-->
<meta name="twitter:card" content="summary">
<meta name="twitter:url" content="https://www.laboraplanet.com">
<meta name="twitter:title" content="LaboraPlanet">
<meta name="twitter:description" content="La mayor red de autoempleo y trabajo desde casa, contrata excelentes profesionales freelance certificados. Chat en vivo, videollamadas y  grupos de interés para un proyecto exitoso.">
<meta name="twitter:image" content="https://www.laboraplanet.com/img/LogoVertical.png">
<!-- METAS PARA GOOGLE+ -->
<meta itemprop="name" content="LaboraPlanet">
<meta itemprop="description" content="La mayor red de autoempleo y trabajo desde casa, contrata excelentes profesionales freelance certificados. Chat en vivo, videollamadas y  grupos de interés para un proyecto exitoso.">
<meta itemprop="image" content="https://www.laboraplanet.com/img/LogoVertical.png">


 <link rel="stylesheet" type="text/css" href="vendor/plugins/slick/slick.css">

<style type="text/css">
  /*===============================================
  Skin Toolbox
================================================= */

#portada {
   background: url('img/proyectos_personalizados_3.png') no-repeat fixed  center;
}

[class^='select2'] {
  border-radius: 0px !important;
}


.select2-container .select2-selection--single {
    height: 35.5px !important;
}


.select2-results__options{
        font-size:14px !important;
 }

.select2-selection {
  -webkit-box-shadow: 0;
  box-shadow: 0;
  background-color: #fff;
  border: 0;
  border-radius: 0;
  color: #555555;
  font-size: 14px;
  outline: 0;
  min-height:35px;
  text-align: left;
}

.select2-selection__rendered {
  margin: -5px;
}

.select2-selection__arrow {
  margin: -5px;
}

#skin-toolbox {
  z-index: 999;
  overflow: visible !important;
  position: fixed;
  top: 200px;
  right: -230px;
  width: 230px;
  -webkit-transition: right 0.1s ease-in-out;
  -moz-transition: right 0.1s ease-in-out;
  transition: right 0.1s ease-in-out;
}
#skin-toolbox.toolbox-open {
  right: 0;
}

#skin-toolbox .panel-heading {
  cursor: pointer;
  margin-right: 30px;
  border: 1px solid #DDD;
  width: 274px;
  height: 47px;
  line-height: 42px;
  right: 44px;
  font-size: 14px;
}
#skin-toolbox .panel-heading .panel-title {
  padding-left: 40px;
}
#skin-toolbox .panel-body {
  border: 1px solid #DDD;
  border-top: 0;
  padding: 23px;
}
#skin-toolbox .panel-icon {
  font-size: 22px;
  padding-right: 20px;
  padding-left: 6px;
}

.box-icon {
    /*background-color: rgba(104,103,102,0.8);*/
    /*border-radius: 50%;*/
    display: table;
    height: 100px;
    margin: 0 auto;
    width: 150px;
    margin-top: -61px;
}

.box-icon2 {
    background-color: rgba(104,103,102,0.8);
    border-radius: 50%;
    display: table;
    height: 100px;
    margin: 0 auto;
    width: 100px;
    margin-top: -61px;
}
.box-icon span {
    color: #fff;
  margin-top: 10px;
    display: table-cell;
    text-align: center;
    vertical-align: middle;
}
</style>
@endsection
@section('contenido')

@include('include.search')

<?php
$contar =0;
?>



<div class="container" id="">
    <div class="row">
      <div class="col-md-1">

      </div>
      <div class="col-md-10">

          <div class="panel panel-system">
              <div class="panel-heading" align="center">
                <span class="panel-title"  id="eresempre">@lang('traduccion2.txteresmpreindex')</span>
              </div>
                <div class="">
                  <div class="row">
{{--                     <div class="col-md-1" id="foto_movil" style="background:url(img/proyectos_personalizados.PNG) no-repeat;height: 420px;width: 12px">

                    </div> --}}
                    <div class="col-md-12">
                      <img src="img/proyectos_personalizados.PNG" id="foto_movil" alt="Mi titulo de la imagen" style="height: 300px;float: left;">
                      {{-- <br/> --}}
                        <h3 style="text-align: center;font-size: 18px;color: #2e9e83;color: #000000;">@lang('admin.notepreocupesnoso')</h3>
                        {{-- <br/> --}}
                        <div style="text-align: left;font-size: 13px">
                        <b><p style="color: #000000;"><img src="img/icon-listo-30.png">&nbsp;@lang('admin.punto1')</p></b>
                        <b><p style="color: #000000;"><img src="img/icon-listo-30.png">&nbsp;@lang('admin.punto3')</p></b>
                        <b><p style="color: #000000;"><img src="img/icon-listo-30.png">&nbsp;@lang('traduccion2.txtopcion31index')</p></b>
                        <b><p style="color: #000000;"><img src="img/icon-listo-30.png">&nbsp;@lang('admin.punto4')</p></b>
                        <br/>
                        <center><button style="width: 180px" id="solicita" type="button" class="btn active btn-system btn-block">
                          @lang('admin.btnnecesita')
                        </button></center>
                        <br/>
                        </div>
                    </div>
                  </div>

                </div>

          </div>

      </div>
      <div class="col-md-1">

      </div>
    </div>

</div>




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
                    <h5>@lang('traduccion2.txtnacionalidadindex') *</h5>
                    <label for="correo" class="field prepend-icon">
                      <select class="form-control" id="cbx_correo" required>
                        <option value="">@lang('traduccion2.txtopcionseleccionemple')</option>
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

              </div>

            </form>
          </div>

        </div>



<br/><br/>


        <div class="container">
          <div class="row">
            <div class="col-md-1">

            </div>
            <div class="col-md-10" align="center">
                <div class="panel panel-system">
  <div class="panel-heading">
    <span class="panel-title">@lang('traduccion2.txtconfiaronennosotros')</span>
  </div>
  <div class="">

            <div class="slider-demo9" align="center">

              <div class="slick-autoplay">
                <div class="slick-slide">
                 <img src="img/servicios_e.jpeg" style="width: 180px;height: 140px" >
                </div>
                <div class="slick-slide">
                    <img src="img/logo_ccl.png" style="width: 180px;height: 140px">
                </div>
                <div class="slick-slide">
                  <img src="img/confiaron/uni-e.png" style="width: 180px;height: 140px">
                </div>
                <div class="slick-slide">
                  <img src="img/geinktec_e.jpeg" style="width: 180px;height: 140px">
                </div>
              </div>
            </div>
  </div>

</div>
            </div>
            <div class="col-md-1">

            </div>
          </div>

</div>


        <div class="container">
          <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10" >
   <div class="panel panel-system" align="center">
  <div class="panel-heading">
    <span class="panel-title">@lang('traduccion2.txttestimoniosempreindex')</span>
  </div>
  <div class="">
    <div class="slick-autoplay1">
     @foreach($coments2  as $plasmaxd2)
    <?php $us = $plasmaxd2->usuario ?>

                    <?php
                    $fechaxd =$plasmaxd2->date_finish;
                    $separador = explode(" ", $fechaxd);
                    $separador[0];
                    $newfecha = date("d/m/Y",strtotime($separador[0]));
                     ?>


                <?php
            if ($plasmaxd2->logo_empresa==null)
            {
              $mostrar ='img/none.png';
            }
            else
            {
              $mostrar=$plasmaxd2->logo_empresa;
            }

            if($plasmaxd2->codigo_pais==null)
            {
              $paisx = "img/x.png";
            }
            else
            {
              $paisx = "img/pais/".$plasmaxd2->codigo_pais.".gif";
            }
            ?>
  <div class="col-md-3" >
          <div class="box" id="cortes" style="height: 230px">
            <p style="font-size: 10px;float: left;">{{$newfecha}}</p>
            <img src="{{ $paisx }}"  width="25" height="15" style="float: right;"/>
                <div class="row">
                  <div class="col-md-12" align="center">
                      <div class="box-icon">
                          <img src="{{$mostrar}}" width="100" height="100" style="border: 1px solid #37bc9b;"/>
                      </div>
                      <p></p>
                    @for($i=1;5>=$i;$i++)
                      @if($plasmaxd2->qualification>=$i)
                      <i class="fa fa-star" style="color: #f1c40f;font-size: 15px"></i>
                      @else
                      <i class="fa fa-star-o"  style="color: #f1c40f;font-size: 15px"></i>
                      @endif
                    @endfor

                  </div>

                </div>

                <div class="row" align="center">
                  <div class="col-md-12">
                     <b style="font-size: 15px">{{ strtoupper($plasmaxd2->razon_social)}} </b>
                  </div>
                </div>

                <div class="row" align="center">
             <?php
              $comentariod =  $plasmaxd2->commit_finish;
              $carateresd = 21;

              $bar = $plasmaxd2->commit_finish;
              $bar = ucfirst($bar);
              $bar = ucfirst(strtolower($bar));

              ?>
            <p  title="{{ $plasmaxd2->commit_finish }}" style="font-size: 12px">{{ $bar }}</p>
            {{-- <p title="{{ $plasmaxd->commit_finish }}">"{{ strtolower($plasmaxd->commit_finish)}}"</p> --}}
                </div>




            </div>
             <br/>
    </div>

    @endforeach
</div>








  </div>
  <div class="panel-heading" style="background-color: #37bc9b;border-color: #2d9a7f;">
    <span class="panel-title" style="color: white;">@lang('traduccion2.txttestimonioscolaborindex')</span>
  </div>
  <div>
  <div class="slick-autoplay1">
    @foreach($coments  as $plasmaxd)
    <?php $us = $plasmaxd->usuario ?>
    <?php
    $fechaxd =$plasmaxd->date_finish;
    $separador = explode(" ", $fechaxd);
    $separador[0];
    $newfecha = date("d/m/Y",strtotime($separador[0]));
    ?>


            <?php
            if ($plasmaxd->imagen==null)
            {
              $mostrar ='img/none.png';
            }
            else
            {
              $mostrar=$plasmaxd->imagen;
            }

            if($plasmaxd->codigo_pais==null)
            {
              $paisx = "img/x.png";
            }
            else
            {
              $paisx = "img/pais/".$plasmaxd->codigo_pais.".gif";
            }
            ?>

  <div class="col-md-3" >

          <div class="box" id="cortes" style="height: 230px">
          <p style="font-size: 10px;float: left;">{{$newfecha}}</p>
          <img src="{{ $paisx }}"  width="25" height="15" style="float: right;">
                <div class="info" style="text-align: center;">
                      <div class="box-icon2">
                        <img src="{{$mostrar}}" width="100" height="100" style="border: 1px solid #37bc9b;">
                      </div>
                      <p></p>
                <div class="row">
                  <div class="col-md-12">
                    @for($i=1;5>=$i;$i++)
                      @if($plasmaxd->qualification>=$i)
                      <i class="fa fa-star" style="color: #f1c40f;font-size: 15px"></i>
                      @else
                      <i class="fa fa-star-o"  style="color: #f1c40f;font-size: 15px"></i>
                      @endif
                    @endfor
                  </div>
                  <div class="col-md-12">


                  </div>
                </div>


                     <b><p style="font-size: 15px">{{$plasmaxd->nombres}}</p></b>


            <p>"{{ ucwords($plasmaxd->profesion)}}"</p>


            <?php
              $comentariox =  $plasmaxd->commit_finish;
              $carateresx = 21;
            ?>

             <?php
              $comentariod =  $plasmaxd->commit_finish;
              $carateresd = 21;

              $bar = $plasmaxd->commit_finish;
              $bar = ucfirst($bar);
              $bar = ucfirst(strtolower($bar));

              ?>
            <p  title="{{ $plasmaxd->commit_finish }}" style="font-size: 12px">{{ $bar }}</p>

                </div>

            </div>
             <br/>
    </div>

    @endforeach
</div>
  </div>
</div>
            </div>
            <div class="col-md-1"></div>
          </div>

      </div>








<div class="container">
  <div class="row">
  <div class="col-md-1">

</div>
<div class="col-md-10">
  <div class="row">


      <div class="col-md-4">
        <div class="panel panel-tile text-info br-b bw5 br-dark-light">
          <div class="panel-body pl20 p5">

          <center>
            <a href="javascript:void(0)" style="text-decoration: none;">
                <img  style="border:0px solid;display: inline;width:100px;margin-top: 12px" alt="contador de visitas" src="https://www.cutercounter.com/hits.php?id=guqonpf&nd=6&style=9">
            </a>
            <br>
            <h5 class="text-muted" style="font-size: 15px;margin-top:16px"> @lang('traduccion2.txtvisitantreindex') </h5>
          </center>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="panel panel-tile text-info br-b bw5 br-info-light">
          <div class="panel-body p120 p5" style="margin-top:4px;">
            <center>
               <b style="font-size: 23px;font-weight: 2700;" id="contar">27,615</b>
              <b> <h5 class="text-muted" style="font-size: 15px"> @lang('traduccion2.txtrequepublicindex') </h5></b>
            </center>
          </div>

        </div>
      </div>

      <div class="col-md-4">
            <div class="panel panel-tile text-success br-b bw5 br-success-light">
            <div class="panel-body pl20 p5" style="margin-top:4px;">
            <center>
              <b style="font-size: 23px;margin-top:25px;font-weight: 2700;" id="contar2">17,802</b>
              <b><h5 class="text-muted" style="font-size: 15px"> @lang('traduccion2.txttrabajadorindex') </h5></b>
            </center>
          </div>
        </div>
      </div>


    </div>
</div>
<div class="col-md-1">

</div>
</div>
</div>







@endsection


@section('js')
 <script src="vendor/plugins/slick/slick.js"></script>
 <script src="vendor/plugins/canvasbg/canvasbg.js"></script>
 <script src="js/starrr.js"></script>
 <script src="js/countUp.js"></script>

<script type="text/javascript">

  $(document).ready(function() {
    $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

var xd = '';
// alert("La resolución de tu pantalla es: " + screen.width + " x " + screen.height)
if(screen.width <= 500)
{
  var xd = 1
  $("#publicapro").css({"width":"120px"});
  $("#t1x").css({"font-size":"9px"});
  $("#buscotraba").css({"width":"120px"});
  $("#t2x").css({"font-size":"9px"});
  $("#el1").removeClass("col-xs-2");
  $("#el2").removeClass("col-xs-2");
  $("#ca1").removeClass("col-xs-4");
  $("#ca2").removeClass("col-xs-4");
  $("#ca1").addClass("col-xs-6");
  $("#ca2").addClass("col-xs-6");
  $("#ctxt1").css({"font-size": "11px"});
}
else
{
  var xd  = 3
  $("#publicapro").css({"width":"190px"});
  $("#buscotraba").css({"width":"190px"});
}
// var xd  = 3
    $('.slick-autoplay1').slick({
      dots: true,
      slidesToShow: xd,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 800,

    });






   $("#cbx_tipo").select2({
      placeholder: "Seleccione",
      minimumResultsForSearch: -1,


    });


    $('.slick-autoplay').slick({
      dots: true,
      slidesToShow: 1,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 800,
    });






    $("#txtbusqueda").keypress(function(e) {

       var code = (e.keyCode ? e.keyCode : e.which);
      if(code== 13) {

          $("#cbx_tipo").focus();
          $("#cbx_tipo").select2('open');


      }
    });

$("#buscar").on('click',function() {

  if($("#cbx_tipo").val() == 0 || $("#cbx_tipo").val() == "")
  {
    // $("#cbx_tipo").focus();
    // console.log('NO HA SELECCIONADO OPCION XX' );
    mensaje('Seleccione un tipo de busqueda','warning');
              $("#cbx_tipo").focus();
          $("#cbx_tipo").select2('open');
  }
  else
  {
   // $("#buscar").click();

  }
});




$("#cbx_tipo").on('change',function(){
   $("#buscar").click();
});


  $("#cbx_tipo").on('change',function() {
    var op = $("#cbx_tipo option:selected").val();

    if(op == 1)
    {
      $("#txtbusqueda").attr('placeholder','Encuentra trabajo...');
    }
    if(op == 2)
    {
      $("#txtbusqueda").attr('placeholder','Encuentra colaboradores...');
    }
    if(op == "")
    {
      $("#txtbusqueda").attr('placeholder','Encuentra requerimientos y talentos...');
    }

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


  $("#borratodo").on('click',function(){

    $("#txtbusqueda").val("");
  });

  $("#publicapro").on('click',function() {
     location.href='publicar_trabajo';
  });

  $("#buscotraba").on('click',function() {
     location.href='buscar_trabajo';
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



});



    var c = new CountUp("contar",0,{{ $llevapro }});
    var d = new CountUp("contar2",0,{{ $llevausu }});

    c.start();
    d.start();

      $('.estrellas').starrr({
          rating:3,
          change:function(e,valor){
          // $("#invi").val(valor);
                }
            });


   $("#form-buscar").submit(function(e){
    var txtbusqueda = $("#txtbusqueda").val();
    var valcombo = $("#cbx_tipo").val();

    if(valcombo == "")
    {
      e.preventDefault();
    }
    else
    { e.submit();
      //console.log('SI HA SELECCIONADO');
     }


   });




  var abierto = 0;
  $("#skin-toolbox").click(function(){
    if(abierto == 0)
    {
    abierto = 1;
      $("#skin-toolbox").removeClass("toolbox-open");

    }
    else
    {
      abierto = 0;
    $('#skin-toolbox').addClass("toolbox-open");
    }

  });



$(function(){

     $('a[href*=#]').click(function() {

     if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'')
         && location.hostname == this.hostname) {

             var $target = $(this.hash);

             $target = $target.length && $target || $('[name=' + this.hash.slice(1) +']');

             if ($target.length) {

                  var targetOffset = $target.offset().top;

                 $('html,body').animate({scrollTop: targetOffset}, 1000);

                 return false;

            }

       }

   });

});

</script>
<?php
if(isset($_GET['formulario'])){
?>
<script type="text/javascript">
    var cccc = 0
    var f = setInterval(function(){
        document.getElementById("publicapro").scrollIntoView()
        //

        clearInterval(f)
        //document.getElementById("solicita").click()


   // console.log("dasdasd");

    },1000)


</script>
asdasdasdasd
<?php
}
?>

@stop
