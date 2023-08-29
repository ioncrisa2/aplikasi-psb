<?php

namespace App\Http\Controllers;

use App\Http\Requests\DataSiswa;
use App\Models\Berkas;
use App\Models\BMP;
use App\Models\DetailSiswa;
use App\Models\DPP;
use App\Models\OrangTua;
use App\Models\Sekolah;
use App\Models\SistemBayar;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        if($request->file('akta_kk')){
            $berkas = $request->file('akta_kk');
            $berkas->storeAs('berkas',$berkas->hashName());

            $saveBerkas = new Berkas();
            $saveBerkas->nama_file = $berkas->hashName();
            $saveBerkas->save();
        }

        $siswa = new Siswa();
        $siswa->email = $request->email;
        $siswa->nama_lengkap = $request->nama_lengkap;
        $siswa->jenis_kelamin = $request->jenis_kelamin;
        $siswa->kebutuhan_khusus = $request->kebutuhan_khusus;
        $siswa->tempat_lahir = $request->tempat_lahir;
        $siswa->tanggal_lahir = $request->tanggal_lahir;
        $siswa->berkas_id = $saveBerkas->id;
        $siswa->rapor_id =
        $siswa->save();

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

        return redirect()->route('upload-rapot');

    }

    public function uploadRapot(Request $request)
    {
        return view('forms.report-upload');
    }

    public function detailBiaya()
    {
        $dpp = DPP::where('jenjang_id',session()->get('jenjang'))->first();
        $bmp = DB::select("SELECT * from bmp where jenjang_id = ?",[session()->get('jenjang')]);
        $totalBMP = BMP::where('jenjang_id',session()->get('jenjang'))->sum('harga');
        return view('forms.detail-cost', [
            'data' => $bmp,
            'total' => $totalBMP,
            'dpp' => $dpp,
        ]);
    }

    public function sistemBayar()
    {
        $sistemBayar = SistemBayar::all();

        return view('forms.special-payment-method', [
            'sistembayar' => $sistemBayar,

        ]);
    }

    public function verifikasiFormulir()
    {
        return view('forms.verification-form');
    }
}
