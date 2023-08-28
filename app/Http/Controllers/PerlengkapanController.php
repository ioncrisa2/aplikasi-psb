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
        return view('admin.biaya.perlengkapan.index',[
            'bmp' => BMP::with('jenjang')->get()
        ]);
    }

    public function create(): View
    {
        return view('admin.biaya.perlengkapan.create',[
            'jenjang' => Jenjang::all()
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
}
