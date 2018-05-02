<template>
<div class="flash-alert alert alert-success" v-show="show" role="alert">
    {{ message }}
</div>
</template>
<style lang="sass">
.flash-alert
    right: 1rem
    bottom: 2rem
    position: fixed
</style>

<script>
export default {

    name: 'Flash',

    props: ['message'],

    data() {
        return {
            show: false
        }
    },

    mounted() {
        console.log('Component mounted.')
    },

    methods: {
        hide(ms = 3000) {
            window.setTimeout(() => {
                this.show = false
            }, ms)
        }
    }
}
</script>
