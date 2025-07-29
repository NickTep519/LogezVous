@extends('dashboard.base')

@section('title', config('app.name') . ' | ' . $agent->exists ? __('global.Edit agent data') : __('global.Add an agent'))

@section('content')

    <style>
        .iti {
            margin-top: 25px;
            position: relative;
            width: 100%;
            display: inline-block;
        }
    </style>

    <div class="col-lg-9 col-md-12">
        <div class="dashboard-wraper">

            <div class="form-submit">
                <h4> @lang('global.Add an agent') </h4>
                <div class="submit-section">

                    <form action="{{ route('dashboard.agents.store') }}" method="POST">
                        @csrf
                        @method($agent->exists ? 'PUT' : 'POST')

                        <div class="row">

                            <div class="form-group col-md-6">
                                <label for="lname"> @lang('label.fname') </label>
                                <input type="text" id="fname" name="fname" value="{{ old('fname', $agent->fname) }}"
                                    class="form-control" autofocus required placeholder="{{ __('label.fname') }}">
                            </div>
                            @error('fname')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror

                            <div class="form-group col-md-6">
                                <div class="form-group mb-3">
                                    <label for="lname"> @lang('label.lname') </label>
                                    <input type="text" id="lname" name="lname"
                                        value="{{ old('lname', $agent->lname) }}" class="form-control" required
                                        placeholder="{{ __('label.lname') }}">
                                </div>
                                @error('lname')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <div class="form-group mb-3">
                                    <label for="pseudo_or_agency"> @lang('label.Pseudo') </label>
                                    <input type="text" id="pseudo_or_agency" name="pseudo_or_agency"
                                        value="{{ old('pseudo_or_agency', $agent->pseudo_or_agency) }}" class="form-control"
                                        required placeholder="{{ __('label.Pseudo') }}">
                                </div>
                                @error('pseudo_or_agency')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <div class="form-group mb-3">
                                    <label for="email"> @lang('label.Email') </label>
                                    <input type="text" id="email" name="email"
                                        value="{{ old('email', $agent->email) }}" class="form-control" required
                                        placeholder="{{ __('label.Email') }}">
                                </div>
                                @error('email')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <div class="form-group mb-3">
                                    {{-- <label for="phone"> @lang('label.Phone') </label> --}}
                                    <input type="text" id="phone" name="phone"
                                        value="{{ old('phone', $agent->phone) }}" class="form-control" required
                                        placeholder="{{ __('label.Phone') }}">
                                    <input type="hidden" id="dial_code" name="dial_code" />
                                </div>
                                @error('phone')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            <div class="form-group col-md-6">
                                <div class="form-group mb-3">
                                    <label for="city"> @lang('label.City') </label>
                                    <input type="text" id="city" name="city"
                                        value="{{ old('city', $agent->city) }}" class="form-control" required
                                        placeholder="{{ __('label.City') }}">
                                </div>
                                @error('city')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            <div class="form-group col-md-6">
                                <div class="form-group">
                                    <label for="password">@lang('label.Password')</label>
                                    <input type="password" id="password" name="password" class="form-control"
                                        placeholder="*******" required autocomplete="new-password">
                                </div>
                                @error('password')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <div class="form-group">
                                    <label for="password_confirmation">@lang('label.Confirm Password')</label>
                                    <input type="password" id="password_confirmation" name="password_confirmation"
                                        class="form-control" placeholder="*******" required autocomplete="new-password">
                                </div>
                                @error('password_confirmation')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            <div class="form-group col-lg-12 col-md-12">
                                <button class="btn btn-main px-5 rounded" type="submit"> {{ $agent->exists ? __('global.Edit agent data') : __('global.Add an agent') }} </button>
                            </div>

                             <div class="col-lg-12 col-md-12 py-1">
                                <p> @lang('global.Remember to provide the credentials to the agent') </p>
                            </div>

                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>


@endsection
