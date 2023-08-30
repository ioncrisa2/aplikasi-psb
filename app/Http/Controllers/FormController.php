<?php

namespace App\Http\Controllers;

use App\Models\BMP;
use App\Models\DPP;
use App\Models\Rapor;
use App\Models\Siswa;
use App\Models\Berkas;
use App\Models\Sekolah;
use App\Models\OrangTua;
use App\Models\DetailSiswa;
use App\Models\SistemBayar;
use Illuminate\Http\Request;
use App\Http\Requests\DataSiswa;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class FormController extends Controller
{
    public function index(Request $request)
    {
        return view('forms.index');
    }

    public function jenjangInput(Request $request)
    {
        if (isset($request->jenjang)) {
            session(['jenjang' => $request->jenjang]);
        }

        return redirect()->route('identitas-siswa');
    }

    public function dataSiswa()
    {
        return view('forms.student-data');
    }

    public function uploadDataSiswa(Request $request): mixed
    {
        $request->validate([
            'email' => 'required',
            'nama_lengkap' => 'required',
            'jenis_kelamin' => 'required',
            'kebutuhan_khusus' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'nama_sekolah' => 'required',
            'alamat_sekolah' => 'required',
            'no_tlp_sekolah' => 'required',
            'nama_orangtua' => 'required',
            'tlp_orangtua' => 'required',
            'alamat_rumah' => 'required',
            'akta_kk' => 'required',
            'kriteria' => 'required'
        ]);

        if ($request->file('akta_kk')) {
            $berkas = $request->file('akta_kk');
            $originalName = $berkas->getClientOriginalName();
            $timestamp = time();

            $newFileName = $timestamp . '-' . $originalName;

            $berkas->move(public_path('berkas'), $newFileName);
            $saveBerkas = new Berkas();
            $saveBerkas->nama_file = $newFileName;
            $saveBerkas->save();
        }


        $orangtua = new OrangTua();
        $orangtua->nama_orangtua = $request->nama_orangtua;
        $orangtua->tlpn_orangtua = $request->tlp_orangtua;
        $orangtua->save();

        $sekolahAsal = new Sekolah();
        $sekolahAsal->asal_sekolah = $request->nama_sekolah;
        $sekolahAsal->alamat_sekolah = $request->alamat_sekolah;
        $sekolahAsal->telepon = $request->tlp_orangtua;
        $sekolahAsal->save();

        $detailSiswa = new DetailSiswa();
        $detailSiswa->orangtua_id = $orangtua->id;
        $detailSiswa->sekolah_id = $sekolahAsal->id;
        $detailSiswa->alamat_rumah = $request->alamat_rumah;
        $detailSiswa->telepon = $request->tlp_orangtua;
        $detailSiswa->save();

        $siswa = new Siswa();
        $siswa->email = $request->email;
        $siswa->nama_lengkap = $request->nama_lengkap;
        $siswa->jenis_kelamin = $request->jenis_kelamin;
        $siswa->kebutuhan_khusus = $request->kebutuhan_khusus;
        $siswa->tempat_lahir = $request->tempat_lahir;
        $siswa->tanggal_lahir = $request->tanggal_lahir;
        $siswa->berkas_id = $saveBerkas->id;
        $siswa->detailsiswa_id = $detailSiswa->id;
        $siswa->jenjang_id = session()->get('jenjang');
        $siswa->save();

        session(['siswa_id' => $siswa->id]);

        return redirect()->route('upload-rapot');
    }

    public function uploadRapot()
    {
        return view('forms.report-upload');
    }

    public function uploadDataRapot(Request $request)
    {
        $request->validate(['rapot' => 'required']);

        if($request->file('rapot')){
            $fileRapor = $request->file('rapot');
            $originalName = $fileRapor->getClientOriginalName();
            $newFileName = time() . '-' . $originalName;

            // Move the uploaded rapot file to a directory
            $fileRapor->move(public_path('rapot'), $newFileName);
        }

        $rapor = new Rapor();
        $rapor->file_rapor = $newFileName;
        $rapor->save();

        $siswa = Siswa::findOrFail(session()->get('siswa_id'));
        $siswa->rapor_id = $rapor->id;
        $siswa->save();

        return redirect()->route('detail-biaya');
    }

    public function detailBiaya()
    {
        $dpp = DPP::where('jenjang_id', session()->get('jenjang'))->first();
        $bmp = DB::select("SELECT * FROM bmp WHERE jenjang_id = ?", [session()->get('jenjang')]);
        $totalBMP = BMP::where('jenjang_id', session()->get('jenjang'))->sum('harga');

        $diskonDpp1 = ($dpp->diskon / 100) * $dpp->harga;
        $diskonDpp2 = (10/100) * $diskonDpp1;
        $totalDiskon = $diskonDpp1 + $diskonDpp2;
        $finalDpp = $dpp->harga - $totalDiskon;
        $totalHarga = $finalDpp + $totalBMP;

        return view('forms.detail-cost', [
            'data' => $bmp,
            'total' => $totalBMP,
            'dpp' => $dpp,
            'finalDPP' => $finalDpp,
            'totalHarga' => $totalHarga
        ]);
    }

    public function sistemBayar()
    {
        $sistemBayar = SistemBayar::all();

        return view('forms.special-payment-method', [
            'sistembayar' => $sistemBayar,
        ]);
    }

    public function uploadSistemBayar(Request $request)
    {
        $request->validate(['sistembayar' => 'required']);

        $siswa = Siswa::findOrFail(session()->get('siswa_id'));
        $siswa->sistembayar_id = $request->sistembayar;
        $siswa->save();

        return redirect()->route('verifikasi-form');
    }

    public function verifikasiFormulir()
    {
        return view('forms.verification-form');
    }

    public function done()
    {
        return view('forms.index');
    }
}
