<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Lesson;
use App\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Lesson $lesson)
    {

        $question = $lesson->questions()->create($request->only('type', 'body', 'grade', 'time'));

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

    /**
     * Display the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {

    }
}
