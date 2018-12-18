<?php

use Illuminate\Database\Seeder;
use App\Lesson;

class LessonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Unit::all()->each(function($unit) {

            for($order = 1; $order <= 10 ; $order++) {
                factory(Lesson::class)->create([
                    'unit_id' => $unit->id,
                    'order' => $order
                ]);
            }
        });
    }
}
