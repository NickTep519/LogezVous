@extends('dashboard.base')

@section('title', config('app.name') . ' | ' . __('global.My Calendar'))

@section('content')

    <div class="col-lg-9 col-md-12">
        <div class="dashboard-wraper">

            <div class="form-submit">
                <h4> @lang('global.My Calendar') </h4>
            </div>
            <div class="p-4 bg-white rounded shadow">
                <div id="calendar"></div>

            </div>
            <div class="mb-3">
                <h5 class="mb-2">@lang('global.Legend') : </h5>
                <div class="d-flex align-items-center gap-3 flex-wrap">
                    <div class="d-flex align-items-center">
                        <span class="rounded-circle me-2"
                            style="width: 15px; height: 15px; background-color: #2876a7ff;"></span>
                        <span> @lang('global.Upcoming appointments') </span>
                    </div>
                    <div class="d-flex align-items-center">
                        <span class="rounded-circle me-2"
                            style="width: 15px; height: 15px; background-color: #d9534f;"></span>
                        <span>@lang('global.Past appointment')</span>
                    </div>
                    <div class="d-flex align-items-center">
                        <span class="rounded-circle me-2"
                            style="width: 15px; height: 15px; background-color: #f0ad4e;"></span>
                        <span>@lang('global.Waiting for confirmation')</span>
                    </div>
                </div>
            </div>

        </div>
    </div>


@endsection

@section('scripts')

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                locale: '{{ App::getLocale() }}',
                buttonText: {
                    today: '{{ __('global.Today') }}',
                    month: '{{ __('global.Month') }}',
                    week: '{{ __('global.Week') }}',
                    day: '{{ __('global.Day') }}',
                    list: '{{ __('global.List') }}',
                },
                initialView: 'timeGridWeek',
                selectable: true,
                editable: false,
                events: '/dashboard/agent/appointments',
                select: function(info) {
                    if (confirm("Créer un créneau du " + info.startStr + " au " + info.endStr + " ?")) {
                        fetch('/api/appointments', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                },
                                body: JSON.stringify({
                                    start: info.startStr,
                                    end: info.endStr
                                })
                            }).then(response => response.json())
                            .then(data => {
                                calendar.refetchEvents();
                                alert("Créneau ajouté !");
                            });
                    }
                }
            });

            calendar.render();
        });
    </script>

@endsection
