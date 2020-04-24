@extends('layouts.admin2')
@section('css')

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <!--  <link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700'> -->
  <link rel="stylesheet" type="text/css" href="css/wizard.css">
  <link rel="stylesheet" type="text/css" href="assets/admin-tools/admin-forms/css/admin-forms.css">
  <link rel="stylesheet" type="text/css" href="{{asset('vendor/plugins/datepicker/css/bootstrap-datetimepicker.css')}}">
  {{-- <link rel="stylesheet" type="text/css" href="select2/select2.min.css"> --}}
   <link rel="stylesheet" type="text/css" href=" {{ asset('vendor/plugins/select2/css/select2.css')}}">
   <link rel="stylesheet" type="text/css" href="css/jQuery-plugin-progressbar.css">

   <!--DESDE AQUI LLEVE YO -->
  <link rel="stylesheet" type="text/css" href="vendor/plugins/tagmanager/tagmanager.css">
  <link rel="stylesheet" type="text/css" href="vendor/plugins/daterange/daterangepicker.css">
  <link rel="stylesheet" type="text/css" href="vendor/plugins/datepicker/css/bootstrap-datetimepicker.css">
  <link rel="stylesheet" type="text/css" href="vendor/plugins/colorpicker/css/bootstrap-colorpicker.min.css">
  <link rel="stylesheet" type="text/css" href="{{ asset('vendor/plugins/ladda/ladda.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/fonts/zocial/zocial.css') }}">
  {{-- <link href="css/helper.css" media="screen" rel="stylesheet" type="text/css" /> --}}

<!-- Beginning of compulsory code below -->

<link href="css/dropdown/dropdown.css" media="screen" rel="stylesheet" type="text/css" />
{{-- <link href="css/dropdown/dropdown.vertical.rtl.css" media="screen" rel="stylesheet" type="text/css" /> --}}
<link href="css/dropdown/themes/default/default.advanced.css" media="screen" rel="stylesheet" type="text/css" />



   <!-- FIN -->
  <style type="text/css">


.text {
  font-size:12px;
  font-family:helvetica;
  /* font-weight:bold; */
  color:red;
  text-transform:uppercase;
}
.parpadea {

  animation-name: parpadeo;
  animation-duration: 1s;
  animation-timing-function: linear;
  animation-iteration-count: infinite;

  -webkit-animation-name:parpadeo;
  -webkit-animation-duration: 1s;
  -webkit-animation-timing-function: linear;
  -webkit-animation-iteration-count: infinite;
}

@-moz-keyframes parpadeo{
  0% { opacity: 1.0; }
  50% { opacity: 0.0; }
  100% { opacity: 1.0; }
}

@-webkit-keyframes parpadeo {
  0% { opacity: 1.0; }
  50% { opacity: 0.0; }
   100% { opacity: 1.0; }
}

@keyframes parpadeo {
  0% { opacity: 1.0; }
   50% { opacity: 0.0; }
  100% { opacity: 1.0; }
}



.loader {
    position: fixed;
    left: 0px;
    top: 0px;
    width: 100%;
    height: 100%;
    z-index: 9999;
    background: url('img/estees.gif') 50% 50% no-repeat rgb(249,249,249);
    opacity: .8;
}



    p  .NumberLevel {
  font-size: 6em;
  font-weight: 600;
  margin:0px;
  padding:0px;
  color:#FFEC44;
  text-align: left;
  /*margin-top:-15px;*/
}

/*  estrellas */

#este {
  color: #C9CB33;
}

/* FIN*/

p:hover .NumberLevel {
  -moz-transform: scale(1.5) rotate(360deg);
-webkit-transform: scale(1.5) rotate(360deg);
-o-transform: scale(1.5) rotate(360deg);
-ms-transform: scale(1.5) rotate(360deg);
transform: scale(1.5) rotate(360deg);
  -webkit-transition: 0.4s all linear;
          transition: 0.4s all linear;
  color:#FCED23;
}

.upload-button{
    background-color:#ba2323;
    padding:10px;
    position:relative;
    font-family: 'Open Sans', sans-serif;
    font-size:12px;
    text-decoration:none;
    color:#fff;
    border: solid 1px #831212;
    background-image: linear-gradient(bottom, rgb(171,27,27) 0%, rgb(212,51,51) 100%);
    border-radius: 5px;
}

.upload-button:hover{
    padding-bottom:9px;
    padding-left:10px;
    padding-right:10px;
    padding-top:11px;
    top:1px;
    background-image: linear-gradient(bottom, rgb(171,27,27) 100%, rgb(212,51,51) 0%);
}


.upload-button2{
    background-color:blue;
    padding:10px;
    position:relative;
    font-family: 'Open Sans', sans-serif;
    font-size:12px;
    text-decoration:none;
    color:#fff;
    border: solid 1px blue;
    background-image: linear-gradient(bottom, rgb(171,27,27) 0%, rgb(212,51,51) 100%);
    border-radius: 5px;
}

.upload-button2:hover{
    padding-bottom:9px;
    padding-left:10px;
    padding-right:10px;
    padding-top:11px;
    top:1px;
    background-image: linear-gradient(bottom, rgb(171,27,27) 100%, rgb(212,51,51) 0%);
}
.error{

}

  .image-upload > input
{
    display: none;
}

.image-upload img
{
    width: 165;
    cursor: pointer;
}


li .link i {
  z-index: 4;
  opacity: 0;
  position: absolute;
  left: 6%;
  bottom: 0%;
  margin: 0px 0px -50px -24px;
  width: 80px;
  height: 80px;
  background: url('img/1edit.png') no-repeat center center;
  border-radius: 50%;
  box-shadow: 0px 0px 40px rgba(0, 0, 0, 1);
  transition: all 0.20s ease-out;
}

li .link img {
  width: 100%;
  transition: all 0.20s ease-out;
  margin-top: -2%;
  margin-bottom: -15%;
}

li:hover .link i {
  opacity: .8;
  bottom: 65%;
}

li:hover .link img {
  transform: rotate(0deg) xscale(1.03);
}


  /*===============================================
  Skin Toolbox
================================================= */
#skin-toolbox {
  z-index: 999;
  overflow: visible !important;
  position: fixed;
  top: 160px;
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


  </style>
@endsection
@section('js')
  <script type="text/javascript" src="select2/select2.min.js"></script>
  <script src="vendor/plugins/globalize/globalize.min.js"></script>
  <script src="vendor/plugins/moment/moment.min.js"></script>
  <script src="vendor/plugins/datepicker/js/bootstrap-datetimepicker.min.js"></script>
  <script src="assets/js/demo/charts/highcharts.js"></script>
  <script src="vendor/plugins/sparkline/jquery.sparkline.min.js"></script>
  <script src="vendor/plugins/highcharts/highcharts.js"></script>
  <script src="vendor/plugins/circles/circles.js"></script>
  <script type="text/javascript" src="js/laborajs/perfil.js"></script>
  <script src="vendor/plugins/fileupload/fileupload.js"></script>

    <!-- Typeahead Plugin -->
  <script src="vendor/plugins/typeahead/typeahead.bundle.js"></script>

  <!-- DESDE AQUI OTRAVES -->
    <script src="vendor/plugins/duallistbox/jquery.bootstrap-duallistbox.min.js"></script>

  <!-- Bootstrap Maxlength plugin -->
  <script src="vendor/plugins/maxlength/bootstrap-maxlength.min.js"></script>


  <!-- TagManager Plugin -->
  <script src="vendor/plugins/tagmanager/tagmanager.js"></script>

  <!-- DateRange Plugin -->
  <script src="vendor/plugins/daterange/daterangepicker.min.js"></script>

  <!-- DateTime Plugin -->
  <script src="vendor/plugins/datepicker/js/bootstrap-datetimepicker.min.js"></script>

  <!-- BS Colorpicker Plugin -->
  <script src="vendor/plugins/colorpicker/js/bootstrap-colorpicker.min.js"></script>

  <!-- MaskedInput Plugin -->
  <script src="vendor/plugins/jquerymask/jquery.maskedinput.min.js"></script>
  <!-- FIN -->
  <script src="js/starrr.js"></script>



  <!-- Tagmanager JS -->
  <script src="vendor/plugins/tagsinput/tagsinput.min.js"></script>
  <script src="js/jQuery-plugin-progressbar.js"></script>

   <script type="text/javascript">

   $("#seleccion").on('click',function() {

     // console.log('XDDD');
        $("#der").removeAttr("style");
   });


    function filtrar(x)
    {


       var xd = $(x).attr('id');

      var nombre = $(x).html();



      $.ajax({
          url:'traecono',
          type:'POST',
          dataType:'json',
          data:{xd:xd},
          success:function(response)
          {


             $(".tags").html('');
             $(".typeahead").val('');

             $('#der').toggle('slow');


             $('.aparecer').hide();
             $('.aparecer').show();

             if (xd >=1 && xd <= 7) {
               $("#titulocono").html('Desarrollo web y aplicaciones móviles'+ ' ' + ' => '+ ' ' +nombre);
             }
             else if (xd >= 8 && xd <= 21) {
               $("#titulocono").html('Diseño,creatividad y arte'+ ' ' + ' => '+ ' ' +nombre);
             }
             else if (xd >= 22 && xd <= 31) {
               $("#titulocono").html('Infraestructura tecnologica'+ ' ' + ' => '+ ' ' +nombre);
             }
             else if (xd >= 32 && xd <= 37) {
               $("#titulocono").html('Escritura de textos'+ ' ' + ' => '+ ' ' +nombre);
             }
             else if (xd >= 38 && xd <= 41) {
               $("#titulocono").html('Traduccion'+ ' ' + ' => '+ ' ' +nombre);
             }
             else if (xd >= 42 && xd <= 47) {
               $("#titulocono").html('Ingenieria y arquitectura'+ ' ' + ' => '+ ' ' +nombre);
             }
             else if (xd >= 48 && xd <= 51) {
               $("#titulocono").html('Temas Legales'+ ' ' + ' => '+ ' ' +nombre);
             }
             else if (xd >= 52 && xd <= 58) {
               $("#titulocono").html('Analytics, BI y Datascience'+ ' ' + ' => '+ ' ' +nombre);
             }
             else if (xd >=59 && xd <= 63) {
               $("#titulocono").html('Soporte administrativo'+ ' ' + ' => '+ ' ' +nombre);
             }
             else if (xd >= 64 && xd <= 67) {
               $("#titulocono").html('Contabilidad y economica'+ ' ' + ' => '+ ' ' +nombre);
             }
             else if (xd >= 68 && xd <= 72) {
               $("#titulocono").html('Psicologia'+ ' ' + ' => '+ ' ' +nombre);
             }
             else if (xd >= 73 && xd <= 81) {
                $("#titulocono").html('Ventas y marketing'+ ' ' + ' => '+ ' ' +nombre);
             }
             else {
               $("#titulocono").html('Otros'+ ' ' + ' => '+ ' ' +nombre);
             }



             $('.typeahead').typeahead('destroy');



            $(".typeahead").tagsManager({
                tagsContainer: '.tags',
                tagClass: 'tm-tag-info',
                maxTags: 6,
                backspace: false,
              });

              var substringMatcher = function(strs) {
                return function findMatches(q, cb) {
                  var matches, substrRegex;
                  matches = [];

                  substrRegex = new RegExp(q, 'i');

                  $.each(strs, function(i, str) {
                    if (substrRegex.test(str)) {
                      matches.push({
                        value: str
                      });
                    }
                  });
                  cb(matches);
                };
              };

              array = [];
            $.each(response.message,function(indice,value){
              array.push(value.descripcion);
            });


            $('.typeahead').typeahead({
              hint: true,
              highlight: true,
              minLength: 1
            }, {
              name: 'array',
              displayKey: 'value',
              source: substringMatcher(array)
            });





          }
      });





     }



    $(".clasificacion").find("input").change(function(){
  var valor = $(this).val()
  $(".clasificacion").find("input").removeClass("activo")
  $(".clasificacion").find("input").each(function(index){
     if(index+1<=valor){
      $(this).addClass("activo")
     }

  })
})

$(".clasificacion").find("label").mouseover(function(){
  var valor = $(this).prev("input").val()
  $(".clasificacion").find("input").removeClass("activo")
  $(".clasificacion").find("input").each(function(index){
     if(index+1<=valor){
      $(this).addClass("activo")
     }

  })
})

$('#puntuacion').starrr({
        rating:0,
       change:function(e,valor){
           $("#invi").val(valor);
              }
          });

$('#puntuacione').starrr({
        rating:0,
       change:function(e,valor){
           $("#invi").val(valor);
              }
          });
