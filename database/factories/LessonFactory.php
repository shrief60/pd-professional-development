<?php

use Faker\Generator as Faker;

$factory->define(App\Lesson::class, function (Faker $faker) {

    $path = $poster = $description = $objectives = $duration = null;

    $title = $faker->sentence($nbWords = 3);
    $unit = App\Unit::inRandomOrder()->first();
    $unitID = $unit->id;
    $lessonOrder = $unit->lessonsOrder();
    $type = $faker->randomElement(array('video', 'reading', 'practice'));

    if($type == 'video') {
        $path = "lessons/videos/1.mp4";
        $poster = "lessons/posters/1.jpg";
    } elseif($type == 'reading') {
        $path = "lessons/files/1.pdf";
    }

    if($type != 'practice') {
        $description = $faker->realText;
        $objectives = $faker->realText;
    }

    return [
        'unit_id' => $unitID,
        'title' => $title,
        'slug' => str_slug($title),
        'description' => $description,
        'objectives' => $objectives,
        'path' => $path,
        'poster' => $poster,
        'order' => $lessonOrder
    ];
});

