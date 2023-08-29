@extends('layouts.front.app')

@section('content')
    <form method="POST" action="{{ route('jenjang-input') }}" class="appointment-form" id="appointment-form">
        @csrf
        <img src="{{ asset('logo-sekolah.png') }}" alt="logo sekolah" width="250">
        <h2>Form Pendaftaran Siswa baru Sekolah Methodist 2</h2>
        <div class="form-group-1">
            <h3>Pilih Jenjang sekolah</h3>
            <div class="select-list">
                <select name="jenjang" class="border-bottom" id="jenjang" onclick="handleJenjangChange()">
                    <option slected value="">--- Pilih jenjang sekolah ---</option>
                    <option value="1">Taman Kanak Kanak (TK)</option>
                    <option value="2">Sekolah Dasar (SD)</option>
                    <option value="3">Sekolah Mengenah Pertama (SMP)</option>
                    <option value="4">Sekolah Menengah Atas (SMA)</option>
                    <option value="smk">Sekolah Menengah Kejuruan (SMK)</option>
                </select>
            </div>
        </div>
        <div id="jurusanContainer" class="select-list"></div>

        <div class="form-submit d-flex justify-content-end">
            <button type="submit" id="submit" class="btn btn-primary">Lanjutkan</button>
        </div>
    </form>
@endsection

@section('script')
    <script>
        function handleJenjangChange() {
            const selectedJenjang = document.getElementById('jenjang');
            const jurusan = document.getElementById('jurusanContainer');
            const value = selectedJenjang.value;

            if (value === 'smk') {
                const jurusanLabel = document.createElement('h3');
                jurusanLabel.textContent = 'Pilih Jurusan Bagi Jenjang SMK';
                jurusan.appendChild(jurusanLabel);

                const jurusanSelect = document.createElement('select');
                jurusanSelect.classList = 'border-bottom'
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
