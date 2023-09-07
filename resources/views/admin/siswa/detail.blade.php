@extends('layouts.admin.app')

@section('content')
    <div class="container">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane"
                    type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Profile Siswa</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane"
                    type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Generasi Virtual
                    Account</button>
            </li>
        </ul>
        <div class="tab-content p-0" id="myTabContent">
            <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab"
                tabindex="0">
                <div class="row">
                    <div class="col-lg-12 col-md-8 col-sm-12 col-xs-12">
                        <div class="card mb-4">
                            <h5 class="card-header d-flex justify-content-between align-items-center">
                                <div class="d-flex justify-content-start align-items-center">
                                    <a class="btn btn-light mr-2" href="{{ route('siswa') }}"><strong>&#8592;</strong></a>
                                    <div>Data Pendaftaran Peserta didik <strong>{{ $data->nama_lengkap }}</strong></div>
                                </div>
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end align-items-center">
                                    <a class="btn btn-dark" href="{{ route('siswa.print') }}" target="_blank"> Print
                                        <i class='bx bxs-printer'></i>
                                    </a>
                                </div>
                            </h5>
                            <div class="card-body">
                                <table class="table table-borderless">
                                    <tbody class="text-dark">
                                        <tr class="align-bottom">
                                            <td width="20%">Nama Lengkap siswa</td>
                                            <td widht="5%" class="text-end">:</td>
                                            <td widht="75%" class="text-start">{{ $data->nama_lengkap }}</td>
                                        </tr>
                                        <tr class="align-bottom">
                                            <td width="20%">Tempat Tanggal Lahir</td>
                                            <td widht="5%" class="text-end">:</td>
                                            <td widht="75%" class="text-start">{{ $data->tempat_lahir }} /
                                                {{ $data->tanggal_lahir }}</td>
                                        </tr>
                                        <tr class="align-bottom">
                                            <td width="20%">Jenis Kelamin</td>
                                            <td widht="5%" class="text-end">:</td>
                                            <td widht="75%" class="text-start">
                                                @if ($data->jenis_kelamin == 'Laki-laki')
                                                    <span class="badge bg-primary">{{ $data->jenis_kelamin }}</span>
                                                @else
                                                    <span class="badge bg-secondary">{{ $data->jenis_kelamin }}</span>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr class="align-bottom">
                                            <td width="20%">Kebutuhan Khusus</td>
                                            <td widht="5%" class="text-end">:</td>
                                            <td widht="75%" class="text-start">
                                                {!! $data->kebutuhan_khusus
                                                    ? '<span class="badge bg-secondary">Ya</span>'
                                                    : '<span class="badge bg-secondary">Tidak</span>' !!}
                                            </td>
                                        </tr>
                                        <tr class="align-bottom">
                                            <td width="20%">Alamat Rumah</td>
                                            <td widht="5%" class="text-end">:</td>
                                            <td widht="75%" class="text-start">
                                                {{ $data->alamat_rumah }}
                                            </td>
                                        </tr>
                                        <tr class="align-bottom">
                                            <td width="20%">Asal Sekolah</td>
                                            <td widht="5%" class="text-end">:</td>
                                            <td widht="75%" class="text-start">
                                                {{ $data->asal_sekolah }}
                                            </td>
                                        </tr>
                                        <tr class="align-bottom">
                                            <td width="20%">Alamat Sekolah</td>
                                            <td widht="5%" class="text-end">:</td>
                                            <td widht="75%" class="text-start">
                                                {{ $data->alamat_sekolah }}
                                            </td>
                                        </tr>
                                        </tr>
                                        <tr class="align-bottom">
                                            <td width="20%">Telepon Sekolah</td>
                                            <td widht="5%" class="text-end">:</td>
                                            <td widht="75%" class="text-start">
                                                {{ $data->telepon_sekolah }}
                                            </td>
                                        </tr>
                                        <tr class="align-bottom">
                                            <td width="20%">Nama Orangtua</td>
                                            <td widht="5%" class="text-end">:</td>
                                            <td widht="75%" class="text-start">
                                                {{ $data->nama_orangtua }}
                                            </td>
                                        </tr>
                                        <tr class="align-bottom">
                                            <td width="20%">No Telepon Orang Tua (WA)</td>
                                            <td widht="5%" class="text-end">:</td>
                                            <td widht="75%" class="text-start">
                                                {{ $data->telepon_orangtua }}</td>
                                        </tr>
                                        <tr class="align-bottom">
                                            <td width="20%">Total Biaya Masuk</td>
                                            <td widht="5%" class="text-end">:</td>
                                            <td widht="75%" class="text-start">
                                                Rp. {{ number_format($data->totalBiaya->total) }}
                                            </td>
                                        </tr>
                                        <tr class="align-bottom">
                                            <td width="20%">Pilihan Sistem Bayar</td>
                                            <td widht="5%" class="text-end">:</td>
                                            <td widht="75%" class="text-start">
                                                {{ $data->sistemBayar->skema }}
                                            </td>
                                        </tr>
                                        <tr class="align-bottom">
                                            <td width="20%">Tanggal Pendaftaran</td>
                                            <td widht="5%" class="text-end">:</td>
                                            <td widht="75%" class="text-start">
                                                {{ $data->created_at }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <table class="table table-borderless mt-3 mb-3">
                                    <thead>
                                        <tr class="text-center">
                                            <th>Berkas KK</th>
                                            <th>Rapot</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        <tr>
                                            <td>
                                                <iframe src="{{ asset("berkas/{$data->berkas_kk}") }}"
                                                    frameborder="0"></iframe>
                                            </td>
                                            <td>
                                                <iframe src="{{ asset("rapot/{$data->rapot}") }}"
                                                    frameborder="0"></iframe>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab"
                tabindex="0">
                <div class="row">
                    <div class="col-lg-12 col-md-8 col-sm-12 col-xs-12">
                        <div class="card mb-4">
                            <h5 class="card-header d-flex justify-content-between align-items-center">
                                <div class="d-flex justify-content-start align-items-center">
                                    <a class="btn btn-light mr-2"
                                        href="{{ route('siswa') }}"><strong>&#8592;</strong></a>
                                    <div>Daftar Virtual Account Siswa {{ $data->nama_lengkap }}</div>
                                </div>
                            </h5>

                            @if (!$data->virtualAccount)
                                <div class="mx-auto p-2">
                                    <h4>Belum ada Virtual Account yang di generasi</h4>
                                </div>
                            @else
                                <div class="card-body">
                                    <table class="table table-bordered table-sm">
                                        <thead>
                                            <tr>
                                                <th width="10%">No</th>
                                                <th width="90%" colspan="2">Nomor VA</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data->virtualAccount as $key => $value)
                                                <tr>
                                                    <td width="5%">{{ $loop->iteration }}</td>
                                                    <td width="70%">{{ $value->number }}</td>
                                                    <td width="25%" style="cursor: pointer" onclick="copyToClipboard('{{ $value->number }}')"><i class='bx bx-copy'></i> Copy to Clipboard</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

@section('script')
    <script>
        function copyToClipboard(txt) {
            navigator.clipboard.writeText(txt);
            alert('Virtual Account is Copied');
        }
    </script>
@endsection
