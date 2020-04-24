
      $("#mostrar").on('click',function(){
        alert("asdas");
        $(".avanzado").show();
      })


var ver=0;
var ver2=0;
var tabl = $('#datatable4').DataTable({
      "responsive": true,
      "aoColumnDefs": [{
        'bSortable': false,
        'aTargets': [-1]
      }],
      "oLanguage": {
        "oPaginate": {
          "sPrevious": "",
          "sNext": "",
        }
      },
      "aLengthMenu": [
        [5, 10, 25, 50, -1],
        [5, 10, 25, 50, "All"]
      ],
      "sDom": '<"dt-panelmenu  clearfix" lfr>t<"dt-panelfooter  clearfix"pi>',
      "oTableTools": {
        "sSwfPath": "vendor/plugins/datatables/extensions/TableTools/swf/copy_csv_xls_pdf.swf"
      }
    });
var tabla = $('#datatable2').dataTable({
      "ordering": false,
      "responsive": true,
      "aoColumnDefs": [{
        'bSortable': false,
        'aTargets': [-1]
      }],
      "oLanguage": {
        "oPaginate": {
          "sPrevious": "",
          "sNext": "",
        }
      },
      "aLengthMenu": [
        [10, 25, 50, -1],
        [10, 25, 50, "All"]
      ],
      "sDom": '<"dt-panelmenu  clearfix" lfr>t<"dt-panelfooter  clearfix"pi>',
      "oTableTools": {
        "sSwfPath": "vendor/plugins/datatables/extensions/TableTools/swf/copy_csv_xls_pdf.swf"
      }
    });

var table = $('#datatable3').DataTable({
      "responsive": true,
      "aoColumnDefs": [{
        'bSortable': false,
        'aTargets': [-1]
      }],
      "oLanguage": {
        "oPaginate": {
          "sPrevious": "",
          "sNext": "",
        }
      },
      "aLengthMenu": [
        [10, 25, 50, -1],
        [10, 25, 50, "All"]
      ],
      "sDom": '<"dt-panelmenu  clearfix" lfr>t<"dt-panelfooter  clearfix"pi>',
      "oTableTools": {
        "sSwfPath": "vendor/plugins/datatables/extensions/TableTools/swf/copy_csv_xls_pdf.swf"
      }
    });



function guardar(){
  var es=$("#es").val();
  var prec=$('input:text[name=prec]').val();
  var tiem = $("#cantidad_t").val();
  var tipo = $("#tipo_t").val();
  // console.log(es,prec);
  $.ajax({
  url:'modificar',
  type:'POST',
  datatype:'json',
  data:{es:es,prec:prec,tiem:tiem,tipo:tipo},
  success:function(response){
      var tiempo="";
  switch(tipo){
    case '1':
    tiempo="Horas";
    break;
    case '2':
    tiempo="Días";
    break;
    case '3':
    tiempo="Semanas";
    break;
    case '4':
    tiempo="Meses";
    break;
  }
    console.log(response.select);
    console.log(es);
    $("#ver3").html(tiem+" "+tiempo);
    $("#tiempo_"+es).val(tiem);
    $("#tipo__"+es).val(tipo);
    $("#costo_"+es).val(response.select[0].sinnueve);
    console.log(response.select[0].sinnueve);
    $("#prec").hide();
    $("#guardar").hide();
    $("#cancelar").hide();
    $("#ver2").show();
    $("#ver2").html(response.select[0].sinnueve);
    $("#prec").val(response.select[0].sinnueve);
    $("#tipo_t"+es).val(tipo)
    //$("#ver2").html("$ "+ $("#costo_"+es).val().toFixed(2));
    //$("#ver2").html("$ "+$("#costo_"+es).val());
    $("#editar").show();
    $("#cerrar").show();

      $("#ver3").show();
      
  $("#mostrar_div_t").hide();



  }
});
}


