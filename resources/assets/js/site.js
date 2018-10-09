
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
// moment
import moment from 'moment';
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
  if (value.length >= 100) {
    return value.substring(0,100) + '...';
  } else {
    return value
  }
});

Vue.filter('first-characters-small', function(value){
  if (value.length >= 90) {
    return value.substring(0,90) + '...';
  } else {
    return value
  }
});

Vue.filter('vacancyRequirements', function(value){
  if (value.length >= 150) {
    return value.substring(0,150) + '...';
  } else {
    return value
  }
});

Vue.filter('myDate', function(created){
  return moment(created).lang("es").format('MMMM Do YYYY');
});

Vue.filter('myTime', function(created){
  return moment(created).lang("es").format('h:mm a');
});



Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('posts', require('./components/Posts.vue'));
Vue.component('vacancies', require('./components/Vacancies.vue'));

// const app = new Vue({
//     el: '#app',
// });

require('./cms/navbar');
require('./site/slider');
