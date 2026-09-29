<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class DataUserController extends Controller
{
    public function create()
    {
        return view('data-user.create', [
            'siswas' => Siswa::latest()->get(),
            'gurus'  => Guru::latest()->get(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'simpan' => 'required|in:siswa,guru',
        ]);

        if ($request->simpan === 'siswa') {
            $request->validate([
                'siswa'                 => 'required|array|min:1',
                'siswa.*.nama'          => 'required|string|max:255',
                'siswa.*.nis'           => 'required|string|distinct|unique:siswas,nis',
                'siswa.*.kelas'         => 'required|string|max:50',
                'siswa.*.jenis_kelamin' => 'required|in:L,P',
            ]);

            DB::transaction(function () use ($request) {
                foreach ($request->siswa as $row) {
                    Siswa::create($row);
                }
            });

            $pesan = 'Data siswa berhasil disimpan.';
        } else {
            $request->validate([
                'guru'                  => 'required|array|min:1',
                'guru.*.nama'           => 'required|string|max:255',
                'guru.*.nip'            => 'required|string|distinct|unique:gurus,nip',
                'guru.*.mata_pelajaran' => 'required|string|max:255',
                'guru.*.no_hp'          => 'nullable|string|max:20',
            ]);

            DB::transaction(function () use ($request) {
                foreach ($request->guru as $row) {
                    Guru::create($row);
                }
            });

            $pesan = 'Data guru berhasil disimpan.';
        }

        return redirect()->route('siswa-guru.create')->with('success', $pesan);
    }

    public function editSiswa(Siswa $siswa)
        {
            return view('data-user.edit-siswa', compact('siswa'));
        }

        public function updateSiswa(Request $request, Siswa $siswa)
        {
            $data = $request->validate([
                'nama'          => 'required|string|max:255',
                'nis'           => ['required', 'string', Rule::unique('siswas', 'nis')->ignore($siswa->id)],
                'kelas'         => 'required|string|max:50',
                'jenis_kelamin' => 'required|in:L,P',
            ]);

            $siswa->update($data);

            return redirect()->route('siswa-guru.create')->with('success', 'Data siswa berhasil diperbarui.');
        }

        public function destroySiswa(Siswa $siswa)
        {
            $siswa->delete();

            return redirect()->route('siswa-guru.create')->with('success', 'Data siswa berhasil dihapus.');
        }

        public function editGuru(Guru $guru)
        {
            return view('data-user.edit-guru', compact('guru'));
        }

        public function updateGuru(Request $request, Guru $guru)
        {
            $data = $request->validate([
                'nama'           => 'required|string|max:255',
                'nip'            => ['required', 'string', Rule::unique('gurus', 'nip')->ignore($guru->id)],
                'mata_pelajaran' => 'required|string|max:255',
                'no_hp'          => 'nullable|string|max:20',
            ]);

            $guru->update($data);

            return redirect()->route('siswa-guru.create')->with('success', 'Data guru berhasil diperbarui.');
        }

        public function destroyGuru(Guru $guru)
        {
            $guru->delete();

            return redirect()->route('siswa-guru.create')->with('success', 'Data guru berhasil dihapus.');
        }



}
