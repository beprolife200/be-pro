<?php

namespace BePro\Post;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title', 'slug', 'content', 'password', 'status', 'visibility', 'published_at', 'modified_at'
    ];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('author', function ($builder) {
            $builder->with('author');
        });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function author()
    {
        return $this->belongsTo('BePro\User\User', 'user_id');
    }

    public function path()
    {
        return '/posts/' . $this->slug;
    }

    public function edit()
    {
        return '/posts/' . $this->slug . '/edit';
    }

    // public function setSlugAttribute($value)
    // {
    //     $slug = str_slug($value);
    //     if (static::whereSlug($slug)->exists()) {
    //         $slug = $this->incrementSlug($slug);
    //     }
    //     $this->attributes['slug'] = $slug;
    // }

    // public function incrementSlug($slug)
    // {
    //     $max = static::whereTitle($this->title)->latest('id')->value('slug');
    //     if (is_numeric($max[-1])) {
    //         return preg_replace_callback('/(\d+)$/', function ($matches) {
    //             return $matches[1] + 1;
    //         }, $max);
    //     }
    //     return "{$slug}-2";
    // }
}
