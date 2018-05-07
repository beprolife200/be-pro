<?php

namespace BePro\Post;

class PostRepository
{
    public function createPost(array $data)
    {
        $data['user_id'] = auth()->user()->id;
        if (!isset($data['slug'])) {
            $data['slug'] = str_slug($data['title']);
        }
        $post = Post::create($data);
        return $post;
    }

    public function updatePost($data)
    {
        $post = Post::find($data['id']);
        $post->update($data);
        return $post;
    }
}
