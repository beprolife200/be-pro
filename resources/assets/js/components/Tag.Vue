
<template>
  <span class="tag">
    <i class="fa fa-times pointer" @click="$emit('remove', tag)"></i>
    <span>{{ tag.name }}</span>
  </span>
</template>

<style lang="scss" scope>
@import "../../sass/variables";
.tag {
  z-index: +1;
  margin-top: 0.5rem;
  border-radius: 4px;
  display: inline-block;
  padding: 0.15rem 0.45rem;
  color: lighten($primary, 15%);
  border: 1px solid lighten($primary, 15%);
  &:not(:last-child) {
    margin-right: 0.25rem;
  }
}
</style>
<script>
export default {
    name: 'Tag',
    props: ['tag']
}
</script>
