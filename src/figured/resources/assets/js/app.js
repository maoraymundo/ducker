
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('froala-editor/js/froala_editor.pkgd.min');
require('froala-editor/css/froala_editor.pkgd.min.css')
require('font-awesome/css/font-awesome.css')
require('froala-editor/css/froala_style.min.css')

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import VueFroala from 'vue-froala-wysiwyg';
Vue.use(VueFroala);

Vue.component('richeditor', require('./components/RicheditorComponent.vue'));

const app = new Vue({
    el: '#app'
});