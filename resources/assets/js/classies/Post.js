
class Post {

    constructor() {
        this.title = 'Untitled'
        this.content = 'Post Content'
        this.status = 'draft'
        this.visibility = 'publish'
        this.creation = 'original'
        this.series_id = null
    }

}

export default function () {
    return new Post
}