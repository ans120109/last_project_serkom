@extends('layout.app')

@section('title', 'Edit Siswa')

@push('styles')
<style>
    .form-card { background: #fff; border-radius: 10px; box-shadow: 0 4px 14px rgba(0,0,0,.07);
                 padding: 28px; max-width: 720px; }
    .form-group { margin-bottom: 20px; }
    .form-group label { display: block; font-size: 14px; font-weight: 600; color: #0d1b3e; margin-bottom: 6px; }
    .form-control { width: 100%; padding: 10px 12px; border: 1px solid #d1d5db; border-radius: 6px;
                    font-family: Arial, Helvetica, sans-serif; font-size: 14px; background: #fff; }
    .form-control:focus { outline: none; border-color: #d99a22; box-shadow: 0 0 0 3px rgba(217,154,34,.2); }
    .form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; }
    .is-invalid { border-color: #b91c1c; }
    .error-text { color: #b91c1c; font-size: 13px; margin-top: 4px; }
    .form-actions { display: flex; gap: 10px; margin-top: 8px; }
    .form-actions .btn { padding: 11px 26px; font-size: 15px; }
    .btn-batal { background: #e5e7eb; color: #374151 !important; }
    @media (max-width: 600px) { .form-row { grid-template-columns: 1fr; } }
</style>
@endpush

@section('content')
    <h1 class="page-title">Edit Siswa</h1>
    <p class="page-subtitle">Ubah data siswa, lalu simpan perubahan.</p>

    <div class="form-card">
        <form action="{{ route('siswa-guru.siswa.update', $siswa) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" id="nama" name="nama" value="{{ old('nama', $siswa->nama) }}"
                       class="form-control @error('nama') is-invalid @enderror" required>
                @error('nama') <div class="error-text">{{ $message }}</div> @enderror
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="nis">NIS</label>
                    <input type="text" id="nis" name="nis" value="{{ old('nis', $siswa->nis) }}"
                           class="form-control @error('nis') is-invalid @enderror" required>
                    @error('nis') <div class="error-text">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label for="kelas">Kelas</label>
                    <input type="text" id="kelas" name="kelas" value="{{ old('kelas', $siswa->kelas) }}"
                           class="form-control @error('kelas') is-invalid @enderror" required>
                    @error('kelas') <div class="error-text">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select id="jenis_kelamin" name="jenis_kelamin"
                        class="form-control @error('jenis_kelamin') is-invalid @enderror" required>
                    <option value="L" {{ old('jenis_kelamin', $siswa->jenis_kelamin) === 'L' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="P" {{ old('jenis_kelamin', $siswa->jenis_kelamin) === 'P' ? 'selected' : '' }}>Perempuan</option>
                </select>
                @error('jenis_kelamin') <div class="error-text">{{ $message }}</div> @enderror
            </div>

            <div class="form-actions">
                <button type="submit" class="btn">Simpan Perubahan</button>
                <a href="{{ route('siswa-guru.create') }}" class="btn btn-batal">Batal</a>
            </div>
        </form>
    </div>
@endsection