$('.estrellass').starrr({
        rating:3,
       change:function(e,valor){
           $("#invi").val(valor);
              }
          });


  var abierto = 0;
  $("#skin-toolbox").click(function(){
    if(abierto == 0)
    {
    abierto = 1;
      $('#skin-toolbox').addClass("toolbox-open");


    }
    else
    {
      abierto = 0;
      $("#skin-toolbox").removeClass("toolbox-open");
    }
  });





      $("#paisd").val('{{ Auth::user()->pais }}');
      $("#monedad").val('{{ Auth::user()->type_money }}');
      $("#paise").val('{{ Auth::user()->pais_empresa }}');
    //   $("#codigopd").val('{{ Auth::user()->postalCode }}');

      var codigopostal = '{{ Auth::user()->postalCode }}';
      if (codigopostal == "")
      {

      }
      else
      {
          $("#codigopd").val(codigopostal);
      }

      $(".progress-bar1").loading();
    $('input').on('click', function () {
       $(".progress-bar1").loading();
    });

function soloNumeros(e)
{
var keynum = window.event ? window.event.keyCode : e.which;
if ((keynum == 8) || (keynum == 46))
return true;
return /\d/.test(String.fromCharCode(keynum));
}

   </script>
@endsection
@section('contenido')



  <!-- MODAL PARA CALIFICAR LA PLATAFORMA -->
    <div id="califica-form" class="popup-basic admin-form mfp-with-anim popup-md mfp-hide">

          <div class="col-md-4">

          </div>
          <div class="col-md-4" align="center">

              {{-- <img style="margin-right: 700px" src="img/estees.gif"/> --}}

          </div>
          <div class="col-md-4">

          </div>



        </div>

  <!-- FIN DEL MODAL -->






  <section id="content"  class="animated fadeIn">
       <?php

    //-
    $estadocorreo= Auth::user()->email_verified_at;
    //-
    $foto_usu = Auth::user()->imagen;
    //-
    $nombres = Auth::user()->nombres;
    $apellidos = Auth::user()->apellidos;
    $telefo_usu = Auth::user()->telefono;
    $usuario = Auth::user()->usuario;
    $doc_usu = Auth::user()->documento;
    $pre_usu= Auth::user()->precio_hora;
    $perfil = Auth::user()->perfil;
   //-
    $cexper = count($experiencia);
    $cestu = count($estudios);

    /////////////////////////////////////////////////////////////////////////////////////////
    $valorueda =0;
    $color_rueda = "#EBEBEB,#F9BF30";
    $textorueda = "";
    ////////////////////////////////////////////////////////////////////////////////////////

    if ($estadocorreo == 1) {
      $valorueda +=20;
      $textorueda = "Ingrese Foto de Perfil +15%";
      if ($foto_usu != null) {
        $valorueda +=15;
        $textorueda = "Ingrese datos personales +25%";
        if ($nombres !=null && $apellidos != null && $telefo_usu != null &&   $usuario!=null && $doc_usu!=null &&   $pre_usu!=null && $perfil!=null) {
          $valorueda +=25;
          $textorueda = "Ingrese experiencia laboral +20%";
          if ($cexper != 0) {
            $valorueda +=20;
            $textorueda = "Ingrese educacion +20%";
            if ($cestu != 0) {
              $valorueda +=20;
              $textorueda = "Su perfil se encuentra al 100%";
            } else {
              $textorueda = "Ingrese educacion +20%";
            }


          } else {
            if($cestu != 0)
            {
              $valorueda +=20;
            }
            else {

            }
            $textorueda = "Ingrese experiencia laboral +20%";
          }

        } else {
          if($cestu != 0)
          {
            $valorueda +=20;
          }
          if($cexper !=0)
          {
            $valorueda +=20;
          }
          if($foto_usu != null)
          {
            $valorueda +=15;
          }
          $textorueda = "Ingrese datos personales +25%";
        }

      } else {
          if($nombres !=null && $apellidos != null && $telefo_usu != null &&   $usuario!=null && $doc_usu!=null &&   $pre_usu!=null && $perfil!=null)
          {
            $valorueda +=25;
          }
          if($cestu != 0)
          {
            $valorueda +=20;
          }
          if($cexper !=0)
          {
            $valorueda +=20;
          }

        $textorueda = "Ingrese Foto de Perfil +15%";
      }
    } else {
        if($foto_usu != null)
        {
            $valorueda +=15;    
        }

          if($nombres !=null && $apellidos != null && $telefo_usu != null &&   $usuario!=null && $doc_usu!=null &&   $pre_usu!=null && $perfil!=null)
          {
            $valorueda +=25;
          }
          
           if($cestu != 0)
          {
            $valorueda +=20;
          }
          if($cexper !=0)
          {
            $valorueda +=20;
          }        
          
        $textorueda = "No has validado tu correo electronico";
        
        
    }







    ?>









<!-- MODAL PARA MODIFICAR WORK-EXPERIENCIE --->
<div id="edit-form" class=" popup-basic popup-lg mfp-with-anim mfp-hide">
          <div class="panel panel-system">
              <div class="panel-heading">
                <span class="panel-title"><i class="glyphicons glyphicons-pencil"></i> @lang('admin.titlemodificarexperiencia')  </span>
              </div>
              <div class="panel-body">
                <div class="admin-form theme-primary mw500 center-block">
               <!--  <form class="form-horizontal"   id="edit-experiencia"> -->

                  <div class="section">
                      <div class="smart-widget sm-left sml-120">
                        <label for="empresa_up" class="field prepend-icon">
                          <input type="text" name="empresa_up" id="empresa_up" class="gui-input" placeholder="Ingrese el nombre de su Empresa" >
                          <label for="empresa_up" class="field-icon">
                            <i class="fa fa-shield"></i>
                          </label>
                        </label>
                        <label for="empresa_up" class="button">@lang('admin.txtempresamodalexlab')</label>
                      </div>
                  </div>




                     <div class="section">
                      <div class="smart-widget sm-left sml-120">
                        <label for="cargo_up" class="field prepend-icon">
                          <input type="text" name="cargo_up" id="cargo_up" class="gui-input" placeholder="Ingrese su Cargo en la Empresa">
                          <label for="cargo_up" class="field-icon">
                            <i class="fa fa-shield"></i>
                          </label>
                        </label>
                        <label for="cargo_up" class="button">@lang('admin.txtcargomodalexlab')</label>
                      </div>
                  </div>



                    <div class="section">
                    <div class="smart-widget sm-left sml-120">
                      <label for="datetimepicker2" class="fiel prepend-icon">
                       <div class="input-group date" id="datetimepicker2">
                        <span class="input-group-addon cursor">
                          <i class="fa fa-calendar"></i>
                        </span>
                        <input type="text" class="form-control" id="desde_up">
                      </div>
                      </label>
                      <label for="datetimepicker2" class="button" style="height: 39px;">@lang('admin.txtdesdemodalexlab')</label>
                    </div>
                  </div>



                    <div class="section">
                    <div class="smart-widget sm-left sml-120">
                      <label for="datetimepicker2" class="fiel prepend-icon">
                       <div class="input-group date" id="datetimepicker2">
                        <span class="input-group-addon cursor">
                          <i class="fa fa-calendar"></i>
                        </span>
                        <input type="text" class="form-control" id="hasta_up">
                      </div>
                      </label>
                      <label for="datetimepicker2" class="button" style="height: 39px;">@lang('admin.txthastamodalexlab')</label>
                    </div>
                  </div>


                    <div class="section">
                      <div class="smart-widget sm-left sml-120">
                             <select id="cbopais_up" class="form-control select2pm" style="width: 100%;height: 14">
                                    @foreach($pais as $value)
                                    <option value="{{ $value->id_country }}">{{ $value->name_country }}</option>
                                    @endforeach
                              </select>
                        <label for="cbopais_up" class="button">@lang('admin.txtpaismodalexlab')</label>
                      </div>
                    </div>


                    <div class="section">
                      <div class="smart-widget sm-left sml-120">
                              <select id="ciudad3" class="form-control select2cm" style="width: 100%;height: 14">
                                <option></option>
                              </select>
                        <label for="cbociudad_up" class="button">@lang('admin.txtciudadmodalexlab')</label>
                      </div>
                  </div>


                      <div class="section">
                            <label class="field prepend-icon">
                                  <textarea class="gui-textarea" id="comentario_up" name="comentario" placeholder="Funciones Realizadas..."></textarea>
                              <label for="comentario_up" class="field-icon">
                                  <i class="fa fa-comments"></i>
                              </label>
                              </label>
                      </div>


              </div>
              <div class="panel-footer text-right">
                <button type="button" class="btn btn-rounded btn-system" id="xr" onclick="ModificarExperiencia(this);" ><span class="glyphicon glyphicon-floppy-disk"></span> @lang('admin.btnguardarambosmodal')</button>
                <button type="button" class="btn btn-rounded" onclick="cerrarmodal();"><span class="glyphicon glyphicon-remove"></span> @lang('admin.btncancelarambosmodal')</button>
              </div>
           <!--  </form> -->
            </div>
            </div>

        </div>

<!-- FIN DEL MODAL -->


<!-- MODAL PARA EDITAR LOS ESTUDIOS -->

<div id="edite-form" class=" popup-basic popup-lg mfp-with-anim mfp-hide">
          <div class="panel panel-system">
              <div class="panel-heading">
                <span class="panel-title"><i class="glyphicons glyphicons-pencil"></i> @lang('admin.titlemodificarestudios') </span>
              </div>
              <div class="panel-body">
                <div class="admin-form theme-primary mw500 center-block">
               <!--  <form class="form-horizontal"   id="edit-experiencia"> -->

                  <div class="section">
                      <div class="smart-widget sm-left sml-120">
                        <label for="centroestudio_up" class="field prepend-icon">
                          <input type="text" name="centroestudio_up" id="centroestudio_up" class="gui-input" placeholder="Ingrese el nombre de su Centro de Estudio" >
                          <label for="centroestudio_up" class="field-icon">
                            <i class="fa fa-shield"></i>
                          </label>
                        </label>
                        <label for="centroestudio_up" class="button" style="font-size: 8.5px;">@lang('admin.txtcentroeducativomodaled')</label>
                      </div>
                  </div>

                  <div class="section">
                      <div class="smart-widget sm-left sml-120">
                              <select id="tipoestudio_up" class="form-control" style="width: 100%;height: 14">
                              <option value="">@lang('admin.placeholcbotipoestudiopf')</option>
                              <option value="0">@lang('admin.value1detipoestu')</option>
                              <option value="1">@lang('admin.value2detipoestu')</option>
                              <option value="2">@lang('admin.value3detipoestu')</option>
                              <option value="3">@lang('admin.value4detipoestu')</option>
                              </select>
                        <label for="tipoestudio_up" class="button" style="font-size: 10px;">@lang('admin.txttipodeestudiomodaled')</label>
                      </div>
                  </div>




                     <div class="section">
                      <div class="smart-widget sm-left sml-120">
                        <label for="titulobtenido_up" class="field prepend-icon">
                          <input type="text" name="titulobtenido_up" id="titulobtenido_up" class="gui-input" placeholder="Ingrese su Cargo en la Empresa">
                          <label for="titulobtenido_up" class="field-icon">
                            <i class="fa fa-shield"></i>
                          </label>
                        </label>
                        <label for="titulobtenido_up" class="button">@lang('admin.txtitulomodaled')</label>
                      </div>
                  </div>



                    <div class="section">
                    <div class="smart-widget sm-left sml-120">
                      <label for="datetimepicker2" class="fiel prepend-icon">
                       <div class="input-group date" id="datetimepicker2">
                        <span class="input-group-addon cursor">
                          <i class="fa fa-calendar"></i>
                        </span>
                        <input type="text" class="form-control" id="desde_up_e">
                      </div>
                      </label>
                      <label for="datetimepicker2" class="button" style="height: 39px;">@lang('admin.txtdesdemodalexlab')</label>
                    </div>
                  </div>



                    <div class="section">
                    <div class="smart-widget sm-left sml-120">
                      <label for="datetimepicker2" class="fiel prepend-icon">
                       <div class="input-group date" id="datetimepicker2">
                        <span class="input-group-addon cursor">
                          <i class="fa fa-calendar"></i>
                        </span>
                        <input type="text" class="form-control" id="hasta_up_e">
                      </div>
                      </label>
                      <label for="datetimepicker2" class="button" style="height: 39px;">@lang('admin.txthastamodalexlab')</label>
                    </div>
                  </div>


                    <div class="section">
                      <div class="smart-widget sm-left sml-120">
                             <select id="cbopais_up_e" class="form-control select2pme" style="width: 100%;height: 14">
                                    @foreach($pais as $value)
                                    <option value="{{ $value->id_country }}">{{ $value->name_country }}</option>
                                    @endforeach
                              </select>
                        <label for="cbopais_up_e" class="button">@lang('admin.txtpaismodalexlab')</label>
                      </div>
                    </div>


                    <div class="section">
                      <div class="smart-widget sm-left sml-120">
                              <select id="ciudad4" class="form-control select2cme" style="width: 100%;height: 14">
                                <option></option>
                              </select>
                        <label for="cbociudad_up" class="button">@lang('admin.txtciudadmodalexlab')</label>
                      </div>
                  </div>




              </div>
              <div class="panel-footer text-right">
                <button type="button" class="btn btn-rounded btn-system" id="xre" onclick="ModificarEducacion(this);" ><span class="glyphicon glyphicon-floppy-disk"></span> @lang('admin.btnguardarambosmodal')</button>
                <button type="button" class="btn btn-rounded" onclick="cerrarmodal();"><span class="glyphicon glyphicon-remove"></span> @lang('admin.btncancelarambosmodal')</button>
              </div>
           <!--  </form> -->
            </div>
            </div>

        </div>









