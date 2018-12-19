@extends('layouts.main')
@section('content')

@include('learner.lessons.header')

<main class="main">

    <aside class="sidebar shadow">

        <div class="course">
            <div class="info">
                <span class="title">course name</span>
                <h3 class="name">{{ $lesson->course->name }}</h3>
            </div>
            <div class="right">
                @php
                $perc = $lesson->course->progress();
                @endphp
                <div class="progress-circle progress-{{ $perc }}"><span>{{ $perc }}</span></div>
                <span class="finished"> {{ $lesson->course->finishedUnits() }}/{{ $lesson->course->units()->count() }} modules </span>
            </div>
        </div>
        <div class="units">
            @foreach ($lesson->course->units as $courseUnit)
            <div class="unit">
                <div class="unit-details">
                    @php
                    $isActiveUnit = $courseUnit->id === $lesson->unit->id;
                    @endphp
                    <div class="unit-number {{ $isActiveUnit ? 'active' : '' }}">
                        <span class="text">
                            module {{ $loop->iteration }}
                        </span> @if($isActiveUnit)
                        <span class="circle"></span> @endif
                    </div>
                    <span class="unit-name"> {{ $courseUnit->name }} </span>
                    <img class="unit-status svg" src="{{ icon($courseUnit->statusIcon(), 'svg') }}" />

                    {{-- @if($isActiveUnit)
                    <img src="{{ icon('up-arrow') }}" class="icon unit-toggler" /> @else
                    <img src="{{ icon('down-arrow') }}" class="icon unit-toggler" /> @endif --}}
                </div>
                <div class="unit-lessons {{ $isActiveUnit ? 'show' : '' }}">
                    @foreach ($courseUnit->lessons as $unitLesson)
                    @php
                    $isActiveLesson = $unitLesson->id === $lesson->id;
                    @endphp
                    <div class="lesson {{ $isActiveLesson ? 'active' : '' }}">
                        @php
                        if($unitLesson->isVideo) {
                            $image = 'play';
                        } elseif($unitLesson->isReading) {
                            $image = 'reading';
                        } elseif($unitLesson->isPractice) {
                            $image = 'practice';
                        }
                        @endphp
                        @if($isActiveLesson)
                        <span class="pulse"></span>
                        <img class="svg" src="{{ icon($image, 'svg') }}">
                        <span class="lesson-title"> {{ $unitLesson->title }} </span> @else
                        <img src="{{ icon('double-tick', 'svg') }}" class="status svg" >
                        <img class="svg" src="{{ icon($image, 'svg') }}">
                        <a href="{{ route('learner.lessons.show', $unitLesson) }}">
                            <span class="lesson-title"> {{ $unitLesson->title }} </span>
                        </a>
                         @endif

                    </div>
                    @endforeach
                    <div class="challenges">
                        <img src="{{ icon('challenges', 'svg') }}" class="svg" />
                        <span class="title"> module test </span>
                        <span class="text"> measure your knowledge </span>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
        {{-- <div class="certification">
            <img src="{{ icon('certification', 'svg') }}" />
            <span> earn course certificate </span>
        </div> --}}
    </aside>

    <secion class="content">

        <div class="lesson">

            @if($lesson->isVideo)
            <div class="video">
                <video poster="{{ $lesson->poster }}" id="player" playsinline controls>
                    <source src="{{ $lesson->path }}" type="video/mp4">
                </video>
            </div>
            <input type="hidden" value="{{ $lesson->questions }}" id="popup-questions">
            @elseif($lesson->isReading)
            <div class="reading">
                <embed src="{{ $lesson->path }}" />
            </div>
            @elseif($lesson->isPractice)
            <div class="practice">
                <form method="POST">
                    @csrf

                    <div class="grid">

                        <div>
                            @foreach ($lesson->questions as $question)
                            <div class="question shadow">
                                <p> {{ $question->body }} </p>
                                @if($question->isMCQ)
                                <div class="answers">
                                    @foreach($question->answers as $answer)
                                    <div class="pretty p-icon p-pulse p-round answer">
                                        <input type="radio" name="question-{{ $question->id }}" value="{{ $answer->id }}" />
                                        <div class="state p-warning-o">
                                            <i class="icon zmdi zmdi-check"></i>
                                            <label> {{ $answer->body }} </label>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                @endif
                            </div>
                            @endforeach
                            <button type="submit" class="btn hvr-bounce-to-top" id="check-answers-btn"> Check your anwers </button>
                        </div>

                    </div>
                </form>
            </div>
            @endif
            <div class="details shadow">
                <h2 class="lesson-title"> {{ $lesson->title }}</h2>
                <div class="grid">
                    <div>
                        <h5 class="section-title"> Lesson Objectives </h5>
                        <p> {{ $lesson->objectives }} </p>
                    </div>
                    <div>
                        <h5 class="section-title"> Lesson Description </h5>
                        <p> {{ $lesson->description }} </p>
                    </div>
                </div>
            </div>
            <div class="footer-tabs">

                <ul class="nav nav-tabs shadow" id="footer-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="comments-tab" data-toggle="tab" href="#comments">
                            Questions <span>(</span>10<span>)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="ideas-tab" data-toggle="tab" href="#ideas">
                            Ideas <span>(</span>10<span>)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="resources-tab" data-toggle="tab" href="#resources">
                            Extra Resources <span>(</span>10<span>)</span>
                        </a>
                    </li>
                </ul>

                <div class="tab-content shadow" id="footer-tabs-content">
                    <div class="tab-pane fade show active" id="comments">
                        @for ($i = 0; $i
                        < 4; $i++) <div class="comment shadow">
                            <div class="info">
                                <div class="user">
                                    <img src="{{ Auth::user()->avatar }}" />
                                    <span> {{ Auth::user()->firstName }} </span>
                                </div>
                                <div class="body">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates, ex consequuntur. Nobis voluptatibus blanditiis neque
                                    rem nisi nihil asperiores repudiandae. Exercitationem dolore pariatur consequuntur odit
                                    fuga aut beatae molestias praesentium.
                                </div>
                            </div>
                            <div class="meta">
                                <div class="left">
                                    <span class="date">
                                        10 May 2018
                                    </span>
                                </div>
                                <div class="right">
                                    <div class="up">
                                        <img src="{{ icon('up') }}" alt="">
                                        <span> 12 </span>
                                    </div>
                                    <div class="replies">
                                        <img src="{{ icon('chat') }}" alt="">
                                        <span> 20 </span>
                                    </div>
                                </div>
                            </div>
                    </div>
                    @endfor
                </div>
                <div class="tab-pane fade" id="ideas">
                    Ideas
                </div>
                <div class="tab-pane fade" id="resources">
                    Resources
                </div>
            </div>
        </div>
        </div>
    </secion>

</main>

<div class="modal" id="question-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.32.2/dist/sweetalert2.all.min.js"></script>
@if($lesson->isVideo)
    <script> let questionsURL = @json(route('learner.questions.index', $lesson)) </script>
@endif
<script src="{{ asset('js/learner/lessons/show.js') }}"></script>

@endpush

@push('css')
<link rel="stylesheet" href="{{ asset('css/learner/lessons/show.css') }}">
@endpush
