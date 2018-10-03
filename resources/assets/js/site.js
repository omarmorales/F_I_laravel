
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
// vform
import { Form, HasError, AlertError } from 'vform'

window.Form = Form;
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)
// vform ends
//buefy starts
import Buefy from 'buefy';
Vue.use(Buefy, {
  defaultIconPack: 'fa'
})

Vue.use(Buefy);
// buefy ends

// filters
Vue.filter('first-characters', function(value){
  if (value.length >= 60) {
    return value.substring(0,60) + '...';
  } else {
    return value
  }
});

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('posts', require('./components/Posts.vue'));
Vue.component('vacancies', require('./components/Vacancies.vue'));

// const app = new Vue({
//     el: '#app',
// });
require('./cms/navbar');
require('./site/slider');
