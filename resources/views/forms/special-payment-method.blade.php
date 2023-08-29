@extends('layouts.front.app')

@section('style')
    <style>
        .cost-cell {
            text-align: right;
        }

        .cost-cell span {
            margin-left: 5px;/
        }
    </style>
@endsection

@section('content')
    <form action="{{ route('identitas-siswa') }}" method="GET" class="appointment-form" id="appointment-form">
        @csrf

        <img src="{{ asset('logo-sekolah.png') }}" alt="logo sekolah" width="200">
        <p class="h3 text-dark text-center mb-4 fw-bold">RINCIAN BIAYA KHUSUS</p>


        <p class="text-dark mb-2 mt-1">
            Untuk pembayaran, kami menyediakan 3 sistem pembayaran yang dapat dipilih orang tua calon peserta didik.
        </p>

        <div class="accordion mb-4" id="accordionPanelsStayOpenExample">
            @foreach ($sistembayar as $key => $value)
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#panelsStay{{ $key }}-collapseOne" aria-expanded="true"
                            aria-controls="panelsStay{{ $key }}-collapseOne">
                            {{ $value->skema }}
                        </button>
                    </h2>
                    <div id="panelsStay{{ $key }}-collapseOne" class="accordion-collapse collapse show">
                        <div class="accordion-body">
                           {!! $value->keterangan !!}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <p class="text-dark mt-1 mb-2 fw-bolder">Pembayaran Dapat Dilakukan <strong>1x24jam</strong> setelah menerima nomor VA mulai jam 10.00 WIB.
            Untuk informasi lebih lanjut mengenai pendaftaran online silahkan hubungi kami di 0711-351473.
        </p>


        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-light" href="{{ route('detail-biaya') }}">Kembali</a>
            <button class="btn btn-primary btn-lg" type="submit">Lanjutkan</button>
        </div>
    </form>
@endsection
