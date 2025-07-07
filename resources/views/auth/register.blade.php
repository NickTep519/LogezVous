@extends('layouts.app')

@section('title', config('app.name') . ' | ' . __('auth.SignUp'))

@section('content')

    <style>
        .iti {
            margin-top: 25px;
            position: relative;
            width: 100%;
            display: inline-block;
        }
    </style>

    <div class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">

                    <h2 class="ipt-title"> @lang('auth.Acreate An Account') </h2>
                    <span class="ipn-subtitle">  @lang('auth.Create Account On') </span>

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
                                <h4 class="fs-2"> @lang('auth.Create Account On') </h4>
                            </div>

                            <form method="POST" action="{{ route('register') }}" >
                                @csrf

                                <div class="row">

                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="lname"> @lang('label.fname') </label>
                                            <input type="text" id="fname" name="fname" value="{{ old('fname') }}"
                                                class="form-control" autofocus placeholder="{{ __('label.fname') }}">
                                        </div>
                                        @error('fname')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="lname"> @lang('label.lname') </label>
                                            <input type="text" id="lname" name="lname" value="{{ old('lname') }}"
                                                class="form-control" placeholder="{{ __('label.lname') }}">
                                        </div>
                                        @error('lname')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="pseudo_or_agency"> @lang('label.Pseudo') / @lang('label.Agency name') </label>
                                            <input type="text" id="pseudo_or_agency" name="pseudo_or_agency"
                                                value="{{ old('pseudo_or_agency') }}" class="form-control"
                                                placeholder="{{ __('label.Pseudo') }}/{{ __('label.Agency name') }}">
                                        </div>
                                        @error('pseudo_or_agency')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="email"> @lang('label.Email') </label>
                                            <input type="text" id="email" name="email" value="{{ old('email') }}"
                                                class="form-control" placeholder="{{ __('label.Email') }}">
                                        </div>
                                        @error('email')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group mb-3">
                                            {{-- <label for="phone"> @lang('label.Phone') </label> --}}
                                            <input type="text" id="phone" name="phone" value="{{ old('phone') }}"
                                                class="form-control" placeholder="{{ __('label.Phone') }}">
                                            <input type="hidden" id="dial_code" name="dial_code" />
                                        </div>
                                        @error('phone')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>


                                     <div class="col-lg-6 col-md-6 mb-3">
                                        <div class="form-group">
                                            <label> @lang('label.Signup As') </label>
                                            <select class="form-control" name="role" >
                                                <option value="agence" > @lang('label.As a Agency') </option>
                                                <option value="demarcheur"> @lang('label.As a canvasser') </option>
                                                <option value="client" > @lang('label.As a Customer') </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 mb-3">
                                        <div class="form-group">
                                            <label for="password" >@lang('label.Password')</label>
                                            <input type="password" id="password" name="password" class="form-control" placeholder="*******"  required autocomplete="new-password">
                                        </div>
                                        @error('password')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                     <div class="col-lg-6 col-md-6 mb-3">
                                        <div class="form-group">
                                            <label for="password_confirmation" >@lang('label.Confirm Password')</label>
                                            <input type="password" id="password_confirmation"  name="password_confirmation" class="form-control" placeholder="*******"  required autocomplete="new-password" >
                                        </div>
                                        @error('password_confirmation')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-main full-width fw-medium">@lang('label.Create Account')<i
                                            class="fa-solid fa-arrow-right-long ms-2"></i></button>
                                </div>

                            </form>
                        </div>

                        {{-- <div class="modal-divider"><span>Or SignUp via</span></div>
						<div class="social-login mb-3">
							<ul>
							    <li><a href="create-account.html#" class="btn connect-fb"><i class="bi bi-facebook"></i>Facebook</a></li>
								<li><a href="create-account.html#" class="btn connect-google"><i class="bi bi-google"></i>Google+</a></li>
							</ul>
						</div> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
