@extends('layouts.app')

@section('title',
    config('app.name') .
    ' | ' .
    ($property->exists
    ? __('global.Edit Property')
    : __('global.Submit Property')))


@section('content')

    @include('properties.banner-form')

    <section class="gray-simple">
        <div class="container">

            @guest
                @include('pages.login-please')
            @endguest

            <div class="row">

                <!-- Submit Form -->
                <div class="col-lg-12 col-md-12">
                    <form action="{{ route($property->exists ? 'properties.edit' : 'properties.store', $property) }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @method($property->exists ? 'PUT' : 'POST')

                        <div class="submit-page">

                            <!-- Basic Information -->
                            <div class="form-submit">
                                <h3>Basic Information</h3>
                                <div class="submit-section">
                                    <div class="row">

                                        @include('shared.input', [
                                            'class' => 'col-md-12',
                                            'label' => __('label.Property Title'),
                                            'type' => 'text',
                                            'name' => 'title',
                                            'value' => $property->title,
                                        ])

                                        @include('shared.select', [
                                            'class' => 'col-md-6',
                                            'label' => __('label.Listing type'),
                                            'name' => 'listing_type',
                                            'options' => $property->getEnumValues('listing_type'),
                                            'selected' => $property->listing_type,
                                        ])

                                        @include('shared.select', [
                                            'class' => 'col-md-6',
                                            'label' => __('label.Property type'),
                                            'name' => 'property_type',
                                            'options' => $property->getEnumValues('property_type'),
                                            'selected' => $property->property_type,
                                        ])

                                        @include('shared.input', [
                                            'class' => 'col-md-6',
                                            'label' => __('label.Price'),
                                            'type' => 'text',
                                            'name' => 'price',
                                            'value' => $property->price,
                                        ])

                                        @include('shared.select', [
                                            'class' => 'col-md-6',
                                            'label' => __('label.Bedrooms'),
                                            'name' => 'bedrooms',
                                            'options' => [1, 2, 3, 4, 5],
                                            'selected' => $property->bedrooms,
                                        ])

                                        @include('shared.select', [
                                            'class' => 'col-md-6',
                                            'label' => __('label.Bathrooms'),
                                            'name' => 'bathrooms',
                                            'options' => [1, 2, 3, 4, 5],
                                            'selected' => $property->bathrooms,
                                        ])

                                        @include('shared.select', [
                                            'class' => 'col-md-6',
                                            'label' => __('label.Rooms'),
                                            'name' => 'rooms',
                                            'options' => [1, 2, 3, 4, 5, 6, 7, 8, 9, 10],
                                            'selected' => $property->rooms,
                                            'optional' => true,
                                        ])

                                        @include('shared.input', [
                                            'class' => 'col-md-6',
                                            'label' => 'Surface (m²) ',
                                            'type' => 'number',
                                            'name' => 'surface',
                                            'value' => $property->surface,
                                            'optional' => true,
                                        ])

                                    </div>
                                </div>
                            </div>

                            <!-- Location -->
                            <div class="form-submit">
                                <h3> @lang('label.Location') </h3>
                                <div class="submit-section">
                                    <div class="row">

                                        @include('shared.input', [
                                            'class' => 'col-md-6',
                                            'label' => __('label.Country'),
                                            'type' => 'text',
                                            'name' => 'country',
                                            'value' => $property->country,
                                        ])

                                        @include('shared.input', [
                                            'class' => 'col-md-6',
                                            'label' => __('label.City'),
                                            'type' => 'text',
                                            'name' => 'city',
                                            'value' => $property->city,
                                        ])

                                        @include('shared.input', [
                                            'class' => 'col-md-6',
                                            'label' => __('label.Neighborhood'),
                                            'type' => 'text',
                                            'name' => 'neighborhood',
                                            'value' => $property->neighborhood,
                                        ])

                                    </div>
                                </div>
                            </div>

                            <!-- Detailed Information -->
                            <div class="form-submit">
                                <h3> @lang('label.Detailed Information') </h3>
                                <div class="submit-section">
                                    <div class="row">

                                        @include('shared.input', [
                                            'class' => 'col-md-12',
                                            'label' => 'Description',
                                            'type' => 'textarea',
                                            'name' => 'description',
                                            'value' => $property->description,
                                        ])

                                        @include('shared.select', [
                                            'class' => 'col-md-4',
                                            'label' => __('label.Cooling'),
                                            'name' => 'cooling',
                                            'options' => $property->getEnumValues('cooling'),
                                            'selected' => $property->cooling,
                                            'optional' => true,
                                        ])

                                        @include('shared.select', [
                                            'class' => 'col-md-4',
                                            'label' => __('label.Exterior finish'),
                                            'name' => 'exterior_finish',
                                            'options' => $property->getEnumValues('exterior_finish'),
                                            'selected' => $property->exterior_finish,
                                            'optional' => true,
                                        ])

                                        @include('shared.select', [
                                            'class' => 'col-md-4',
                                            'label' => __('label.Building Age'),
                                            'name' => 'year_built',
                                            'options' => $property->getEnumValues('year_built'),
                                            'selected' => $property->year_built,
                                            'optional' => true,
                                        ])

                                        <div class="form-group col-md-12">
                                            <label> @lang('label.Other Features') ( @lang('label.Optional'))</label>
                                            <div class="o-features">
                                                <ul class="no-ul-list third-row">

                                                    @include('shared.checkbox', [
                                                        'label' => 'Garage',
                                                        'name' => 'garage',
                                                        'value' => $property->garage,
                                                    ])

                                                    @include('shared.checkbox', [
                                                        'label' => __('label.Heating'),
                                                        'name' => 'heating',
                                                        'value' => $property->heating,
                                                    ])

                                                    @include('shared.checkbox', [
                                                        'label' => __('label.Fireplace'),
                                                        'name' => 'fireplace',
                                                        'value' => $property->fireplace,
                                                    ])

                                                    @include('shared.checkbox', [
                                                        'label' => __('label.Elevator'),
                                                        'name' => 'elevator',
                                                        'value' => $property->elevator,
                                                    ])

                                                    @include('shared.checkbox', [
                                                        'label' => __('label.Kitchen'),
                                                        'name' => 'kitchen',
                                                        'value' => $property->kitchen,
                                                    ])

                                                    @include('shared.checkbox', [
                                                        'label' => __('label.Smoking allowed'),
                                                        'name' => 'smoking_allowed',
                                                        'value' => $property->smoking_allowed,
                                                    ])

                                                    @include('shared.checkbox', [
                                                        'label' => __('label.Parking'),
                                                        'name' => 'parking',
                                                        'value' => $property->parking,
                                                    ])

                                                    @include('shared.checkbox', [
                                                        'label' => __('label.Internet'),
                                                        'name' => 'internet',
                                                        'value' => $property->internet,
                                                    ])

                                                    @include('shared.checkbox', [
                                                        'label' => __('label.Wifi'),
                                                        'name' => 'wifi',
                                                        'value' => $property->wifi,
                                                    ])

                                                    @include('shared.checkbox', [
                                                        'label' => __('label.Bedding'),
                                                        'name' => 'bedding',
                                                        'value' => $property->bedding,
                                                    ])

                                                    @include('shared.checkbox', [
                                                        'label' => __('label.Balcony'),
                                                        'name' => 'balcony',
                                                        'value' => $property->balcony,
                                                    ])

                                                    @include('shared.checkbox', [
                                                        'label' => __('label.Terrace'),
                                                        'name' => 'terrace',
                                                        'value' => $property->terrace,
                                                    ])

                                                    @include('shared.checkbox', [
                                                        'label' => __('label.Swimming pool'),
                                                        'name' => 'swimming_pool',
                                                        'value' => $property->swimming_pool,
                                                    ])


                                                </ul>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <!-- Galerie d'images -->
                            <div class="form-submit">
                                <h3> @lang('global.Image gallery') </h3>
                                <div class="card shadow-sm">
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label for="multiImageInput" class="form-label">@lang('global.Choose the images of the property')</label>
                                            <input class="form-control" type="file" name="gallery[]" id="multiImageInput"
                                                accept="image/*" multiple>
                                        </div>
                                        <div id="preview" class="preview-container"></div>
                                        @error('gallery')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>


                            <div class="form-group col-lg-12 col-md-12 py-5">
                                <label>GDPR Agreement *</label>
                                <ul class="no-ul-list">
                                    <li>
                                        <input id="aj-1" class="form-check-input" name="aj-1" type="checkbox">
                                        <label for="aj-1" class="form-check-label"> @lang('global.I consent to having this') </label>
                                        <input id="aj-1" class="form-check-input" value="{{ Auth::user()->id }}"
                                            name="user_id" type="hidden">
                                    </li>
                                </ul>

                            </div>

                            <div class="form-group col-lg-12 col-md-12">
                                <button class="btn btn-main fw-medium px-5" type="submit">
                                    @if ($property->exists)
                                        @lang('global.Edit Property')
                                    @else
                                        @lang('global.Post Property')
                                    @endif
                                </button>
                            </div>

                        </div>
                    </form>
                </div>

            </div>
        </div>

    </section>
@endsection
