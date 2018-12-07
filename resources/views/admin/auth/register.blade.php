@extends('layouts.auth')
@section('form')

<form action="@yield('form-action')" method="POST">

    @csrf

    <h3>
        <a href="{{ url('/') }}">
            Welcome to {{ config('app.name') }}
        </a>
    </h3>

    <div class="input-group">
        <input type="text" class="form-control" name="name" placeholder="Name" value="{{ old('name') }}" />
        <span class="input-group-addon">
            <img src="{{ getImageIcon('user') }}" alt="" class="icon">
        </span>
    </div>

    <div class="input-group">
        <input type="text" class="form-control" name="username" placeholder="Username" value="{{ old('username') }}" />
        <span class="input-group-addon">
            <img src="{{ getImageIcon('user') }}" alt="" class="icon">
        </span>
    </div>

    <div class="input-group">
        <input type="text" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}" />
        <span class="input-group-addon">
            <img src="{{ getImageIcon('email') }}" alt="" class="icon">
        </span>
    </div>

    <div class="grid">
        <div class="input-group">
            <input type="password" class="form-control" name="password" placeholder="Password" value="{{ old('password') }}" />
            <span class="input-group-addon">
            <img src="{{ getImageIcon('user') }}" alt="" class="icon">
        </span>
        </div>

        <div class="input-group">
            <input type="password" placeholder="Confirm Password" name="password_confirmation" class="form-control" value="{{ old('password_confirmation') }}"
            />
            <span class="input-group-addon">
            <img src="{{ getImageIcon('key') }}" alt="" class="icon">
        </span>
        </div>
    </div>

    <button type="submit" class="btn ">SIGN UP</button>
</form>

<div class="or">
    <hr class="bar">
    <span>OR</span>
    <hr class="bar">
</div>

<a class="btn auth-switcher" href="{{ route('learner.login') }}"> Have an Account? </a>
@stop
