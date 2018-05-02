<?php

use Faker\Generator as Faker;

$factory->define(BePro\Permission\Permission::class, function (Faker $faker) {
    $name = $faker->word;
    return [
        'name' => $name,
        'slug' => str_slug($name)
    ];
});
