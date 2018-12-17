<?php

use Illuminate\Database\Seeder;

class LessonPracticeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Lesson::whereType('practice')->get()->each(function($lesson) {

            $lesson->questions()->saveMany(factory(App\Question::class, 10)->make());

            $lesson->questions()->each(function ($question) {

                $question->answers()->saveMany(factory(App\Answer::class, 4)->make());

                $answer = $question->answers()->inRandomOrder()->first();

                $question->correct_answer_id = $answer->id;

                $question->save();
            });

        });

    }
}