<!-- FIN DEL MODAL -->


    <div class="page-heading" style="padding: 15px 40px;margin-left:0px;margin-right:0px;">
      <div class="row">
        <div class="col-md-4">
            <div class="media clearfix">
          <div class="media-left pr30">
                  <form id="f_subir_imagen" name="f_subir_imagen" method="POST"  class="formarchivo" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <?php $id = Auth::user()->id; ?>
                        <input type="hidden" name="id_usuario_foto" value="{{$id}}">
                        <?php
                          if(Auth::user()->imagen==null) {
                            $mostrar='img/inserteimagenaqui.jpg';
                            }else {
                            $mostrar=Auth::user()->imagen;
                            }
                        ?>


                  <li class="li" style="width: 150px;">
                      <a class="link" href="#">
                        <label for="file">
                          <i></i>
                        </label>
                      <img class="media-object mw150"  src="{{$mostrar}}" id="img" alt="..." width="165" height="165" style="border-style:dotted;border-width:5px;">
                      </a>

                  </li>



                    <br/><br/>


          <center ><label style="display: none" for="file" class="upload-button"><i class="fa fa-cloud-upload" title="Cargar Imagen de Perfil" style="color: black"></i></label>
            <input id="file" style="display: none;" name="archivo" type="file" style="display:none" onchange="return fileValidation()" title="Cargar Imagen de Perfil">
            <button  type="submit" class="upload-button" id="guardaimagen2" style="display:none;" title="Guardar Imagen"><i class="fa fa-check-square-o"> Guardar </i></buttton></center>
            </form>
          </div>





          <div class="media-body va-m" >
            <h2 class="media-heading"> {{ $nombres ." ".$apellidos }} </h2>
            <p class="lead" >{{ $perfil }}</p>
          </div>

        </div>
        </div>

        <div class="col-md-4" align="center">
          <div class="row" style="padding-top:30px">
            <div class="col-xs-2"></div>
            <div class="col-xs-4">
                <b><p  style="border: solid 2px green;width: 100px;text-align: center;font-size: 10px"  > @lang('traduccion2.txttilerequeaplicaasp')<br/> {{ $usuarios }}</p></b>
            </div>
            <div class="col-xs-4">
              <b><p style="border: solid 2px green;width: 100px;text-align: center;font-size: 10px"  >@lang('traduccion2.txttilerequerealizasp') <br/> {{ $cont }}</p></b>
            </div>
            <div class="col-xs-2"></div>
          </div>

          <p> <a href="{{ route('invitar_gmail') }}"> <button class="zocial gmail">@lang('traduccion2.txtinvitaramigogmailper')</button> </a> </p>

          <p> <button class="zocial instapaper salir">@lang('traduccion2.txtinvitarmasamgiper')</button> </p>

          <br/>
        </div>


        <div class="col-md-4">
          <div class="row mb10" id="spy7">

                    <div class="col-md-12 text-center" align="center">
                        <?php
                          $completo = $color_rueda;
                          $split = explode(",", $completo);
                        ?>

                          <center><div class="progress-bar1 position" id="rueda"  style="color: {{$split[1]}};" align="center" data-percent="{{$valorueda}}" data-duration="2000" data-color="{{$color_rueda}}"></div></center>

                    </div>


                    <center><span class="fs15 text-center ml10 " id="completa" name="completa">
                      <i class="">{{$textorueda}}</i></span></center>
          </div>
        </div>






      </div>
    </div>


 @if($mensaje = Session::get('mensaje'))
<div class="alert alert-micro alert-primary light alert-dismissable">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

  <i class="fa fa-cubes pr10 hidden"></i>
    @php $correousu = Auth::user()->correo;  @endphp
  <strong>Bienvenido!</strong> {{$mensaje}} &emsp;&emsp; | &emsp;&emsp; <a href="javascript:void(0);" id="reenviar" data-correo="{{$correousu}}" onclick="reenviar(this);"  style="color: white" >@lang('traduccion2.txtclickaquidenohaberper')</a>
</div>
@endif

@if($status = Session::get('status'))
<div class="alert alert-micro alert-border-left alert-success alert-dismissable">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
  <i class="fa fa-check pr10"></i>

  <strong> {{ $status }} </strong>

</div>
@endif

@if($status = Session::get('guardado'))
<div class="alert alert-micro alert-border-left alert-success alert-dismissable">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
  <i class="fa fa-check pr10"></i>

  <strong> {{ $guardado }} </strong>

</div>
@endif


 @if($mensaje1 = Session::get('mensaje1'))
<div class="alert alert-micro alert-primary light alert-dismissable" style="font-size: 17px">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
  <i class="fa fa-cubes pr10 hidden"></i>
  {{$mensaje1}}
</div>
@endif

    <div class="row" >
      <div class="col-md-12">
        <div class="panel">

          <div class="panel">
            <div class="tab-content pn br-n">
              <div id="tab2_1" class="tab-pane active">
                <div class="row">
                  <div class="col-md-9">
                    <div class="admin-form theme-primary">
                      <div class=" panel heading-border panel-primary">
                        <div class="panel-body bg-light">


                           <div class="row">
                     <!--<div class="col-md-1"></div>-->
                      <div class="col-md-12">
                        <div class="panel">
                             <div class="panel-heading" style="padding: 0px;">
                              <label style="color: black;font-size: 15px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@lang('admin.ttitleprofesionoperfilab')</label>
                              </div>
                                <div class="panel-body">
                                <div class="row">
                                <h3 style="margin: 0px; padding-bottom: 10px">@lang('admin.txtProfesion'):</h3>
                                  <div class="row">
                                    <div class="col-md-10">
                                <div class="section">
                                  <label class="field prepend-icon">
                                    <input type="text" name="txtprofesion" id="txtprofesion" class="gui-input" placeholder="Ejm. Ing. de Sistemas" value="{{ ucwords(Auth::user()->profesion) }}" style="margin-left: 13px;" required>
                                    <b class="tooltip tip-right-bottom"><em> @lang('admin.placeaquiprofe') </em></b>
                                    <label for="tooltip3" class="field-icon">
                                      <i class="fa fa-user" style="margin-left: 20px;"></i>
                                    </label>
                                  </label>
                                </div>
                                    </div>
                                    <div class="col-md-2">
                                      <button type="button" id="sprof" class="btn btn-dark btn-block"> @lang('traduccion2.btngrabarper') </button>
                                    </div>
                                  </div>

                                  <br/>
                                <form id="form-profesional">
                                      <h3 style="margin: 0px; padding-bottom: 10px  ">@lang('traduccion2.txtconocimientoempresa') &nbsp;
                        <div class="btn-group dropright">
                                            <a href="#" style="" class="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-question-circle" style="font-size: 30px" data-original-title="" title=""></i></a>
                                              <ul class="dropdown-menu" style="left:0; margin-left: 100%; margin-top:-170px; background: #fff; border: 1px solid #CDCDCD; width:300px;">
                                                <div style="margin: 0px; padding:10px 0px; background: #37bc9b; text-align: center;">
                                                    <h5 style="color:white; margin:0px auto;"> .: @lang('admin.ayudatitle') :. </h5>
                                                </div>
                                                <div style="margin: 10px;">
                                                   • @lang('traduccion2.txtayuda1per')<br/><br/>
                                                   • @lang('traduccion2.txtayuda2per')<br><br>
                                                   • @lang('traduccion2.txtayuda3per')<br/><br/>
                                                   • @lang('traduccion2.txtayuda4per')<br><br>
                                                   • @lang('traduccion2.txtayuda5per')

                                                </div>
                                              </ul>
                                        </div>





                                      </h3>



<div>
    <div id="seleccion">
