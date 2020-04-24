@extends('layouts.admin2')
@section('css')
  <link rel="stylesheet" type="text/css" href="datatable/dataTables.bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="datatable/responsive.bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="vendor/plugins/tagmanager/tagmanager.css">
  <link rel="stylesheet" type="text/css" href="assets/fonts/icomoon/icomoon.css">
  <link rel="stylesheet" type="text/css" href="assets/fonts/glyphicons-pro/glyphicons-pro.css">
  <link rel="stylesheet" type="text/css" href="css/wizard.css">

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
                                        margin-left: 110px;
                                        padding: 10px;
                                        width: 330px;
                                        color: #335500;
                                        font-weight: normal;
                                        background: #e5e5e5;
                                        border: 1px solid #666; 
                                      }
  </style>

  <style type="text/css">

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

  table {

  overflow-x:auto;
}
table td {
  word-wrap: break-word;
  max-width: 400px;
}
#datatable2 td {
  white-space:inherit;
}
    .div-center{
    padding:20px;padding-left: 5%;padding-right:  5%;
  }
  .texto{text-align: left;  margin-bottom: 30px; text-align: justify;font-size: 15px}

  .div-m{
    border-radius: 30px;
    padding-bottom: 10px;    
  }
  
  .demo-grid:hover{
    background-color: #5bc0de;
    color:white;
  }
  .demo-grid{
    padding-top: 5px;
    width: 100%;
    transition: 0.6s;
    background-color: white;
    height: 100px;

  }
  .active{
    background-color: #5bc0de;
    color: white;
  }
  .datos{
    padding: 12px
  }
  </style>
@endsection

@section('contenido')

@section('js')
  <script type="text/javascript" src="{{ asset('js/jquery.expander.js') }}"></script>
<!-- llamamos la librería jquery  desde sus cdn Hosted--> 
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script> --}}
<!-- llamamos al jquery.expander.js mira sus archivos de descarga-->
{{-- <script src="jquery.expander.js"></script> --}}
<!--codigo javascript para su configuración o efecto de un solo llamado por defecto-->
<script type="text/javascript">
  $(document).ready(function() {
      // use esta configuracion simple para valores por defecto
      //$('div.expandable p').expander();
      // *** O ***
      // configure de la siguiente manera
      $('div.expandable p').expander({
      slicePoint: 65,// si eliminamos por defecto es 100 caracteres
      expandText: '[...]', // por defecto es 'read more...'
      collapseTimer: 5000, // tiempo de para cerrar la expanción si desea poner 0 para no cerrar
      userCollapseText: '[^]' // por defecto es 'read less...'
    });
  });
</script>

<script type="text/javascript" src="datatable/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="datatable/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="datatable/dataTables.responsive.min.js"></script>
<script type="text/javascript" src="js/laborajs/proyectos.js"></script>
<script src="vendor/plugins/tagmanager/tagmanager.js"></script>
<script src="js/wizard/wizard-custom.js"></script>
<script type="text/javascript" src="{{ asset('assets/js/bootbox/bootbox.min.js') }}"></script>
  <script src="{{ asset('vendor/plugins/moment/moment.min.js')}}"></script>

  <script src="{{ asset('vendor/plugins/moment/moment.js')}}"></script>


      <script type="text/javascript">







   jQuery(function ($) {
            $('#simplewizardinwidget').wizard();
            $('#simplewizard').wizard();
            $('#tabbedwizard').wizard().on('finished', function (e) {

                Notify('Thank You! All of your information saved successfully.', 'bottom-right', '5000', 'blue', 'fa-check', true);
            });
            $('#WiredWizard').wizard().on('finished',function(e){
              if ($("input[name=hidden-undefined]").val()!="") {
                     update();
              }else{
                alert("Complete los requerimientos");
              }                 
            });
            $('#WiredWizard').wizard().on('changed',function(e){
              var element =$(e.target).children('ul').children('.active').children('.step');
              var p =element.html();
              var div =p-1;
              // console.log(p +"--"+ div);  
               var d = validar(div);
               //console.log(d+ "--"+p);
              if (p==1) {$(".botones").show();}

              if (d==true) {
                if (p==2) {
                  @if (Auth::guest()) 
                   $(".botones").hide();
                  @endif
                }
              }
              // $(".div-center").hide();
              // $(".div-"+element.html()).show();

            });

          $(".demo-grid").click(function(){

          $(".demo-grid").removeClass('active');
          $(this).addClass('active');
          $("#next").click();  
        })

          $("#regresar").on('click',function(){
            $(".btn-prev").click();
          });

        });

