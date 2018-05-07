<template>
    <div class="alert-panel">
        <transition-group move-class="flip-move" enter-active-class="animated fadeInRight" leave-active-class="animated fadeOutRight" tag="div">
            <div 
                v-for="(alert, index) in alerts"
                v-show="alert.show"
                :key="index" :class="['alert', 'alert-dismissible', `alert-${alert.level}`]"
                role="alert"
            >
                <p class="m-0">{{ alert.message }}</p>
                <button type="button" class="close" @click.prevent="removeAlert(alert)">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </transition-group>
    </div>
</template>
<style lang="sass">
$animation-speed: .4s;
.alert-panel
    .fadeInRight
        animation-name: fadeInRight
        animation-duration: $animation-speed
    .fadeOutRight
        animation-name: fadeOutRight
        animation-duration: $animation-speed
    .flip-move
        transition: transform $animation-speed ease
</style>
<script>
export default {
    name: 'AlertPanel',
    data() {
        return {
            alerts: []
        }
    },
    mounted() {
        this.$eventHub.$on('alert', alert => this.pushAlert(alert))
    },
    methods: {

        removeAlert(alert) {
            alert.show = false
        },

        pushAlert(alert) {
            const id = new Date()
            alert.id = id
            alert.show = true
            this.alerts.push(alert)
            window.setTimeout(() => {
                const art = this.alerts.find(alert => alert.id === id)
                if (art) {
                    art.show = false
                }
            }, alert.ms)
        }
    }
}

</script>