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

    <div class="content">
        <div class="wrapper">
            @yield('form')
        </div>
    </div>

    <div class="image"></div>

    <link rel="stylesheet" href="{{ asset('css/app.js') }}">

    @stack('scripts')

</body>

</html>
