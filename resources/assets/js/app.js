require('./bootstrap');

window.Vue = require('vue');

import Buefy from 'buefy';
Vue.use(Buefy);

Vue.component('vacancies', require('./components/Vacancies.vue'));

const app = new Vue({
    el: '#app',
    data: {
      auto_password: true,
      password_options: 'keep',
      permissionType: 'basic',
      resource: '',
      crudSelected: ['create', 'read', 'update', 'delete']
    },
    methods: {
      crudName: function(item) {
        return item.substr(0,1).toUpperCase() + item.substr(1) + " " + app.resource.substr(0,1).toUpperCase() + app.resource.substr(1);
      },
      crudSlug: function(item) {
        return item.toLowerCase() + "-" + app.resource.toLowerCase();
      },
      crudDescription: function(item) {
        return "Allow a User to " + item.toUpperCase() + " a " + app.resource.substr(0,1).toUpperCase() + app.resource.substr(1);
      }
    }
});

require('./cms/navbar');
require('./cms/manage');
require('./cms/modal');
