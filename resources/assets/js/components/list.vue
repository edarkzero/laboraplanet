<template>
		<div>
			<notificacion v-bind:user="user[0]" v-bind:url="urls"></notificacion>  
    <!--//agregado 13-->  <button style="display: none;" id="action1" @click="mostrarf"></button>
                          <input type="hidden" id="proyecto_cu">
          <div v-if="lista.length!=0">

            <div class="media "  v-for="value in lista" v-if="(value.usuario).toUpperCase().indexOf(contacto.toUpperCase().trim())>=0">
              <div class="media-left">
                 
                <a href="javascript:void(0);" v-on:click="mostrar(value.id,imagen(value.imagen),value.nombres+' '+value.apellidos,value.perfil,value.precio_hora,value.usuario,value.rol)" :id="`c_`+value.id">  
                       <!-- <a href="javascript:void(0);" v-on:click="mostrar(value.id,imagen(value.imagen),value.usuario,value.perfil,value.precio_hora)" :id="`c_`+value.id"> -->  
                  <img class="im"  alt="64x64" :src="imagen(value.imagen)" >
                </a>
              </div>
              <div class="media-body cursor-pointer" style="width: 85%" v-on:click="mostrar(value.id,imagen(value.imagen),value.nombres+' '+value.apellidos,value.perfil,value.precio_hora,value.usuario,value.rol)">
                <h5 class="media-heading">
                  <a v-if="value.id!=380" href="javascript:void(0);" class="no-hover-underline" > {{ value.usuario }} &nbsp; </a>
                  <a v-else href="javascript:void(0);" class="no-hover-underline"> {{ value.usuario }} &nbsp; </a>
                  <img v-if="value.codigo_pais!=undefined" :src="urls+`img/pais/`+value.codigo_pais+`.gif`"> </h5>
                 <span v-if="value.chat==null"> {{ value.perfil }}</span>
                 <span v-else>
                  <i class="fa fa-check" v-if="value.v==3 && value.id_u==user[0]" style="color: blue"></i>
                  <i v-else-if="value.id_u!=user[0] "></i>
                  <i class="fa fa-check" v-else></i> {{ value.chat }}
                 </span> 
                <span class="badge badge-danger" :style="`position: absolute;z-index: 1;float: left;display:`+[value.v==null||value.id_u==user[0]||value.v==3 ? `none;`:`;`]" :id="`n_`+value.id">
                  1
                </span>   
              </div>
            </div>
            <input type="hidden" id="friendss">
          </div>
          <div v-else>
            <center>NO TIENE CONTACTOS</center> 
          </div>
        </div>
</template>
          <style scoped>
            .im{
              width: 50px;
              height: 50px;
            }
          </style>                    
