<template>
	<div class="panel-footer">            	
        <div class="input-group">
            <input type="text" class="form-control" placeholder="aaaEnter your message here..." v-on:keyup.enter="enviarChat" v-model="chat">
            <span class="input-group-btn">
            <label>
            	<button class="btn btn-primary btn-gradient" type="button" v-on:click="$refs.arcc.click()"><i class="imoon imoon-attachment"></i></button>
        	</label>
            <button class="btn btn-primary btn-gradient" type="button" v-on:click="enviarChat"><i class="glyphicon glyphicon-send"></i></button>
            <button class="btn btn-primary btn-gradient" type="button" id="voz1" title="Presione y deje libre para hablar"><i class="fa fa-microphone" style="font-size: 15px"></i></button>
            <button class="btn btn-primary btn-gradient" type="button" id="voz2" style="display: none" title="Pulse para enviar"><i class="fa fa-microphone" style="font-size: 18px;color:red"></i></button>
            </span>
        </div>
    				<input type="file" name="archivoss" ref="arcc" @change="enviararchivo" style="display: none;">
    </div>

</template>
<script>
	export default{
		props:['userid','friendid','chats','urls'],
		data(){
			return{
			chat:'',
			v:0
			// rec:''
			} 
		},
		mounted:function(){
			var dee = this.friendid;
			var regresar = 0;var activo = 0;
		          			var totalp = window.innerHeight;
			if (document.documentElement.clientWidth<=600 && window.location.href.split("/")[3].split("?")[0]!='lista_chat') {
				document.getElementsByClassName('form-control')[1].addEventListener('focus',()=>{
					if (activo==0) {
						activo=1
		          		var d = document.getElementById('chatt').style.top;
		          		// if (dee==399) {
		          			var tiempo_r = setInterval(function(){
		          				var p_teclado =window.innerHeight
		          				regresar = totalp-(p_teclado-40)
		          				document.getElementById('chatt').style.top=(d.substr(0,3)-regresar)+'px';
		          				clearInterval(tiempo_r);
		          				// alert( +"---t"+totalp)
		          			},500) ;
					}

	          		// }

	          		// console.log("modificar");
	        	});
		        	document.getElementsByClassName('form-control')[1].addEventListener('blur',()=>{
	        			if (activo==1) {
	        				activo=0
		          			var d = document.getElementById('chatt').style.top;
		          			// console.log(d.substr(0,3)+100);
		          			document.getElementById('chatt').style.top=(parseInt(d.substr(0,3))+regresar)+'px';
	        			}

		        	});
			}

        	// document.getElementsByClassName
			// var friend = this.friendid;
			const ccc = this;
			var id = this.userid;
			URL = window.URL || window.webkitURL;
			var gumStream;            //stream from getUserMedia()
			var rec;              //Recorder.js object
			var input;              //MediaStreamAudioSourceNode we'll be recording
			var AudioContext = window.AudioContext || window.webkitAudioContext;
			var audioContext 

			var recordButton = document.getElementById("voz1");
			var stopButton = document.getElementById("voz2");
			recordButton.addEventListener("click", startRecording);
			stopButton.addEventListener("click", stopRecording);

			function startRecording() {
			    var constraints = { audio: true, video:false }
				  recordButton.style.display = "none";
				  stopButton.style.display = "";
				  navigator.mediaDevices.getUserMedia(constraints).then(function(stream) {

				  	// console.log(stream);
				    audioContext = new AudioContext();

				    // document.getElementById("formats").innerHTML="Format: 1 channel pcm @ "+audioContext.sampleRate/1000+"kHz"

				    gumStream = stream;
				    
				    input = audioContext.createMediaStreamSource(stream);


				    rec = new Recorder(input,{numChannels:1})

				    rec.record()


				  }).catch(function(err) {
				      recordButton.disabled = false;
				      stopButton.disabled = true;
			
				  });
				}

				function stopRecording() {
				 recordButton.style.display = "";
				  stopButton.style.display = "none";
				  rec.stop();
				  gumStream.getAudioTracks()[0].stop();
				  rec.exportWAV(createDownloadLink);
				}

				function createDownloadLink(blob) {
					var friend = $("#friendss").val();
				  // console.log(blob);
				  var xhr=new XMLHttpRequest();
				  xhr.onload=function(e) {
				      if(this.readyState === 4) {
				      	var dataa = JSON.parse(e.target.responseText);
				      	var data = {
						chat:"",
						id_contacto:friend,
						id_usuario:id,
						video:'0',
						file:'voz',
						file_name:dataa.file_name
						}
				          	// console.log(json);
						let f = ccc.chats[ccc.chats.length-1];
						let d = "";
						var datee = dataa.date;

						// console.log(response.);
						if (f!=undefined) {
							if (f.fecha.substr(0,10)!=datee.substr(0,10)) {
								// let fa =response.data.substr(0,10).split('-') 
								// d = fa[2]+"-"+fa[1]+"-"+fa[0];
								  // fecha = cha[i].fecha.substr(0,10);
                            // console.log();
                            let faa = datee.substr(0,10).split('-')
                            // console.log(faa[2]+"-"+faa[1]+"-"+faa[0]);
                            var dias=["Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sábado"];
                            let meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];

                            var dt = new Date(faa[1]+' '+faa[2]+', '+faa[0]+' 12:00:00');
                            d = dias[dt.getUTCDay()]+","+meses[dt.getMonth()]+" "+faa[2]+", "+faa[0];
							}
						}else{
						 let faa = datee.substr(0,10).split('-')
                            // console.log(faa[2]+"-"+faa[1]+"-"+faa[0]);
                            var dias=["Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sábado"];
                            let meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];

                            var dt = new Date(faa[1]+' '+faa[2]+', '+faa[0]+' 12:00:00');
                            d = dias[dt.getUTCDay()]+","+meses[dt.getMonth()]+" "+faa[2]+", "+faa[0];
						}
						
						data.fecha = datee;
						data.dia = d;
						ccc.chats.push(data);
				      		// this.chats.push();
				      } 
				  };

				  var fd =new FormData();
				  fd.append("audio_data", blob);
				  fd.append("friend",friend);
				  let de = new Date();
				  					let me = (parseInt(de.getMonth())+1);
				  let tt = de.getFullYear()+"-"+(me<10?"0"+me:me)+"-"+(de.getDate()<10?"0"+de.getDate():de.getDate())+" "+(de.getHours()<10?"0"+de.getHours():de.getHours())+":"+(de.getMinutes()<10?"0"+de.getMinutes():de.getMinutes())+":"+de.getSeconds();
				  fd.append("fech",tt)
				  xhr.open("POST",ccc.urls+"chat2/voz",true);
				  xhr.send(fd);
				}
		},
		methods:{
			enviarChat:function(e){
				// console.log(this.chats);
				if (this.chat!="") {
					let de = new Date();
					let me = (parseInt(de.getMonth())+1);
					let tt = de.getFullYear()+"-"+(me<10?"0"+me:me)+"-"+(de.getDate()<10?"0"+de.getDate():de.getDate())+" "+(de.getHours()<10?"0"+de.getHours():de.getHours())+":"+(de.getMinutes()<10?"0"+de.getMinutes():de.getMinutes())+":"+de.getSeconds();
					 
					var data = {
						chat:this.chat,
						id_contacto:this.friendid,
						id_usuario:this.userid,
						video:'0',
						fech:tt,
						proyecto: document.getElementById("proyecto_cu").value
					}
					this.chat = "";
					axios.post(this.urls+'chat2/sendchat',data).then((response)=>{
						let f = this.chats[this.chats.length-1];
						let d = "";
						var datee = response.data;
						// console.log(response.);
						if (f!=undefined) {
							if (f.fecha.substr(0,10)!=datee.substr(0,10)) {
								// let fa =response.data.substr(0,10).split('-') 
								// d = fa[2]+"-"+fa[1]+"-"+fa[0];
								  // fecha = cha[i].fecha.substr(0,10);
                            // console.log();
                            let faa = datee.substr(0,10).split('-')
                            // console.log(faa[2]+"-"+faa[1]+"-"+faa[0]);
                            var dias=["Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sábado"];
                            let meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];

                            var dt = new Date(faa[1]+' '+faa[2]+', '+faa[0]+' 12:00:00');
                            d = dias[dt.getUTCDay()]+","+meses[dt.getMonth()]+" "+faa[2]+", "+faa[0];
							}
						}else{
						 let faa = datee.substr(0,10).split('-')
                            // console.log(faa[2]+"-"+faa[1]+"-"+faa[0]);
                            var dias=["Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sábado"];
                            let meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];

                            var dt = new Date(faa[1]+' '+faa[2]+', '+faa[0]+' 12:00:00');
                            d = dias[dt.getUTCDay()]+","+meses[dt.getMonth()]+" "+faa[2]+", "+faa[0];
						}
						
						data.fecha = datee;
						data.dia = d;
						// console.log(data);
						this.chats.push(data);
					});
				}
			},
			enviararchivo:function(e){
				// console.log("Espere..");
				var ddddd = this;
				let formulario = new FormData();
				let file = this.$refs.arcc.files[0];
				let form = this.$refs.arcc.value.split('.');
				let fpe = form[form.length-1];
				if (fpe=='docx' || fpe=="JPG" || fpe=="PNG" ||fpe=="jpg" || fpe=="png" || fpe=="pdf" || fpe=="txt") {
					if (file.size<=1000000) {
						if (file.length!=0) {
							this.$refs.arcc.value = null;
							// console.log();
							let de = new Date();
							let me = (parseInt(de.getMonth())+1);
							let tt = de.getFullYear()+"-"+(me<10?"0"+me:me)+"-"+(de.getDate()<10?"0"+de.getDate():de.getDate())+" "+(de.getHours()<10?"0"+de.getHours():de.getHours())+":"+(de.getMinutes()<10?"0"+de.getMinutes():de.getMinutes())+":"+de.getSeconds();
							// console.log(tt);  
							formulario.append('file',file);
							formulario.append('id_contacto',this.friendid);
							formulario.append('id_usuario',this.userid)
							formulario.append('fech',tt)
							formulario.append('',document.getElementById("proyecto_cu").value)
							// console.log()379 
							// console.log(this.$refs.arcc.files[0]);
							var c =  this.chat;
							var f = this.friendid;
							var u = this.userid;
							var data =0 ;
							axios.post(ddddd.urls+'file-chat',formulario,{
								headers:{
									'Content-Type':'multiplart/form-data'
								}
							}).then((response)=>{
								// console.log(response);
							data = {
								id:response.data.id,
								chat:"Archivo",
								id_contacto:f,
								id_usuario:u,
								file:response.data.file,
								file_name:response.data.file_name,
							};
								let f = this.chats[this.chats.length-1];
						let d = "";
						var datee = response.data.date;
						// console.log(response.);
						if (f!=undefined) {
							if (f.fecha.substr(0,10)!=datee.substr(0,10)) {
								// let fa =response.data.substr(0,10).split('-') 
								// d = fa[2]+"-"+fa[1]+"-"+fa[0];
								  // fecha = cha[i].fecha.substr(0,10);
                            // console.log();
                            let faa = datee.substr(0,10).split('-')
                            // console.log(faa[2]+"-"+faa[1]+"-"+faa[0]);
                            var dias=["Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sábado"];
                            let meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];

                            var dt = new Date(faa[1]+' '+faa[2]+', '+faa[0]+' 12:00:00');
                            d = dias[dt.getUTCDay()]+","+meses[dt.getMonth()]+" "+faa[2]+", "+faa[0];
							}
						}else{
						 let faa = datee.substr(0,10).split('-')
                            // console.log(faa[2]+"-"+faa[1]+"-"+faa[0]);
                            var dias=["Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sábado"];
                            let meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];

                            var dt = new Date(faa[1]+' '+faa[2]+', '+faa[0]+' 12:00:00');
                            d = dias[dt.getUTCDay()]+","+meses[dt.getMonth()]+" "+faa[2]+", "+faa[0];
						}
						
						data.fecha = datee;
						data.dia = d;
						this.chats.push(data);
							

							// this.chats.push(data);

						}).catch(function(){
							console.log("Error");
						})
						}	
					}else{
						alert("Peso sobrepasa 1 MB");
					}			
				}else{
					// console.log();
					alert("Formato no aceptado");
					// console.log(form[form.length-1]);
				}

			}
		}
	}
</script>