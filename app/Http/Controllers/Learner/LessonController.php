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

        return view('learner.lessons.index', compact('lessons'));
    }

    public function show(Unit $unit, Lesson $lesson)
    {
        $lesson->load('units.lessons');

        return view('learner.lessons.show', compact('lesson'));
    }

}