function ponleFocustitulo(){
    document.getElementById("titulo").focus();
}

function ponleFocusdescripcion()
{
   document.getElementById("descripcion").focus();
}

function soloNumeros(e)
{
var keynum = window.event ? window.event.keyCode : e.which;
if ((keynum == 8) || (keynum == 46))
return true;
return /\d/.test(String.fromCharCode(keynum));
}




        //DESDE AQUI
  function validar(div){
  if (div==0) {
    mostrar(div);
  }
  if (div==1) {
    if ($("#titulo").val().trim()!="" && $("#descripcion").val().trim()!=""){
        mostrar(div);
    }else{

      if($("#titulo").val().trim()=="")
      {
         ponleFocustitulo();
        
      }

      if($("#descripcion").val().trim()=="")
      {
        ponleFocusdescripcion();
      }

        mensaje('Complete los campos','danger');
        error();
      return false;




    }
  }
   if (div==2) {
    if ($("#descripcion").val().trim()!=""){
        // alert("siga");
        mostrar(div);
         $(".tags").html('');
      mostrar(div);
      // console.log($(".demo-grid.active").attr('id')+"------1");
      var array = [];
      $.ajax({
        url:'{{route("llena_habilidad")}}',
        type:'POST',
        dataType:'json',
        data:{codcat:$(".demo-grid.active").attr('id')},
        success:function(response)
        {
          $("#input-co").html('<input type="text" id="tagmanager" class="form-control tm-input">');
          $.each(response.habilidades,function(key,value) {
            array.push(value.ability);
          });
          // console.log(array);
          $(".tm-input").tagsManager({
          tagsContainer: '.tags',
          prefilled:array,
          tagClass: 'tm-tag-info',
          maxTags: 11,
        });

        }
      });

            $.ajax({
        url:'{{ route('pasaayuda') }}',
        type:'POST',
        dataType:'json',
        data:{codcat:$(".demo-grid.active").attr('id')},
        success:function(response)
        {
          $.each(response.ayuda,function(key,value) {
            // console.log(value.txtcomplejida);
            var pizza = value.txtcomplejidad;
            var porciones = pizza.split('\n');

            $("#primerpunto").html(porciones[0]);
            $("#segundopunto").html(porciones[1]);
            $("#tercerpunto").html(porciones[2]);
            $("#cuartopunto").html(porciones[3]);


          });
        }
      });

    }else{
         mensaje('Complete el campo descripcion','danger');
      error()
      return false;
    }
  }

  if (div==5) {
    var a ={};
    a.tipo_proyecto=$("#tipo_proyecto").val();
    a.complejidad=$("#complejidad").val();
    a.tiempo=$("#tiempo").val();
    a.tipo_tiempo=$("#tipo_tiempo").val();
    if (verificar(a)) {
      if ($("#propio_presupuesto").val()=="" && $("#aproximado").val()=="") {
              mensaje('Complete los datos','danger');
        error();
        return false;
      }else{
          $(".tags").html('');
      mostrar(div);
      }
    }else{
       mensaje('Complete los datos','danger');
      error();
      return false;
    }
  }


      return true;
  }

        function activar(){
         
          $("#propio_presupuesto").val("");
          $("#propio_presupuesto").prop('disabled', true);
           $("#presupuesto").show();
          $("#complejidad").focus();
        }

        function desactivar(){
          $("#complejidad").val("");
          $("#aproximado").val("");
          $("#presupuesto").hide();
          $("#propio_presupuesto").prop('disabled', false);
          $("#propio_presupuesto").focus();
        }


