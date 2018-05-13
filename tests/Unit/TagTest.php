<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TagTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function api_can_get_all_tags()
    {
        $tags = factory('BePro\Tag\Tag', 5)->create();
        $this->json('get', '/api/tags')
            ->assertStatus(200);
    }

    /** @test */
    public function api_can_create_tag()
    {
        $tagName = 'Testing Tag Name';
        $expectSlug = str_slug($tagName);
        $this->json('POST', '/api/tags', ['tag' => ['name' => $tagName]])
            ->assertStatus(200)
            ->assertJson([
                'data' => [
                    'name' => $tagName,
                    'slug' => $expectSlug
                ]
            ]);
    }
}
