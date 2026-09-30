@extends('layout.app')

@section('title', 'Edit Berita')

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

    .info-penulis { background: #eff6ff; border: 1px solid #bfdbfe; border-radius: 8px;
                    padding: 14px 16px; margin-bottom: 22px; font-size: 14px; color: #1e3a8a;
                    line-height: 1.7; }
    .info-penulis strong { color: #1e40af; }
    .info-penulis .judul-info { font-weight: 700; display: block; margin-bottom: 2px; }

    @media (max-width: 600px) {
        .form-row { grid-template-columns: 1fr; }
        .form-card { padding: 20px; }
    }
</style>
@endpush

@section('content')
    <h1 class="page-title">Edit Berita / Pengumuman</h1>
    <p class="page-subtitle">Perbarui informasi yang sudah dipublikasikan.</p>

    <div class="form-card">
        <div class="info-penulis">
            <span class="judul-info">Riwayat input</span>
            Diinput oleh: <strong>{{ $berita->penulis->name ?? 'Tidak diketahui' }}</strong>
            ({{ $berita->penulis->username ?? '-' }})<br>
            Tanggal input: <strong>{{ $berita->created_at?->translatedFormat('d F Y, H:i') ?? '-' }}</strong>
        </div>

        <form action="{{ route('berita.update', $berita) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="judul">Judul <span>*</span></label>
                <input type="text" id="judul" name="judul" value="{{ old('judul', $berita->judul) }}"
                       class="form-control @error('judul') is-invalid @enderror"
                       placeholder="Masukkan judul berita" required>
                @error('judul') <div class="error-text">{{ $message }}</div> @enderror
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="jenis">Jenis <span>*</span></label>
                    @php $jenis = old('jenis', $berita->jenis); @endphp
                    <select id="jenis" name="jenis"
                            class="form-control @error('jenis') is-invalid @enderror" required>
                        <option value="">-- Pilih Jenis --</option>
                        <option value="Berita" {{ $jenis === 'Berita' ? 'selected' : '' }}>Berita</option>
                        <option value="Pengumuman" {{ $jenis === 'Pengumuman' ? 'selected' : '' }}>Pengumuman</option>
                    </select>
                    @error('jenis') <div class="error-text">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label for="tanggal">Tanggal <span>*</span></label>
                    <input type="date" id="tanggal" name="tanggal"
                           value="{{ old('tanggal', $berita->tanggal?->format('Y-m-d')) }}"
                           class="form-control @error('tanggal') is-invalid @enderror" required>
                    @error('tanggal') <div class="error-text">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="isi">Isi Berita / Pengumuman <span>*</span></label>
                <textarea id="isi" name="isi"
                          class="form-control @error('isi') is-invalid @enderror"
                          placeholder="Tulis isi berita atau pengumuman..." required>{{ old('isi', $berita->isi) }}</textarea>
                @error('isi') <div class="error-text">{{ $message }}</div> @enderror
            </div>

            <div class="form-actions">
                <button type="submit" class="btn">Simpan Perubahan</button>
                <a href="{{ route('berita') }}" class="btn btn-batal">Batal</a>
            </div>
        </form>
    </div>
@endsection
