<template>
    <form action="#" @submit.prevent="onSubmit">
        <fieldset>
            <div class="form-group">
                <label for="tagNameInput">標籤</label>
                <input v-model="tag.name" id="tagNameInput" name="name" type="text" list="tagList">
                <datalist id="tagList" v-if="matchTags.length">
                    <option v-for="(tag, index) in matchTags" :key="index" :value="tag.name" />
                </datalist>
            </div>
        </fieldset>
    </form>
</template>

<style scope>
fieldset {
  border: none;
}
</style>

<script>

export default {

    name: 'TagCreater',

    data() {
        return {
            tags: [],
            tag: {
                name: ''
            }
        }
    },

    computed: {
        matchTags() {
            if (this.tags.length === 0) {
                return []
            }
            const tags = this.tags.filter(tag => {
                return tag.name.toLowerCase().includes(this.tag.name.toLowerCase())
            })
            return tags.length > 5 ? tags.slice(0, 4) : tags
        }
    },

    created() {
        this.getTags('/api/tags')
    },

    methods: {
        getTags() {
            return axios.get('/api/tags')
                .then(res => this.tags = res.data.data)
        },

        async onSubmit() {
            if (!this.tag.name) return
            const res = await axios.post('/api/tags', { tag: this.tag })
            const tag = res.data.data
            this.tags.push(tag)
            this.resetInput()
            this.$emit('attach-tag', tag)
        },

        resetInput() {
            this.tag.name = ''
        }
    }
}
</script>
