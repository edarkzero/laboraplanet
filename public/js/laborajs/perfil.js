var a = 0;
var tr_codigo;
$(document).ready(function() {
    $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

      "use strict";

      //PARA COMPARTIR LOS LOGROS Y CONDECORACIONES DE PERFIL

      $(".compartir-f").on('click',function() {

window.open('https://www.facebook.com/sharer/sharer.php?u=https://www.laboraplanet.com', 'ventanacompartirfacebook', 'toolbar=0, status=0, width=650, height=450');

      });

      $(".compartir-t").on('click',function() {
 window.open('https://twitter.com/intent/tweet?text=Te%20recomiendo%20esta%20plataforma%20de%20empleo:%20&url=https://www.laboraplanet.com&hashtags=tambienSoyLaboraPlanet', 'ventanacompartirtwitter', 'toolbar=0, status=0, width=650, height=450');

      });

     $(".compartir-l").on('click',function() {
  window.open("https://www.linkedin.com/sharing/share-offsite/?url=https://www.laboraplanet.com", 'ventanacompartirlinkedin', 'toolbar=0, status=0, width=650, height=450');

      });


      // FIN



//PARA AGREGAR LOS CONOCIMIENTOS

  $("#guardarcono").on('click',function() {

      var subcategoria = $("#titulocono").html();

      var subca = subcategoria.split('=&gt;');

      var subcalleva = subca[1];
      var catelleva = subca[0];

      var inputwe = $("input[name=hidden-undefined]").val();

    if (inputwe == "" || inputwe == null || inputwe == 0) {
        mensaje('Por favor ingrese sus conocimientos.','danger');
        $("#test-field").focus();
    } else {


      function irxd()
      {
          location.href='perfil';
      }



var tags = $("input[name=hidden-undefined]").val();

$.ajax({
url: 'conocimiento',
type:'POST',
datatype:'JSON',
data:{subcalleva:subcalleva,tags:tags,catelleva:catelleva},
success:function(response)
{
    if(response.message == 1)
    {
      mensaje("Conocimientos guardados correctamente.","success");
      setTimeout(irxd,2000);
    }

    if(response.message == 5)
    {
        mensaje(response.texto);
    }

    if(response.message == 2)
    {
      // mensaje('Has superado el limite de conocimientos/categorias/subcategorias, acogete a un plan desde solo $5.','warning');
//modal-text1
$.magnificPopup.open({
fixedContentPos : false,

 removalDelay: 400,
 items: {
   src: "#modal-text1"
 },
 callbacks: {
   beforeOpen: function(e) {
     this.st.mainClass = 'mfp-rotateDown';
   }
 },
 midClick: true
});


    }
}

});
    }



  });







//FIN





        //PARA EL CHECKBOX DE PERFIL

      $("#mostarch").on('click',function(){
        if($('#mostarch').is(':checked') ) {

           var si = 1;
           $("#txtmostrar").html('&emsp;'+'No mostrar este dato.');

           $.ajax({
                url:'perfil/ver_dni',
                type: 'POST',
                datatype:'JSON',
                data:{si:si},
                success:function(response)
                {
                  //console.log('SI');
                }
           });
        }
        else
        {
           var no = 0;
           $("#txtmostrar").html('&emsp;'+'Mostrar este dato a los empleadores.');

           $.ajax({
              url:'perfil/ver_dni_no',
              type: 'POST',
              datatype: 'JSON',
              data:{no:no},
              success:function(response)
              {
                console.log('NO');
              }
           });


        }

      });


      //PARA EL CHECKBOX DE ACTUALMENTE EN FIN

      $("#actualmente").on('click',function(){
        if($('#actualmente').is(':checked')) {
            $("#fechaf").attr('disabled',true);
        }
        else
        {
          $("#fechaf").attr('disabled',false);
        }
      });

     $('.dateee').mask('99-99-9999');

    $('.date').datetimepicker( {pickTime:false,format:'DD-MM-YYYY',});
    $(".select2").select2({
        placeholder: "Pais (*)",

    });
    $(".select2c").select2({
      placeholder:"Sub Area",
    });

    $(".select2pm").select2({
      placeholder:"Pais",
       dropdownParent: $("#edit-form"),
    });

    $(".select2pme").select2({
      placeholder: "Pais",
      dropdownParent: $("#edite-form"),
    });

    $(".select2cm").select2({
      placeholder: "Sub Area",
       dropdownParent: $("#edit-form"),
    });

    $(".select2cme").select2({
      placeholder: "Sub Area",
      dropdownParent: $("#edite-form"),
    });


    $("#cbopais_up").on('change',function() {
      ciudad("cbopais_up","ciudad3");
    });

    $("#cbopais_up_e").on('change',function() {
      ciudad("cbopais_up_e","ciudad4");
    });

    $("#pais2").on('change',function(){
      ciudad("pais2","ciudad2");
    });
    $("#pais1").on('change',function(){
      ciudad("pais1","ciudad1");
    });


$(document).on('click',".btn-eliminar-h",function(e){
  var v = $(this).closest('div');

 var d = eliminar($(this).data('co'),'perfil/deleteH',v);

});


$("#sprof").on('click',function(){
    var txtprofesion = $("#txtprofesion").val();

    $.ajax({
      url:'perfil/saveProfesion',
      type:'POST',
      datatype:'json',
      data:{txtprofesion:txtprofesion},
      success:function(response)
      {
        if(response.message == 1)
        {
           mensaje('Profesion grabada correcamente.',"success");
        }
        else
        {
          mensaje("Ocurrio un error.Intenlo mas tarde","warning");
        }
      }
    });
});


$("#sugerir").on('click',function() {

                     $.magnificPopup.open({
                     fixedContentPos : false,

                      removalDelay: 400,
                      items: {
                        src: "#sugerencias-form"
                      },
                      callbacks: {
                        beforeOpen: function(e) {
                          this.st.mainClass = 'mfp-rotateDown';
                        }
                      },
                      midClick: true
                    });
});

$("#sug").submit(function(e) {
    e.preventDefault();
   var txtsug = $("#txt_sug").val();

   $.ajax({
    url:'save_sug',
    type:'POST',
    datatype:'json',
    data:{txtsug:txtsug},
    success:function(response)
    {

      //console.log(response.message);

      if(response.message == 1)
      {
         $.magnificPopup.close();
         $("#txt_sug").val("");
         mensaje('Se ha enviado la sugerencia','success');
      }
      else
      {
        mensaje('Ocurrio un error','danger');
      }



    }
   });

});



$("#juridico").submit(function(e){
e.preventDefault();

    mensaje('Tus datos se han registrado con Ã©xito. Comienza a publicar tus requerimientos.','success');

   var a = {};
      a.nombree = $("#razonse").val();
      a.razonse=$("#razonse").val();
      a.telefonoe=$("#telefonoe").val();
      a.paise=$("#paise").val();
      // a.nit=$("#nit").val();
      // a.direccione=$("#direccione").val();
      a.descripcione=$("#descripcione").val();
      if (verificar(a)) {
      $.ajax({
        url:'perfil/save_data_juridico',
        type:'POST',
        datatype:'json',
        data:{
            razonse:a.razonse,
            telefonoe:a.telefonoe,
            paise:a.paise,
            descripcione:a.descripcione,
            nit:$("#nit").val(),
            direccione:$("#direccione").val(),
              },

        // beforeSend: function() {
        //   $("#beno").hide();
        //   $("#hc").show();
        // },
        success:function(response){
              // $("#hc").hide();
              // $("#beno").show();
              location.href='perfil2';
        }
      })
      }else{
        mensaje("Ingrese todos los datos porfavor.","error")
      }
});


$("#enviar_datose").on('click',function() {
      mensaje('Tus datos se han registrado con exito. Comienza a publicar tus requerimientos.','success');


      $.ajax({
          url:'enviar_datose',
          type:'POST',
          dataType:'json',
          data:{},


        beforeSend: function() {
          $("#beno").hide();
          $("#hc").show();
        },
        success:function(){
              $("#hc").hide();
              $("#beno").show();
              location.href='publicar_trabajo';
        },
        error:function(){
          mensaje('Ocurrio un error','danger');
              location.href='perfil2';
        }
      });
});



$("#enviar_datos").on('click',function() {

mensaje('Tus datos se han guardado satisfactoriamente.  Tus clientes, empresas del mundo se contactarán contigo muy pronto','success');

    var correo = $("#correod").attr('placeholder');

    $.ajax({
      url:'enviar_datos',
      type:'POST',
      dataType:'json',
      data:{correo:correo},

        beforeSend: function() {
          $("#enviar_datos").hide();
          $("#hc").show();
        },
      success:function(response)
      {
              $("#hc").hide();

              $("#enviar_datos").show();
              location.href='perfil';


      }

    });

});


$("#datos").submit(function(e){
  e.preventDefault();

  if($("#cbkau").is(':checked') )
  {
    $("#cbkau").val(1);
  }
  else
  {
    $("#cbkau").val(0);
  }

  var enviar = $("#cbkau").val();

  var a = {};
  a.nombred= $("#nombred").val();
  a.apellidosd = $("#apellidosd").val();
  a.usuariod=$("#usuariod").val();
  a.documentod= $("#documentod").val();


if (verificar(a)) {

  $.ajax({
    url:'perfil/save_data',
    type:'POST',
    datatype:'json',
    data:{
        nombred:a.nombred,
        apellidosd:a.apellidosd,
        paisd:$("#paisd").val(),
        codigopd:$("#codigopd").val(),
        telefonod:$("#telefonod").val(),
        usuariod:$("#usuariod").val(),
        documentod:a.documentod,
        // monedad:a.monedad,
        preciohd:$("#preciohd").val(),
        direcciond:$("#direcciond").val(),
        comentariod:$("#comentariod").val(),
        urllinkedin:$("#urlink").val(),
        enviar:enviar,
    },
    success:function(response){
                 function irxd()
                 {
                     location.href='perfil';
                 }

            mensaje("Datos Personales grabados correctamente.","success");
            setTimeout(irxd,2000);
    }
  });


}
else
{
  mensaje("Ingrese todos los datos porfavor.","error")
}
});








//-- PARA EL ONCHANGE --//

  $("#cbocategoria").change(function() {
      var codcat = $("#cbocategoria").val();

      $.ajax({
        url:'llenarhabilidad',
        type:'POST',
        dataType:'json',
        data:{codcat:codcat},
        success:function(response)
        {
          $("#cbohabilidades").empty();
          $("#cbohabilidades").append("<option value=''>-- Seleccione Conocimiento --</option>");
          $.each(response.habilidades,function(key,value) {
              $("#cbohabilidades").append("<option value='"+value.id_ability+"'>" + value.ability + "</option");
          });

        }
      });

  });



//-- FIN DEL ONCHANGE --//


$(document).on("submit",".formarchivo",function(e) {
    e.preventDefault();

    var formu = $(this);
    var nombreform = $(this).attr("id");

    if(nombreform=="f_subir_imagen") {var miurl="subir_imagen_usuario"; }

    var formData = new FormData($("#"+nombreform+"")[0]);



    $.ajax({
      url:miurl,
      type:'POST',
      data: formData,
      cache: false,
      contentType: false,
      processData: false,

        success:function(data) {
        location.href = 'perfil';
        $("#img").attr('src', $("#id").attr('src'));
       mensaje("Se ha actualizado su foto de Perfil.",'success')

      },



      //si es que ocurre un error
      error:function(data) {
        mensaje("Error al actualizar",'error');

      }
    });

});


$(document).on('submit',".formarchivo2",function(e) {
    e.preventDefault();

    var formu = $(this);
    var nombreform = $(this).attr('id');

    if(nombreform=="f_subir_imagen_2") {var miurl="subir_imagen_usuario2";}

    var formData = new FormData($("#"+nombreform+"")[0]);

    $.ajax({
      url:miurl,
      type:'POST',
      data:formData,
      cache:false,
      contentType: false,
      processData: false,

        success:function(data) {
          location.href = 'perfil2';
        }
    });

});









  $("#form-calificar").submit(function(e) {
    e.preventDefault();

      var cantidad = $("#invi").val();
      var comment = $("#comment").val();
      var usuario = $("#user").val();
      var fecha = $("#fecha").val();

      var per = '';

      if($("#chtrabajador").prop('checked')) {
        per = 1;
        //console.log(per);
      }

      if($("#chempleador").prop('checked')) {
        per = 2;
        //console.log(per);
      }

      $.ajax({
        url:'comentario',
        type:'POST',
        dataType:'json',
        data:{cantidad:cantidad,comment:comment,usuario:usuario,fecha:fecha,per:per},
        success:function(response)
        {
          $.magnificPopup.close();
          mensaje('Gracias por tu calificacion!','success');
        }
      });
   });



//-- FIN DEL MODAL --//




$("#experiencia").submit(function(e){
e.preventDefault();
   var a = {};
      a.empresan = $("#empresan").val();
      a.fechai=$("#fechai").val();
      // a.fechaf=$("#fechaf").val();
      a.cargoe=$("#cargoe").val();
      a.pais1=$("#pais1").val();
      // a.ciudad1=$("#ciudad1").val();
      a.comentario=$("#comentario").val();
      var v = verificar(a);

      if (v==true) {
      $.ajax({
        url:'perfil/saveexperiencia',
        type:'POST',
        datatype:'json',
        // data:{data:a
        data:{empresan:a.empresan,
          fechai:a.fechai,
          fechaf:$("#fechaf").val(),
          cargoe:a.cargoe,
          pais1:a.pais1,
          ciudad1:$("#ciudad1").val(),
          comentario:a.comentario
        },
        success:function(response){

          if (response==true) {
            limpiar("experiencia");
            var arra = ['pais1','ciudad1'];
            limpiarselect2(arra);
            $("#ciudad1").html('<option></option>');
            location.href='perfil';
          }else{
            mensaje("Error en los datos",'error');
            // $.each(response,function(indice,value){
              // var e = value.split(" ");

              // $("#"+e[0]).css('background','red')
            // })

          }
        }
      })
      }else{
        mensaje("Ingrese todos los datos porfavor.",'error')
      }




});




//-- VALIDAR CORREO ELECTRONICO --//

$("#validar_correo").click(function() {
    var correo = $("#h_correo").val();

    $.ajax({
        url:'validar_correo',
        type:'POST',
        datatype:'json',
        data:{correo:correo},
        success:function(response)
        {

        }
    });
    mensaje("Se ha enviado correo de verificacion.",'success');
    $("#validar_correo").hide();

});

//-- FIN --//



// -- GUARDAR HABILIDADES USUARIO --//
  $("#form-profesional").submit(function(e) {
    e.preventDefault();
    var categoria = $("#cbocategoria").val();
    var habilidad = $("#cbohabilidades").val();


    $.ajax({
      url:'guardahabili',
      type:'POST',
      dataType:'json',
      data:{categoria:categoria,habilidad:habilidad},
      success:function(response)
      {

        if(response.message==5){
          mensaje("Para agregar mÃ¡s categorÃ­as, necesitas un plan con mayor capacidad, mÃ¡s novedades muy pronto....","warning");
        }

        if (response.message==1) {
          mensaje("Se guardo correctamente.","success");
          limpiar("form-profesional");
          $("#cbohabilidades").html('<option value>-- Seleccione Conocimiento --</option>')
          var agreg = response.div[0].id_category;
          var habilidad =response.div[0].ability;
          if($("#bod_"+agreg).length>0){
            //CUANDO YA EXISTE UN WIDGHET CON CATEGORIA --
            //<a href="javascript:void(0)" class="btn-eliminar-h"  data-co="{{ $value->id_ability }}"><i class="fa fa-times-circle" style="font-size: 15px"></i></a>
            $("#bod_"+agreg).append("<div>. "+habilidad+" "+"<a href='javascript:void(0)' class='btn-eliminar-h' data-co='"+response.div[0].id_ability+"'><i class='fa fa-times-circle' style='font-size: 15px'></i></a>"+"<br></div>");
          }else{
            //CUANDO SE CREA UN WIDGHET CON CATEGORIA Y HABILIDAD --
            var vista = "";
            vista = '<div class="col-sm-6">'+
                    '<div class="panel-group">'+
                    '<div class="panel">'+
                    '<div class="panel-heading" style="padding: 0px;">'+
                 '<a class="accordion-toggle accordion-icon link-unstyled collapsed" data-toggle="collapse" data-parent="#accordion" href="#'+agreg+'" aria-expanded="false">'
                  +response.div[0].description+'</a>'+
                 '</div>'+
                 '<div id="'+agreg+'" class="panel-collapse collapse" style="height: 0px;" aria-expanded="false">'+
                   '<div class="panel-body" id="bod_'+agreg+'">'+
                   '<div>  . '+habilidad+' '+'<a href="javascript:void(0)" class="btn-eliminar-h" data-co="'+response.div[0].id_ability+'"><i class="fa fa-times-circle" style="font-size: 15px"></i></a>'+ '<br></div>'+
                  ' </div>'+
                ' </div>'+
               ' </div>'+
             '</div>'+
            '</div>'
            $("#habilidad").append(vista);
          }

        }else{
          if(response.message==2){
            mensaje("Este conocimiento ya la agrego.","warning")
          }else{
            // mensaje("Error al agregar.","error");
          }
        }


      }

    });

  });

//    $('input[type="checkbox"]').on('change', function(e){
//     if (this.checked) {
//         $("#cbkau").val('1');
//     } else {
//         $("#cbkau").val('0');
//     }
// });


// -- FIN -- //




$("#educacion").submit(function(e){
       e.preventDefault();
      var a = {};
      a.txtcentro_e = $("#txtcentro_e").val();
      a.educacion_fi=$("#educacion_fi").val();
      a.educacion_ff=$("#educacion_ff").val();
      a.txttipoe=$("#txttipoe").val();
      a.txttituloe=$("#txttituloe").val();
      a.pais2=$("#pais2").val();
      // a.ciudad2=$("#ciudad2").val();
      var v = verificar(a);


      if (v==true) {
      $.ajax({
        url:'perfil/saveEstudio',
        type:'POST',
        datatype:'json',
        // data:{data:a
        data:{centro_educacion:a.txtcentro_e,
          desde:a.educacion_fi,
          hasta:a.educacion_ff,
          tipo:a.txttipoe,
          titulo:a.txttituloe,
          pais:a.pais2,
          ciudad:$("#ciudad2").val(),
        },
        success:function(response){
          if (response=="true") {

            limpiar("educacion");
            var arra = ['pais2','ciudad2'];
            limpiarselect2(arra);
            $("#ciudad2").html('<option></option>');
            location.href='perfil';
          }
        }
      });
      }else{
        mensaje("Ingrese todos los datos porfavor.","error")
      }

    })


$(".btn-eliminar-s").on('click',function(){
  var c = $(this).children('input').val();
  var v = $(this).closest('.panel-general');

  if (c!="") {
    eliminar2(c,'perfil/deleteEstudio',v);
  }
});
$(".btn-eliminar-w").on('click',function(){
  var c = $(this).children('input').val();
  var v = $(this).closest('.panel-general');

  if (c!="") {
    eliminar2(c,'perfil/deleteexperiencia',v);
  }
});

//$("#")





});


    function cerrarcali()
       {
        $.magnificPopup.close();
       }


