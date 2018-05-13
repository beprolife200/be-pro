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

    /** @test */
    public function post_can_has_many_tags()
    {
        $post = factory('BePro\Post\Post')->create();
        $tags = factory('BePro\Tag\Tag', 3)->create();
        foreach ($tags as $tag) {
            $post->tags()->save($tag);
        }
        $this->assertCount(3, $post->tags);
    }

    /** @test */
    public function post_can_be_update()
    {
        $post = factory('BePro\Post\Post')->create();
        $testTitle = 'testing_title';
        $coverImageUrl = 'https://this/is/test/url.png';
        $data = [
            'id' => $post->id,
            'title' => $testTitle,
            'cover_image' => $coverImageUrl
        ];
        $response = $this->json('PUT', '/api/posts/' . $post->slug, $data);
        $response->assertStatus(200)
            ->assertJson([
                'data' => [
                    'id' => $post->id,
                    'title' => $testTitle,
                    'cover_image' => $coverImageUrl
                ]
            ]);
    }

    /** @test */
    public function post_can_attach_tag()
    {
        $post = factory('BePro\Post\Post')->create();
        $tag = factory('BePro\Tag\Tag')->create();
        $this->json('POST', "/api/posts/{$post->slug}/tags/{$tag->id}")
                ->assertStatus(200);
    }
}
