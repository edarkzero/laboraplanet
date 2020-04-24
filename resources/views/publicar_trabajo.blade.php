@extends('layouts.admin2')
@section('css')
  <link rel="stylesheet" type="text/css" href="{{asset('vendor/plugins/tagmanager/tagmanager.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('assets/fonts/icomoon/icomoon.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/fonts/glyphicons-pro/glyphicons-pro.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/wizard.css')}}">
<!-- NO INDEX -->
<meta name="googlebot" content="noindex, nofollow" />
<!-- FIN -->
<style type="text/css">
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

<?php

   $titulox = "";
   $descripcionx = "";
   $cateogriax = "";
   $forma_trabajox = "";
   $tipo_trabajox = "";
   $tipo_proyectox = "";
   $complejidadx = "";
   $cantidad_tiempox = "";
   $tiempo_entregax="";
   $aproximadox = "";

   if(isset($variable) && count($variable)>0 )
    {

    $titulox = $variable[0]['titulo'];
    $descripcionx = $variable[0]['descripcion'];
    $cateogriax = $variable[0]['categoria'];
    $forma_trabajox = $variable[0]['forma_pago'];
    $tipo_trabajox = $variable[0]['tipo_trabajo'];
    $tipo_proyectox = $variable[0]['tipo_proyecto'];
    $complejidadx = $variable[0]['complejidad'];
    $cantidad_tiempox = $variable[0]['cantidad_tiempo'];
    $tiempo_entregax = $variable[0]['tiempo_entrega'];
    $aproximadox = $variable[0]['calculo'];

    }

