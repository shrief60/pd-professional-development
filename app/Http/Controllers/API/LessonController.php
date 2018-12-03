<?php

namespace App\Http\Controllers\API;

use App\Unit;
use App\Lesson;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Lesson as LessonResource;

class LessonController extends Controller
{

    public function store(Request $request, Unit $unit) {

        $lesson = Lesson::make($request->only('title', 'objectives', 'description'));

        $lesson->path = $request->file('lesson')->store('/lessons', 'public');

        $lesson = $unit->lesson()->save($lesson);

        return new LessonResource($lesson);
    }
}
