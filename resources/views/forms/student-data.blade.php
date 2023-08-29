@extends('layouts.front.app')

@section('content')
    <form action="{{ route('upload-rapot') }}" method="GET" class="appointment-form" id="appointment-form">
        @csrf
        <img src="{{ asset('logo-sekolah.png') }}" alt="logo sekolah" width="200">
        <h2 class="text-center">Informasi Lengkap Siswa</h2>

        <div class="form-group-1">
            <label for="nama" class="text-dark">Nama Lengkap Sesuai Ijasah</label>
            <input type="text" name="nama" id="nama" />

            <label for="jenis_kelamin" class="text-dark">Jenis Kelamin</label>
            <div class="select-list" style="margin: 0">
                <select name="form-select" name="jenis_kelamin" id="jenis_kelamin">
                    <option selected value="">---Pilih Jenis Kelamin---</option>
                    <option value="laki-laki">laki-laki</option>
                    <option value="perempuan">Perempuan</option>
                </select>
            </div>

            <label for="kebutuhan_khusus" class="text-dark">Berkebutuhan Khusus</label>
            <div class="select-list" style="margin: 0">
                <select name="form-select" name="kebutuhan_khusus" id="kebutuhan_khusus">
                    <option selected value="">---Apakah Peserta Calon Didik Berkebutuhan Khusus---</option>
                    <option value="laki-laki">laki-laki</option>
                    <option value="perempuan">Perempuan</option>
                </select>
            </div>

            <label for="tempat_lahir" class="text-dark">Jenis Kelamin</label>
            <input type="text" name="tempat_lahir" id="tempat_lahir" />

            <label for="tanggal_lahir" class="text-dark">Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" id="tanggal_lahir/>

            <label for="nama_sekolah" class="text-dark">Nama Sekolah Terdahulu</label>
            <input type="text" name="nama_sekolah" id="nama_sekolah"/>

            <label for="alamat_sekolah" class="text-dark">Alamat Sekolah</label>
            <textarea name="alamat_sekolah" class="form-control border-bottom" id="alamat_sekolah"></textarea>

            <label for="no_tlp_sekolah" class="text-dark mt-4">Nomor Telepon Sekolah</label>
            <input type="text" name="no_tlp_sekolah" id="no_tlp_sekolah" />

            <label for="nama_orangtua" class="text-dark">Nama Orang Tua</label>
            <input type="text" name="nama_orangtua" id="nama_orangtua" />

            <label for="tlp_orangtua" class="text-dark">Nomor Telepon Orang Tua</label>
            <p class="text-dark text-sm">Pastikan Nomor yang anda sertakan tersambung ke aplikasi Whastapp</p>
            <input type="text" name="tlp_orangtua" id="tlp_orangtua" />

            <label for="alamat_rumah" class="text-dark">Alamat Lengkap Rumah</label>
            <textarea name="alamat_rumah" class="form-control border-bottom" id="alamat_rumah"></textarea>

            <label for="alamat_rumah" class="text-dark mt-4">Lampiran Akta Kelahiran dan Kartu Keluarga</label>
            <p class="text-dark fw-bolder">"Silahkan lampirkan akta kelahiran dan kartu keluarga calon peserta didik dalam 1 file
                dengan format PDF/DOC/DOCX. dengan ukuran maksimal 10mb"
            </p>
            <input type="file" name="akta_kk" id="akta_kk" />

            <label for="kriteria" class="text-dark">Pilih salah satu kriteria peserta didik</label>
            <div class="select-list" style="margin: 0">
                <select name="form-select" name="kriteria" id="kriteria">
                    <option selected value="">---Kriteria Peserta Didik---</option>
                    <option value="laki-laki">laki-laki</option>
                    <option value="perempuan">Perempuan</option>
                </select>
            </div>

        </div>

        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-5">
            <a class="btn btn-light" href="/">Kembali</a>
            <button class="btn btn-primary" type="submit">Lanjutkan</button>
        </div>
    </form>
@endsection
