/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component("chat-messages", {
    template: `
    <ul class="chat">
        <li class="left clearfix" v-for="(message,index) in messages">
            <div class="chat-body clearfix">
                <div class="header">
                    <strong class="primary-font">
                        {{ message.user.name }}
                    </strong>
                    </div>
                    <div class="chat-message-box">
                    <div class="chat-message">
                <span class="circular">
                <img :src="message.user.profile_image_url" alt="">
                
                <a :href="message.user.url" class="user-url"></a>
                </span>
                <p class="chat-message-text animate_animated  animate_zoomInRight">
                    {{ message.message }}
                </p>
                </div>
                    </div>
                
            </div>
        </li>

    </ul>`,
    props: ["messages"],
    data() {
        return {};
    },
});


const app = new Vue({
    el: '#app',

    data: {
        messages: [],
        newMessage: ''
    },

    created() {
        this.fetchMessages();

        Echo.private('chat')
            .listen('MessageSentEvent', (e) => {
                this.messages.push({
                    message: e.message.message,
                    user: e.user
                });
            });
    },

    methods: {
        fetchMessages() {
            axios.get('/messages').then(response => {
                this.messages = response.data;
            });
        },

        addMessage(message) {
            axios.post('/messages', {
                message
            }).then(response => {
                this.messages.push({
                    message: response.data.message.message,
                    user: response.data.user
                });
            });
        },

        sendMessage() {
            this.addMessage(this.newMessage);
            this.newMessage = '';
        }
    }
});