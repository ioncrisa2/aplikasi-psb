<?php

namespace App\Http\Controllers;

use App\Models\BMP;
use App\Models\Jenjang;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PerlengkapanController extends Controller
{
    public function index(): View
    {
        $data = BMP::with('jenjang')->latest()->get();
        return view('admin.biaya.perlengkapan.index',['bmp' => $data]);
    }

    public function create(): View
    {
        $jenjang = Jenjang::all();
        return view('admin.biaya.perlengkapan.create',[
            'jenjang' => $jenjang
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenjang_id' => 'required',
            'item' => 'required|string',
            'harga' => 'required|integer'
        ],[
            'jenjang_id.required' => 'Jenjang Sekolah tidak boleh kosong!!',
            'item.required' => 'Item tidak boleh kosong!!',
            'item.string' => 'Item harus berupa string!!',
            'harga.required' => 'Harga tidak boleh kosong!!',
            'harga.integer' => 'Harga harus berupa integer!!'
        ]);

        $bmp = new BMP();
        $bmp->jenjang_id = $request->jenjang_id;
        $bmp->item = $request->item;
        $bmp->harga = $request->harga;
        $bmp->save();

        return redirect()->route('perlengkapan.index')->with(['success','Sukses menambahkan data!!']);
    }

    public function edit(BMP $bmp)
    {
        return view('admin.biaya.perlengkapan.edit',[
            'jenjang' => Jenjang::all(),
            'bmp' => $bmp
        ]);
    }

    public function update(Request $request, BMP $bmp)
    {
        $request->validate([
            'jenjang_id' => 'required',
            'item' => 'required|string',
            'harga' => 'required|integer'
        ],[
            'jenjang_id.required' => 'Jenjang Sekolah tidak boleh kosong!!',
            'item.required' => 'Item tidak boleh kosong!!',
            'item.string' => 'Item harus berupa string!!',
            'harga.required' => 'Harga tidak boleh kosong!!',
            'harga.integer' => 'Harga harus berupa integer!!'
        ]);

        $bmp->update([
            'jenjang_id' => $request->jenjang_id,
            'item' => $request->item,
            'harga' => $request->harga
        ]);

        return redirect()->route('perlengkapan.index')->with(['success','Sukses menambahkan data!!']);
    }

    public function destroy(BMP $bmp)
    {
        $bmp->delete();
        return redirect()->route('perlengkapan.index');
    }
}
