<?php

namespace BePro\Series;

use Illuminate\Database\Eloquent\Model;
use BePro\BePro\Category;
use BePro\BePro\Post;

class Series extends Model
{
    // public $timestamps = false;

    protected $fillable = [
        'name', 'slug', 'description', 'cover_image','visibility'
    ];

    public function categories()
    {
        return $this->morphToMany('BePro\Category\Category', 'categoryable');
    }

    public function posts()
    {
        return $this->hasMany(Post::calss);
    }
}
