 $(document).on('click','.pagination a', function(e){
      e.preventDefault();

      var page=$(this).attr('href').split('page=')[1];
      var route="trabajadores";
            

      $.ajax({ 
            url:route,
            data:{txtbusqueda:titulo,page:page,precio:precio,paiss:pais},
            type:'GET',
            dataType:'json',
            success:function(data){

                  $("#trabajadores_paginate").html(data);
            }
      });



    });

$(document).ready(function(){
$(document).on('click','.favorite',function(){
    var id = $(this).data('id');
    // console.log(id);
    $.ajax({
      url:'trabajadores_favoritos/agregar',
      data:{id:id},
      datatype:'json',
      type:'POST',
      success:function(response){
        if (response.enviar==true) {

          mensaje("Se agrego correctamente","success")
        }else{
          if (response.enviar=="existe") {
            mensaje("Ya esta registrado","warning")
          }else{
            mensaje("Ocurrio un error al contratar",'error');
          }
        }
        // console.log(response);
      }
    })
})
  $(document).on('click',".contactar",function(){
    var id = $(this).data('id');
    //     document.getElementById("accion").setAttribute('val',id);
    // document.getElementById("accion").click()
    $.ajax({
      url:'agregar_c',
      type:'POST',
      dataType:'json',
      data:{
        id:id
      },
      success:function(response){
        let v = response.v;
        if (v==2) {
          window.location='lista_chat?c='+id;
        }else{
          if (v==1) {
            window.location='lista_chat?c='+id;
          }else{
              if(v==3){
                  mensaje("Usted no se puede contactar asi mismo",'warning');
              }else{
               mensaje("No se puede contratar al mismo usuario",'error');   
              }
          }
        }
        // console.log(response);
      }
    });

  });

})


  //  function IrPerfil(x)
  // {
  // var codigo = $(x).attr('id');



  // }