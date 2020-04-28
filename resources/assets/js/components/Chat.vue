<template>
  <div class="row">
    <br/>
    <div class="col-md-4" style="padding-left:  20px;">
      <div class="panel panel-widget chat-widget">
        <div class="panel-heading ">
          <span class="panel-icon">
            <!-- <a href="#">
            <i class="fa fa-cogs"></i>
            </a> -->
          </span>
          <span class="panel-title" style="text-align:center;width: 100%"><span style="align-content: center;">Labochat</span>
          <span style="float: right;"><a href="#">grupo</a></span></span>
        </div>
        <div class="panel-body bg-light dark panel-scroller scroller-lg pn" style="overflow-y: scroll;max-height: 500px">
          <input type="text" name="" placeholder="Buscar Contactos" class="form-control" v-model="contacto" id="buscador" autofocus><br>
          <list v-bind:user="user" v-bind:lista="lista"  v-bind:urls="urls" @listar="agregarl($event)" v-bind:contacto="contacto" v-bind:ocultarss='0'></list>
        </div>
      </div>
    </div>
    <!-- <div class="col-md-2"></div> -->

    <div class="col-md-4" style="padding-left: 20px;padding-right: 20px;">
      <div v-if="friend.length!=0">
        <div class="panel-widget chat-widget" >
          <div class="panel-heading" >
          <div style="float: left; width: 80%;">
            <center > {{ friend[1] }} <!-- (<span style="font-size: 12px">***</span>) --></center>
          </div>
            <div style="float: right;width: 20%;font-size: 20px;">
              <center>
                <!-- <a href="#" style="text-decoration-line: none;"><i style="padding-left: 20px" class="glyphicon glyphicon-earphone"/></a> -->
                <a style="text-decoration-line: none;" v-on:click="video" href="javascript:void(0)"><i style="padding-left: 20px" class="glyphicon glyphicon-facetime-video"/></a>
                 <!-- &nbsp;&nbsp;<a href="#" style="text-decoration-line: none;">Aplicar</a> -->
              </center>
            </div>
          </div>
          <div class="panel-heading" style="min-height: 120px;height: 100%;">
            <div class="col-md-3">
              <img :src="urls+friend[2]" height="90" width="90" style="margin-top: 9px;border-radius: 50px;" v-on:click="redireccionar(friend[0])">
            </div>
            <div class="col-md-9">
              <ul style="list-style: none;">
                <li style="padding-left: -10px; margin-top: -10px"><!-- {{ friend[1] }} --></li>
                <li v-if="friend[3]!=null" style="margin-top: 20px;line-height: 18px;margin-left: -20px;">{{ friend[3] }}</li>
                <li v-else style="margin-top: 20px;line-height: 15px;margin-bottom: 17px;margin-left: -20px;"></li>
                <li style="margin-top: 2px;width:100%;margin-bottom: 5px;line-height: 25px;margin-left: -20px;" v-if="friend[4]!=null  ">
                  <span v-if="friend[3]!='' && friend[3]==null "><br></span>
                  <label v-if="trabajos.length!=0 && mistrabajos.length==0">Precio por Horas: ${{friend[4]}} </label> <center>
                  <button v-if="trabajos.length>0" class="btn btn-primary" style="width: 85px;height:35px;" v-on:click="accion">Contratar</button></center>
                </li>
                <li style="margin-top: -20px;width:100%;margin-left: -20px;" v-if="friend[3]==''"> 
                <!-- <span v-if="friend[3]!=null && friend[3].substr(0,100)==''"><br></span> -->

              <center><button v-if="trabajos.length>0" class="btn btn-primary" style="width: 85px;height:35px;" v-on:click="accion">Contratar</button></center>
                </li>
               
              </ul>
            </div>
            <!-- <div class="col-md-2"></div> -->
          </div>
        <conver v-bind:vista="`overflow-y: scroll;max-height: 180px`"  v-bind:user='user' v-bind:chats='chats' v-bind:trabajos="trabajos" v-bind:friend="friend" v-bind:urls="urls" v-bind:ancho="`94%;max-width:96`" v-bind:mistrabajos="mistrabajos" v-bind:select="select"></conver>
        </div>        
      </div>
      <div v-else>
        <center v-if="ruta==`listar_trabajador`">
          <label style="color: #34b7ec;z-index: 999;"> En el lado izquierdo mostramos colaboradores cuyos conocimientos coinciden con tus requerimientos, da click en su foto para contactarlos....</label> 
        </center>
        <center v-else>
          SELECCIONE UN USUARIO
        </center>
      </div>
    </div>
    <div class="col-md-2"></div>

  </div>
  
