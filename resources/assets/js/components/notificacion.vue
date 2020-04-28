<template>
	
</template>
<script>
	export default{
		props:['url','user'],
		mounted(){

			var urll = this.url; 
			
			Echo.channel('notificacion').listen('Broadcastnotificacion',(e)=>{
               
               let p = e.proyecto;
               if (this.user!=p.usuario) {
	             new PNotify({
	                          title: "<a href='"+urll+"/aplicar/"+p.id+"' style='color:white;' >Nuevo proyecto</a>",
	                          text: "Se acaba de crear un proyecto '"+p.titulo+"'",
	                          addclass: 'stack_top_right',
	                          type: "info",
	                          width: "350px",
                      		  delay: 30000,
	                        });
               }
            });		
		}
	}
</script>