@extends('layouts.main')

@section('content')

    <div class="mt-3">

        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif

        <div class="profile edit">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" id="basic-info-tab" data-toggle="tab" href="#basic-info" role="tab"> Basic Information </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="personal-info-tab" data-toggle="tab" href="#personal-info" role="tab"> Personal Information </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="contact-info-tab" data-toggle="tab" href="#contact-info" role="tab"> Contant Information </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="additional-info-tab" data-toggle="tab" href="#additional-info" role="tab"> Additional Information </a>
                </li>
                @if($learner->type != 'student')
                <li class="nav-item">
                    <a class="nav-link" id="bio-info-tab" data-toggle="tab" href="#bio-info" role="tab"> Your Bio </a>
                </li>
                @endif
            </ul>

            <form action="{{ route('learner.profile.update') }}" method="POST" enctype="multipart/form-data">

                @csrf

                <div class="tab-content mt-4">

                    <div class="tab-pane fade show active" id="basic-info" role="tabpanel" aria-labelledby="basic-info-tab">
                        <div class="form-group">
                            <label for="">Display Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $learner->name }}">
                        </div>

                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" name="email" class="form-control" value="{{ $learner->email }}">
                        </div>

                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="">Confirm Password</label>
                            <input type="password" name="confirm_password" class="form-control">
                        </div>

                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-preview thumbnail" data-trigger="fileinput"
                                style="width: 200px; height: 150px;">
                                <img src="{{ Auth::user()->avatar ?? 'http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image'}}" alt="">
                            </div>
                            <div>
                                <span class="btn red btn-outline btn-file">
                                    <span class="fileinput-new btn btn-success"> Upload a profile picture </span>
                                    <span class="fileinput-exists btn btn-info"> Change </span>
                                    <input type="file" name="avatar">
                                </span>
                                <a href="javascript:;" class="btn btn-danger fileinput-exists" data-dismiss="fileinput"> Remove </a>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="contact-info" role="tabpanel" aria-labelledby="contact-info-tab">

                        <div class="form-group">
                            <label for="">Facebook Account</label>
                            <input type="url" name="facebook" class="form-control" value="{{ $learner->facebook_account }}">
                        </div>

                        <div class="form-group">
                            <label for="">Twitter Account</label>
                            <input type="url" name="twitter" class="form-control" value="{{ $learner->twitter_account }}">
                        </div>

                        <div class="form-group">
                            <label for="">Youtube Account</label>
                            <input type="url" name="youtube" class="form-control" value="{{ $learner->youtube_account }}">
                        </div>

                        <div class="form-group">
                            <label for="">Phone Number</label>
                            <input type="text" name="phone_number" class="form-control" value="{{ $learner->phone_number }}">
                        </div>

                    </div>

                    <div class="tab-pane fade" id="personal-info" role="tabpanel" aria-labelledby="personal-info-tab">

                          <div parent="gender" class="my-3" id="gender">

                            <label class="label" for=""> Gender </label>

                            <div class="pretty p-jelly p-image p-plain">
                                <input type="radio" name="gender" value="Male" />
                                <div class="state">
                                    <img src="{{ getImageIcon('male') }}" alt="" class="icon">
                                    <label> Male </label>
                                </div>
                            </div>

                            <div class="pretty p-jelly p-image p-plain">
                                <input type="radio" name="gender" value="Female" />
                                <div class="state">
                                    <img src="{{ getImageIcon('female') }}" alt="" class="icon">
                                    <label> Female </label>
                                </div>
                            </div>

                        </div>

                        <div class="form-group">
                            <label for="">City</label>
                            <input type="text" name="city" class="form-control" value="{{ $learner->city }}">
                        </div>

                        <div class="form-group">
                            <label for="">Country</label>
                            <input type="text" name="country" class="form-control" value="{{ $learner->country }}">
                        </div>

                        <div class="form-group">
                            <label for="">Date of birth</label>
                            <input type="date" name="date_of_birth" class="form-control" value="{{ $learner->date_of_birth }}">
                        </div>

                        <div class="form-group">
                            <label for="">National ID</label>
                            <input type="text" name="national_id" class="form-control" value="{{ $learner->national_id }}">
                        </div>

                    </div>

                    @if($learner->type != 'student')
                    <div class="tab-pane fade" id="bio-info" role="tabpanel" aria-labelledby="bio-info-tab">
                        <textarea name="bio" id="editor"></textarea>
                    </div>
                    @endif
                    <div class="tab-pane fade" id="additional-info" role="tabpanel" aria-labelledby="additional-info-tab">

                        @if($learner->type === 'student')

                            <div class="form-group">
                                <label for="">Grade</label>
                                <input type="text" name="grade" class="form-control" value="{{ $learner->grade }}">
                            </div>

                            <div class="form-group">
                                <label for="">School</label>
                                <input type="text" name="school" class="form-control" value="{{ $learner->profile->school }}">
                            </div>

                            <div class="form-group">
                                <label for="">Favorite Subject</label>
                                <input type="text" name="favorite_subject" class="form-control" value="{{ $learner->profile->favorite_subject }}">
                            </div>

                            <div class="form-group">
                                <label for="">Favorite Color</label>
                                <input type="text" name="favorite_color" class="form-control" value="{{ $learner->profile->favorite_color }}">
                            </div>

                            <div class="form-group">
                                <label for="">Favorite Sport</label>
                                <input type="text" name="favorite_sport" class="form-control" value="{{ $learner->profile->favorite_sport }}">
                            </div>

                        @else

                            @if($learner->type === 'teacher')

                            <div class="form-group">
                                <label for="">School</label>
                                <input type="text" name="school" class="form-control" value="{{ $learner->profile->school }}">
                            </div>

                            @php
                            $subjects = array('Math', 'Science', 'Chemistry', 'Physics', 'Arabic', 'English', 'Spanish');
                            @endphp

                            <div class="form-group">
                                <label for="">Levels</label>
                                <select name="levels[]" class="custom-select" multiple>
                                    @for ($i = 1; $i <= 6; $i++)
                                        <option value="Level {{ $i }}">Level {{ $i }}</option>
                                    @endfor
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="">Subject</label>
                                <select name="subjects[]" class="custom-select" multiple>
                                    @foreach ($subjects as $subject)
                                        <option value="{{ $subject }}"> {{ $subject }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @endif

                            <div class="form-group">
                                <label for="">Mangagement</label>
                                <input type="text" name="management" class="form-control" value="{{ $learner->profile->management }}">
                            </div>

                            <div class="form-group">
                                <label for="">Department</label>
                                <input type="text" name="department" class="form-control" value="{{ $learner->profile->department }}">
                            </div>

                        @endif

                    </div>

                </div>

                <button class="btn edit-profile btn-success">Update</button>

            </form>
        </div>
    </div>
@endsection


@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.js"></script>
    <script src="{{ asset('vendor/bootstrap-fileinput/bootstrap-fileinput.js') }}"
    <script src="{{ asset('js/learner/profiles/edit.js') }}"></script>
@endpush

@push('css')
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap-fileinput/bootstrap-fileinput.css') }}">
@endpush
