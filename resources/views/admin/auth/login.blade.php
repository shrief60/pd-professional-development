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
        <input type="text" class="form-control" name="login" placeholder="Username Or Email" value="{{ old('login') }}" />
        <span class="input-group-addon">
        <img src="{{ getImageIcon('user') }}" alt="" class="icon">
    </span>

    </div>

    <div class="input-group">
        <input type="password" placeholder="Password" name="password" class="form-control" value="{{ old('password') }}" />
        <span class="input-group-addon">
            <img src="{{ getImageIcon('key') }}" alt="" class="icon">
        </span>
    </div>

    <a class="btn auth-switcher" href="{{ url('/learner/register') }}"> Forgot your password?   </a>


    <div class="checkbox">
        <input id="remember" name="remember" value="1" type="checkbox">
        <label for="remember"> Remeber Me </label>
    </div>

    <button type="submit" class="btn ">SIGN IN</button>
</form>

<div class="or">
    <hr class="bar">
    <span>OR</span>
    <hr class="bar">
</div>

<a class="btn auth-switcher" href="{{ url('register') }}"> Create an Account </a>
@stop
