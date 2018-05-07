
require('./bootstrap')

Vue.component('MarkdownParser', require('@components/MarkdownParser.vue'))

new Vue({
    el: '.notification-panel',
    components: {
        AlertPanel: require('@components/AlertPanel.vue')
    }
})