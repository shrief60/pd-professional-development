@extends('layouts.main')

@section('content')

<div class="courses">

    @foreach ($courses as $course)
        <div class="box">

            <h3>
                {{ $course->name }}
            </h3>
            <p> {{ $course->description }} </p>

            <p> {{ $course->units_count }} Units </p>
            <p> {{ $course->lessons_count }} Lessons </p>

            <a href="{{ route('learner.courses.show', $course) }}" class="btn hvr-sweep-to-left"> Show Course </a>
        </div>
    </div>
    @endforeach
</div>
@endsection
