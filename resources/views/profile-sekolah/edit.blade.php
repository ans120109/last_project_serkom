@extends('layout.app')

@section('title', 'Edit Profile Sekolah')

@section('content')
<main class="content">
    <div class="container">
        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:10px;">
            <div>
                <h1 class="page-title">Edit Profil Sekolah</h1>
                <p class="page-subtitle">Perbarui informasi sekolah.</p>
            </div>
            <a href="{{ route('profile-sekolah') }}" class="btn-action" style="background:#6c757d;">
                ← Kembali
            </a>
        </div>

        <hr class="divider">

        @if ($errors->any())
            <div style="background:#f8d7da; color:#721c24; padding:12px 16px; border-radius:5px; margin-bottom:16px; border-left:4px solid #dc3545;">
                <strong>Data belum bisa disimpan:</strong>
                <ul style="margin:8px 0 0 0; padding-left:20px;">
                    @foreach ($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card">
            <form action="{{ route('profile-sekolah.update') }}"
                  method="POST"
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div style="margin-bottom:16px;">
                    <label style="display:block; font-weight:600; margin-bottom:6px;">
                        Nama Sekolah <span style="color:red;">*</span>
                    </label>
                    <input type="text"
                           name="nama_sekolah"
                           value="{{ old('nama_sekolah', $profil->nama_sekolah) }}"
                           required
                           style="width:100%; padding:8px 12px; border:1px solid #ccc; border-radius:4px; font-size:14px;">
                </div>

                <div style="margin-bottom:16px;">
                    <label style="display:block; font-weight:600; margin-bottom:6px;">Alamat</label>
                    <input type="text"
                           name="alamat"
                           value="{{ old('alamat', $profil->alamat) }}"
                           style="width:100%; padding:8px 12px; border:1px solid #ccc; border-radius:4px; font-size:14px;">
                </div>

                <div style="margin-bottom:16px;">
                    <label style="display:block; font-weight:600; margin-bottom:6px;">Jenjang</label>
                    <input type="text"
                           name="jenjang"
                           value="{{ old('jenjang', $profil->jenjang) }}"
                           style="width:100%; padding:8px 12px; border:1px solid #ccc; border-radius:4px; font-size:14px;">
                </div>

                <div style="margin-bottom:16px;">
                    <label style="display:block; font-weight:600; margin-bottom:6px;">Tahun Berdiri</label>
                    <input type="text"
                           name="tahun_berdiri"
                           value="{{ old('tahun_berdiri', $profil->tahun_berdiri) }}"
                           style="width:100%; padding:8px 12px; border:1px solid #ccc; border-radius:4px; font-size:14px;">
                </div>

                <div style="margin-bottom:16px;">
                    <label style="display:block; font-weight:600; margin-bottom:6px;">Jumlah Siswa</label>
                    <input type="number"
                           name="jumlah_siswa"
                           value="{{ old('jumlah_siswa', $profil->jumlah_siswa) }}"
                           min="0"
                           style="width:100%; padding:8px 12px; border:1px solid #ccc; border-radius:4px; font-size:14px;">
                </div>

                <div style="margin-bottom:16px;">
                    <label style="display:block; font-weight:600; margin-bottom:6px;">
                        Prestasi <span style="color:#888; font-weight:400;">(satu prestasi per baris)</span>
                    </label>
                    <textarea name="prestasi" rows="4"
                              style="width:100%; padding:8px 12px; border:1px solid #ccc; border-radius:4px; font-size:14px;">{{ old('prestasi', $profil->prestasi) }}</textarea>
                </div>

                <div style="margin-bottom:16px;">
                    <label style="display:block; font-weight:600; margin-bottom:6px;">Tentang Sekolah</label>
                    <textarea name="tentang" rows="4"
                              style="width:100%; padding:8px 12px; border:1px solid #ccc; border-radius:4px; font-size:14px;">{{ old('tentang', $profil->tentang) }}</textarea>
                </div>

                <div style="margin-bottom:16px;">
                    <label style="display:block; font-weight:600; margin-bottom:6px;">Visi</label>
                    <textarea name="visi" rows="2"
                              style="width:100%; padding:8px 12px; border:1px solid #ccc; border-radius:4px; font-size:14px;">{{ old('visi', $profil->visi) }}</textarea>
                </div>

                <div style="margin-bottom:16px;">
                    <label style="display:block; font-weight:600; margin-bottom:6px;">
                        Misi <span style="color:#888; font-weight:400;">(satu misi per baris)</span>
                    </label>
                    <textarea name="misi" rows="4"
                              style="width:100%; padding:8px 12px; border:1px solid #ccc; border-radius:4px; font-size:14px;">{{ old('misi', $profil->misi) }}</textarea>
                </div>

                <div style="margin-bottom:20px;">
                    <label style="display:block; font-weight:600; margin-bottom:6px;">
                        Foto Sekolah <span style="color:#888; font-weight:400;">(JPG/PNG/WEBP, maks 2 MB)</span>
                    </label>
                    <input type="file"
                           name="foto"
                           accept="image/*"
                           style="width:100%; padding:8px; border:1px solid #ccc; border-radius:4px; background:#fafafa;">

                    @if ($profil->foto)
                        <div style="margin-top:12px;">
                            <p class="muted" style="font-size:13px; margin-bottom:6px;">Foto saat ini:</p>
                            <img src="{{ asset('storage/' . $profil->foto) }}"
                                 style="max-height:180px; border-radius:6px; border:1px solid #ddd;">
                        </div>
                    @endif
                </div>

                <div class="action-buttons" style="margin-top:20px; padding-top:16px; border-top:1px solid #eee;">
                    <button type="submit" class="btn-action">💾 Simpan</button>
                    <a href="{{ route('profile-sekolah') }}" class="btn-action" style="background:#6c757d;">Batal</a>
                </div>

            </form>
        </div>

    </div>
</main>
@endsection
