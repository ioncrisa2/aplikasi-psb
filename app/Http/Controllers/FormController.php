<?php

namespace App\Http\Controllers;

use App\Models\BMP;
use App\Models\DPP;
use App\Models\SistemBayar;
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
            if (isset($request->jurusan)) {
                session(['jurusan' => $request->jurusan]);
            }
        }

        return redirect()->route('identitas-siswa');
    }

    public function dataSiswa(Request $request)
    {
        return view('forms.student-data');
    }

    public function uploadRapot(Request $request)
    {
        return view('forms.report-upload');
    }

    public function detailBiaya()
    {
        $dpp = DPP::where('jenjang_id',session()->get('jenjang'))->first();
        $bmp = DB::select("SELECT * from bmp where jenjang_id = ?",[session()->get('jenjang')]);
        return view('forms.detail-cost', [
            'data' => $bmp,
            'total' => BMP::sum('harga'),
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
}
