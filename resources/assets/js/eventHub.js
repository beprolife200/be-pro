import Vue from 'vue'

import { alert } from '@js/utils'

Vue.prototype.$eventHub = window.$eventHub = new Vue({
    created() {
        this.$on('store-post', this.store)
        this.$on('save-post', this.save)
    },
    methods: {
        save(post) {
            window.axios.put(`/api/posts/${post.slug}`, post)
                .then(res => alert(res.data.message))
                .catch(res => alert(res.data.message, 'error'))
        },
        store(post) {
            window.axios.post('/api/posts', post)
                .then(res => alert(res.data.message))
                .catch(res => alert(res.data.message, 'error'))
        }
    }
})
