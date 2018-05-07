
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

window.Vue = require('vue');
Vue.prototype.$eventHub = window.$eventHub = new Vue
require('./bootstrap');
window.store = require('./store')
Vue.component('MarkdownParser', require('@components/MarkdownParser.vue'))


new Vue({
    el: '.notification-panel',
    components: {
        AlertPanel: require('@components/AlertPanel.vue')
    }
})