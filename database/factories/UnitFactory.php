<?php

use Faker\Generator as Faker;

$factory->define(App\Unit::class, function (Faker $faker) {

    $courseID = App\Course::first()->id;
    $name = $faker->sentence($nbWords = 3);
    return [
        'name' => $name,
        'slug' => str_slug($name),
        'description' => $faker->realText,
        'course_id' => $courseID
    ];
});
