<template>
    <div class="post-tool">
        <div class="post-tool__bar">
            <span class="post-tool__bar__btn post-tool__bar__close-btn">
                <slot name="close-btn"></slot>
            </span>
            <div class="post-tool__bar__btns">
                <span class="post-tool__bar__btn post-tool__bar__btns__btn" @click="toggleConfigurePanel">
                    <i class="fas fa-cog"></i>
                </span>
                <span class="post-tool__bar__btn post-tool__bar__btns__btn" @click="$emit('toggle-preview')">
                    <i :class="['fas', onPreview ? 'fa-eye' : 'fa-eye-slash']"></i>
                </span>
            </div>
        </div>
        <div class="post-tool__panel" v-show="onConfigure">
            <post-configure :post="post"></post-configure>
        </div>
    </div>
</template>

<script>

import PostConfigure from '@components/PostConfigure'
export default {

    name: 'PostTool',

    components: {
        PostConfigure
    },

    props: {
        post: {
            type: Object,
            default: () => { }
        },

        onPreview: {
            type: Boolean,
            default: true
        }
    },

    data() {
        return {
            onConfigure: false
        }
    },

    methods: {
        toggleConfigurePanel() {
            this.onConfigure = !this.onConfigure
        }
    }
}
</script>

<style lang="scss">
@import "../../sass/variables";
.post-tool {
  width: 100%;
  position: relative;
  &__bar {
    display: flex;
    padding: 1rem 15px;
    align-items: center;
    justify-content: space-between;
    &__btn {
      cursor: pointer;
      &:hover {
        color: $primary;
      }
    }
    &__btns {
      flex: auto;
      text-align: right;
      & > * {
        &:not(:last-child) {
          margin-right: 0.5rem;
        }
      }
    }
  }
  &__panel {
    right: 0;
    top: 100%;
    width: 400px;
    padding: 1rem;
    position: absolute;
    border-radius: 2px;
    box-shadow: 0 0 60px -10px #777;
    background: rgba(255, 255, 255, 0.99);
  }
}
</style>