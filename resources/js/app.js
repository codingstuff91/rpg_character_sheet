/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

Vue.component('vtm-v20-character-sheet', require('./components/VTM_V20_character_sheet.vue').default);

 import Vue from 'vue'
 import Buefy from 'buefy'
 import 'buefy/dist/buefy.css'
 
 Vue.use(Buefy)

const app = new Vue({
    el: '#app',
});
