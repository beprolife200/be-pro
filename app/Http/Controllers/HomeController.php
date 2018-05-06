<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use BePro\Post\Post;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::where('user_id', auth()->user()->id)
            ->orderBy('created_at', 'desc')    
            ->paginate(15);
        return view('home')->with('posts', $posts);
    }
}