function update()
{
  var codigo = $(".btn-next").attr('data-id');
  var categoria = null;
  var cd = $(".demo-grid.active").attr('id');
  if(cd == null)
  {
    categoria = $("#o_categoria").val();
  }
  else
  {
    categoria = cd;
  }


  var titulo              = $("#titulo").val(); //titulo
  var descripcion         = $("#descripcion").val(); //descripcion
  var forma_trabajo       = $("#forma_trabajo").val(); //-- va null
  var tipo_trabajo        = $("#tipo_trabajo").val(); //-- va null
  var tipo_proyecto       = $("#tipo_proyecto").val(); // va null
  var complejidad         = $("#complejidad").val(); //complejidad
  var tipo_tiempo         = $("#tipo_tiempo").val(); //tipo_tiempo
  var tiempo              = $("#tiempo").val(); //tiempo 
  var aproximado          = $("#aproximado").val(); // aproximado
  var propio_presupuesto  = $("#propio_presupuesto").val(); //propio_presupuesto
  var conocimientos = conocimientos=$("input[name=hidden-undefined]").val();




  $.ajax({
        url:'updateproyect',
        type:"POST",
        dataType:'JSON',
        data:{"titulo":titulo,
              "descripcion":descripcion,
              "categoria":categoria,
              "forma_trabajo":forma_trabajo,
              "tipo_trabajo":tipo_trabajo,
              "tipo_proyecto":tipo_proyecto,
              "complejidad":complejidad,
              "tiempo":tiempo,
              "tipo_tiempo":tipo_tiempo,
              "aproximado":aproximado,
              "propio_presupuesto":propio_presupuesto,
              "conocimientos":conocimientos,
              "codigo":codigo},



    beforeSend:function(){

       $(".loader").show();


       },



        success:function(response)
        {

          $(".loader").hide();

          var estado = "";
          if(response.dato[0].estado == 1)
          {
            estado = "<img src='{{ asset('img/publicado.png') }}' alt='publicado' title='PUBLICADO' >";
          }

          if(response.dato[0].estado == 2)
          {
            estado = "<img src='{{ asset('img/trabajando.png') }}' alt='trabajando' title='TRABAJANDO' >";
          }

          if(response.dato[0].estado == 3)
          {
            estado = "<img src='{{ asset('img/evaluacion.png') }}' alt='evaluando' title='EVALUACION' >";
          }






          var temp = tabla.row($('#tr_'+codigo).closest('tr')).data();
          temp[0] = response.dato[0].titulo;
          temp[1] = '<div class="expandable">'+'<p>'+ response.dato[0].descripcion+'</p>'+'</div>';
          temp[2] = estado;
            var original = response.dato[0].fecha_publicacion;
            var newfecha = moment(original).format('DD/MM/YYYY');
          temp[3] = newfecha;
          temp[4] = ' <button type="button" class="btn btn-rounded btn-warning" data-id="'+response.dato[0].id+'"  title="Modificar Proyecto" onclick="modalupdate(this)">'+
                    '<i class="fa fa-pencil"></i>'+
                    '</button>'+
                    '&nbsp;'+
                    '<button type="button" class="btn btn-rounded btn-danger" title="Eliminar Proyecto" data-id="'+response.dato[0].id+'" data-token="{{ csrf_token() }}" onclick="eliminar(this)">'+
                    '<i class="fa fa-trash"></i>'+
                    '</button>'+
                    '&nbsp;'+
                    '<a href="aspirantes/'+response.dato[0].id+'"><button type="button" class="btn btn-rounded btn-info"  title="Ver Aplicados">'+
                    '<i class="fa fa-user"></i>'+
                    '</button></a>';

          tabla.row($('#tr_'+codigo).closest('tr')).data(temp).invalidate();
                $('div.expandable p').expander({
      slicePoint: 65,// si eliminamos por defecto es 100 caracteres
      expandText: '[...]', // por defecto es 'read more...'
      collapseTimer: 5000, // tiempo de para cerrar la expanción si desea poner 0 para no cerrar
      userCollapseText: '[^]' // por defecto es 'read less...'
    });

        }
  });    


  $.magnificPopup.close();


}



   
</script>
@endsection


       {{-- ///////////////////MODAL UPDATE////////////////////////// --}}
    <div id="espere" class="popup-basic popup-md mfp-with-anim mfp-hide">
      <div class="panel panel-system">

        <div class="panel-body" align="center">
          
          <img src="{{ asset('img/espere.gif') }}" width="300" height="300" />       

        </div>
        
      </div>
    </div>

 <div class="tray tray-center" style="padding-left: 10px">
          <div class=" mw1200 center-block  animated fadeIn" style="padding-top: 30px;">
      
          <div class="admin-form theme-primary">

              <div class="panel heading-border panel-primary"> 
                <div class="panel-body bg-light">
                  <form method="post" action="" id="form-ui">
                    <div class="section-divider mb40" id="spy1">
                      <span style="font-size: 25px"> @lang('traduccion1.sub1proyectos') </span>
                      
                                      <span style="float: right;">
                                           <div class="btn-group dropright">
                                            <a href="javascript:void(0);" style="" class="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-question-circle" style="font-size: 30px" data-original-title="" title=""></i></a>
                                              <ul class="dropdown-menu" style="left:0; margin-left: 100%; margin-top:1px; background: #fff; border: 1px solid #CDCDCD; width:250px;">
                                                <div style="margin: 0px; padding:10px 0px; background: #37bc9b; text-align: center;">
                                                    <h5 style="color:white; margin:0px auto;"> .: @lang('admin.ayudatitle') :. </h5>   
                                                </div>
                                                <div style="margin: 10px; text-align: justify;">@lang('traduccion1.sub2proyectos')
                                                   
                                                </div>
                                              </ul>
                                           </div>
                                      </span> 
                    </div>
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
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        {{-- <i class="fa fa-check pr10"></i>             --}}
                              {{ $mensaje }}
                    </div>
                    @endif

            <div class="col-md-12">
              <div class="panel panel-visible" id="spy2">
                <div class="panel-heading" style="padding: 0px;">
                  <div class="panel-title hidden-xs" style="font-size: 20px;">
                    &nbsp;<span class="glyphicon glyphicon-tasks"></span>@lang('traduccion1.sub3proyectos')</div>
                </div>
                <div class="panel-body pn">
                  <table id="datatable2" class="table table-bordered nowrap " style="width:100%">
                    <thead>
                      <tr>
                        <th>@lang('traduccion1.sub4proyectos')</th>
                        <th>@lang('admin.tabledescripcionpro')</th>
                        <th>@lang('admin.tableestadopro')</th>
                        <th>@lang('traduccion1.sub5proyectos')</th>
                        <th>@lang('admin.tableaccionespro')</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($proyect as $value)
                      <?php 
                      $color = ""; 
                      if ($value->urgente <> null) {
                        $color = "yellow";
                      }
                      ?> 
                      <tr id="tr_{{ $value->id }}" style="background-color: {{ $color }}">
                        <td>{{ $value->titulo }}</td>
                        <td>
<!--llamamos la clase expandable adicional podemos darle mas estilo pero ese no es el foco del tutorial-->
<div class="expandable">
<!-- Nuestro parrafo a mostrar-->
<p>{{ $value->descripcion }}</p>
</div>
</td>
                        <td>
                          <center>
                          @switch($value->estado)
                            @case(1)
                              <div class="popup1">
                                <a  style="text-decoration: none;">
                                  <span>
                                    @lang('traduccion1.sub6proyectos')
                                  </span>
                                <img src="{{ asset('img/publicado.png') }}" alt="publicado"  align="center">
                                 <h6><small>@lang('traduccion1.sub7proyectos')</small></h6>
                                </a>
                              </div>



                                @break
                            @case(2)
                              <div class="popup1">
                                <a  style="text-decoration: none;">
                                  <span>
                                    @lang('traduccion1.sub8proyectos')
                                  </span>
                                <img src="{{ asset('img/publicado.png') }}" alt="publicado"  align="center">
                                <h6><small>@lang('traduccion1.sub9proyectos')</small></h6>
                                </a>
                              </div>                            

                                @break
                            @case(3)
                              <div class="popup1">
                                <a style="text-decoration: none;">
                                  <span>
                                    @lang('traduccion1.sub10proyectos')
                                  </span>
                                <img src="{{ asset('img/evaluacion.png') }}" alt="evaluando"  align="center">
                                 <h6><small>@lang('traduccion1.sub11proyectos')</small></h6>


                                </a>
                              </div>                            

                                @break    
                            @case(4)
                              <div class="popup1">
                                <a style="text-decoration: none;">
                                  <span>
                                    @lang('traduccion1.sub12proyectos')
                                  </span>

                                  <img src="{{ asset('img/trabajando.png') }}" alt="trabajando"  align="center">
                                <h6><small>@lang('traduccion1.sub13proyectos')</small></h6>                                  
                                </a>
                              </div>

                                @break
                            @case(5)
                              <div class="popup1">
                                <a style="text-decoration: none;">
                                  <span>
                                    @lang('traduccion1.sub14proyectos') 
                                  </span>
                                 <img src="{{ asset('img/finalizado_p.png') }}" alt="finalizado" align="center">
                                <h6><small>@lang('traduccion1.sub15proyectos')</small></h6>                                   
                                </a>
                              </div>

                                @break

                            @default
                              @lang('traduccion1.sub16proyectos')
                        @endswitch
                        
                        </center>
                          </td>
                               <?php

                              $fecha = $value->fecha_publicacion;
                              
                              $newfecha = date("d/m/Y",strtotime($fecha));

                              ?>


                        <td>{{ $newfecha }}</td>  

                            <td width="15%"> 
                              <style type="text/css">
                              #popup a span {
                                        display: none;
                                            }

                              #popup a:hover span {
                                        display: block;
                                        position: absolute;
                                        z-index: 3;
                                     /*   top: 0px;
                                        left: 170px;                                      
                                        margin: 0px;*/
                                        padding: 10px;
                                        width: 320px;
                                        color: #335500;
                                        font-weight: normal;
                                        background: #e5e5e5;
                                        border: 1px solid #666;
                                      }
                            </style>    
                        <div id="popup">
                         <button type="button" class="btn btn-rounded btn-warning" data-id="{{ $value->id }}"  title='Modificar Proyecto' onclick="modalupdate(this)">
                            <i class="fa fa-pencil"></i>
                        </button>

                        
                        <button type="button" class="btn btn-rounded btn-danger" title='Eliminar Proyecto' data-id="{{ $value->id }}" data-token="{{ csrf_token() }}" onclick="eliminar(this)">
                            <i class="fa fa-trash"></i>
                        </button>
                        
                        <a href="{{ url('aspirantes',$value->id)}}">
                              <span>
                            {{-- Click Aquí para ver estados del proyecto y añadir acuerdos. --}}
                           @lang('traduccion1.sub17proyectos') 
                             </span>
                            <button type="button" class="btn btn-rounded btn-info"  >
                            <i class="fa fa-user"></i>
                            </button>
                        </a>
                        
                        </div>
                        </td>
                      </tr>
                      
                    @endforeach
                      
                 
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
    


                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>


