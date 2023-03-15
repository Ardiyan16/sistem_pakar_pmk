<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Knowladge extends Model
{
    use HasFactory;
    protected $fillable = [
        'kd_diagnosa',
        'kd_gejala',
        'nilai_mb'
    ];
}
