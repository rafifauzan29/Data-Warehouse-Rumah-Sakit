<?php

namespace App\Http\Controllers;

use App\Models\DimWaktu;

class WaktuController extends Controller
{
    public function index()
    {
        $waktu = DimWaktu::all();
        return view('dimensi.waktu', compact('waktu'));
    }
}
