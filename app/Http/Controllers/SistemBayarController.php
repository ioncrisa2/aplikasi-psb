<?php

namespace App\Http\Controllers;

use App\Models\SistemBayar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SistemBayarController extends Controller
{
    public function index(Request $request)
    {
        $sistembayar = DB::table('sistem_bayar')->select('sistembayar_id','skema','keterangan')->get();
        return view('admin.biaya.sistembayar.index',['sistembayar' => $sistembayar]);
    }

    public function create()
    {
        return view('admin.biaya.sistembayar.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'skema' => 'required|string',
            'keterangan' => 'required'
        ],[
            'skema.required' => 'Skema pembayaran tidak boleh kosong',
            'skema.string' => 'Skema pembayaran harus berupa string',
            'keterangan.required' => 'Keterangan tidak boleh kosong',
        ]);

        $sistemBayar = new SistemBayar();
        $sistemBayar->skema = $request->skema;
        $sistemBayar->keterangan = $request->keterangan;
        $sistemBayar->save();

        return redirect()->route('sistem-bayar.index');
    }

    public function edit(SistemBayar $sistembayar)
    {
        return view('admin.biaya.sistembayar.edit',[
            'sistembayar' => $sistembayar
        ]);
    }

    public function update(Request $request, SistemBayar $sistembayar)
    {
        $request->validate([
            'skema' => 'required|string',
            'keterangan' => 'required'
        ],[
            'skema.required' => 'Skema pembayaran tidak boleh kosong',
            'skema.string' => 'Skema pembayaran harus berupa string',
            'keterangan.required' => 'Keterangan tidak boleh kosong',
        ]);

        $sistembayar->update([
            'skema' => $request->skema,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('sistem-bayar.index');
    }

    public function destroy(SistemBayar $sistembayar)
    {
        $sistembayar->delete();
        return redirect()->route('sistem-bayar.index');
    }
}
