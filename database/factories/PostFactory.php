<?php

use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(BePro\Post\Post::class, function (Faker $faker) {
    $title =  $faker->sentence;

    return [
        'user_id' => factory('BePro\User\User')->create()->id,
        'title' => $title,
        'slug' => str_slug($title),
        'content' => $faker->paragraph,
        'password' => null,
        'status' => 'publish',
        'visibility' => 'publish',
        'published_at' => Carbon::now()->format('Y-m-d H:i:s')
    ];
});
