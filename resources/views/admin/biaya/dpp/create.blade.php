@extends('layouts.admin.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-8 col-sm-12 col-xs-12">
            <div class="card mb-4">
                <h5 class="card-header">Buat Dana Partisipasi Pendidikan</h5>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('dana-pendidikan.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="harga" class="form-label">Nominal Dana Pengembangan Pendidikan</label>
                            <input type="number" class="form-control @error('harga') is-invalid @enderror" id="harga"
                                placeholder="nama harga" name="harga" />
                            @error('harga')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="diskon" class="form-label">Diskon</label>
                            <input type="number" class="form-control @error('diskon') is-invalid @enderror" id="diskon"
                                placeholder="nama diskon" name="diskon" />
                            @error('diskon')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="jenjang" class="form-label">Jenjang Sekolah</label>
                            <select class="form-select @error('jenjang') is-invalid @enderror" id="jenjang"
                                name="jenjang_id" aria-label="Default select example">
                                <option selected="">---Pilih Jenjang Pendidikan---</option>
                                @foreach ($jenjang as $data)
                                    <option value="{{ $data->jenjang_id }}">
                                        {{ $data->nama }}{{ $data->jurusan ? " - {$data->jurusan}" : '' }}</option>
                                @endforeach
                            </select>
                            @error('jenjang')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-2 mt-2">
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <a class="btn btn-secondary me-md-2" href="{{ route('dana-pendidikan.index') }}">
                                    Kembali
                                </a>
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
