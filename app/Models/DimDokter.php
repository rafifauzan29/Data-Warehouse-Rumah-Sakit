<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DimDokter extends Model
{
    protected $table = 'dim_dokter';
    protected $primaryKey = 'dokter_id';
    public $timestamps = true;
}
