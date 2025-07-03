<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DimPasien extends Model
{
    protected $table = 'dim_pasien';
    protected $primaryKey = 'pasien_id';
    public $timestamps = true;
}
