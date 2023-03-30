<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kunjungan extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'usia',
        'alamat',
        'hasil',
        'nilai_hasil'
    ];
}
