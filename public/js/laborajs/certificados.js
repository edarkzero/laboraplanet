$(document).ready(function() {
   $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }   
      });




	$("#categoria").on('change',function(){
		$("#habilidades").html('<option>Selecione</option>');
		var categoria=$("#categoria").val();

			$.ajax({
			url:'trabajadores_certificados/certificado',
			type:'POST',
			datatype:'json',
			data:{categoria:categoria},
			success:function(response){
	
				$.each(response.habilidades,function(indice,value){
				$("#habilidades").append('<option value="'+value.id_ability+'">'+value.ability+'</option>');

				});
		
					$("#cambiar").html('');
				$.each(response.certificado,function(indice,values){
					var ver="";
					if (values.perfil=="") {
						ver="SIN PERFIL";
					}else{
						ver=values.perfil
					}
					// $("#cambiar").append('<div>'+values.nombres+'</div>');
					$("#cambiar").append(
 					'<div class="panel panel-info" style="border-radius: 50px">'+
                     '<div class="panel-body">'+
                       '<div class="row">'+
                         '<div class="col-md-2" style="padding-top:14px"><center><img src="img/none.png" width="130" height="120" style="border-radius: 60%; "></center></div>'+
                         '<div class="col-md-7">'+
                           '<p style="font-size: 20px;font-weight: bold;color: #3bafda">'+values.nombres+'</p>'+
                              '<span class="fa-2x fa fa-map-marker"> ********** </span> &nbsp;'+
                              '<span class="fa-2x fa fa-phone"> ****** </span>      &nbsp;'+                     
                              '<span class="fa-2x fa fa fa-comments "> ********** </span>'+
                              '<p style="font-size: 1.2em; margin-top:10px;">'+ver+'</p>'+
	                          '</div>'+
	                          '<div class="col-md-1"> </div>'+
	                          '<div class="col-md-3">'+
	                          '<div style="padding-top: 20%">'+
                           '<center>'+
                           '<p><button class="btn btn-sm btn-primary btn-block" style="width: 150px;height: 35px;"><i class="fa fa-comment"></i> Contactar </button></p>'+
                           '</center></div>'+
                         '</div>'+
                       '</div>'+             
                     '</div>'+
                   '</div>');
				});
			

			}
		});
	});

	$("#habilidades").on('change',function(){
			$("#cambiar").html('');
		var habilidades=$("#habilidades").val();
	
		$.ajax({
			url:'trabajadores_certificados/habilidadesclases',
			type:'POST',
			datatype:'json',
			data:{id_ability:habilidades},
			success:function(response){
		
				$.each(response.habicla,function(indice,value){
					var ver="";
					if (value.perfil=="") {
						ver="SIN PERFIL";
					}else{
						ver=value.perfil
					}
						$("#cambiar").append(
 					'<div class="panel panel-info" style="border-radius: 50px">'+
                     '<div class="panel-body">'+
                       '<div class="row">'+
                         '<div class="col-md-2" style="padding-top:14px"><center><img src="img/none.png" width="130" height="120" style="border-radius: 60%; "></center></div>'+
                         '<div class="col-md-7">'+
                           '<p style="font-size: 20px;font-weight: bold;color: #3bafda">'+value.nombres+'</p>'+
                              '<span class="fa-2x fa fa-map-marker"> ********** </span> &nbsp;'+
                              '<span class="fa-2x fa fa-phone"> ****** </span>      &nbsp;'+                     
                              '<span class="fa-2x fa fa fa-comments "> ********** </span>'+
                              '<p style="font-size: 1.2em; margin-top:10px;">'+ver+'</p>'+
	                          '</div>'+
	                          '<div class="col-md-1"> </div>'+
	                          '<div class="col-md-3">'+
	                          '<div style="padding-top: 20%">'+
	                          '<center>'+
                            '<p><button class="btn btn-sm btn-primary btn-block" style="width: 150px;height: 35px;"><i class="fa fa-comment"></i> Contactar </button></p>'+
                           '</center></div>'+
                         '</div>'+
                       '</div>'+             
                     '</div>'+
                   '</div>');
				});
			}
		});
	});
});
