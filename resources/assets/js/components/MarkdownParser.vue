<template>
    <div class="row">
        <div v-html="markdown"></div>
    </div>
</template>

<script>

import { throttle } from 'lodash'
import Prism from 'prismjs'
import 'prismjs/themes/prism-okaidia.css'

export default {
    name: 'MarkdownParser',

    props: {
        value: {
            type: String,
            default: ''
        }
    },

    data() {
        return {
            markdown: ''
        }
    },

    created() {
        this.parse()
    },

    watch: {
        value: throttle(function () {
            this.parse()
        }, 1000)
    },

    methods: {
        async parse() {
            const res = await window.axios.post('/api/markdown', { content: this.value })
            this.markdown = res.data.body
            this.$nextTick(() => Prism.highlightAll())
        }
    }
}
</script>
