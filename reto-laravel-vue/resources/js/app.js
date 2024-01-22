

require('./bootstrap');

window.Vue = require('vue').default;

import App from './App.vue';
import VueAxios from 'vue-axios';
import {createRouter,createWebHistory } from 'vue-router';
import axios from 'axios';
import { routes } from './routes';
Vue.use(VueAxios, axios);

const router = new createRouter({
    history: createWebHistory(),
    routes: routes
});

Vue.component('app', require('./App.vue').dafault)
const app = new Vue({
    el: '#app',
    router: router,
    render: h => h(App)
});

