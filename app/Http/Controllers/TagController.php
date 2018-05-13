<?php

namespace App\Http\Controllers;

use BePro\Tag\Tag;
use BePro\Tag\TagRepository;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::all();
        return response()->json(['data' => $tags]);
    }

    public function store()
    {
        $tag = TagRepository::createTag(request()->tag['name']);
        return response()->json(['data' => $tag]);
    }
}
