<?php

use Faker\Generator as Faker;

$factory->define(App\Unit::class, function (Faker $faker) {

    $name = $faker->sentence($nbWords = 3);
    return [
        'name' => $name,
        'slug' => str_slug($name),
        'description' => $faker->realText,
    ];
});
