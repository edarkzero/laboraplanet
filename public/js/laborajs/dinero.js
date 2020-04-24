$(".select2").select2({
		placeholder:'País tarjeta'
	});
$("#ciudad").select2({
placeholder:'Ciudad tarjeta'
});

     $('.dateee').mask('99/99');


	    var tabla = $('#datatable1').dataTable({
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
      var tabla2 = $('#datatable2').dataTable({
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
      var tabla3 = $('#datatable3').DataTable({
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
        $(".mostrar").on('click',function(){
    var id =$(this).data('m');


    $(".panel-mostrar").hide();
    $(".m"+id).show();

  })




$("#pais").on('change',function(){
  $("#ciudad").html('<option></option>');
  var pais = $("#pais").val();
    $.ajax({
        url:'perfil/ciudad',
        type:'POST',
        datatype:'json',
        data:{pais:pais},
        success:function(response){
          $.each(response.ciudad,function(indice,value){
            $("#ciudad").append('<option value="'+value.id_departament+'">'+value.name_departament+'</option>');
          });
        }
      });
})

$("#formulario2").submit(function(e){
  e.preventDefault();
  // console.log($("#numero_tarjeta_p").val());
  var a = {};
  a.tipo = 2;
  a.type_card_bancaria = $("#numero_tarjeta_p").val();
  a.name_headline = $("#nombre_titular_p").val();
  if (verificar(a)) {
    enviar_f(a);
    // console.log(1);
  }else{
    alert("Complete los datos")
  }

})
$("#formulario1").submit(function(e){
  e.preventDefault();
  // console.log("1");
  var a ={};
   a.tipo = 1;
  a.type_card_bancaria =$("#tipo_t").val();
  a.number_account= $("#n_tarjeta").val();
  a.code_security = $("#codigo_s").val();
  a.date_expitry = $("#fecha_v").val();
  a.name_headline = $("#nombre_t").val();
  a.last_name_headline = $("#apellido_t").val();
  a.address = $("#direccion").val();
  a.country = $("#pais").val();
  a.city = $("#ciudad").val();
  a.state_or_province = $("#provincia").val();
  a.code_postal = $("#codigo_p").val();
  if (verificar(a)) {
    enviar_f(a);
    // console.log(1);
  }else{
    alert("Complete los datos")
// console.log(2);
  }
})
$("#formulario3").submit(function(e){
  e.preventDefault();
// console.log("3");
var a  ={};
  a.tipo = 2;
a.type_card_bancaria = $("#numero_tarjeta_p2").val();
  if (verificar(a)) {
    enviar_f(a)
    // console.log(1);
  }else{
    alert("Complete los datos")
// console.log(2);
  }
})

// $(".btn.btn-rounded.btn-danger").on('click',function(){
//   var id = $(this).data('id');
//   console.log("sad");
//   var c = 0;
//   
//   $.ajax({
//     url:'dinero/eliminar',
//     data:{id:id},
//     datatype:'json',
//     type:'POST',
//     success:function(response){

//       // console.log(response[0]);
//       if (response[0]==true) {
//         tabla3.row(tr).remove().draw();
//         alert("eliminado");
//       }else{
//         alert("error");
//       }

//     }
//   });
// })

$("#datatable3").on('click','.btn.btn-rounded.btn-danger',function(e){
   var id = $(this).data('id');
  // console.log("sad");
  var c = 0;
  var tr = $(this).parentsUntil('.fila');
  var tr2 = $(this).closest('tr');
  // console.log(tr.html());
   $.ajax({
    url:'dinero/eliminar',
    data:{id:id},
    datatype:'json',
    type:'POST',
    success:function(response){

      // console.log(response[0]);
      if (response[0]==true) {
        tabla3.row(tr).remove().draw();
        tabla3.row(tr2).remove().draw();
        alert("eliminado");
      }else{
        alert("error");
      }

    }
  });
})
function limpiarselect2(array){
  $.each(array,function(indice,value){
    $("#"+value).val('').trigger('change');
  })
}


function limpiar(form){
document.getElementById(form).reset();
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

function enviar_f(a){
  $.ajax({
    url:'cuentas',
    datatype:'json',
    data:a,
    type:'POST',
    success:function(response){

      // console.log(response);
    }
  })
}