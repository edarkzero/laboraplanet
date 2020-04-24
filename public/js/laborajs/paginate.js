 $(document).on('click','.pagination a', function(e){
      e.preventDefault();
   
      var page=$(this).attr('href').split('page=')[1];
      var route="buscar_trabajo";
            // console.log(page);


      $.ajax({
            url:route,
            data:{txtbusqueda:titulo,page:page,presupuesto:presupuesto,pais:pais,estado:estado,categoria:categoria,habilidad:habilidad,tipo:tipo},
            type:'GET',
            dataType:'json',
            success:function(data){
                  // console.log(data);
                  $("#users").html(data);
            }
      });
      // pagina(page);
    });
      
       $("#categoria").on('change',function(){
            var value = $(this).val();
       
            $.ajax({
                url:'llenarhabilidad',
                data:{codcat:value},
                datatype:'json',
                type:'POST',
                success:function(response){
                        $("#habilidad").html("<option value=''>Habilidad</option>");
                        var op = "";
                    
                        $.each(response.habilidades,function(indice,value){
                              op += "<option value='"+value.id_ability+"'>"+value.ability+"</option>";
                        });
                        $("#habilidad").append(op);
                }

            })
       })


      // function pagina(page){
      //+
      //   // $.ajax({
      //   //   url:'user_pro?page='+page
      //   // }).done(function(data){
      //   //   console.log(data);
      //     // $('#ee').html(data);
      //     // location.hash=page;
      //   // });
      // }

      //  $(document).on('click','.pagination a', function(e){
      // e.preventDefault();
      // // console.log($(this).attr('href'));
      // var page=$(this).attr('href').split('page=')[1];
      // var route="http://200.0.0.79/labora/public/user_pro?page"+page;
      //       console.log(page);

      // $.ajax({
      //       url:route,
      //       // data:{page:page},
      //       type:'GET',
      //       dataType:'json',
      //       success:function(data){
      //             console.log(data);
      //       }
      // });
//var xd = document.getElementById('todo');
//$("#todo").animate({ scrollTop: 20 }, 20);
