@extends('layouts.front.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center align-items-center w-auto h-auto">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> <!-- Adjust the column width as needed -->
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <h1>Form Pendaftaran Siswa Baru Sekolah Methodist 2 Palembang</h1>
                        <hr class="border border-dark border-3">
                        <blockquote class="blockquote">
                            <p>Pastikan email yang Bapak/Ibu gunakan masih aktif dan dapat di akses. Setelah mengisi form
                                ini,
                                maka secara automatis Bapak/Ibu akan menerima email yang berisi file formulir yang sudah
                                Bapak/Ibu isi. Email yang telah diterima boleh disimpan sebagai bukti bahwa Bapak/Ibu telah
                                mengisi Formulir ini. Terima Kasih.
                            </p>
                        </blockquote>
                    </div>
                </div>
            </div>
            <form action="{{ route('jenjang-input') }}" method="POST">
                @csrf
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mb-3">
                    <div class="card">
                        <div class="card-header" style="background-color: inherit; border: none;">
                            <h3>Pilih Jenjang Siswa</h3>
                        </div>
                        <div class="card-body">

                            <div class="mb-3 row d-flex align-items-center">
                                <div class="col-sm-12">
                                    <div class="mt-4 mb-3">
                                        <select class="form-select form-select-lg" id="jenjang"
                                            onchange="handleJenjangChange()" aria-label="Jenjang Sekolah" name="jenjang">
                                            <option selected>Pilih jenjang siswa</option>
                                            <option value="tk">TK</option>
                                            <option value="sd">SD</option>
                                            <option value="smp">SMP</option>
                                            <option value="sma">SMA</option>
                                            <option value="smk">SMK</option>
                                        </select>
                                    </div>
                                    <div class="mt-4 mb-3" id="jurusanContainer">

                                    </div>
                                </div>
                            </div>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button class="btn btn-primary btn-lg" type="submit">Lanjutkan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection

@section('script')
    <script>
        function handleJenjangChange() {
            const selectedJenjang = document.getElementById('jenjang');
            const jurusan = document.getElementById('jurusanContainer');
            const value = selectedJenjang.value;


            if (value === 'smk') {
                const jurusanLabel = document.createElement('label');
                jurusanLabel.textContent = 'Pilih Jurusan Bagi Jenjang SMK';
                jurusanLabel.setAttribute('for', 'jurusan smk');
                jurusan.appendChild(jurusanLabel);

                const jurusanSelect = document.createElement('select');
                jurusanSelect.className = 'form-select form-select-lg';
                jurusanSelect.setAttribute('aria-label', 'Pilih jurusan untuk smk');
                jurusanSelect.setAttribute('name', 'jurusan');
                jurusanSelect.innerHTML = `
                <option selected>Pilih Jurusan SMK</option>
                <option value="tkj">Teknik Komputer Jaringan (TKJ)</option>
                <option value="bd">Bisnis Digital (BD)</option>
            `;
                jurusan.appendChild(jurusanSelect);
            }
        }
    </script>
@endsection
