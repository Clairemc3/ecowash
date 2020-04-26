import Vue from 'vue';

import Modal from './plugins/modal/ModalPlugin';
import Dropdown from './components/Dropdown';
import ConfirmDialog from './components/ConfirmDialog';
import ConfirmButton from './components/ConfirmButton';
import SidebarAdmin from './components/SidebarAdmin';
import Carousel from './components/Carousel';
import Slider from './components/Slider';
import ImageSelect from './components/ImageSelect';
import vuetify from './plugins/vuetify';
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
import VueCookies from 'vue-cookies';
import axios from 'axios'
// import { BootstrapVue, IconsPlugin } from 'bootstrap-vue';


/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

// require('./bootstrap');

window.Vue = Vue;
Vue.prototype.$http = axios;

Vue.use(Modal);
Vue.use(VueCookies)
// Vue.use(BootstrapVue)
// Vue.use(IconsPlugin)

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
Vue.component('sidebar-admin', SidebarAdmin);
Vue.component('carousel', Carousel);
Vue.component('image-select', ImageSelect);
Vue.component('slider', Slider);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

new Vue({
    el: '#app',
    vuetify,

    methods: {
        confirm(message) {
           this.$modal.dialog(message);
        },
        setCookie(key, value, expireAfter = '30d') {
            Vue.$cookies.set(key,value, expireAfter);
        },
    }
});

require('./components/toggleTransition.js');
require('./components/toggle.js');
require('./components/mainNavToggle.js');
require('./components/scrollToTop.js');
require('./components/WYSIWYGInput.js');

