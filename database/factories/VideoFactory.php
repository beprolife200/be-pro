<?php

// $video = factory('BePro\Video\Video')->create();

use Faker\Generator as Faker;

$factory->define(BePro\Video\Video::class, function (Faker $faker) {
    $title =  $faker->sentence;
    return [
        'name' => $title ,
        'slug' => str_slug($title),
        'youtube_video_id' => 'T4SimnaiktU'
    ];
});
