<?php

use Illuminate\Database\Seeder;
use App\Course;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $courses = array(
            '21st Century Learning',
            'Computational Thinking'
        );

        foreach ($courses as $course) {
            factory(Course::class)->create([
                'name' => $course,
                'slug' => str_slug($course),
                'image' => '/courses/' . str_slug($course) . '.jpg'
            ]);
        }
    }
}
