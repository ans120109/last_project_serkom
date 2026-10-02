@extends('layout.app')

@section('title', 'Siswa & Guru')

@section('content')
    <main class="content">
        <div class="container">
            <h1 class="page-title">Siswa & Guru</h1>
            <p class="page-subtitle">Manajemen data siswa dan guru.</p>
            <hr class="divider">

            @if (session('success'))
                <div class="alert-success">{{ session('success') }}</div>
            @endif

            @if ($errors->any())
                <div style="background:#f8d7da; color:#721c24; padding:12px 16px; border-radius:5px; margin-bottom:16px;">
                    <ul style="margin:0; padding-left:20px;">
                        @foreach ($errors->all() as $err)
                            <li>{{ $err }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div style="display:flex; gap:8px; margin-bottom:20px;">
                <button type="button" onclick="showTab('siswa')" id="tabBtnSiswa" class="btn-action">
                    👨‍🎓 Data Siswa
                </button>
                <button type="button" onclick="showTab('guru')" id="tabBtnGuru" class="btn-action"
                    style="background:#6c757d;">
                    👨‍🏫 Data Guru
                </button>
            </div>

            <div id="tabSiswa">

                <div class="card">
                    <h2>Tambah Data Siswa</h2>

                    <form action="{{ route('siswa-guru.store') }}" method="POST" style="margin-top:12px;">
                        @csrf

                        <div style="display:grid; grid-template-columns:1fr 1fr; gap:16px;">
                            <div>
                                <label style="display:block; font-weight:600; margin-bottom:6px;">NIS *</label>
                                <input type="text" name="nis" value="{{ old('nis') }}" required
                                    style="width:100%; padding:8px 12px; border:1px solid #ccc; border-radius:4px; font-size:14px;">
                            </div>
                            <div>
                                <label style="display:block; font-weight:600; margin-bottom:6px;">Nama Lengkap *</label>
                                <input type="text" name="nama" value="{{ old('nama') }}" required
                                    style="width:100%; padding:8px 12px; border:1px solid #ccc; border-radius:4px; font-size:14px;">
                            </div>
                        </div>

                        <div style="display:grid; grid-template-columns:1fr 1fr 1fr; gap:16px; margin-top:16px;">
                            <div>
                                <label style="display:block; font-weight:600; margin-bottom:6px;">Jenis Kelamin *</label>
                                <select name="jenis_kelamin" required
                                    style="width:100%; padding:8px 12px; border:1px solid #ccc; border-radius:4px; font-size:14px;">
                                    <option value="">-- Pilih --</option>
                                    <option value="L" {{ old('jenis_kelamin') === 'L' ? 'selected' : '' }}>Laki-laki
                                    </option>
                                    <option value="P" {{ old('jenis_kelamin') === 'P' ? 'selected' : '' }}>Perempuan
                                    </option>
                                </select>
                            </div>
                            <div>
                                <label style="display:block; font-weight:600; margin-bottom:6px;">Kelas *</label>
                                <input type="text" name="kelas" value="{{ old('kelas') }}" placeholder="XII RPL 1"
                                    required
                                    style="width:100%; padding:8px 12px; border:1px solid #ccc; border-radius:4px; font-size:14px;">
                            </div>
                            <div>
                                <label style="display:block; font-weight:600; margin-bottom:6px;">Sekolah Asal</label>
                                <input type="text" name="sekolah_asal" value="{{ old('sekolah_asal') }}"
                                    placeholder="Nama Sekolah"
                                    style="width:100%; padding:8px 12px; border:1px solid #ccc; border-radius:4px; font-size:14px;">
                            </div>
                        </div>

                        <div style="display:grid; grid-template-columns:1fr 1fr; gap:16px; margin-top:16px;">
                            <div>
                                <label style="display:block; font-weight:600; margin-bottom:6px;">Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}"
                                    style="width:100%; padding:8px 12px; border:1px solid #ccc; border-radius:4px; font-size:14px;">
                            </div>
                            <div>
                                <label style="display:block; font-weight:600; margin-bottom:6px;">No. HP</label>
                                <input type="text" name="no_hp" value="{{ old('no_hp') }}"
                                    style="width:100%; padding:8px 12px; border:1px solid #ccc; border-radius:4px; font-size:14px;">
                            </div>
                        </div>

                        <div style="margin-top:16px;">
                            <label style="display:block; font-weight:600; margin-bottom:6px;">Alamat</label>
                            <textarea name="alamat" rows="2"
                                style="width:100%; padding:8px 12px; border:1px solid #ccc; border-radius:4px; font-size:14px;">{{ old('alamat') }}</textarea>
                        </div>

                        <div class="action-buttons" style="margin-top:16px;">
                            <button type="submit" class="btn-action">Simpan Siswa</button>
                        </div>
                    </form>
                </div>

                <div class="card">
                    <h2>📋 Daftar Siswa ({{ $siswa->count() }})</h2>

                    <div style="overflow-x:auto; margin-top:12px;">
                        <table style="width:100%; border-collapse:collapse; min-width:700px;">
                            <thead>
                                <tr style="background:#f7f5ef;">
                                    <th
                                        style="padding:10px; text-align:left; border-bottom:2px solid #ddd; font-size:13px;">
                                        No</th>
                                    <th
                                        style="padding:10px; text-align:left; border-bottom:2px solid #ddd; font-size:13px;">
                                        NIS</th>
                                    <th
                                        style="padding:10px; text-align:left; border-bottom:2px solid #ddd; font-size:13px;">
                                        Nama</th>
                                    <th
                                        style="padding:10px; text-align:left; border-bottom:2px solid #ddd; font-size:13px;">
                                        JK</th>
                                    <th
                                        style="padding:10px; text-align:left; border-bottom:2px solid #ddd; font-size:13px;">
                                        Kelas</th>
                                    <th
                                        style="padding:10px; text-align:left; border-bottom:2px solid #ddd; font-size:13px;">
                                        Sekolah Asal</th>
                                    <th
                                        style="padding:10px; text-align:left; border-bottom:2px solid #ddd; font-size:13px;">
                                        Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($siswa as $i => $s)
                                    <tr style="border-bottom:1px solid #eee;">
                                        <td style="padding:10px; font-size:13px;">{{ $i + 1 }}</td>
                                        <td style="padding:10px; font-size:13px;">{{ $s->nis }}</td>
                                        <td style="padding:10px; font-size:13px;">{{ $s->nama }}</td>
                                        <td style="padding:10px; font-size:13px;">{{ $s->jenis_kelamin }}</td>
                                        <td style="padding:10px; font-size:13px;">{{ $s->kelas }}</td>
                                        <td style="padding:10px; font-size:13px;">{{ $s->sekolah_asal ?? '-' }}</td>
                                        <td style="padding:10px;">
                                            <div style="display:flex; gap:6px;">
                                                <a href="{{ route('siswa-guru.siswa.edit', $s->id) }}" class="btn-action"
                                                    style="font-size:12px; padding:4px 10px;">
                                                    Edit
                                                </a>

                                                <form action="{{ route('siswa-guru.siswa.destroy', $s->id) }}"
                                                    method="POST" onsubmit="return confirm('Yakin hapus siswa ini?')"
                                                    style="margin:0;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn-action btn-danger"
                                                        style="font-size:12px; padding:4px 10px;">
                                                        Hapus
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" style="padding:20px; text-align:center; color:#888;">
                                            Belum ada data siswa.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

            <div id="tabGuru" style="display:none;">

                {{-- FORM TAMBAH GURU --}}
                <div class="card">
                    <h2>Tambah Data Guru</h2>

                    <form action="{{ route('siswa-guru.guru.store') }}" method="POST" style="margin-top:12px;">
                        @csrf

                        <div style="display:grid; grid-template-columns:1fr 1fr; gap:16px;">
                            <div>
                                <label style="display:block; font-weight:600; margin-bottom:6px;">NIP *</label>
                                <input type="text" name="nip" value="{{ old('nip') }}" required
                                    style="width:100%; padding:8px 12px; border:1px solid #ccc; border-radius:4px; font-size:14px;">
                            </div>
                            <div>
                                <label style="display:block; font-weight:600; margin-bottom:6px;">Nama Lengkap *</label>
                                <input type="text" name="nama" value="{{ old('nama') }}" required
                                    style="width:100%; padding:8px 12px; border:1px solid #ccc; border-radius:4px; font-size:14px;">
                            </div>
                        </div>

                        <div style="display:grid; grid-template-columns:1fr 1fr; gap:16px; margin-top:16px;">
                            <div>
                                <label style="display:block; font-weight:600; margin-bottom:6px;">Jenis Kelamin *</label>
                                <select name="jenis_kelamin" required
                                    style="width:100%; padding:8px 12px; border:1px solid #ccc; border-radius:4px; font-size:14px;">
                                    <option value="">-- Pilih --</option>
                                    <option value="L" {{ old('jenis_kelamin') === 'L' ? 'selected' : '' }}>Laki-laki
                                    </option>
                                    <option value="P" {{ old('jenis_kelamin') === 'P' ? 'selected' : '' }}>Perempuan
                                    </option>
                                </select>
                            </div>
                            <div>
                                <label style="display:block; font-weight:600; margin-bottom:6px;">Mata Pelajaran</label>
                                <input type="text" name="mata_pelajaran" value="{{ old('mata_pelajaran') }}"
                                    placeholder="Matematika, RPL, dll"
                                    style="width:100%; padding:8px 12px; border:1px solid #ccc; border-radius:4px; font-size:14px;">
                            </div>
                        </div>

                        <div style="display:grid; grid-template-columns:1fr 1fr 1fr; gap:16px; margin-top:16px;">
                            <div>
                                <label style="display:block; font-weight:600; margin-bottom:6px;">Jabatan</label>
                                <input type="text" name="jabatan" value="{{ old('jabatan') }}"
                                    placeholder="Guru / Wali Kelas"
                                    style="width:100%; padding:8px 12px; border:1px solid #ccc; border-radius:4px; font-size:14px;">
                            </div>
                            <div>
                                <label style="display:block; font-weight:600; margin-bottom:6px;">Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}"
                                    style="width:100%; padding:8px 12px; border:1px solid #ccc; border-radius:4px; font-size:14px;">
                            </div>
                            <div>
                                <label style="display:block; font-weight:600; margin-bottom:6px;">No. HP</label>
                                <input type="text" name="no_hp" value="{{ old('no_hp') }}"
                                    style="width:100%; padding:8px 12px; border:1px solid #ccc; border-radius:4px; font-size:14px;">
                            </div>
                        </div>

                        <div style="margin-top:16px;">
                            <label style="display:block; font-weight:600; margin-bottom:6px;">Alamat</label>
                            <textarea name="alamat" rows="2"
                                style="width:100%; padding:8px 12px; border:1px solid #ccc; border-radius:4px; font-size:14px;">{{ old('alamat') }}</textarea>
                        </div>

                        <div class="action-buttons" style="margin-top:16px;">
                            <button type="submit" class="btn-action">Simpan Guru</button>
                        </div>
                    </form>
                </div>

                <div class="card">
                    <h2>📋 Daftar Guru ({{ $guru->count() }})</h2>

                    <div style="overflow-x:auto; margin-top:12px;">
                        <table style="width:100%; border-collapse:collapse; min-width:700px;">
                            <thead>
                                <tr style="background:#f7f5ef;">
                                    <th
                                        style="padding:10px; text-align:left; border-bottom:2px solid #ddd; font-size:13px;">
                                        No</th>
                                    <th
                                        style="padding:10px; text-align:left; border-bottom:2px solid #ddd; font-size:13px;">
                                        NIP</th>
                                    <th
                                        style="padding:10px; text-align:left; border-bottom:2px solid #ddd; font-size:13px;">
                                        Nama</th>
                                    <th
                                        style="padding:10px; text-align:left; border-bottom:2px solid #ddd; font-size:13px;">
                                        JK</th>
                                    <th
                                        style="padding:10px; text-align:left; border-bottom:2px solid #ddd; font-size:13px;">
                                        Mapel</th>
                                    <th
                                        style="padding:10px; text-align:left; border-bottom:2px solid #ddd; font-size:13px;">
                                        Jabatan</th>
                                    <th
                                        style="padding:10px; text-align:left; border-bottom:2px solid #ddd; font-size:13px;">
                                        Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($guru as $i => $g)
                                    <tr style="border-bottom:1px solid #eee;">
                                        <td style="padding:10px; font-size:13px;">{{ $i + 1 }}</td>
                                        <td style="padding:10px; font-size:13px;">{{ $g->nip }}</td>
                                        <td style="padding:10px; font-size:13px;">{{ $g->nama }}</td>
                                        <td style="padding:10px; font-size:13px;">{{ $g->jenis_kelamin }}</td>
                                        <td style="padding:10px; font-size:13px;">{{ $g->mata_pelajaran ?? '-' }}</td>
                                        <td style="padding:10px; font-size:13px;">{{ $g->jabatan ?? '-' }}</td>
                                        <td style="padding:10px;">
                                            <div style="display:flex; gap:6px;">
                                                <a href="{{ route('siswa-guru.guru.edit', $g->id) }}" class="btn-action"
                                                    style="font-size:12px; padding:4px 10px;">
                                                    Edit
                                                </a>

                                                <form action="{{ route('siswa-guru.guru.destroy', $g->id) }}"
                                                    method="POST" onsubmit="return confirm('Yakin hapus guru ini?')"
                                                    style="margin:0;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn-action btn-danger"
                                                        style="font-size:12px; padding:4px 10px;">
                                                        Hapus
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" style="padding:20px; text-align:center; color:#888;">
                                            Belum ada data guru.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

        </div>
    </main>

    <script>
        function showTab(tab) {
            const tabSiswa = document.getElementById('tabSiswa');
            const tabGuru = document.getElementById('tabGuru');
            const btnSiswa = document.getElementById('tabBtnSiswa');
            const btnGuru = document.getElementById('tabBtnGuru');

            if (tab === 'siswa') {
                tabSiswa.style.display = 'block';
                tabGuru.style.display = 'none';
                btnSiswa.style.background = '#d99a22';
                btnGuru.style.background = '#6c757d';
            } else {
                tabSiswa.style.display = 'none';
                tabGuru.style.display = 'block';
                btnSiswa.style.background = '#6c757d';
                btnGuru.style.background = '#d99a22';
            }
        }
    </script>
@endsection
