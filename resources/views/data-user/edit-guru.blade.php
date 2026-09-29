@extends('layout.app')

@section('title', 'Edit Guru')

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
    <h1 class="page-title">Edit Guru</h1>
    <p class="page-subtitle">Ubah data guru, lalu simpan perubahan.</p>

    <div class="form-card">
        <form action="{{ route('siswa-guru.guru.update', $guru) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" id="nama" name="nama" value="{{ old('nama', $guru->nama) }}"
                       class="form-control @error('nama') is-invalid @enderror" required>
                @error('nama') <div class="error-text">{{ $message }}</div> @enderror
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="nip">NIP</label>
                    <input type="text" id="nip" name="nip" value="{{ old('nip', $guru->nip) }}"
                           class="form-control @error('nip') is-invalid @enderror" required>
                    @error('nip') <div class="error-text">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label for="mata_pelajaran">Mata Pelajaran</label>
                    <input type="text" id="mata_pelajaran" name="mata_pelajaran"
                           value="{{ old('mata_pelajaran', $guru->mata_pelajaran) }}"
                           class="form-control @error('mata_pelajaran') is-invalid @enderror" required>
                    @error('mata_pelajaran') <div class="error-text">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="no_hp">No. HP</label>
                <input type="text" id="no_hp" name="no_hp" value="{{ old('no_hp', $guru->no_hp) }}"
                       class="form-control @error('no_hp') is-invalid @enderror">
                @error('no_hp') <div class="error-text">{{ $message }}</div> @enderror
            </div>

            <div class="form-actions">
                <button type="submit" class="btn">Simpan Perubahan</button>
                <a href="{{ route('siswa-guru.create') }}" class="btn btn-batal">Batal</a>
            </div>
        </form>
    </div>
@endsection
