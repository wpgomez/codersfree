require('./bootstrap');

require('alpinejs');

window.Vue = require('vue').default;

Vue.component('vue-example', require('./components/VueExample.vue').default);

const app = new Vue({
  el: '#app',
});