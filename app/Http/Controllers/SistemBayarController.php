<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SistemBayarController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.biaya.sistembayar.index');
    }
}
