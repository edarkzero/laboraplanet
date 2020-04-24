// var titulo,descripcion,categoria,f_trabajo,t_trabajo,t_proyecto,t_complejidad,t_entrega,t_tipo_tiempo,precio,conocimientos,
$(document).ready(function(){
    
  document.getElementById("o_categoria").addEventListener('keypress',function(e){
        var ca_v = this.value;
      if(e.keyCode==13){ 
           document.getElementById('next').click();
           /*  $.ajax({
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
                       //advertencia_
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
                    }else{
                        //
                    }
                }
            })*/
        }
        //console.log()
        
    });
    
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
        tiempo=cantidad*160;
      break;
    }
$("#aproximado").val(tiempo*valor);

}


// function validar(div){
//   if (div==0) {
//     mostrar(div);
//   }
//   if (div==1) {
//     if ($("#titulo").val().trim()!=""){
//         mostrar(div);
//     }else{
//        mensaje('Complete el campo titulo','danger');
//      error();
//       return false;
//     }
//   }
//    if (div==2) {
//     if ($("#descripcion").val().trim()!=""){
//         // alert("siga");
//         mostrar(div);
//     }else{
//          mensaje('Complete el campo descripcion','danger');
//       error()
//       return false;
//     }
//   }
//   if (div ==3) {
//     var cd = $(".demo-grid.active").attr('id');
//     if (cd ==null ) {
//       if ($("#o_categoria").val()=="") {
//             mensaje('Seleccione una categoria','danger');
//         error();
//          return false;
//       }else{
//         mostrar(div);
//       }
//     }else{
//       mostrar(div);
//     }
//     return false;
//   }
//   if (div==4) {
//       var a ={};
//         a.tipo_trabajo =$("#tipo_trabajo").val();
//         a.forma_trabajo=$("#forma_trabajo").val();
//         // console.log(a);
//     if (verificar(a)) {     
//       mostrar(div);
//     }else{
//             mensaje('Seleccione los datos','danger');
//       error();
//       return false;
//     }
//   }
//   if (div==5) {
//     var a ={};
//     a.tipo_proyecto=$("#tipo_proyecto").val();
//     a.complejidad=$("#complejidad").val();
//     a.tiempo=$("#tiempo").val();
//     a.tipo_tiempo=$("#tipo_tiempo").val();
//     if (verificar(a)) {
//       if ($("#propio_presupuesto").val()=="" && $("#aproximado").val()=="") {
//               mensaje('Complete los datos','danger');
//         error();
//         return false;
//       }else{
//           $(".tags").html('');
//       mostrar(div);
//       // console.log($(".demo-grid.active").attr('id')+"------1");
//       var array = [];
//       $.ajax({
//         url:'llenarhabilidad',
//         type:'POST',
//         dataType:'json',
//         data:{codcat:$(".demo-grid.active").attr('id')},
//         success:function(response)
//         {
//           $("#input-co").html('<input type="text" id="tagmanager" class="form-control tm-input">');
//           $.each(response.habilidades,function(key,value) {
//             array.push(value.ability);
//           });
//           // console.log(array);
//           $(".tm-input").tagsManager({
//           tagsContainer: '.tags',
//           prefilled:array,
//           tagClass: 'tm-tag-info',
//         });

//         }
//       });
     

//       // $("#conocimientos").html();
   
//       }
//     }else{
//        mensaje('Complete los datos','danger');
//       error();
//       return false;
//     }
//   }
//   // if (div==6) {}
//   return true;
// }

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


function guardar(){
  var titulo,descripcion,categoria,f_trabajo,t_trabajo,t_proyecto,t_complejidad,t_entrega,t_tipo_tiempo,precio,propio_presupuesto,conocimientos,
  titulo = $("#titulo").val();
  descripcion=$("#descripcion").val();
  categoria =  $(".demo-grid.active").attr('id');
  f_trabajo =$("#forma_trabajo").val();
  t_trabajo=$("#tipo_trabajo").val();
  t_proyecto=$("#tipo_proyecto").val();
  t_complejidad= $("#complejidad").val();
  t_entrega = $("#tiempo").val();
  t_tipo_tiempo= $("#tipo_tiempo").val();
  precio =$("#aproximado").val();
  propio_presupuesto =$("#propio_presupuesto").val();
  conocimientos=$("input[name=hidden-undefined]").val();
  if (categoria==null) {
    categoria=$("#o_categoria").val();
  }

  $.ajax({
    url:'publicar_trabajo/subir',
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
    },
    type:'POST',
    datatype:'json',
    success:function(response){
      // console.log(response);
      if (response.respuesta==true)   {
        // console.log(response.respuesta);
      }else{
        alert("error");
      }
    }
  });
}