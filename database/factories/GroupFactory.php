<?php

use Faker\Generator as Faker;

$factory->define(BePro\Group\Group::class, function (Faker $faker) {
    $name = $faker->word . ' ' . $faker->word;
    return [
        'name' => $name,
        'slug' => str_slug($name)
    ];
});
