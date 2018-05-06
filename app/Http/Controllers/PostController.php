<?php

namespace App\Http\Controllers;

use Parsedown;
use BePro\Post\PostRepository;
use BePro\Post\Post;

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
    
    public function ajaxStore()
    {
        $data = request()->all();
        $post = $this->postRepository->createPost($data); 
        return response()->json(['message' => 'create post success.']);
    }

    public function show(Post $post)
    {
        $markdown = (new Parsedown)->setMarkupEscaped(true)->text($post->content);
        return view('post.show', compact('post', 'markdown'));
    }

    public function getPost(Post $post)
    {
        return response()->json(['data' => $post]);
    }
}
