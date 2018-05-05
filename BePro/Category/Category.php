<?php

namespace BePro\Category;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name', 'slug', 'description', 'cover_image','visibility'
    ];

    protected function serieses()
    {
        return $this->morphedByMany('BePro\Series\Series', 'categoryable');
    }
}
