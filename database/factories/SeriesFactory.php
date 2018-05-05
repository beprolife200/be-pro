<?php

// $series = factory('BePro\Series\Series')->create();

use Faker\Generator as Faker;

$factory->define(BePro\Series\Series::class, function (Faker $faker) {
    $title =  $faker->sentence;

    return [
        'name' => $title,
        'slug' => str_slug($title),
        'description' => $faker->paragraph,
        'visibility' => 'publish'
    ];
});
