

import Post from '@classies/Post'
import ConfigurePanel from '@components/ConfigurePanel'
import PostEditorDesktop from '@components/PostEditorDesktop/PostEditorDesktop'
import PostEditorMobile from '@components/PostEditorMobile/PostEditorMobile'

new Vue({

    el: '#app',

    name: 'Home',

    components: {
        ConfigurePanel,
        PostEditorMobile,
        PostEditorDesktop
    },

    data: {
        device: 'desktop',
        newPost: null,
        activePost: null,
        editorBackgroundImage: 'https://s3-ap-northeast-1.amazonaws.com/bepro.images/white-paper.jpg'
    },

    created() {
        this.setEditorBackground(this.editorBackgroundImage)
        this.$eventHub.$on('close-editor', this.closeEditor)
    },

    mounted() {
        this.trackDevice()
    },

    methods: {

        trackDevice() {
            this.checkDevice()
            window.addEventListener('resize', () => {
                this.checkDevice()
            }, { passive: false })
        },

        checkDevice() {
            const isMobile = window.matchMedia("(max-width: 1000px)").matches
            const device = isMobile ? 'mobile' : 'desktop'
            this.device = device
        },

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