<template>
  <div class="panel panel-widget chat-widget" >
    <div class="panel-heading">
      <span class="panel-title"> Chat </span>
    </div>
    <div class="panel-body bg-light " style="overflow-y: scroll;max-height: 500px ">
      <div v-if="chats.length!=0" >
        <div  v-for="chat in chats">
    <div class="media" style="width: 95%;min-width: 200px;max-width: 750px;float: right;padding: 5px" v-if="chat.id_usuario==userid">
      <div class="media-body" style="width: 100%;" align="right">
        <h5 class="media-heading">{{ unom }}</h5> 
        {{ chat.chat }}
      </div>
      <div class="media-right">
        <a href="#">
          <img class="media-object" alt="64x64" :src="uimg">
        </a>
      </div>
    </div>
    <div class="media" style="width: 95%;min-width: 200px;max-width: 750px;float: left;padding: 5px" v-else>
        <div class="media-left">
          <a href="#">
              <img class="media-object" alt="64x64" :src="cimg">
            </a>
        </div>
        <div class="media-body" style="width: 100%" align="left">
            <h5 class="media-heading">{{ cnom }}</h5>
            {{ chat.chat }}
        </div>
    </div>
        </div>
    </div>
    <div v-else>
      NO HAY MENSAJES
    </div>
    </div> 
    <enviar v-bind:userid="userid" v-bind:chats="chats" v-bind:friendid="friendid"></enviar> 
  </div>



	
</template>
<script>
	export default {
		props : ['cimg','uimg','chats','userid','friendid','cnom','unom'],
        mounted() {
            console.log('chat')
        }
    }
</script>

 