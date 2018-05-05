
new Vue({
    
    el: '#app',
    
    name: 'PostCreate',

    data: {
        markdown: {
            content: ''
        }
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
        }
    }
})