@extends('layouts.front.app')

@section('content')
    <div class="row justify-content-center align-items-center w-auto h-auto">
        <div class="col-lg-8 col-md-10 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-header">
                    <h3>Verifikasi Khusus - Upload Rapot Terakhir</h3>
                </div>
                <div class="card-body">
                    <div class="mt-4">
                        <form action="{{ route('detail-biaya') }}" method="GET">
                            @csrf

                            <div class="mb-4">
                                <label for="staticEmail" class="form-label">
                                    Lampiran Akta Kelahiran dan Kartu Keluarga
                                </label><br>
                                <span class="mt-3 mb-3">Mohon Lampirkan Halaman Raport SMP milik Calon Peserta Didik yang terakhir diterima dari Sekolah selengkap-lengkapnya (tanpa Cover) dalam 1 file dengan format PDF/DOC/DOCX dan ukuran maksimal 10mb. Mohon untuk memperhatikan kualitas dokumen yang dikirim sehingga kami dapat memverifikasi dengan mudah</span>
                                <input class="form-control" type="file" id="formFile">
                            </div>


                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button class="btn btn-primary btn-lg" type="submit">Lanjutkan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
