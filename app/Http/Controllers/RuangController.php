<?php

namespace App\Http\Controllers;

use App\Models\DimRuang;

class RuangController extends Controller
{
    public function index()
    {
        $ruang = DimRuang::all();
        return view('dimensi.ruang', compact('ruang'));
    }
}

