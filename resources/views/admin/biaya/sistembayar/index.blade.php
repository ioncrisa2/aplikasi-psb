@extends('layouts.admin.app')

@section('content')
    <div class="card h-45">
        <h5 class="card-header d-flex justify-content-between align-items-center">
            Sistem Pembayaran
            <a class="btn btn-primary" href="{{ route('sistem-bayar.create') }}">&plus; Tambah Data</a>
        </h5>
        <div class="container">
            @if (count($sistembayar) === 0)
                <div class="alert alert-warning" role="alert">
                    Data masih kosong!!
                </div>
            @else
                <div class="table-responsive text-wrap mb-4">
                    <table class="table table-bordered" id="table">
                        <thead>
                            <tr>
                                <th class="text-center" width="20%">Skema</th>
                                <th class="text-center" width="70%">Deskripsi</th>
                                <th class="text-center" width="10%">Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sistembayar as $data)
                                <tr>
                                    <td>
                                        <i class="fab fa-bootstrap fa-lg text-primary me-3"></i>
                                        <strong>{{ $data->skema }}</strong>
                                    </td>
                                    <td>{!! $data->keterangan !!}</td>
                                    <td class="text-end">
                                        <div class="btn-group" role="group" aria-label="Default button group">
                                            <a class="dropdown-item text-primary"
                                                href="{{ route('sistem-bayar.edit', ['sistembayar' => $data->sistembayar_id]) }}"><i
                                                    class="bx bx-edit-alt me-1"></i> Edit
                                            </a>
                                            <form action="{{ route('sistem-bayar.destroy', ['sistembayar' => $data->sistembayar_id]) }}"
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

            const dataTable = new DataTable(table, {
                searching: true
            });

        });
    </script>
@endsection
