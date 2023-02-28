<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \App\Models\Gejala;
use RealRashid\SweetAlert\Facades\Alert;

class GejalaController extends Controller
{

    public function index()
    {
        $var['title'] = 'Admin | Gejala';
        $var['gejala'] = DB::table('gejalas')->get();
        return view('admin.gejala', $var);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        Gejala::create([
            'kode_gejala' => $request->kode_gejala,
            'gejala' => $request->gejala
        ]);
        Alert::success('Berhasil', 'Data gejala berhasil disimpan');
        return redirect('/admin-gejala');
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
        $update = [
            'kode_gejala' => $request->kode_gejala,
            'gejala' => $request->gejala
        ];

        Gejala::find($id)->update($update);
        Alert::success('Berhasil', 'Data gejala berhasil diperbaharui');
        return redirect('/admin-gejala');
    }

    public function destroy($id)
    {
        Gejala::where('id', $id)->delete();
        Alert::success('Berhasil', 'Data gejala berhasil dihapus');
        return redirect('/admin-gejala');
    }
}
