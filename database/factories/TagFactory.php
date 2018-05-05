<?php

// $tag = factory('BePro\Tag\Tag')->create();

use Faker\Generator as Faker;

$factory->define(BePro\Tag\Tag::class, function (Faker $faker) {
    $title =  $faker->sentence;
    return [
        'name' => $title ,
        'slug' => str_slug($title),
    ];
});
