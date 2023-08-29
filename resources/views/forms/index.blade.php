@extends('layouts.front.app')

@section('content')
    <form method="POST" action="{{ route('jenjang-input') }}" class="appointment-form" id="appointment-form">
        @csrf
        <img src="{{ asset('logo-sekolah.png') }}" alt="logo sekolah" width="250">
        <h2>Form Pendaftaran Siswa baru Sekolah Methodist 2</h2>
        <div class="form-group-1">
            <h3>Pilih Jenjang sekolah</h3>
            <div class="select-list">
                <select name="jenjang" class="form-select custom-select" id="jenjang">
                    <option slected value="">--- Pilih jenjang sekolah ---</option>
                    <option value="1">Taman Kanak Kanak (TK)</option>
                    <option value="2">Sekolah Dasar (SD)</option>
                    <option value="3">Sekolah Mengenah Pertama (SMP)</option>
                    <option value="4">Sekolah Menengah Atas (SMA)</option>
                    <option value="5">Sekolah Menengah Kejuruan (SMK) - Teknik Komputer Jaringan (TKJ)</option>
                    <option value="6">Sekolah Menengah Kejuruan (SMK) - Bisnis Digital (BD)</option>
                </select>
            </div>
        </div>

        <div class="form-submit d-flex justify-content-end">
            <button type="submit" id="submit" class="btn btn-primary">Lanjutkan</button>
        </div>
    </form>
@endsection
