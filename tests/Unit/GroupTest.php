<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class Group extends TestCase
{
    use RefreshDatabase;

    public function setUp()
    {
        parent::setUp();
        $this->group = factory('BePro\Group\Group')->create();
    }

    /** @test */
    public function group_may_have_many_users()
    {
        $users = factory('BePro\User\User', 10)->create()->pluck('id');
        $this->group->users()->attach($users);
        $this->assertTrue($this->group->users()->count() === 10);
    }

    /** @test */
    public function group_may_have_many_permissions()
    {
        $permissions = factory('BePro\Permission\Permission', 10)->create()->pluck('id');
        $this->group->permissions()->attach($permissions);
        $this->assertTrue($this->group->permissions()->count() === 10);
    }
}
