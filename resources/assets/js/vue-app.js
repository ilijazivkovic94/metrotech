import Vue from 'vue'
import VueRouter from 'vue-router';
import { routes } from './routes';
import VueSocketIO from 'vue-socket.io';
import linkify from 'vue-linkify';

import axios from 'axios';
import VueAxios from 'vue-axios';

import App from './App.vue'

// const connection = 'https://doctorbattles.com:8443';
//
// Vue.use(new VueSocketIO({
//     debug: false,
//     connection: connection,
//     vuex: store
// }));

import io from "socket.io-client";
const socket = io('https://doctorbattles.com:8443');

Vue.prototype.$socket = socket;

Vue.use(VueRouter);
Vue.use (VueAxios, axios);

Vue.directive('linkified', linkify);

axios.defaults.baseURL = 'http://metrotech.gg/api';

const router = new VueRouter({
    mode: 'history',
    routes
});

new Vue({
    render: h => h(App),
    el: '#vue-app',
    router,
});
