<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use BePro\Series\Series;

class SeriesTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function series_can_belongs_to_category()
    {
        $category = factory('BePro\Category\Category')->create();
        $series = factory('BePro\Series\Series')->create();
        $series->categories()->save($category);
        $this->assertNotEmpty($series->categories);
    }

    /** @test */
    public function series_can_has_many_tags()
    {
        $series = factory('BePro\Series\Series')->create();
        $tags = factory('BePro\Tag\Tag', 3)->create();
        foreach ($tags as $tag) {
            $series->tags()->save($tag);
        }
        $this->assertCount(3, $series->tags);
    }

    /** @test */
    public function user_can_get_serieses_json()
    {
        $serieses = factory('BePro\Series\Series', 5)->create();
        $response = $this->json('GET', '/api/series');
        $response->assertStatus(200)
            ->assertJson([
                'data' => [],
            ]);
    }
}
