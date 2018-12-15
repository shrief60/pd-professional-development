<?php

use Faker\Generator as Faker;

$factory->define(App\Question::class, function (Faker $faker) {

    return [
        'body' => $faker->sentence(4),
        'grade' => $faker->numberBetween(5, 20),
    ];
});
