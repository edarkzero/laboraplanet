var ver=0;
var tabl = $('#datatable20').DataTable({

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
var table = $('#datatas').DataTable({

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


//onclick="liberar(this)"

 $("#cambiarl").on('click',function() {
    $("#cambiarl").html('Liberar fondos');
    $("#cambiarl").attr('onclick','liberar(this)');
     mensaje('Usted está a punto de aprobar la entrega total y satisfactoria del requerimiento por parte del colaborador.');
 });

$(document).on('click','.ex', function(e){
    e.preventDefault();

    var id_agre=$(this).data('agree');
    var v=$(this);
    $.ajax({
    url: '../noitf-aspi',
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

$("#guardar").on('click',function(e){

  var id = $(this).data('id');

  var codigo = $(this).data('c');
  var project = $(this).data('p');
  var descr = $("#comments").val();
  var estr = $("#invi").val();
  $.ajax({
    data:{usuario:codigo,proyecto:project,comentario:descr,califica:estr},
    dataType:'json',
    type:'POST',
    url:'../guardar-comentario',
    success:function(response){

      if (response.mensaje==true) {
        $("#comments").val("");
        $("#tr_"+id+" td:nth-child(5)").html("Terminado");
        mensaje("Se califico al usuario correctamente","success");

      }else{
        mensaje("Error no se pudo calificar al usuario","error");
      }
      $(".mfp-close").click();
      }
  });
  
})

function acuerdos(id,id2,titulo){

$("#titulo2").html("Acuerdos - "+titulo);
$("#id1").val(id);  //id_trabajo_aplicado //agreement apply_job
$("#usua").val(id2);

$.ajax({
  url:'../aspirante-usuario',
  type:'POST',
  datatype:'json',
  data:{id:id},
  success:function(response){
  
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
            if (value.id_user_get==id2) {
              aconfi= '<center><a href="#" class="mostrarr" data-descripcion="'+value.agreement+'" data-acuerd="'+value.affair+'" data-id="'+value.id_agreement+'" data-file="'+value.file_name+'"><i class="fa fa-edit" id=""></i></a></center>'
              if (value.state_agreement==1) {
                aconfi="Confirmado";
              }
            }else{
              aconfi='<div data-agree="'+value.id_agreement+'" class="ex"><a href="javascript:Notif('+value.id_agreement+')" class="btn btn-primary">Aprobar</a></div>';
            if (value.state_agreement==1) {
                aconfi="Confirmado";
              }
           }
            table.row.add([
              value.date_agreement,
              value.affair,
              value.agreement,
              '<center><a href="../download/'+value.id_agreement+'" class="btn-small" ><i class="fa fa-cloud-download" id="descargar"></i></a></center>',
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
 $(document).on('click','.mostrarr', function(e){
    e.preventDefault();
   
if (ver==0) {
  ver =1;
   $("#ide").val($(this).data('id'));
   // $("#2").val($(this).data('acuerd'));
   // $("#3").val($(this).data('file'));
 
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


$("#btneditar").on('click',function(){
  // alert($("#1").val());
  var id=$("#usua").val();
  var data = new FormData();
      data.append('file',$('input[type=file]')[0].files[0]);
      data.append('csrf-token',$('meta[name="csrf-token"]').attr('content'));
      data.append('asunto',$("#asunto").val());
      data.append('acuerdo',$("#acuerdo").val());
      data.append('ide',$("#ide").val());
      data.append('id1',$('#id1').val());
      data.append('nombre',$("#uploader1").val());
      
  $.ajax({
  url:'../editar-aspi',
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
    limpiar("f_agregar_publicacion");
   
    table.clear();
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
              '<center><a href="../download/'+value.id_agreement+'" class="btn-small" ><i class="fa fa-cloud-download" id="descargar"></i></a></center>',
              decir,
              aconfi
              ]);
          });
            table.draw();
  }
});
});


$(document).on("submit",".formarchivo",function(e){
        e.preventDefault();
        var id=$("#usua").val();
        var data = new FormData();
        data.append('file',$('input[type=file]')[0].files[0]);
        data.append('csrf-token',$('meta[name="csrf-token"]').attr('content'));
        data.append('asunto',$('#asunto').val());
        data.append('id1',$('#id1').val());
        data.append('usua',$('#usua').val());
        data.append('acuerdo',$('#acuerdo').val());
        $.ajax({
            url:'../agregar_publicacion_aspirante',
            type:'POST',
            data:data,
            cache:false,
            contentType:false,
            processData:false,
            success: function(data){
             
              if (data.xd==1) {
                alert("Archivo no permitido");
                $("#asunto").val("");
                $("#acuerdo").val("");
                $("#file").val("");
                $("#uploader1").val("");
              }
              table.clear();
              if (data.ver==true) {
                limpiar("f_agregar_publicacion");
               
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
              '<center><a href="../download/'+value.id_agreement+'" class="btn-small" ><i class="fa fa-cloud-download" id="descargar"></i></a></center>',
              decir,
              aconfi
              ]);
          });
            table.draw();
          }
        
        //   alert(data.asunto);
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

function eliminar(x){
  // var us=$(usu).attr("data-usu");
  var usuario=$(x).attr("data-usuas");
  bootbox.confirm({
        // size: "small",
  message:"¿Desea Eliminar al Aspirante de su Proyecto?",
  title: "Aspirante "+" "+usuario,
  callback:function(result){
  // alert("wq");
  var id = $(x).attr("data-id");

  if(result == true){
  $.ajax({
    url:"../borrar/aspi/"+id,
    type: 'POST',
    dataType: "JSON",
    data: {"id":id},
    success:function(response)
    {
      mensaje("Se Elimino Correctamente","error");
      
      tabl.row($('#tr_'+id).closest('tr')).remove().draw();

    }
  });
 }
    }
  });
}

$("#añadir-acuerdo").click(function(){

// alert("fds");
// var ver=1;
if (ver==0) {
  ver =1;
  
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



// -------------------- boton para cerrar todos los modal con el boton cerrar --------------------//
$(document).on('click','.exe', function(e){
    e.preventDefault();
$.magnificPopup.close();

    });


function liberar(x)
{
  var codigo = $(x).attr('data-id');
  var codigo_p = $(x).data('proyecto');
  var codigou = $(x).data('id_usuario');

  $.ajax({
      url:'../modalliberarfondos',
      type:'POST',
      datatype:'json',
      data:{codigo:codigo},
      success:function(response)
      {
        //console.log(response);
            $("#nompro1").html(response.dato[0].titulo);
            $("#nomcli1").html(response.dato[0].usuario);
            $("#nomcli11").html(response.dato[0].usuario);
            $("#money1").html(response.dato[0].economic_proposal);
      }
  });

  $.magnificPopup.open({
      fixedContentPos : false,
                      removalDelay: 400,
                      items: {
                        src: "#liberar-fondos"

                      },
                      callbacks: {
                        beforeOpen: function(e) {
                          this.st.mainClass = 'mfp-newspaper';
                        }
                      },
                      midClick: true
                    });
}





function modalxd(x)
{


var codigo = $(x).attr('data-id');
var codigo_p = $(x).data('proyecto');
var codigou = $(x).data('id_usuario');

  $.ajax({
        url:'../modalaspirante',
        type:'POST',
        datatype:'json',
        data:{codigo:codigo},
        success:function(response)
        {
            //console.log(response);
            $("#nompro").html(response.dato[0].titulo);
            $("#nomcli").html(response.dato[0].usuario);
            $("#nomcli1").html(response.dato[0].usuario);
            $("#money").html(response.dato[0].economic_proposal);
            $("#redi").attr("data-id",codigo);
            $("#redi").attr("data-proyecto",codigo_p);
            $("#redi").attr("data-id_usuario",codigou)
        }


        });

  $.magnificPopup.open({
      fixedContentPos : false,
                      removalDelay: 400,
                      items: {
                        src: "#update"

                      },
                      callbacks: {
                        beforeOpen: function(e) {
                          this.st.mainClass = 'mfp-newspaper';
                        }
                      },
                      midClick: true
                    });
}

function redict(x)
{
  var codigo = $(x).attr("data-id");
  var codigop = $(x).data('proyecto');
  var codigou = $(x).data('id_usuario');
  window.location = "../pago/"+codigou+"/"+codigop;
}

function modals(x){
$("#comments").val("");
  // console.log(x);
  var c = $(x).data('id_usuario');
  var p = $(x).data('proyecto');
  var id = $(x).data('id');
  $("#guardar").attr('data-c',c);
  $("#guardar").attr('data-p',p);
  $("#guardar").attr('data-id',id);
    $.magnificPopup.open({
      fixedContentPos : false,
                      removalDelay: 400,
                      items: {
                        src: "#evaluar"

                      },
                      callbacks: {
                        beforeOpen: function(e) {
                          this.st.mainClass = 'mfp-newspaper';
                        }
                      },
                      midClick: true
                    });
}
