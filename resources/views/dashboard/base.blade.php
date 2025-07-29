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

    {{-- @include('partials.preloader') --}}

    <div id="main-wrapper">

        @include('dashboard.nav')

        <section class="bg-light">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="filter_search_opt">
                            <a href="javascript:void(0);" onclick="openFilterSearch()"
                                class="btn btn-dark full-width mb-4"> @lang('global.Dashboard') <i
                                    class="fa-solid fa-bars ms-2"></i></a>
                        </div>
                    </div>
                </div>

                <div class="row">

                    @include('dashboard.sidebar')

                    @yield('content')

                </div>
            </div>
        </section>

        @include('partials.footer')
        @include('partials.login-modal')
        @include('partials.toastr')

    </div>

    @include('partials.scripts')
    @yield('scripts')

</body>

</html>
