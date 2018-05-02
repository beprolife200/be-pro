<?php

namespace BePro\Group;

use BePro\Permission\Permission;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name', 'slug'
    ];

    public function users()
    {
        return $this->belongsToMany('BePro\User\User');
    }

    public function permissions()
    {
        return $this->morphToMany('BePro\Permission\Permission', 'permissionable');
    }

    public function hasPermission(Permission $permission)
    {
        return $this->permissions->contains($permission->id);
    }
}
