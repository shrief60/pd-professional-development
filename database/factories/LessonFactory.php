<?php

use Faker\Generator as Faker;

$factory->define(App\Lesson::class, function (Faker $faker) {

    $title = $faker->sentence($nbWords = 3);
    $unitID = App\Unit::inRandomOrder()->first()->id;
    $number = $faker->numberBetween(1, 10);
    $path = "lessons/videos/$number.mp4";
    $poster = "lessons/posters/$number.jpg";
    return [
        'unit_id' => $unitID,
        'title' => $title,
        'slug' => str_slug($title),
        'description' => $faker->realText,
        'objectives' => $faker->realText,
        'path' => $path,
        'poster' => $poster
    ];
});
