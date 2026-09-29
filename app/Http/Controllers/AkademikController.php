<?php
namespace App\Http\Controllers;
class AkademikController extends Controller
{
    public function index()
    {
        return view('akademik'); // Memanggil file akademik.blade.php
    }
}
