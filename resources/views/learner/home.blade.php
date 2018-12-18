@extends('layouts.main')
@section('content')
<main class="main">
    <aside class="left shadow">
        <div class="header">
            <img src="{{ Auth::user()->avatar }}" />
            <div class="info">
                <p> {{ Auth::user()->name }} </p>
                <div class="grey">
                    <span class="square"></span>
                    <span> 5th Grade Sciences Teacher </span>
                </div>
                <div class="grey">
                    <span class="square"></span>
                    <span> Tali Za Middle School </span>
                </div>
            </div>
        </div>

        <div class="middle">
            <ul class="links">
                <li class="active">
                    <img src="{{ icon('dashboard', 'svg') }}" class="svg">
                    <a href="{{ url('/dashboard') }}"> dashboard </a>
                </li>
                <li>
                    <img src="{{ icon('learn', 'svg') }}" class="svg">
                    <a href="{{ url('/learn') }}"> learn </a>
                </li>
                <li>
                    <img src="{{ icon('classroom', 'svg') }}" class="svg">
                    <a href="{{ url('/classroom') }}"> apply in classroom </a>
                </li>
                <li>
                    <img src="{{ icon('community', 'svg') }}" class="svg">
                    <a href="{{ url('/community') }}"> community </a>
                </li>
                <li>
                    <img src="{{ icon('achievments', 'svg') }}" class="svg">
                    <a href="{{ url('/achievments') }}"> achievments </a>
                </li>
            </ul>
        </div>

        <div class="footer">
            <ul class="links">
                <li>
                    <img src="{{ icon('settings', 'svg') }}" class="svg">
                    <a href="{{ url('/settings') }}"> settings </a>
                </li>
                <li>
                    <img src="{{ icon('help', 'svg') }}" class="svg">
                    <a href="{{ url('/help') }}"> help </a>
                </li>
            </ul>
        </div>

    </aside>

    <section class="courses-section">
        <h2 class="title"> my courses </h2>
        <div class="courses">
            @foreach ($courses as $course)
                <div class="course shadow">
                    <div class="image shadow" style="background-image: url({{ $course->image }})"></div>
                    <hr />
                    <div class="body">
                        <h3 class="name">
                            {{ $course->name }}
                        </h3>
                        @if($loop->iteration % 2 == 1)
                        <a href="{{ route('learner.lessons.show', $course->lessons()->first()) }}" class="resume btn"> Resume Course </a>
                        @else
                        <a href="{{ route('learner.lessons.show', $course->lessons()->first()) }}" class="start btn"> Start Course </a>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <aside class="right shadow">
        <div class="header">
            currently working on
        </div>
        <div class="body">
            <span>module 1</span>
            <p>Why 21st Century Learning?</p>
        </div>
        <div class="footer">
            <div>
                <img src="{{ icon('checkbox-checked', 'svg') }}" class="svg">
                <span> SHARE </span>
            </div>
            <div>
                <img src="{{ icon('checkbox-unchecked', 'svg') }}" class="svg">
                <span> APPLY </span>
            </div>
            <div>
                <img src="{{ icon('checkbox-unchecked', 'svg') }}" class="svg">
                <span> SHARE </span>
            </div>
        </div>
    </aside>
</main>
@endsection
 @push('css') {!! css('learner/home') !!}
@endpush
