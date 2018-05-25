require('./bootstrap');

window.Vue = require('vue');
import Vue from 'vue'; 

import Buefy from 'buefy';
Vue.use(Buefy);

Vue.component('example-component', require('./components/ExampleComponent.vue'));

// const app = new Vue({
//     el: '#app'
// });

require('./cms/navbar');
require('./cms/manage');
