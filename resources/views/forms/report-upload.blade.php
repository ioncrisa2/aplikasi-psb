@extends('layouts.front.app')

@section('content')
    <form action="{{ route('detail-biaya') }}" method="GET" class="appointment-form" id="appointment-form">
        @csrf
        <img src="{{ asset('logo-sekolah.png') }}" alt="logo sekolah" width="200">
        <h2 class="text-center">Verifikasi Khusus - Upload Rapor Terakhir</h2>
        <div class="mb-4">
            <p class="mt-3 mb-3 text-dark fw-bolder">Mohon Lampirkan Halaman Raport SMP milik Calon Peserta Didik yang terakhir diterima dari
                Sekolah selengkap-lengkapnya (tanpa Cover) dalam 1 file dengan format PDF/DOC/DOCX dan ukuran maksimal 10mb.
                Mohon untuk memperhatikan kualitas dokumen yang dikirim sehingga kami dapat memverifikasi dengan
                mudah</p>
            <input class="form-control" type="file" id="formFile">
        </div>


        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-light" href="{{ route('identitas-siswa') }}">Kembali</a>
            <button class="btn btn-primary" type="submit">Lanjutkan</button>
        </div>
    </form>
@endsection
