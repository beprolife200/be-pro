

import Post from '@classies/Post'
import PostEditor from '@components/PostEditor'
import PostConfigure from '@components/PostConfigure'

new Vue({

    el: '#app',

    name: 'Home',

    components: {
        PostEditor, PostConfigure
    },

    data: {
        newPost: null,
        activePost: null,
        editorBackgroundImage: 'https://s3-ap-northeast-1.amazonaws.com/bepro.images/white-paper.jpg'
    },

    created() {
        this.setEditorBackground(this.editorBackgroundImage)
    },

    methods: {
        setEditorBackground(imageURL) {
            const request = new Request(imageURL)
            const options = {
                method: 'GET',
                mode: 'cors',
                cache: 'default',
                headers: {
                    'Access-Control-Allow-Origin': '*'
                }
            }
            fetch(request, options)
                .then(response => response.blob())
                .then(blob => {
                    const elem = this.$refs['PostEditorContainer']
                    const imageURL = URL.createObjectURL(blob)
                    elem.style.backgroundImage = `url('${imageURL}')`
                })
        },

        closeEditor() {
            this.activePost = null
        },

        async setActivePost(postSlug) {
            const res = await axios.get('/api/posts/' + postSlug)
            this.activePost = res.data.data
        },

        createPost() {
            this.newPost = new Post
        },

        cancelNewPost() {
            this.newPost = null
        }
    }
})