<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
class DashboardController extends Controller
{
    public function index()
    {
        // Mengarahkan ke view guru/dashboard.blade.php
        return view('guru.dashboard');
    }
}
