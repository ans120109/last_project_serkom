@extends('layout.app')

@section('title', 'Profil Pengguna - Panel Sekolah')

@section('content')
<div class="container" style="max-width: 500px; margin-top: 50px;">

    <div style="text-align: center; margin-bottom: 20px;">
        <span style="font-size: 3rem;">👤</span>
        <h2>Profil Pengguna</h2>
        <p class="subtitle">Informasi akun yang sedang aktif</p>
    </div>

    <hr style="margin-bottom: 20px;">

    <div style="background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.05);">
        <div style="margin-bottom: 15px;">
            <strong style="color: #4a5568;">Nama Lengkap:</strong>
            <p style="font-size: 1.1rem; color: #2d3748; margin-top: 4px;">{{ Auth::user()->name }}</p>
        </div>

        <div style="margin-bottom: 15px;">
            <strong style="color: #4a5568;">username:</strong>
            <p style="font-size: 1.1rem; color: #2d3748; margin-top: 4px;">{{ Auth::user()->username }}</p>
        </div>

        <div style="margin-bottom: 25px;">
            <strong style="color: #4a5568;">Hak Akses (Role):</strong>
            <p style="font-size: 1.1rem; text-transform: uppercase; font-weight: bold; color: #2b6cb0; margin-top: 4px;">
                {{ Auth::user()->role }}
            </p>
        </div>

        <!-- Tombol Logout -->
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" style="width: 100%; background-color: #e53e3e; color: white; padding: 10px; border: none; border-radius: 4px; cursor: pointer; font-weight: bold;">
                Keluar (Logout)
            </button>
        </form>
    </div>

    <div style="text-align: center; margin-top: 20px;">
        <a href="{{ url('/') }}" style="color: #2b6cb0; text-decoration: none; font-size: 0.9rem;">
            ← Kembali ke Beranda
        </a>
    </div>

</div>
@endsection
