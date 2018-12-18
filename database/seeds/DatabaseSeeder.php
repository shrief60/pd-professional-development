<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CoursesTableSeeder::class,
            UnitsTableSeeder::class,
            LessonsTableSeeder::class,
            LessonPracticeSeeder::class
        ]);
    }
}