function modal(id){
  // console.log(id,time);
$("#tipo_t").val($("#tipo__"+id).val());
$("#cantidad_t").val($("#tiempo_"+id).val());
$("#prec").val($("#costo_"+id).val());
  var tiempo="";
  switch($("#tipo__"+id).val()){
    case '1':
    tiempo="Horas";
    break;
    case '2':
    tiempo="Días";
    break;
    case '3':
    tiempo="Semanas";
    break;
    case '4':
    tiempo="Meses";
    break;
  }
  // console.log(tiempo);
  $("#final_"+id).val();
  $("#costo_"+id).val();
  $("#tiempo_"+id).val();

  var tituloproxd = $("#titulo_"+id).val();

  $("#ver2").show();
  $("#editar").show();
  $("#cerrar").show();
  $("#prec").hide();
  $("#guardar").hide();
  $("#cancelar").hide();

  $("#ver3").show();
  $("#mostrar_div_t").hide();
  // var titulopro = $("#titulopro").val();

  // console.log($("#costo_"+id).val());
  $("#es").val(id);
  $("#ver").html($("#final_"+id).val());
  $("#ver2").html("$ "+$("#costo_"+id).val());
  $("#ver3").html($("#tiempo_"+id).val()+" "+tiempo);
 ///////////////////////
    var fec = $("#fecha_"+id).val();
    var sep = fec.split('-');
    $("#verxd1").html(sep[2]+"-"+sep[1]+"-"+sep[0]);
 //////////////////////
  $("#namereque").html(tituloproxd);

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


};

function titulo(x){


var codigo = $(x).attr('data-id');



  $.ajax({
    url:'proyecto-detalle',
    type:'POST',
    datatype:'json',
    data:{codigo:codigo},
    success:function(response)
    {
      if(response.tabla.length > 0)
      {
          var d = response.tabla[0];
        var nombre = d.nombre_empresa;
        if(nombre==null){
            nombre= d.nombres + " " + d.apellidos;
        }
       var titulo = response.tabla[0].titulo.toUpperCase();
       $("#titulo").html(titulo);
        $("#nom_empresa").html(nombre);
       var tipo_proyecto = response.tabla[0].tipo_proyecto;

       if(tipo_proyecto == 1)
        {
          tipo_proyecto = 'Es un proyecto nuevo';
        }
        if(tipo_proyecto == 2)
        {
          tipo_proyecto = 'Modificacion proyecto existente';
        }
        if(tipo_proyecto == 3)
        {
          tipo_proyecto = 'Pequeña Modificacion';
        }

       $("#tipo_proyecto").html(tipo_proyecto);

       var tipo_trabajo = response.tabla[0].tipo_trabajo;

       if(tipo_trabajo == 1)
        {
          tipo_trabajo = 'Solo por este proyecto';
        }
        if(tipo_trabajo == 2)
        {
          tipo_trabajo = 'Largo plazo';
        }

        $("#tipo_trabajo").html(tipo_trabajo);


        var cantidad_tiempo = response.tabla[0].cantidad_tiempo;
        var tiempo_entrega = response.tabla[0].tiempo_entrega;

        if(tiempo_entrega == 1)
        {
          tiempo_entrega = 'Horas';
        }
        if(tiempo_entrega == 2)
        {
          tiempo_entrega   = 'Dias';
        }
        if(tiempo_entrega == 3)
        {
          tiempo_entrega = 'Semanas';
        }
        if(tiempo_entrega == 4)
        {
          tiempo_entrega = 'Meses';
        }

        $("#cantidadTiem").html(cantidad_tiempo+" "+tiempo_entrega);

        var forma_trabajo = response.tabla[0].forma_pago;

        if(forma_trabajo == 1)
        {
          forma_trabajo = 'Por proyecto terminado';
        }
        if(forma_trabajo == 2)
        {
          forma_trabajo = 'Por horas específicas';
        }
        if(forma_trabajo == 3)
        {
          forma_trabajo = 'Part Time';
        }
        if(forma_trabajo == 4)
        {
          forma_trabajo = 'Full Time';
        }

        $("#formaP").html(forma_trabajo);


        $("#presupuesto").html('$/'+' '+ response.tabla[0].presupuesto);

        var fechaori = response.tabla[0].fecha_publicacion;

        var porcio = fechaori.split('-');

        var fechafin = porcio[2]+'/'+porcio[1]+'/'+porcio[0];


        $("#fechapubli").html(fechafin);


        var descripcion = response.tabla[0].descripcion;
        $("#descripcion").html(descripcion);


        var estado = response.tabla[0].estado;

        var txtestado = '';

        if(estado == 1)
        {
          txtestado = 'Publicado';
        }
        else if (estado == 2) {
          txtestado = 'Publicado';
        }
        else if (estado == 3) {
          txtestado = 'Evaluacion';
        }
        else if (estado == 4) {
          txtestado = 'Trabajando';
        }
        else if (estado == 5) {
          txtestado = 'Finalizado';
        }
        else {
          txtestado = 'SIN ESTADO';
        }

        $("#estado").html(txtestado);

        var habilidades = response.tabla[0].habilidades;

        $("#habilidades").val(habilidades);




   $.magnificPopup.open({
      fixedContentPos : false,
                      removalDelay: 400,
                      items: {
                        src: "#perfil-proyecto"
                      },
                      callbacks: {
                        beforeOpen: function(e) {
                          this.st.mainClass = 'mfp-newspaper';
                        }
                      },
                      midClick: true
                    });



      }
      else
      {
        mensaje('¡ERROR!','danger');
      }
    }

  });


};


