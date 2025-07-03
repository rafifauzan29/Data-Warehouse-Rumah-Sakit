<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FaktaKunjungan;
use App\Models\DimDokter;

class KunjunganController extends Controller
{
    public function index(Request $request)
    {
        $query = FaktaKunjungan::with(['waktu', 'pasien', 'dokter', 'diagnosa', 'ruang']);

        if ($request->filled('tanggal_awal') && $request->filled('tanggal_akhir')) {
            $query->whereHas('waktu', function ($q) use ($request) {
                $q->whereBetween('tanggal', [$request->tanggal_awal, $request->tanggal_akhir]);
            });
        }

        if (!empty($request->dokter_id)) {
            $query->where('dokter_id', $request->dokter_id);
        }

        $kunjungan = $query->paginate(15)->withQueryString();

        $dokterList = DimDokter::orderBy('nama')->get();

        return view('kunjungan', compact('kunjungan', 'dokterList'));
    }
}
