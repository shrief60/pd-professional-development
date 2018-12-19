
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
import { store } from './store/store';

/** Vue Notifications */
import Toasted from 'vue-toasted';
Vue.use(Toasted)

/** Bootstrap Vue */
import BootstrapVue from 'bootstrap-vue'
Vue.use(BootstrapVue);

/** Plyr Video */
import VuePlyr from 'vue-plyr';
import 'vue-plyr/dist/vue-plyr.css';
Vue.use(VuePlyr);

/** Public components */
import app from './components/app';
Vue.component('loading', require('./components/partials/loading'));

/** Fresh vue application */
const App = new Vue({
    el: '#app',
    components: {app},
    template: '<app />',
    router,
    store
});