?>
@section('js')
  <script src="{{asset('vendor/plugins/tagmanager/tagmanager.js')}}"></script>

      <script src="{{asset('js/wizard/wizard-custom.js')}}"></script>
      <!-- Typeahead Plugin -->
    <script src="{{asset('vendor/plugins/typeahead/typeahead.bundle.min.js')}}"></script>
      <script src="{{asset('js/laborajs/publicar_proyecto.js')}}"></script>
      <script type="text/javascript">
          jQuery(function ($) {
            $('#simplewizardinwidget').wizard();
            $('#simplewizard').wizard();
            $('#tabbedwizard').wizard().on('finished', function (e) {

                Notify('Thank You! All of your information saved successfully.', 'bottom-right', '5000', 'blue', 'fa-check', true);
            });
            $('#WiredWizard').wizard().on('finished',function(e){
              if ($("input[name=hidden-undefined]").val()!="") {
                  if ($("#tiempo").val().trim()!="" && $("#tipo_tiempo").val()!="") {
                    guardar();
                    $(".publ").html("");
                  }else{

                    if($("#tiempo").val()=="")
                    {
                      $("#tiempo").focus();
                    }

                    if($("#tipo_tiempo").val()=="")
                    {
                      $("#tipo_tiempo").focus();
                    }

                     mensaje('Complete los campos','danger');
                  }
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
               // console.log(d+ "--"+p);
              if (p==1) {$(".botones").show();}

              if (d==true) {
                if (p==2) {
                  @if (Auth::guest())
                   $(".botones").hide();
                  @endif
                }
              }


            });


            $("#final-final").on('click',function(){
              $("#ocultar").hide();
              $("#mostrar").show();
            });


          $(".demo-grid").click(function(){
          $(".demo-grid").removeClass('active');
          $(this).addClass('active');
        });



          $("#regresar").on('click',function(){
            $(".btn-prev").click();
          });

        });



    $(".demo-grid").on('click',function() {

       var catx =  $(this).attr('id');

       $.ajax({
          url:'llevacatx',
          type:'POST',
          dataType:'json',
          data:{catx:catx},
          success:function(response)
          {


                $(".listasub").html("");
              $.each(response.subcategorias,function(key,value) {
                $(".listasub").append(
                  '<div class="radio-custom mb5">'+
                    '<input  type="radio" id="radioExample'+value.id_ability+"-"+value.id_category+'" name="radioExample" value="'+value.id_ability+'" class="subxd" data-nombre="'+value.ability+'"/>'+
                    '<label for="radioExample'+value.id_ability+"-"+value.id_category+'">'+value.ability+'</label>'+
                  '</div>'
                );

                });

                $(".subxd").click(function() {
                  $.magnificPopup.close();
                  $("#next").click();
                });


            $.magnificPopup.open({
               fixedContentPos : false,

                removalDelay: 400,
                items: {
                  src: "#modalsub"
                },
                callbacks: {
                  beforeOpen: function(e) {
                    this.st.mainClass = 'mfp-rotateDown';
                  }
                },
                midClick: true
              });
          }
       });

    });



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

function ponleFocustitulo(){
    document.getElementById("titulo").focus();
}

function ponleFocusdescripcion()
{
   document.getElementById("descripcion").focus();
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
     //  error();
            // return false;
       //console.log("sd");
    if ($(".demo-grid.active").attr('id')!=undefined && $('input:radio[name=radioExample]:checked').val()!=undefined){
        // alert("siga");
        mostrar(div);
         $(".tags").html('');

         var radiob = $('input:radio[name=radioExample]:checked').val();

      mostrar(div);


      var cate="";
      if($(".demo-grid.active").attr('id')==undefined){
          var cate = $("#n_cat").val();
      }else{
          var cate = $(".demo-grid.active").attr('id').split('-')[0];
      }
      $.ajax({
        url:'{{route("llena_habilidad")}}',
        type:'POST',
        dataType:'json',
        data:{codcat:cate,radiob:radiob},
        success:function(response)
        {

            var array = [];
          $("#input-co").html('<input type="text" id="tagmanager" class="form-control tm-input" style="width:100%">');



           $.each(response.conocimiento,function(indice,value){
             array.push(value.descripcion);
           });

           $('.tm-input').typeahead('destroy');

             $(".tm-input").tagsManager({
             tagsContainer: '.tags',
             prefilled:array,
             tagClass: 'tm-tag-info',
             maxTags: 11,
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

      $('.tm-input').typeahead({
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
        
        if($("#o_categoria").val()==""){
            mensaje('Seleccione una categoria','danger');
            error()
            return false;    
        }else{
            var ca_v = $("#o_categoria").val();
            $.ajax({
                url:'verificar_categoria',
                data:{ca:ca_v},
                type:'POST',
                dataType:'json',
                success:function(value){
                    var t = value.tipo;
                    var text = "";
                    if(t=='c'){text += "categoria"}
                    if(t=='h'){text += "subcategoria"}
                    if(t=='co'){text += "conocimiento"}
                    
                    if(t!=""){
                        
                       document.getElementById('texto_ad').innerHTML=text;
                      // advertencia_
                             $.magnificPopup.open({
                         fixedContentPos : false,
    
                          removalDelay: 400,    
                          items: {
                            src: "#advertencia_"
                          },
                          callbacks: {
                            beforeOpen: function(e) {
                              this.st.mainClass = 'mfp-rotateDown';
                            }
                          },
                          midClick: true
                        });
                        error()
                        return false; 
                    }else{
                        mostrar(div);
                        document.getElementById('n_cat').value=value.id
                         if($("#n_cat").val()!=""){
                              //  console.log("asdasd");
                                 $(".tm-input").tagsManager({
                              tagsContainer: '.tags',
                              prefilled:[],
                              tagClass: 'tm-tag-info',
                              maxTags: 11,
                               backspace: false,
                              
                            });
                            }
                    //    document.getElementById('n_cat').value=value.id
                    //    document.getElementById('next').click();
                    }
                }
            })
        }
        
        
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
      // console.log($(".demo-grid.active").attr('id')+"------1");
      // var array = [];
      // $.ajax({
      //   url:'{{route("llena_habilidad")}}',
      //   type:'POST',
      //   dataType:'json',
      //   data:{codcat:$(".demo-grid.active").attr('id')},
      //   success:function(response)
      //   {
      //
      //   //   $("#input-co").html('<input type="text" id="tagmanager" class="form-control tm-input">');
      //   //   $.each(response.habilidades,function(key,value) {
      //   //     array.push(value.ability);
      //   //   });
      //   //   // console.log(array);
      //   //   $(".tm-input").tagsManager({
      //   //   tagsContainer: '.tags',
      //   //   prefilled:array,
      //   //   tagClass: 'tm-tag-info',
      //   // });
      //
      //   }
      // });


      // $("#conocimientos").html();

      }
    }else{
       mensaje('Complete los datos','danger');
      error();
      return false;
    }
  }


      return true;
  }
  // if (div==6) {}

// }

        //


function scrollWin() {
  window.scrollTo(0, 0);
}






        //OTRO DESDE AQUI(GUARDAR)
  function guardar(){
     $(".div-center").hide();
    $(".div-cargando").show();
  var titulo,descripcion,categoria,f_trabajo,t_trabajo,t_proyecto,t_complejidad,t_entrega,t_tipo_tiempo,precio,propio_presupuesto,conocimientos,subcategoria,codsubcategoria,
  
  codsubcategoria = $('input:radio[name=radioExample]:checked').attr('value');
  titulo = $("#titulo").val();
  descripcion=$("#descripcion").val();
  categoria =  $(".demo-grid.active").attr('id')!=undefined?$(".demo-grid.active").attr('id'):$("#n_cat").val();
  f_trabajo =$("#forma_trabajo").val();
  t_trabajo=$("#tipo_trabajo").val();
  t_proyecto=$("#tipo_proyecto").val();
  t_complejidad= $("#complejidad").val();
  t_entrega = $("#tiempo").val();
  t_tipo_tiempo= $("#tipo_tiempo").val();
  precio =$("#aproximado").val();
  propio_presupuesto =$("#propio_presupuesto").val();
  conocimientos=$("input[name=hidden-undefined]").val();
  subcategoria = $('input:radio[name=radioExample]:checked').attr('data-nombre');
  if (categoria==null) {
    categoria=$("#n_cat").val();
  }
//console.log()


  $.ajax({
    url:"{{route('subir_proyecto')}}",
    data:{
      titulo:titulo,
      descripcion:descripcion,
      categoria:categoria,
      forma_trabajo:f_trabajo,
      tipo_trabajo:t_trabajo,
      tipo_proyecto:t_proyecto,
      complejidad:t_complejidad,
      tiempo:t_entrega,
      tipo_tiempo:t_tipo_tiempo,
      aproximado:precio,
      propio_presupuesto:propio_presupuesto,
      conocimientos:conocimientos,
      subcategoria:subcategoria,
      codsubcategoria:codsubcategoria,

    },
    type:'POST',
    datatype:'json',
    success:function(response){

      if (response.respuesta==true)   {
        $(".div-center").hide();
        $(".div-final").show();
        $("#pagar").attr('href','pago_paypal/'+response.publicar);
      }else{
        alert("error");
      }
    }
  });
}


function soloNumeros(e)
{
var keynum = window.event ? window.event.keyCode : e.which;
if ((keynum == 8) || (keynum == 46))
return true;
return /\d/.test(String.fromCharCode(keynum));
}

        //FIN



        //PARA PUBLICAR PARECIDO
        $("#{{$cateogriax}}").removeClass('demo-grid').addClass('demo-grid active');
        $("#forma_trabajo").val("{{$forma_trabajox}}");
        $("#tipo_trabajo").val("{{$tipo_trabajox}}");
        $("#tipo_proyecto").val("{{$tipo_proyectox}}");
        $("#complejidad").val("{{$complejidadx}}");
        $("#tipo_tiempo").val("{{$tiempo_entregax}}");


</script>
@endsection
@section('contenido')<br>
<input type='hidden' id="n_cat">


        <div id="modalsub" class="popup-basic popup-xs mfp-with-anim mfp-hide">

            <div class="panel">
                <div class="panel-body">
                  <h3 class="mt5">@lang('traduccion1.sub1publicar_trabajo') :</h3>
                  <br/>

                    <div class="listasub">

                    </div>

                </div>
              </div>
        </div>



        <div id="advertencia_" class="popup-basic popup-xs mfp-with-anim mfp-hide">
            <div class="panel">
                <div class="panel-body">
                  <h3 class="mt5">@lang('traduccion1.sub2publicar_trabajo') <label id='texto_ad'></label></h3>
                </div>
            </div>
        </div>



  <div class="mw1200 center-block  animated fadeIn" style="background-color: white;padding:20px;border-radius: 30px">
    <h2 class="publ"><center>@lang('traduccion1.sub3publicar_trabajo')</center></h2>
    <div id="WiredWizard" class="wizard wizard-wired publ" data-target="#WiredWizardsteps" style="width: 100%">
      <ul class="steps">
        <li class="active"><span class="step">1</span><span class="title">@lang('admin.paso1')</span><span class="chevron"></span></li>
        <li data-target="#wiredstep3"><span class="step">2</span><span class="title">@lang('admin.paso2')</span> <span class="chevron"></span></li>
        <li data-target="#wiredstep4"><span class="step">3</span><span class="title">@lang('admin.paso3')</span> <span class="chevron"></span></li>
      </ul>
    </div>
    <div class="div-center div-1" >
      <h3 style="text-align: left">@lang('admin.titulop')</h3>
        {{-- <p><h3>@lang('admin.demosleun')</h3></p> --}}
        <p class="texto">@lang('admin.mientrasmas')<br>@lang('admin.eltituloayuda')</p>
        <p><input type="text" class="form-control" id="titulo" value="{{$titulox}}" name="titulo"   placeholder="@lang('admin.placeholderes')"></p>
        <p><h3>@lang('traduccion1.sub4publicar_trabajo'):</h3></p>
        <p class="texto">@lang('admin.txtespecificatuau')</p>
        <p><textarea class="form-control"    style="height: 100px" id="descripcion">{{$descripcionx}}</textarea></p>
    </div>
    @if(!Auth::guest())


    <div class="div-center div-2" style="display: none;">
      <h3 style="text-align: left">@lang('admin.categoriaptau') </h3>
        <p class="texto">@lang('traduccion1.sub4publicar_trabajo'):</p>



             <div style="background-color: #DBDBDB;border-radius: 20px;width:100%;font-size: 14px;padding-left: 10px;padding-right: 10px;">

           <br>
              <div class="row mb5">


                <div class="col-sm-3 div-m" title="">
                  <div class="demo-grid" style="border-radius: 20px;" id="1">
                    <div class="datos">
                      <center><i class="fa-3x fa fa-code"></i><br>@lang('admin.btncatopc1')</center>
                    </div>
                  </div>
                </div>



                <div class="col-sm-3 div-m" title="">
                  <div class="demo-grid" style="border-radius: 20px;" id="2">
                     <div class="datos">
                        <center><i class="fa-3x fa fa-pencil"></i><br>@lang('admin.btncatopc2')</center>
                     </div>
                  </div>
                </div>





                <div class="col-sm-3 div-m" title="">
                      <div class="demo-grid" style="border-radius: 20px" id="3">
                         <div class="datos">
                              <center><i class="fa-3x fa fa-database"></i><br>@lang('admin.btncatopc3')</center>
                         </div>
                      </div>
                </div>



                <div class="col-sm-3 div-m" title="">
                    <div class="demo-grid" style="border-radius: 20px" id="4">
                          <div class="datos">
                            <center><i class="fa-3x fa fa-file icon-cat"></i><br>@lang('admin.btncatopc4')<br></center>
                          </div>
                    </div>
                </div>



              </div>


          <div class="row mb5">



              <div class="col-sm-3 div-m" title="">
                   <div class="demo-grid" style="border-radius: 20px" id="5">
                         <div class="datos">
                            <center><i class="fa-3x fa fa-book"></i><br>@lang('admin.btncatopc5')</center>
                         </div>
                   </div>
              </div>





              <div class="col-sm-3 div-m" title="">
                    <div class="demo-grid" style="border-radius: 20px" id="6">
                        <div class="datos">
                          <center><i class="fa-3x imoon imoon-office"></i><br>@lang('admin.btncatopc6')</center>
                        </div>
                    </div>
              </div>




              <div class="col-sm-3 div-m" title="">
                    <div class="demo-grid" style="border-radius: 20px" id="7">
                          <div class="datos">
                              <center><i class="fa-3x fa fa-legal"></i><br>@lang('admin.btncatopc7')</center>
                          </div>
                    </div>
              </div>






              <div class="col-sm-3 div-m" title="">
                 <div class="demo-grid" style="border-radius: 20px" id="8">
                     <div class="datos">
                        <center><i class="fa-3x glyphicons glyphicons-pie_chart"></i><br>@lang('admin.btncatopc8')</center>
                    </div>
                 </div>
              </div>



          </div>


          <div class="row mb5">



              <div class="col-sm-3 div-m" title="">
                  <div class="demo-grid" style="border-radius: 20px" id="9">
                        <div class="datos">
                            <center><i class="fa-3x fa fa-briefcase"></i><br>@lang('admin.btncatopc9')</center>
                        </div>
                  </div>
              </div>




              <div class="col-sm-3 div-m" title="">
                <div class="demo-grid" style="border-radius: 20px" id="10">
                  <div class="datos">
                    <center><i class="fa-3x fa fa-money"></i><br>@lang('admin.btncatopc10')</center>
                  </div>
                </div>
              </div>



              <div class="col-sm-3 div-m" title="">
                 <div class="demo-grid" style="border-radius: 20px" id="11">
                    <div class="datos">
                        <center><i class="fa-3x imoon imoon-user3"></i><br>@lang('admin.btncatopc11')</center>
                    </div>
                  </div>
              </div>




              <div class="col-sm-3 div-m" title="">
                <div class="demo-grid" style="border-radius: 20px" id="12">
                  <div class="datos">
                    <center><i class="fa-3x fa fa-shopping-cart"></i><br>@lang('admin.btncatopc12')</center>
                  </div>
                </div>
              </div>

          </div>

            </div>



        <div style="padding-top: 10px"><div class="col-md-1" style="padding-top: 5px">@lang('admin.txtotraptau')</div><div class="col-md-11"><input type="text" class="form-control" name="o_categoria" id="o_categoria" placeholder="Escribe a que otra categoria pertenece tu requerimiento"></div><br><br></div>
    </div>


    <div class="div-center div-3" style="display: none;">

            <div class="row">

        <div class="col-md-6">

          <h4>@lang('admin.txttiempoentregaau')</h4>
          <div class="row">


            <div class="col-sm-6">
                <input type="text" class="form-control" id="tiempo" placeholder="@lang('admin.placeholnuevotiempoentrega')" value="{{$cantidad_tiempox}}" onkeypress="return soloNumeros(event);">
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
                                                   • @lang('traduccion1.sub6publicar_trabajo')

                                                </div>
                                              </ul>
                                        </div></h3>

        {{-- <center> --}}
        <div id="input-co">
       
         <input type="text" id="tagmanager" class="form-control tm-input" style="width: 100%;">

         </div>
 <br>
           <div class="tag-container tags" id="conocimientos" style="margin-top:15px"></div>
        {{-- </center> --}}
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
          <input type="text" id="aproximado" class="form-control" disabled value="{{$aproximadox}}">
          <br/>
            <div class="row">
              <a href="javascript:desactivar()"><i> @lang('traduccion1.sub7publicar_trabajo') </i></a>
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


    <div class="div-center div-4" style="display: none;">



    </div>
    <div class="div-center div-cargando" style="display: none;">
    <center><img src="img/edit/estegif.gif"></center>
    </div>



     <div class="div-center div-final" style="display: none;">
        <div id="ocultar">
    <center><h3><a href="#" id="pagar">@lang('traduccion1.sub8publicar_trabajo')</a></h3></center>

    <input type="checkbox"  checked style="display: none;" id="checkboxrequerid">&nbsp; <a href="#" style="display: none;">@lang('admin.chkaceptarterminos')</a>
    <br/>
    <center><input type="checkbox" checked  name="checkbox" id="checkbox"> @lang('traduccion1.sub9publicar_trabajo').</center>
    <br/>

    <center><button type="button" id="final-final" class="btn btn-primary">@lang('traduccion1.sub10publicar_trabajo')</button></center>
        </div>
        <div id="mostrar" style="display: none;">
      <center><h1> @lang('admin.txtfelicidadespt')</h1>
        <h2>@lang('traduccion1.sub11publicar_trabajo')!</h2>
        <img src="img/feliz-pro.png" width="200" height="200">
        <h3>@lang('admin.txtahoracomenzarpropu')</h3>
        </center>
        <div class="row">
          <center>
            <a href="" class="btn btn-primary">@lang('traduccion1.sub12publicar_trabajo')</a> &emsp;<a href="perfil2" class="btn btn-success">@lang('traduccion1.sub13publicar_trabajo')</a> <br/><br/>
            <a href="proyectos"class="btn btn-primary">@lang('traduccion1.sub14publicar_trabajo')</a>
            <a href="{{ route('listar_trabajador') }}"class="btn btn-primary">@lang('traduccion1.sub15publicar_trabajo')</a>
          </center>

        </div>


        </div>


    </div>
    @else


  <div class="div-center div-2" style="display: none;">
      <center><h1>@lang('admin.registropt')</h1>
        <span class="fa fa-desktop" style="font-size:7em; margin:25px auto;"></span>
        <h3>@lang('admin.vayaaun')<br>@lang('admin.ysiemprelo')</h3>
       <h2>@lang('admin.inscribeteaqui')</h2><a href="register" class="btn btn-primary">@lang('admin.btnregistro')</a><br><h3>@lang('admin.yaeresusu')</h3><a href="login"class="btn btn-primary">@lang('admin.btningresa')</a><br><br>
        <a class="btn btn-primary" href="{{ route('index') }}" id="regresar">@lang('admin.btnvolver')</a>
      </center>
  </div>


    @endif


    <div class="panel publ botones" style="border: none;">
      <div id="WiredWizard-actions"  style="float: right;">
        <a href="publicar_trabajo"></a>
        <button type="button" class="btn btn-primary btn-sm btn-prev" > <i class="fa fa-angle-left"></i> &nbsp;@lang('admin.btnatras1')</button>
          @if (Auth::guest())
        <a href="{{ route('login') }}" onclick="scrollWin();" class="btn btn-primary btn-sm btn-next" id="next" data-last="@lang('admin.btnpublicarproyectosxdx')">@lang('admin.btnsig1') &nbsp;<i class="fa fa-angle-right"></i></a>
          @else
        <button type="button" class="btn btn-primary btn-sm btn-next"  onclick="scrollWin();" id="next" data-last="@lang('admin.btnpublicarproyectosxdx')" >@lang('admin.btnsig1') &nbsp;<i class="fa fa-angle-right"></i></button>
          @endif

      </div>
    </div>

  </div>

  <script type="text/javascript">

  </script>

@endsection
