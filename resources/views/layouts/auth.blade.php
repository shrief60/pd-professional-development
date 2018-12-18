<!doctype html>

<html lang="{{ app()->getLocale() }}">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> {{ config('app.name') }} </title>

    @stack('css')

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/auth/auth.css') }}">

</head>

<body class="">


    <div id="wrapper">
        <div class="images">
            @for ($i = 1; $i <= 9; $i++)
                <div style='background-image: url({{ img("login/$i", 'jpg') }})'></div>
            @endfor
        </div>
        <div class="overlay"></div>
        <div class="body">
            <div class="header">
                <img src="{{ img('logo') }}" />
                <span> professional development</span>
            </div>

            <div class="content">
                <div class="left">
                    <div class="toggler">
                        @if(Route::currentRouteName() == 'learner.login')
                        <span> SIGN IN </span>
                        <a href="{{ url('register') }}"> REGISTER </a>
                        @else
                        <a href="{{ url('login') }}"> SIGN IN </a>
                        <span> REGISTER </span>
                        @endif
                    </div>
                </div>

                <div class="right">
                    <div class="form-header">
                        <h3> <span> welcome to </span> discovery pd community </h3>
                    </div>
                    @yield('form')
                </div>

            </div>
        </div>
    </div>

    <script src="/js/app.js"></script>
    <script src="/js/ajax.js"></script>
    <script>
        displayErrors(@json($errors->messages()))
    </script>
    @stack('scripts')

</body>

</html>
