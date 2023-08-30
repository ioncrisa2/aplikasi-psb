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
                        <table class="table table-sm table-bordered" id="table">
                            <thead>
                                <tr>
                                    <th class="text-center" width="20%">Nama Siswa</th>
                                    <th class="text-center" width="20%">Jenjang - Jurusan</th>
                                    <th class="text-center" width="20%">Sekolah Asal</th>
                                    <th class="text-center" width="20%">Gender</th>
                                    <th class="text-center" width="20%">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($siswa as $key => $value)
                                    <tr>
                                        <td class="text-center">{{ $value->nama }}</td>
                                        <td class="text-center">{{ $value->nama_jenjang }} {{ $value->jurusan ? ' - '.$value->jurusan : '' }}</td>
                                        <td class="text-center">{{ $value->asal_sekolah }}</td>
                                        <td class="text-center">{{ $value->gender }}</td>
                                        <td></td>
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

            const dataTable = new DataTable(table, {
                searching: true
            });

            jenjangFilter.addEventListener("change", function() {
                const selected = jenjangFilter.value;
                dataTable.column(0).search(selected).draw();
            });
        });
    </script>
@endsection

