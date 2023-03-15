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


    public function action_konsultasi(Request $request)
    {
        // dd($request);
        $request->validate([
            'nama' => 'required',
            'usia' => 'required',
            'alamat' => 'required',
        ], [
            'nama.required' => 'Nama Lengkap is required (Nama Lengkap harus diisi)',
            'usia.required' => 'Usia is required (Usia harus diisi)',
            'alamat.required' => 'Alamat is required (Alamat harus diisi)'
        ]);

        $data = $request->all();
        $get_data = $this->perhitungan_diagnosa($data);

    }

    private function perhitungan_diagnosa($data)
    {
        $data_penyakit = [];
        $gejala_dipilih = [];
        foreach($data['bobot_gejala'] as $value) {
            if(!empty($value)) {
                $opts = explode('+', $value);
                $gejala = Knowladge::where('kd_gejala' ,$opts[0])->first();

                if(empty($data_penyakit[$gejala->kd_diagnosa])) {
                    $data_penyakit[$gejala->kd_diagnosa] = [$gejala, [$gejala, $opts[1], $gejala->nilai_mb]];
                } else {
                    array_push($data_penyakit[$gejala->kd_diagnosa], [$gejala, $opts[1], $gejala->nilai_mb]);
                }
            }
        }
        dd($data_penyakit);
    }

    public function hasil_konsultasi()
    {
        $var['title'] = 'SP-PMK | Hasil Konsultasi';

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

