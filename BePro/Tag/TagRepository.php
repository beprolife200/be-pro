<?php

namespace BePro\Tag;


class TagRepository
{
    public static function createTag($tagName)
    {
        $tag = Tag::create([
            'name' => $tagName,
            'slug' => str_slug($tagName)
        ]);
        return $tag;
    }
}