<ul id="nav" class="dropdown dropdown-horizontal" style="font-size:12px">

  <li class="dir" style="width: 180px;height:30px">@lang('traduccion2.txtplaceolselcopper')
    <ul id="der">
      <li style="width: 180px;height:45"><a href="javascript:void(0);" class="dir">Desarrollo web y aplicaciones móviles</a>
        <ul>
          <li style="width: 145px"><a href="javascript:void(0);" id="1" onclick="filtrar(this);">Ecommerce</a></li>
          <li style="width: 145px"><a href="javascript:void(0);" id="2" onclick="filtrar(this);">Videojuegos</a></li>
           <li style="width: 145px"><a href="javascript:void(0);" id="3" onclick="filtrar(this);">QA&Testing</a></li>
            <li style="width: 145px"><a href="javascript:void(0);" id="4" onclick="filtrar(this);">Utilitarios</a></li>
             <li style="width: 145px"><a href="javascript:void(0);" id="5" onclick="filtrar(this);">Desarrollo Apps web</a></li>
              <li style="width: 145px"><a href="javascript:void(0);" id="6" onclick="filtrar(this);">Desarrollo App móviles</a></li>
               <li style="width: 145px"><a href="javascript:void(0);" id="7" onclick="filtrar(this);">Aplicaciones de escritorio</a></li>
        </ul>
      </li>

      <li style="width: 180px;height:30px"><a href="javascript:void(0);" class="dir" >Diseño,creatividad y arte</a>
        <ul>
          <li style="width: 145px"><a href="javascript:void(0);" id="8" onclick="filtrar(this);">Animaciones</a></li>
          <li style="width: 145px"><a href="javascript:void(0);" id="9" onclick="filtrar(this);">Diseño Editorial</a></li>
           <li style="width: 145px"><a href="javascript:void(0);" id="10" onclick="filtrar(this);">Diseño Publicitario</a></li>
            <li style="width: 145px"><a href="javascript:void(0);" id="11" onclick="filtrar(this);">Diseño de Embalaje O Packaging</a></li>
             <li style="width: 145px"><a href="javascript:void(0);" id="12" onclick="filtrar(this);">Diseño de Identidad Corporativa</a></li>
              <li style="width: 145px"><a href="javascript:void(0);" id="13" onclick="filtrar(this);">Diseño en Señalética</a></li>
               <li style="width: 145px"><a href="javascript:void(0);" id="14" onclick="filtrar(this);">Diseño Técnico O Didáctico</a></li>
               <li style="width: 145px"><a href="javascript:void(0);" id="15" onclick="filtrar(this);">Diseño Web Y/O Móvil</a></li>
               <li style="width: 145px"><a href="javascript:void(0);" id="16" onclick="filtrar(this);">Diseño Multimedia</a></li>
               <li style="width: 145px"><a href="javascript:void(0);" id="17" onclick="filtrar(this);">Diseño Tipográfico</a></li>
               <li style="width: 145px"><a href="javascript:void(0);" id="18" onclick="filtrar(this);">Arte Visual -  Fotografía</a></li>
                <li style="width: 145px"><a href="javascript:void(0);" id="19" onclick="filtrar(this);">Arte Visual – Dibujo</a></li>
                 <li style="width: 145px"><a href="javascript:void(0);" id="20" onclick="filtrar(this);">Arte Musical - Música Y Canto</a></li>
                  <li style="width: 145px"><a href="javascript:void(0);" id="21" onclick="filtrar(this);">Arte Literarias</a></li>
        </ul>
      </li>

      <li style="width: 180px;height:30px"><a href="javascript:void(0);" class="dir" >Infraestructura tecnologica</a>
        <ul>
          <li style="width: 145px"><a href="javascript:void(0);" id="22" onclick="filtrar(this);">Networking</a></li>
          <li style="width: 145px"><a href="javascript:void(0);" id="23" onclick="filtrar(this);">Middleware</a></li>
           <li style="width: 145px"><a href="javascript:void(0);" id="24" onclick="filtrar(this);">Database Administration</a></li>
            <li style="width: 145px"><a href="javascript:void(0);" id="25" onclick="filtrar(this);">Virtualization</a></li>
             <li style="width: 145px"><a href="javascript:void(0);" id="26" onclick="filtrar(this);">Provisioning and Storage</a></li>
              <li style="width: 145px"><a href="javascript:void(0);" id="27" onclick="filtrar(this);">Software ERP /CRM</a></li>
               <li style="width: 145px"><a href="javascript:void(0);" id="28" onclick="filtrar(this);">Seguridad de Información</a></li>
               <li style="width: 145px"><a href="javascript:void(0);" id="29" onclick="filtrar(this);">System Administration, Linux, UNIX, Windows</a></li>
               <li style="width: 145px"><a href="javascript:void(0);" id="30" onclick="filtrar(this);">Big data Specialist</a></li>
               <li style="width: 145px"><a href="javascript:void(0);" id="31" onclick="filtrar(this);">Apache Hadoop</a></li>
        </ul>
      </li>

      <li style="width: 180px;height:30px"><a href="javascript:void(0);" class="dir" >Escritura de textos</a>
        <ul>
          <li style="width: 145px"><a href="javascript:void(0);" id="32" onclick="filtrar(this);">Artículos, Blogs y Contenido Web</a></li>
          <li style="width: 145px"><a href="javascript:void(0);" id="33" onclick="filtrar(this);">Resúmenes, Monografías Trabajos de Investigación</a></li>
           <li style="width: 145px"><a href="javascript:void(0);" id="34" onclick="filtrar(this);">Creación de Textos, Cuentos y Fabulas</a></li>
            <li style="width: 145px"><a href="javascript:void(0);" id="35" onclick="filtrar(this);">Revisión De Textos Académicos</a></li>
             <li style="width: 145px"><a href="javascript:void(0);" id="36" onclick="filtrar(this);">Transcripción De Audios</a></li>
              <li style="width: 145px"><a href="javascript:void(0);" id="37" onclick="filtrar(this);">Escritura Técnica</a></li>

        </ul>
      </li>

      <li style="width: 180px;height:30px"><a href="javascript:void(0);" class="dir" >Traduccion</a>
        <ul>
          <li style="width: 145px"><a href="javascript:void(0);" id="38" onclick="filtrar(this);">Traducción de Textos</a></li>
          <li style="width: 145px"><a href="javascript:void(0);" id="39" onclick="filtrar(this);">Traducción Legal</a></li>
           <li style="width: 145px"><a href="javascript:void(0);" id="40" onclick="filtrar(this);">Traducción Medica</a></li>
            <li style="width: 145px"><a href="javascript:void(0);" id="41" onclick="filtrar(this);">Traducción Técnica</a></li>
        </ul>
      </li>


      <li style="width: 180px;height:30px"><a href="javascript:void(0);" class="dir" >Ingenieria y arquitectura</a>
        <ul>
          <li style="width: 145px"><a href="javascript:void(0);" id="42" onclick="filtrar(this);">Modelamiento 3D & CAD</a></li>
          <li style="width: 145px"><a href="javascript:void(0);" id="43" onclick="filtrar(this);">Arquitectura</a></li>
           <li style="width: 145px"><a href="javascript:void(0);" id="44" onclick="filtrar(this);">Composiciones Y Recetas Químicas</a></li>
            <li style="width: 145px"><a href="javascript:void(0);" id="45" onclick="filtrar(this);">Ingeniería Estructural</a></li>
             <li style="width: 145px"><a href="javascript:void(0);" id="46" onclick="filtrar(this);">Costos y Presupuesto</a></li>
               <li style="width: 145px"><a href="javascript:void(0);" id="47" onclick="filtrar(this);">Planos</a></li>

        </ul>
      </li>

      <li style="width: 180px;height:30px"><a href="javascript:void(0);" class="dir" >Temas legales</a>
        <ul>
          <li style="width: 145px"><a href="javascript:void(0);" id="48" onclick="filtrar(this);">Asesoría en Contratos Legales</a></li>
          <li style="width: 145px"><a href="javascript:void(0);" id="49" onclick="filtrar(this);">Asesoría en Leyes Corporativas</a></li>
           <li style="width: 145px"><a href="javascript:void(0);" id="50" onclick="filtrar(this);">Leyes de Propiedad Intelectual</a></li>
            <li style="width: 145px"><a href="javascript:void(0);" id="51" onclick="filtrar(this);">Delitos Informáticos</a></li>
        </ul>
      </li>

      <li style="width: 180px;height:30px"><a href="javascript:void(0);" class="dir" >Analytics, BI y Datascience</a>
        <ul style="top:-200px">
          <li style="width: 145px"><a href="javascript:void(0);" id="52" onclick="filtrar(this);">A/B Testing</a></li>
          <li style="width: 145px"><a href="javascript:void(0);" id="53" onclick="filtrar(this);">Data Visualization</a></li>
           <li style="width: 145px"><a href="javascript:void(0);" id="54" onclick="filtrar(this);">Data Extraction /ETL</a></li>
            <li style="width: 145px"><a href="javascript:void(0);" id="55" onclick="filtrar(this);">Data Mining y Management</a></li>
             <li style="width: 145px"><a href="javascript:void(0);" id="56" onclick="filtrar(this);">Machine Learning</a></li>
               <li style="width: 145px"><a href="javascript:void(0);" id="57" onclick="filtrar(this);">Quantitative Analysis</a></li>
               <li style="width: 145px"><a href="javascript:void(0);" id="58" onclick="filtrar(this);">Streaming Data From Social Networks</a></li>

        </ul>
      </li>

      <li style="width: 180px;height:30px"><a href="javascript:void(0);" class="dir" >Soporte administrativo</a>
        <ul style="top:-135px">
          <li style="width: 145px"><a href="javascript:void(0);" id="59" onclick="filtrar(this);">Data Entry</a></li>
          <li style="width: 145px"><a href="javascript:void(0);" id="60" onclick="filtrar(this);">Asistente Virtual</a></li>
           <li style="width: 145px"><a href="javascript:void(0);" id="61" onclick="filtrar(this);">Project Management</a></li>
            <li style="width: 145px"><a href="javascript:void(0);" id="62" onclick="filtrar(this);">Web Research</a></li>
             <li style="width: 145px"><a href="javascript:void(0);" id="63" onclick="filtrar(this);">Servicio al Cliente</a></li>
        </ul>
      </li>

      <li style="width: 180px;height:30px"><a href="javascript:void(0);" class="dir" >Contabilidad y economica</a>
        <ul style="top:-105px">
          <li style="width: 145px"><a href="javascript:void(0);" id="64" onclick="filtrar(this);">Servicios de Consultoría</a></li>
          <li style="width: 145px"><a href="javascript:void(0);" id="65" onclick="filtrar(this);">Libros Contables Virtuales</a></li>
           <li style="width: 145px"><a href="javascript:void(0);" id="66" onclick="filtrar(this);">Planificación Financiera</a></li>
            <li style="width: 145px"><a href="javascript:void(0);" id="67" onclick="filtrar(this);">Asesoría Financiera</a></li>
        </ul>
      </li>

      <li style="width: 180px;height:30px"><a href="javascript:void(0);" class="dir" >Psicologia</a>
        <ul style="top:-135px">
          <li style="width: 145px"><a href="javascript:void(0);" id="68" onclick="filtrar(this);">Selección de Recursos Humanos</a></li>
          <li style="width: 145px"><a href="javascript:void(0);" id="69" onclick="filtrar(this);">Test de Personalidad</a></li>
           <li style="width: 145px"><a href="javascript:void(0);" id="70" onclick="filtrar(this);">Terapias Online</a></li>
            <li style="width: 145px"><a href="javascript:void(0);" id="71" onclick="filtrar(this);">Coaching y Liderazgo</a></li>
             <li style="width: 145px"><a href="javascript:void(0);" id="72" onclick="filtrar(this);">Asesoría para el Éxito Personal</a></li>
        </ul>
      </li>

      <li style="width: 180px;height:30px"><a href="javascript:void(0);" class="dir" >Ventas y marketing</a>
        <ul style="top:-325px">
          <li style="width: 145px"><a href="javascript:void(0);" id="73" onclick="filtrar(this);">Manejo y Administración de anuncios</a></li>
          <li style="width: 145px"><a href="javascript:void(0);" id="74" onclick="filtrar(this);">Gestión de Email y MKT</a></li>
           <li style="width: 145px"><a href="javascript:void(0);" id="75" onclick="filtrar(this);">Investigación de Mercado</a></li>
            <li style="width: 145px"><a href="javascript:void(0);" id="76" onclick="filtrar(this);">Estrategias de MKT</a></li>
             <li style="width: 145px"><a href="javascript:void(0);" id="77" onclick="filtrar(this);">Relaciones Publicas</a></li>
               <li style="width: 145px"><a href="javascript:void(0);" id="78" onclick="filtrar(this);">SEM</a></li>
                <li style="width: 145px"><a href="javascript:void(0);" id="79" onclick="filtrar(this);">SEO</a></li>
                 <li style="width: 145px"><a href="javascript:void(0);" id="80" onclick="filtrar(this);">SMM</a></li>
                  <li style="width: 145px"><a href="javascript:void(0);" id="81" onclick="filtrar(this);">Telemarketing y Televentas</a></li>


        </ul>
      </li>


    </ul>
  </li>
</ul>

   </div>

<br/><br/>

<div id="modal-text" class="popup-basic p25 mfp-with-anim mfp-hide" align="center">
      <br/>
      @lang('traduccion2.txthassuperadoper')
      <br/>
      <br/>
      <strong><a href="{{ route('planes') }}">@lang('traduccion2.txtitleplanesper')</a></strong>
</div>

<div id="modal-text1" class="popup-basic p25 mfp-with-anim mfp-hide" align="center">
      <br/>
      @lang('traduccion2.txthassuperdo2per')
      <br/>
      <br/>
      <strong><a href="{{ route('planes')}}">@lang('traduccion2.txtitleplanesper')</a></strong>
</div>

               <div></div>

                  <div class="form-group  aparecer" style="display: none;">
                    <div class="col-md-8"><br/>
                      <b><p id="titulocono" style="color: #000000;"></p></b>
                      <input type="text" class="form-control typeahead" id="test-field" placeholder="@lang('traduccion2.txtplacehoindiquiconoper')" autofocus>
                      <br/><br/><br/>
                      <div class="tag-container tags"></div>
                        <div class="dossubcategoria">

                        </div>
                    </div>
                    <div class="col-md-4 aparecer2">
                            <br/><br/><br/>
                            <span class="parpadea text">@lang('traduccion2.txtenterparañardiper')</span>
                    </div>
                  </div>

</div>








                                  </form>

                            </div>

<br/>
  <div class="row">
    <div class="col-md-4"></div>

    <div class="col-md-4">
    <label>
      <button type="button" class="btn btn-info btn-block  aparecer " id="guardarcono" style="display: none;">@lang('traduccion2.txtguardarconobtnper')</button>
    </label>
    </div>

    <div class="col-md-4"></div>
  </div>

<br/><br/>

    <div class="row">
      <!--<div class="col-md-1"></div>-->

        @if(Auth::user()->unosubcategoria == null)


        @else
        <div class="col-md-4" >
<div class="panel">
  <div class="panel-heading" style="padding: 0px;">
    <span> &nbsp; {{ Auth::user()->unosubcategoria }} </span>
    <button title="Delete" type="button" class="mfp-close" onclick="eliminar(1)" style="z-index:0">×</button>

  </div>
  <div class="panel-body ptn pbn p10">
    <ol class="timeline-list">
      <?php
        $conocimi = Auth::user()->unoconocimiento;
        $porciones = explode(",", $conocimi);
      ?>

      @foreach($porciones as $por)
      <li class="timeline-item">
        <div class="timeline-icon bg-dark light">
          <span class="fa fa-tags"></span>
        </div>
        <div class="timeline-desc">
          <b>{{ $por }}</b>
        </div>
                <button title="Delete" type="button" class="mfp-close" onclick="eliminar_s(1,'{{$por}}')" style="z-index:0">×</button>
      </li>
      @endforeach

    </ol>
  </div>
</div>
        </div>



        @endif



        @if(Auth::user()->dossubcategoria == null)

        @else
        <div class="col-md-4">
 <div class="panel">
  <div class="panel-heading" style="padding: 0px;">
    <span> &emsp; {{ Auth::user()->dossubcategoria }} </span>
        <button title="Delete" type="button" class="mfp-close" onclick="eliminar(2)" style="z-index:0">×</button>
  </div>
  <div class="panel-body ptn pbn p10">
    <ol class="timeline-list">
      <?php
        $conocimi2 = Auth::user()->dosconocimiento;
        $porciones2 = explode(",", $conocimi2);
      ?>

      @foreach($porciones2 as $por1)
      <li class="timeline-item">
        <div class="timeline-icon bg-dark light">
          <span class="fa fa-tags"></span>
        </div>
        <div class="timeline-desc">
          <b>{{ $por1 }}</b>
        </div>
                <button title="Delete" type="button" class="mfp-close" onclick="eliminar_s(2,'{{$por1}}')" style="z-index:0">×</button>
      </li>
      @endforeach

    </ol>
  </div>
