<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('users/assets/img/favicon.png') }}">

    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta property="og:title" content="">
    <meta property="og:type" content="">
    <meta property="og:url" content="">
    <meta property="og:image" content="">

    <title> @yield('title') </title>

    @include('partials.styles')

</head>

<body class="blue-skin">

    @include('partials.preloader')

    <div id="main-wrapper">

        @include('partials.nav')

        @include('partials.sidbar-nav')

        @yield('content')

        @include('partials.footer')

        @include('partials.login-modal')


    </div>

    @include('partials.scripts')

</body>

</html>
