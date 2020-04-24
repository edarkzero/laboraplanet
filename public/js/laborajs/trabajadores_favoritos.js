$(document).ready(function(){
	$(".agregar").on('click',function(){
		var id = $(this).data('id');
		
		$.ajax({
			url:'trabajadores_favoritos/agregar',
			data:{id:id},
			datatype:'json',
			type:'POST',
			success:function(response){
				if (response.enviar==true) {
					alert("Se agrego correctamente");
				}else{
					alert(response.enviar);
				}
				//console.log(response);
			}
		})
	})
	$(".eliminar").on('click',function(){
		var id = $(this).data('id');
		var html =$(this).closest('.panel-1');

		// console.log();
		$.ajax({
			url:'trabajadores_favoritos/eliminar',
			data:{id:id},
			datatype:'json',
			type:'POST',
			success:function(response){
			
				html.html(""); 
				if ($(".panel-1 .panel").html()==null) {
					$(".falta").show();
				}
			}
		});
	})
})