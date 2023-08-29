@extends('layouts.admin.app')

@section('content')
    <div class="card h-45">
        <h5 class="card-header d-flex justify-content-between align-items-center">
            Biaya Perlengkapan
            <a class="btn btn-primary" href="{{ route('perlengkapan.create') }}">&plus; Tambah Data</a>
        </h5>
        <div class="container">
            @if (count($bmp) === 0)
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
                    <table class="table table-bordered" id="table">
                        <thead>
                            <tr>
                                <th class="text-start" width="60%">Item</th>
                                <th class="text-center" width="25%">Harga</th>
                                <th class="text-center" width="30%">Jenjang</th>
                                <th class="text-center" width="5%">Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bmp as $data)
                                <tr>
                                    <td>
                                        <i class="fab fa-bootstrap fa-lg text-primary me-3"></i>
                                        <strong>{{ $data->item }}</strong>
                                    </td>
                                    <td class="text-center">Rp. {{ number_format($data->harga) }}</td>
                                    <td class="text-center">
                                        <span class="badge bg-label-dark me-1">
                                            {{ $data->jenjang->nama }}{{ $data->jenjang ? " {$data->jenjang->jurusan}" : '' }}
                                        </span>
                                    </td>
                                    <td class="text-end">
                                        <div class="btn-group" role="group" aria-label="Default button group">
                                            <a class="dropdown-item text-primary"
                                                href="{{ route('perlengkapan.edit', ['bmp' => $data->id]) }}"><i
                                                    class="bx bx-edit-alt me-1"></i> Edit
                                            </a>
                                            <form action="{{ route('perlengkapan.destroy', ['bmp' => $data->id]) }}"
                                                method="POST">
                                                @csrf @method('DELETE')
                                                <button class="dropdown-item text-danger" type="submit"
                                                    onclick="return confirm('Apakah yakin ingin menghapus data??')"><i
                                                        class="bx bx-trash me-1"></i>
                                                    Delete
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

            const dataTable = new DataTable(table,{
                searching: true
            });

            jenjangFilter.addEventListener("change",function(){
                const selected = jenjangFilter.value;
                dataTable.column(2).search(selected).draw();
            });
        });
    </script>
@endsection
