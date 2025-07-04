<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FaktaKunjungan;
use App\Models\DimDokter;
use App\Models\DimDiagnosa;
use App\Models\DimRuang;
use App\Models\DimPasien;
use App\Models\DimWaktu;
use Carbon\Carbon;

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

        if ($request->filled('diagnosa_id')) {
            $query->where('diagnosa_id', $request->diagnosa_id);
        }

        if ($request->filled('ruang_id')) {
            $query->where('ruang_id', $request->ruang_id);
        }

        if ($request->filled('jenis_kelamin')) {
            $query->whereHas('pasien', function ($q) use ($request) {
                $q->where('jenis_kelamin', $request->jenis_kelamin);
            });
        }

        if ($request->filled('umur_min') || $request->filled('umur_max')) {
            $query->whereHas('pasien', function ($q) use ($request) {
                if ($request->filled('umur_min')) {
                    $minDate = Carbon::now()->subYears($request->umur_min)->endOfDay();
                    $q->where('tanggal_lahir', '<=', $minDate);
                }
                if ($request->filled('umur_max')) {
                    $maxDate = Carbon::now()->subYears($request->umur_max)->startOfDay();
                    $q->where('tanggal_lahir', '>=', $maxDate);
                }
            });
        }

        if ($request->filled('nama_pasien')) {
            $query->whereHas('pasien', function ($q) use ($request) {
                $q->where('nama', 'like', '%' . $request->nama_pasien . '%');
            });
        }

        if ($request->filled('tahun')) {
            $query->whereHas('waktu', function ($q) use ($request) {
                $q->where('tahun', $request->tahun);
            });
        }

        $kunjungan = $query->paginate(15)->withQueryString();

        return view('kunjungan', [
            'kunjungan' => $kunjungan,
            'dokterList' => DimDokter::orderBy('nama')->get(),
            'diagnosaList' => DimDiagnosa::orderBy('nama_penyakit')->get(),
            'ruangList' => DimRuang::orderBy('nama_ruang')->get(),
            'tahunList' => DimWaktu::distinct()->pluck('tahun')->sort(),
        ]);
    }
}
