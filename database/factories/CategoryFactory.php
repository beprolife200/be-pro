<?php

// $category = factory('BePro\Category\Category')->create();

use Faker\Generator as Faker;

$factory->define(BePro\Category\Category::class, function (Faker $faker) {
    $title =  $faker->sentence;
    return [
        'name' => $title,
        'slug' => str_slug($title),
        'description' => $faker->paragraph,
        'visibility' => 'publish'
    ];
});
