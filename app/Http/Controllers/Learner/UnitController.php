<?php

namespace App\Http\Controllers\Learner;

use App\Unit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UnitController extends Controller
{
    public function index(Course $course)
    {
        $units = $course->units;

        return view('learner.units.index', compact('units'));
    }

    public function show(Course $course, Unit $unit)
    {
        $unit->load('lessons');

        return view('learner.units.show', compact('unit'));
    }
}
