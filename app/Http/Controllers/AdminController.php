<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \App\Models\Penyakit;
use \App\Models\Kontak;
use \App\Models\Kunjungan;
use \App\Models\Gejala;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{

    public function index()
    {
        $var['title'] = 'Admin | Dashboard';
        $var['total_kunjungan'] = Kunjungan::count();
        $var['total_penyakit'] = Penyakit::count();
        $var['total_gejala'] = Gejala::count();
        $var['total_pesan'] = Kontak::count();
        return view('admin.dashboard', $var);
    }

    public function pesan()
    {
        $var['title'] = 'Admin | Pesan';
        $var['pesan'] = Kontak::all();
        return view('admin.pesan', $var);
    }

    public function riwayat()
    {
        $var['title'] = 'Admin | Riwayat';
        $var['kunjungan'] = DB::table('kunjungans')
                            ->select('kunjungans.*', 'penyakits.nama_penyakit', 'penyakits.keterangan_penyakit', 'penyakits.saran_pengobatan')
                            ->leftJoin('penyakits', 'kunjungans.hasil', '=', 'penyakits.kode_klasifikasi')
                            ->orderBy('id', 'DESC')
                            ->get();
        return view('admin.riwayat', $var);
    }
}
