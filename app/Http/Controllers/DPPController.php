<?php

namespace App\Http\Controllers;

use App\Models\DPP;
use App\Models\Jenjang;
use Illuminate\Http\Request;

class DPPController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.biaya.dpp.index',[
            'dpp' => DPP::with('jenjang')->get()
        ]);
    }

    public function create()
    {
        return view('admin.biaya.dpp.create',[
            'jenjang' => Jenjang::all()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenjang_id' => 'required',
            'harga' => 'required|integer',
            'diskon' => 'integer',
        ],[
            'jenjang_id.required' => 'Jenjang Sekolah tidak boleh kosong!!',
            'harga.required' => 'Harga tidak boleh kosong!!',
            'harga.string' => 'Harga harus berupa string!!',
            'diskon.number' => 'Harga tidak boleh kosong!!',
        ]);

        $dpp = new DPP();
        $dpp->jenjang_id = $request->jenjang_id;
        $dpp->harga = $request->harga;
        $dpp->diskon = $request->diskon;
        $dpp->save();

        return redirect()->route('dana-pendidikan.index')->with(['success','Sukses menambahkan data!!']);
    }

    public function edit(DPP $dpp)
    {
        return view('admin.biaya.dpp.edit',[
            'jenjang' => Jenjang::all(),
            'dpp' => $dpp
        ]);
    }

    public function update(Request $request,DPP $dpp)
    {
        $request->validate([
            'jenjang_id' => 'required',
            'harga' => 'required|integer',
            'diskon' => 'integer',
        ],[
            'jenjang_id.required' => 'Jenjang Sekolah tidak boleh kosong!!',
            'harga.required' => 'Harga tidak boleh kosong!!',
            'harga.string' => 'Harga harus berupa string!!',
            'diskon.number' => 'Harga tidak boleh kosong!!',
        ]);

        $dpp->update([
            'jenjang_id' => $request->jenjang_id,
            'harga' => $request->harga,
            'diskon' => $request->diskon
        ]);

        return redirect()->route('dana-pendidikan.index')->with(['success','Sukses menambahkan data!!']);
    }

    public function destroy(DPP $dpp)
    {
        $dpp->delete();
        return redirect()->route('dana-pendidikan.index');
    }
}
