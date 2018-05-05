<template>
    <div 
        @keydown.stop.meta.66="boldText"
        @keydown.stop.meta.68="delText"
        @keydown.stop.meta.77="markText"
        ref="paper"
        class="paper"
        contenteditable="true"
        @keyup="update"
    ></div>
</template>

<script>

let paper

export default {
    name: 'Paper',

    props: {
        value: {
            type: String,
            default: ''
        }
    },

    mounted() {
        paper = this.$refs['paper']
        paper.innerText = this.value
    },

    methods: {
        update() {
            this.$emit('input', paper.innerText)
        },
        boldText() {
            this.decorateText('*')
        },
        delText() {
            this.decorateText('~~')
        },
        markText() {
            this.decorateText('`')
        },
        decorateText(symbol) {
            const select = document.getSelection()
            const str = select.toString()
            const replaceText = symbol + str + symbol
            const range = select.getRangeAt(0)
            range.deleteContents()
            range.insertNode(document.createTextNode(replaceText))
        }
    }
}
</script>

<style lang="sass">
.paper
    width: 100%
    color: #333
    height: 25rem
    font-size: 16px
    line-height: 1.5
    position: relative
    outline: none
    padding: 1rem
    box-shadow: 0 2px 30px -10px #777
    background-color: #fff
</style>