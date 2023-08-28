<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PerlengkapanController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.biaya.perlengkapan.index');
    }
}
