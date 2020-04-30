<template>
	<div>
		<div @mouseover="mos()" @mouseleave="ocu()">
       <div :class="`navbar-btn btn-group `+acti2" >
      <!-- <button id="accion" v-on:click="accion(this)"></button> -->
      <button data-toggle="dropdown" class="btn btn-sm dropdown-toggle" id="btn-activars">

        
            <span class="badge badge-danger" id="n_g" :style="`display:`+[dd1>0?``:`none`]">
              {{ dd1 }}
            </span> 
         
        <img src="https://www.laboraplanet.com/img/icons8-facebook-messenger-48.png" style="width:20px;height:20px">
      </button>
    <div role="menu" class="dropdown-menu dropdown-persist w350 animated animated-shorter fadeIn">  
       <div class="panel mbn">
    <div class="panel-menu">
                    <a :href="urls+`lista_chat`"> <span class="panel-icon"><i class="fa fa-clock-o"></i></span>
                     <span class="panel-title fw600"> Mensajes Recientes </span>
                     </a>
                  </div>  
      <div class="panel panel-widget chat-widget" >
        <div class="panel-body bg-light dark panel-scroller scroller-lg pn" style="max-height: 250px">

        <list  @listar="agregarl($event)" v-bind:user="user" v-bind:lista="lista"  v-bind:urls="urls" v-bind:contacto="``" v-bind:ocultarss="ocultarss" v-bind:mostraru="mostraru"></list>
        <!--agregado 13-->
        </div>
      </div>
    </div>
    </div>

  </div>
    </div>

      <div class="chat" :style="`top:`+this.altura+`px;`+acti+`right:`+ancho+`px;`" @mouseover="ocu()" id="chatt">
        <div class="panel-widget chat-widget" >
          <div class="panel-heading" style="background: #85d27a;color: black">
            <span v-if="friend.length>0 && friend[1].trim()!=''">
              <a v-if="friend[0]!=380" :href="this.urls+`/verperfil/`+friend[0]" @click.prevent="loadProfile(friend[0])"> <b>{{ friend[1].substr(0,21) }}</b></a>
            <a v-else href="javascript:void(0);"> <b>{{ friend[1].substr(0,21) }}</b></a></span>
            <span v-else>Chat</span>
            <!-- <a href="#" style="text-decoration-line: none;"><i class="glyphicon glyphicon-earphone" style="padding-left: 10px;color: black"></i></a> -->
            <a href="#" style="text-decoration-line: none;" v-on:click="video"><i class="glyphicon glyphicon-facetime-video" style="padding-left: 10px;color: black"></i></a>
          <!-- <div style="float: right;width: 78%;margin-top: 5px">
            <button class="btn btn-primary" style="float: right;width: 80px;max-wid th: 80px;margin-left: 10px" v-on:click="contratar">Contratar</button>
            <select class="form-control" style="width: 50%;float: right;">
              <option value="">Seleccione Proyecto...</option>
              <option v-for="value in trabajos" v-bind:value="value.id_project">{{ value.titulo }}</option>
            </select>
          </div> -->
            <a href="javascript:void(0);" style="float: right;text-decoration: none;" v-on:click="ocultar">
              <img :src="urls+`img/icons8-delete-24.png`" width="20" height="20">
            </a>
            <a href="javascript:void(0);" style="float: right;text-decoration: none;padding-right: 5px" v-on:click="minimizar()" v-if="a==1">              
            <img :src="urls+`img/icons8-minus-24.png`"  width="20" height="20">
            </a>
            <a href="javascript:void(0);" style="float: right;text-decoration: none;padding-right: 5px" v-on:click="maximizar()" v-else>
            <img :src="urls+`img/icons8-resize-vertical-24.png`" width="20" height="20">
            </a>
          </div>
          <conver v-bind:vista="`overflow-y: scroll;max-height: 220px`"  v-bind:user='user' v-bind:chats='chats' v-bind:trabajos="trabajos" v-bind:friend="friend" @close="close($event)" v-bind:urls="urls" v-bind:ancho="98"  v-bind:mistrabajos="mistrabajos" v-bind:select="select"></conver>
        </div>
      </div>
	</div>
</template>
<style>
  .chat{
		position:absolute;
  	width: 335px;
		padding-right:  12%;
  }
    
	</style>
