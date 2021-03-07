<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>

    @include('layout.css')
</head>
<body  >


{{--<div id="preloader">--}}
    {{--<div id="status">&nbsp;</div>--}}
{{--</div>--}}


    @yield('content')


@include('layout.footer')
@include('layout.js')


</body>
</html>
