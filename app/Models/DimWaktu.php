<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DimWaktu extends Model
{
    protected $table = 'dim_waktu';
    protected $primaryKey = 'waktu_id';
    public $timestamps = true;
}
