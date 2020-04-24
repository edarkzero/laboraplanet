$(document).ready(function() {
    $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }   
      });

   
    $("#form-pass").submit(function(e) {
        e.preventDefault();
          var pass_ant = $("#pass_ant").val();
          var new_pass = $("#new_pass").val();
          var new_pass_con = $("#new_pass_con").val();

          if(new_pass!=new_pass_con)
          {
            nosoniguales();
          }
          else
          {
                      $.ajax({
            url: 'cambio',
            type:'POST',
            dataType:'json',
            data:{pass_ant:pass_ant,new_pass:new_pass,new_pass_con:new_pass_con},

      beforeSend:function(){
        $("#1div").hide();
        $("#gif").show();
       },

            success:function(response)
            {
                switch(response.message)
                {
                    case 0:
                     noespassanterior();
                      $("#1div").show();
                      $("#gif").hide();
                    break;

                    case 1:
                    nosoniguales();
                      $("#1div").show();
                      $("#gif").hide();
                    break;

                    case 2:
                    $("#gif").hide();
                    desabilita();
                    mostrar();  
                    break;

          

                }

            }

         });
          }



    

    });




    $("#confirmacion").click(function(){
    	var new_pass = $("#new_pass").val();
    	var codigo = $("#codigo").val();


    	

    	$.ajax({
    		url:'confirm',
    		type:'POST',
    		dataType:'json',
    		data:{new_pass:new_pass,codigo:codigo},
    		success:function(response)
    		{
    			switch(response.message)
    			{
    				case 0:
    				passactualizada2();
            passactualizada();
    				break;

    				case 1:
    			     noeselcodigo();
    				break;
    			}
    		}
    	});
    });



$("#baja").on('click',function() {


  bootbox.confirm({
        // size: "small",
  message:"Estas a punto de desactivar tu cuenta, perderás muchas oportunidades de trabajar por el mundo",
  buttons: {
    confirm: {
        label: 'Continuar de todas formas',
        //className: 'btn-success'
    },
    cancel: {
        label: 'Cancelar',
        //className: 'btn-danger'
    }
},
  title: "A T E N C I Ó N ",
  callback:function(result){

  if(result == true){

        $.ajax({
              url:'baja',
              type:'POST',
              dataType:'json',
              data:{},

              beforeSend: function() {
                   mensaje('Tu cuenta se ha dado de baja. Le enviaremos un correo.','danger');
               },
              success:function(response)
              {
                  function irxd()
                  {
                    location.href='logout';    
                   }
                   
                   setTimeout(irxd,2000);
                  
              }
        });

        }
    else {
      location.href = 'perfil';
    }

    }
  });

});


    $("#form-correo").submit(function(e) {
        e.preventDefault();
        var new_correo = $("#new_correo").val();
            $.ajax({
            url:'cambiocorreo',
            type:'POST',
            dataType:'json',
            data:{new_correo:new_correo},

          beforeSend:function(){
        $("#primerdiv").hide();
        $("#gif2").show();
       },

            success:function(response)
            {
                switch(response.message)
                {
                    case 1:
                    $("#gif2").hide();
                     ocultar();
                     $("#nuevocorreo").html(new_correo);
                    break;
                }
            }
        });

    });

;


    $("#confirmacion_correo").click(function() {
    	var new_correo = $("#new_correo").val();
    	var codigo_correo = $("#codigo_correo").val();

    	$.ajax({
    		url:'confirm_correo',
    		type:'POST',
    		dataType:'json',
    		data:{new_correo:new_correo,codigo_correo:codigo_correo},
    		success:function(response)
    		{
    			switch(response.message)
    			{
    				case 0:
    				correocambiado();	
    				break;

    				case 1:
    				noeselcodigo();
    				break;
    			}
    		}
    	});

    });





});



function rconfirmacion(x) 
{
  var x = $(x).data('correo');

  $.ajax({
    url:'rconfirmacion',
    type:'POST',
    dataType:'json',
    data:{x:x},

    beforeSend:function()
    {
      $("#ocultar").hide();
      $("#mostrar").show();
    },
    success:function(response)
    {
      $("#mostrar").hide();
      $("#ocultar").show();

      mensaje('Mensaje enviado','success');
    }

  });

}


function mostrar() {
  $("#1div").hide();
		
  $("#efecto").show();
}


function desabilita() {
document.getElementById('cambiar').disabled=true;
}

function ocultar() {
	//$("#primerdiv").hide();
	$("#segundodiv").show();	
}



// ------ NOTIFICACIONES ------- //


function noespassanterior()
{
   $.notify(   
 "¡ La contraseña anterior no es la misma !", 
  { position:"left middle",
    className: 'error',
   }
  )
}

function noeselcodigo()
{
    $.notify(
     "¡ El codigo no es el verdadero !",
     {position:"left middle",
     className: 'error', 
     }   
     )
}


function correocambiado()
{
    bootbox.alert({
    message: "¡ Su correo electronico se ha actualizado !",
    className: 'rubberBand animated',
  
    
});
      location.href="perfil";
}


function passactualizada2()
{

bootbox.alert({
    message: "¡ Su contraseña se ha actualizado !",
    className: 'rubberBand animated',
    
});
}

function passactualizada()
{
    location.href="perfil";

}

function nosoniguales()
{
    $.notify(
   "¡ Las contraseñas actuales no son las mismas !",     
    {position: 'left middle',
    className: 'warn',  
    }    
    )
}

