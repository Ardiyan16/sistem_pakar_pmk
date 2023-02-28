<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \App\Models\Rule;
use RealRashid\SweetAlert\Facades\Alert;

class RuleController extends Controller
{

    public function index()
    {
        $var['title'] = 'Admin | Rule';
        $var['rule'] = DB::table('rules')->get();
        $var['gejala'] = DB::table('gejalas')->get();
        $var['penyakit'] = DB::table('penyakits')->get();
        return view('admin.rules', $var);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        Rule::create([
            'kd_gejala' => $request->kd_gejala,
            'kd_penyakit' => $request->kd_penyakit
        ]);
        Alert::success('Berhasil', 'Data rule berhasil disimpan');
        return redirect('/admin-rules');
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
            'kd_gejala' => $request->kd_gejala,
            'kd_penyakit' => $request->kd_penyakit
        ];

        Rule::find($id)->update($update);
        Alert::success('Berhasil', 'Data rule berhasil diperbaharui');
        return redirect('/admin-rules');
    }

    public function destroy($id)
    {
        Rule::where('id', $id)->delete();
        Alert::success('Berhasil', 'Data rule berhasil dihapus');
        return redirect('/admin-rules');
    }
}
