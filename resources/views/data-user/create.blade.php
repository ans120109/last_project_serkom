@extends('layout.app')

@section('content')
<style>
    .du-wrap { max-width: 1100px; margin: 40px auto; padding: 0 16px; }
    .du-wrap h1 { font-size: 28px; margin: 0 0 4px; }
    .du-sub { color: #6b7280; margin-bottom: 20px; }
    .du-card { background: #fff; border-radius: 10px; box-shadow: 0 1px 4px rgba(0,0,0,.08);
               padding: 20px; margin-bottom: 24px; }
    .du-card-head { display: flex; justify-content: space-between; align-items: center; margin-bottom: 14px; }
    .du-card-head h2 { margin: 0; font-size: 18px; display: flex; align-items: center; gap: 10px; }
    .du-badge { background: #d99a1e; color: #fff; border-radius: 50%; width: 32px; height: 32px;
                display: inline-flex; align-items: center; justify-content: center; font-size: 16px; }
    .du-table { width: 100%; border-collapse: collapse; }
    .du-table th { background: #0b1a3d; color: #fff; text-align: left; padding: 10px; font-size: 14px; }
    .du-table td { padding: 8px 6px; border-bottom: 1px solid #eee; }
    .du-table input, .du-table select { width: 100%; padding: 8px; border: 1px solid #d1d5db;
                                         border-radius: 6px; font-size: 14px; box-sizing: border-box; }
    .du-table input:focus, .du-table select:focus { outline: none; border-color: #d99a1e; }
    .btn { border: 0; border-radius: 6px; padding: 9px 16px; cursor: pointer; font-size: 14px; font-weight: 600; }
    .btn-add { background: #d99a1e; color: #fff; }
    .btn-del { background: #fee2e2; color: #b91c1c; padding: 7px 11px; }
    .btn-save { background: #0b1a3d; color: #fff; padding: 12px 28px; font-size: 15px; }
    .du-alert { padding: 12px 16px; border-radius: 8px; margin-bottom: 16px; }
    .du-alert.ok { background: #dcfce7; color: #166534; }
    .du-alert.err { background: #fee2e2; color: #991b1b; }
    .du-empty { text-align: center; color: #9ca3af; padding: 16px; }

    .du-card-foot { margin-top: 14px; text-align: right; }
    .du-list th, .du-list td { padding: 10px; text-align: left; font-size: 14px; }
    .du-list th { background: #0b1a3d; color: #fff; }
    .du-list td { border-bottom: 1px solid #eee; }
    .du-count { background: #eef2ff; color: #0b1a3d; border-radius: 999px; padding: 2px 10px; font-size: 13px; }
    .aksi-wrap { display: flex; gap: 6px; align-items: center; }
    .aksi-wrap form { margin: 0; }
    .btn-sm { padding: 6px 12px !important; font-size: 13px !important; }
</style>

<div class="du-wrap">
    <h1>Data Siswa & Guru</h1>
    <p class="du-sub">Tambahkan data siswa atau guru, lalu simpan masing-masing tabel.</p>

    @if(session('success'))
        <div class="du-alert ok">{{ session('success') }}</div>
    @endif
    @if($errors->any())
        <div class="du-alert err">
            <ul style="margin:0;padding-left:18px">
                @foreach($errors->all() as $e) <li>{{ $e }}</li> @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('siswa-guru.store') }}" method="POST">
        @csrf
        <input type="hidden" name="simpan" id="simpan" value="">

        {{-- ===== FORM TABEL SISWA ===== --}}
        <div class="du-card" id="section-siswa">
            <div class="du-card-head">
                <h2><span class="du-badge">🎓</span> Data Siswa</h2>
                <button type="button" class="btn btn-add" onclick="addRow('siswa')">+ Tambah Siswa</button>
            </div>
            <div style="overflow-x:auto">
                <table class="du-table">
                    <thead>
                        <tr>
                            <th style="width:50px">No</th>
                            <th>Nama</th>
                            <th style="width:150px">NIS</th>
                            <th style="width:120px">Kelas</th>
                            <th style="width:140px">Jenis Kelamin</th>
                            <th style="width:70px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="tbody-siswa"></tbody>
                </table>
            </div>
            <div class="du-card-foot">
                <button type="button" class="btn btn-save" onclick="saveSection('siswa')">💾 Simpan Siswa</button>
            </div>
        </div>

        {{-- ===== FORM TABEL GURU ===== --}}
        <div class="du-card" id="section-guru">
            <div class="du-card-head">
                <h2><span class="du-badge">👨‍🏫</span> Data Guru</h2>
                <button type="button" class="btn btn-add" onclick="addRow('guru')">+ Tambah Guru</button>
            </div>
            <div style="overflow-x:auto">
                <table class="du-table">
                    <thead>
                        <tr>
                            <th style="width:50px">No</th>
                            <th>Nama</th>
                            <th style="width:170px">NIP</th>
                            <th style="width:200px">Mata Pelajaran</th>
                            <th style="width:150px">No. HP</th>
                            <th style="width:70px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="tbody-guru"></tbody>
                </table>
            </div>
            <div class="du-card-foot">
                <button type="button" class="btn btn-save" onclick="saveSection('guru')">💾 Simpan Guru</button>
            </div>
        </div>
    </form>

   {{-- ===== DAFTAR SISWA ===== --}}
    <div class="du-card">
        <div class="du-card-head">
            <h2><span class="du-badge">🎓</span> Daftar Siswa <span class="du-count">{{ $siswas->count() }}</span></h2>
        </div>
        <div style="overflow-x:auto">
            <table class="du-table du-list">
                <thead>
                    <tr>
                        <th style="width:50px">No</th>
                        <th>Nama</th>
                        <th>NIS</th>
                        <th>Kelas</th>
                        <th>Jenis Kelamin</th>
                        <th style="width:150px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($siswas as $s)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $s->nama }}</td>
                            <td>{{ $s->nis }}</td>
                            <td>{{ $s->kelas }}</td>
                            <td>{{ $s->jenis_kelamin === 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                            <td>
                                <div class="aksi-wrap">
                                    <a href="{{ route('siswa-guru.siswa.edit', $s) }}" class="btn btn-outline btn-sm">Edit</a>
                                    <form action="{{ route('siswa-guru.siswa.destroy', $s) }}" method="POST"
                                        onsubmit="return confirm('Hapus siswa {{ $s->nama }}?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="du-empty">Belum ada data siswa.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- ===== DAFTAR GURU ===== --}}
    <div class="du-card">
        <div class="du-card-head">
            <h2><span class="du-badge">👨‍🏫</span> Daftar Guru <span class="du-count">{{ $gurus->count() }}</span></h2>
        </div>
        <div style="overflow-x:auto">
            <table class="du-table du-list">
                <thead>
                    <tr>
                        <th style="width:50px">No</th>
                        <th>Nama</th>
                        <th>NIP</th>
                        <th>Mata Pelajaran</th>
                        <th>No. HP</th>
                        <th style="width:150px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($gurus as $g)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $g->nama }}</td>
                            <td>{{ $g->nip }}</td>
                            <td>{{ $g->mata_pelajaran }}</td>
                            <td>{{ $g->no_hp ?? '-' }}</td>
                            <td>
                                <div class="aksi-wrap">
                                    <a href="{{ route('siswa-guru.guru.edit', $g) }}" class="btn btn-outline btn-sm">Edit</a>
                                    <form action="{{ route('siswa-guru.guru.destroy', $g) }}" method="POST"
                                        onsubmit="return confirm('Hapus guru {{ $g->nama }}?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="du-empty">Belum ada data guru.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    const counters = { siswa: 0, guru: 0 };

    const templates = {
        siswa: (i) => `
            <td class="no"></td>
            <td><input type="text" name="siswa[${i}][nama]" placeholder="Nama siswa" required></td>
            <td><input type="text" name="siswa[${i}][nis]" placeholder="NIS" required></td>
            <td><input type="text" name="siswa[${i}][kelas]" placeholder="XI IPA 1" required></td>
            <td>
                <select name="siswa[${i}][jenis_kelamin]" required>
                    <option value="">Pilih</option>
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </td>
            <td><button type="button" class="btn btn-del" onclick="removeRow(this,'siswa')">✕</button></td>`,
        guru: (i) => `
            <td class="no"></td>
            <td><input type="text" name="guru[${i}][nama]" placeholder="Nama guru" required></td>
            <td><input type="text" name="guru[${i}][nip]" placeholder="NIP" required></td>
            <td><input type="text" name="guru[${i}][mata_pelajaran]" placeholder="Matematika" required></td>
            <td><input type="text" name="guru[${i}][no_hp]" placeholder="08xxxxxxxxxx"></td>
            <td><button type="button" class="btn btn-del" onclick="removeRow(this,'guru')">✕</button></td>`
    };

    function addRow(type) {
        const tbody = document.getElementById('tbody-' + type);
        const empty = tbody.querySelector('.du-empty-row');
        if (empty) empty.remove();

        const tr = document.createElement('tr');
        tr.innerHTML = templates[type](counters[type]++);
        tbody.appendChild(tr);
        renumber(type);
    }

    function removeRow(btn, type) {
        btn.closest('tr').remove();
        renumber(type);
    }

    function renumber(type) {
        const tbody = document.getElementById('tbody-' + type);
        const rows = tbody.querySelectorAll('tr:not(.du-empty-row)');
        rows.forEach((tr, idx) => tr.querySelector('.no').textContent = idx + 1);

        if (rows.length === 0) {
            tbody.innerHTML = `<tr class="du-empty-row"><td colspan="6" class="du-empty">
                Belum ada baris ${type}. Klik tombol "Tambah".</td></tr>`;
        }
    }

    function saveSection(type) {
        const other = type === 'siswa' ? 'guru' : 'siswa';
        const form = document.querySelector('form');
        const otherFields = document.querySelectorAll(
            '#section-' + other + ' input, #section-' + other + ' select'
        );

        // Tabel yang disimpan harus punya minimal 1 baris
        if (!document.querySelector('#tbody-' + type + ' tr:not(.du-empty-row)')) {
            alert('Tambahkan minimal 1 baris ' + type + ' terlebih dahulu.');
            return;
        }

        document.getElementById('simpan').value = type;

        // Nonaktifkan input tabel lain agar tidak ikut divalidasi dan dikirim
        otherFields.forEach(el => el.disabled = true);

        if (!form.reportValidity()) {
            otherFields.forEach(el => el.disabled = false);
            return;
        }

        form.submit();
    }

    // Mulai dengan 1 baris di masing-masing tabel
    renumber('siswa'); renumber('guru');
    addRow('siswa');   addRow('guru');
</script>
@endsection
