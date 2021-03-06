<?php

namespace App\Http\Controllers\Learner;

use App\Course;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CourseController extends Controller

{
    public function index()
    {
        $courses = Course::withCount(['units', 'lessons'])->get();

        return view('learner.courses.index', compact('courses'));
    }

    public function show(Course $course)
    {
        $course->load('units.lessons');

        return view('learner.courses.show', compact('course'));
    }

}
