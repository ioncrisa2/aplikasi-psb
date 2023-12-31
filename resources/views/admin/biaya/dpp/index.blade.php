@extends('layouts.admin.app')

@section('content')
    <div class="card h-45">
        <h5 class="card-header d-flex justify-content-between align-items-center">
            Dana Partisipasi Pendidikan
            <a class="btn btn-primary" href="{{ route('dana-pendidikan.create') }}">&plus; Tambah Data</a>
        </h5>
        <div class="container">
            @if (count($dpp) === 0)
                <div class="alert alert-warning" role="alert">
                    Data masih kosong!!
                </div>
            @else
                <div class="mb-3">
                    <label for="jenjangFilter" class="form-label">Filter by Jenjang:</label>
                    <select id="jenjangFilter" class="form-select">
                        <option value="">All</option>
                        <option value="tk">TK</option>
                        <option value="sd">SD</option>
                        <option value="smp">SMP</option>
                        <option value="sma">SMA</option>
                        <option value="smk">SMK</option>
                    </select>
                </div>
                <div class="table-responsive text-nowrap mb-4">
                    <table class="table table-sm table-bordered" id="table">
                        <thead>
                            <tr>
                                <th class="text-center" width="15%">Jenjang</th>
                                <th class="text-center" width="15%">Kriteria</th>
                                <th class="text-center" width="15%">Harga</th>
                                <th class="text-center" width="20%">Diskon</th>
                                <th class="text-center" width="15%">Total</th>
                                <th class="text-center" width="15%">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dpp as $data)
                                <tr>
                                    <td class="text-center">
                                        <span class="badge bg-label-dark me-1">
                                            {{ $data->nama_jenjang }}{{ $data->jurusan ? " : {$data->jurusan}" : '' }}
                                        </span>
                                    </td>
                                    <td class="text-center">{{ $data->nama_kriteria }}</td>
                                    <td class="text-center">Rp. {{ number_format($data->harga) }}</td>
                                    <td class="text-center">{{ $data->diskon }} % + {{ $data->diskon_tambahan }}%</td>
                                    <td>
                                        <i class="fab fa-bootstrap fa-lg text-primary me-3"></i>
                                        @php
                                            $harga = $data->harga;
                                            $diskon1 = $harga - (($data->diskon / 100) * $data->harga);
                                            $diskon2 = $diskon1 - (($data->diskon_tambahan / 100 ) * $diskon1);
                                        @endphp
                                        <strong>Rp. {{ number_format($diskon2) }}</strong>
                                    </td>
                                    <td class="text-end">
                                        <div class="btn-group" role="group" aria-label="Default button group">
                                            <a class="dropdown-item text-primary text-sm"
                                                href="{{ route('dana-pendidikan.edit', ['dpp' => $data->id]) }}"><i
                                                    class="bx bx-edit-alt me-1"></i>
                                            </a>
                                            <form action="{{ route('dana-pendidikan.destroy', ['dpp' => $data->id]) }}"
                                                method="POST">
                                                @csrf @method('DELETE')
                                                <button class="dropdown-item text-danger text-sm" type="submit"
                                                    onclick="return confirm('Apakah yakin ingin menghapus data??')"><i
                                                        class="bx bx-trash me-1"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const table = document.getElementById("table");
            const jenjangFilter = document.getElementById("jenjangFilter");

            const dataTable = new DataTable(table, {
                searching: true,
            });

            jenjangFilter.addEventListener("change", function() {
                const selected = jenjangFilter.value;
                dataTable.column(0).search(selected).draw();
            });
        });
    </script>
@endsection
