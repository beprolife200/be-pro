<?php

namespace BePro\Post;

class PostRepository
{
    public function createPost(array $data)
    {
        $title = $data['title'];
        $post = new Post;
        $post->user_id = auth()->user()->id;
        $post->title = $title;
        $post->slug = str_slug($title);
        $post->content = $data['content'];
        $post->password = isset($data['password']) ? $data['password'] : null;
        $post->save();
        return $post;
    }
}
