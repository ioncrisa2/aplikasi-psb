@props(['title', 'detail', 'item', 'icon'])

<div class="col-lg-6 col-md-12 col-6 mb-4">
    <div class="card">
        <div class="card-body">
            <div class="card-title d-flex align-items-start justify-content-between">
                <div class="avatar flex-shrink-0">
                    <img src="{{ $icon }}" alt="chart success" class="rounded" />
                </div>
                <div class="dropdown">
                    <button class="btn p-0" type="button" id="cardOpt3" data-bs-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                        <a class="dropdown-item" href="{{ route($detail) }}">Lihat Detail</a>
                    </div>
                </div>
            </div>
            <span class="fw-semibold d-block mb-1">{{ $title }}</span>
            <h3 class="card-title mb-2">{{ $item }}</h3>
        </div>

    </div>
</div>