$(document).on('click','.ex', function(e){
    e.preventDefault();
  // console.log($(this).html());
  var id_agre=$(this).data('agree');
  var v=$(this);
  $.ajax({
    url: 'noitf',
    type: 'POST',
    datatype: 'json',
    data:{id_agre:id_agre},
    success: function(data) {
  v.html('confirmado');
    },
    error: function(data){
           alert("ha ocurrido un error") ;
        }
  });
});

function acuerdos(titulo,pro,id,name){
// console.log(titulo,pro,id,name);
$.ajax({
  url:'usuario-detalle',
  type:'POST',
  datatype:'json',
  data:{id:titulo,id:pro,id_apply_job:titulo},
  success:function(response){
    // console.log(response);
    $("#titulo2").html("Acuerdos - "+name);
    $("#id2").val(titulo);//id_trabajo_aplicado
    $("#pro").val(pro);//id_trabajo_aplicado
    // $("#id1").val(response.proyecto[0].usuario);//usuario
    $("#id1").val(id);
    table.clear();
     $.each(response.agreements,function(indice,value){

             var decir="";
             var aconfi="";
             switch(value.state_agreement){
              case 0:
              decir="Sin Confirmar";
              break;
              case 1:
              decir="Aprobado";
              break;
             }
            if (value.id_user_get==id) {
              aconfi= '<center><a href="#" class="mostrarr" data-descripcion="'+value.agreement+'" data-acuerd="'+value.affair+'" data-id="'+value.id_agreement+'" data-file="'+value.file_name+'"><i class="fa fa-edit" id=""></i></a></center>'
              if (value.state_agreement==1) {
                aconfi="Confirmado";
              }

            }else{
              aconfi='<div data-agree="'+value.id_agreement+'" class="ex"><a href="javascript:Notif('+value.id_agreement+')" class="btn btn-primary">pAprobar</a></div>';
              if (value.state_agreement==1) {
                aconfi="Confirmado";
              }
            }
            table.row.add([
              value.date_agreement,
              value.affair,
              value.agreement,
              '<center><a href="download/'+value.id_agreement+'" class="btn-small" ><i class="fa fa-cloud-download" id="descargar"></i></a></center>',
              decir,
              aconfi
              ]);
          });
            table.draw();
  }

});
   $.magnificPopup.open({
      fixedContentPos : false,
                      removalDelay: 400,
                      items: {
                        src: "#acuerdos"
                      },
                      callbacks: {
                        beforeOpen: function(e) {
                          this.st.mainClass = 'mfp-newspaper';
                        $("#asunto").hide();
                        $("#acuerdo").hide();
                        $("#verr").hide();
                        // $("#uploader1").hide();
                        $("#añadir").hide();
                        $("#btneditar").hide();
                        }
                      },
                      midClick: true
                    });
};
$("#btneditar").on('click',function(){
  // alert($("#1").val());
  var id=$("#id1").val();
  var data = new FormData();
      data.append('file',$('input[type=file]')[0].files[0]);
      data.append('csrf-token',$('meta[name="csrf-token"]').attr('content'));
      data.append('asunto',$("#asunto").val());
      data.append('acuerdo',$("#acuerdo").val());
      data.append('ide',$("#ide").val());
      data.append('id2',$('#id2').val());
      data.append('nombre',$("#uploader1").val());
      // console.log(data);
  $.ajax({
  url:'editar',
  type:'POST',
  // datatype:'json',
  data:data,
  cache: false,
  contentType: false,
  processData: false,
  success:function(data){
    if (data.xd2==1)
    {
      alert("Archivo no permitido");
       $("#asunto").val("");
       $("#acuerdo").val("");
       $("#file").val("");
       $("#uploader1").val("");
    }
    // console.log(data);
     limpiar("f_agregar_publicacion");
    table.clear();
    $.each(data.agreements,function(indice,value){
      // console.log(value.state_agreement);
            var decir="";
             var aconfi="";
             switch(value.state_agreement){
              case 0:
              decir="Sin Confirmar";
              break;
              case 1:
              decir="Aprobado";
              break;
             }
            if (value.id_user_get==id) {
              aconfi= '<center><a href="#" class="mostrarr" data-descripcion="'+value.agreement+'" data-acuerd="'+value.affair+'" data-id="'+value.id_agreement+'" data-file="'+value.file_name+'"><i class="fa fa-edit" id=""></i></a></center>'
              if (value.state_agreement==1) {
                aconfi="Confirmado";
              }
            }else{
              aconfi='<div data-agree="'+value.id_agreement+'" class="ex"><a href="javascript:Notif('+value.id_agreement+')" class="btn btn-primary">pAprobar</a></div>';
              if (value.state_agreement==1) {
                aconfi="Confirmado";
              }
            }
            table.row.add([
              value.date_agreement,
              value.affair,
              value.agreement,
              '<center><a href="download/'+value.id_agreement+'" class="btn-small" ><i class="fa fa-cloud-download" id="descargar"></i></a></center>',
              decir,
              aconfi
              ]);
          });
            table.draw();
  }
});
});
 $(document).on('click','.mostrarr', function(e){
    e.preventDefault();
    // console.log($(this).data('file'));
if (ver==0) {
  ver =1;
   $("#ide").val($(this).data('id'));
   // $("#2").val($(this).data('acuerd'));
   // $("#3").val($(this).data('file'));
  // console.log(ver);
$("#asunto").show();
$("#acuerdo").show();
$("#verr").show();
// $("#añadir").show();
$("#btneditar").show();
}else {
  ver =0;
 $("#asunto").hide();
$("#acuerdo").hide();
$("#verr").hide();
$("#añadir").hide();
$("#btneditar").hide();
}
$("#asunto").val($(this).data('acuerd'));
$("#acuerdo").val($(this).data('descripcion'));
//$("#uploader1").val($(this).data('file'));
// $("#file").val($(this).data('doc'));
 });

