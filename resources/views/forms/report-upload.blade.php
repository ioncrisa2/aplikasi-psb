@extends('layouts.front.app')

@section('content')
    <form action="{{ route('upload-rapot.upload') }}" method="POST" class="appointment-form" id="appointment-form" enctype="multipart/form-data">
        @csrf
        <img src="{{ asset('logo-sekolah.png') }}" alt="logo sekolah" width="200">
        <h2 class="text-center">Verifikasi Khusus - Upload Rapor Terakhir</h2>
        <div class="mb-4">
            <p class="mt-3 mb-3 text-dark fw-bolder m-0">Mohon Lampirkan Halaman Raport SMP milik Calon Peserta Didik yang terakhir diterima dari
                Sekolah selengkap-lengkapnya (tanpa Cover) dalam 1 file dengan format PDF/DOC/DOCX dan ukuran maksimal 10mb.
                Mohon untuk memperhatikan kualitas dokumen yang dikirim sehingga kami dapat memverifikasi dengan
                mudah</p>
            <input class="border-bottom-2 @error('rapot') is-invalid @endif" type="file" id="rapot" name="rapot"/>
            @error('rapot')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>


        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button class="btn btn-primary" type="submit">Lanjutkan</button>
        </div>
    </form>
@endsection
