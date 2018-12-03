<?php

namespace App\Http\Controllers\API;

use App\Course;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CourseCollection;
use App\Http\Requests\CourseStoreRequest;
use Illuminate\Support\Facades\Validator;

class CourseController extends Controller
{

    public function index() {

        $courses = Course::all();

        return new CourseCollection(Course::all());

        return api(compact($courses));
    }



    public function show(Course $course) {

        $course->load('educator', 'units');

        return response()->json(compact('course'));
    }


    public function store(CourseStoreRequest $request) {

        $course = Course::create($request->all());

        return response()->json($course);
    }

    public function edit(CourseUpdateRequest $request, Course $course) {

    }
}
