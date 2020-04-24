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


   <!-- FIN -->
  <style type="text/css">
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



.title { position: relative;
z-index: 0;
}
.title:hover { background-color: transparent;
z-index: 1;
}
.title span { border: 1px solid #434442;
padding: 5px;
position: absolute;
text-decoration: none;
background-color: #FFFFFF;
color: #3E1F00;
width: 20em;
/*text-align: center;*/
visibility: hidden;
font-size: 1em;
line-height: 10px;
}
.title:hover span { visibility: visible;
top: -30px;
/*left: 10px;*/
}






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


.li {
  position: relative;
  display: inline-block;
  width: 23%;
  margin: 1%;
  text-align: left;
  font-size: 12px;
}

li .link i {
  z-index: 4;
  opacity: 0;
  position: absolute;
  left: 40%;
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
  bottom: 50%;
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

input::-webkit-input-placeholder {
  font-size: 12px;
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

  <!-- DESDE AQUI OTRAVES -->
    <script src="vendor/plugins/duallistbox/jquery.bootstrap-duallistbox.min.js"></script>

  <!-- Bootstrap Maxlength plugin -->
  <script src="vendor/plugins/maxlength/bootstrap-maxlength.min.js"></script>


  <!-- Typeahead Plugin -->
  <script src="vendor/plugins/typeahead/typeahead.bundle.min.js"></script>

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


   </script>
@endsection
@section('contenido')
  <?php
  $nombres = Auth::user()->nombres;
  $apellidos = Auth::user()->apellidos;
  $usuario = Auth::user()->usuario;
  $perfil = Auth::user()->perfil;
  ?>

  <!-- MODAL PARA CALIFICAR LA PLATAFORMA -->
      <div id="califica-form" class="popup-basic admin-form mfp-with-anim mfp-hide" >
          <div class="panel">
            <div class="panel-heading">
              <span class="panel-title">
                ¿Que opinas de la plataforma?</span>
            </div>
            <!-- end .panel-heading section -->

            <form method="POST"  id="form-calificar">
              <div class="panel-body" style="padding-bottom: 0px" align="center">
              <div class="row">
                <div class="col-md-12">
                  <h2 class="text-primary mn"> @lang('admin.titlepuntuacion') </h2>
                </div>
              </div>
              <div class="row">

                <div class="col-md-12" >


                        <span id="Estrellas" style="font-size: 50px"></span>
                        <input type="hidden" id="invi">
                        <input type="hidden" id="user" value="{{Auth::user()->id}}">
                        @php
                         $ldate = date('Y-m-d H:i:s');

                        @endphp

                        <input type="hidden" id="fecha" value="{{ $ldate }}">
                        <input type="hidden" name="" id="valorestrella">


                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <h2 class="text-primary mn"> @lang('admin.titletestimonio')</h2>
                  <br/>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <label class="field prepend-icon">
                            <textarea class="gui-textarea" id="comment" name="comment" placeholder="@lang('admin.placeholtestimonio')" required maxlength="105"></textarea>
                            <label for="comment" class="field-icon">
                              <i class="fa fa-comments"></i>
                            </label>

                          </label>
                </div>

              </div>
              <div class="row">
                <div class="col-md-3">
<h6><input type="radio" name="combo" value="1" id="chtrabajador" required><small> Soy trabajador.</small></h6>
                </div>
                <div class="col-md-3">
<h6><input type="radio" name="combo" value="2" id="chempleador" required><small> Soy empleador.</small></h6>
                </div>
              </div>
                <br/><br/>
              </div>
              <div class="panel-footer">
                <center>
                <button type="submit" class="button btn-primary" id="enviarcomet"> @lang('admin.btncalificarca') </button>
                 <button type="button" class="button btn-primary" onclick="cerrarcali();"> @lang('admin.btncerrarca') </button>
                </center>
              </div>

          </form>

          </div>
        </div>

  <!-- FIN DEL MODAL -->





  <section id="content"  class="animated fadeIn">


      @php
      $valorueda2 = 0;
      // $textorueda2 = "Ingrese Foto de Peril +20%";
      @endphp



    <div class="">
      <div class="row">
        <div class="col-md-8">
            <div class="media clearfix">


          <div class="media-left pr30">
            <form id="f_subir_imagen_2" name="f_subir_imagen_2" method="POST"  class="formarchivo2" enctype="multipart/form-data">
              {{ csrf_field() }}
              <?php $id = Auth::user()->id; ?>
              <input type="hidden" name="id_usuario_foto" value="{{$id}}">
              <?php
              if(Auth::user()->logo_empresa==null) {
                $mostrar='img/aquivatulogo.png';
              }else {
                $mostrar=Auth::user()->logo_empresa;
              }
              ?>




<li class="li" style="width: 150px;">
  <a class="link" href="#">
    <label for="file2">
    <i></i>
    </label>
        <img class="media-object mw150"  src="{{$mostrar}}" id="img" alt="..." width="165" height="165" style="border-style:dotted;border-width:5px;">
  </a>
  <br/><br/>
</li>



                    <br/><br/>


          <center ><label style="display: none" for="file2" class="upload-button"><i class="fa fa-cloud-upload" title="Cargar Imagen de Perfil" style="color: black"></i></label>
            <input id="file2" style="display: none;" name="archivo2" type="file" style="display:none" onchange="return fileValidation2()" title="Cargar Imagen de Perfil">
            <button  type="submit" class="upload-button2" id="guardaimagen" style="display:none;" title="Guardar Imagen"><i class="fa fa-check-square-o"> Guardar </i></buttton></center>
            </form>
          </div>



          <div class="media-body va-m" >
            <h2 class="media-heading" >{{ Auth::user()->nombre_empresa }}</h2>
            <p class="lead" >{{ Auth::user()->descripcion }}</p>
            <b><p  style="border: solid 2px green;width: 200px;text-align: center;font-size: 12px">@lang('traduccion2.txtrequepublicindex') <br/> {{ $proyecto }}</p></b>
          </div>
        </div>
        <br/>
        </div>


        <div class="col-md-4">

          <div class="row mb10" id="spy7">


                      @php
                        $empresa = Auth::user()->nombre_empresa;
                        $razon_social = Auth::user()->razon_social;
                        $telefono_emp = Auth::user()->telefono_empresa;
                        $pais_empresa = Auth::user()->pais_empresa;
                        $nit = Auth::user()->nit;
                        $direccion_empresa = Auth::user()->direccion_empresa;
                        $descripcion_empresa = Auth::user()->descripcion;
                        $logo_empresa = Auth::user()->logo_empresa;
                      @endphp

                      <?php



                      if($logo_empresa!=null)
                      {
                        $valorueda2= ($valorueda2+20)."/"."Ingresa los campos obligatorios + 50%.";

                      }

                      if($razon_social!=null && $telefono_emp!=null && $pais_empresa!=null && $descripcion_empresa!=null)
                      {
                        $valorueda2=($valorueda2+50)."/"."Ingresa los campos no obligatorios + 15%.";
                      }

                      if($nit!=null)
                      {

                        if($logo_empresa!=null)
                        {
                          $valorueda2=($valorueda2+15)."/"."Ingresa los campos no obligatorios + 15%.";
                        }
                        else
                        {
                          $valorueda2=($valorueda2+15)."/"."Ingrese la  foto de Perfil de empresa +20%.";
                        }

                        //$valorueda2=($valorueda2+30)."/"."Ingresa los campos no obligatorios + 15%.";

                      }



                      if($direccion_empresa!=null)
                      {

                        if($nit!=null)
                        {
                          $valorueda2=($valorueda2+15)."/"."Felicades su perfil, se encuentra al 100%.";
                        }
                        else
                        {
                          $valorueda2=($valorueda2+15)."/"."Ingresa los campos no obligatorios + 15%.";
                        }

                          //$valorueda2=($valorueda2+0)."/"."Felicades su perfil, se encuentra al 100%.";

                      }



                      ?>






                    <div class="col-md-12 text-center" align="center">
                          <?php
                            $partir = explode("/", $valorueda2);
                            $llevar = $partir[0];
                            $llevar2 = $partir[1];
                          ?>
                          <center><div class="progress-bar1 position" align="center" id="rueda2" data-percent="{{ $llevar }}" data-duration="2000" data-color="#EBEBEB,blue"></div></center>
                          <?php
                            if($llevar2 == null || $llevar2 == '')
                            {
                              $llevar2 = "Ingrese la  foto de Perfil de empresa +20%.";
                            }
                            else
                            {
                              $llevar2= $llevar2;
                            }
                           ?>
                          <i>{{ $llevar2 }}</i>
                    </div>














            </div>
        </div>



      </div>
    </div>


 @if($mensaje = Session::get('mensaje'))
<div class="alert alert-micro alert-primary light alert-dismissable">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
  <i class="fa fa-cubes pr10 hidden"></i>
    @php $correousu = Auth::user()->correo;  @endphp
  <strong>Bienvenido!</strong> {{$mensaje}} &emsp;&emsp; | &emsp;&emsp; <a href="javascript:void(0);" id="reenviar" data-correo="{{$correousu}}" onclick="reenviar(this);"  style="color: white" >Click aqui, de no haberle llegado un correo.</a>
</div>
@endif

@if($status = Session::get('status'))
<div class="alert alert-micro alert-border-left alert-success alert-dismissable">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
  <i class="fa fa-check pr10"></i>

  <strong> {{ $status }} </strong>

</div>
@endif

<br/><br/>

    <div class="row" >
      <div class="col-md-12">
        <div class="panel">
          <div class="">
            <div class="tab-content pn br-n">
              <div id="tab2_1" class="tab-pane ">
                <div class="row">
                  <div class="col-md-9">
                    <div class="admin-form theme-primary">
                      <div class=" panel heading-border panel-primary">
                        <div class="panel-body bg-light">


                           <div class="row">
                     <div class="col-md-1"></div>
                      <div class="col-md-10">
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
                                      <button type="button" id="sprof" class="btn btn-dark btn-block">@lang('admin.btnañadirprofesion')</button>
                                    </div>
                                  </div>

                                  <br/>
                                <form id="form-profesional">
                                      <h3 style="margin: 0px; padding-bottom: 10px  ">Habilidades:</h3>
                                 <div class="col-md-5">
                                      <div class="section">

                                      <label class="field select">
                                        <select id="cbocategoria" required>
                                          <option value="">@lang('admin.placeholcboseleccionecateg')</option>
                                      @foreach($categoria as $value)
                                        <option value="{{ $value->id_category }}">{{ $value->description }}</option>
                                      @endforeach
                                        </select>
                                        <i class="arrow double"></i>
                                      </label>
                                    </div>
                                  </div>


                                   <div class="col-md-5">
                                      <div class="section">
                                      <label class="field select">
                                        <select id="cbohabilidades" required>
                                          <option value="">@lang('admin.placeholcboselechabili')</option>
                                        </select>
                                        <i class="arrow double"></i>
                                      </label>
                                    </div>
                                </div>

                                  <div class="col-md-2">
                                    <button type="submit"  class="btn btn-dark btn-block">@lang('admin.btnañadirprofesion')</button><br>
                                  </div>
                                  </form>

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
                                    <div class="col-sm-6">
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







                                  <div class="col-md-6">
                                    @php  $correo = Auth::user()->correo  @endphp
                                    <input type="hidden" value="{{ $correo }}" id="h_correo">
                                    @if($status = Session::get('status'))
                                    <button type="button" class="btn btn-lg btn-primary btn-block" disabled> {{ $status }}</button>
                                    @endif
                                    @php  $estadocorreo= Auth::user()->email_verified_at; @endphp

                                    @if($estadocorreo !=1)
                                      <button type='button' class='btn btn-lg btn-primary btn-block' id='validar_correo'>@lang('admin.btnvalidarcorreoelect')</button>
                                    @else
                                      <button hidden>{{ $valorueda +=20}} {{ $color_rueda = "#EBEBEB,#F9BF30" }} {{$textorueda="Ingrese Experiencia Laboral +20%"}}</button>

                                    @endif

                                    @if(count($experiencia)!=0)
                                        <button hidden> {{ $valorueda +=20 }} {{ $color_rueda = "#EBEBEB,#96F815"}} {{$textorueda = "Ingrese Educacion/Formacion +20%"}}</button>
                                     @endif


                                       @if(count($estudios)!=0)
                                        <button hidden> {{ $valorueda +=20 }} {{ $color_rueda = "#EBEBEB,#22B905"}} {{$textorueda = " "}}</button>
                                     @endif





                                  </div>

                                </div>

                          </div>
                      </div>
                      <div class="col-md-1"></div>
                   </div>













                </div>


              </div>


            </div>
                      </div>

        </div>


         </row>

      </div>

{{-- <div class="alert alert-micro alert-primary light alert-dismissable"> --}}
  {{-- <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> --}}
  {{-- <i class="fa fa-cubes pr10 hidden"></i> --}}

  <?php
  /*
    $contenido = "";

    if($razon_social!=null && $telefono_emp!=null && $pais_empresa!=null && $descripcion_empresa!=null)
    {
      $contenido = "Tu perfil se encuentra al 50%. | Ingresa los campos no obligatorios + 30%.";

      if($nit!=null && $direccion_empresa!=null)
    {
      $contenido = "Tu perfil se encuentra al 80%. | Ingresa foto de empresa + 20%.";
      if($logo_empresa!=null)
      {
        $contenido = "Felicitaciones tu perfil se encuentra al 100 %";
      }
      else
      {
        $contenido = "Tu perfil se encuentra al 80%. | Ingresa foto de empresa + 20%.";
      }
    }
    else
    {
       $contenido = "Tu perfil se encuentra al 50%. | Ingresa los campos no obligatorios + 30%.";
    }
    }
    else
    {
      $contenido = "Tu perfil se encuentra al 0%. | Ingresa los campos obligatorios + 50%.";
    }

*/
  ?>
  {{-- <a href="javascript:void(0);"  data-correo=""  style="color: white" >{{ $contenido }}</a> --}}
{{-- </div> --}}
      <div id="tab2_2" class="tab-pane active">

       <div class="row">

        <div class="col-md-9">

          <div class="admin-form theme-primary">
            <div class=" panel heading-border panel-primary">

                <div class="panel-body bg-light">
                <form id="juridico" method="POST" enctype="multipart/form-data">
                    <div class="section-divider mv40" id="spy2">
                      <span>@lang('traduccion2.txttitlepersonemp2')</span>
                    </div>
                    <div class="row">
                        <div  class="row">
                            <div class="col-md-1">

                            </div>
                            <div class="col-md-6">
                                <p style="color:red;">@lang('admin.txtcamposobligatorios')  </p>
                            </div>
                        </div>
                      <div class="col-md-1">
                        <p style="color: red;float:right;font-size: 30px"> *</p>
                      </div>


                        <div class="col-md-10">
                        <div class="section">
                          <label class="field prepend-icon">
                             <input type="text" name="razonse" id="razonse" class="gui-input" placeholder="Nombre Empresa/Empleador(a) " value="{{ Auth::user()->nombre_empresa }}" required>

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
                         <p style="color: red;float:right;font-size: 30px"> *</p>
                      </div>
                        <div class="col-md-4">
                         <div class="section">
                          <label class="field prepend-icon">
                            <input type="text" name="telefonoe" id="telefonoe" class="gui-input" placeholder="@lang('admin.placeholtelefonodt') " value="{{ Auth::user()->telefono_empresa }}" required>

                            <label for="tooltip3" class="field-icon">
                              <i class="fa fa-phone"></i>
                            </label>
                          </label>
                        </div>
                      </div>
                      <div class="col-md-1">
                        <p style="color: red;float:right;font-size: 30px"> *</p>
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
                            <input type="text" name="nit" id="nit" class="gui-input" placeholder="RUC,SIN,NIT,CUIT,CPF,RFC,RIF,RUT,RTU,RNC,TIN,RTN,VAT,CIF,NITE..." value="{{ Auth::user()->nit }}">
                            <b class="tooltip tip-right-bottom"></b>
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
                         <p style="color: red;float:right;font-size: 30px"> *</p>
                      </div>
                      <div class="col-md-10">
                        <div class="section">
                          <label class="field prepend-icon">
                            <textarea class="gui-textarea" id="descripcione" name="descripcione" placeholder="Slogan de la persona o Empresa " required>{{ trim(Auth::user()->descripcion) }}</textarea>
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

              <img class="media-object mw150" src="{{$logo_empresa}}" id="img3" alt="... logo empresa ..." width="100" height="100" style="border-style:dotted;border-width:5px;display:none;">
                  &emsp;&emsp;&emsp;&emsp;

           <label for="file2" class="upload-button" style="display:none;"><i class="fa fa-cloud-upload" title="Cargar Imagen de Perfil" style="color: black;"> Subir Imagen</i></label>
            <input id="file2" name="archivo2" type="file" style="display:none;" onchange="return fileValidation2()" title="Cargar Imagen de Perfil">
                      </div>
                      <div class="col-md-1">

                      </div>




                        <div class="col-xs-12" style="margin:0px auto;" align="center" id="beno">
                        <br><button type="submit" class="btn btn-lg btn-primary visit" > GUARDAR </button> <button type="button" class="btn btn-lg btn-primary visit" id="enviar_datose" > ENVIAR DATOS </button>
                        </div>
  <div class="col-md-12" style="display: none;" id="hc"><center><img src="{{ 'img/cargando.gif' }}" width="150" height="150"></center></div>


                    </div>




     </form>

                </div>

              </div>
            </div>
</div>


            <div class="col-md-3">

                 <div class="panel">
                <div class="panel-heading text-center">
                  <span class="panel-title fw600 text-info" style="font-size: 15px;">@lang('traduccion2.txtpuntuacioncomoepl2')</span>
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
                  <span class="panel-title fw600 text-info" style="font-size: 15px;">@lang('admin.txtcalificaciones')</span>
                </div>
                <div class="panel-body">
                    <center>
                      <span class="fs13 text-left ml10 ">
                      @php $usuactual = Auth::user()->nombre_empresa @endphp
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
            <button class="zocial icon facebook compartir-f" >Sign in with Facebook</button>
          </div>
          <div class="bs-component ib">
            <button class="zocial icon twitter compartir-t">Sign in with Twitter</button>
          </div>

          <div class="bs-component ib">
            <button class="zocial icon linkedin compartir-l">Sign in with LinkedIn</button>
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
