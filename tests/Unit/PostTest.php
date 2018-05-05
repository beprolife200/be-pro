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

    /** @test */
    public function post_can_has_many_videos()
    {
        $post = factory('BePro\Post\Post')->create();
        $videos = factory('BePro\Video\Video', 2)->create();
        foreach ($videos as $video) {
            $post->videos()->save($video);
        }
        $this->assertCount(2, $post->videos);
    }

    /** @test */
    public function post_may_belongs_to_a_series()
    {
        $series = factory('BePro\Series\Series')->create();
        $post = factory('BePro\Post\Post')->create([
            'series_id' => $series->id
        ]);
        $this->assertNotEmpty($post->series);
    }
}
