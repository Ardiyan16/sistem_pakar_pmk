<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \App\Models\Penyakit;
use \App\Models\Gejala;
use \App\Models\Knowladge;
use \App\Models\Bobot_keyakinan;
use \App\Models\Kontak;
use RealRashid\SweetAlert\Facades\Alert;

class PagesController extends Controller
{

    //Function Halaman Home
    public function index()
    {
        $var['title'] = 'SP-PMK | Home';
        return view('pages.home', $var);
    }

    //Function Halaman Informasi
    public function informasi()
    {
        $var['title'] = 'SP-PMK | Informasi';
        $var['penyakit'] = Penyakit::all();
        $var['gejala'] = Gejala::all();
        $var['knowladge'] = DB::table('knowladges')
                            ->select('knowladges.*', 'gejalas.kode_gejala', 'gejalas.gejala', 'penyakits.kode_klasifikasi', 'penyakits.nama_penyakit')
                            ->leftJoin('gejalas', 'gejalas.kode_gejala', 'knowladges.kd_gejala')
                            ->leftJoin('penyakits', 'penyakits.kode_klasifikasi', 'knowladges.kd_diagnosa')
                            ->get();
        $var['bobot'] = Bobot_keyakinan::all();
        return view('pages.informasi', $var);
    }

    //Function Halaman Konsultasi
    public function konsultasi()
    {
        $var['title'] = 'SP-PMK | Konsultasi';
        $var['gejala'] = Gejala::all();
        $var['bobot'] = Bobot_keyakinan::all();
        return view('pages.konsultasi', $var);
    }

    //Function Halaman Kontak
    public function kontak()
    {
        $var['title'] = 'SP-PMK | Kontak';
        return view('pages.kontak', $var);
    }

    public function kirim_pesan(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            'email' => 'required',
            'perihal' => 'required',
            'pesan' => 'required'
        ], [
            'nama_lengkap.required' => 'Nama Lengkap is required (Nama Lengkap harus diisi)!',
            'email.required' => 'Email is required (Email harus diisi)!',
            'perihal.required' => 'Perihal is required (Perihal harus diisi)!',
            'pesan.required' => 'Pesan is required (Pesan harus diisi)!'
        ]);

        Kontak::create([
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $request->email,
            'perihal' => $request->perihal,
            'pesan' => $request->pesan
        ]);
        Alert::success('Berhasil', 'Pesan berhasil terkirim');
        return redirect('/sp-kontak');
    }

    public function riwayat()
    {
        $var['title'] = 'SP-PMK | Riwayat';
        return view('pages.riwayat', $var);
    }

}