<script>
		export default {
		props : ['user','lista'],
    components: {

    },
    data(){
      return {
      friend:'',
      urls:'',
      chats:[],
      trabajos:[],
      altura:'',
      ancho:'',
   		acti:';display:none;',
      acti2:'',
      a:1,
      a1:0,
      dd1:0,
      mistrabajos:[],
      ocultarss:0,
      select:0,
      mostraru:[]//agregado 13
      }
    },
     methods:{
         loadProfile: function(id){
             const url = this.$laravel_base_path+"/verperfil/"+id;
             axios.get(url).then((response)=>{
                 document.getElementById("content_wrapper").innerHTML = response.data.body;
                 //window.history.pushState(null,null, url);
             });
         },
        mos:function(){
          if (this.a1==0) {
          document.getElementById("btn-activars").click();
          this.a1=1;
          }else{
          this.acti2='open';
          }
          // console.log(this.acti2);
        },
        ocu:function(){
          this.acti2='';
        //   console.log(this.acti2);
        },
        ocultar:function(){
          // console.log("asdasd");
       	  this.acti =";display:none;"; 
          this.ocultarss=1;
        },
        agregarl:function(value){
          // console.log(value[5]);
          this.ocultarss=0;
          $("#friendss").val(value[0][0])
          this.chats = value[1]
          this.friend = value[0]
          this.trabajos = value[2]
          this.mistrabajos = value[4]
          this.select = value[5] 
       	  this.acti= ';display:;'
          let t = setInterval(function(){
            if (document.getElementById("pppe")!=null) {
              document.getElementById("pppe").value=0;
            }
            // if (document.getElementById("bbbbb")!=null) {
            document.getElementById("bbbbb").click();
            // }
            clearInterval(t)
            // console.log(22);
          },500);

          // console.log(document.getElementById("pppe").value);
        },
        minimizar:function(){
          this.altura +=330;
          this.a = 0;
        },  
        maximizar:function(){
          this.a=1;
          this.altura-=330;
        },
        video:function(){
           let de = new Date();
          let me = (parseInt(de.getMonth())+1);
          let tt = de.getFullYear()+"-"+(me<10?"0"+me:me)+"-"+(de.getDate()<10?"0"+de.getDate():de.getDate())+" "+(de.getHours()<10?"0"+de.getHours():de.getHours())+":"+(de.getMinutes()<10?"0"+de.getMinutes():de.getMinutes())+":"+de.getSeconds();
        let data = {
            id_usuario:this.user[0],
            chat:"Ir a la videollamada",
            id_contacto:this.friend[0],
            video:1,
            file:"llamada",     
            fech:tt
        }
          axios.post(this.urls+'chat2/sendchat',data).then((response)=>{
            let f = this.chats[this.chats.length-1];
            let d = "";
            // console.log(response.);
            if (f!=undefined) {
              if (f.fecha.substr(0,10)!=response.data.substr(0,10)) {
                // let fa =response.data.substr(0,10).split('-') 
                // d = fa[2]+"-"+fa[1]+"-"+fa[0];
                  // fecha = cha[i].fecha.substr(0,10);
                            // console.log();
                            let faa = response.data.substr(0,10).split('-')
                            // console.log(faa[2]+"-"+faa[1]+"-"+faa[0]);
                            var dias=["Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sábado"];
                            let meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];

                            var dt = new Date(faa[1]+' '+faa[2]+', '+faa[0]+' 12:00:00');
                            d = dias[dt.getUTCDay()]+","+meses[dt.getMonth()]+" "+faa[2]+", "+faa[0];
              }
            }else{
             let faa = response.data.substr(0,10).split('-')
                            // console.log(faa[2]+"-"+faa[1]+"-"+faa[0]);
                            var dias=["Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sábado"];
                            let meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];

                            var dt = new Date(faa[1]+' '+faa[2]+', '+faa[0]+' 12:00:00');
                            d = dias[dt.getUTCDay()]+","+meses[dt.getMonth()]+" "+faa[2]+", "+faa[0];
            }
            
            data.fecha = response.data;
            data.dia = d;
            this.chats.push(data);
            


            // data.fecha =response.data; 
            // console.log(response.data);
            // this.chats.push(data);
            var ur = this.urls+"video_chat/";
            window.open(ur+data.id_contacto,'VentanaPrincipal','width=800,height=640');
          });
        
       },
       accion:function(){

       }
    },
    mounted:function() {

   // console.log(this.dd1+"dsadasd");
        var url = window.location.href.split("/");
        // console.log(url.length);
          // if (url.length>5) {
          // var is = url.length-6;
        if (url.length>3) {
          var is = url.length-4;
          for (var i = 0; i<is; ++i) {
            this.urls += "../";   
          }
        }
        // console.log(this.urls);
        // console.log(this.urls);
        var al = document.documentElement.clientHeight;
        this.altura = al-380;
        // console.log();
        if (document.documentElement.clientWidth<=770) {
          this.ancho = 20;
        }
        // this.altura = "top:"+this.altura+"px;";
        // console.log(this.altura);
        //365
          // console.log("dadasd");
            // console.log(this.user[2]);
           if('http'!=this.user[2].substr(0,4)){
            this.user[2] = this.urls +this.user[2];
          };

          //agregado 13
        let urls = this.urls
        var lista = this.lista
        var mostraru = this.mostraru
      setInterval(function(){
        axios.post(urls+"chat2/aplicar").then((response)=>{
          var t = 0;
          // console.log(response.data.chat);
          // console.log(response.data.chat.id)
          if (response.data.chat.id!=undefined) {
            lista.forEach((value)=>{
                // console.log(value.id+"---"+response.data.chat.id)
              if (value.id==response.data.chat.id) {
                mostraru[0] = response.data.chat
                t=1
                document.getElementById('action1').click()
                // console.log("existe")
              }
            })
            if (t==0) {
              lista.push(response.data.chat)
              // console.log("agregado")
            }
          }
            // console.log(t);
        })
      },5000)
   
  	},
    created:function(){
      var dd = 0;
      // console.log(this.dd1);
      var id = this.user[0];
           this.lista.forEach(function(value){
          // console.log(value.id_u);
          if (value.v==2 && value.id_u!=id) {
          dd+=1;
          // console.log(dd);
          }
        });
           // console.log(dd);
           this.dd1=dd;
    }
  }
</script>