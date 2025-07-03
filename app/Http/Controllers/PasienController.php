<?php

namespace App\Http\Controllers;

use App\Models\DimPasien;

class PasienController extends Controller
{
    public function index()
    {
        $pasien = DimPasien::all();
        return view('dimensi.pasien', compact('pasien'));
    }
}
