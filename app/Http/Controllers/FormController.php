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
use App\Models\TotalBiaya;
use App\Models\VirtualAccount;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class FormController extends Controller
{
    public function index(): View
    {
        return view('forms.index');
    }

    public function jenjangInput(Request $request): RedirectResponse
    {
        if (isset($request->jenjang)) {
            session(['jenjang' => $request->jenjang]);
        }

        return redirect()->route('identitas-siswa');
    }

    public function dataSiswa(): View
    {
        return view('forms.student-data',[
            'kriteria' => DB::table('kriteria')->select('kriteria_id','kriteria')->get()
        ]);
    }

    public function uploadDataSiswa(Request $request): RedirectResponse
    {
        $request->validate([
            'email'             => 'required',
            'nama_lengkap'      => 'required',
            'jenis_kelamin'     => 'required',
            'kebutuhan_khusus'  => 'required',
            'tempat_lahir'      => 'required',
            'tanggal_lahir'     => 'required',
            'nama_sekolah'      => 'required',
            'alamat_sekolah'    => 'required',
            'no_tlp_sekolah'    => 'required',
            'nama_orangtua'     => 'required',
            'tlp_orangtua'      => 'required',
            'alamat_rumah'      => 'required',
            'akta_kk'           => 'required',
            'kriteria'          => 'required'
        ]);

        $siswa = new Siswa();

        if ($request->file('akta_kk')) {
            $berkas = $request->file('akta_kk');
            $originalName = $berkas->getClientOriginalName();
            $timestamp = time();

            $newFileName = $timestamp . '-' . $originalName;

            $berkas->move(public_path('berkas'), $newFileName);
            $siswa->berkas_kk = $newFileName;
        }

        $siswa->email = $request->email;
        $siswa->nama_lengkap = $request->nama_lengkap;
        $siswa->jenis_kelamin = $request->jenis_kelamin;
        $siswa->kebutuhan_khusus = $request->kebutuhan_khusus;
        $siswa->tempat_lahir = $request->tempat_lahir;
        $siswa->tanggal_lahir = $request->tanggal_lahir;
        $siswa->alamat_rumah = $request->alamat_rumah;
        $siswa->asal_sekolah = $request->nama_sekolah;
        $siswa->alamat_sekolah = $request->alamat_sekolah;
        $siswa->telepon_sekolah = $request->no_tlp_sekolah;
        $siswa->nama_orangtua = $request->nama_orangtua;
        $siswa->telepon_orangtua = $request->tlp_orangtua;
        $siswa->jenjang_id = session()->get('jenjang');
        $siswa->save();

        session([
            'siswa_id' => $siswa->id,
            'kriteria' => $request->kriteria
        ]);

        return redirect()->route('upload-rapot');
    }

    public function uploadRapot(): View
    {
        return view('forms.report-upload');
    }

    public function uploadDataRapot(Request $request): RedirectResponse
    {
        $request->validate(['rapot' => 'required']);

        if ($request->file('rapot')) {
            $fileRapor = $request->file('rapot');
            $originalName = $fileRapor->getClientOriginalName();
            $newFileName = time() . '-' . $originalName;

            // Move the uploaded rapot file to a directory
            $fileRapor->move(public_path('rapot'), $newFileName);
        }

        $siswa = Siswa::findOrFail(session()->get('siswa_id'));
        $siswa->rapot = $newFileName;
        $siswa->save();

        return redirect()->route('detail-biaya');
    }

    public function detailBiaya(): View
    {
        $dpp = DPP::where('jenjang_id', session()->get('jenjang'))
            ->where('kriteria_id',session()->get('kriteria'))
            ->first();
        // dd($dpp);
        $bmp = DB::select("SELECT * FROM bmp WHERE jenjang_id = ?", [session()->get('jenjang')]);
        $totalBMP = BMP::where('jenjang_id', session()->get('jenjang'))->sum('harga');

        $harga = $dpp->harga;
        $diskon = $harga - (($dpp->diskon / 100) * $dpp->harga);
        $final = $diskon - (($dpp->diskon_tambahan / 100) * $diskon);

        return view('forms.detail-cost', [
            'data' => $bmp,
            'total' => $totalBMP,
            'dpp' => $dpp,
            'finalDPP' => $final,
            'totalHarga' => $final + $totalBMP
        ]);
    }

    public function prosesDetailBiaya(Request $request)
    {
        $totalbiaya = new TotalBiaya();
        $totalbiaya->total = $request->total;
        $totalbiaya->save();

        $siswa = Siswa::findOrFail(session()->get('siswa_id'));
        $siswa->totalbiaya_id = $totalbiaya->id;
        $siswa->save();

        return redirect()->route('sistem-bayar');
    }

    public function sistemBayar(): View
    {
        $sistemBayar = SistemBayar::all();
        // dd($sistemBayar);

        return view('forms.special-payment-method', [
            'sistembayar' => $sistemBayar,
        ]);
    }

    public function uploadSistemBayar(Request $request): RedirectResponse
    {
        $request->validate(['sistembayar' => 'required']);

        $basedVA = '52799';
        $year = date('Y');

        $va = DB::table('virtual_accounts')->select('id', 'siswa_id', 'number')->get();
        $sb = DB::table('sistem_bayar')->select('sistembayar_id', 'skema')->where('sistembayar_id', '=', $request->sistembayar)->first();

        $siswa = Siswa::findOrFail(session()->get('siswa_id'));

        $siswa->sistembayar_id = $request->sistembayar;
        $siswa->save();

        $query = DB::table('siswa')
            ->join('sistem_bayar', 'sistem_bayar.sistembayar_id', 'siswa.sistembayar_id')
            ->join('jenjang', 'jenjang.jenjang_id', 'siswa.jenjang_id')
            ->select(
                'siswa.nama_lengkap',
                'sistem_bayar.sistembayar_id',
                'sistem_bayar.skema',
                'jenjang.jenjang_id',
                'jenjang.nama as nama_jenjang'
            )->where('siswa.id', '=', $siswa->id)->first();

        $tingkatan = [
            1 => '01',
            2 => '02',
            3 => '03',
            4 => '04',
            5 => '05',
            6 => '05',
        ][$query->jenjang_id] ?? '00';

        $numVA = $query->sistembayar_id; // Number of virtual accounts to generate
        $virtualAccounts = [];

        for ($i = 0; $i < $numVA; $i++) {
            $lastVA = end($virtualAccounts) ?: ($va->isEmpty() ? '000' : $va->last()->number);
            $nourut = $this->incrementUrut($lastVA);
            $VAccount = "$basedVA$year$tingkatan$nourut";
            $virtualAccounts[] = $VAccount;
        }
        // Save virtual accounts to the database
        foreach ($virtualAccounts as $account) {
            VirtualAccount::create([
                'siswa_id' => $siswa->id,
                'number' => $account
            ]);
        }

        return redirect()->route('verifikasi-form');
    }



    public function verifikasiFormulir(): View
    {
        return view('forms.verification-form');
    }

    public function done(): View
    {
        return view('forms.done');
    }

    public function prosesDone()
    {
        return redirect('/');
    }

    protected function incrementUrut($str): string
    {
        $lastDigit = (int)substr($str, -3);
        $lastDigit++;
        return str_pad($lastDigit, 3, '0', STR_PAD_LEFT);
    }
}
