$(document).ready(function(){
$("#tiempo").on('blur',function(e){
calcular();
})
$("#complejidad").on('change',function(){
 if($("#tiempo").val().trim()!="" && $("#tipo_tiempo").val()!="") {
  calcular();
}
else
{
  mensaje("Para calcular el monto, seleccione tiempo de entrega",'danger');
}
  
}) 


$("#tipo_tiempo").on('change',function(){
  calcular();
})
});
$("#titulo").on('keypress',function(e){
  if (e.which==13) {
    $("#next").click();
  }
});


function calcular(){
      var complejidad= $("#complejidad").val();
    var cantidad = $("#tiempo").val();
    var valor=0;
    var tiempo=0;
    switch(complejidad){
      case '1': 
        valor=30;
      break;
      case '2': 
        valor=20;
      break;
      case '3': 
        valor=10;
      break;
      case '4': 
        valor=5;
      break;
    }
var tiempo_entrega= $("#tipo_tiempo").val();
    switch(tiempo_entrega){
      case '1': 
       tiempo=cantidad;
      break;
      case '2': 
        tiempo=cantidad*8;
      break;
      case '3': 
        tiempo=cantidad*40;
      break;
      case '4': 
        tiempo=cantidad*40;
      break;
    }
$("#aproximado").val(tiempo*valor);
}



    var tabla = $('#datatable2').DataTable({
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
        [5, 10, 25, 50, -1],
        [5, 10, 25, 50, "All"]
      ],
      "sDom": '<"dt-panelmenu  clearfix" lfr>t<"dt-panelfooter  clearfix"pi>',
      "oTableTools": {
        "sSwfPath": "vendor/plugins/datatables/extensions/TableTools/swf/copy_csv_xls_pdf.swf"
      }
    });
 
// $(".btn-danger").on('click',function(){
//       var id=$(this).data("id");
//    
//       $.ajax({
//             url:"borrar/proyecto/"+id,
//             type:'POST',
//             dataType:"JSON",
//             data:{"id":id},
//             success:function(response){
//                   // console.log(response);
//             // var tabla=$("#datatable2").dataTable();
//             var fila=("#datatable2 tr");
//             tabla.row($('#tr_'+id).closest('tr')).remove().draw();
//             console.log("exito");
//             }
//       });
// });



function eliminar(x)
{
  bootbox.confirm({
    message:"¿Desea Eliminar su Requerimiento?",
    callback:function(result){
  var id = $(x).attr("data-id");
      if (result==true) {
  $.ajax({
        url:"borrar/proyecto/"+id,
        type: 'POST',
        dataType: "JSON",
        data: {"id":id}, 
        success:function(response)
        {
          mensaje("Se Elimino Correctamente","error");
          tabla.row($('#tr_'+id).closest('tr')).remove().draw();
        }
  });
        
      }
    }
  });
  

}

function modalupdate(x)
{


  var cod = $(x).attr("data-id");

  var arrayid = ["#1","#2","#3","#4","#5","#6","#7","#8","#9","#10","#11","#12"];
  arrayid.forEach(function(element)
  {
    $(element).removeClass('demo-grid active').addClass('demo-grid');
  });



  $.ajax({
        url:"modalproyect",
        type: 'POST',
        dataType: "JSON",
        data: {"cod":cod},
        success:function(response)
        { 

          if(response.dato == 1)
          {
            $.magnificPopup.open({
              fixedContentPos : false,
                              removalDelay: 400,    
                              items: {
                                src: "#modal-text"
        
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
     
            $("#titulo").val(response.dato[0].titulo);
            $("#descripcion").val(response.dato[0].descripcion);
            var xdd = "#"+response.dato[0].categoria;


            $(xdd).removeClass('demo-grid').addClass('demo-grid active');



            
            $("#forma_trabajo").val(response.dato[0].forma_pago);
            $("#tipo_trabajo").val(response.dato[0].tipo_trabajo);
            $("#tipo_proyecto").val(response.dato[0].tipo_proyecto);
            $("#complejidad").val(response.dato[0].complejidad);
            $("#tipo_tiempo").val(response.dato[0].tiempo_entrega);
            $("#tiempo").val(response.dato[0].cantidad_tiempo);
            $("#aproximado").val(response.dato[0].calculo);
            $("#propio_presupuesto").val(response.dato[0].presupuesto);
            $("#next").attr("data-id",response.dato[0].id);
            
            
            $("#adquirir").attr("href","pago_paypal/"+response.dato[0].id);


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
          $("#inicio").click();           
          }



        }
  });



}



function abrirespere()
{
   $.magnificPopup.open({
      fixedContentPos : false,
                      removalDelay: 400,    
                      items: {
                        src: "#espere"

                      },
                      callbacks: {
                        beforeOpen: function(e) {
                          this.st.mainClass = 'mfp-newspaper';
                        }
                      },
                      midClick: true
                    }); 
}

function cerrarespere()
{
  $.magnificPopup.close();
}



function mostrar(div){
  var d =div+1;  
  $(".div-center").hide()
  $(".div-"+d).show();
}
function error(){
  $(".btn-prev").click();
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

