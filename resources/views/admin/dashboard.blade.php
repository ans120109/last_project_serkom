@extends('layout.app')

@section('title', 'Dashboard - SMA Cendekia Nusantara')

@section('content')
<div class="dashboard-container">
    <h1>Dashboard Utama</h1>
    <p class="subtitle">Selamat datang kembali di Panel Akademik SMA Cendekia Nusantara.</p>

    <hr>

    <!-- Kotak Ringkasan / Statistik Singkat -->
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px; margin-bottom: 30px;">
        <div style="background: #edf2f7; padding: 20px; border-radius: 6px; border-left: 4px solid #2b6cb0;">
            <h4 style="color: #2b6cb0; margin-bottom: 5px;">Total Siswa</h4>
            <p style="font-size: 1.5rem; font-weight: bold; color: #2d3748;">450</p>
        </div>
        <div style="background: #edf2f7; padding: 20px; border-radius: 6px; border-left: 4px solid #319795;">
            <h4 style="color: #319795; margin-bottom: 5px;">Total Guru</h4>
            <p style="font-size: 1.5rem; font-weight: bold; color: #2d3748;">35</p>
        </div>
        <div style="background: #edf2f7; padding: 20px; border-radius: 6px; border-left: 4px solid #d69e2e;">
            <h4 style="color: #d69e2e; margin-bottom: 5px;">Mata Pelajaran</h4>
            <p style="font-size: 1.5rem; font-weight: bold; color: #2d3748;">18</p>
        </div>
    </div>

    <!-- Menu / Fitur Cepat di Dashboard -->
    <div class="section-item">
        <h3>👤 Pengelolaan Data User</h3>
        <p>Kelola akun admin, guru, dan siswa — tambah, ubah, atau hapus data pengguna sistem.</p>
        <a href="{{ route('admin.users.index') }}" class="dashboard-link">Kelola Data User &rarr;</a>
    </div>

    <div class="section-item">
        <h3>📊 Pengelolaan Data Akademik</h3>
        <p>Akses cepat untuk memperbarui data nilai, absensi, serta memantau kegiatan belajar mengajar secara real-time.</p>
    </div>

    <div class="section-item">
        <h3>📢 Pengumuman Sekolah</h3>
        <p>Belum ada pengumuman baru yang diterbitkan hari ini. Gunakan panel admin untuk membuat informasi baru.</p>
    </div>
</div>
@endsection

@push('styles')
<style>
.dashboard-link {
    display: inline-block;
    margin-top: 10px;
    color: #ca8a04;
    font-weight: 600;
    font-size: 14px;
    text-decoration: none;
}

.dashboard-link:hover {
    text-decoration: underline;
}
</style>
@endpush
