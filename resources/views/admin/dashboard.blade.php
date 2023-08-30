@extends('layouts.admin.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <h5 class="card-title text-primary">Selamat datang {{ auth()->user()->name }}</h5>

            <div class="d-flex align-items-end row">
                <div class="col-sm-4">


                    <x-dashboard-card
                        title="Total Siswa Terdaftar" detail="siswa"
                        item="20 orang" icon="{{ asset('assets/img/icons/unicons/cc-success.png') }}"
                    />

                </div>
            </div>
        </div>
    </div>
@endsection
