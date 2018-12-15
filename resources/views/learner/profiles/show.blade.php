@extends('layouts.main')

@section('content')

<div class="profile">

    <div class="left">
        <div class="profile-picture shadow" style="background-image: url({{ $learner->avatar  }})"></div>

        <div class="social">

            @if($learner->facebook_account)
                <a target="_blank" href="{{ $learner->facebook_account }}">
                    <img src="{{ getImageIcon('facebook') }}" width="40" alt="Facebook">
                </a>
            @endif

            @if($learner->youtube_account)
                <a target="_blank" href="{{ $learner->youtube_account }}">
                    <img src="{{ getImageIcon('youtube') }}" width="40" alt="Facebook">
                </a>
            @endif

            @if($learner->twitter_account)
                <a target="_blank" href="{{ $learner->twitter_account }}">
                    <img src="{{ getImageIcon('twitter') }}" width="40" alt="Twitter">
                </a>
            @endif

        </div>

        @if(Auth::guard('learner')->id() === $learner->id)
            <a href="{{ route('learner.profile.edit') }}" class="btn btn-success edit-profile"> Edit Profile </a>
        @endif
    </div>

    <div class="right">

        <div class="name-address">

            <div class="name">
                <h3> {{ $learner->name }} </h3>
            </div>

            @if($learner->city || $learner->country)
                <div class="address">
                    <i class="typcn typcn-location-arrow-outline"></i>
                    {{ $learner->city }}, {{ $learner->country }}
                </div>
            @endif
        </div>

        <div class="communication">
            @if(Auth::guard('learner')->user()->canAdd($learner))
            <button class="btn hvr-sweep-to-right">
                Add a Friend <i class="typcn typcn-user-add-outline"></i>
            </button>
            @endif
            <button class="btn hvr-sweep-to-left">
                Send a Message <i class="typcn typcn-message"></i>
            </button>
        </div>

        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active show" id="about-tab" data-toggle="tab" href="#about" role="tab"> About </a>
            </li>
            @if($learner->type != 'student')
                @if($learner->profile->bio)
                <li class="nav-item">
                    <a class="nav-link" id="bio-tab" data-toggle="tab" href="#bio" role="tab"> Bio </a>
                </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link" id="education-tab" data-toggle="tab" href="#education" role="tab"> Education Info </a>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" id="additional-tab" data-toggle="tab" href="#additional" role="tab"> Additional Info </a>
                </li>
            @endif
        </ul>

        <div class="tab-content mt-4">

            <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="about-tab">

                <h6> Contact Information </h6>

                <div class="grid">
                    @if($learner->phone_number)
                    <p>Phone:</p>
                    <p>{{ $learner->phone_number }}</p>
                    @endif

                    @if($learner->address)
                    <p>Phone:</p>
                    <p>{{ $learner->address }}</p>
                    @endif

                    <p>Email:</p>
                    <p>{{ $learner->email }}</p>
                </div>

                <h6> Basic Information </h6>

                <div class="grid">

                    <p> Gender: </p>
                    <p> {{ $learner->gender }} </p>

                    <p> Birthday: </p>
                    <p> {{ $learner->birthday }} </p>

                </div>
            </div>

            @if($learner->type === 'student')
                <div class="tab-pane fade" id="additional" role="tabpanel" aria-labelledby="additional-tab">

                    <h6> Additional Information </h6>

                    <div class="grid">

                        @if($learner->profile->favorite_sport)
                        <p> Favorite sport: </p>
                        <p> {{ $learner->profile->favorite_sport }} </p>
                        @endif

                        @if($learner->profile->favorite_color)
                        <p> Favorite color: </p>
                        <p> {{ $learner->profile->favorite_color }} </p>
                        @endif

                        @if($learner->profile->favorite_subject)
                        <p> Favorite subject: </p>
                        <p> {{ $learner->profile->favorite_subject }} </p>
                        @endif

                    </div>
                </div>
            @else

                @if($learner->profile->bio)
                    <div class="tab-pane fade" id="bio" role="tabpanel" aria-labelledby="bio-tab">
                        {!! $learner->profile->bio !!}
                    </div>
                @endif

                <div class="tab-pane fade" id="education" role="tabpanel" aria-labelledby="education-tab">
                    <h6> Education Information </h6>

                    <div class="grid">

                        @if($learner->profile->management)
                            <p> Management </p>
                            <p> {{ $learner->profile->management }} </p>
                        @endif


                        @if($learner->profile->departmant)
                            <p> Department </p>
                            <p> {{ $learner->profile->departmant }} </p>
                        @endif

                        @if($learner->profile->school)
                            <p> School </p>
                            <p> {{ $learner->profile->school }} </p>
                        @endif

                        @if($learner->profile->subjects)
                            <p> Subjects </p>
                            <div class="subjects">
                                @foreach ($learner->profile->subjects as $subject)
                                <span class="subject">{{ $subject }}</span> @endforeach
                            </div>
                        @endif

                        @if($learner->profile->levels)
                            <p> Levels </p>
                            <div class="levels">
                                @foreach ($learner->profile->levels as $level)
                                    <span class="level">{{ $level }}</span>
                                @endforeach
                            </div>
                        @endif


                    </div>
                </div>
            @endif

        </div>


    </div>



</div>

@endsection
