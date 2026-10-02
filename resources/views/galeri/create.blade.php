@extends('layout.app')

@section('title', 'Tambah Foto Galeri')

@section('content')
    <main class="content">
        <div class="container">
            <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:10px;">
                <div>
                    <h1 class="page-title">Tambah Foto</h1>
                    <p class="page-subtitle">Upload foto kegiatan sekolah.</p>
                </div>
                <a href="{{ route('galeri.index') }}" class="btn-action" style="background:#6c757d;">
                    ← Kembali
                </a>
            </div>

            <hr class="divider">

            @if ($errors->any())
                <div style="background:#f8d7da; color:#721c24; padding:12px 16px; border-radius:5px; margin-bottom:16px;">
                    <ul style="margin:0; padding-left:20px;">
                        @foreach ($errors->all() as $err)
                            <li>{{ $err }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card">
                <form action="{{ route('galeri.store') }}" method="POST" enctype="multipart/form-data">

                    @csrf

                    <div style="margin-bottom:16px;">
                        <label style="display:block; font-weight:600; margin-bottom:6px;">
                            Judul Foto <span style="color:red;">*</span>
                        </label>
                        <input type="text" name="judul" value="{{ old('judul') }}"
                            placeholder="Contoh: Kegiatan Pramuka 2026" required
                            style="width:100%; padding:8px 12px; border:1px solid #ccc; border-radius:4px; font-size:14px;">
                    </div>

                    {{-- <div style="margin-bottom:16px;">
                        <label style="display:block; font-weight:600; margin-bottom:6px;">
                            Deskripsi <span style="color:#888; font-weight:400;">(opsional)</span>
                        </label>
                        <textarea name="deskripsi" rows="3" placeholder="Keterangan singkat tentang foto ini..."
                            style="width:100%; padding:8px 12px; border:1px solid #ccc; border-radius:4px; font-size:14px;">{{ old('deskripsi') }}</textarea>
                    </div> --}}

                    <div style="margin-bottom:20px;">
                        <label style="display:block; font-weight:600; margin-bottom:6px;">
                            File Foto <span style="color:red;">*</span>
                        </label>
                        <input type="file" name="foto" accept="image/*" required
                            style="width:100%; padding:8px; border:1px solid #ccc; border-radius:4px; background:#fafafa;">
                        <p class="muted" style="font-size:12px; margin-top:6px;">
                            Format: JPG, JPEG, PNG, WEBP. Maksimal 2MB.
                        </p>
                    </div>

                    <div class="action-buttons" style="margin-top:20px; padding-top:16px; border-top:1px solid #eee;">
                        <button type="submit" class="btn-action">
                            Simpan Foto
                        </button>
                        <a href="{{ route('galeri.index') }}" class="btn-action" style="background:#6c757d;">
                            Batal
                        </a>
                    </div>

                </form>
            </div>

        </div>
    </main>
@endsection
