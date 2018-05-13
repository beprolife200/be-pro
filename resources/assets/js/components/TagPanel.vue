<template>
    <div class="tag-panel">
        <tag-creater @attach-tag="attachTag"></tag-creater>
        <hr>
        <div class="tag-panel__tags">
            <div>以標籤</div>
            <div>
                <tag v-for="(tag, index) in post.tags" :key="index" :tag="tag" @remove="removeTag" />
            </div>
        </div>
    </div>
</template>

<style lang="scss">
.tag-panel {
    &__tags {

    }
}
</style>


<script>
import Tag from '@components/Tag'
import { alert } from '@js/utils'
import TagCreater from '@components/TagCreater'
export default {

    name: 'TagPanel',

    components: {
        TagCreater, Tag
    },

    props: ['post'],

    methods: {

        attachTag(tag) {
            axios.post(`/api/posts/${this.post.slug}/tags/${tag.id}`)
                .then(res => {
                    this.post.tags.push(res.data.data)
                    alert('標籤新增成功', 'success', 5000)
                })
        },

        removeTag(tag) {
            axios.delete(`/api/posts/${this.post.slug}/tags/${tag.id}`)
                .then(res => {
                    this.post.tags = this.post.tags.filter(t => t !== tag)
                    alert(res.data.message, 'success', 5000)
                })
        }
    }
}
</script>
