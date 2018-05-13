<?php

namespace BePro\Tag;

class TagRepository
{
    public static function createTag($tagName)
    {
        $tag = Tag::firstOrCreate([
            'name' => $tagName
        ], [
            'name' => $tagName,
            'slug' => str_slug($tagName)
        ]);
        
        return $tag;
    }
}
