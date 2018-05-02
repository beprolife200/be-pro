<?php

namespace BePro\User;

use BePro\Permission\Permission;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function groups()
    {
        return $this->belongsToMany('BePro\Group\Group');
    }

    public function permissions()
    {
        return $this->morphToMany('BePro\Permission\Permission', 'permissionable');
    }

    public function posts()
    {
        return $this->hasMany('BePro\Post\Post');
    }

    public function hasPermission(Permission $permission)
    {
        $hasPermssion = false;

        $ownGroups = $this->groups;

        foreach ($ownGroups as $group) {
            $hasPermssion = $group->hasPermission($permission);
            if ($hasPermssion) {
                break;
            }
        }

        if (!$hasPermssion) {
            $hasPermssion = $this->permissions->contains($permission->id);
        }
        return $hasPermssion;
    }
}
