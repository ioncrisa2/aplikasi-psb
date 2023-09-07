<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Jenjang;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $jenjang = $this->getJenjang();
        $totalSiswa = auth()->user()->level == 'su' ? Siswa::count() : Siswa::where('jenjang_id','=',$jenjang->jenjang_id)->count();
        return view('admin.dashboard',compact('totalSiswa'));
    }

    protected function getJenjang()
    {
        $jenjang = auth()->user()->level;
        return Jenjang::where('nama','=',$jenjang)->first();
    }
}