function mostrar(){
  var archivo = document.getElementById("file").files[0];
  var reader = new FileReader();
  if (file) {
    reader.readAsDataURL(archivo );
    reader.onloadend = function () {
      document.getElementById("img").src = reader.result;
    }
  }
}



function eliminar2(codigo,url,modal,v){
  $.ajax({
    url:url,
    datatype:'json',
    type:'POST',
    data:{
      codigo:codigo
    },
    success:function(response){
      if (response.ver==1) {
        modal.remove();
        mensaje("Se elimino correctamente",'success');
      }
      else{
        mensaje("Error al eliminar","error");
        return 0;
      }

    }
  });
        return true;
}




function verificar(array){
  var contar = 0;
    for(var pro in array){
        if (array[pro]=="") {
          contar++;
          return false;
        }
    }

 if (contar==1) {return false;}
 else{ return true;}

}


function limpiarselect2(array){
  $.each(array,function(indice,value){
    $("#"+value).val('').trigger('change');
  })
}



function limpiar(form){
document.getElementById(form).reset();
}



function ciudad(pais,ciudad,ciudadv){

  var pais = $("#"+pais).val();
      $.ajax({
        url:'perfil/ciudad',
        type:'POST',
        datatype:'json',
        data:{pais:pais},
        success:function(response){
          $("#"+ciudad).html('<option></option>');
          $.each(response.ciudad,function(indice,value ){
            $("#"+ciudad).append('<option value="'+value.id_departament+'">'+value.name_departament+'</option>');
          });
          if (ciudadv!=null) {
            $("#"+ciudad).val(ciudadv).trigger('change')
          }
        }
      });
}


