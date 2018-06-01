require('./bootstrap');

window.Vue = require('vue');

import Buefy from 'buefy';
Vue.use(Buefy);

Vue.component('vacancies', require('./components/Vacancies.vue'));

const app = new Vue({
    el: '#app',
    data: {
      auto_password: true,
      password_options: 'keep'
    }
});

require('./cms/navbar');
require('./cms/manage');
require('./cms/modal');
