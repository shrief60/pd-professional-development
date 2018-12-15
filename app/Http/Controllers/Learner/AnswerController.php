<?php

namespace App\Http\Controllers\Learner;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Question;
use App\LearnerQuestion;

class AnswerController extends Controller
{
    public function store(Request $request, Question $question)
    {

        LearnerQuestion::create([
            'answer' => $request->answer,
            'learner_id' => auth()->id(),
            'points' => $question->type == 'mcq' ? $question->grade : 0,
            'question_id' => $question->id
        ]);

        return api([]);
    }
}
