<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ChallengesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {

        $faker = Faker::create();

        App\Lesson::all()->each(function ($lesson) use ($faker) {

            $i = 0;

            for ($i; $i < 10; $i++) {

                $lessonId = $lesson->id;
                $type = $faker->randomElement(['mcq', 'text']);

                $question = $lesson->questions()->save(factory(App\Question::class)->make([
                    'lesson_id' => $lessonId,
                    'type' => $type,
                    'sort' => 'challenge'
                ]));

                if ($question->type !== 'mcq') {
                    return;
                }

                $answers = $question->answers()->saveMany(factory(App\Answer::class, 4)->make());

                $question->correct_answer_id = $answers->random()->id;

                $question->save();
            }

        });
    }
}
