@extends('layouts.auth')

@section('form')

<form action="{{ url('register') }}" method="POST">

    @csrf

    <div class="form-group">
        <input type="text" class="form-control" name="name" placeholder="Name" value="{{ old('name') }}" />
    </div>

    <div class="form-group">
        <input type="text" class="form-control" name="username" placeholder="Username" value="{{ old('username') }}" />
    </div>

    <div class="form-group">
        <input type="text" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}" />
    </div>

    <div class="grid">

        <div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password" />
        </div>

        <div class="form-group">
            <input type="password" placeholder="Confirm Password" name="password_confirmation" class="form-control"  />
        </div>

    </div>

    <input type="hidden" name="type" value="teacher">

    {{-- <select name="type" class="custom-select">
        <option selected disabled> Learner Type </option>
        <option value="student"> Student </option>
        <option value="teacher"> Teacher </option>
        <option value="mentor"> Mentor </option>
    </select> --}}

    <button type="submit" class="btn ">
        <img src="{{ getImageIcon('login', 'svg') }}" />
        <span>REGISTER</span>
    </button>
</form>


@stop