</div>
        </div>
        @endif

        @if(Auth::user()->tressubcategoria == null)

        @else
        <div class="col-md-4">
 <div class="panel">
  <div class="panel-heading" style="padding: 0px;">
    <span> &emsp; {{ Auth::user()->tressubcategoria }} </span>
        <button title="Delete" type="button" class="mfp-close" onclick="eliminar(3)" style="z-index:0">×</button>
  </div>
  <div class="panel-body ptn pbn p10">
    <ol class="timeline-list">
      <?php
        $conocimi3 = Auth::user()->tresconocimiento;
        $porciones3 = explode(",", $conocimi3);
      ?>

      @foreach($porciones3 as $por1)
      <li class="timeline-item">
        <div class="timeline-icon bg-dark light">
          <span class="fa fa-tags"></span>
        </div>
        <div class="timeline-desc">
          <b>{{ $por1 }}</b>
        </div>
                <button title="Delete" type="button" class="mfp-close" onclick="eliminar_s(3,'{{$por1}}')" style="z-index:0">×</button>
      </li>
      @endforeach

    </ol>
  </div>
</div>
        </div>
        @endif

       <!-- <div class="col-md-1"></div>-->
    </div>


                            <div id="habilidad">

                            <?php $var = 0;?>
                                @foreach($habilidad as $value)
                                  @if($var!=$value->id_category)
                                    @if($var!=0)
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    </div>
                                    @endif
                                    <?php $var=$value->id_category ?>
                                    <div class="col-sm-6" style="display: none">
                                      <div class="panel-group">
                                        <div class="panel">
                                          <div class="panel-heading" style="padding: 0px;">
                                            <a class="accordion-toggle accordion-icon link-unstyled collapsed" data-toggle="collapse" data-parent="#accordion" href="#{{ $var }}" aria-expanded="false">
                                              {{ $value->description }}
                                            </a>
                                         </div>
                                          <div id="{{ $var }}" class="panel-collapse collapse" style="height: 0px;" aria-expanded="false">
                                            <div class="panel-body" id="bod_{{ $value->id_category }}">

                                                 <div> . {{ $value->ability }} <a href="javascript:void(0)" class="btn-eliminar-h" data-co="{{ $value->id_ability }}"><i class="fa fa-times-circle" style="font-size: 15px"></i></a><br></div>
                                      @else

                                              <div>. {{ $value->ability }} <a href="javascript:void(0)" class="btn-eliminar-h"  data-co="{{ $value->id_ability }}"><i class="fa fa-times-circle" style="font-size: 15px"></i></a><br></div>
                                      @endif
                                @endforeach
                                @if($var!=0)
                                     </div>
    </div>
  </div>
</div>
</div>
                                @endif
</div>

                        <!-- DESDE AQUI, VA TODA LA VALIDACION DEL PORCENTAJE Y LA RUEDA DEL TEXTO-->
                          <!-- PRIMERO SOBRE EL PERFIL -->









                                </div>
<!-- FORM PARA SUGERENCIAS -->

<div id="sugerencias-form" class="popup-basic admin-form mfp-with-anim mfp-hide">
          <div class="panel">
            <div class="panel-heading">
              <span class="panel-title">
                <i class="fa fa-rocket"></i>Dejanos tu sugerencia</span>
            </div>
            <!-- end .panel-heading section -->

            <form  id="sug">
               {{ csrf_field() }}
              <div class="panel-body p25">


                <div class="section">
                  <label for="comment" class="field prepend-icon">
                    <textarea class="gui-textarea" id="txt_sug" name="txt_sug" placeholder="Tu comentario" required=""></textarea>
                    <label for="comment" class="field-icon">
                      <i class="fa fa-comments"></i>
                    </label>
                    <span class="input-footer">
                      <strong>Eh, tú:</strong> Esperamos un gran comentario ...</span>
                  </label>
                </div>
                <!-- end section -->

              </div>
              <!-- end .form-body section -->

              <div class="panel-footer">
                <center>
                <button type="submit" class="button btn-primary">SUGERIR</button>
                </center>
              </div>
              <!-- end .form-footer section -->
            </form>
          </div>
          <!-- end: .panel -->
        <button title="Close (Esc)" type="button" class="mfp-close">×</button>

    </div>

