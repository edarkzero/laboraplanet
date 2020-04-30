
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
Vue.prototype.$laravel_base_path = window.laravel_base_path;

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('chat',require('./components/Chat.vue').default);
Vue.component('enviar',require('./components/enviarmensaje.vue').default);
Vue.component('general',require('./components/general.vue').default);
Vue.component('conver',require('./components/conver.vue').default);
Vue.component('list',require('./components/list.vue').default);
Vue.component('notificacion',require('./components/notificacion.vue').default);

const app = new Vue({
    el: '#app',
    data:{
        chats:'',
    },
    created(){
        const userId = $('meta[name="userId"]').attr('content');
        const friendId = $('meta[name="friendId"]').attr('content');

        var data = {id:friendId};
        if (friendId != undefined) {
            axios.post('../chat2/getchat',data).then((response)=>{
                this.chats = response.data;
            });

            // Echo.private('Chat.'+userId+'.'+friendId).listen('BroadcastChat',(e)=>{
            //     this.chats.push(e.chat);
            // });
             Echo.private('Chat.'+friendId+'.'+userId).listen('BroadcastChat',(e)=>{
            this.chats.push(e.chat);
        });
        }
    }

});






// Bulma NavBar Burger Script
document.addEventListener('DOMContentLoaded', function () {
    // Get all "navbar-burger" elements
    const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);
    
    // Check if there are any navbar burgers
    if ($navbarBurgers.length > 0) {
        
        // Add a click event on each of them
        $navbarBurgers.forEach(function ($el) {
            $el.addEventListener('click', function () {
                
                // Get the target from the "data-target" attribute
                let target = $el.dataset.target;
                let $target = document.getElementById(target);
                
                // Toggle the class on both the "navbar-burger" and the "navbar-menu"
                $el.classList.toggle('is-active');
                $target.classList.toggle('is-active');
                
            });
        });
    }
    
});



require('./bulma-extensions');
