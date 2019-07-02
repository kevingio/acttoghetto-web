<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Cache-control" content="public">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="{{ asset('app-asset/images/icons/favicon.png') }}"/>
    <title>@yield('title')</title>

    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/app.css') }}">
</head>
<body>

    @include('layouts.parts.header')
    @yield('content')
    @include('layouts.parts.footer')

    <script src="{{ URL::asset('js/app.js') }}"></script>
</body>
</html>
