$(document).ready(function() {
    $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }   
      });


   
    $("#imprimir").on('click',function(e) {
    	var numpedido = $("#numpedido").html();

    	
    	$.ajax({
    		url:'imprimir_recibo',
    		type:'GET',
    		dataType:'JSON',
    		data:{numpedido:numpedido},
    		success:function(response)
    		{
    			//console.log('EXITO');
    		}
    	}); 


    });






});