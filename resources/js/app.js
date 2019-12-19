import Vue from 'vue';

import Modal from './plugins/modal/ModalPlugin';
import Dropdown from './components/Dropdown';
import ConfirmDialog from './components/ConfirmDialog';
import ConfirmButton from './components/ConfirmButton';
import TestComponent from './components/TestComp';
import Vuecidity from 'vuecidity';
import 'vuecidity/dist/lib/vuecidity.min.css';

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = Vue;

Vue.use(Modal);
Vue.use(Vuecidity)

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))


Vue.component('dropdown', Dropdown);
Vue.component('confirm-dialog', ConfirmDialog);
Vue.component('confirm-button', ConfirmButton);
Vue.component('confirm-button', ConfirmButton);
Vue.component('claire', TestComponent);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

new Vue({
    el: '#app',

    methods: {
        confirm(message) {
           this.$modal.dialog(message);
        }
    }
});

// require('./components/toggleTransition.js');
// require('./components/toggle.js');
// require('./components/mainNavToggle.js');
// require('./components/scrollToTop.js');
