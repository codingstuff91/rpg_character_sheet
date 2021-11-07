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

import { library } from '@fortawesome/fontawesome-svg-core';
import { faTint, faStar, faBolt, faFistRaised, faSkullCrossbones, faUserAlt, faQuestionCircle, faUser, faExclamationTriangle, faCross, faBan, faAnkh} from "@fortawesome/free-solid-svg-icons";
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";

library.add(faTint, faStar, faBolt, faFistRaised, faSkullCrossbones, faUserAlt, faQuestionCircle, faUser, faExclamationTriangle, faCross, faBan, faAnkh);
Vue.component('vue-fontawesome', FontAwesomeIcon);

import Vue from 'vue'
import Buefy from 'buefy'
import 'buefy/dist/buefy.css'

Vue.use(Buefy, {
  defaultIconComponent: 'vue-fontawesome',
  defaultIconPack: 'fas',
});

const app = new Vue({
    el: '#app',
});
