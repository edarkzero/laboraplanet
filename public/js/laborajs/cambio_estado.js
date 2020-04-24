$(document).ready(function() {
    $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }   
      });









});


function cerrarmodal()
{
  $.magnificPopup.close();
  $("#correo_amigo").val("");
  $("#comentario").val("");
}


function notifyActivo()
{
   $.notify(   
 "Su estado actual es : Activo!", 
  { position:"right middle",
    className: 'success',
   }
  )
}

function notifyInactivo()
{
   $.notify(   
 "Su estado actual es :  Inactivo!", 
  { position:"right middle",
    className: 'error',
   }
  )

}