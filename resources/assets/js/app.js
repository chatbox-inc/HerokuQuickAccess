
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));
Vue.component('app', require('./components/App.vue'));
Vue.component('search-menu', require('./components/Search/SearchMenu.vue'));
    Vue.component('select-org', require('./components/Search/SelectOrg.vue'));
    Vue.component('select-stage', require('./components/Search/SelectStage.vue'));
    Vue.component('select-tag', require('./components/Search/SelectTag.vue'));
Vue.component('app-list', require('./components/AppList.vue'));
    Vue.component('in-apps', require('./components/InApp.vue'));


const app = new Vue({
    el: '#app'
});
