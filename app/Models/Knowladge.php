<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Knowladge extends Model
{
    use HasFactory;
    protected $fillable = [
        'kd_gejala',
        'kd_penyakit',
        'nilai_mb'
    ];
}
