@extends('layout.app')

@section('title', 'Edit Profil Sekolah')

@push('styles')
<style>
    .pse-wrap { max-width: 620px; margin: 0 auto; }
    .content .pse-wrap h1 { font-size: 26px; font-weight: 700; color: #0b1a3f; margin-bottom: 20px; }
    .pse-card { background: #fff; border-radius: 12px; padding: 26px; box-shadow: 0 1px 6px rgba(0,0,0,.07); }
    .pse-group { margin-bottom: 16px; }
    .pse-group label { display: block; font-size: 13px; font-weight: 700; color: #0b1a3f; margin-bottom: 6px; }
    .pse-group label small { font-weight: 400; color: #777; }
    .pse-group input[type=text], .pse-group input[type=number], .pse-group textarea, .pse-group input[type=file] {
        width: 100%; padding: 10px 12px; border: 1px solid #d4d8e0; border-radius: 8px;
        font-size: 14px; font-family: inherit; background: #fff; }
    .pse-group input:focus, .pse-group textarea:focus { outline: none; border-color: #e8a317; }
    .pse-error { color: #b91c1c; font-size: 12px; margin-top: 4px; }
    .pse-preview { display: block; max-width: 100%; width: 320px; margin-top: 10px; border-radius: 10px; }
    .pse-check { margin-top: 8px; font-size: 13px; color: #444; }
    .pse-check input { margin-right: 6px; }
    .pse-actions { display: flex; gap: 10px; margin-top: 8px; }
    .pse-btn { padding: 10px 20px; border-radius: 8px; font-weight: 700; font-size: 14px; border: 0;
        cursor: pointer; text-decoration: none; display: inline-block; }
    .pse-btn-primary { background: #12234f; color: #fff; }
    .pse-btn-secondary { background: #e9ecf3; color: #333; }
</style>
@endpush

@section('content')
<div class="pse-wrap">
    <h1>Edit Profil Sekolah</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <strong>Data belum bisa disimpan:</strong>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="pse-card">
        <form action="{{ route('profile-sekolah.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="pse-group">
                <label for="nama">Nama Sekolah</label>
                <input type="text" id="nama" name="nama" value="{{ old('nama', $profil->nama) }}" required>
            </div>

            <div class="pse-group">
                <label for="alamat">Alamat</label>
                <input type="text" id="alamat" name="alamat" value="{{ old('alamat', $profil->alamat) }}" required>
            </div>

            <div class="pse-group">
                <label for="jenjang">Jenjang</label>
                <input type="text" id="jenjang" name="jenjang" value="{{ old('jenjang', $profil->jenjang) }}" required>
            </div>

            <div class="pse-group">
                <label for="tahun_berdiri">Tahun Berdiri</label>
                <input type="number" id="tahun_berdiri" name="tahun_berdiri"
                       value="{{ old('tahun_berdiri', $profil->tahun_berdiri) }}" required>
            </div>

            <div class="pse-group">
                <label for="jumlah_siswa">Jumlah Siswa</label>
                <input type="number" id="jumlah_siswa" name="jumlah_siswa" min="0"
                       value="{{ old('jumlah_siswa', $profil->jumlah_siswa) }}" required>
            </div>

            <div class="pse-group">
                <label for="prestasi">Prestasi <small>(satu prestasi per baris)</small></label>
                <textarea id="prestasi" name="prestasi" rows="5">{{ old('prestasi', $profil->prestasi) }}</textarea>
            </div>

            <div class="pse-group">
                <label for="foto">Foto Sekolah <small>(JPG/PNG/WEBP, maks 2 MB)</small></label>
                <input type="file" id="foto" name="foto" accept="image/jpeg,image/png,image/webp">
                @error('foto') <p class="pse-error">{{ $message }}</p> @enderror

                <img id="preview" class="pse-preview" alt="Preview foto"
                     src="{{ $profil->foto_url }}"
                     style="{{ $profil->foto ? '' : 'display:none;' }}">

                @if($profil->foto)
                    <label class="pse-check">
                        <input type="checkbox" name="hapus_foto" value="1"> Hapus foto saat ini
                    </label>
                @endif
            </div>

            <div class="pse-actions">
                <button type="submit" class="pse-btn pse-btn-primary">Simpan</button>
                <a href="{{ route('profile-sekolah') }}" class="pse-btn pse-btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.getElementById('foto').addEventListener('change', function (e) {
        const file = e.target.files[0];
        if (!file) return;
        const img = document.getElementById('preview');
        img.src = URL.createObjectURL(file);
        img.style.display = 'block';
    });
</script>
@endpush
