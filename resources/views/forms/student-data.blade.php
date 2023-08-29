@extends('layouts.front.app')

@section('content')
    <form action="{{ route('identitas-siswa.upload') }}" method="POST" class="appointment-form" id="appointment-form"
        enctype="multipart/form-data">
        @csrf
        <img src="{{ asset('logo-sekolah.png') }}" alt="logo sekolah" width="200">

        <h2 class="text-center">Informasi Lengkap Siswa</h2>

        <div class="form-group-1">
            <label for="email" class="text-dark">Alamat Email</label>
            <input type="text" class="form-control @error('email') is-invalid @enderror p-0 m-0" name="email"
                id="email" />
            @error('email')
                <div class="invalid-feedback" style="display: block">
                    {{ $message }}
                </div>
            @enderror

            <label for="nama_lengkap" class="text-dark">Nama Lengkap Sesuai Ijasah</label>
            <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" name="nama_lengkap" id="nama" />
            @error('nama_lengkap')
                <div class="invalid-feedback" style="display: block">
                    {{ $message }}
                </div>
            @enderror

            <label for="jenis_kelamin" class="text-dark">Jenis Kelamin</label>
            <div class="select-list" style="margin: 0">
                <select class="form-select custom-select" name="jenis_kelamin" id="jenis_kelamin">
                    <option selected value="">---Pilih Jenis Kelamin---</option>
                    <option value="laki-laki">laki-laki</option>
                    <option value="perempuan">Perempuan</option>
                </select>
            </div>

            <label for="kebutuhan_khusus" class="text-dark">Berkebutuhan Khusus</label>
            <div class="select-list" style="margin: 0">
                <select class="form-select custom-select" name="kebutuhan_khusus" id="kebutuhan_khusus">
                    <option selected value="">---Apakah Peserta Calon Didik Berkebutuhan Khusus---</option>
                    <option value="1">Ya</option>
                    <option value="0">Tidak</option>
                </select>
            </div>

            <label for="tempat_lahir" class="text-dark">Tempat Lahir</label>
            <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir" id="tempat_lahir" />
            @error('tempat_lahir')
                <div class="invalid-feedback" style="display: block">
                    {{ $message }}
                </div>
            @enderror

            <label for="tanggal_lahir" class="text-dark">Tanggal Lahir</label>
            <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir" id="tanggal_lahir" />
            @error('tanggal_lahir')
                <div class="invalid-feedback" style="display: block">
                    {{ $message }}
                </div>
            @enderror

            <label for="nama_sekolah" class="text-dark">Asal Sekolah</label>
            <input type="text" class="form-control @error('nama_ekolah') is-invalid @enderror" name="nama_sekolah" id="nama_sekolah" />
            @error('nama_sekolah')
                <div class="invalid-feedback" style="display: block">
                    {{ $message }}
                </div>
            @enderror

            <label for="alamat_sekolah" class="text-dark">Alamat Sekolah</label>
            <textarea name="alamat_sekolah" class="form-control custom-textarea @error('alamat_sekolah') is-invalid @enderror" id="alamat_sekolah"></textarea>
            @error('alamat_sekolaj')
                <div class="invalid-feedback" style="display: block">
                    {{ $message }}
                </div>
            @enderror

            <label for="no_tlp_sekolah" class="text-dark mt-4">Nomor Telepon Sekolah</label>
            <input type="text" class="form-control @error('no_tlp_sekolah') is-invalid @enderror" name="no_tlp_sekolah" id="no_tlp_sekolah" />
            @error('no_tlp_sekolah')
                <div class="invalid-feedback" style="display: block">
                    {{ $message }}
                </div>
            @enderror

            <label for="nama_orangtua" class="text-dark">Nama Orang Tua</label>
            <input type="text" class="form-control @error('nama_orangtua') is-invalid @enderror" name="nama_orangtua" id="nama_orangtua" />
            @error('nama_orangtua')
                <div class="invalid-feedback" style="display: block">
                    {{ $message }}
                </div>
            @enderror

            <label for="tlp_orangtua" class="text-dark">Nomor Telepon Orang Tua</label>
            <p class="text-dark text-sm fw-bolder">Pastikan Nomor yang anda sertakan tersambung ke aplikasi Whastapp</p>
            <input type="text" class="form-control @error('tlp_orangtua') is-invalid @enderror" name="tlp_orangtua" id="tlp_orangtua" />
            @error('tlp_orangtua')
                <div class="invalid-feedback" style="display: block">
                    {{ $message }}
                </div>
            @enderror

            <label for="alamat_rumah" class="text-dark">Alamat Lengkap Orang Tua</label>
            <textarea name="alamat_rumah" class="form-control custom-textarea @error('alamat_rumah') is-invalid @enderror" id="alamat_rumah"></textarea>
            @error('alamat_rumah')
                <div class="invalid-feedback" style="display: block">
                    {{ $message }}
                </div>
            @enderror

            <label for="alamat_rumah" class="text-dark mt-4">Lampiran Akta Kelahiran dan Kartu Keluarga</label>
            <p class="text-dark fw-bolder">"Silahkan lampirkan akta kelahiran dan kartu keluarga calon peserta didik dalam 1
                file
                dengan format PDF/DOC/DOCX. dengan ukuran maksimal 10mb"
            </p>
            <input type="file" name="akta_kk" id="akta_kk" class="@error('akta_kk') is-invalid @enderror"/>
            @error('akta_kk')
                <div class="invalid-feedback" style="display: block">
                    {{ $message }}
                </div>
            @enderror

            <label for="kriteria" class="text-dark">Pilih salah satu kriteria peserta didik</label>
            <div class="select-list" style="margin: 0">
                <select class="form-select custom-select" name="kriteria" id="kriteria">
                    <option selected value="">---Kriteria Peserta Didik---</option>
                    <option value="1">Berasal dari Sekolah Methodist 2</option>
                    <option value="2">Luar Sekolah Methodist 2</option>
                </select>
            </div>

        </div>

        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-5">
            <a class="btn btn-light" href="/">Kembali</a>
            <button class="btn btn-primary" type="submit">Lanjutkan</button>
        </div>
    </form>
@endsection
