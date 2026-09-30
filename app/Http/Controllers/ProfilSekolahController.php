<?php

namespace App\Http\Controllers;

use App\Models\ProfilSekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfilSekolahController extends Controller
{
    // Halaman profil sekolah (bisa dilihat semua orang)
    public function index()
    {
        $profil = $this->ambilProfil();

        return view('profile-sekolah.index', compact('profil'));
    }

    // Form edit (hanya admin & operator, dijaga di route)
    public function edit()
    {
        $profil = $this->ambilProfil();

        return view('profile-sekolah.edit', compact('profil'));
    }

    // Simpan perubahan + upload foto (hanya admin & operator)
    public function update(Request $request)
    {
        $data = $request->validate([
            'nama'          => 'required|string|max:255',
            'alamat'        => 'required|string|max:255',
            'jenjang'       => 'required|string|max:100',
            'tahun_berdiri' => 'required|integer|min:1900|max:' . date('Y'),
            'jumlah_siswa'  => 'required|integer|min:0',
            'prestasi'      => 'nullable|string',
            'foto'          => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048', // maks 2 MB
            'hapus_foto'    => 'nullable|boolean',
        ]);

        $profil = $this->ambilProfil();

        if ($request->hasFile('foto')) {
            // Ganti foto: hapus file lama dulu
            if ($profil->foto) {
                Storage::disk('public')->delete($profil->foto);
            }
            $data['foto'] = $request->file('foto')->store('profil-sekolah', 'public');
        } elseif ($request->boolean('hapus_foto') && $profil->foto) {
            // Hapus foto tanpa mengganti
            Storage::disk('public')->delete($profil->foto);
            $data['foto'] = null;
        }

        unset($data['hapus_foto']);

        $profil->update($data);

        return redirect()
            ->route('profile-sekolah')
            ->with('success', 'Profil sekolah berhasil diperbarui.');
    }

    // Ambil data profil. Kalau tabel masih kosong, otomatis dibuatkan
    // 1 baris awal supaya halaman tidak error 404.
    private function ambilProfil(): ProfilSekolah
    {
        return ProfilSekolah::firstOrCreate([], [
            'nama'          => 'SMA Cendekia Nusantara',
            'alamat'        => 'Jl. Pendidikan No. 10, Tasikmalaya',
            'jenjang'       => 'Sekolah Menengah Atas',
            'tahun_berdiri' => 2010,
            'jumlah_siswa'  => 1543,
            'prestasi'      => "Juara 1 Lomba Fisika Tingkat Nasional\n"
                             . "Juara Harapan 1 Lomba Kimia Tingkat Internasional\n"
                             . "Juara 1 Lomba Matematika Tingkat Nasional",
        ]);
    }
}
