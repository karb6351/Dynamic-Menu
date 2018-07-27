<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@section('header'){{ Config::get('app.name') }}</title>
</head>
@stack('css')
<body >
<div id="app">
    {{--@include('frontend.inc.header')--}}

    @include('frontend.inc.menu')

    @yield('content')

    {{--@include('frontend.inc.footer')--}}

</div>

</body>
<script type="text/javascript" src="{{ URL::asset('js/app.js') }}"></script>
@stack('js')
</html>