function PasarDatosModal(x)
{
  var codigo = $(x).attr('id');
  tr_codigo = codigo;
  var uni = tr_codigo;

  $.ajax({
      url:'pasardatosmodal',
      type:'POST',
      dataType:'json',
      data:{tr_codigo:tr_codigo},
      success:function(response)
      {
        $("#empresa_up").val(response.tabla[0].company);
        $("#cargo_up").val(response.tabla[0].charge);

                var fecha = response.tabla[0].date_start;
                var newfechai = moment(fecha).format('DD-MM-YYYY');
        $("#desde_up").val(newfechai);
          var fecha2 = response.tabla[0].date_end;
          var newfechaf = moment(fecha2).format('DD-MM-YYYY');
        $("#hasta_up").val(newfechaf);
        $("#cbopais_up").val(response.tabla[0].country).trigger('change');
        ciudad("cbopais_up","ciudad3",response.tabla[0].city);

        $("#comentario_up").val(response.tabla[0].description_profile);
        $("#xr").val(uni);

                // ABRE EL FORMULARIO CON LOS INPUT YA LLENOS
                     $.magnificPopup.open({
                     fixedContentPos : false,

                      removalDelay: 400,
                      items: {
                        src: "#edit-form"
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

}


function PasardatosModalE(x)
{
  var codigo = $(x).attr('id');
  tr_codigo = codigo;
  var uni = tr_codigo;



  $.ajax({
    url:'pasardatosmodal2',
    type:'POST',
    datatype:'json',
    data:{tr_codigo:tr_codigo},
    success:function(response)
    {
        $("#centroestudio_up").val(response.tabla[0].institute);
        $("#tipoestudio_up").val(response.tabla[0].type_study).trigger('change');
        $("#titulobtenido_up").val(response.tabla[0].degree);
         var fecha = response.tabla[0].date_start;
         var newfechai = moment(fecha).format('DD-MM-YYYY');
        $("#desde_up_e").val(newfechai);
        var fecha2 = response.tabla[0].date_end;
        var newfechaf = moment(fecha2).format('DD-MM-YYYY');
        $("#hasta_up_e").val(newfechaf);
        $("#cbopais_up_e").val(response.tabla[0].country).trigger('change');
        ciudad("cbopais_up_e","ciudad4",response.tabla[0].city);
        // $("#ciudad4").val(response.tabla[0].city).trigger('change');
        $("#xre").val(uni);

              // ABRE EL FORMULARIO CON LOS INPUT YA LLENOS
                     $.magnificPopup.open({
                     fixedContentPos : false,

                      removalDelay: 400,
                      items: {
                        src: "#edite-form"
                      },
                      callbacks: {
                        beforeOpen: function(e) {
                          this.st.mainClass = 'mfp-rotateDown';
                        }
                      },
                      midClick: true
                    });
    }
  })

}


function PasarDatosModalComentario(x)
{
  var codigo = $(x).attr('id');
  tr_codigo = codigo;
  var uni = tr_codigo;

  $.ajax({
    url:'pasardatosmodalcomentario',
    type:'POST',
    datatype:'json',
    data:{tr_codigo:tr_codigo},
    success:function(response)
    {

      if(response.tabla.length == 0)
      {
        $('#Estrellas').starrr({
        rating:0,
       change:function(e,valor){
           $("#invi").val(valor);
              }
          });



      }
      else
      {
        $('#Estrellas').starrr({
        rating:response.tabla[0].qualification,
       change:function(e,valor){
           $("#invi").val(valor);
              }
          });

          $("#comment").val(response.tabla[0].commit_finish);

           document.getElementById('enviarcomet').style.display='none';
           // document.getElementById('enviarcomet').style.display ='hidden'
      }





    }
  });

        $.magnificPopup.open({
                     fixedContentPos : false,

                      removalDelay: 400,
                      items: {
                        src: "#califica-form"
                      },
                      callbacks: {
                        beforeOpen: function(e) {
                          this.st.mainClass = 'mfp-newspaper';
                        }
                      },
                      midClick: true
                    });

}

function ModificarExperiencia(x)
{
  var codigo_up = $(x).val();
  var empresa_up = $("#empresa_up").val();
  var cargo_up = $("#cargo_up").val();
  var desde_up = $("#desde_up").val();
  var hasta_up = $("#hasta_up").val();
  var cbopais_up = $("#cbopais_up").val();
  var ciudad3 = $("#ciudad3").val();
  var comentario_up = $("#comentario_up").val();


  $.ajax({
    url:'modificarexperiencia',
    type:'POST',
    dataType:'json',
    data:{codigo_up:codigo_up,empresa_up:empresa_up,cargo_up:cargo_up,desde_up:desde_up,hasta_up:hasta_up,cbopais_up:cbopais_up,ciudad3:ciudad3,comentario_up:comentario_up},
    success:function(response)
    {
      location.href='perfil';
    }
  });

}


function ModificarEducacion(x)
{
  var codigo_up = $(x).val();
  var centroestudio_up = $("#centroestudio_up").val();
  var tipoestudio_up = $("#tipoestudio_up").val();
  var titulobtenido_up = $("#titulobtenido_up").val();
  var desde_up_e = $("#desde_up_e").val();
  var hasta_up_e = $("#hasta_up_e").val();
  var cbopais_up_e = $("#cbopais_up_e").val();
  var ciudad4 = $("#ciudad4").val();


  $.ajax({
    url:'modificareduacion',
    type:'POST',
    dataType:'json',
    data:{codigo_up:codigo_up,centroestudio_up:centroestudio_up,tipoestudio_up:tipoestudio_up,titulobtenido_up:titulobtenido_up,desde_up_e:desde_up_e,hasta_up_e:hasta_up_e,cbopais_up_e:cbopais_up_e,ciudad4:ciudad4},
    success:function(response)
    {
      location.href ='perfil';
    }
  });

}


    function fileValidation()
    {
    var fileInput = document.getElementById('file');
    var fileInputSize = document.getElementById('file').files[0].size;

    if(fileInputSize > 1000000)
    {
      mensaje("Solo se permite imagenes de 1 MB",'warning');
      fileInput.value = '';
      return false;
    }

    var filePath = fileInput.value;
    var allowedExtensions = /(.jpg|.jpeg|.png)$/i;
    if(!allowedExtensions.exec(filePath)){
        mensaje("Solo se permiten imagenes con extension .png o .jpg",'error');
        fileInput.value = '';
        return false;
    }else{
      mostrar();

        $("#guardaimagen2").click();

    }
}

   function mostrar(){
  var archivo = document.getElementById("file").files[0];
  var reader = new FileReader();
  if (file) {
    reader.readAsDataURL(archivo);
    reader.onloadend = function () {
       var imagen = document.getElementById("img3").src = reader.result;
      var imagen2 = document.getElementById("img").src = reader.result;


    }
  }
}





    function fileValidation2()
    {
    var fileInput = document.getElementById('file2');
    var fileInputSize = document.getElementById('file2').files[0].size;

    if(fileInputSize > 1000000)
    {
      mensaje("Solo se permite imagenes de 1 MB",'warning');
      fileInput.value = '';
      return false;
    }

    var filePath = fileInput.value;
    var allowedExtensions = /(.jpg|.jpeg|.png)$/i;
    if(!allowedExtensions.exec(filePath)){
        mensaje("Solo se permiten imagenes con extension .png o .jpg",'error');
        fileInput.value = '';
        return false;
    }else{
      mostrar2();

        $("#guardaimagen").click();

    }
}



   function mostrar2(){
  var archivo = document.getElementById("file2").files[0];
  var reader = new FileReader();
  if (file2) {
    reader.readAsDataURL(archivo);
    reader.onloadend = function () {
       var imagen = document.getElementById("img3").src = reader.result;
      var imagen2 = document.getElementById("img").src = reader.result;


    }
  }
}





function reenviar(x){
  var correo = $(x).attr('data-correo');

  $.ajax({
    url:'reenviarcorreo',
    type:'POST',
    dataType:'json',
    data:{correo:correo},
    success:function(response)
    {
       mensaje('Se ha enviado un correo electronico!','success');
    }

  });

}

function cerrarmodal()
{
  $.magnificPopup.close();
}

function iracertificarhab()
{
   location.href='certificar';
}

function eliminar(v){
    $.ajax({
       dataType:'json',
       url:'eliminar_aa',
       data:{v:v},
       type:'POST',
       success:function(e){
          // console.log("sadasd");
          location.reload();
       }
    });
}

function eliminar_s(v,v2){
    $.ajax({
       dataType:'json',
       url:'eliminar_aaa',
       data:{v:v,v2:v2},
       type:'POST',
       success:function(e){
          // console.log("sadasd");
          location.reload();
       }
    });
}