<!-- FIN -->




    <div class="loader" style="display: none"></div>


                          </div>
                      </div>
                      <!--<div class="col-md-1"></div>-->
                   </div>
                            <div class="section-divider mv40" id="spy2">
                              <span>@lang('admin.titledatospersonalespf')</span>
                            </div>

                            <form id="datos">
                            <div class="row">
                                <div class="row">
                                    <div class="col-md-1"></div>
                                    <div class="col-md-6">
                                      <p style="color:red;">@lang('admin.txtcamposobligatorios')  </p>

                                      <br/>
                                    </div>
                                    <div class="col-md-4">
                                    <!--<p><a href='{{ $urll }}' class="zocial linkedin" style ='margin-left:20px'>Traer datos de LinkedIn</a></p> -->
                                    </div>
                                    <div class="col-md-1"></div>
                                </div>

                              <div class="col-md-1"></div>
                               <div class="col-md-5">
                                   <div style="width: 1%;float: left;font-size: 30px;margin-left: -20px">*</div>
                                <div style="width: 99%;float: left;">
                                  <label class="field prepend-icon">
                                   <input type="text" name="nombred" id="nombred" class="gui-input" placeholder="@lang('admin.placeholnombresperfil')" value="{{ $nombres }}" required>
                                    
                                    <label for="tooltip3" class="field-icon">
                                      <i class="fa fa-user"></i>
                                    </label>
                                  </label>
                                </div><br><br><br>
                              </div>
                              <!--@if(Auth::user()->tipo!='')-->

                              <!--@endif-->
                              <div class="col-md-5">
                                   <div style="width: 1%;float: left;font-size: 30px;margin-left: -20px">*</div>
                                <div style="width: 99%;float: left;">
                                  <label class="field prepend-icon">
                                    <input type="text" name="apellidosd" id="apellidosd" class="gui-input" placeholder="@lang('admin.placeholapellidosperfil')" value="{{ $apellidos }}" required>
                                    
                                    <label for="tooltip3" class="field-icon">
                                      <i class="fa fa-user"></i>
                                    </label>
                                  </label>
                                </div><br><br><br>
                              </div>
                              <div class="col-md-1"></div>
                            </div>
                            <div class="row">
                              <div class="col-md-1"></div>
                              <div class="col-md-5">
                                <div class="section">

                                    <select name="paisd" id="paisd" class="select2" style="width: 100%" required>
                                      <option value=""></option>
                                      @foreach($pais as $value)
                                        <option value="{{ $value->id_country }}">{{ $value->name_country }}</option>
                                      @endforeach
                                    </select>

                                </div>
                              </div>
                              <div class="col-md-2">
                                <div class="section">
                                  <label class="field select">
                                    <select id="codigopd" name="codigopd">
                                      <option value="">@lang('admin.placehcbocodigopostalpf')</option>
                                      @foreach($postal as $value)

                                      <?php
                                      $seleccionado = "";
                                      if(strtoupper($value->codigo_pais) == $llevaip)
                                      {
                                        $seleccionado = "selected";
                                      }
                                      ?>

                                      <option value="{{ $value->id_postal_code }}" {!! $seleccionado !!} > + {{ $value->code_postal }}</option>
                                      @endforeach
                                    </select>
                                    <i class="arrow double"></i>
                                  </label>
                                </div>
                              </div>
                              <div class="col-md-3">
                                   <div style="width: 1%;float: left;font-size: 30px;margin-left: -20px">*</div>
                                <div style="width: 99%;float: left;">
                                  <label class="field prepend-icon">
                                    <input type="text" name="telefonod" id="telefonod" class="gui-input" placeholder="@lang('admin.placehotelefonopf')" value="{{ Auth::user()->telefono }}" required onkeypress="return soloNumeros(event);" maxlength="20">
                                    
                                    <label for="tooltip3" class="field-icon">
                                      <i class="fa fa-phone"></i>
                                    </label>
                                  </label>
                                </div><br><br><br>
                              </div>
                              <div class="col-md-1"></div>
                            </div>
                            <div class="row">
                              <div class="col-md-1"></div>
                              <div class="col-md-5">
                                <div style="width: 1%;float: left;font-size: 30px;margin-left: -20px">*</div>
                                <div style="width: 99%;float: left;">
                                  <label class="field prepend-icon">
                                    <input type="text" name="usuariod" id="usuariod" class="gui-input" placeholder="@lang('admin.placeholusuariopf')(*)" value="{{ $usuario }}" required>
                                    <b class="tooltip tip-right-bottom"><em> Ingrese un Alias , nombre corto que aparecerá en el chat y otras secciones de Laboraplanet (*) </em></b>
                                    <label for="tooltip3" class="field-icon">
                                      <i class="fa fa-barcode"></i>
                                    </label>
                                  </label>
                                </div>
                              </div>

                        <div class="col-md-5">

                                  <label class="field prepend-icon">
                                   <h6><small>@lang('traduccion2.txtestedatonosemosper')</small></h6>
                                     <div style="width: 1%;float: left;font-size: 30px;margin-left: -20px">*</div>
                                <div style="width: 99%;float: left;">
                                    <input type="text" name="documentod" id="documentod" class="gui-input" placeholder="@lang('admin.placeholdocumentidentipf') (*)" value="{{ Auth::user()->documento }}" required onkeypress="return soloNumeros(event);">
                                    {{--
                                    @php
                                    $enviar = Auth::user()->enviar;
                                    @endphp
                                    @if($enviar !=1)
                                    <input type="checkbox" name="terms" id="cbkau" value="{{Auth::user()->enviar}}">
                                    @else
                                     <input type="checkbox" name="terms" id="cbkau" value="{{Auth::user()->enviar}}" checked>
                                    @endif

                                        --}}
                                    @php
                                    $ver_dni = Auth::user()->ver_dni;
                                    @endphp
                                    @if($ver_dni !=1)
                                    <h6><input type="checkbox" name="mostarch" id="mostarch"><small id="txtmostrar"> &emsp;Mostrar este dato a los empleadores.</small></h6>
                                    @else
                                    <h6><input type="checkbox" name="mostarch" id="mostarch" checked><small id="txtmostrar"> &emsp;No mostrar este dato.</small></h6>
                                    @endif
                                      </div>

                                    <b class="tooltip tip-right-bottom"><em> @lang('admin.emingresedocidenditi')(*) </em></b>
                                  </label>
                                <br><br><br><br>
                              </div>
                              <div class="col-md-1"></div>
                            </div>
                            <div class="row">
                              <div class="col-md-1"></div>

                              <div class="col-md-5" >
                                  <div style="margin-top: -28px;padding-bottom: 10px">Precio por hora en dolares Americanos:</div>
                                <div style="width: 1%;float: left;font-size: 30px;margin-left: -20px">*</div>
                                <div style="width: 99%;float: left;">
                                  <label class="field select" style="width: 49%">
                                    <input type="text" placeholder="USD" disabled class="gui-input">
                                    <i class="arrow double"></i>
                                  </label>
                                  <label class="field prepend-icon" style="width: 49%">
                                    <input type="text" name="preciohd" id="preciohd" class="gui-input" placeholder="@lang('admin.placeholprecioporhorapf')" value="{{ Auth::user()->precio_hora }}" required onkeypress="return soloNumeros(event);">
                                   
                                    <label for="tooltip3" class="field-icon">
                                      <i class="fa fa-dollar"></i>
                                    </label>
                                  </label>
                                </div><br><br><br><br>
                              </div>
                         <!--      <div class="col-md-3">
                                <div class="section"><br>

                                </div>
                              </div> -->

                              <div class="col-md-5">
                                <div class="section">
                                  <label class="field prepend-icon">
                                    <input type="text" name="direcciond" id="direcciond" class="gui-input" placeholder="@lang('admin.placeholdireccionpf')" value="{{ Auth::user()->direccion }}">
                                    <b class="tooltip tip-right-bottom"><em> @lang('admin.emingreseaquidireccio') </em></b>
                                    <label for="tooltip3" class="field-icon">
                                      <i class="fa fa-flag"></i>
                                    </label>
                                  </label>
                                </div>
                              </div>
                            <div class="col-md-2"></div>
                            </div>

                            <div class="row">
                             <div class="col-md-1">

                             </div>

                              <div class="col-md-5">
                                <div class="section">
                                  <label class="field prepend-icon">
                                    <input type="text" name="documentod" id="correod" class="gui-input" placeholder="{{ Auth::user()->correo }}"  disabled>
                                    <b class="tooltip tip-right-bottom"><em> @lang('admin.emingresedocidenditi') </em></b>
                                    <label for="tooltip3" class="field-icon">
                                      <i class="fa fa-barcode"></i>
                                    </label>
                                  </label>
                                </div>
                              </div>


                              <div class="col-md-5">
                                <div class="section">
                                  <label class="field prepend-icon">
                                    <input type="text" name="urlink" id="urlink" value="{{ Auth::user()->urllinkedin }}" class="gui-input" placeholder="@lang('traduccion2.txtplacehollinkedinper')">
                                    <b class="tooltip tip-right-bottom"><em>@lang('traduccion2.txtplacehollinkedinper') </em></b>
                                    <label for="tooltip3" class="field-icon">
                                      <i class="fa fa-barcode"></i>
                                    </label>
                                  </label>
                                </div>
                              </div>
                              <div class="col-md-1">

                              </div>
                            </div>

                            <div class="row">
                              <div class="col-md-1"></div>
                              <div class="col-md-10">
                                <div style="width: 1%;float: left;font-size: 30px;margin-left: -20px">*</div>
                                <div  style="width: 99%;float: left;">
                                  <label class="field prepend-icon">
                                    <textarea class="gui-textarea" id="comentariod" name="comentariod" placeholder="@lang('traduccion2.txtplaceholdestaimprper')" required>{{ trim(Auth::user()->perfil) }}</textarea>
                                    <label for="comment" class="field-icon">
                                      <i class="fa fa-comments"></i>
                                    </label>
                                  </label>

                                </div><br><br><br><br><br><br><br>
                              </div>
                              <div class="col-md-1"></div>
                            </div>

                            <div class="row">
                              <div class="col-md-12"><center><button class="btn btn-dark " type="submit" id="guardados"> @lang('traduccion2.btngrabarper') </button></center><br><br></div>
                            </div>
                          </form>

                            <div class="row">
                              <div class="col-md-1"></div>
                              <div class="col-md-10">
                                <div class="panel-group">
                                  <form action="POST" id="experiencia" >
                                  <div class="panel">
                                    <div class="panel-heading" style="padding: 0px;">
                                      <a class="accordion-toggle accordion-icon link-unstyled collapsed" data-toggle="collapse" data-parent="#accordion" href="#accord2" aria-expanded="false">
                                      @lang('admin.titleexperiencilab')
                                      </a>
                                    </div>
                                    <div id="accord2" class="panel-collapse collapse" style="height: 0px;" aria-expanded="false">
                                      <div class="panel-body">
                                        <div class="col-md-2" style="padding-bottom: 10px">
                                         <center> <img src="img/edit/empre.png" alt="empresa" style="border-radius: 50%;  height:120px ; width: 100%; max-width: 200px "></center>
                                          <p style=""></p>
                                        </div>
                                        <div class="col-md-10">
                                          <div class="row">
                                            <div class="col-md-4">
                                              <div class="section">
                                                <label class="field prepend-icon">
                                                  <input type="text" name="empresan" id="empresan" class="gui-input" placeholder="@lang('admin.placeholempresapf')">
                                                  <b class="tooltip tip-right-bottom"><em> @lang('admin.emingresenombrempre') </em></b>
                                                  <label for="tooltip3" class="field-icon"><i class="fa fa-flag"></i></label>
                                                </label>
                                              </div>
                                            </div>
                                            <div class="col-md-4">
                                              <div class="form-group">
                                                <div class="input-group date" id="datetimepicker2">
                                                  <span class="input-group-addon cursor">
                                                  <i class="fa fa-calendar"></i>
                                                  </span>

                                                  <input type="text" class="form-control dateee" placeholder="@lang('admin.placeholempredesdepf')" id="fechai">


                                                </div>
                                              </div>
                                            </div>

                                            <div class="col-md-4">
                                              <div class="form-group">
                                                 <div class="input-group date" id="datetimepicker3">
                                                  <span class="input-group-addon cursor">
                                                  <i class="fa fa-calendar"></i>
                                                  </span>
                                                  <input type="text" class="form-control dateee" placeholder="@lang('admin.placeholemprehastapf')" id="fechaf">

                                                </div>
                                                 <input type="checkbox" name="actualmente" id="actualmente" align="right" > <small>Actualmente</small>
                                              </div>
                                            </div>

                                          </div>
                                        </div>
                                        <div class="col-md-10">
                                          <div class="row">
                                            <div class="col-md-4">
                                              <div class="section">
                                                 <label class="field prepend-icon">
                                                   <input type="text" name="cargoe" id="cargoe" class="gui-input" placeholder="@lang('admin.placeholemprecargopf')">
                                                    <b class="tooltip tip-right-bottom"><em> @lang('admin.emingreseaquicargoocupad') </em></b>
                                                   <label for="tooltip3" class="field-icon"><i class="fa fa-flag"></i></label>
                                                  </label>
                                              </div>
                                            </div>
                                            <div class="col-md-4">
                                              <div class="section">

                                                  <select id="pais1" class="form-control select2" style="width: 100%;height: 14">
                                                    <option></option>
                                                    @foreach($pais as $value)
                                                      <option value="{{ $value->id_country }}">{{ $value->name_country }}</option>
                                                    @endforeach
                                                  </select>


                                              </div>
                                            </div>
                                            <div class="col-md-4">
                                              <div class="section">
                                                  <select id="ciudad1" class="select2c" style="width: 100%">
                                                    <option></option>
                                                  </select>

                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="col-md-12">
                                          <div class="section">
                                            <label class="field prepend-icon">
                                              <textarea class="gui-textarea" id="comentario" name="comentario" placeholder="@lang('admin.placeholemprefuncionesrealiz')"></textarea>
                                              <label for="comentario" class="field-icon">
                                                <i class="fa fa-comments"></i>
                                              </label>

                                            </label>
                                          </div>
                                        </div>
                                      </div>
                                                          <div class="panel-footer"><center><button class="btn btn-dark">@lang('traduccion2.btngrabarper')</button></div>
                                    </div>
                                  </div>
                                  </form>
                                </div>
                      </div>

                      <div class="col-md-1"></div>

                    </div>
                    @foreach($experiencia as $value)
                    <div class="row panel-general">
                      <div class="col-md-1"></div>
                     <div class="col-md-10">
                  <div class="panel panel-info" style="border-radius: 50px">
                    <div class="panel-body">
                      <div class="row">
                        <div class="col-md-2" style="padding-top:14px"><center><img src="img/edit/empre.png" width="70%" style=" max-width:130px;max-height:120 " height="60%" style="border-radius: 60%; "></center></div>
                        <div class="col-md-7">
                          <div style="">


                            <div class="row"><div class="col-md-12"><center><p style="font-size: 23px;font-weight: bold;color: #3bafda">{{ $value->company }}</p></center></div></div>
                            <div class="row">
                              <div class="col-md-4" style="padding-bottom: 10px"><b class="text-primary mn">@lang('admin.txtcargoforeachexpe')</b>&nbsp; {{ $value->charge }}</div>
                              <?php



                              if($value->date_end == '1970-01-01')
                              {
                                $newfecfin2 = 'Actualmente';
                              }
                              else
                              {
                              $originalfin2 = $value->date_end;
                              $newfecfin2 = date("d/m/Y",strtotime($originalfin2));
                              }

                              $originalini2 = $value->date_start;
                              //$originalfin2 = $value->date_end;


                              $newfecini2 = date("d/m/Y",strtotime($originalini2));
                              //$newfecfin2 = date("d/m/Y",strtotime($originalfin2));

                              ?>
                              <div class="col-md-8"><b class="text-primary mn">@lang('admin.txtduracionforeachexpe')</b>{{ $newfecini2 }} - {{ $newfecfin2}}</div>
                            </div>
                            <div class="row">
                              <div class="col-md-4" style="padding-bottom: 10px"><b class="text-primary mn"> @lang('admin.txtpaisforeachexpe')</b>&nbsp; {{ $value->name_country }}</div>
                              <div class="col-md-8"><b class="text-primary mn">Sub Area:</b> &nbsp;{{ $value->name_departament }}</div>
                            </div>
                            <div class="row">
                              <div class="col-md-12">
                                <b class="text-primary mn">@lang('admin.txtdescriptionforeachexpe')</b> &nbsp;{{ $value->description_profile }}
                              </div>
                            </div>

                          </div>
                        </div>
                        <div class="col-md-1"> </div>
                        <div class="col-md-3">
                          <div style="padding-top: 10%">
                          <center>
                          <p><button class="btn btn-sm btn-primary btn-block" style="width: 120px" id="{{Auth::user()->id}},{{$value->id_experiencie}}" onclick="PasarDatosModal(this);"> <span class="fa fa-edit">&nbsp;  @lang('admin.btneditarforeachexpe')</span></button></p>
                          <p><button class="btn btn-sm btn-primary btn-block btn-eliminar-w" style="width: 120px"><input type="hidden" name="" value="{{ $value->id_experiencie }}"> <span class="fa fa-trash-o ">&nbsp; @lang('admin.btneliminarforeachexpe')</span></button></p>
                          </center>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  </div>
                     <div class="col-md-1"></div>

                    </div>
                    @endforeach



            <div class="row">
                     <div class="col-md-1"></div>
                      <div class="col-md-10">
                      <div class="panel-group accordion" id="accordion">
                        <form id="educacion" action="POST">
                            <div class="panel">
                             <div class="panel-heading" style="padding: 0px;">
                              <a class="accordion-toggle accordion-icon link-unstyled collapsed" data-toggle="collapse" data-parent="#accordion" href="#accord3" aria-expanded="false">
                               @lang('admin.titleeducacionpf')
                              </a>
                              </div>
                              <div id="accord3" class="panel-collapse collapse" style="height: 0px;" aria-expanded="false">
                                <div class="panel-body">
                                  <div class="col-md-2" style="margin-top: 26px;">
                                    <center><img src="img/edit/estu.jpg" alt="empresa" style="border-radius: 50%;  height:120px ; width: 100%; max-width: 200px"></center>
                                    <p style=""></p>
                                  </div>

                                <div class="col-md-10">
                                <div class="row">
                                  <div class="col-md-4">
                                    <div class="section">
                                       <label class="field prepend-icon">
                                         <input type="text" name="txtcentro_e" id="txtcentro_e" class="gui-input" placeholder="@lang('admin.placeholcentroeducatpf')">
                                          <b class="tooltip tip-right-bottom"><em> @lang('admin.emingreseaquicentroeduca') </em></b>
                                         <label for="tooltip3" class="field-icon">
                                            <i class="fa fa-flag"></i>
                                          </label>
                                        </label>
                                       </div>
                                   </div>
                                   <div class="col-md-4">
                                       <div class="form-group">
                                          <div class="input-group date" id="datetimepicker4">
                                          <span class="input-group-addon cursor">
                                          <i class="fa fa-calendar"></i>
                                         </span>
                                        <input name="educacion_fi" id="educacion_fi" type="text" class="form-control dateee" placeholder="@lang('admin.placeholempredesdepf')">
                                      </div>

                                      </div>
                                    </div>
                                      <div class="col-md-4">
                                       <div class="form-group">
                                          <div class="input-group date">
                                          <span class="input-group-addon cursor">
                                          <i class="fa fa-calendar"></i>
                                         </span>
                                        <input type="text"  name="educacion_ff" id="educacion_ff" class="form-control dateee" placeholder="@lang('admin.placeholemprehastapf')">
                                      </div>

                                      </div>
                                    </div>
                                      </div>
                                </div>


                              <div class="col-md-10">
                                <div class="row">

                                  <div class="col-md-4">
                          <div class="section">
                          <label class="field select">
                            <select id="txttipoe" name="txttipoe">
                              <option value="">@lang('admin.placeholcbotipoestudiopf')</option>
                              <option value="0">@lang('admin.value1detipoestu')</option>
                              <option value="1">@lang('admin.value2detipoestu')</option>
                              <option value="2">@lang('admin.value3detipoestu')</option>
                              <option value="3">@lang('admin.value4detipoestu')</option>
                            </select>
                            <i class="arrow double"></i>
                          </label>
                        </div>
                                   </div>

                                   <div class="col-md-8">
                                         <div class="section">
                                       <label class="field prepend-icon">
                                         <input type="text" name="txttituloe" id="txttituloe"  class="gui-input" placeholder="@lang('admin.placeholtitulobtenido')">
                                          <b class="tooltip tip-right-bottom"><em> @lang('admin.emingingreseaquitituloobte') </em></b>
                                         <label for="tooltip3" class="field-icon">
                                            <i class="fa fa-flag"></i>
                                          </label>
                                        </label>
                                       </div>
                                   </div>
                                      </div>
                                </div>


                                   <div class="col-md-5">
                                      <div class="section">
                                        <select class="select2" name="pais2" id="pais2" style="width: 100%">
                                          <option></option>
                                        @foreach($pais as $value)
                                          <option value="{{ $value->id_country }}">{{ $value->name_country }}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                   </div>
                                   <div class="col-md-5">
                                    <div class="section">
                                        <select class="select2c" name="ciudad2" id="ciudad2" style="width: 100%">
                                          <option></option>

                                        </select>

                                    </div>
                                   </div>
                             </div>
                          <div class="panel-footer"><center><button class="btn btn-dark">@lang('traduccion2.btngrabarper')</button></div>
                          </div>
                        </div>
                        </form>
                      </div>
                      </div>
                      <div class="col-md-1"></div>
                    </div>
           @foreach($estudios as $value)
                    <div class="row panel-general">
                      <div class="col-md-1"></div>
                     <div class="col-md-10">
                  <div class="panel panel-info" style="border-radius: 50px">
                    <div class="panel-body">
                      <div class="row">
                        <div class="col-md-2" style="padding-top:14px"><center><img src="img/edit/estu.jpg" width="70%" style=" max-width:130px;max-height:120 " height="60%" style="border-radius: 60%; "></center></div>
                        <div class="col-md-7">
                            <div class="row"><div class="col-md-12"><center><p style="font-size: 23px;font-weight: bold;color: #3bafda">{{ $value->institute }}</p></center></div></div>
                            <div class="row">
                              <div class="col-md-4" style="padding-bottom: 10px"><b class="text-primary mn">Grado:</b>&nbsp;
                                @if($value->type_study == 0)
                                  Tecnico
                                @endif
                                @if($value->type_study == 1)
                                  Universitario
                                @endif
                                @if($value->type_study == 2)
                                  Maestria
                                @endif
                                @if($value->type_study == 3)
                                  Doctorados
                                @endif
                              </div>
                              <?php

                        $original = $value->date_start;
                        $original2 = $value->date_end;

                        $newfecini = date("d/m/Y",strtotime($original));
                        $newfecfin = date("d/m/Y",strtotime($original2));


                              ?>
                              <div class="col-md-8"><b class="text-primary mn">@lang('admin.txtduracionforeachexpe')</b>{{ $newfecini }} - {{ $newfecfin }}</div>
                            </div>
                            <div class="row">
                              <div class="col-md-12" style="padding-bottom: 10px">
                                <b class="text-primary mn">Titulo:</b> &nbsp;{{ $value->degree }}
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-4" style="padding-bottom: 10px"><b class="text-primary mn">@lang('admin.txtpaisforeachexpe')</b>&nbsp; {{ $value->name_country }}</div>
                              <div class="col-md-8"><b class="text-primary mn">Sub Area:</b> &nbsp;{{ $value->name_departament }}</div>
                            </div>
                          </div>

                        <div class="col-md-1"> </div>
                        <div class="col-md-3">
                          <div style="padding-top: 10%">
                          <center>
                          <p><button type="button" class="btn btn-sm btn-primary btn-block" id="{{Auth::user()->id}},{{$value->id_study}}" onclick="PasardatosModalE(this);" style="width: 120px"> <span class="fa fa-edit">&nbsp;  @lang('admin.btneditarforeachexpe')</span></button></p>
                          <p><button type="button" class="btn btn-sm btn-primary btn-block btn-eliminar-s" style="width: 120px"><input type="hidden" value="{{ $value->id_study }}"> <span class="fa fa-trash-o ">&nbsp; @lang('admin.btneliminarforeachexpe')</span></button></p>
                          </center>
                          </div>
                        </div>
                        </div>
                      </div>
                    </div>
                  </div>
                       <div class="col-md-1"></div>
                     </div>


                    @endforeach



                </div>

              </div>

            </div>
              <br/>
  <div class="col-md-12" id="beno"><center>
                                          {{-- <button class="btn btn-primary" id="guardadef"> GUARDAR </button> --}}
                                          <button class="btn btn-primary" id="enviar_datos">@lang('traduccion2.btnenviardatosper') </button>
                                   </center><br><br></div>
  <div class="col-md-12" style="display: none;" id="hc"><center><img src="{{ 'img/cargando.gif' }}" width="150" height="150"></center></div>
        </div>


            <div class="col-md-3">
                @if(Auth::user()->flag == 1)
 <!-- PANEL DE PUNTUACION DE TRABAJADOR -->
              <div class="panel">
                <div class="panel-heading text-center">
                  <span class="panel-title fw600 text-info" style="font-size: 15px;">@lang('admin.txtpuntuacioncomotra')</span>
                </div>
                <div class="panel-body">
                  <div class="row">

                   <div class="col-md-12 text-center" align="center">




                    <!-----///////////////////////////////////////// ------>
                      <?php

                        $cuantoson = count($comen);
                        $guarda = 0;
                        $daprom = 0;


                      ?>

                    @forelse($comen as $calculo)
                      <?php  $guarda += $calculo->qualification; ?>
                      <?php

                       $daprom = round($guarda/$cuantoson);
                      ?>
                      @empty

                    <center>
                      <div style="width: 100%">
                               <i class="fa fa-star-o"  style="color: #f1c40f;font-size: 35px"></i>
                                <i class="fa fa-star-o"  style="color: #f1c40f;font-size: 35px"></i>
                                 <i class="fa fa-star-o"  style="color: #f1c40f;font-size: 35px"></i>
                                  <i class="fa fa-star-o"  style="color: #f1c40f;font-size: 35px"></i>
                                   <i class="fa fa-star-o"  style="color: #f1c40f;font-size: 35px"></i>
                            </div>
                    </center>

                    @endforelse


                    @if($daprom == 0)

                    @else
                        @for($i=1;5>=$i;$i++)
                      @if($daprom>=$i)
                      <i class="fa fa-star" style="color: #f1c40f;font-size: 35px"></i>
                      @else
                      <i class="fa fa-star-o"  style="color: #f1c40f;font-size: 35px"></i>
                      @endif
                    @endfor

                    @endif

                   </div>


                  </div>
                  </div>
              </div>



               <!-- FIN DEL MODAL -->
                @else

                @endif







            @if(Auth::user()->flag == 1)

              <!-- PANEL DE NIVEL EN LABORAPLANET -->
              <div class="panel">
                <div class="panel-heading text-center">
                  <span class="panel-title fw600 text-info" style="font-size: 15px;">@lang('admin.titletunivelenlaborapla')</span>
                </div>

                <div class="panel-body">
                    <center><span class="fs14 text-center ml10 ">
                      <i class="">@lang('admin.txtesteestuniveldemues')</i></span></center>
                  <div class="row">
                    <div class="col-md-3">

                    </div>

                    <p class="col-md-6" align="center">

                        <?php
                        $contar = $cont;
                        $numerolevel = "1";
                        $nombrenivel = "Aficionado";
                        $texto = "Completa el 50% de perfil, y realiza minimo 2 requerimientos.";
                    if($contar == 2)
                    {
                      $numerolevel = '2';
                      $nombrenivel = 'Fan';
                      $texto = "Completa el 100% de perfil, y realiza minimo 3 requerimientos.";
                    }
                    if($contar == 3)
                    {
                      $numerolevel ='3';
                      $nombrenivel = 'Profesional';
                      $texto = "Completa el 100% de perfil, realiza de 4 a 6 requerimientos.";
                    }

                    if($contar >=4 && $contar <=6)
                    {
                      $numerolevel = '4';
                      $nombrenivel = 'Heroe';
                      $texto = "Completa el 100% de perfil,realiza de 7 a 9 requerimientos.";
                    }
                    if($contar >=7 && $contar <=9)
                    {
                      $numerolevel = '5';
                      $nombrenivel = 'Leyenda';
                      $texto = "Realiza mas de 10 requerimientos + un test de 5 preguntas simples sobre el manejo de la plataforma.";
                    }
                    if($contar >=10)
                    {
                      $numerolevel = '6';
                      $nombrenivel = "Dios";
                      $texto = "";
                    }

                     ?>


                   <label class="NumberLevel">{{$numerolevel}}</label><br/>

                      <span class="fs20 text-left ml10 ">
                      <i class=""> {{$nombrenivel}} </i></span>
                    </p>

                    <div class="col-md-3">

                    </div>
                  </div>
                  <br/>
                    <center><span class="fs12 text-center ml10 ">
                      <i class="">{{$texto}}</i></span></center>
                  </div>
              </div>
            @else

            @endif

            @if(Auth::user()->flag == 1)
              <!-- PANEL DE RECONOCIMIENTOS EN LABORAPLANET -->
              <div class="panel">
                <div class="panel-heading text-center">
                  <span class="panel-title fw600 text-info" style="font-size: 15px;">@lang('admin.titlereconocimientosarriba')</span>
                </div>
                <div class="panel-body">
                    <center><span class="fs13 text-left ml10 ">
                      <i class="">@lang('admin.titlereconocimientos')</i></span></center>
                  <div class="row">
                    <div class="col-md-3">

                    </div>

                    <div class="col-md-6" align="center" >

