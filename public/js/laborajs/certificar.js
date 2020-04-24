$("#categoria").on('change',function(){
	var id = $(this).val();
	if (id=="") {
			$(".categoria").show();
    	}else{
	    	$(".categoria").hide();
	    	$(".categoria-"+id).show();
    	}


	$.ajax({
		url:'certificar/category',
		data:{codigo:id},
		type:'POST',
		datatype:'json',
		success:function(response){
			$("#habilidad").html('<option style="font-size:15px;font-weight:bolder;">Conocimientos</option>');
			$.each(response.habilidad,function(indice,value){
                var st = "";
                var d ="disabled";
                $.each(s,function(indice,value2){
                    if (value2 ==value.id_ability ) {
                     st = 'color:#20DFD4;';
                     value.ability += '&nbsp;&nbsp;&nbsp;&nbsp; &#xf046;'; 
                     d= "";
                    }
                // console.log(st);
                })
                // console.log(value.ability );
				$("#habilidad").append('<option value="'+value.id_ability+'" '+d+' style="font-size:15px;font-weight:bolder;'+st+'">'+value.ability+'</option>')
			})

		}
	})

})
     $(".progress-bar1").loading();
    $('input').on('click', function () {
       $(".progress-bar1").loading();
    });

    // $("#categoria").on('change',function(){
    	// var id = $(this).val();
    	
    // });
    $(".btn-eliminar").on('click',function(){
    	var id = $(this).data('id');
    	
    	$.ajax({
    		url:'certificar/eliminar-categoria',
    		data:{codigo:id},
    		datatype:'json',
    		type:'POST',
    		success:function(response){
    			if (response.enviar=="1") {
    				//console.log($(".habilidad-"+id).closest('.categoria').html(""));
    			}
    			// console.log(response);
    		}
    	});
    })

    $("#habilidad").on('change',function(){
        //console.log($(this).val());

    })