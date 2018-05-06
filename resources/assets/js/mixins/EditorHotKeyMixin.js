
export default {
    methods: {
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