<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \App\Models\Bobot_keyakinan;
use RealRashid\SweetAlert\Facades\Alert;

class BobotController extends Controller
{

    public function index()
    {
        $var['title'] = 'Admin | Bobot Keyakinan';
        $var['bobot'] = DB::table('bobot_keyakinans')->get();
        return view('admin.bobot', $var);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        Bobot_keyakinan::create([
            'keterangan' => $request->keterangan,
            'nilai_bobot' => $request->nilai_bobot
        ]);
        Alert::success('Berhasil', 'Data nilai bobot berhasil disimpan');
        return redirect('/admin-bobot');
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
            'keterangan' => $request->keterangan,
            'nilai_bobot' => $request->nilai_bobot
        ];

        Bobot_keyakinan::find($id)->update($update);
        Alert::success('Berhasil', 'Data nilai bobot berhasil diperbaharui');
        return redirect('/admin-bobot');
    }

    public function destroy($id)
    {
        Bobot_keyakinan::where('id', $id)->delete();
        Alert::success('Berhasil', 'Data nilai bobot berhasil dihapus');
        return redirect('/admin-bobot');
    }
}
