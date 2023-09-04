@extends('layouts.admin.app')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card h-45">
                <div class="card-header">
                    Data Siswa yang terdaftar
                </div>
                <div class="container">
                    <div class="table-responsive text-nowrap mb-4">
                        <table class="table table-lg table-bordered" id="table">
                            <thead>
                                <tr>
                                    <th class="text-center">Nama Siswa</th>
                                    <th class="text-center">Sekolah Asal</th>
                                    <th class="text-center">Gender</th>
                                    <th class="text-center">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($siswa as $key => $value)
                                    <tr>
                                        <td class="text-center">{{ $value->nama_lengkap }}</td>
                                        <td class="text-center">{{ $value->asal_sekolah }}</td>
                                        <td class="text-center">{{ $value->jenis_kelamin }}</td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <a href="{{route('siswa.detail',['siswa' => $value->id])}}" class="btn btn-link">Detail</a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const table = document.getElementById("table");
            const jenjangFilter = document.getElementById("jenjangFilter");

            const dataTable = new DataTable(document.getElementById("table"), {
                searching: true
            });

            jenjangFilter.addEventListener("change", function() {
                const selected = jenjangFilter.value;
                dataTable.column(0).search(selected).draw();
            });
        });
    </script>
@endsection