<?php
  $medalla = '';
  $textomedalla = '';
  $textoabajo ='';

  if($conteoenviar < 5)
  {
    $medalla = 'img/edit/carita_triste.png';
    $textomedalla = "SIN MEDALLA";
    $textoabajo = "Complete 5 requerimientos con la maxima puntuacion.";
  }
  if($conteoenviar >=5 && $conteoenviar <=9)
  {
    $medalla = 'img/medallas-labora/medalla-entusiasta.PNG';
    $textomedalla ='MEDALLA ENTUSIASTA';
    $textoabajo = 'Completa 10 requerimientos con la maxima puntuacion.';
  }
  if($conteoenviar >=10 && $conteoenviar <=14)
   {
    $medalla = 'img/medallas-labora/medalla-honorable.PNG';
    $textomedalla = 'MEDALLA HONORABLE';
    $textoabajo = 'Completa 15 requerimientos con la maxima puntuacion.';
   }

   if($conteoenviar >=15 && $conteoenviar <=19)
   {
    $medalla = 'img/medallas-labora/medalla-asociado.PNG';
    $textomedalla = 'MEDALLA ASOCIADO';
    $textoabajo = 'Completa 20 requerimientos con la maxima puntuacion.';
   }
   if($conteoenviar >= 20 && $conteoenviar <=24)
   {
    $medalla ='img/medallas-labora/medalla-partner.PNG';
    $textomedalla ='MEDALLA PARTNER';
    $textoabajo = 'Completa 25 requerimientos con la maxima puntuacion.';
   }
   if($conteoenviar >=25  && $conteoenviar <=29)
   {
    $medalla ='img/medallas-labora/medalla-especialista.PNG';
    $textomedalla ='MEDALLA ESPECIALISTA';
    $textoabajo = 'Completa 30 requerimientos con la maxima puntuacion.';
   }

   if($conteoenviar >=30 && $conteoenviar <=34)
  {
    $medalla ='img/medallas-labora/medalla-experto.PNG';
    $textomedalla ='MEDALLA EXPERTO';
    $textoabajo = 'CCompleta 35 a mas, requerimientos con la maxima puntuacion.';
  }
   if($conteoenviar >= 35)
    {
    $medalla ='img/medallas-labora/medalla-master.PNG';
    $textomedalla ='MEDALLA MASTER';
    $textoabajo = '';
    }

