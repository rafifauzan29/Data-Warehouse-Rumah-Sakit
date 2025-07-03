<?php

namespace App\Http\Controllers;

use App\Models\DimDiagnosa;

class DiagnosaController extends Controller
{
    public function index()
    {
        $diagnosa = DimDiagnosa::all();
        return view('dimensi.diagnosa', compact('diagnosa'));
    }
}
