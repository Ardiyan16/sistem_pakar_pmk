<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \App\Models\Penyakit;
use \App\Models\Gejala;
use \App\Models\Knowladge;
use \App\Models\Bobot_keyakinan;
use \App\Models\Kontak;
use \App\Models\Kunjungan;
use \App\Models\Gejala_terpilih;
use RealRashid\SweetAlert\Facades\Alert;

class PagesController extends Controller
{

    //Function Halaman Home
    public function index()
    {
        $var['title'] = 'SP-PMK | Home';
        $var['penyakit_muncul'] = DB::select("SELECT kunjungans.*, penyakits.nama_penyakit, count(cast(hasil as unsigned)) as jml_kunjungan FROM kunjungans JOIN penyakits ON kunjungans.hasil = penyakits.kode_klasifikasi GROUP BY kunjungans.hasil ORDER BY jml_kunjungan DESC");
        // dd($var['penyakit_muncul']);
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

    private function perhitungan_diagnosa($data)
    {
        // dd(count($data['P01']) >= 3 && count($data['P02']) >= 3);
        // $data_penyakit = [];
        // $gejala_dipilih = [];
        // foreach($data['bobot_gejala'] as $value) {
        //     if(!empty($value)) {
        //         $opts = explode('+', $value);
        //         $data_gejala[] = $opts[0];
        //         $gejala = DB::table('knowladges')->where('kd_gejala' ,$opts[0])->get();

        //         foreach($gejala as $valuegejala) {
        //             if(empty($data_penyakit[$valuegejala->kd_diagnosa])) {
        //                 $data_penyakit[$valuegejala->kd_diagnosa] = [$valuegejala, [$valuegejala, $opts[1], $valuegejala->nilai_mb, $valuegejala->kd_diagnosa, $valuegejala->kd_gejala]];
        //             } else {
        //                 array_push($data_penyakit[$valuegejala->kd_diagnosa], [$valuegejala, $opts[1], $valuegejala->nilai_mb, $valuegejala->kd_diagnosa, $valuegejala->kd_gejala]);
        //             }
        //         }
        //     }
        // }

        // dd($data);
        // dd(count($data_penyakit['P02']));die;
            $cf_value = null;
            // $p01 = 0;
            // $p02 = 0;
            // $i = 0;
            $count_p01 = count($data['P01']) ?? '0';
            $count_p02 = count($data['P02']) ?? '0';
            if($count_p01 >= 3 && $count_p02 >= 3) {
                foreach($data as $final) {
                    // dd($final);die;
                    if(count($final) < 3) {
                        continue;
                    }
                    $cf1 = null;
                    $cf2 = null;
                    $cf_combine = 0;
                    $hasil_cf = null;
                    // dd($final);
                    foreach($final as $key => $value) {
                        // if($key > 0) {
                        //     $data_test[] = $final[$key][3];
                        // }
                        if($key > 0) {
                            if($cf_combine != 0) {
                                $cf1 = $cf_combine ;
                                $cf2 = $final[$key][2] * $final[$key][1];

                                if($cf1 < 0 || $cf2 < 0) {
                                    $cf_combine = ($cf1 + $cf2) / (1 - min($cf1, $cf2));
                                } else {
                                    $cf_combine = $cf1 + ($cf2 * (1 - $cf1));
                                }

                                $hasil_cf = $cf_combine;
                            } else {
                                $cf2  = $final[$key][2] * $final[$key][1];

                                if($cf1 < 0 || $cf2 < 0) {
                                    $cf_combine = ($cf1 + $cf2) / (1 - min($cf1, $cf2));
                                } else {
                                    $cf_combine = $cf1 + ($cf2 * (1 - $cf1));
                                }

                                $hasil_cf = $cf_combine;
                            }
                        }

                        if(count($final) - 1 == $key) {
                            if($cf_value == null) {
                                $cf_value = [$hasil_cf, "{$final[0]->kd_diagnosa} ({$final[0]->kd_gejala})"];
                            } else {
                                $cf_value = ($hasil_cf > $cf_value[0])
                                    ? [$hasil_cf, "{$final[0]->kd_diagnosa} ({$final[0]->kd_gejala})"]
                                    : $cf_value;
                            }

                            $hasil_diagnosa[$final[0]->kd_diagnosa]['hasil_cf'] = $hasil_cf * 100;

                            $cf1 = null;
                            $cf2 = null;
                            $cf_combine = 0;
                            $hasil_cf = null;
                        }

                        if(empty($hasil_diagnosa[$final[0]->kd_diagnosa])) {
                                $hasil_diagnosa[$final[0]->kd_diagnosa] = [
                                    // 'nama_penyakit' => $final[0]->kd_penyakit,
                                    'kode_penyakit' => $final[0]->kd_diagnosa,
                                    'hasil_cf' => $hasil_cf * 100
                                ];
                        }
                    }
                }
                // dd($hasil_diagnosa);
                if(count($hasil_diagnosa) > 1) {
                    if($hasil_diagnosa['P01']['hasil_cf'] > $hasil_diagnosa['P02']['hasil_cf']) {
                        $data_diagnosa = $hasil_diagnosa['P01']['kode_penyakit'];
                        $nilai_hasil = $hasil_diagnosa['P01']['hasil_cf'];
                        $data_diagnosa2 = $hasil_diagnosa['P02']['kode_penyakit'];
                        $nilai_hasil2 = $hasil_diagnosa['P02']['hasil_cf'];
                    }
                    else if($hasil_diagnosa['P02']['hasil_cf'] > $hasil_diagnosa['P01']['hasil_cf']) {
                        $data_diagnosa = $hasil_diagnosa['P02']['kode_penyakit'];
                        $nilai_hasil = $hasil_diagnosa['P02']['hasil_cf'];
                        $data_diagnosa2 = $hasil_diagnosa['P01']['kode_penyakit'];
                        $nilai_hasil2 = $hasil_diagnosa['P01']['hasil_cf'];
                    }
                    else if($hasil_diagnosa['P01']['hasil_cf'] = $hasil_diagnosa['P02']['hasil_cf']) {
                        $data_diagnosa = $hasil_diagnosa['P02']['kode_penyakit'];
                        $nilai_hasil = $hasil_diagnosa['P02']['hasil_cf'];
                        $data_diagnosa2 = $hasil_diagnosa['P01']['kode_penyakit'];
                        $nilai_hasil2 = $hasil_diagnosa['P01']['hasil_cf'];
                    }
                }
            } else {
                foreach($data as $final) {
                    // dd($final);die;
                    if(count($final) >= 3) {
                        // $nilaiiiiii[] = $final;
                        $cf1 = null;
                        $cf2 = null;
                        $cf_combine = 0;
                        $hasil_cf = null;
                        $hasil_diagnosa = [];
                        // dd($final);
                        foreach($final as $key => $value) {
                            // if($key > 0) {
                            //     $data_test[] = $final[$key][3];
                            // }
                            if($key > 0) {
                                if($cf_combine != 0) {
                                    $cf1 = $cf_combine ;
                                    $cf2 = $final[$key][2] * $final[$key][1];

                                    if($cf1 < 0 || $cf2 < 0) {
                                        $cf_combine = ($cf1 + $cf2) / (1 - min($cf1, $cf2));
                                    } else {
                                        $cf_combine = $cf1 + ($cf2 * (1 - $cf1));
                                    }

                                    $hasil_cf = $cf_combine;
                                } else {
                                    $cf2  = $final[$key][2] * $final[$key][1];

                                    if($cf1 < 0 || $cf2 < 0) {
                                        $cf_combine = ($cf1 + $cf2) / (1 - min($cf1, $cf2));
                                    } else {
                                        $cf_combine = $cf1 + ($cf2 * (1 - $cf1));
                                    }

                                    $hasil_cf = $cf_combine;
                                }
                            }

                            if(count($final) - 1 == $key) {
                                if($cf_value == null) {
                                    $cf_value = [$hasil_cf, "{$final[0]->kd_diagnosa} ({$final[0]->kd_gejala})"];
                                } else {
                                    $cf_value = ($hasil_cf > $cf_value[0])
                                        ? [$hasil_cf, "{$final[0]->kd_diagnosa} ({$final[0]->kd_gejala})"]
                                        : $cf_value;
                                }

                                $hasil_diagnosa[$final[0]->kd_diagnosa]['hasil_cf'] = $hasil_cf * 100;

                                $cf1 = null;
                                $cf2 = null;
                                $cf_combine = 0;
                                $hasil_cf = null;
                            }

                            if(empty($hasil_diagnosa[$final[0]->kd_diagnosa])) {
                                    $hasil_diagnosa[$final[0]->kd_diagnosa] = [
                                        // 'nama_penyakit' => $final[0]->kd_penyakit,
                                        'kode_penyakit' => $final[0]->kd_diagnosa,
                                        'hasil_cf' => $hasil_cf * 100
                                    ];
                            }
                        }
                        // dd(count($hasil_diagnosa));
                        if(count($hasil_diagnosa) == 1) {
                            if($hasil_diagnosa[$final[0]->kd_diagnosa]) {
                                $data_diagnosa = $hasil_diagnosa[$final[0]->kd_diagnosa]['kode_penyakit'];
                                $nilai_hasil = $hasil_diagnosa[$final[0]->kd_diagnosa]['hasil_cf'];
                                $data_diagnosa2 = '-';
                                $nilai_hasil2 = '0';
                            }

                            // else {
                            //     $data_diagnosa = $hasil_diagnosa['P02']['kode_penyakit'];
                            //     $nilai_hasil = $hasil_diagnosa['P02']['hasil_cf'];
                            //     $data_diagnosa2 = '-';
                            //     $nilai_hasil2 = '0';
                            // }
                        }

                    }
                }
            }

            // dd([$data_diagnosa, $nilai_hasil, $data_diagnosa2, $nilai_hasil2]);die;

            return [
                'data_diagnosa' => $data_diagnosa,
                'nilai_hasil'   => $nilai_hasil,
                'data_diagnosa2' => $data_diagnosa2,
                'nilai_hasil2'   => $nilai_hasil2,
                // 'data_gejala'   => $data_gejala
            ];
        //}

    }

    private function perhitungan_diagnosa2($data)
    {
        foreach($data as $final) {
            // dd($final);
            if(count($final) >= 3) {
                $cf1 = null;
                $cf2 = null;
                $cf_value = null;
                $cf_combine = 0;
                $hasil_cf = null;
                $hasil_diagnosa = [];
                foreach($final as $key => $value) {
                    // if($key > 0) {
                    //     $data_test[] = $final[$key][3];
                    // }
                    if($key == 0) {
                        continue;
                    } else {
                        if($cf_combine != 0) {
                            $cf1 = $cf_combine ;
                            $cf2 = $final[$key][2] * $final[$key][1];

                            if($cf1 < 0 || $cf2 < 0) {
                                $cf_combine = ($cf1 + $cf2) / (1 - min($cf1, $cf2));
                            } else {
                                $cf_combine = $cf1 + ($cf2 * (1 - $cf1));
                            }

                            $hasil_cf = $cf_combine;
                        } else {
                            $cf2  = $final[$key][2] * $final[$key][1];

                            if($cf1 < 0 || $cf2 < 0) {
                                $cf_combine = ($cf1 + $cf2) / (1 - min($cf1, $cf2));
                            } else {
                                $cf_combine = $cf1 + ($cf2 * (1 - $cf1));
                            }

                            $hasil_cf = $cf_combine;
                        }
                    }

                    if(count($final) - 1 == $key) {
                        if($cf_value == null) {
                            $cf_value = [$hasil_cf, "{$final[0]->kd_diagnosa} ({$final[0]->kd_gejala})"];
                        } else {
                            $cf_value = ($hasil_cf > $cf_value[0])
                                ? [$hasil_cf, "{$final[0]->kd_diagnosa} ({$final[0]->kd_gejala})"]
                                : $cf_value;
                        }

                        $hasil_diagnosa[$final[0]->kd_diagnosa] = [
                            'kode_penyakit' => $final[0]->kd_diagnosa,
                            'hasil_cf' => $hasil_cf * 100,
                        ];

                        $cf1 = null;
                        $cf2 = null;
                        $cf_combine = 0;
                        $hasil_cf = null;
                    }

                }
            }

        }

        if($hasil_diagnosa[$final[0]->kd_diagnosa]) {
            $data_diagnosa = $hasil_diagnosa[$final[0]->kd_diagnosa]['kode_penyakit'];
            $nilai_hasil = $hasil_diagnosa[$final[0]->kd_diagnosa]['hasil_cf'];
            $data_diagnosa2 = '-';
            $nilai_hasil2 = '0';
        }
        // dd([$data_diagnosa, $nilai_hasil]);


        return [
            'data_diagnosa' => $data_diagnosa,
            'nilai_hasil'   => $nilai_hasil,
            'data_diagnosa2' => $data_diagnosa2,
            'nilai_hasil2'   => $nilai_hasil2,
        ];
    }


    // dd($request);
    // $request->validate([
    //     'nama' => 'required',
    //     'usia' => 'required',
    //     'alamat' => 'required',
    // ], [
    //     'nama.required' => 'Nama Lengkap is required (Nama Lengkap harus diisi)',
    //     'usia.required' => 'Usia is required (Usia harus diisi)',
    //     'alamat.required' => 'Alamat is required (Alamat harus diisi)'
    // ]);
    public function action_konsultasi(Request $request)
    {

        $data = $request->all();
        $jml_gjl_dipilih = 0;
        foreach($data['bobot_gejala'] as $value) {
            if(!empty($value)) {
                $jml_gjl_dipilih += 1;
                $opts = explode('+', $value);
                $data_gejala[] = $opts[0];
                $gejala = DB::table('knowladges')->where('kd_gejala' ,$opts[0])->get();

                foreach($gejala as $valuegejala) {
                    if(empty($data_penyakit[$valuegejala->kd_diagnosa])) {
                        $data_penyakit[$valuegejala->kd_diagnosa] = [$valuegejala, [$valuegejala, $opts[1], $valuegejala->nilai_mb, $valuegejala->kd_diagnosa, $valuegejala->kd_gejala]];
                    } else {
                        array_push($data_penyakit[$valuegejala->kd_diagnosa], [$valuegejala, $opts[1], $valuegejala->nilai_mb, $valuegejala->kd_diagnosa, $valuegejala->kd_gejala]);
                    }
                }
            }
        }

        // dd($data_penyakit);die;
        if($jml_gjl_dipilih <= 0) {
            Alert::warning('Gagal', 'Anda belum memilih gejala!');
            return redirect('sp-konsultasi');
        }

        if($jml_gjl_dipilih < 2) {
            Alert::warning('Gagal', 'Anda harus memilih lebih dari satu gejala!');
            return redirect('sp-konsultasi');
        }

        // $jml_p01 = count($data_penyakit['P01']);
        // $jml_p02 = count($data_penyakit['P02']);

        if(empty($data_penyakit['P01']) || empty($data_penyakit['P02'])) {
            $get_data = $this->perhitungan_diagnosa2($data_penyakit);
        } else {
            $get_data = $this->perhitungan_diagnosa($data_penyakit);
        }

        $kunjungan = [
            'nama'          => '-',
            'usia'          => '-',
            'alamat'        => '-',
            'hasil'         => $get_data['data_diagnosa'],
            'nilai_hasil'   => $get_data['nilai_hasil'],
            'hasil_2'         => $get_data['data_diagnosa2'],
            'nilai_hasil_2'   => $get_data['nilai_hasil2']
        ];
        Kunjungan::create($kunjungan);
        $id_kunjungan = DB::table('kunjungans')
                            ->select('id')
                            ->orderBy('id', 'DESC')
                            ->first();
        foreach($data_gejala as $value) {
            $detail_kunjungan = [
                'id_kunjungan' => $id_kunjungan->id,
                'id_gejala'    => $value
            ];
            Gejala_terpilih::create($detail_kunjungan);
        }

        Alert::success('Berhasil', 'Konsultasi telah berhasil');
        return redirect('sp-hasilkonsultasi/' . $id_kunjungan->id);
    }


    public function hasil_konsultasi($id)
    {
        $var['title'] = 'SP-PMK | Hasil Konsultasi';
        $var['kunjungan'] = DB::table('kunjungans')
                                    ->select('kunjungans.*', 'penyakits.nama_penyakit', 'penyakits.keterangan_penyakit', 'penyakits.saran_pengobatan')
                                    ->leftJoin('penyakits', 'kunjungans.hasil', '=', 'penyakits.kode_klasifikasi')
                                    ->where('kunjungans.id', $id)
                                    ->first();
        $var['detail_kunjungan'] = DB::table('gejala_terpilihs')
                                    ->select('gejala_terpilihs.*', 'gejalas.gejala')
                                    ->leftJoin('gejalas', 'gejala_terpilihs.id_gejala', '=', 'gejalas.kode_gejala')
                                    ->where('id_kunjungan', $id)
                                    ->get();
        // dd($var['detail_kunjungan']);die;
        return view('pages/hasil_diagnosa', $var);
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
        $var['kunjungan'] = DB::table('kunjungans')
                            ->select('kunjungans.*', 'penyakits.nama_penyakit', 'penyakits.keterangan_penyakit', 'penyakits.saran_pengobatan')
                            ->leftJoin('penyakits', 'kunjungans.hasil', '=', 'penyakits.kode_klasifikasi')
                            ->orderBy('id', 'DESC')
                            ->get();
        // $var['detail_kunjungan'] = DB::table('gejala_terpilihs')
        //                     ->select('gejala_terpilihs.*', 'gejalas.gejala')
        //                     ->leftJoin('gejalas', 'gejala_terpilihs.id_gejala', '=', 'gejalas.kode_gejala')
        //                     ->get();
        return view('pages.riwayat', $var);
    }

}
