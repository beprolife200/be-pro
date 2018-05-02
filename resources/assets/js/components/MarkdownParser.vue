<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    Preview
                </div>
                <div class="card-body">
                    <div v-html="markdown"></div>
                </div>
            </div>
        </div>
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

    watch: {
        value: throttle(async function () {
            const res = await window.axios.post('/api/markdown', { content: this.value })
            this.markdown = res.data.body
            this.$nextTick(() => Prism.highlightAll())
        }, 1000)
    }
}
</script>
