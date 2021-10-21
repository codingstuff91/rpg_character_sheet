/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import CharacterSheet from './components/vtm_character.vue';
Vue.component('character-sheet', CharacterSheet);

import EditDescription from './components/EditDescription.vue';
Vue.component('edit-description', EditDescription);

import VueQuillEditor from 'vue-quill-editor'
import 'quill/dist/quill.snow.css'
Vue.use(VueQuillEditor)

import Vue from 'vue'
import Buefy from 'buefy'
import 'buefy/dist/buefy.css'

 Vue.use(Buefy)

const app = new Vue({
    el: '#app',
});
