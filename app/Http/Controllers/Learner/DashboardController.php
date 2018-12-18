<?php

namespace App\Http\Controllers\Learner;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Course;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $courses = Course::with('lessons')->get();

        return view('learner.home', compact('courses'));
    }
}
