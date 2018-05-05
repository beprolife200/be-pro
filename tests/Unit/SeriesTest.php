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
}
