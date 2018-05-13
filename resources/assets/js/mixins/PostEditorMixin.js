import { alert } from '@js/utils'
import { debounce } from 'lodash'
import TagPanel from '@components/TagPanel'
import VideoPanel from '@components/VideoPanel'
import ReferencePanel from '@components/ReferencePanel'
import ConfigurePanel from '@components/ConfigurePanel'
import EditorHotKeyMixin from '@mixins/EditorHotKeyMixin'
import PostToolBar from '@components/PostToolBar'

export default {

    mixins: [
        EditorHotKeyMixin
    ],

    components: {
        PostToolBar, TagPanel, ConfigurePanel, VideoPanel, ReferencePanel
    },

    props: {
        post: {
            type: Object,
            required: true,
            default: () => { }
        }
    },

    data() {
        return {
            preview: true,
            activePanel: null
        }
    },

    mounted() {
        // this.$refs['editor'].focus()
    },

    methods: {

        togglePanel(panel) {
            if(this.activePanel === panel) {
                this.activePanel = null
            } else {
                this.activePanel = panel
            }
        },

        updateMarkdownContent(content) {
            this.markdown.content = content
        },

        async submitPost() {
            const formData = new FormData(this.$refs['createPostForm'])
            formData.append('content', this.markdown.content)
            await axios.post('/posts', formData)
            window.location.href = '/'
        },

        autoSave: debounce(function () {
            this.savePost(this.post)
        }, 1500),

        async savePost(post) {
            const res = await axios.put(`/api/posts/${post.slug}`, { ...post })
            alert(res.data.message)
        }
    }
}