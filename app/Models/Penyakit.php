<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyakit extends Model
{
    use HasFactory;
    protected $fillable = [
        'kode_klasifikasi',
        'nama_penyakit',
        'keterangan_penyakit',
        'saran_pengobatan'
    ];
}
