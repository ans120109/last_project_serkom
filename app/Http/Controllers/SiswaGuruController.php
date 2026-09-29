<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiswaGuruController extends Controller
{
    public function create()
    {
        return view('siswa-guru.create');
    }

    public function store(Request $request)
    {
        // proses simpan data
    }
}
