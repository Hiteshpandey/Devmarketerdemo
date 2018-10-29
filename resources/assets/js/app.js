
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import Buefy from 'buefy';
Vue.use(Buefy);

let app = new Vue({
    el: '#app', //element
    data: {}
});

$(document).ready(function(){
    $('button.dropdown').hover(function(){
        $(this).toggleClass('is-open');
    });
})
