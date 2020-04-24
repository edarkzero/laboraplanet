<template>
	<div class="panel-footer">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Enter your message here..." v-on:keyup.enter="enviarChat" v-model="chat">
            <span class="input-group-btn">
            <button class="btn btn-primary btn-gradient" type="button" v-on:click="enviarChat">Send Message</button>
            </span>
        </div>
    </div>
</template>
<script>
	export default{
		props:['userid','friendid','chats'],
		data(){
			return{
			chat:''	
			} 
		},
		methods:{
			enviarChat:function(e){
				if (this.chat!=null) {
					var data = {
						chat:this.chat,
						id_contacto:this.friendid,
						id_usuario:this.userid
					}
					this.chat = "";
					axios.post('../chat2/sendchat',data).then((response)=>{
						this.chats.push(data);
					})
				}
			}
		}
	}
</script>