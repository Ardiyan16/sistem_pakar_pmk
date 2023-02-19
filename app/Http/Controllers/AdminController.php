<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \App\Models\Penyakit;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{

    public function index()
    {
        $var['title'] = 'Admin | Dashboard';
        return view('admin.dashboard', $var);
    }

    // public function penyakit()
    // {
    //     $var['title'] = 'Admin | Penyakit';
    //     $var['penyakit'] = DB::table('penyakits')->get();
    //     return view('admin.penyakit', $var);
    // }

    // public function simpan_penyakit(Request $request)
    // {

    // }
}
