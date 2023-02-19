<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{

    public function index()
    {
        $var['title'] = 'Sistem Pakar | Home';
        return view('pages.home', $var);
    }

    

}

