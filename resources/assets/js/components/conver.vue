<template>
        <div>
          <div style="">
            <button v-on:click="aceptar" style="display: none;" id="acp"></button>
            <button v-on:click="seleccionarf" style="display: none;" id="bbbbb"></button>
        <!--   <button class="btn btn-primary" style="width: 100%;height:35px;" v-on:click="mostrar" >Contratar</button> -->
          </div>
        <div v-if="friend!=''" >
            <div class="panel-heading" v-if="trabajos.length!=0" style="width:100%;z-index: 1;padding-left: 10px;">
                      {{acc1()}}
              <div  style="padding-right: 0px;margin-left: 0px;padding-left: 0px;width: 75%;float: left;" id="lista">

              <select class="form-control" style="height: 25px;margin-top:10px;font-size:13px;padding:3px;margin-left:5px;margin-right:5px;margin-bottom: 10px;z-index: 99999" v-model="proj" v-on:change="seleccionar" id="pppe">
                <option value="0">Proyectos</option>
                <option v-for="trabajo in trabajos" :value="trabajo.id_project">
                  {{ trabajo.titulo }}
                </option>
              </select>
              </div>
              <div style="padding-left: 0px;padding-right: 0px;width: 25%;float: left;" id="contra">
                <button class="btn btn-primary" style="width: 92%;height:25px;margin-top: -5px;padding: 5px;margin-right:  10px;margin-left: 10px;" v-on:click="mostrar" id="contrab">Contratar</button>
                <!-- margin-top:10px;font-size:13px;padding:3px;margin-left:5px;margin-right:5px;margin-bottom: 10px -->
              </div>
              <div style="position: absolute;margin-top: 0px;font-size: 11px;color: red;padding-top: 19px;z-index: -20;width:100%"><!--<center>{{mostrarp}}</center> -->
                <center v-for="traa in trabajos" :id="`pp_p_`+traa.id_project" class="pp_p_" style="display: none" :key="`cccc`+traa.id_project">
                  Propuesta económica: ${{traa.economic_proposal}} Tiempo Entrega: {{traa.cantidad_tiempo}}
                  <label v-if="traa.tiempo_entrega==1">Hora<label  v-if="traa.cantidad_tiempo>1">s</label>
                  </label>
                  <label v-else-if="traa.tiempo_entrega==2">Día<label  v-if="traa.cantidad_tiempo>1">s</label></label>
                  <label v-else-if="traa.tiempo_entrega==3">Semana<label  v-if="traa.cantidad_tiempo>1">s</label></label>
                  <label v-else-if="traa.tiempo_entrega==4">Mes<label  v-if="traa.cantidad_tiempo>1">es</label></label>
                </center>





              </div>
            </div>
            <div class="panel-heading" v-else-if="friend[0]==380 && chats.length>0" style="width:100%;z-index: 1;padding-left: 10px;line-height: 22px">
                   {{acc()}}
                 <div  style="padding-right: 0px;margin-left: 0px;padding-left: 0px;width: 70%;float: left;height: 30px;" >
                <div  style="font-size: 10px;padding-top: -10px;">
                    <select class="form-control" style="height: 25px;margin-top:10px;font-size:13px;margin-left:5px;margin-right:5px;padding: 0px" v-model='proyecc' id="pppe">
                      <option v-for="value in chats" v-if="value.file==`proyecto`" :value="value.file_name.split('|')[0]+`|`+value.file_name.split('|')[2]" selected>
                        {{ value.file_name.split("|")[1] }}
                      </option>
                    </select>
                 
                </div>
                
              </div>
                <div v-if="proyecc!=``" style="padding-left: 15px;padding-right: 0px;width: 20%;float: left; height :25px;padding-top: 1px" >${{proyecc.split("|")[1]}}<br> <a :href="this.urls+`aplicar/`+proyecc.split('|')[0]">Postular</a></div>
                <!-- <div style="padding-left: 15px;padding-right: 0px;width: 20%;float: left; height :25px;">${{proyecc.split("|")[1]}}</div> -->
            </div>
             <div class="panel-heading" v-else-if="trabajos.length==0 && mistrabajos.length!=0" style="width:100%;z-index: 1;padding-left: 10px;">
                                 
              <div  style="padding-right: 0px;margin-left: 0px;padding-left: 0px;width: 70%;float: left;height: 30px;" id="lista1">
                <!-- <div v-if=""></div> -->
                <div  style="font-size: 10px;padding-top: -10px;">
                <!--   <input type="" name="" class="form-control" style="" :value="mitrabajo.titulo"> -->
                    <select class="form-control" style="height: 25px;margin-top:10px;font-size:13px;margin-left:5px;margin-right:5px;padding: 0px" v-model='pppro' v-on:change="select_g()">
                      <option v-for="mitrabajo in mistrabajos" :value="mitrabajo.id_project+`|`+mitrabajo.economic_proposal" >
                        {{ mitrabajo.titulo }}
                      </option>
                      
                    </select>
                  <!-- <div style="padding:0px;margin-top: -20px;height: 30px">sdasd</div> -->
                </div>
                
              </div>
                <div style="padding-left: 15px;padding-right: 0px;width: 1%;float: left;display: inline">${{pppro.split("|")[1]}}</div>
                       
            </div>
              <div v-else class="panel-heading" style="width:100%;z-index: 1;padding-left: 10px;">
              </div>



        <div class="panel-body bg-light " :style="vista" id="chatm">
          <div v-if="chats.length!=0" style="min-height: 220px;word-wrap: break-word;">
            {{ver()}}
          <div v-for="chat in chats" style="position: relative;" >
                       
            <div class="media" style="width: 95%;min-width: 200px;max-width: 750px;float: right;padding: 5px;">
                <center v-if="chat.dia!=''">{{chat.dia}}</center>
            </div>


            <div class="media" style="width: 95%;min-width: 200px;max-width: 750px;float: right;padding: 5px;" v-if="chat.id_usuario==user[0]">
              <div class="media-body" style="width: 100%;background: #3578e5;color:white;border-radius: 5px;border: white" align="right">
                <p v-if="chat.file!=null && chat.file.split('/').length==2">{{ chat.chat }} &nbsp;<a :href="urls+`descargar-file-chat/`+chat.id" >{{ chat.file_name }}</a></p>
                <p v-else-if="chat.file==`llamada`">
                  <a :href="urls+`video_chat/`+friend[0]" onclick="window.open(this.href,'VentanaPrincipal','width=800,height=640');return false" style="color:white;">{{ chat.chat }} </a> 
                </p>
                <p v-else-if="chat.file==`voz`">
                  <audio controls controlslist="nodownload" style="width: 200px;height: 30px">
                    <source :src="`audio/audio_`+chat.file_name+`.mp3`" type="audio/mpeg">
                  </audio>
                </p>
                <p v-else >{{ chat.chat }}</p>
                <div style="font-size:10px;margin-top: -9px;margin-right: 5px;margin-bottom: -5px">{{chat.fecha.substring(11,16)}}
                  <label style="display: none;"><i class="fa fa-check" ></i></label>
                </div>
              </div>
              <div class="media-right" style="">
                <a :href="urls+`/verperfil/`+user[0]" @click.prevent="loadProfile(user[0])">
                  <img v-if="user[2]!=''"class="media-object" alt="64x64" :src="user[2]" width="40" height="40">
                  <img v-else :src="urls+`img/none.png`" width="40" height="40">
                </a>
              </div>
              <!-- {{prueba()}} -->
              
            </div>
            <div class="media" style="width: 95%;min-width: 200px;max-width: 750px;float: left;padding: 5px" v-else-if="friend[0]==chat.id_usuario">
                <div class="media-left">
                  <a :href="urls+`/verperfil/`+friend[0]" @click.prevent="loadProfile(friend[0])">
                        <img v-if='friend[2]!=""' class="media-object" alt="64x64" :src="friend[2]" width="40" height="40">
                        <img v-else :src="urls+`img/none.png`" width="40" height="40">
                    </a>
                </div>
                <div class="media-body" style="width: 100%;border-radius: 5px;" align="left">
                  <p  v-if="chat.file!=null && chat.file.split('/').length==2">{{ chat.chat }} &nbsp;<a :href="urls+`descargar-file-chat/`+chat.id">{{ chat.file_name }}</a></p>
                  <p v-else-if="chat.file==`llamada`">
                    <a :href="urls+`video_chat/`+friend[0]" onclick="window.open(this.href,'VentanaPrincipal','width=800,height=640');return false">{{ chat.chat }} </a> 
                  </p>
                  <p v-else-if="chat.file==`voz`">
                    <audio controls controlslist="nodownload" style="width: 200px;height: 30px">
                      <source :src="`audio/audio_`+chat.file_name+`.mp3`" type="audio/mpeg">
                    </audio>
                  </p>
                  <p v-else-if="chat.file==`proyecto`">
                    {{ chat.chat }} &nbsp; <a :href="urls+`proyectoDetalle/`+chat.file_name.split(`|`)[0]">{{ chat.file_name.split(`|`)[1].trim() }}</a>

                  </p>
                  <p v-else style="word-wrap: break-word;">{{ chat.chat }}</p>
                <div style="font-size:10px;margin-top: -9px;margin-left: 5px;margin-bottom: -5px">{{chat.fecha.substring(11,16)}} 
                
                </div>
                </div>
            </div>
             
        </div>
        
        </div>

        <div style="height:180px;" v-else >
                      {{ver()}}

         <center> NO HAY MENSAJES</center>
        </div>
        </div> 
        <enviar v-bind:userid="user[0]" v-bind:chats="chats" v-bind:friendid="friend[0]" v-bind:urls="urls"></enviar>
       </div>
       <div v-else>
          <div class="panel-body bg-light" style="overflow-y: scroll;max-height: 500px">
            <center>SELECCIONE UN USUARIO</center>
          </div>
       </div>

       </div>

     
