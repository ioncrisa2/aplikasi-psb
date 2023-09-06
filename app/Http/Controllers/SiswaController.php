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
        if(auth()->user()->level === 'su'){
            $siswa = DB::table('siswa')
                ->join('jenjang','jenjang.jenjang_id','=','siswa.jenjang_id')
                ->select(
                    'siswa.id','siswa.nama_lengkap as nama_siswa','siswa.asal_sekolah','siswa.jenis_kelamin as gender',
                    'jenjang.jenjang_id','jenjang.nama','jenjang.jurusan'
                    )
                ->get();
        }else{
            $siswa = DB::table('siswa')->select('id','nama_lengkap as nama_siswa','asal_sekolah','jenis_kelamin as gender')->where('jenjang_id','=',$jenjang->jenjang_id)->get();
        }
        return view('admin.siswa.index', compact('siswa'));
    }

    public function show(Siswa $siswa): View
    {
        $data = Siswa::with(['totalBiaya','sistemBayar','jenjang','virtualAccount'])->where('id', $siswa->id)->first();
        // dd($data->nama_lengkap);
        return view('admin.siswa.detail',compact('data'));
    }

    protected function getJenjang()
    {
        $jenjang = auth()->user()->level;
        return Jenjang::where('nama','=',$jenjang)->first();
    }
}