<script>
	export default{
		name:'lista',
		props:['lista','user','urls','contacto','ocultarss','mostraru'],
		data(){
			return{
			friend:[],
			chats:[],
			activados:{}
			} 
		},
    mounted(){
      console.log(this.friend)
      var buscar = window.location.search.split("?cu=");
      // console.log(buscar.split("?cu=")[1]);
      if (buscar.length==2) {
        var idddd = document.getElementById('c_'+buscar[1]);
        if (idddd) {
          idddd.click()
        }
      }
      this.lista.forEach((value)=>{
        
          // activados.push([]);
          Echo.private('Chat.'+value.id+'.'+this.user[0]).listen('BroadcastChat',(e)=>{
              // console.log(this.friend);
              console.log(e.chat)
                      if (document.getElementById("proyecto_cu").value==e.chat.proyecto ||e.chat.id_usuario==380){
                            this.chats.push(e.chat);
                          }
                        var id = e.chat.id_usuario;
                        if(id==380){
                          // 378
                          var ii = this.imagen(value.imagen);
                        this.mostrar(id,ii,value.nombres+' '+value.apellidos,value.perfil,value.precio_hora,value.usuario,value.rol);  
                        }

                          // console.log(e.chat);
                          if (e.chat.file=="llamada") {
                               new PNotify({
                                  title: "<a href="+this.urls+"video_chat/"+id+" style='color:white;'onclick='window.open(this.href,`VentanaPrincipal`,`width=800,height=640`);return false'>Ir a videollamada</a>",
                                  text: "El usuario "+value.nombres+" "+value.apellidos+" se quiere comunicar",
                                  addclass: 'stack_top_right',
                                  type: "info",
                                  width: "350px"
                                });
                                 // <a :href="urls+`video_chat/`+friend[0]" onclick="window.open(this.href,'VentanaPrincipal','width=800,height=640');return false" style="color:white;">{{ chat.chat }} </a> 

                          } 
                          // console.log(this.friend[0]);
                          // console.log(this.ocultarss);
                          if (this.friend[0]!=id || this.ocultarss==1) {
                            var ggg = document.getElementById('n_'+id);
                            var n_gg = document.getElementById(`n_g`);
                            if (n_gg!=null) {
                              var ng = n_gg.innerHTML.trim();
                              if (ggg.style.display=="none") {
                                ng++
                                n_gg.innerHTML=ng
                                n_gg.style.display=""
                                ggg.style.display="";

                              }                              
                            }else{
                                if (ggg.style.display=="none") {
                                    ggg.style.display="";
                              } 
                            }
                          }
                        });
      });
          let urlc = window.location.href.split('/');
          // console.log(urlc[urlc.length-1].substr(0,10));
          if('lista_chat'==urlc[urlc.length-1].substr(0,10)){
             let urlll = new URL(window.location.href); 
            let m = urlll.searchParams.get('c');  
            if(m!=null){
              document.getElementById('c_'+m).click();
            }
          }

        // console.log(m);
    },
		methods:{
    //agregado 13
      mostrarf:function(){
        var m= this.mostraru[0];
        // console.log()
        if (m.id!=undefined) {
          var im = this.imagen(m.imagen)
          this.mostrar(m.id,im,m.nombres+` `+m.apellidos,m.perfil,m.precio_hora,m.usuario,m.rol)
        }
      },
      //agregado 13
			mostrar:function(id,foto1,nombre,perfil,precio,usuario,rols){
        
				
        this.ocultar*=0;
			 var foto = foto1;
					           if (this.friend[0]!=id) {
                      document.getElementById("proyecto_cu").value =""
                     }
                      // document.getElementById"proyecto_cu").value=document.getElementById("pppe").value
            		
		            this.friend = [id,nombre,foto,perfil,precio,usuario,rols];
        	        if (this.friend[0]!=undefined) {
             	    	 var data = {id:this.friend[0],
                                rol:rols,
                                proyecto:document.getElementById("proyecto_cu").value};
					// console.log(data);
					// this.$emit("friends",this.friend);

                	    axios.post(this.urls+'chat2/getchat',data).then((response)=>{
                        // let c = response.data[0]
                        // this.chats = response.data[0];
                        let fecha = "";
                        let cha = response.data[0];
                        // console.log(data.id)
                        if (document.getElementById(`n_`+data.id)!=null) {
                          document.getElementById(`n_`+data.id).style.display = "none";
                          var n_gg = document.getElementById(`n_g`);
                          if (n_gg!=null) {
                            var ng = n_gg.innerHTML.trim();
                            if (ng>0) {ng--}
                              // console.log(ng);
                            if (ng>=1) {
                              n_gg.innerHTML=ng
                            }else{
                              n_gg.innerHTML=ng
                              n_gg.style.display="none"
                            }
                          }
                        }
                        // document.getElementById(`n_g`).innerHTML.trim()
                        // console.log(cha.fecha);
                        for (var i=0; i < cha.length; i++) {
                           if (fecha!=cha[i].fecha.substr(0,10)) {
                            fecha = cha[i].fecha.substr(0,10);
                            // console.log();
                            let faa = fecha.split('-');
                            // console.log(faa[2]+"-"+faa[1]+"-"+faa[0]);
                            var dias=["Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sábado"];
                            let meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];

                            var dt = new Date(faa[1]+' '+faa[2]+', '+faa[0]+' 12:00:00');
                            cha[i].dia = dias[dt.getUTCDay()]+","+meses[dt.getMonth()]+" "+faa[2]+", "+faa[0];
                           }else{
                            cha[i].dia="";
                           }
                         }
                         this.chats = cha;
                        var tr = response.data[1];
                        // console.log();
                         document.getElementById("proyecto_cu").value =response.data[3] 
                		    // this.$emit("chats",this.chats);
                        var c = [this.friend,this.chats,tr,"c",response.data[2],response.data[3]];
                        this.$emit("listar",c)
                    });
               
					
                } 

			},
			imagen:function(value){


				var r = value;
        if (r!=null) {
				  if (value.substr(0,5)!='https') {
					  r = this.urls + value;
				  }
        }else{
          r=  this.urls + 'img/none.png';
        }
				return r;
			}
		}
	}
</script>