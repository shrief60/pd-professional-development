<?php

namespace App\Http\Controllers\Learner;

use App\Lesson;
use App\Unit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LessonController extends Controller
{

    public function index(Unit $unit)
    {
        $lessons = $unit->lessons;

        if (request()->ajax()) {
            return api(compact('lessons'));
        }

        return view('learner.lessons.index', compact('lessons'));
    }

    public function show(Unit $unit, Lesson $lesson)
    {

        $lesson->load('unit', 'course.units.lessons', 'questions.answers');
        $questions = $lesson->questions->where('sort', 'question');
        $challenges = $lesson->questions->where('sort', 'challenge');
        $data = compact('lesson', 'questions', 'challenges');
        if (request()->ajax()) {
            return api($data);
        }

        return view('learner.lessons.show', $data);
    }

}
