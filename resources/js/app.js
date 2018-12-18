
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

$("img.svg").each(function () {
    // Perf tip: Cache the image as jQuery object so that we don't use the selector muliple times.
    var $img = jQuery(this);
    // Get all the attributes.
    var attributes = $img.prop("attributes");
    // Get the image's URL.
    var imgURL = $img.attr("src");
    // Fire an AJAX GET request to the URL.
    $.get(imgURL, function (data) {
        // The data you get includes the document type definition, which we don't need.
        // We are only interested in the <svg> tag inside that.
        var $svg = $(data).find('svg');
        // Remove any invalid XML tags as per http://validator.w3.org
        $svg = $svg.removeAttr('xmlns:a');
        // Loop through original image's attributes and apply on SVG
        $.each(attributes, function () {
            $svg.attr(this.name, this.value);
        });
        // Replace image with new SVG
        $img.replaceWith($svg);
    });
});


window.Plyr = require('plyr');
window.ProgressBar = require('progressbar.js')

// window.Vue = require('vue');

// /** VueRouter */
// import VueRouter from 'vue-router';
// import router from './router/router';
// Vue.use(VueRouter);

// /** Vuex */
// import { store } from './store/store';

// /** Vue Notifications */
// import Toasted from 'vue-toasted';
// Vue.use(Toasted)

// /** Bootstrap Vue */
// import BootstrapVue from 'bootstrap-vue'
// Vue.use(BootstrapVue);

// /** Plyr Video */
// import VuePlyr from 'vue-plyr';
// import 'vue-plyr/dist/vue-plyr.css';
// Vue.use(VuePlyr);

// /** Public components */
// import app from './components/app';
// Vue.component('loading', require('./components/partials/loading'));

// /** Fresh vue application */
// const App = new Vue({
//     el: '#app',
//     components: {app},
//     template: '<app />',
//     router,
//     store
// });

