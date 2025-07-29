@extends('dashboard.base')

@section('title', config('app.name') . ' | ' . __('global.My appointment'))

@section('content')

    <div class="col-lg-9 col-md-12">
        <div class="dashboard-wraper">

            <div class="form-submit">
                <h4> @lang('global.My appointments') </h4>
            </div>

            <div class="row justify-content-center g-lg-3 g-4">
                <div class="property_block_wrap style-2">

                    <div class="table-responsive">
                        <table class="table table-hover table-bordered table-striped align-middle shadow-sm">
                            <thead class="table-primary text-center">
                                <tr>
                                    <th>#</th>
                                    <th> @lang('label.Listing type') </th>
                                    <th> @lang('global.Owner name') </th>
                                    <th>@lang('label.City')/@lang('label.Neighborhood')</th>
                                    <th>Statut</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach ($appointments as $appointment)
                                    {{-- <tr>
                                                <th scope="row"> {{ $property->configuration_code }} </th>
                                                <td> {{ $property->listing_type }} </td>
                                                <td> {{ $property?->owner?->name }} </td>
                                                <td> {{ $property->city }}/{{ $property->neighborhood }}</td>
                                                <td><span class="badge bg-success">{{ $property->status }} </span> <a
                                                        href="#">
                                                        {{ $property?->tenant ? ': ' . $property?->tenant?->user->name : '' }}
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="{{ route('properties.show', $property) }}"
                                                        class="btn btn-sm btn-outline-primary me-1" title="Voir">
                                                        <i class="bi bi-eye"></i>
                                                    </a>

                                                    <a href="{{ route('properties.edit', $property) }}"
                                                        class="btn btn-sm btn-outline-warning me-1" title="Modifier">
                                                        <i class="bi bi-pencil"></i>
                                                    </a>

                                                    <button type="button" class="btn btn-sm btn-outline-danger"
                                                        data-bs-toggle="modal" data-bs-target="#confirmDeleteModal"
                                                        title="Supprimer">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </td>
                                            </tr> --}}
                                @endforeach
                            </tbody>
                        </table>
                        {{ $appointments->appends(request()->query())->links() }}
                    </div>

                </div>
            </div>


        @endsection
