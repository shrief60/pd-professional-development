
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';
import routes from './routes/routes';

Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    routes
})


const files = require.context('./', true, /\.vue$/i)
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key)))

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Public components;
Vue.component('app', require('./components/app.vue'));
Vue.component('file-upload', require('vue-upload-component'));

const app = new Vue({
    el: '#app',
    router
});
