<template>
    <div class="post-tool">
        <div class="post-tool__bar">
            <span class="post-tool__bar__btn" @click="$eventHub.$emit('close-editor')">
                <i class="fa fa-list"></i>
            </span>
            <span class="post-tool__bar__btn" @click="$emit('toggle-preview')">
                <i :class="['fas', onPreview ? 'fa-eye' : 'fa-eye-slash']"></i>
            </span>
            <!-- <span :class="['post-tool__bar__btn', {active: activePanel === 'youtube-panel'}]" @click="togglePanel('youtube-panel')">
                <i class="fab fa-youtube"></i>
            </span>
            <span :class="['post-tool__bar__btn', {active: activePanel === 'link-panel'}]" @click="togglePanel('link-panel')">
                <i class="fas fa-link"></i>
            </span> -->
            <span :class="['post-tool__bar__btn', {active: activePanel === 'tag-panel'}]" @click="togglePanel('tag-panel')">
                <i class="fas fa-tag"></i>
            </span>
            <span :class="['post-tool__bar__btn', {active: activePanel === 'configure-panel'}]" @click="togglePanel('configure-panel')">
                <i class="fas fa-cog"></i>
            </span>
        </div>
    </div>
</template>

<script>


export default {

    name: 'PostToolBar',

    props: {
        post: {
            type: Object,
            default: () => { }
        },

        onPreview: {
            type: Boolean,
            default: true
        },

        activePanel: {
            type: String,
            default: ''
        }
    },

    methods: {

        togglePanel(panel) {
            this.$emit('toggle-panel', panel)
        }
    }
}
</script>

<style lang="scss">
@import "../../sass/variables";
@import "../../sass/mixins";
.post-tool {
  width: 100%;
  &__bar {
    display: flex;
    align-items: center;
    justify-content: flex-end;
    &__btn {
      width: 18px;
      cursor: pointer;
      font-size: 16px;
      text-align: center;
      display: inline-block;
      &.active {
        color: $primary;
      }
      &:not(:last-child) {
        margin-right: 0.75rem;
      }
    }
  }
}

@include media("md") {
  .post-tool {
    height: 100%;
    min-height: 50px;
    border-top: 1px solid $primary;
    &__bar {
      height: 100%;
      min-height: inherit;
      justify-content: space-around;
      &__btn {
        width: 100%;
        height: 100%;
        min-height: inherit;
        align-items: center;
        display: inline-flex;
        justify-content: center;
        margin-right: 0 !important;
      }
    }
  }
}
</style>