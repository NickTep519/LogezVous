<div class="col-md-6 col-lg-4">
    <div class="card shadow-sm border-success">
        <div class="card-body position-relative">
            <span class="badge bg-success position-absolute top-0 end-0 m-2">Disponible</span>
            <h5 class="card-title text-primary"> {{ $period->date->translatedFormat('d M Y') }} </h5>
            <p class="card-text">
                <i class="bi bi-clock me-1"></i>  {{ Carbon\Carbon::createFromFormat('H:i:s', $period->start_time)->format('H:i') }} - {{ Carbon\Carbon::createFromFormat('H:i:s', $period->end_time)->format('H:i') }}<br>
                <i class="bi bi-geo-alt me-1"></i> {{ $location }}
            </p>
            <div class="d-flex justify-content-between align-items-center">
                <button class="btn btn-outline-success btn-sm me-2" onclick="marquerCommePrise(this)">
                    <i class="bi bi-check-circle"></i> Marquer comme prise
                </button>
                <div>
                    <button class="btn btn-sm btn-outline-primary me-2" data-bs-toggle="modal"
                        data-bs-target="#editModal">
                        <i class="bi bi-pencil"></i>
                    </button>
                    <button class="btn btn-sm btn-outline-danger">
                        <i class="bi bi-trash"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
