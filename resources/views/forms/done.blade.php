@extends('layouts.front.app')

@section('content')
    <form class="appointment-form" id="appointment-form" method="POST" action="{{ route('done.done') }}">
        @csrf
        <img src="{{ asset('logo-sekolah.png') }}" alt="logo sekolah" width="200">
        <p class="h3 text-dark text-center mb-4 fw-bold">Pendaftaran Berhasil</p>


        <p class="text-dark text-center mb-2 mt-1">
           Terima kasih telah mendaftar ke Sekolah Methodist 2, mohon tunggu konfirmasi dari Admin terkait mengenai informasi lanjutan
        </p>
        <div class="text-center pt-5 m-0">
            <button class="btn btn-link" type="submit">Kembali ke halaman depan</button>
        </div>

    </form>
@endsection
