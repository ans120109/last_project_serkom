<?php

namespace App\Http\Controllers;

use App\Models\ProfilSekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfilSekolahController extends Controller
{
    public function index()
    {
        $profil = $this->getProfil();

        return view('profile-sekolah.index', compact('profil'));
    }

    public function edit()
    {
        $profil = $this->getProfil();

        return view('profile-sekolah.edit', compact('profil'));
    }

    public function update(Request $request)
    {
        $profil = $this->getProfil();


        $validated = $request->validate([
            'nama_sekolah'  => 'required|string|max:150',
            'alamat'        => 'nullable|string',
            'jenjang'       => 'nullable|string|max:100',
            'tahun_berdiri' => 'nullable|string|max:10',
            'jumlah_siswa'  => 'nullable|integer|min:0',
            'prestasi'      => 'nullable|string',
            'tentang'       => 'nullable|string',
            'visi'          => 'nullable|string',
            'misi'          => 'nullable|string',
            'foto'          => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);


        if ($request->hasFile('foto')) {
            // Hapus foto lama
            if ($profil->foto && Storage::disk('public')->exists($profil->foto)) {
                Storage::disk('public')->delete($profil->foto);
            }

            // Simpan foto baru
            $validated['foto'] = $request->file('foto')->store('profil-sekolah', 'public');
        }
        $profil->update($validated);

        return redirect()->route('profile-sekolah')
            ->with('success', 'Profile sekolah berhasil diperbarui.');
    }

    private function getProfil(): ProfilSekolah
    {
        $profil = ProfilSekolah::first();

        if (! $profil) {
            $profil = ProfilSekolah::create([
                'nama_sekolah'  => 'SMA Cendekia Nusantara',
                'alamat'        => 'Jl. Pendidikan Raya No. 45, Tasikmalaya',
                'jenjang'       => 'Sekolah Menengah Atas',
                'tahun_berdiri' => '1998',
                'jumlah_siswa'  => 0,
            ]);
        }

        return $profil;
    }
}
