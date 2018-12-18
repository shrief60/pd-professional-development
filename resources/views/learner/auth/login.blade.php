@extends('layouts.auth')

@section('form')

<form action="{{ url('login') }}" method="POST">

    @csrf

    <div class="input-group">
        <input type="text" class="form-control" name="username" placeholder="Username Or Email" value="{{ old('username') }}" />
    </div>

    <div class="form-group">
        <input type="password" placeholder="Password" name="password" class="form-control" />
    </div>

    <a id="password-forget" href="{{ url('password/email') }}"> Forget password?   </a>

    <button type="submit" class="btn ">
        <img src="{{ getImageIcon('login', 'svg') }}" />
        <span>SIGN IN</span>
    </button>

</form>

{{--
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
--}}

@stop
