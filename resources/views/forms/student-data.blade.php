@extends('layouts.front.app')

@section('content')
    <div class="row justify-content-center align-items-center w-auto h-auto mb-5">
        <div class="col-lg-8 col-md-10 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-header">
                    <h3>Mengisi Data Calon Siswa</h3>
                </div>
                <div class="card-body">
                    <div class="mt-4">
                        <form action="{{ route('upload-rapot') }}" method="GET">
                            @csrf

                            <div class="mb-3 row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">
                                    Nama Lengkap Siswa (Sesuai Ijasah)
                                </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control form-control-lg" id="staticEmail"
                                        value="email@example.com" />
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="mb-3">
                                        <h5 for="jenis kelamin">Jenis Kelamin</h5>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Laki-laki
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                id="flexRadioDefault2" checked>
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                Perempuan
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="mb-3">
                                        <h5 for="jenis kelamin">Apakah Calon Peserta Didik Berkebutuhan Khusus?</h5>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Ya
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input selected" type="radio" name="flexRadioDefault"
                                                id="flexRadioDefault2" checked>
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                Tidak
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">
                                    Tempat Lahir
                                </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control form-control-lg" id="staticEmail"
                                        placeholder="Tempat lahir" />
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">
                                    Tanggal Lahir
                                </label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control form-control-lg" id="staticEmail" />
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">
                                    Asal Sekolah
                                </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control form-control-lg" id="staticEmail"
                                        placeholder="Nama Sekolah" />
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">
                                    Alamat Sekolah
                                </label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" placeholder="Alamat Lengkap Sekolah" id="floatingTextarea2" style="height: 80px"></textarea>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">
                                    Nomor Telepon Sekolah
                                </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control form-control-lg" id="staticEmail" />
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">
                                    Nama Ibu Kandung
                                </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control form-control-lg" id="staticEmail" />
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">
                                    Nama Ayah Kandung
                                </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control form-control-lg" id="staticEmail" />
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">
                                    Nama Ibu Kandung
                                </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control form-control-lg" id="staticEmail" />
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">
                                    Nomor Telepon Ayah
                                </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control form-control-lg" id="staticEmail" />
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">
                                    Nomor Telepon Ibu
                                </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control form-control-lg" id="staticEmail" />
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">
                                    Alamat Lengkap Rumah
                                </label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" placeholder="Alamat Lengkap Sekolah" id="floatingTextarea2" style="height: 80px"></textarea>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="staticEmail" class="form-label">
                                    Lampiran Akta Kelahiran dan Kartu Keluarga
                                </label><br>
                                <span>Silahkan lampirkan akta kelahiran dan kartu keluarga calon peserta didik dalam 1 file
                                    dengan format PDF/DOC/DOCX. dengan ukuran maksimal 10mb.</span>
                                <input class="form-control" type="file" id="formFile">
                            </div>

                            <div class="mb-3 mt-3">
                                <label for="kriteria">Pilih salah satu kriteria peserta didik</label>
                                @for ($i = 1; $i <= 4; $i++)
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault"
                                            id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Merupakan Ranking 1 - 10 saat kelas 3 SMP number {{ $i }}
                                        </label>
                                    </div>
                                @endfor

                            </div>

                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <a class="btn btn-secondary btn-lg" href="/">Kembali</a>
                                <button class="btn btn-primary btn-lg" type="submit">Lanjutkan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
