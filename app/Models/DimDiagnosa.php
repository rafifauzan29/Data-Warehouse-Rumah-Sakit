<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DimDiagnosa extends Model
{
    protected $table = 'dim_diagnosa';
    protected $primaryKey = 'diagnosa_id';
    public $timestamps = true;
}
