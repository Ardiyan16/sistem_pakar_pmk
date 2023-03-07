<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \App\Models\Knowladge;
use RealRashid\SweetAlert\Facades\Alert;

class KnowladgeController extends Controller
{
    public function index()
    {
        $var['title'] = 'Admin | Knowladge';
        $var['gejala'] = DB::table('gejalas')->get();
        $var['penyakit'] = DB::table('penyakits')->get();
        $var['knowladge'] = DB::table('knowladges')
                            ->select('knowladges.*', 'gejalas.kode_gejala', 'gejalas.gejala', 'penyakits.kode_klasifikasi', 'penyakits.nama_penyakit')
                            ->leftJoin('gejalas', 'gejalas.kode_gejala', 'knowladges.kd_gejala')
                            ->leftJoin('penyakits', 'penyakits.kode_klasifikasi', 'knowladges.kd_diagnosa')
                            ->get();
        // dd($var['knowladge']);
        return view('admin.knowladge', $var);
    }

    public function store(Request $request)
    {
        Knowladge::create([
            'kd_gejala' => $request->kd_gejala,
            'kd_diagnosa' => $request->kd_diagnosa,
            'nilai_mb' => $request->nilai_mb
        ]);
        Alert::success('Berhasil', 'Data knowladge berhasil disimpan');
        return redirect('/admin-knowladge');
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $update = [
            'kd_gejala' => $request->kd_gejala,
            'kd_diagnosa' => $request->kd_diagnosa,
            'nilai_mb' => $request->nilai_mb
        ];
        Knowladge::find($id)->update($update);
        Alert::success('Berhasil', 'Data knowladge berhasil diperbaharui');
        return redirect('/admin-knowladge');
    }

    public function destroy($id)
    {
        Knowladge::where('id', $id)->delete();
        Alert::success('Berhasil', 'Data knowladge berhasil dihapus');
        return redirect('/admin-knowladge');
    }
}
