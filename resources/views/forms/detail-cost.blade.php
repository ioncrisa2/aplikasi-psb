@extends('layouts.front.app')

@section('style')
    <style>
    .cost-cell {
        text-align: right;
    }
    .cost-cell span {
        margin-left: 5px; /
    }
</style>
@endsection

@section('content')
    <form action="{{ route('sistem-bayar') }}" method="GET" class="appointment-form" id="appointment-form">
        @csrf

        <img src="{{ asset('logo-sekolah.png') }}" alt="logo sekolah" width="200">
        <p class="h3 text-dark text-center mb-4 fw-bold">RINCIAN BIAYA KHUSUS</p>

        <table class="table table-bordered">
            <thead class="table-secondary">
                <tr>
                    <th scope="col" class="text-center">No</th>
                    <th scope="col" class="text-center">Perlengkapan</th>
                    <th scope="col" class="text-center">Biaya</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $cost)
                    <tr>
                        <th scope="row" class="text-center fw-lighter">{{ $loop->iteration }}</th>
                        <td>{{ $cost->item }}</td>
                        <td  class="fw-semibold" class="cost-cell">
                            {!! $cost->harga == 0 ? 'Free' : 'Rp. ' . number_format($cost->harga) !!}
                        </td>
                    </tr>
                @endforeach
                    <tr>
                        <th colspan="2">Total (Tidak Termasuk DPP)</th>
                        <th class="cost-cell">Rp. {{number_format($total) }}</th>
                    </tr>
            </tbody>
        </table>

        <p class="h3 text-dark text-center mb-4 mt-5 fw-bolder">RINCIAN BIAYA YANG HARUS DIBAYAR</p>
        <table class="table table-borderless text-dark">
            <tr>
                @php
                    $totalDpp = ($dpp->harga - (($dpp->diskon / 100) * $dpp->harga));
                @endphp
                <th width="75%">DPP Rp. {{ $dpp->harga }} - Potongan ({{ $dpp->diskon }}%)</th>
                <td width="25%">Rp {{ number_format($totalDpp)}}</td>
            </tr>
            <tr class="border-bottom">
                <th width="75%">Biaya Pendaftaran</th>
                <td width="25%">Rp. {{ number_format($total) }}</td>
            </tr>
            <tr>
                <th width="75%">Total</th>
                <td width="25%">Rp. {{ number_format($total + $totalDpp) }}</td>
            </tr>
        </table>

        <p class="text-dark mb-2 mt-1">
        Jika pendaftaran diterima, pembayaran akan dilanjutkan melalui BCA Virtual Account, Bapak / Ibu akan menerima pesan Whatsapp yang berisi Nomor VA Atas Nama Calon Peserta Didik.
        </p>


        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-light" href="{{ route('upload-rapot') }}">Kembali</a>
            <button class="btn btn-primary btn-lg" type="submit">Lanjutkan</button>
        </div>
    </form>
@endsection
