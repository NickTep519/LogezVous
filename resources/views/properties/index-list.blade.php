@extends('layouts.app')

@section('title', config('app.name') . ' | ' . __('global.Properties'))

@section('content')

    @include('properties.banner-index')


    <section class="bg-light">
        <div class="container">

            @include('properties.infos-list')

            <div class="row">

                <div class="col-lg-12 col-sm-12 list-layout">
                    <div class="row">
                        @foreach ($properties as $property)
                            @include('properties.list-card', ['property' => $property ])
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            {{ $properties->appends(request()->query())->links() }}
                            {{-- <ul class="pagination p-center">
                                <li class="page-item">
                                    <a class="page-link" href="list-layout-full.html#" aria-label="Previous">
                                        <i class="fa-solid fa-arrow-left-long"></i>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                                <li class="page-item"><a class="page-link" href="list-layout-full.html#">1</a></li>
                                <li class="page-item"><a class="page-link" href="list-layout-full.html#">2</a></li>
                                <li class="page-item active"><a class="page-link" href="list-layout-full.html#">3</a>
                                </li>
                                <li class="page-item"><a class="page-link" href="list-layout-full.html#">...</a></li>
                                <li class="page-item"><a class="page-link" href="list-layout-full.html#">18</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="list-layout-full.html#" aria-label="Next">
                                        <i class="fa-solid fa-arrow-right-long"></i>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </li>
                            </ul> --}}
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>



@endsection
