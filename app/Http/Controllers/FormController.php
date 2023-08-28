<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function index(Request $request)
    {
        return view('forms.index');
    }

    public function jenjangInput(Request $request)
    {
        if(isset($request->jenjang)){
            session(['jenjang' => $request->jenjang]);
            if(isset($request->jurusan)){
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

    public function detailBiaya(Request $request)
    {
        return view('forms.detail-cost');
    }
}
