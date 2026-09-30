@extends('layout.app')

@section('title', 'Profil Sekolah')

@push('styles')
<style>
    .ps-wrap { max-width: 860px; margin: 0 auto; }

    /* Banner. Selector dibuat spesifik supaya tidak tertimpa ".content h1" di style.css */
    .ps-hero { position: relative; overflow: hidden; background: #12234f; padding: 60px 75px; color: #fff; }
    .ps-hero.has-foto { background-size: cover; background-position: center; }
    .ps-hero.has-foto::before { content: ''; position: absolute; inset: 0;
        background: linear-gradient(90deg, rgba(10,22,58,.92), rgba(10,22,58,.5)); }
    .ps-hero > * { position: relative; }
    .ps-hero .ps-label { color: #e8a317; font-size: 12px; letter-spacing: 2px; font-weight: 700; }
    .content .ps-hero h1 { color: #fff; font-size: 34px; font-weight: 700; margin: 12px 0; }
    .content .ps-hero p { color: #d5dbee; max-width: 520px; font-size: 14px; margin: 0; }

    .ps-head { display: flex; justify-content: space-between; align-items: flex-end; margin: 50px 0 20px; }
    .ps-head small { color: #e8a317; font-size: 11px; letter-spacing: 2px; font-weight: 700; }
    .ps-head h2 { margin: 4px 0 0; font-size: 26px; color: #0b1a3f; }
    .ps-btn-edit { background: #e8a317; color: #0b1a3f; padding: 9px 16px; border-radius: 8px;
        font-weight: 700; font-size: 13px; text-decoration: none; }

    .ps-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 15px; }
    .ps-card { display: flex; gap: 14px; background: #fff; border-radius: 10px; padding: 16px;
        box-shadow: 0 1px 5px rgba(0,0,0,.07); }
    .ps-icon { flex: 0 0 42px; height: 42px; border-radius: 10px; background: #fdf0d3;
        display: flex; align-items: center; justify-content: center; font-size: 20px; }
    .ps-card h4 { margin: 0 0 4px; font-size: 13px; color: #0b1a3f; }
    .ps-card p, .ps-card li { margin: 0; font-size: 13px; color: #555; list-style: none; }
    .ps-card ul { margin: 0; padding: 0; }
    .ps-foto { margin-top: 15px; background: #fff; border-radius: 10px; padding: 16px;
        box-shadow: 0 1px 5px rgba(0,0,0,.07); }
    .ps-foto h4 { margin: 0 0 10px; font-size: 13px; color: #0b1a3f; }
    .ps-foto img { display: block; width: 100%; max-height: 380px; object-fit: cover; border-radius: 10px; }

    @media (max-width: 700px) {
        .ps-grid { grid-template-columns: 1fr; }
        .ps-hero { padding: 40px 24px; }
    }
</style>
@endpush

@section('content')
<div class="ps-wrap">

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="ps-hero {{ $profil->foto ? 'has-foto' : '' }}"
         @if($profil->foto) style="background-image: url('{{ $profil->foto_url }}');" @endif>
        <span class="ps-label">PROFIL SEKOLAH</span>
        <h1>{{ $profil->nama }}</h1>
        <p>Mewujudkan generasi yang berkarakter, berprestasi, kreatif, dan siap menghadapi perkembangan zaman.</p>
    </div>

    <div class="ps-head">
        <div>
            <small>IDENTITAS</small>
            <h2>Profil Sekolah</h2>
        </div>

        {{-- Tombol edit hanya muncul untuk admin & operator yang sudah login --}}
        @if(auth()->check() && in_array(auth()->user()->role, ['admin', 'operator']))
            <a href="{{ route('profile-sekolah.edit') }}" class="ps-btn-edit">Edit Profil &amp; Foto</a>
        @endif
    </div>

    <div class="ps-grid">
        <div class="ps-card">
            <div class="ps-icon">🏫</div>
            <div><h4>Nama Sekolah</h4><p>{{ $profil->nama }}</p></div>
        </div>

        <div class="ps-card">
            <div class="ps-icon">📍</div>
            <div><h4>Alamat</h4><p>{{ $profil->alamat }}</p></div>
        </div>

        <div class="ps-card">
            <div class="ps-icon">🎓</div>
            <div><h4>Jenjang</h4><p>{{ $profil->jenjang }}</p></div>
        </div>

        <div class="ps-card">
            <div class="ps-icon">📅</div>
            <div><h4>Tahun Berdiri</h4><p>{{ $profil->tahun_berdiri }}</p></div>
        </div>

        <div class="ps-card">
            <div class="ps-icon">👥</div>
            <div><h4>Jumlah Siswa</h4><p>{{ $profil->jumlah_siswa }}</p></div>
        </div>

        <div class="ps-card">
            <div class="ps-icon">🏆</div>
            <div>
                <h4>Prestasi</h4>
                <ul>
                    @foreach(preg_split('/\r\n|\r|\n/', (string) $profil->prestasi, -1, PREG_SPLIT_NO_EMPTY) as $prestasi)
                        <li>{{ $prestasi }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    @if($profil->foto)
        <div class="ps-foto">
            <h4>Foto Sekolah</h4>
            <img src="{{ $profil->foto_url }}" alt="Foto {{ $profil->nama }}">
        </div>
    @endif
</div>
@endsection
