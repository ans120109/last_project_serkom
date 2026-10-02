@extends('layout.app')

@section('title', 'Profile Sekolah')

@section('content')
<main class="content">
    <div class="container">
        <h1 class="page-title">Profile Sekolah</h1>
        <p class="page-subtitle">Informasi lengkap tentang {{ $profil->nama_sekolah }}.</p>
        <hr class="divider">

        @if (session('success'))
            <div class="alert-success">{{ session('success') }}</div>
        @endif

        @if ($profil->foto)
            <div class="card" style="padding:0; overflow:hidden;">
                <img src="{{ asset('storage/' . $profil->foto) }}"
                     alt="{{ $profil->nama_sekolah }}"
                     style="width:100%; max-height:300px; object-fit:cover; display:block;">
            </div>
        @endif

        <div class="card">
            <h2>🏫 Tentang Sekolah</h2>
            <p class="muted" style="line-height:1.8;">
                {!! nl2br(e($profil->tentang ?? 'Belum ada deskripsi.')) !!}
            </p>
        </div>

        <div class="card">
            <h2>🎯 Visi & Misi</h2>

            @if ($profil->visi)
                <h3 style="color:#d99a22; font-size:16px; margin:12px 0 6px;">Visi</h3>
                <p class="muted" style="font-style:italic;">"{{ $profil->visi }}"</p>
            @endif

            @if ($profil->misi)
                <h3 style="color:#d99a22; font-size:16px; margin:16px 0 6px;">Misi</h3>
                <ol class="muted" style="padding-left:20px; line-height:1.9;">
                    @foreach (explode("\n", $profil->misi) as $misi)
                        @if (trim($misi))
                            <li>{{ trim($misi) }}</li>
                        @endif
                    @endforeach
                </ol>
            @endif
        </div>

        <div class="card">
            <h2>📊 Statistik Sekolah</h2>

            <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(140px, 1fr)); gap:16px; margin-top:16px;">
                <div style="background:#f7f5ef; border-radius:8px; padding:20px; text-align:center;">
                    <div style="font-size:28px; font-weight:bold; color:#d99a22;">
                        {{ $profil->jumlah_siswa ?? 0 }}+
                    </div>
                    <div class="muted" style="font-size:13px;">Siswa Aktif</div>
                </div>

                <div style="background:#f7f5ef; border-radius:8px; padding:20px; text-align:center;">
                    <div style="font-size:28px; font-weight:bold; color:#d99a22;">
                        {{ $profil->tahun_berdiri ?? '-' }}
                    </div>
                    <div class="muted" style="font-size:13px;">Tahun Berdiri</div>
                </div>

                <div style="background:#f7f5ef; border-radius:8px; padding:20px; text-align:center;">
                    <div style="font-size:22px; font-weight:bold; color:#d99a22;">
                        {{ $profil->jenjang ?? '-' }}
                    </div>
                    <div class="muted" style="font-size:13px;">Jenjang</div>
                </div>
            </div>
        </div>

        @if ($profil->prestasi)
            <div class="card">
                <h2>🏆 Prestasi</h2>
                <ul class="muted" style="padding-left:20px; line-height:1.9; margin-top:12px;">
                    @foreach (explode("\n", $profil->prestasi) as $p)
                        @if (trim($p))
                            <li>{{ trim($p) }}</li>
                        @endif
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card">
            <h2>📞 Kontak & Lokasi</h2>

            <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(220px, 1fr)); gap:16px; margin-top:16px;">
                <div style="display:flex; gap:12px;">
                    <span style="font-size:22px;">📍</span>
                    <div>
                        <strong style="font-size:14px; color:#0d1b3e;">Alamat</strong>
                        <p class="muted" style="font-size:14px; margin-top:2px;">
                            {{ $profil->alamat ?? 'Belum diisi' }}
                        </p>
                    </div>
                </div>

                <div style="display:flex; gap:12px;">
                    <span style="font-size:22px;">📅</span>
                    <div>
                        <strong style="font-size:14px; color:#0d1b3e;">Tahun Berdiri</strong>
                        <p class="muted" style="font-size:14px; margin-top:2px;">
                            {{ $profil->tahun_berdiri ?? '-' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        @auth
            @if (Auth::user()->role === 'admin' || Auth::user()->role === 'operator')
                <div class="action-buttons" style="margin-top:20px;">
                    <a href="{{ route('profile-sekolah.edit') }}" class="btn-action">
                        ✏️ Edit Profile Sekolah
                    </a>
                </div>
            @endif
        @endauth

    </div>
</main>
@endsection
