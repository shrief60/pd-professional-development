<?php

use Faker\Generator as Faker;

$factory->define(App\Answer::class, function (Faker $faker) {

    return [
        'body' => $faker->sentence(3)
    ];
});
