<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DPPController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.biaya.dpp.index');
    }
}
