<?php

namespace App\Http\Controllers\API;

use App\Unit;
use App\Lesson;
use App\Http\Controllers\Controller;
use App\Http\Resources\LessonCollection;
use App\Http\Requests\LessonStoreRequest;
use App\Http\Resources\Lesson as LessonResource;

class LessonController extends Controller
{

    public function index(Unit $unit)
    {
        return LessonCollection($unit->lessons);
    }

    public function show(Lessons $lesson)
    {
        return LessonResource($unit);
    }

    public function store(LessonStoreRequest $request, Unit $unit)
    {

        $lesson = Lesson::make($request->only('title', 'objectives', 'description'));

        $lesson->path = $request->file('lesson')->store('/lessons', 'public');

        $lesson = $unit->lessons()->save($lesson);

        return new LessonResource($lesson);
    }

    public function update(LessonUpdateRequest $request, Lesson $lesson)
    {
        $lesson->update($request->only('title', 'objectives', 'description'));

        if ($request->hasFile('lesson')) {
            $lesson->path = $request->file('lesson')->store('/lessons', 'public');
        }

        $lesson->save();

        return new LessonResource($lesson);
    }

    public function destroy(Lesson $lesson)
    {
        $destroyed = $lesson->destroy();

        return $destroyed ? response()->json() : response()->json([], 500);
    }
}
