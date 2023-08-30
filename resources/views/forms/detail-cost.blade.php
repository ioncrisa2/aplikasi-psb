@extends('layouts.front.app')

@section('content')
    <form class="appointment-form" id="appointment-form">
        @csrf

        <img src="{{ asset('logo-sekolah.png') }}" alt="logo sekolah" width="200">
        <p class="h3 text-dark text-center mb-4 fw-bold">RINCIAN BIAYA KHUSUS</p>

        <table class="table table-bordered">
            <thead class="table-secondary">
                <tr>
                    <th scope="col" width="5%" class="text-center">No</th>
                    <th scope="col" width="65%" class="text-center">Keterangan</th>
                    <th scope="col" width="30%"class="text-center">Biaya</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $cost)
                    <tr>
                        <th scope="row" width="5%" class="text-center fw-lighter">{{ $loop->iteration }}</th>
                        <td width="60%">{{ $cost->item }}</td>
                        <td width="35%" class="fw-semibold text-center" class="cost-cell">
                            @if($cost->harga == 0)
                              <h6><span class="badge text-bg-info">Free</span></h6>
                            @else
                            <div class="d-flex justify-content-between">
                                <span >Rp.</span> <span>{{ number_format($cost->harga) }}</span>
                            </div>
                            @endif
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <th colspan="2">Total (Tidak Termasuk DPP)</th>
                    <th class="d-flex justify-content-between"><span>Rp. </span><span>{{ number_format($total) }}</span></th>
                </tr>
            </tbody>
        </table>

        <p class="h3 text-dark text-center mb-4 mt-5 fw-bolder">RINCIAN BIAYA YANG HARUS DIBAYAR</p>
        <table class="table table-borderless text-dark">
            <tr>
                <th width="75%">DPP Rp. {{ $dpp->harga }} - Potongan {{ $dpp->diskon }}% + 10%</th>
                <td width="25%">Rp {{ number_format($finalDPP) }}</td>
            </tr>
            <tr class="border-bottom">
                <th width="75%">Biaya Pendaftaran</th>
                <td width="25%">Rp. {{ number_format($total) }}</td>
            </tr>
            <tr>
                <th width="75%">Total</th>
                <td width="25%">Rp. {{ number_format($totalHarga) }}</td>
            </tr>
        </table>

        <p class="text-dark mb-2 mt-1">
            Jika pendaftaran diterima, pembayaran akan dilanjutkan melalui BCA Virtual Account, Bapak / Ibu akan menerima
            pesan Whatsapp yang berisi Nomor VA Atas Nama Calon Peserta Didik.
        </p>


        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-primary" href="{{ route('sistem-bayar') }}">Lanjutkan</a>
        </div>
    </form>
@endsection
