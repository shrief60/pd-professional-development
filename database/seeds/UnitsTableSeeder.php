<?php

use Illuminate\Database\Seeder;
use App\Unit;

class UnitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        App\Course::all()->each(function($course) {
            $course->units()->saveMany(factory(Unit::class, 8)->make());
        });
    }
}
