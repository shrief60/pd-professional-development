@extends('layouts.main')

@section('content')

    <div class="course">
        <h3> {{ $course->name }} </h3>

        @foreach ($course->units as $unit)
        <div class="box">
            {{ $unit->name }}
            <ul>
            @foreach ($unit->lessons as $lesson)
                <li>
                    <a href="{{ route('learner.lessons.show', $lesson)) }}">{{ $lesson->title }}</a>
                </li>
            @endforeach
            </ul>
        </div>

        @endforeach
    </div>
@endsection
