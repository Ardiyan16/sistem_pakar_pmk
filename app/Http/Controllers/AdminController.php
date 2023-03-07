<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \App\Models\Penyakit;
use \App\Models\Kontak;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{

    public function index()
    {
        $var['title'] = 'Admin | Dashboard';
        return view('admin.dashboard', $var);
    }

    public function pesan()
    {
        $var['title'] = 'Admin | Pesan';
        $var['pesan'] = Kontak::all();
        return view('admin.pesan', $var);
    }
}
