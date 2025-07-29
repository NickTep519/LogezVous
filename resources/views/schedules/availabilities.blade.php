@extends('dashboard.base')

@section('title', config('app.name') . ' | ' . __('global.My availability'))

@section('content')

    <div class="col-lg-9 col-md-12">
        <div class="dashboard-wraper">

            <div class="form-submit">
                <h4> @lang('global.My availability') </h4>
            </div>

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="text-primary"></h2>
                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addModal">
                    <i class="bi bi-plus-circle"></i> @lang('global.Add')
                </button>
            </div>


            <div class="row g-4">
                @foreach ($availabilities as $availability)
                    @foreach ($availability->periods as $period)
                        @include('schedules.card', ['period' => $period,  'location' => $availability->description])
                    @endforeach
                @endforeach
                {{-- @include('schedules.card')
                @include('schedules.card')
                @include('schedules.card')
                @include('schedules.card')
                @include('schedules.card')
                @include('schedules.card')
                @include('schedules.card')
                @include('schedules.card')
                @include('schedules.card') --}}
            </div>

        </div>
    </div>




    <!-- MODAL AJOUT -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('dashboard.agent.store.availability') }}" method="POST" class="modal-content">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">@lang('global.Add availability')</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="date" class="form-label">Date</label>
                        <input type="date" name="date" class="form-control" id="date" required>
                    </div>
                    <div class="mb-3">
                        <label for="start_time" class="form-label">@lang('global.Start time')</label>
                        <input type="time" name="start_time" class="form-control" id="startTime" required>
                    </div>
                    <div class="mb-3">
                        <label for="end_time" class="form-label">@lang('global.End time')</label>
                        <input type="time" name="end_time" class="form-control" id="endTime" required>
                    </div>
                    <div class="mb-3">
                        <label for="location" class="form-label">@lang('global.Place') </label>
                        <input type="text" name="location" class="form-control" id="location" placeholder="Ex : {{ __('global.Desk') }} "
                            required>
                    </div>
                    {{-- <div class="mb-3">
                        <label for="name" class="form-label">@lang('global.Availability Name') </label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Ex : {{ __('global.House visit') }}"
                            required>
                    </div> --}}
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Ajouter</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                </div>
            </form>
        </div>
    </div>

    <!-- MODAL MODIFICATION -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Modifier la disponibilité</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="editDate" class="form-label">Date</label>
                        <input type="date" class="form-control" id="editDate" value="2025-07-25" required>
                    </div>
                    <div class="mb-3">
                        <label for="editStartTime" class="form-label">Heure de début</label>
                        <input type="time" class="form-control" id="editStartTime" value="09:00" required>
                    </div>
                    <div class="mb-3">
                        <label for="editEndTime" class="form-label">Heure de fin</label>
                        <input type="time" class="form-control" id="editEndTime" value="12:00" required>
                    </div>
                    <div class="mb-3">
                        <label for="editLocation" class="form-label">Lieu</label>
                        <input type="text" class="form-control" id="editLocation" value="Bordeaux Centre" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                </div>
            </form>
        </div>
    </div>

@endsection

@section('scripts')

    <script>
        function marquerCommePrise(btn) {
            const card = btn.closest('.card');
            const badge = card.querySelector('.badge');
            badge.classList.remove('bg-success');
            badge.classList.add('bg-danger');
            badge.innerText = 'Réservée';

            btn.classList.add('disabled');
            btn.innerHTML = '<i class="bi bi-check2-circle"></i> Réservée';
            btn.classList.remove('btn-outline-success');
            btn.classList.add('btn-success');
        }
    </script>


@endsection
