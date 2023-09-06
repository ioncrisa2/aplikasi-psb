<?php

namespace App\Http\Controllers;

use App\Models\DPP;
use App\Models\Jenjang;
use App\Models\Kriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DPPController extends Controller
{
    public function index(Request $request)
    {
        $data = DB::table('dpp')
            ->join('jenjang','dpp.jenjang_id','=','jenjang.jenjang_id')
            ->join('kriteria','dpp.kriteria_id','=','kriteria.kriteria_id')
            ->select('dpp.*','kriteria.kriteria_id','kriteria.kriteria as nama_kriteria','jenjang.jenjang_id','jenjang.nama as nama_jenjang','jenjang.jurusan')
            ->get();
        return view('admin.biaya.dpp.index',['dpp' => $data]);
    }

    public function create()
    {
        $jenjang = DB::table('jenjang')->select('jenjang_id','nama','jurusan')->get();
        $kriteria = DB::table('kriteria')->select('kriteria_id','kriteria')->get();
        return view('admin.biaya.dpp.create',[
            'jenjang' => $jenjang,
            'kriteria' => $kriteria
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenjang_id' => 'required',
            'harga' => 'required|integer',
            'diskon' => 'integer',
            'diskon_tambahan' => 'integer'
        ],[
            'jenjang_id.required' => 'Jenjang Sekolah tidak boleh kosong!!',
            'harga.required' => 'Harga tidak boleh kosong!!',
            'harga.string' => 'Harga harus berupa string!!',
            'diskon.integer' => 'Diskon harus berupa angka!!',
            'diskon_tambahan.integer' => 'Diskon Tambahan harus berupa angka'
        ]);

        $dpp = new DPP();
        $dpp->jenjang_id = $request->jenjang_id;
        $dpp->kriteria_id = $request->kriteria_id;
        $dpp->harga = $request->harga;
        $dpp->diskon = $request->diskon;
        $dpp->diskon_tambahan = $request->diskon_tambahan;
        $dpp->save();

        return redirect()->route('dana-pendidikan.index')->with(['success','Sukses menambahkan data!!']);
    }

    public function edit(DPP $dpp)
    {
        return view('admin.biaya.dpp.edit',[
            'kriteria' => DB::table('kriteria')->select('kriteria_id','kriteria')->get(),
            'jenjang' => DB::table('jenjang')->select('jenjang_id','nama','jurusan')->get(),
            'dpp' => $dpp
        ]);
    }

    public function update(Request $request,DPP $dpp)
    {
        $request->validate([
            'jenjang_id' => 'required',
            'harga' => 'required|integer',
            'diskon' => 'integer',
            'diskon_tambahan' => 'integer'
        ],[
            'jenjang_id.required' => 'Jenjang Sekolah tidak boleh kosong!!',
            'harga.required' => 'Harga tidak boleh kosong!!',
            'harga.string' => 'Harga harus berupa string!!',
            'diskon.integer' => 'diskon harus berupa angka!!',
            'diskon_tambahan.integer' => 'diskon tambahan harus berupa angka!!'
        ]);

        $dpp->update([
            'jenjang_id' => $request->jenjang_id,
            'harga' => $request->harga,
            'diskon' => $request->diskon,
            'diskon_tambahan' => $request->diskon_tambahan ?? 0
        ]);

        return redirect()->route('dana-pendidikan.index')->with(['success','Sukses menambahkan data!!']);
    }

    public function destroy(DPP $dpp)
    {
        $dpp->delete();
        return redirect()->route('dana-pendidikan.index');
    }
}
