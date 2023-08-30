@extends('layouts.front.app')

@section('content')
    <form action="{{ route('identitas-siswa') }}" method="POST" class="appointment-form" id="appointment-form">
        @csrf

        <img src="{{ asset('logo-sekolah.png') }}" alt="logo sekolah" width="200">
        <p class="h3 text-dark text-center mb-4 fw-bold">Pendaftaran Berhasil</p>


        <p class="text-dark text-center mb-2 mt-1">
           Terima kasih telah mendaftar ke Sekolah Methodist 2, mohon tunggu konfirmasi dari Admin terkait mengenai informasi lanjutan
        </p>
        <div class="text-center pt-5 m-0">
            <button type="submit" class="btn-link">Kembali ke halaman depan</button>
        </div>

    </form>
@endsection
