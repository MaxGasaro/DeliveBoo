window.Vue = require('vue');

import Vue from 'vue';
import App from './views/App';

import router from './router';

const app = new Vue({
    el: '#root',
    render: h => h(App),
    router
});