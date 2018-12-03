<?php

namespace App\Http\Controllers\API;

use App\Unit;
use App\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UnitCollection;
use App\Http\Resources\Unit as UnitResource;

class UnitController extends Controller
{

    public function index(Course $course) {

        return new UnitCollection($course->units);
    }

    public function store(Request $request, Course $course) {

        $unit = $course->units()->create($request->only('name', 'description'));

        return new UnitResource($unit);
    }
}