</template>

<script>
  // import lista from '../components/list.vue'
	export default {
		props : ['user','lista'],
    components: {
    // lista
    },
    data(){
      return {
      friend:'',
      urls:'',
      chats:[],
      trabajos:[],
      vista:'1',
      listar:[],
      contacto:'',
      mistrabajos:[],
      ruta:'',
           select:0
      }
    },
     methods:{
       agregarl:function(value){
                  $("#friendss").val(value[0][0])
        this.chats = value[1]
        this.friend = value[0];
        if (this.friend[3]!=null && this.friend[3].trim().length>=55) {
          this.friend[3] = this.friend[3].trim().substr(0,55) +" ...";
        }
        if (this.friend[1].trim().length>=40) {
          this.friend[1] = this.friend[1].trim().substr(0,30) +" ...";
        }
        
        this.trabajos = value[2]; 
        this.mistrabajos = value[4]
        this.select = value[5] 
        // console.log(value[5]);
         let t = setInterval(function(){
            // if (document.getElementById("bbbbb")!=null) {
            document.getElementById("bbbbb").click();
            // }
            clearInterval(t)
            // console.log(22);
          },1000);
        // }
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
        // console
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
            // this.chats.push(data);
            var ur = this.urls+"video_chat/";
            window.open(ur+data.id_contacto,'VentanaPrincipal','width=800,height=640');
          });
        
       },
       redireccionar:function(value){
          // console.log("sadasd");
          window.open(this.urls+"verperfil/"+value);
       },
       accion:function(){
        document.getElementById("contrab").click();
       }
       // buscarcontacto:function(e){
       //  console.log("Cristian Daga".toUpperCase().indexOf(this.contacto));
       //  console.log(this.contacto);
       // }
       // agregarl:function(value){
       //  // console.log(value);
       //  // this.friend = 
       //  // this.chats=
       // }
       // // m:function(){
       //    console.log(this.friend);
       // },

      //  mostrar:function(id,foto,nombre){
      //   // console.log(this.urls);
      //   // var url = window.location.href.split("/");
      //       // if (foto==null) {
      //         // foto = 'img/none.png'; 
      //       // }
      //       // foto = this.urls+foto;

      //       // this.friend = {id,foto,nombre};
         
      //           if (this.friend.id!=undefined) {
      //                 var data = {id:this.friend.id};
      //                 axios.post(this.urls+'chat2/getchat',data).then((response)=>{
      //                   this.chats = response.data[0];
      //                   this.trabajos = response.data[1];
      //                   // console.log(response);
      //               });
                    
      //               var a = 0;
      //               this.activados.forEach(function(value){
      //                 if (id==value) {
      //                   a=1;
      //                   return a;
      //                 }
      //               });

      //               if (a==0) {
      //                 Echo.private('Chat.'+this.friend.id+'.'+this.user[0]).listen('BroadcastChat',(e)=>{
      //                    this.chats.push(e.chat);
      //                 });
      //                 this.activados.push(this.friend.id);
      //               }    
      //           }           
      // }
    },
       mounted() {
        // console.log(this.trabajos.lenght);
let ruta =window.location.href.split('/')[3]; 
        if (ruta!=undefined) {
        this.ruta = ruta.substr(0,17);
        }
         
        let u = window.location.href;
        var url = u.split("/");
        // if (url[url.length-2]!="public") {
        //   this.urls = "../";
        // // }
            //  if (url.length>5) {
            // var is = url.length-6;
        if (url.length>3) {
          var is = url.length-4;
          for (var i = 0; i<is; ++i) {
            this.urls += "../";   
          }
        }
         document.getElementById("buscador").focus();
        // let urlll = new URL(window.location.href); 
        // let m = urlll.searchParams.get('codigo');
        // if(m!=null){
        //   document.getElementById('c_'+m).click();
        // }
        // console.log(m);

        }
    }
    //
</script>

 