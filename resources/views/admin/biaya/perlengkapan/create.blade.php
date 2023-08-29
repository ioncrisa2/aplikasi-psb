@extends('layouts.admin.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-8 col-sm-12 col-xs-12">
            <div class="card mb-4">
                <h5 class="card-header">Buat Perlengkapan Baru</h5>
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
                    <form action="{{ route('perlengkapan.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="item" class="form-label">Item Perlengkapan</label>
                            <input type="text" class="form-control @error('item') is-invalid @enderror" id="item"
                                placeholder="nama item" name="item" />
                            @error('item')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga</label>
                            <input type="number" step="1000" class="form-control @error('harga') is-invalid @enderror" id="harga"
                                placeholder="harga item" name="harga" />
                            @error('harga')
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
                                <a class="btn btn-secondary me-md-2" href="{{ route('perlengkapan.index') }}">
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
