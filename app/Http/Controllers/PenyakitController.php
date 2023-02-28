<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \App\Models\Penyakit;
use RealRashid\SweetAlert\Facades\Alert;

class PenyakitController extends Controller
{

    public function index()
    {
        $var['title'] = 'Admin | Penyakit';
        $var['penyakit'] = DB::table('penyakits')->get();
        return view('admin.penyakit', $var);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        Penyakit::create([
            'kode_klasifikasi' => $request->kode_klasifikasi,
            'nama_penyakit' => $request->nama_penyakit,
            'keterangan_penyakit' => $request->keterangan_penyakit,
            'saran_pengobatan' => $request->saran_pengobatan
        ]);
        Alert::success('Berhasil', 'Data penyakit berhasil disimpan');
        return redirect('/admin-penyakit');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request)
    {
        $id = $request->id;
        Penyakit::find($id)->update([
            'kode_klasifikasi' => $request->kode_klasifikasi,
            'nama_penyakit' => $request->nama_penyakit,
            'keterangan_penyakit' => $request->keterangan_penyakit,
            'saran_pengobatan' => $request->saran_pengobatan
        ]);
        Alert::success('Berhasil', 'Data penyakit berhasil diperbaharui');
        return redirect('/admin-penyakit');
    }

    public function destroy($id)
    {
        Penyakit::where('id', $id)->delete();
        Alert::success('Berhasil', 'Data penyakit berhasil dihapus');
        return redirect('/admin-penyakit');
    }
}
