<?php

namespace App\Http\Controllers\API;

use App\Unit;
use App\Course;
use App\Http\Controllers\Controller;
use App\Http\Resources\UnitCollection;
use App\Http\Requests\UnitStoreRequest;
use App\Http\Requests\UnitUpdateRequest;
use App\Http\Resources\Unit as UnitResource;

class UnitController extends Controller
{

    public function index(Course $course)
    {
        return new UnitCollection($course->units);
    }

    public function show(Unit $unit) {

        $unit->load('lessons');

        return new UnitResource($unit);
    }

    public function store(UnitStoreRequest $request, Course $course)
    {

        $unit = $course->units()->create($request->only('name', 'description'));

        return new UnitResource($unit);
    }

    public function update(UnitUpdateRequest $request, Unit $unit)
    {

        $unit->update($request->only('name', 'description'));

        return new UnitResource($unit);
    }

    public function destroy(Unit $unit)
    {
        $destroyed = $unit->destroy();

        return $destroyed ? response()->json() : response()->json([], 500);
    }
}
