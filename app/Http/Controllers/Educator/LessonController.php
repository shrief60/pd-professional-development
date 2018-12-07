<?php

namespace App\Http\Controllers\Educator;

use App\Unit;
use App\Lesson;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LessonController extends Controller
{

    public function index(Unit $unit)
    {
        $lessons = $unit->lessons;

        if (request()->ajax()) {
            return new LessonCollection($unit->lessons);
        }

        return view('educator.lessons.index', compact('lessons'));
    }

    public function show(Lesson $lesson)
    {

        $lesson->load('questions.answers');

        if (request()->ajax()) {
            return new LessonResource();
        }

        return view('educator.lessons.index', compact('lessons'));

    }

    public function create()
    {

        return view('educator.lessons.create');
    }

    public function store(LessonStoreRequest $request, Unit $unit)
    {

        $lesson = Lesson::make($request->only('title', 'objectives', 'description'));

        // TODO
        // Upload to Amazon
        $lesson->path = $request->file('lesson')->store('/lessons', 'public');

        $lesson = $unit->lessons()->save($lesson);

        if (request()->ajax()) {
            return new LessonResource($lesson);
        }

        return view('educator.lessons.index', compact('lessons'));

    }

    public function edit(Lesson $lesson)
    {
    }

    public function update(LessonUpdateRequest $request, Lesson $lesson)
    {
        $lesson->update($request->only('title', 'objectives', 'description'));

        if ($request->hasFile('lesson')) {
            $lesson->path = $request->file('lesson')->store('/lessons', 'public');
        }

        $lesson->save();

        if (request()->ajax()) {
            return new LessonResource($lesson);
        }

        return view('educator.lessons.index', compact('lessons'));
    }

    public function destroy(Lesson $lesson)
    {
        $destroyed = $lesson->destroy();

        if (request()->ajax()) {
            return $destroyed ? response()->json() : response()->json([], 500);
        }

        return redirect()->name('educator.lessons.index');
    }
}
