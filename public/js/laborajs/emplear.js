var id =null; 
var nom_p = "";
var mn = 0;
var id_usuario = $("#id_usuario").val();
// var nompro = 
// var nomcli1 = 
$("#nomcli").html($("#nom").val());
$("#selectp").on('change',function(){

	id = $("#selectp").val();
	$("#nomproyec").html($("#selectp>option:selected").text());
	let mm = parseFloat($("#acuerdo_"+id).val()) + parseFloat($("#acuerdo_"+id).val() *0.089);
	mn = parseFloat($("#acuerdo_"+id).val());
	$("#monto").html(mm);

	$(".row.panel").hide();
	if ($("#proyecto_"+id).length) {
	$(".botones").show();
	$("#proyecto_"+id).show();
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
	}else{
		$(".botones").hide();
	}

})

$("#emplear").on('submit',function(e){

	id = $("#selectp").val();
	$("#nomproyec").html($("#selectp>option:selected").text());
	let mm = parseFloat($("#acuerdo_"+id).val()) + parseFloat($("#acuerdo_"+id).val() *0.089);
	mn = parseFloat($("#acuerdo_"+id).val());
	$("#monto").html(mm);

	e.preventDefault();
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
	// if ($("#acuerdo_"+id).length && id!=null && id_usuario!="") {
	// 	var precioa = $("#acuerdo_"+id).val();
	// 	if (precioa>=0) {
	// 	// alert(precioa);
	// 	$.ajax({
	// 		url:'../agregar_t',
	// 		data:{
	// 			precioa:precioa,
	// 			id_p :id,
	// 			id_usuario:id_usuario
	// 		},
	// 		datatype:'json',
	// 		type:'POST',
	// 		success:function(response){
	// 			switch(response.mensaje){
	// 				case 0:
	// 				mensaje("Ocurrio un error al agregar","error");
	// 				break;
	// 				case true:
	// 				mensaje("Se agrego correctamente","success");
	// 				break;
	// 				case 2:
	// 				mensaje("Este usuario ya se le asigno este proyecto","warning");
	// 				break;
	// 				case 3:
	// 				mensaje("No puede postular a su propio proyecto","warning");
	// 				break;
	// 				default:
	// 					mensaje("Ocurrio un error","error");
	// 				break;
	// 			}
				

	// 		}
	// 	});
	// 	}
	// }else{
	// 	mensaje("Ocurrio un error",'error');
	// }
	

	
})


function redict(x)
{
	$.ajax({
		url:'../a_postular',
		data:{
			proyecto:id,
			id:id_usuario,
			precio:mn,
		},
		dataType:'json',
		method:'POST',
		success:function(response){
			if (response.v==2) {
				  window.location = "../pago/"+id_usuario+"/"+id;
			}else{
				if (response.v==1) {
					mensaje("Este usuario ya esta en este proyecto.","warning");
				}else{
					mensaje("Ocurrio un error.","error")
				}
			}

			//console.log(response);
		}
	});

  // var codigop = $(x).data('proyecto');
  // var codigou = $(x).data('id_usuario');
  //console.log("http://localhost:8000/pago/"+id_usuario+"/"+id);
  // window.location = "../pago/"+id_usuario+"/"+id;
}

// function modalxd(x)
// {
//   console.log(x);
  
// var codigo = $(x).attr('data-id');
// var codigo_p = $(x).data('proyecto');
// var codigou = $(x).data('id_usuario');

// }