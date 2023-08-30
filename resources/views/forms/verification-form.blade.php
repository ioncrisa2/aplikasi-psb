@extends('layouts.front.app')

@section('content')
    <form action="{{ route('done') }}" method="GET" class="appointment-form" id="appointment-form">
        <img src="{{ asset('logo-sekolah.png') }}" alt="logo sekolah" width="200">
        <p class="h3 text-dark text-center mb-4 fw-bold">Verifikasi Pengisian Formulir</p>


        <p class="text-dark mb-2 mt-1">
            Saya menyatakan bahwa data yang telah diisi pada formulir ini dapat dipertanggung jawabkan kebenarannya dan keasliannya. Jika ada data yang tidak sesuai dengan fakta, Sekolah Methodist 2 Palembang berhak untuk mengubah keputusan.
        </p>

        <p class="text-dark mt-1 mb-2">
            Dalam waktu 2x24 jam kerja, Bapak/Ibu akan menerima pesan Whatsapp dari Admin yang berisi verifikasi penerimaan siswa baru Sekolah Methodist 2 Palembang.
        </p>

        <div class="d-grid gap-2 d-md-flex align-items-center justify-content-md-end">
            <a class="btn btn-danger" href="/">Batal</a>
            <button class="btn btn-primary" type="submit">Konfirmasi</button>
        </div>
    </form>
@endsection