</template>
  <style scoped>
        /*    audio::-internal-media-controls-download-button {display:none}
            audio::-webkit-media-controls-enclosure {overflow:hidden}
*/
          </style>  
<script>
    export default {
        props:['friend','trabajos','activados','user','chats','vista','urls','ancho','mistrabajos','select'],
        data(){
            return{
                proj:0,
                fecha:'',
                estilo:0,
                termino:0,
                pppro:'',
                mostrarp:'',
                proyecc:'',
                projec:0
            }
        },
        methods:{
            loadProfile: function(id){
                const url = this.urls+"verperfil/"+id;
                axios.get(url).then((response)=>{
                    document.getElementById("content_wrapper").innerHTML = response.data.body;
                    /*document.title = response.data.title;
                    window.history.pushState({"html":response.data.html,pageTitle:response.data.title},'', url);*/
                });
            },
            select_g:function(){
              document.getElementById("proyecto_cu").value = this.pppro.split("|")[0]
              document.getElementById("c_"+this.friend[0]).click()

            },
            mostrar:function(){
              var pp = this.proj;
              var f = this.friend[0];

              if (pp!=0 && this.friend[0]!=0) {
                
                var d = this.urls;
                $(document.getElementById('sss')).modal('show');
                $(document.getElementById('pie_modal')).attr('data-u',this.friend[0]);
                $(document.getElementById('pie_modal')).attr('data-p',this.proj);
                document.getElementById("usu_c").innerHTML= this.friend[1];
                let s = this.trabajos;
                let p = 0;
                let pr = this.proj;
                $.each(s,(key,value)=>{
                  if (value.id_project==pr) {
                    p = value.economic_proposal;
                    return false;
                  }
                });
                // alert(parseInt(p)+(p*0.09));
                // document.getElementById("monto_c").innerHTML=Math.round((parseInt(p)+(p*0.09))*100)/100;
                document.getElementById("monto_c").innerHTML= p;
              }else{
                
              }
              // console.log("sadrfsad");
            },
            aceptar:function(){
                var p = $(document.getElementById('pie_modal')).attr('data-p');
                var u = $(document.getElementById('pie_modal')).attr('data-u');
                var m = document.getElementById("monto_c").innerHTML
                var d = this.urls;
                $.ajax({
                    url:d+'a_postular',
                    data:{
                      proyecto:p,
                      id:u,
                      precio:m,
                    },
                    dataType:'json',
                    method:'POST',
                    success:function(response){
                      // console.log(response);
                      if (response.v==2) {
                          window.location = d+"pago/"+u+"/"+p;
                      }else{
                        if (response.v==1) {
                          window.location = d+"pago/"+u+"/"+p;
                        }else{

                          mensaje("Ocurrio un error.","error")
                        }
                      }

                      // console.log(response);
                    }
                  });
            },
            termirno:function(){
              this.estilo=0;
            },
            ver:function(){
                var d = this.mistrabajos[0];
                // console.log(d);
                // console.log(this.pppro)
                if (d!=undefined && this.pppro=="") {
                  var sele = this.select;
                  if (sele!=0) {
                    this.mistrabajos.forEach((value)=>{
                      // console.log()
                      if (value.id_project==sele) {
                        this.pppro = sele+"|"+value.economic_proposal    
                      }
                    });
                  }else{
                    this.pppro =this.mistrabajos[0].id_project+"|"+this.mistrabajos[0].economic_proposal;
                  }
                }else{
                  if (this.mistrabajos.length>0) {
                    if (this.pppro=="") {
                      this.pppro =this.mistrabajos[0].id_project+"|"+this.mistrabajos[0].economic_proposal; 
                    }
                  }
                }
                // console.log(d);

               let t = setInterval(function(){
               // console.log(this.chats);
               let f = window.location.href.split('/');
            // console.log(document.getElementById("lista"));
            // console.log(document.getElementById("lista"));
            // console.log(f[f.length-1].substr(0,10));
            if(document.getElementById("lista")!=null && f[f.length-1].substr(0,10)=='lista_chat' || f[f.length-1].substr(0,10)=='listar_tra'){
                document.getElementById("contrab").style.display="none";
                document.getElementById("lista").style.width="97%";
            }
                // mistrabajos[0].economic_proposal
               let c = document.getElementById('chatm');
               c.scrollTop=c.scrollHeight-c.clientHeight;
               clearInterval(t);
               
               },500);

              // console.log(s);
               
            },
            acc:function(){
              if (this.proyecc=="") {
              for (var i = this.chats.length-1; i >=0 ; i--) {
              // console.log(this.chats[i]);
                if (this.chats[i].file==`proyecto`) {
                  var fff = this.chats[i].file_name.split("|")
                  this.proyecc = fff[0]+"|"+fff[2]
                  break;
                }
                
              }
                // console.log(this.proyecc);

              }
              // console.log(fff);
            },
            acc1:function(){
              // console.log("ddd")
              if (this.proj=="") {
              this.proj = this.select
              setTimeout(()=>{
                this.seleccionar()
              },500)
              }
              // console.log(this.trabajos[0].id_project);
                                  //   var sele = this.select
                                  //    if (sele!=0) {
                                  //       this.proj = sele
                                  //     }else{
                                  //       this.proj = this.trabajos[0].id_project
                                  //     }
                                  // }
                                  //   this.seleccionar();
            },
            seleccionarf:function(){
              this.proj=0;
              this.mostrarp="";
            },

            seleccionar:function(){
                
                let f = this.proj;
                
                if (this.projec!=f) {
                   document.getElementById("proyecto_cu").value = f
                  document.getElementById("c_"+this.friend[0]).click()
                  $(".pp_p_").hide()
                  // console.log(f)
                  document.getElementById("pp_p_"+f).style.display="" 
                  this.projec = f
                  return;
                }
                
                // if (this.proj=="0") {
                //   this.mostrarp=" ";
                //   return;
                // }
                // console.log("asdsad")
                // document.getElementById("proyecto_cu").value = f

                
                // var tti =""
                // var ecc = "" 
                // var ctiem = ""
                // console.log(this.trabajos);
                     
                // for (var i = 0; i <this.trabajos.length ; i++) {
                //   if (this.trabajos[i].id_project==f) {
                //     console.log("sss")
                //   ecc = this.trabajos[i].economic_proposal;
                //   ctiem = this.trabajos[i].cantidad_tiempo;
                //   const te = this.trabajos[i].tiempo_entrega;
                //   if (te==1) {
                //     tti= "Hora";
                //     if (this.trabajos[i].cantidad_tiempo>1) {
                //       tti+= "s";
                //     }
                //   }else if(te==2){
                //       tti= "Día";
                //       if (this.trabajos[i].cantidad_tiempo>1) {
                //       tti+= "s";
                //       }
                //   }else if(te==3){
                //     tti= "Semana";
                //     if (this.trabajos[i].cantidad_tiempo>1) {
                //       tti+="s";
                //     }
                //   }else if(te==4){
                //     tti= "Mes";
                //     if (this.trabajos[i].cantidad_tiempo>1) {
                //       tti+="es";
                //     }
                //   }
              
                //   }
                //   // console.log(this.trabajos[i]);
                // }
                        //this.mostrarp="Propuesta económica: $"+ ecc +" Tiempo Entrega: "+ctiem+" "+tti;
                // this.select_g();
                // console.log(this.trabajos);
                // mostrarp
            }
        },
        mounted() {
          // console.log("sdads1");
        }
    }
  
</script>
