<?php

namespace App\Http\Controllers\API;

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

        return new CourseCollection($courses);
    }

    public function show(Course $course)
    {

        $course->load('units.lessons');

        return new CourseResource($course);

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

        return new CourseResource($course);
    }

    public function update(CourseUpdateRequest $request, Course $course)
    {



        if ($request->hasFile('image')) {
            $course->image = $request->file('image')->store('courses', 'public');
        }

        $course->name = $request->name;

        $course->description = $request->description;

        $course->save();

        return new CourseResource($course);
    }

    public function destroy(Course $course) {

        $destroyed = $course->destroy();

        return $destroyed ? response()->json() : response()->json([], 500);
    }
}
