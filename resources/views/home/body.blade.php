<div class="clearfix"></div>
<section>
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-7 col-md-10 text-center">
                <div class="sec-heading center">
                    <h2> @lang('global.Your future home begins here') </h2>
                    <p> @lang('global.Looking for a change') </p>
                </div>
            </div>
        </div>

        <div class="row justify-content-center g-4">
            @foreach ($properties as $property)
                @include('properties.grid-card', ['property' => $property] )
            @endforeach
        </div>

        <div class="row align-items-center justify-content-center">
            <div class="col-lg-12 col-md-12 col-sm-12 text-center mt-5">
                <a href="{{ route('properties.index') }}" class="btn btn-main px-md-5 rounded">@lang('global.See more')</a>
            </div>
        </div>

    </div>
</section>