<div class="loader" style="display: none"></div>


<div id="modal-text" class="popup-basic p25 mfp-with-anim mfp-hide" align="center">

     @lang('traduccion1.sub18proyectos') ...

</div>




          {{-- ///////////////////MODAL UPDATE////////////////////////// --}}
    <div id="update" class="popup-basic popup-xl mfp-with-anim mfp-hide">
      <div class="panel panel-system">
        <div class="panel-heading">
          <span class="panel-title">
            <i id="titulo2" style="color: black">@lang('traduccion1.sub19proyectos')</i></span>
        </div>

        <div class="panel-body">
               


          <div id="WiredWizard" class="wizard wizard-wired publ" data-target="#WiredWizardsteps" style="width: 100%">
            <ul class="steps">
              <li class="active" id="inicio"><span class="step">1</span><span class="title">@lang('admin.paso1')</span><span class="chevron"></span></li>
              <li data-target="#wiredstep2"><span class="step">2</span><span class="title">@lang('admin.paso2')</span> <span class="chevron"></span></li>
              <li data-target="#wiredstep3"><span class="step">3</span><span class="title">@lang('admin.paso3')</span> <span class="chevron"></span></li>
            </ul>
          </div>

          <div class="div-center div-1" >
            <h3 style="text-align: left">@lang('admin.titulop')</h3>
            <p><h3>@lang('traduccion1.sub20proyectos')</h3></p>
            <p class="texto">@lang('admin.mientrasmas')<br>@lang('admin.eltituloayuda')</p>
            <p><input type="text" class="form-control" id="titulo" value="" name="titulo" placeholder="@lang('admin.placeholderes')"></p>

            <h3 style="text-align: left">@lang('admin.descripptau')</h3>
            <p><h3>@lang('traduccion1.sub21proyectos')</h3></p>
            <p class="texto">@lang('admin.txtespecificatuau')</p>
            <p><textarea class="form-control" style="height: 100px" id="descripcion"></textarea></p> 
                       
          </div>

          <div class="div-center div-2" style="display: none;">

             <h3 style="text-align: left">@lang('admin.categoriaptau')</h3>
              <p class="texto">@lang('traduccion1.sub22proyectos')</p>
 
            <div style="background-color: #DBDBDB;border-radius: 20px;width:100%;font-size: 14px;padding-left: 10px;padding-right: 10px;">
              <br>
              <div class="row mb5">
                <div class="col-sm-3 div-m" title="
                • Aplicaciones de escritorio
                • Ecommerce
                • Videojuegos
                • QA & Testing
                • Scripts & utilitarios
                • Apps web y moviles
                ">
                  <div class="demo-grid" style="border-radius: 20px;" id="1"><div class="datos"><center><i class="fa-3x fa fa-code"></i><br>@lang('admin.btncatopc1')</center></div>
                  </div>
                </div>

              <div class="col-sm-3 div-m" title="
              • Animaciones
              • Producción de audio y video
              • Diseño gráfico
              • Ilustraciones
              • Diseño de logos & Branding
              • fotografía
              • Presentaciones
              • Canto, impostación y afinamiento de voz
              • Composición de melodías
              • Patrones de ropa, carteras, moda.
              • Otros.
              ">
              <div class="demo-grid" style="border-radius: 20px;" id="2"><div class="datos"> <center><i class="fa-3x fa fa-pencil"></i><br>@lang('admin.btncatopc2')</center></div>
                </div>
              </div>
                
                <div class="col-sm-3 div-m" title="
                • Networking
                • MIddleware
                • Database Administration
                • Virtualization
                • Provissioning and storage
                • Software  ERP / CRM 
                • Seguridad de la información
                • System Administration, Linux, unix, windows
                • Bigdata specialist
                • Apache hadoop
                • Otros.
                ">
                <div class="demo-grid" style="border-radius: 20px" id="3"><div class="datos"><center><i class="fa-3x fa fa-database"></i><br>@lang('admin.btncatopc3')</center></div>
                  </div>
                </div>
                
                <div class="col-sm-3 div-m" title="
                • Artículos, blogs y contenido web
                • Resumenes, monografías, trabajos de investigación
                • Creación de textos, cuentos, fábulas,etc
                • Revisión de textos académicos
                • Transcripción de audios
                • Escritura técnica
                ">
                  <div class="demo-grid" style="border-radius: 20px" id="4"><div class="datos"><center><i class="fa-3x fa fa-file icon-cat"></i><br>@lang('admin.btncatopc4')<br></center></div>
                    </div>
                  </div>
              </div>
          
              <div class="row mb5">
                  <div class="col-sm-3 div-m" title="
                  • Traducción de textos en general desde y hacia cualquier idioma
                  • Traducción legal
                  • Traducción médica
                  • Traducción técnica
                  ">
                  <div class="demo-grid" style="border-radius: 20px" id="5"><div class="datos"><center><i class="fa-3x fa fa-book"></i><br>@lang('admin.btncatopc5')</center></div>
                    </div>
                  </div>
              
                  <div class="col-sm-3 div-m" title="
                  • Modelamiento 3D & CAD
                  • Arquitectura
                  • Composiciones y recetas químicas
                  • Diseño de estructuras
                  • Costos y presupuestos
                  • Planos
                  • Diseño de interiores
                  ">
                  <div class="demo-grid" style="border-radius: 20px" id="6"><div class="datos"><center><i class="fa-3x imoon imoon-office"></i><br>@lang('admin.btncatopc6')</center></div>
                    </div>
                  </div>

                  <div class="col-sm-3 div-m" title="
                  • Asesoría en Contratos legales
                  • Asesoría en leyes corporativas
                  • Leyes de propiedad intelectual
                  • Delitos informáticos.
                  ">
                  <div class="demo-grid" style="border-radius: 20px" id="7"><div class="datos"><center><i class="fa-3x fa fa-legal"></i><br>@lang('admin.btncatopc7')</center></div>
                    </div>
                  </div>
              
                  <div class="col-sm-3 div-m" title="
                  • A/B Testing
                  • Data Visualization
                  • Data Extraction / ETL
                  • Data Mining & Management
                  • Machine Learning
                  • Quantitative Analysis
                  • Streaming data from social networks
                  ">
                  <div class="demo-grid" style="border-radius: 20px" id="8"><div class="datos"><center><i class="fa-3x glyphicons glyphicons-pie_chart"></i><br>@lang('admin.btncatopc8')</center></div>
                    </div>
                  </div>
              </div>

              <div class="row mb5">
                  <div class="col-sm-3 div-m" title="
                  • Data Entry
                  • Asistente virtual
                  • Project Management
                  • Web Research
                  • Servicio al cliente
                  ">
                  <div class="demo-grid" style="border-radius: 20px" id="9"><div class="datos"><center><i class="fa-3x fa fa-briefcase"></i><br>@lang('admin.btncatopc9')</center></div>
                    </div>
                  </div>
                  
                  <div class="col-sm-3 div-m" title="
                  • Servicios de consultoría 
                  • Libros contables virtuales
                  • Planificación financiera
                  • Asesoría financiera
                  ">
                  <div class="demo-grid" style="border-radius: 20px" id="10"><div class="datos"><center><i class="fa-3x fa fa-money"></i><br>@lang('admin.btncatopc10')</center></div>
                    </div>
                  </div>

                  <div class="col-sm-3 div-m" title="
                  • Selección de recursos humanos
                  • Test de personalidad
                  • Terapias online
                  • Coaching y liderazgo
                  • Asesoría para el éxito personal
                  ">
                  <div class="demo-grid" style="border-radius: 20px" id="11"><div class="datos"><center><i class="fa-3x imoon imoon-user3"></i><br>@lang('admin.btncatopc11')</center></div>
                    </div>
                  </div>

                  <div class="col-sm-3 div-m" title="
                  • Manejo /administración de  anuncios
                  • Gestión de Email & Marketing 
                  • Investigación de mercado/cliente
                  • Estrategias de marketing
                  • Relaciones públicas
                  • SEM - Search Engine Marketing
                  • SEO - Search Engine Optimization
                  • SMM - Social Media Marketing
                  • Telemarketing & Televentas
                  ">
                  <div class="demo-grid" style="border-radius: 20px" id="12"><div class="datos"><center><i class="fa-3x fa fa-shopping-cart"></i><br>@lang('admin.btncatopc12')</center></div>
                    </div>
                  </div>
              </div>

            </div>

              <div style="padding-top: 10px"><div class="col-md-1" style="padding-top: 5px">@lang('admin.txtotraptau')</div>
                <div class="col-md-11"><input type="text" class="form-control" name="o_categoria" id="o_categoria" placeholder="Escribe a que otra categoria pertenece tu requerimiento"></div><br><br>
              </div>



          </div>


          <div class="div-center div-3" style="display: none;">
 
            <div class="row">

        <div class="col-md-6">

          <h4>@lang('admin.txttiempoentregaau')</h4>
          <div class="row">


            <div class="col-sm-6">
                <input type="text" class="form-control" id="tiempo" placeholder="@lang('admin.placeholnuevotiempoentrega')" value="" onkeypress="return soloNumeros(event);">
                {{-- <h6><input type="checkbox" name="mostarch" id="mostarch"><small id="txtmostrar"> Deseo que el freelancer estime este tiempo. </small></h6> --}}
            <br/>

            </div>

            <div class="col-sm-6">  
              <select id="tipo_tiempo" class="form-control">
                  <option value="">@lang('admin.cboselenuentregaph')</option>
                  <option value="1">@lang('admin.cboentregaopc1')</option>
                  <option value="2" selected>@lang('admin.cboentregaopc2')</option>
                  <option value="3">@lang('admin.cboentregaopc3')</option>
                  <option value="4">@lang('admin.cboentregaopc4')</option>
              </select>
            </div>
          </div>          

        </div>
        </div>

        <div class="row">
                      <h3 style="text-align: left">@lang('admin.txtconocimientosreque')  &nbsp;&nbsp; <div class="btn-group dropright">
                                            <a href="#" style="" class="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-question-circle" style="font-size: 30px" data-original-title="" title=""></i></a>
                                              <ul class="dropdown-menu" style="left:0; margin-left: 100%; margin-top:-170px; background: #fff; border: 1px solid #CDCDCD; width:300px;">
                                                <div style="margin: 0px; padding:10px 0px; background: #37bc9b; text-align: center;">
                                                    <h5 style="color:white; margin:0px auto;"> .: @lang('admin.ayudatitle') :. </h5>   
                                                </div>
                                                <div style="margin: 10px;">
                                                   • @lang('admin.ayudaptb1') <br><br>
                                                   • @lang('admin.ayudaptb2')<br><br>
                                                   • @lang('admin.ayudaptb3') <br/><br/>
                                                   @lang('traduccion1.sub23proyectos')
                                                      
                                                </div>
                                              </ul>
                                        </div></h3>
          
        <center>
        <div id="input-co">

         <input type="text" id="tagmanager" class="form-control tm-input" style="width: 25%;"> 
     
         </div>

           <div class="tag-container tags" id="conocimientos"></div>
        </center>
        </div>

        <div class="row">
        <div class="col-md-6">
          <br/>
          <label>@lang('admin.placeholpresupuesto')</label>
          <input type="text" class="form-control" id="propio_presupuesto"  placeholder="@lang('admin.placeholpresupuesto2')">

        </div>


        <div class="col-md-6">
    
        </div>
        </div><br>
        <a href="javascript:activar()"><i> @lang('admin.txttengomipropresu')</i></a><br/><br/>
          <div class="row" style="display: none" id="presupuesto" >
            <div class="col-md-5">

          <h4>@lang('admin.txtcomplejidadau')</h4>
          <select class="form-control" id="complejidad">
            <option value="">@lang('admin.cbcomplejiopc1')</option>
                 <option value="1">@lang('admin.cbcomplejiopc2')</option>
                    <option value="2">@lang('admin.cbcomplejiopc3')</option>
                    <option value="3">@lang('admin.cbcomplejiopc4')</option>
                    <option value="4">@lang('admin.cbcomplejiopc5')</option>
          </select>
        


          <h4>@lang('admin.txtcalculoaproximaptau')</h4>
          <input type="text" id="aproximado" class="form-control" disabled value="">
          <br/>
            <div class="row">
              <a href="javascript:desactivar()"><i> @lang('traduccion1.sub24proyectos') </i></a>
            </div>
            </div>

            <div class="col-md-1" style="padding-top: 5px;">
                  <div>
                  <br/><br/>
                  <div class="btn-group dropright">
                      <a href="#" style="" class="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-question-circle" style="font-size: 30px" data-original-title="" title=""></i></a>
                      <ul class="dropdown-menu" style="left:0; margin-left: 100%; margin-top:-300px; background: #fff; border: 1px solid #CDCDCD; width:550px;">
                            <div style="margin: 0px; padding:10px 0px; background: #37bc9b; text-align: center;">
                                    <h5 style="color:white; margin:0px auto;"> .: @lang('admin.ayudatitle') :. </h5>   
                            </div>
                            <div style="margin: 10px; ">
                                <ul style="font-size: 11px">
                                  <li id="primerpunto"></li> <br/>
                                  <li id="segundopunto"></li> <br/>
                                  <li id="tercerpunto"></li> <br/>
                                  <li id="cuartopunto"></li>
                                </ul>

                            </div>
                      </ul>
                  </div>
                </div>  
            </div>
         

          </div>
          </div>



          <div class="div-center div-6" style="display: none;">
              <h3 style="text-align: left">@lang('admin.txtconocimientosreque')</h3>
              <br>
              <center>
               <input type="text" id="tagmanager" class="form-control tm-input">
               <div class="tag-container tags" id="conocimientos"></div>
              </center>
              <br>
          </div>       



          <div class="panel publ botones" style="border: none;">
              <a href="#" id="adquirir" class="btn btn-warning btn-sm"><b>@lang('traduccion1.sub25proyectos')</b></a>
            <div id="WiredWizard-actions"  style="float: right;">
              <a href="publicar_trabajo"></a>
              <button type="button" class="btn btn-primary btn-sm btn-prev"> <i class="fa fa-angle-left"></i> &nbsp;@lang('admin.btnatras1')</button>
              <button type="button" class="btn btn-primary btn-sm btn-next" id="next" data-id="" data-last="@lang('admin.btneditareditarproyec')">@lang('admin.btnsig1') &nbsp;<i class="fa fa-angle-right"></i></button>
            </div>
          </div>


        </div>
        
      </div>
    </div>

    {{-- ///////////////////FIN UPDATE////////////////////////// --}}


    









      
@endsection



