<?php

namespace BePro\Tag;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public $timestamps = false;

    protected $fillable = ['name', 'slug'];

    public function posts()
    {
        $this->morphedByMany('BePro\Post\Post', 'tagable');
    }

    public function serieses()
    {
        $this->morphedByMany('BePro\Series\Series', 'tagable');
    }
}
