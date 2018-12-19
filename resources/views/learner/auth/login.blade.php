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
        <input type="text" class="form-control" name="username" placeholder="Username Or Email" value="{{ old('login') }}" />
        <span class="input-group-addon">
            <img src="{{ getImageIcon('user') }}" alt="" class="icon">
        </span>
    </div>

    <div class="form-group">
        <div class="input-group">
            <input type="password" placeholder="Password" name="password" class="form-control" value="{{ old('password') }}" />
            <span class="input-group-addon">
                <img src="{{ getImageIcon('key') }}" alt="" class="icon">
            </span>
        </div>
    </div>

    <div class="custom-control custom-checkbox mb-2">
        <input type="checkbox" name="remember" value="1" class="custom-control-input" id="remember-me">
        <label class="custom-control-label" for="remember-me">Remeber Me</label>
    </div>

    <a class="btn auth-switcher" href="{{ url('/learner/register') }}"> Forgot your password?   </a>


    <button type="submit" class="btn "> SIGN IN </button>

</form>

<div class="or">
    <hr class="bar">
    <span>OR</span>
    <hr class="bar">
</div>


<div class="social">
    <h3> Sign In Using </h3>
    <div class="links">
        <a target="_blank" href="{{ url('/login/facebook') }}">
            <img src="{{ getImageIcon('facebook') }}" width="40"/>
        </a>

        <a target="_blank" href="{{ url('/login/twitter') }}">
            <img src="{{ getImageIcon('twitter') }}" width="40"/>
        </a>

        <a target="_blank" href="{{ url('/login/google') }}">
            <img src="{{ getImageIcon('google') }}" width="40"/>
        </a>
    </div>
</div>

<a class="btn auth-switcher" href="{{ route('learner.register') }}"> Create an Account.   </a>

@stop
