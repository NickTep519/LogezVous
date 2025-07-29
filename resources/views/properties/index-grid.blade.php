@extends('layouts.app')

@section('title', config('app.name') . ' | ' . __('global.Properties'))

@section('content')

    @include('properties.banner-index')


    <section class="gray-simple position-relative z-0">
        <div class="container">

            @include('properties.infos-list')

            <div class="row justify-content-center g-4">

                @foreach ($properties as $property)
                    @include('properties.grid-card', ['property' => $property])
                @endforeach

            </div>


            <!-- Pagination -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
               {{ $properties->appends(request()->query())->links() }}
                    {{-- <ul class="pagination p-center">
                        <li class="page-item">
                            <a class="page-link" href="grid.html#" aria-label="Previous">
                                <i class="fa-solid fa-arrow-left-long"></i>
                                <span class="sr-only">Previous</span>
                            </a>
                        </li>
                        <li class="page-item"><a class="page-link" href="grid.html#">1</a></li>
                        <li class="page-item"><a class="page-link" href="grid.html#">2</a></li>
                        <li class="page-item active"><a class="page-link" href="grid.html#">3</a></li>
                        <li class="page-item"><a class="page-link" href="grid.html#">...</a></li>
                        <li class="page-item"><a class="page-link" href="grid.html#">18</a></li>
                        <li class="page-item">
                            <a class="page-link" href="grid.html#" aria-label="Next">
                                <i class="fa-solid fa-arrow-right-long"></i>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>
                    </ul> --}}
                </div>
            </div>

        </div>
    </section>


@endsection
