$(document).ready(function() {
    $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }   
      });



    $("#contact").on('submit',function(e) {
        e.preventDefault();
        var email = $("#email").val();

        $.ajax({
          url:'recuperarcorreo',
          dataType:'JSON',
          type:'POST',
          data:{email:email},

            beforeSend:function(){
              $("#contact").hide();
              $("#paragif").show();
            },
            success:function(response)
            {
                switch(response.message)
                {
                  case 0:
                  mensaje('Correo de usuario no existente en LaboraPlanet','danger');
                  $("#paragif").hide();
                  $("#contact").show();
                  break;

                  case 1:
                  mostrar();
                  $("#reenviar").attr('data-correo',email);
                  $("#correousu").val(email);
                  break;
                }
            }


          

        });
    });


    $("#confirm").on('submit',function(e){
        e.preventDefault();

        var correo = $("#reenviar").data('correo');
        var token = $("#codigo").val();

        $.ajax({
          url:'confirmartoken',
          type:'POST',
          dataType:'json',
          data:{correo:correo,token:token},
          success:function(response)
          {
              switch(response.confir)
              {
                case 0:
                mensaje('Código de verificación inválido.','danger');
                break;

                case 1:
                mostrar2();
                break;
              }
          }

        });
    });




});

function envioemail(x)
{
  var email = $(x).data("correo");

  $.ajax({
    url:'envioemail',
    type:'POST',
    dataType:'JSON',
    data:{email:email},


       beforeSend:function(){
          $("#reenvio").hide();
            },
    success:function(response)
    {
       mensaje('Mensaje de correo electronico enviado','success');
    }

  });

}


function mostrar()
{
    $("#paragif").hide();
    $("#mostrar").show();
}

function mostrar2()
{
  $("#mostrar").hide();
  $("#mostrar2").show();
}

function noexiste()
{
    $.notify(
     "¡ El correo electronico no existe en LaboraPlanet !",
     {position:"left middle",
     className: 'error', 
     }   
     )
}

function sienvio()
{
  $.notify(
    "¡ Mensaje enviado a Correo Electrónico !",
    {position:"left middle",
    className: 'success',
    }
    )
}

function nosoniguales()
{
  $.notify(
    "¡ Las contraseñas no son iguales !",
     {position:"left middle",
     className: 'warning', 
     } 
     )
}