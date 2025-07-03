<?php

namespace App\Http\Controllers;

use App\Models\DimDokter;

class DokterController extends Controller
{
    public function index()
    {
        $dokter = DimDokter::all();
        return view('dimensi.dokter', compact('dokter'));
    }
}
