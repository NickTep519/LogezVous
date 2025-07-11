@extends('layouts.app')

@section('title', config('app.name') . ' | ' . __('auth.SignIn'))

@section('content')

    <div class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">

                    <h2 class="ipt-title"> @lang('auth.SignIn') </h2>
                    <span class="ipn-subtitle"> @lang('auth.Connect to') </span>

                </div>
            </div>
        </div>
    </div>

    <section class="gray-simple">
        <div class="container">
            <!-- row Start -->
            <div class="row justify-content-center">
                <!-- Single blog Grid -->
                <div class="col-xl-7 col-lg-8 col-md-9">
                    <div class="card border-0 rounded-4 p-xl-4 p-lg-4 p-md-4 p-3">

                        <div class="simple-form">
                            <div class="form-header text-center mb-5">
                                <div class="effco-logo mb-2">
                                    <a class="d-flex align-items-center justify-content-center" href="{{ route('home') }}">
                                        <span class="svg-icon text-main svg-icon-2hx">
                                            <svg width="90" height="90" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M15.8797 15.375C15.9797 15.075 15.9797 14.775 15.9797 14.475C15.9797 13.775 15.7797 13.075 15.4797 12.475C14.7797 11.275 13.4797 10.475 11.9797 10.475C11.7797 10.475 11.5797 10.475 11.3797 10.575C7.37971 11.075 4.67971 14.575 2.57971 18.075L10.8797 3.675C11.3797 2.775 12.5797 2.775 13.0797 3.675C13.1797 3.875 13.2797 3.975 13.3797 4.175C15.2797 7.575 16.9797 11.675 15.8797 15.375Z"
                                                    fill="currentColor" />
                                                <path opacity="0.3"
                                                    d="M20.6797 20.6749C16.7797 20.6749 12.3797 20.275 9.57972 17.575C10.2797 18.075 11.0797 18.375 11.9797 18.375C13.4797 18.375 14.7797 17.5749 15.4797 16.2749C15.6797 15.9749 15.7797 15.675 15.7797 15.375V15.2749C16.8797 11.5749 15.2797 7.47495 13.2797 4.07495L21.6797 18.6749C22.2797 19.5749 21.6797 20.6749 20.6797 20.6749ZM8.67972 18.6749C8.17972 17.8749 7.97972 16.975 7.77972 15.975C7.37972 13.575 8.67972 10.775 11.3797 10.375C7.37972 10.875 4.67972 14.375 2.57972 17.875C2.47972 18.075 2.27972 18.375 2.17972 18.575C1.67972 19.475 2.27972 20.475 3.27972 20.475H10.3797C9.67972 20.175 9.07972 19.3749 8.67972 18.6749Z"
                                                    fill="currentColor" />
                                            </svg>
                                        </span>
                                    </a>
                                </div>
                                <h4 class="fs-2">@lang('auth.SignIn')</h4>
                            </div>
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="form-floating mb-3">
                                    <input type="email" id="email" name="email" value="{{ old('email') }}" required
                                        autofocus autocomplete="username" class="form-control"
                                        placeholder="name@example.com">
                                    <label for="email">@lang('label.Email')</label>
                                </div>
                                @error('email')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror

                                <div class="form-floating mb-3">
                                    <input type="password" id="password" name="password" required
                                        autocomplete="current-password" class="form-control" placeholder="Password">
                                    <label for="password">@lang('label.Password')</label>
                                </div>
                                @error('password')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror

                                <div class="form-group mb-3">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="flex-shrink-0 flex-first">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="remember_me"
                                                    name="remember">
                                                <label class="form-check-label" for="remember_me">@lang('label.Remember me')</label>
                                            </div>
                                        </div>
                                        @if (Route::has('password.request'))
                                            <div class="flex-shrink-0 flex-first">
                                                <a href="{{ route('password.request') }}" class="link fw-medium">
                                                    @lang('label.Forgot Password') ?</a>
                                            </div>
                                        @endif

                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit"
                                        class="btn btn-lg btn-main fw-medium full-width rounded-2">@lang('auth.SignIn')</button>
                                </div>

                            </form>
                        </div>

                        {{-- <div class="modal-divider"><span>Or SignUp via</span></div>
                        <div class="social-login mb-3">
                            <ul>
                                <li><a href="create-account.html#" class="btn connect-fb"><i
                                            class="bi bi-facebook"></i>Facebook</a></li>
                                <li><a href="create-account.html#" class="btn connect-google"><i
                                            class="bi bi-google"></i>Google+</a></li>
                            </ul>
                        </div> --}}

                        <div class="text-center">
                            <p class="mt-4"> @lang("auth.You don't have an account") ? <a href="{{ route('register') }}"
                                    class="link fw-medium">@lang('auth.Acreate An Account')</a></p>
                        </div>

                    </div>
                </div>

            </div>
            <!-- /row -->

        </div>

    </section>

@endsection

{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
