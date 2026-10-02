@extends('layout.app')

@section('title', 'Edit Siswa')

@section('content')
<main class="content">
    <div class="container">

        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:10px;">
            <div>
                <h1 class="page-title">Edit Siswa</h1>
                <p class="page-subtitle">Perbarui data siswa.</p>
            </div>
            <a href="{{ route('siswa-guru.create') }}" class="btn-action" style="background:#6c757d;">
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
            <form action="{{ route('siswa-guru.siswa.update', $siswa->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div style="display:grid; grid-template-columns:1fr 1fr; gap:16px;">
                    <div>
                        <label style="font-weight:600; margin-bottom:6px; display:block;">
                            NIS <span style="color:red;">*</span>
                        </label>
                        <input type="text" name="nis" value="{{ old('nis', $siswa->nis) }}" required
                               style="width:100%; padding:8px 12px; border:1px solid #ccc; border-radius:4px; font-size:14px;">
                    </div>
                    <div>
                        <label style="font-weight:600; margin-bottom:6px; display:block;">
                            Nama <span style="color:red;">*</span>
                        </label>
                        <input type="text" name="nama" value="{{ old('nama', $siswa->nama) }}" required
                               style="width:100%; padding:8px 12px; border:1px solid #ccc; border-radius:4px; font-size:14px;">
                    </div>
                </div>

                <div style="display:grid; grid-template-columns:1fr 1fr 1fr; gap:16px; margin-top:16px;">
                    <div>
                        <label style="font-weight:600; margin-bottom:6px; display:block;">
                            Jenis Kelamin <span style="color:red;">*</span>
                        </label>
                        <select name="jenis_kelamin" required
                                style="width:100%; padding:8px 12px; border:1px solid #ccc; border-radius:4px; font-size:14px;">
                            <option value="L" {{ old('jenis_kelamin', $siswa->jenis_kelamin) === 'L' ? 'selected' : '' }}>
                                Laki-laki
                            </option>
                            <option value="P" {{ old('jenis_kelamin', $siswa->jenis_kelamin) === 'P' ? 'selected' : '' }}>
                                Perempuan
                            </option>
                        </select>
                    </div>
                    <div>
                        <label style="font-weight:600; margin-bottom:6px; display:block;">
                            Kelas <span style="color:red;">*</span>
                        </label>
                        <input type="text" name="kelas" value="{{ old('kelas', $siswa->kelas) }}" required
                               style="width:100%; padding:8px 12px; border:1px solid #ccc; border-radius:4px; font-size:14px;">
                    </div>
                    <div>
                        <label style="font-weight:600; margin-bottom:6px; display:block;">
                            Sekolah Asal
                        </label>
                        <input type="text" name="sekolah_asal"
                               value="{{ old('sekolah_asal', $siswa->sekolah_asal) }}"
                               style="width:100%; padding:8px 12px; border:1px solid #ccc; border-radius:4px; font-size:14px;">
                    </div>
                </div>

                <div style="display:grid; grid-template-columns:1fr 1fr; gap:16px; margin-top:16px;">
                    <div>
                        <label style="font-weight:600; margin-bottom:6px; display:block;">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir"
                               value="{{ old('tanggal_lahir', optional($siswa->tanggal_lahir)->format('Y-m-d')) }}"
                               style="width:100%; padding:8px 12px; border:1px solid #ccc; border-radius:4px; font-size:14px;">
                    </div>
                    <div>
                        <label style="font-weight:600; margin-bottom:6px; display:block;">No. HP</label>
                        <input type="text" name="no_hp" value="{{ old('no_hp', $siswa->no_hp) }}"
                               style="width:100%; padding:8px 12px; border:1px solid #ccc; border-radius:4px; font-size:14px;">
                    </div>
                </div>

                <div style="margin-top:16px;">
                    <label style="font-weight:600; margin-bottom:6px; display:block;">Alamat</label>
                    <textarea name="alamat" rows="3"
                              style="width:100%; padding:8px 12px; border:1px solid #ccc; border-radius:4px; font-size:14px;">{{ old('alamat', $siswa->alamat) }}</textarea>
                </div>

                <div class="action-buttons" style="margin-top:20px; padding-top:16px; border-top:1px solid #eee;">
                    <button type="submit" class="btn-action">
                        💾 Simpan Perubahan
                    </button>
                    <a href="{{ route('siswa-guru.create') }}" class="btn-action" style="background:#6c757d;">
                        Batal
                    </a>
                </div>

            </form>
        </div>

    </div>
</main>
@endsection