$(document).on("submit",".formarchivo",function(e){
        e.preventDefault();
        var id=$("#id1").val();
        var data = new FormData();
        data.append('file',$('input[type=file]')[0].files[0]);
        data.append('csrf-token',$('meta[name="csrf-token"]').attr('content'));
        data.append('asunto',$('#asunto').val());
        data.append('id1',$('#id1').val());
        data.append('id2',$('#id2').val());
        data.append('id31',$('#id31').val());
        // data.append('pro',$('#pro').val());
        data.append('acuerdo',$('#acuerdo').val());
        $.ajax({
            url: 'agregar_publicacion_usuario',
            type: 'POST',
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data){
              // console.log(data.xd);
              if(data.xd == 1)
              {
                alert("Archivo no permitido");
                $("#asunto").val("");
                $("#acuerdo").val("");
                $("#file").val("");
                $("#uploader1").val("");
              }
              table.clear();
          if (data.ver==true) {
          limpiar("f_agregar_publicacion");
          // console.log("Guardado Correctamente")

          $.each(data.agreements,function(indice,value){
           var decir="";
             var aconfi="";
             switch(value.state_agreement){
              case 0:
              decir="Sin Confirmar";
              break;
              case 1:
              decir="Aprobado";
              break;
             }
            if (value.id_user_get==id) {
              aconfi= '<center><a href="#" class="mostrarr" data-descripcion="'+value.agreement+'" data-acuerd="'+value.affair+'" data-id="'+value.id_agreement+'" data-file="'+value.file_name+'"><i class="fa fa-edit" id=""></i></a></center>'
              if (value.state_agreement==1) {
                aconfi="Confirmado";
              }
            }else{
              aconfi='<div data-agree="'+value.id_agreement+'" class="ex"><a href="javascript:Notif('+value.id_agreement+')" class="btn btn-primary">pAprobar</a></div>';
              if (value.state_agreement==1) {
                aconfi="Confirmado";
              }
            }
            table.row.add([
              value.date_agreement,
              value.affair,
              value.agreement,
              '<center><a href="download/'+value.id_agreement+'" class="btn-small" ><i class="fa fa-cloud-download" id="descargar"></i></a></center>',
              decir,
              aconfi
              ]);
          });
            table.draw();
          }
          // console.log(data);
          // alert(data.asunto);
        },
        //si ha ocurrido un error
        error: function(data){
           alert("ha ocurrido un error") ;

        }
    });
});

