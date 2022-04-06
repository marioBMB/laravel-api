/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
 window.Vue = require('vue');

 window.axios = require('axios');
 window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

 window.dayjs = require('dayjs');
 // dayjs.extend(window.dayjs_plugin_customParseFormat); /* per leggere una data in formato diverso da ISO 8601 */



/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */


import App from './App.vue';
import router from './router';

import '@fortawesome/fontawesome-free/css/all.css';
import '@fortawesome/fontawesome-free/js/all.js';


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    render: h => h(App),
    router
});