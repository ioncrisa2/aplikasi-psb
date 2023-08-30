<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiswaController extends Controller
{
    public function index(Request $request): View
    {
        $siswa = DB::table('siswa')
            ->join('detail_siswa', 'siswa.detailsiswa_id', '=', 'detail_siswa.id')
            ->join('orang_tua', 'detail_siswa.orangtua_id', '=', 'orang_tua.id')
            ->join('sekolah', 'detail_siswa.sekolah_id', '=', 'sekolah.id')
            ->join('berkas', 'siswa.berkas_id', '=', 'berkas.id')
            ->join('rapor', 'siswa.rapor_id', '=', 'rapor.id')
            ->join('sistem_bayar', 'siswa.sistembayar_id', '=', 'sistem_bayar.id')
            ->join('jenjang', 'siswa.jenjang_id', '=', 'jenjang.jenjang_id')
            ->select(
                'siswa.id',
                'siswa.nama_lengkap as nama',
                'siswa.jenis_kelamin as gender',
                'detail_siswa.id',
                'detail_siswa.alamat_rumah as alamat',
                'detail_siswa.telepon as tlp_siswa',
                'orang_tua.id',
                'orang_tua.nama_orangtua as orangtua',
                'orang_tua.tlpn_orangtua',
                'sekolah.id',
                'sekolah.asal_sekolah',
                'sekolah.alamat_sekolah',
                'sekolah.telepon as tlp_sekolah',
                'berkas.id',
                'berkas.nama_file as file',
                'rapor.id',
                'rapor.file_rapor as rapor',
                'sistem_bayar.id',
                'sistem_bayar.skema',
                'sistem_bayar.keterangan',
                'jenjang.jenjang_id',
                'jenjang.nama as nama_jenjang',
                'jenjang.jurusan'
            )->get();

        return view('admin.siswa.index', compact('siswa'));
    }
}
