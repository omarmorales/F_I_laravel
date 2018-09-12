require('./bootstrap');

window.Vue = require('vue');

import Buefy from 'buefy';
Vue.use(Buefy, {
  defaultIconPack: 'fa'
})

Vue.use(Buefy);

var VueTruncate = require('vue-truncate-filter');
Vue.use(VueTruncate);

// Vue.component('vacancies', require('./components/Vacancies.vue'));

require('./cms/navbar');
require('./cms/manage');
require('./cms/modal');
