@extends('layouts.admin.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-8 col-sm-12 col-xs-12">
            <div class="card mb-4">
                <h5 class="card-header">Buat Dana Pengembangan Pendidikan</h5>
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
                    <form action="{{ route('sistem-bayar.update',['sistembayar' => $sistembayar->id]) }}" method="POST">
                        @csrf @method('PUT')
                        <div class="mb-3">
                            <label for="skema" class="form-label">Skema Pembayaran</label>
                            <input type="text" class="form-control @error('skema') is-invalid @enderror" id="skema"
                                placeholder="nama skema" name="skema" value="{{ old('skema',$sistembayar->skema) }}" />
                            @error('skema')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="keterangan" class="form-label">Keterangan Skema Pembayaran</label>
                            <textarea class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" id="keterangan"
                                rows="3">
                                {{ old('keterangan',$sistembayar->keterangan) }}
                            </textarea>
                        </div>
                        @error('keterangan')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                        @enderror

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

@section('script')
    <script src="https://cdn.tiny.cloud/1/84954eadvqy6surp0s3kprhrtaf7ovrxed6vhio1xfzf7bac/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea#keterangan'
        });
    </script>
@endsection