?>

                        <img src="{{$medalla}}" alt="medalla-entusiasta" width="180" height="165">
                        <p style="font-size: 11px;">{{$textomedalla}}</p>
                        </div>

                        <div class="col-md-3">

                        </div>

                  </div>
                      <br/>
                        <center>
                            <span class="fs13 text-center ml10">
                              <i class="">{!!$textoabajo!!}</i></span>
                        </center>
                  </div>
              </div>
              @else

              @endif

            @if(Auth::user()->flag == 1)
              <!-- PANEL DE HABILIDADES CERTIFICADAS -->
      
                 <div class="panel">
                <div class="panel-heading text-center">
                  <span class="panel-title fw600 text-info" style="font-size: 15px;">CERTIFICACIONES</span>
                </div>
                <div class="panel-body">

                  @forelse($certificados as $value)
                  <div class="panel panel-system">
                    <div class="panel-heading">
                      <span class="panel-title" style="font-size:13px !important;">{{ $value->nombre_cer }}</span>
                    </div>
                    <div class="panel-body">
                      <label><img src="{{ $value->logo_patr_cert }}" width="20" height="20" /> {{ $value->nom_patr_cert }}</label><br/>
                      @php
                        $comple =  explode("-",$value->fec_expe);
                      @endphp
                      <label>{{ $comple[2]."-".$comple[1]."-".$comple[0] }} • {{ $value->fec_cadu }}
                      </label> <br/>
                      <label>Certificate {{ $value->id_creden }}</label> <br/>
                      <label><a href="{{ $value->url_creden }}" target="_blank"> Ver credencial </a></label>
                    </div>
                  </div>

                    @empty
                      <center>
                        <span class="fs13 text-left ml10 ">
                          <i class="">Aun no tienes certificaciones.</i>
                        </span>
                        <br/> <br/>
                        <a href="{{ route('certificarnu') }}" target="_blank" class="btn btn-sm btn-primary">AGREGAR</a>
                      </center>
                @endforelse
                
                @if (count($certificados) != 0)
                  <center>
                    {{-- <br/> <br/> --}}
                    <a href="{{ route('certificarnu') }}" target="_blank" class="btn btn-sm btn-primary">AGREGAR CERTIFICACIONES</a>
                  </center>

                @else

                @endif                







                  </div>
              </div>
              
      
              
              @else

              @endif


            @if(Auth::user()->flag == 1)
              <!-- PANEL DE CALIFICACIONES -->
              <div class="panel">
                <div class="panel-heading text-center">
                  <span class="panel-title fw600 text-info" style="font-size: 15px;">@lang('admin.txtcalificaciones')</span>
                </div>
                <div class="panel-body">
                    <center>
                      <span class="fs13 text-left ml10">
                      @php $usuactual = Auth::user()->nombres." ".Auth::user()->apellidos @endphp
                      <i class="">@lang('admin.txtestassoncali') {{$usuactual}}</i>
                      </span>
                    </center><br>
                    <div class="panel">

                  <div class="panel-body panel-scroller scroller-md scroller-pn pn">



                  @forelse($comen as $value)
                  <?php  $us= $value->usuario ?>
                    <div style="padding: 10px; background-color: #E6E6E6;margin: 5px;width: 100%">
                       <?php
                        $fechap = $value->date_finish;
                        $newfecini = date("d/m/Y",strtotime($fechap));
                      ?>
                    <span style="float:right;">{{$newfecini}}</span><br>
                    Usuario: {{ $us->nombres." ".$us->apellidos }}<br>
                    Calificacion:
                    @for($i=1;5>=$i;$i++)

                      @if($value->qualification>=$i)
                      <i class="fa fa-star" style="color: #f1c40f;font-size: 15px"></i>
                      @else
                      <i class="fa fa-star-o"  style="color: #f1c40f;font-size: 15px"></i>
                      @endif
                    @endfor
                    <br>
                    Comentario: {{ $value->commit_finish }}
                  <div class="mh10 p10  lighter text-right">

          <div class="bs-component ib">
            <button class="zocial icon facebook compartir-f"></button>
          </div>
          <div class="bs-component ib">
            <button class="zocial icon twitter compartir-t"></button>
          </div>

          <div class="bs-component ib">
            <button class="zocial icon linkedin compartir-l"></button>
          </div>
          <br>
        </div>
                    </div>
                  @empty
                  <br>
                    <center><div style="width: 100%">NO TIENE COMENTARIOS</div></center>
                  @endforelse

             </div>
           </div>
              <!-- AQUI IRA EL SELECT DE CUANDO EL EMPLEADOR, CALIFIQUE AL TRABAJADOR -->
                  </div>
              </div>
              @else

              @endif






            </div>
        </div>







         </row>
      </div>



      <div id="tab2_2" class="tab-pane">

       <div class="row">

        <div class="col-md-9">
          <div class="admin-form theme-primary">
            <div class=" panel heading-border panel-primary">

                <div class="panel-body bg-light">
                <form id="juridico" method="POST" enctype="multipart/form-data">
                    <div class="section-divider mv40" id="spy2">
                      <span>@lang('admin.titledatosjuridicos')</span>
                    </div>
                    <div class="row">
                      <div class="col-md-1">

                      </div>


                        <div class="col-md-10">
                        <div class="section">
                          <label class="field prepend-icon">
                             <input type="text" name="razonse" id="razonse" class="gui-input" placeholder="@lang('admin.placeholempresdt')" value="{{ Auth::user()->nombre_empresa }}">
                            <b class="tooltip tip-right-bottom"><em> @lang('admin.emingresenombrempre') </em></b>
                            <label for="tooltip3" class="field-icon">
                              <i class="fa fa-flag"></i>
                            </label>
                          </label>
                        </div>
                      </div>
                      <div class="col-md-1"></div>
                  </div>


                    <div class="row">
                      <div class="col-md-1">

                      </div>
                        <div class="col-md-5">
                         <div class="section">
                          <label class="field prepend-icon">
                            <input type="text" name="telefonoe" id="telefonoe" class="gui-input" placeholder="@lang('admin.placeholtelefonodt')" value="{{ Auth::user()->telefono_empresa }}" onkeypress="return soloNumeros(event);" maxlength="20">
                            <b class="tooltip tip-right-bottom"><em> @lang('admin.emingresaquitelefempresa') </em></b>
                            <label for="tooltip3" class="field-icon">
                              <i class="fa fa-phone"></i>
                            </label>
                          </label>
                        </div>
                      </div>
                 <div class="col-md-5">
                        <div class="section">
                            <select id="paise" name="paise" class="select2" style="width: 100%">
                              <option value="">Pais</option>
                              @foreach($pais as $value)
                                <option value="{{ $value->id_country }}">{{ $value->name_country }}</option>
                              @endforeach
                            </select>

                        </div>
                      </div>

                      <div class="col-md-1">

                      </div>
                    </div>
                        <div class="row">
                          <div class="col-md-1">

                          </div>
                            <div class="col-md-5">
                        <div class="section">
                          <label class="field prepend-icon">
                            <input type="text" name="nit" id="nit" class="gui-input" placeholder="@lang('admin.placeholnitdt')" value="{{ Auth::user()->nit }}">
                            <b class="tooltip tip-right-bottom"><em> @lang('admin.emingreseaquinitempresa') </em></b>
                            <label for="tooltip3" class="field-icon">
                              <i class="fa fa-flag"></i>
                            </label>
                          </label>
                        </div>
                      </div>

                       <div class="col-md-5">
                        <div class="section">
                          <label class="field prepend-icon">
                            <input type="text" name="direccione" id="direccione" class="gui-input" placeholder="@lang('admin.placeholdireccdt')" value="{{ Auth::user()->direccion_empresa }}">
                            <b class="tooltip tip-right-bottom"><em> @lang('admin.emingresedireccioempresa') </em></b>
                            <label for="tooltip3" class="field-icon">
                              <i class="fa fa-flag"></i>
                            </label>
                          </label>
                        </div>
                      </div>
                      <div class="col-md-1">

                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-1">

                      </div>
                      <div class="col-md-7">
                        <div class="section">
                          <label class="field prepend-icon">
                            <textarea class="gui-textarea" id="descripcione" name="descripcione" placeholder="@lang('admin.placeholdescripcionempresa')">{{ trim(Auth::user()->descripcion) }}</textarea>
                            <label for="comment" class="field-icon">
                              <i class="fa fa-comments"></i>
                            </label>

                          </label>
                        </div>
                      </div>
                      <div class="col-md-3">


                          <?php
                          $logo_empresa = Auth::user()->logo_empresa;
                          if($logo_empresa == null)
                          {
                            $logo_empresa = 'img/aquivatulogo.png';
                          }
                          ?>

              <img class="media-object mw150" src="{{$logo_empresa}}" id="img3" alt="... logo empresa ..." width="100" height="100" style="border-style:dotted;border-width:5px;">
                  &emsp;&emsp;&emsp;&emsp;

           <label for="file2" class="upload-button"><i class="fa fa-cloud-upload" title="Cargar Imagen de Perfil" style="color: black"> Subir Imagen </i></label>
            <input id="file2" name="archivo2" type="file" style="display:none" onchange="return fileValidation2()" title="Cargar Imagen de Perfil">
                      </div>
                      <div class="col-md-1">
                        @php
                        $empresa = Auth::user()->nombre_empresa;
                        $razon_social = Auth::user()->razon_social;
                        $telefono_emp = Auth::user()->telefono_empresa;
                        $pais_empresa = Auth::user()->pais_empresa;
                        $nit = Auth::user()->nit;
                        $direccion_empresa = Auth::user()->direccion_empresa;
                        $descripcion_empresa = Auth::user()->descripcion;
                      @endphp

                      @if($empresa !='' and $razon_social !='' and $telefono_emp !='' and $pais_empresa !='' and $nit !='' and $direccion_empresa !='' and $descripcion_empresa !='')
                        <button hidden>{{ $valorueda2 +=100 }}</button>
                      @endif
                      </div>

                        <div class="col-xs-12" style="margin:0px auto;" align="center">
                        <br><button class="btn btn-lg btn-primary visit"><i class="glyphicon glyphicon-ok-sign"></i> @lang('admin.btnguardardatosperpf') </button>
                        </div>



                    </div>




     </form>

                </div>

              </div>
            </div>
</div>


            <div class="col-md-3">

                 <div class="panel">
                <div class="panel-heading text-center">
                  <span class="panel-title fw600 text-info" style="font-size: 15px;">Puntuacion como empleador  </span>
                </div>
                <div class="panel-body">
                  <div class="row">

                   <div class="col-md-12 text-center" align="center">
                   <span id="puntuacione" style="font-size: 40px"></span>
                   </div>


                  </div>
                  </div>
              </div>



              <div class="panel">
                <div class="panel-heading text-center">
                  <span class="panel-title fw600 text-info" style="font-size: 15px;">@lang('admin.titletuperfilseencuentral')</span>
                </div>
                <div class="panel-body">
                  <div class="row">

                    <div class="col-md-12 text-center" align="center">

                          <center><div class="progress-bar1 position" align="center" id="rueda2" data-percent="{{ $valorueda2 }}" data-duration="2000" data-color="#EBEBEB,blue"></div></center>
                    </div>

                  </div>
                  <br/>
                    <center><span class="fs15 text-center ml10 ">
                      @if($empresa !='' and $razon_social !='' and $telefono_emp !='' and $pais_empresa !='' and $nit !='' and $direccion_empresa !='' and $descripcion_empresa !='')
                      <i id="datosjuridicos" hidden>Completa los datos juridicos +100%</i></span></center>
                      @else
                      <i id="datosjuridicos">Completa los datos juridicos +100%</i></span></center>
                      @endif

                  </div>
              </div>







              <div class="panel">
                <div class="panel-heading text-center">
                  <span class="panel-title fw600 text-info" style="font-size: 15px;">@lang('admin.titletunivelenlaborapla') </span>
                </div>

                <div class="panel-body">
                    <center><span class="fs14 text-center ml10 ">
                      <i class="">@lang('admin.txtesteestuniveldemues')</i></span></center>
                  <div class="row">
                    <div class="col-md-3">

                    </div>
                    <p class="col-md-6" align="center">
                    <label class="NumberLevel">0</label>

                  </p>
                    <div class="col-md-3">

                    </div>
                  </div>
                  <br/>
                    <center><span class="fs15 text-center ml10 ">
                      <i class="">@lang('admin.txtvamosporelsiguienteniv') <br/> @lang('admin.txtcompletaminimo50')  <br/> @lang('admin.txtminimo2pro')</i></span></center>
                  </div>
              </div>



              <!-- PANEL DE RECONOCIMIENTO DEL TRABAJADOR -->
              <div class="panel">
                <div class="panel-heading text-center">
                  <span class="panel-title fw600 text-info" style="font-size: 15px;">@lang('admin.titlereconocimientosarriba')</span>
                </div>
                <div class="panel-body">
                    <center><span class="fs13 text-left ml10 ">
                      <i class="">@lang('admin.titlereconocimientos')</i></span></center>
                  <div class="row">
                    <div class="col-md-3">

                    </div>

                    <div class="col-md-6" align="center" >


                   <img src="img/edit/carita_triste.png" alt="tipo de reconocimiento" width="165" height="165">
                   <p style="font-size: 11px;">@lang('admin.txtustednotieneaunreconoci')</p>

                    </div>

                    <div class="col-md-3">

                    </div>
                  </div>
                  <br/>
                    <center><span class="fs12 text-center ml10">
                      <i class="">@lang('admin.txtcomoconseguirmasrecon')<br/></i></span>
                      <span class="fs13 text-center ml10">
                      <i class="">@lang('admin.txtcompleta5proyectos')</i></span>
                    </center>
                  </div>
              </div>
              <!-- FIN DEL PANEL -->






            </div>
         </div>
      </div>
    </div>
  </div>
</div>
              </div>


          </div>

      </section>
      <!-- End: Content -->





@endsection
