@extends('dashboard.base')

@section('title', config('app.name') . ' | ' . __('global.My agents'))

@section('content')

    <div class="col-lg-9 col-md-12">
        <div class="dashboard-wraper">

            <div class="form-submit">
                <h4> @lang('global.My agents') </h4>
            </div>

            <div class="row justify-content-center g-lg-3 g-4">

                @foreach ($agents as $agent)
                    @include('dashboard.agencies.agency-card', [
                        'agent' => $agent
                    ])
                @endforeach

                {{ $agents->appends(request()->query())->links() }}

            </div>
        </div>
    </div>

@endsection
