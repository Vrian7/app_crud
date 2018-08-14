
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import AppMain from './components/record/RecordIndex.vue'
import bModal from 'bootstrap-vue/es/components/modal/modal'
import bButton from 'bootstrap-vue/es/components/button/button'
import bFormInput from 'bootstrap-vue/es/components/form-input/form-input'
import bFormGroup from 'bootstrap-vue/es/components/form-group/form-group';
import bFormSelect from 'bootstrap-vue/es/components/form-select/form-select';
import bAlert from 'bootstrap-vue/es/components/alert/alert';
window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('b-modal', bModal);
Vue.component('b-button', bButton);
Vue.component('b-form-input', bFormInput);
Vue.component('b-form-group', bFormGroup);
Vue.component('b-form-select', bFormSelect);
Vue.component('b-alert', bAlert);
const app = new Vue({
    el: '#app',
    components: {
    	AppMain
    },
    //locale: es
});
