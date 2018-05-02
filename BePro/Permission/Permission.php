<?php

namespace BePro\Permission;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name', 'slug'
    ];

    protected function users()
    {
        return $this->morphedByMany('BePro\User\User', 'permissionable');
    }

    protected function groups()
    {
        return $this->morphedByMany('BePro\User\User', 'permissionable');
    }
}
