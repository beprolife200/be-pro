<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

use BePro\User\User;
use BePro\Group\Group;
use BePro\Permission\Permission;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_belongs_to_many_groups()
    {
        $user = factory(User::class)->create();
        $groups = factory('BePro\Group\Group', 5)->create()->toArray();
        $group1Id = $groups[0]['id'];
        $group2Id = $groups[2]['id'];
        $group3Id = $groups[4]['id'];
        $user->groups()->attach([$group1Id, $group2Id, $group3Id]);
        $this->assertTrue($user->groups()->count() === 3);
    }

    /** @test */
    public function user_may_have_some_prmissions()
    {
        $user = factory('BePro\User\User')->create();
        $permissions = factory('BePro\Permission\Permission', 10)->create()->pluck('id');
        $user->permissions()->attach($permissions);
        $this->assertTrue($user->permissions()->count() === 10);
    }

    /** @test */
    public function user_may_not_get_permission_before_join_group()
    {
        $user = factory('BePro\User\User')->create();
        $permission = factory('BePro\Permission\Permission')->create();
        $group = factory('BePro\Group\Group')->create();
        $this->assertFalse($user->hasPermission($permission));
    }

    /** @test */
    public function user_may_get_permission_after_join_group()
    {
        $user = factory('BePro\User\User')->create();
        $permission = factory('BePro\Permission\Permission')->create();
        $group = factory('BePro\Group\Group')->create();
        $group->permissions()->attach($permission->id);
        $user->groups()->attach($group->id);
        $this->assertTrue($user->hasPermission($permission));
    }

    /** @test */
    public function user_can_create_post()
    {
        $user = factory('BePro\User\User')->create();
        $post = factory('BePro\Post\Post')->create([
            'user_id' => $user->id
        ]);
        $this->assertTrue(
            $user->posts->first()->id === $post->author->id
        );
    }
}
