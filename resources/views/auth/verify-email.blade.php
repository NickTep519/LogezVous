@extends('layouts.app')

@section('title', config('app.name') . ' | ' . __('auth.Verify Mail'))

@section('content')


    <div class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">

                    <h2 class="ipt-title"> @lang('auth.Verify Mail') </h2>
                    <span class="ipn-subtitle"> @lang('auth.Verify Mail') </span>

                </div>
            </div>
        </div>
    </div>


    <section class="gray-simple">
        <div class="container">

            <div class="row justify-content-center">

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
                                {{-- <h4 class="fs-2">Create Account On Resido</h4> --}}
                                <p> @lang('auth.Thanks for signing up') </p>
                            </div>

                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <form method="POST" action="{{ route('verification.send') }}">
                                        @csrf

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-main full-width fw-medium"> @lang('auth.Resend Verification Email') </button>
                                        </div>

                                    </form>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <form method="POST" action="{{ route('logout') }}" >
                                        @csrf

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-main full-width fw-medium"> @lang('auth.Logout')</button>
                                        </div>
                                    </form>
                                </div>
                            </div>



                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection


{{-- <x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-primary-button>
                    {{ __('Resend Verification Email') }}
                </x-primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{ __('Log Out') }}
            </button>
        </form>
    </div>
</x-guest-layout> --}}
