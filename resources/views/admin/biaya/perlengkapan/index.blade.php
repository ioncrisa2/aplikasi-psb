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
                <div class="table-responsive text-nowrap mb-4">
                    <table class="table" id="myTable">
                        <thead>
                            <tr>
                                <th class="text-start">Item</th>
                                <th class="text-center">Harga</th>
                                <th class="text-center">Jenjang</th>
                                <th class="text-end">Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bmp as $data)
                                <tr>
                                    <td>
                                        <i class="fab fa-bootstrap fa-lg text-primary me-3"></i>
                                        <strong>{{$data->item }}</strong>
                                    </td>
                                    <td class="text-center">Rp. {{ number_format($data->harga) }}</td>
                                    <td class="text-center">
                                        <span class="badge bg-label-dark me-1">
                                            {{ $data->jenjang ? $data->jenjang->nama : 'N/A' }}{{ $data->jenjang ? " {$data->jenjang->jurusan}" : '' }}
                                        </span>
                                    </td>
                                    <td class="text-end">
                                        <div class="btn-group" role="group" aria-label="Default button group">
                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="bx bx-edit-alt me-1"></i> Edit</a>
                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="bx bx-trash me-1"></i>
                                                Delete
                                            </a>
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
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
@endsection
