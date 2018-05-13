

<script>
import PostEditorMixin from '@mixins/PostEditorMixin'
export default {
    
    name: 'PostEditorMobile',

    mixins: [
        PostEditorMixin
    ],

    data() {
        return {
            preview: false
        }
    }
}
</script>
<template src="./PostEditorMobile.html" />
<style lang="scss" src="./PostEditorMobile.scss" />
