<?php

namespace BePro\Video;

use Illuminate\Database\Eloquent\Model;
use BePro\Post\Post;

class Video extends Model
{
    
    protected $fillable = [
        'name', 'slug', 'url', 'youtube_video_id'
    ];

    protected function posts()
    {
        return $this->morphedByMany(Post::class, 'videoable');
    }
}
