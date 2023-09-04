<?php

namespace App\Http\Controllers;

use App\Models\Jenjang;
use App\Models\Siswa;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiswaController extends Controller
{
    public function index(Request $request): View
    {
        $jenjang = $this->getJenjang();
        $siswa = Siswa::where('jenjang_id','=',$jenjang->jenjang_id)->get();
        return view('admin.siswa.index', compact('siswa'));
    }

    public function show(Siswa $siswa): View
    {
        return view('admin.siswa.detail',compact('data'));
    }

    protected function getJenjang()
    {
        $jenjang = auth()->user()->level;
        return Jenjang::where('nama','=',$jenjang)->first();
    }
}
