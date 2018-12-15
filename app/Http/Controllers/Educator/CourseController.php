<?php

namespace App\Http\Controllers\Educator;

use App\Course;
use App\Http\Controllers\Controller;
use App\Http\Resources\CourseCollection;
use App\Http\Requests\CourseStoreRequest;
use App\Http\Requests\CourseUpdateRequest;
use App\Http\Resources\Course as CourseResource;

class CourseController extends Controller
{

    public function index()
    {

        $courses = Course::withCount(['units', 'lessons'])->get();

        if(request()->ajax()) {
            return api(compact('courses'));
        }

        return view('educator.courses.index', compact('courses'));
    }

    public function show(Course $course)
    {

        $course->load('units.lessons');

        if (request()->ajax()) {
            return api(compact('course'));
        }

        return view('educator.courses.show', compact('course'));

    }

    public function store(CourseStoreRequest $request)
    {

        $course = Course::make($request->only('name', 'description'));

        // TODO
        // The educatorID will be the logged in educator
        $course->educator_id = 1;

        if ($request->hasFile('image')) {
            $course->image = $request->file('image')->store('courses', 'public');
        }

        $course->save();

        $course->load('units.lessons');

        if (request()->ajax()) {
            return compact('course');
        }

        return view('educator.courses.show', compact('course'));
    }

    public function update(CourseUpdateRequest $request, Course $course)
    {

        if ($request->hasFile('image')) {
            $course->image = $request->file('image')->store('courses', 'public');
        }

        $course->name = $request->name;

        $course->description = $request->description;

        $course->save();

        $course->load('units.lessons');

        if (request()->ajax()) {
            return api(compact('course'));
        }

        return view('educator.courses.show', compact('course'));
    }

    public function destroy(Course $course) {

        $course->delete();

        if (request()->ajax()) {
            return api([], 402);
        }

        return redirect()->name('educator.courses.index');
    }
}
