<?php

namespace App\Http\Controllers;

use Parsedown;
use BePro\Post\PostRepository;
use BePro\Post\Post;
use BePro\Tag\Tag;

class PostController extends Controller
{
    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function create()
    {
        return view('post.create');
    }

    public function store()
    {
        $data = request()->all();
        $post = $this->postRepository->createPost($data);
        return redirect()->route('post-show', ['post' => $post->slug]);
    }

    public function getPost(Post $post)
    {
        $post->load('tags');
        return response()->json([
            'data' => $post
        ]);
    }

    public function ajaxStore()
    {
        $data = request()->all();
        $post = $this->postRepository->createPost($data);
        return response()->json([
            'message' => 'create post success.',
            'data' => $post
        ]);
    }

    public function attachTag(Post $post, Tag $tag)
    {
        $post->tags()->attach($tag);
        return response()->json(['data' => $tag]);
    }
    
    public function removeTag(Post $post, Tag $tag)
    {
        $post->tags()->detach($tag->id);
        return response()->json([
            'message' => '標籤移除成功。',
            'data' => null
        ]);
    }

    public function ajaxUpdate()
    {
        $data = request()->all();
        $post = $this->postRepository->updatePost($data);
        return response()->json([
            'message' => '文章更新成功。',
            'data' => $post
        ]);
    }

    public function show(Post $post)
    {
        $markdown = (new Parsedown)->setMarkupEscaped(true)->text($post->content);
        return view('post.show', compact('post', 'markdown'));
    }
}
