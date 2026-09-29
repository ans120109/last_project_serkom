@extends('layout.app')

@section('title', 'Tambah Berita')

@push('styles')
<style>
    .form-card { background: #fff; border-radius: 10px; box-shadow: 0 4px 14px rgba(0,0,0,.07);
                 padding: 28px; max-width: 720px; }
    .form-group { margin-bottom: 20px; }
    .form-group label { display: block; font-size: 14px; font-weight: 600; color: #0d1b3e;
                        margin-bottom: 6px; }
    .form-group label span { color: #b91c1c; }

    .form-control { width: 100%; padding: 10px 12px; border: 1px solid #d1d5db; border-radius: 6px;
                    font-family: Arial, Helvetica, sans-serif; font-size: 14px; color: #111;
                    background: #fff; transition: border-color .15s, box-shadow .15s; }
    .form-control::placeholder { color: #9ca3af; }
    .form-control:focus { outline: none; border-color: #d99a22;
                          box-shadow: 0 0 0 3px rgba(217,154,34,.2); }
    textarea.form-control { min-height: 180px; resize: vertical; line-height: 1.6; }
    .form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; }

    .is-invalid { border-color: #b91c1c; }
    .error-text { color: #b91c1c; font-size: 13px; margin-top: 4px; }

    .form-actions { display: flex; gap: 10px; margin-top: 8px; }
    .form-actions .btn { padding: 11px 26px; font-size: 15px; }
    .btn-batal { background: #e5e7eb; color: #374151 !important; }
    .btn-batal:hover { background: #d1d5db; }

    @media (max-width: 600px) {
        .form-row { grid-template-columns: 1fr; }
        .form-card { padding: 20px; }
    }
</style>
@endpush

@section('content')
    <h1 class="page-title">Tambah Berita / Pengumuman</h1>
    <p class="page-subtitle">Tambahkan informasi terbaru untuk siswa dan sekolah.</p>

    <div class="form-card">
        <form action="{{ route('berita.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="judul">Judul <span>*</span></label>
                <input type="text" id="judul" name="judul" value="{{ old('judul') }}"
                       class="form-control @error('judul') is-invalid @enderror"
                       placeholder="Masukkan judul berita" required>
                @error('judul') <div class="error-text">{{ $message }}</div> @enderror
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="jenis">Jenis <span>*</span></label>
                    <select id="jenis" name="jenis"
                            class="form-control @error('jenis') is-invalid @enderror" required>
                        <option value="">-- Pilih Jenis --</option>
                        <option value="berita" {{ old('jenis') === 'berita' ? 'selected' : '' }}>Berita</option>
                        <option value="pengumuman" {{ old('jenis') === 'pengumuman' ? 'selected' : '' }}>Pengumuman</option>
                    </select>
                    @error('jenis') <div class="error-text">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label for="tanggal">Tanggal <span>*</span></label>
                    <input type="date" id="tanggal" name="tanggal"
                           value="{{ old('tanggal', date('Y-m-d')) }}"
                           class="form-control @error('tanggal') is-invalid @enderror" required>
                    @error('tanggal') <div class="error-text">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="isi">Isi Berita / Pengumuman <span>*</span></label>
                <textarea id="isi" name="isi"
                          class="form-control @error('isi') is-invalid @enderror"
                          placeholder="Tulis isi berita atau pengumuman..." required>{{ old('isi') }}</textarea>
                @error('isi') <div class="error-text">{{ $message }}</div> @enderror
            </div>

            <div class="form-actions">
                <button type="submit" class="btn">Simpan</button>
                <a href="{{ route('berita') }}" class="btn btn-batal">Batal</a>
            </div>
        </form>
    </div>
@endsection
