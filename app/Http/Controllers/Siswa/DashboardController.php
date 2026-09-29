<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
class DashboardController extends Controller
{
    public function index()
    {
        // Mengarahkan ke view siswa/dashboard.blade.php
        return view('siswa.dashboard');
    }
}
