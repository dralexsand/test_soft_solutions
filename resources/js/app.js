/**
 * Eg. ./components/ItemCars.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

require('./bootstrap');
//window.Vue = require('vue');

import Vue from 'vue';
import App from './components/App';
import {BootstrapVue, IconsPlugin} from 'bootstrap-vue'
import router from './router';
import store from './store';
import 'es6-promise/auto';

Vue.use(BootstrapVue)
Vue.use(IconsPlugin)


const app = new Vue({
    el: '#app',
    router,
    store,
    render: h => h(App)
});
