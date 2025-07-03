<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FaktaKunjungan extends Model
{
    protected $table = 'fakta_kunjungan';
    protected $fillable = [
        'waktu_id',
        'pasien_id',
        'dokter_id',
        'diagnosa_id',
        'ruang_id',
        'biaya_total'
    ];

    public function waktu()
    {
        return $this->belongsTo(DimWaktu::class, 'waktu_id');
    }
    public function pasien()
    {
        return $this->belongsTo(DimPasien::class, 'pasien_id');
    }
    public function dokter()
    {
        return $this->belongsTo(DimDokter::class, 'dokter_id', 'dokter_id');
    }
    public function diagnosa()
    {
        return $this->belongsTo(DimDiagnosa::class, 'diagnosa_id');
    }
    public function ruang()
    {
        return $this->belongsTo(DimRuang::class, 'ruang_id');
    }
}
