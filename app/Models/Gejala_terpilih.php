<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gejala_terpilih extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_kunjungan',
        'id_gejala'
    ];
}
