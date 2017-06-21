/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the body of the page. From here, you may begin adding components to
 * the application, or feel free to tweak this setup for your needs.
 */

 var VueResource = require('vue-resource');

 Vue.use(VueResource);

 import Users from './components/Users.vue';


 Vue.http.headers.common['X-CSRF-TOKEN'] = Laravel.csrfToken;



const app = new Vue({
    el: '#app',
    components: {
        Users
     },
     showModal: function() {
            alert("It's working!");
        }
});
