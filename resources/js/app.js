/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

// require('./bootstrap');

// window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// import Vue from 'vue';
// import router from '@/router';
// import App from '../views/App';
// import Store from '@/store';
require('./bootstrap');
require('./helpers');

window.Vue = require('vue');
window.Bus = new Vue();

Utils = Helper.methods;

Vue.component('example-component', require('./components/ExampleComponent.vue'));

// Message components
Vue.component('alert', require('./components/message/Alert.vue').default);

// Auth components
Vue.component('login', require('./components/auth/Login.vue').default);
Vue.component('logout', require('./components/auth/Logout.vue').default);
Vue.component('register', require('./components/auth/Register.vue').default);
Vue.component('request-link', require('./components/auth/passwords/RequestLink.vue').default);
Vue.component('reset-password', require('./components/auth/passwords/ResetPassword.vue').default);

// User components
Vue.component('profile', require('./components/user/Profile.vue').default);

// Record components
Vue.component('show-form', require('./components/record/ShowForm.vue').default);

// Upload components
Vue.component('upload-photo', require('./components/upload/UploadPhoto.vue').default);

// Modal components
Vue.component('main-modal', require('./components/MainModal.vue').default);

const app = new Vue({
    el: '#app',
    // router,
    // store: Store,
    // components: { App },
});