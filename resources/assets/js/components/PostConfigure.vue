<template>
    <div class="post-configure">
        <div class="post-configure__group">
            <div class="form-group">
                <label for="postTitle">標題</label>
                <input v-model="post.title" type="text" name="title" id="postTitle">
            </div>
            <div class="form-group">
                <label for="postImage">封面</label>
                <input v-model="post.cover_image" type="text" name="cover_image" id="postImage" placeholder="圖片 URL" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="postDescription">說明</label>
                <textarea v-model="post.description" name="description" id="postDescription" style="width:100%;" rows="5"></textarea>
            </div>
        </div>
        <hr>
        <div class="post-configure__group">
            <div class="form-group">
                <label for="postCreation">創作類型</label>
                <label for="postCreationOriginal">
                    <input v-model="post.creation" type="radio" id="postCreationOriginal" name="creation" value="original">
                    <span>原創</span>
                </label>
                <label for="postCreationTranslation">
                    <input v-model="post.creation" type="radio" id="postCreationTranslation" name="creation" value="translation">
                    <span>翻譯</span>
                </label>
            </div>
            <div class="form-group">
                <label for="postVisibility">能見度</label>
                <label for="postVisibilityPublish">
                    <input v-model="post.visibility" type="radio" id="postVisibilityPublish" name="visibility" value="publish">
                    <span>公開</span>
                </label>
                <label for="postVisibilityPrivate">
                    <input v-model="post.visibility" type="radio" id="postVisibilityPrivate" name="visibility" value="private">
                    <span>僅會員</span>
                </label>
                <label for="postVisibilityPasswordProtected">
                    <input v-model="post.visibility" type="radio" id="postVisibilityPasswordProtected" name="visibility" value="password_protected">
                    <span>密碼保護</span>
                </label>
            </div>
            <div class="form-group" v-show="isProtectedPost">
                <label for="postPassword">密碼</label>
                <input v-model="post.password" type="password" name="password" id="postPassword" placeholder="密碼">
            </div>
            <div class="form-group">
                <label for="postStatus">狀態</label>
                <label for="postStatusDraft">
                    <input v-model="post.status" type="radio" id="postStatusDraft" name="status" value="draft">
                    <span>草稿</span>
                </label>
                <label for="postStatusPublish">
                    <input v-model="post.status" type="radio" id="postStatusPublish" name="status" value="publish">
                    <span>開放</span>
                </label>
                <label for="postStatusPrivate">
                    <input v-model="post.status" type="radio" id="postStatusPrivate" name="status" value="private">
                    <span>私有</span>
                </label>
                <label for="postStatusTrash">
                    <input v-model="post.status" type="radio" id="postStatusTrash" name="status" value="trash">
                    <span>垃圾桶</span>
                </label>
            </div>
            <div class="form-group">
                <label for="postSlug">網址</label>
                <input v-model="post.slug" type="text" name="slug" id="postSlug" placeholder="slug">
            </div>
            <div class="form-group">
                <label for="postSeries">單元</label>
                <select v-model="post.series_id" id="postSeries">
                    <option :value="null">無所屬單元</option>
                    <option v-for="series in serieses" :key="series.id" :value="series.id" v-text="series.name"></option>
                </select>
            </div>
        </div>
        <div class="post-configure__group" v-if="objective === 'update'">
            <hr>
            <div class="form-group">
                <label for="postTag">標籤</label>
                <input type="text" name="tag" id="postTag">
            </div>
        </div>
        <hr>
        <div class="post-configure__group text-center">
            <button @click="objective === 'update' ? save() : store()">儲存</button>
        </div>
    </div>
</template>
<style lang="scss">
.post-configure {
  &__group {
    margin-bottom: 0.5rem;
  }
  .form-group {
    label:first-child {
      width: 60px;
      display: inline-block;
    }
  }
}
</style>
<script>

import { trigger } from '@js/utils'
export default {

    name: 'PostConfigure',

    props: {
        post: {
            type: Object,
            default: () => { }
        },

        // objective only can be create or update
        objective: {
            type: String,
            default: 'update'
        }
    },

    data() {
        return {
            serieses: []
        }
    },

    computed: {
        isProtectedPost() {
            return this.post.visibility === 'password_protected'
        }
    },

    created() {
        this.getSerieses()
    },

    methods: {
        getSerieses() {
            axios.get('/api/series')
                .then(res => this.serieses = res.data.data)
        },

        save() {
            trigger('save-post', this.post)
        },

        store() {
            trigger('store-post', this.post)
        }
    }
}
</script>
