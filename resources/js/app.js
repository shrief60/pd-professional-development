
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/** VueRouter */
import VueRouter from 'vue-router';
import router from './router/router';
Vue.use(VueRouter);

/** Vuex */
import { store } from './store/store'

/** Public components */
import app from './components/app';
Vue.component('loading', require('./components/partials/loading'));
Vue.component('file-upload', require('vue-upload-component'));

/** Fresh vue application */
const App = new Vue({
    el: '#app',
    components: {app},
    template: '<app />',
    router,
    store
});
