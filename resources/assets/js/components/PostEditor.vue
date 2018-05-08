<template>
    <div class="post-editor">
        <div class="post-editor__tool">
            <post-tool
                :post="post"
                :on-preview="preview"
                @toggle-preview="preview = !preview"
            >
                <span slot="close-btn" @click="$emit('close')">
                    <i class="fa fa-times"></i>
                </span>
            </post-tool>
        </div>
        <div class="post-editor__paper">
            <textarea ref="editor" v-model="post.content" @keyup.esc="$emit('close')" />
        </div>
        <div class="post-editor__preview animated" v-show="preview">
            <markdown-parser v-model="post.content"></markdown-parser>
        </div>
    </div>
</template>
<script>

import EditorHotKeyMixin from '@mixins/EditorHotKeyMixin'
import PostTool from '@components/PostTool'

export default {
    name: 'PoseEditor',

    props: ['post'],

    mixins: [
        EditorHotKeyMixin
    ],

    components: {
        PostTool
    },

    data() {
        return {
            preview: true
        }
    },

    mounted() {
        this.$refs['editor'].focus()
    },

    methods: {

        updateMarkdownContent(content) {
            this.markdown.content = content
        },

        async submitPost() {
            const formData = new FormData(this.$refs['createPostForm'])
            formData.append('content', this.markdown.content)
            await axios.post('/posts', formData)
            window.location.href = '/'
        },
    }
}
</script>

<style lang="scss">
@import "../../sass/variables";
@import "../../sass/mixins";

.post-editor {
  width: 100%;
  display: flex;
  flex-wrap: wrap;
  min-width: 1000px;
  align-items: stretch;
  justify-content: center;
  &__tool {
    flex: none;
    width: 100%;
  }
  &__paper {
    flex: 1 0 50%;
    max-width: 900px;
    height: 90vh;
    padding: 0 15px;
    textarea {
      width: 100%;
      height: 100%;
      border: 0;
      resize: none;
      font-size: 18px;
      line-height: 1.5;
    }

    input,
    textarea {
      background-color: transparent;
    }
  }
  &__preview {
    flex: 1 0 50%;
    padding-left: 15px;
    border-left: 1px dashed $primary;
  }
}

@include media("md") {
  .post-editor {
    min-width: 100%;
    &__paper {
        padding: 0;
    }
  }
}
</style>