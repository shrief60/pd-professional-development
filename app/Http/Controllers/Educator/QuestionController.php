<?php

namespace App\Http\Controllers\Educator;

use App\Http\Controllers\Controller;
use App\Lesson;
use App\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index()
    {

    }

    public function create()
    {

    }

    public function store(Request $request, Lesson $lesson)
    {

        $question = $lesson->questions()->create($request->only('type', 'body', 'grade'));

        if ($request->has('answers')) {

            $answers = json_decode($request->answers);

            $answers = collect($answers)->map(function ($answer) {
                return [
                    'body' => $answer,
                ];
            });

            $answers = $question->answers()->createMany($answers->toArray());

            $answer = $answers->where('body', $request->correct_answer)->first();

            $question->update([
                'correct_answer_id' => $answer->id
            ]);

        }
        return ($request->all());
    }

    public function show(Question $question)
    {

    }

    public function edit(Question $question)
    {
    }

    public function update(Request $request, Question $question)
    {
    }

    public function destroy(Question $question)
    {

    }
}
