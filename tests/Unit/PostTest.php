<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use BePro\User\User;

class PostTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function post_may_belong_an_user()
    {
        $post = factory('BePro\Post\Post')->create();
        $user = User::find($post->user_id);
        $this->assertTrue($post->author->id === $user->id);
    }
}
