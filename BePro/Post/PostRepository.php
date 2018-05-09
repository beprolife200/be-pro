<?php

namespace BePro\Post;

class PostRepository
{
    public function createPost(array $data)
    {
        if (!isset($data['slug'])) {
            $data['slug'] = str_slug($data['title']);
        }
        $post = Post::make($data);
        $post->user_id = auth()->user()->id;
        return $post;
    }

    public function updatePost($data)
    {
        $post = Post::find($data['id']);
        $post->update($data);
        return $post;
    }

    static public function postAttachTag(Post $post, $tag)
    {
        // 
    }
}