function limpiar(form){
document.getElementById(form).reset();
}



$("#añadir-acuerdo").click(function(){
  $("#acuerdo").val("");
  $("#asunto").val("");
// console.log(ver);
// alert("fds");
// var ver=1;
if (ver==0) {
  ver =1;
  // console.log(ver);
$("#asunto").show();
$("#acuerdo").show();
$("#verr").show();
$("#añadir").show();
$("#btneditar").hide();
}else {
  ver =0;
 $("#asunto").hide();
$("#acuerdo").hide();
$("#verr").hide();
$("#añadir").hide();
$("#btneditar").hide();
}
});

$("#editar").click(function(){
  // alert("asdas");
  $("#ver2").hide();
  $("#prec").show();
  $("#editar").hide();
  $("#cerrar").hide();
  $("#guardar").show();
  $("#cancelar").show();
  $("#ver3").hide();
  $("#mostrar_div_t").show();

});

$("#cancelar").click(function(){
  $("#ver2").show();
  $("#editar").show();
  $("#cerrar").show();
  $("#prec").hide();
  $("#guardar").hide();
  $("#cancelar").hide();

  $("#ver3").show();
  $("#mostrar_div_t").hide();
});

$("#cerrar").click(function(){
    $.magnificPopup.close({
      fixedContentPos : false,
                      removalDelay: 400,
                      items: {
                        src: "modal-form"

                      },
                      callbacks: {
                        beforeOpen: function(e) {
                          this.st.mainClass = 'mfp-newspaper';
                        }
                      },
                      midClick: true
                    });

});
$("#cerrar2").click(function(){
    $.magnificPopup.close({
      fixedContentPos : false,
                      removalDelay: 400,
                      items: {
                        src: "usuario"

                      },
                      callbacks: {
                        beforeOpen: function(e) {
                          this.st.mainClass = 'mfp-newspaper';
                        }
                      },
                      midClick: true
                    });

});
$("#cerrar3").click(function(){
    $.magnificPopup.close({
      fixedContentPos : false,
                      removalDelay: 400,
                      items: {
                        src: "proyecto_perf"

                      },
                      callbacks: {
                        beforeOpen: function(e) {
                          this.st.mainClass = 'mfp-newspaper';
                        }
                      },
                      midClick: true
                    });

});

$("#cerrar4").click(function(){
    $.magnificPopup.close({
      fixedContentPos : false,
                      removalDelay: 400,
                      items: {
                        src: "perfil-proyecto"

                      },
                      callbacks: {
                        beforeOpen: function(e) {
                          this.st.mainClass = 'mfp-newspaper';
                        }
                      },
                      midClick: true
                    });

});
$("#contrar3u").click(function() {
  $.magnificPopup.close({
    fixedContentPos : false,
                    removalDelay: 400,
                    items: {
                      src: "usuarios"

                    },
                    callbacks: {
                      beforeOpen: function(e) {
                        this.st.mainClass = 'mfp-newspaper';
                      }
                    },
                    midClick: true
                  });
});
$("#cerrar4").click(function(){
    $.magnificPopup.close({
      fixedContentPos : false,
                      removalDelay: 400,
                      items: {
                        src: "acuerdos"

                      },
                      callbacks: {
                        beforeOpen: function(e) {
                          this.st.mainClass = 'mfp-newspaper';
                        }
                      },
                      midClick: true
                    });

});
