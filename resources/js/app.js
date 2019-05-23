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

// Admin components
Vue.component('datatable', require('./components/admin/Datatable.vue').default);
Vue.component('view-user', require('./components/admin/ViewUser.vue').default);
Vue.component('admin-view-company', require('./components/admin/ViewCompany.vue').default);
Vue.component('admin-company-datatable', require('./components/admin/CompanyDatatable.vue').default);
Vue.component('admin-login', require('./components/admin/Login.vue').default);

// Common components
Vue.component('alert', require('./components/common/Alert.vue').default);
Vue.component('avatar', require('./components/common/Avatar.vue').default);
Vue.component('main-modal', require('./components/common/MainModal.vue').default);
Vue.component('photo-modal', require('./components/common/PhotoModal.vue').default);
Vue.component('delete-modal', require('./components/common/DeleteModal.vue').default);
Vue.component('navigation', require('./components/common/Navigation.vue').default);
Vue.component('password-eye', require('./components/common/PasswordEye.vue').default);
Vue.component('record-form', require('./components/common/RecordForm.vue').default);
Vue.component('ads', require('./components/common/Ads.vue').default);
Vue.component('job-ads', require('./components/common/JobAds.vue').default);

// Auth components
Vue.component('login', require('./components/auth/Login.vue').default);
Vue.component('logout', require('./components/auth/Logout.vue').default);
Vue.component('register', require('./components/auth/Register.vue').default);
Vue.component('request-link', require('./components/auth/passwords/RequestLink.vue').default);
Vue.component('reset-password', require('./components/auth/passwords/ResetPassword.vue').default);

// Profile components
Vue.component('user-profile', require('./components/profile/UserProfile.vue').default);
Vue.component('about-me', require('./components/profile/AboutMe.vue').default);
Vue.component('ideal-role', require('./components/profile/IdealRole.vue').default);
Vue.component('employment', require('./components/profile/Employment.vue').default);
Vue.component('employment-modal', require('./components/profile/EmploymentModal.vue').default);
Vue.component('industry-skills', require('./components/profile/IndustrySkills.vue').default);
Vue.component('education', require('./components/profile/Education.vue').default);
Vue.component('education-modal', require('./components/profile/EducationModal.vue').default);
Vue.component('tickets', require('./components/profile/Tickets.vue').default);
Vue.component('tickets-modal', require('./components/profile/TicketsModal.vue').default);

// Company Profile components
Vue.component('company-profile', require('./components/company/CompanyProfile.vue').default);
Vue.component('company-browse', require('./components/company/CompanyBrowse.vue').default);
Vue.component('company-posts', require('./components/company/CompanyPosts.vue').default);
Vue.component('company-people', require('./components/company/CompanyPeople.vue').default);
Vue.component('company-jobs', require('./components/company/CompanyJobs.vue').default);

// Job components
Vue.component('company-summary', require('./components/job/CompanySummary.vue').default);
Vue.component('job-details', require('./components/job/JobDetails.vue').default);
Vue.component('job-requirements', require('./components/job/JobRequirements.vue').default);
Vue.component('job-responsibilities', require('./components/job/JobResponsibilities.vue').default);

// Record components
Vue.component('show-form', require('./components/record/ShowForm.vue').default);

// Upload components
Vue.component('upload-photo', require('./components/upload/UploadPhoto.vue').default);

// Load components
Vue.component('load-user', require('./components/profile/LoadUser.vue').default);
Vue.component('load-company', require('./components/company/LoadCompany.vue').default);
Vue.component('load-job', require('./components/job/LoadJob.vue').default);

const app = new Vue({
    el: '#app',
    // router,
    // store: Store,
    // components: { App },
});