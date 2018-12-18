<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker::create();

        App\Lesson::whereType('video')->each(function ($lesson) use ($faker) {

            $i = 0;

            for ($i; $i < 3; $i++) {

                $lessonId = $lesson->id;
                $lessonTime = $faker->numberBetween(11, 74);
                $type = 'mcq';
                $lessonBackwardTime = $type === 'mcq' ? $lessonTime - 10 : null;
                $question = $lesson->questions()->save(factory(App\Question::class)->make([
                    'type' => $type,
                    'lesson_time' => $lessonTime,
                    'lesson_backward_time' => $lessonBackwardTime,
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
