<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    public function index()
    {
        $berita = Berita::latest()->get();
        return view('berita', compact('berita'));
    }

    public function create()
    {
        return view('berita.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul'   => 'required|string|max:255',
            'isi'     => 'required|string',
            'foto'    => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'penulis' => 'nullable|string|max:100',
            'tanggal' => 'nullable|date',
        ]);

        $data = $request->only(['judul', 'isi', 'penulis', 'tanggal']);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('berita', 'public');
        }

        Berita::create($data);

        return redirect()->route('berita.index')
            ->with('success', 'Berita berhasil ditambahkan.');
    }

    public function show(Berita $berita)
    {
        return view('berita.show', compact('berita'));
    }

    public function edit(Berita $berita)
    {
        return view('berita.edit', compact('berita'));
    }

    public function update(Request $request, Berita $berita)
    {
        $request->validate([
            'judul'   => 'required|string|max:255',
            'isi'     => 'required|string',
            'foto'    => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'penulis' => 'nullable|string|max:100',
            'tanggal' => 'nullable|date',
        ]);

        $data = $request->only(['judul', 'isi', 'penulis', 'tanggal']);

        if ($request->hasFile('foto')) {
            // Hapus foto lama
            if ($berita->foto && Storage::disk('public')->exists($berita->foto)) {
                Storage::disk('public')->delete($berita->foto);
            }
            $data['foto'] = $request->file('foto')->store('berita', 'public');
        }

        $berita->update($data);

        return redirect()->route('berita.index')
            ->with('success', 'Berita berhasil diperbarui.');
    }

    public function destroy(Berita $berita)
    {
        if ($berita->foto && Storage::disk('public')->exists($berita->foto)) {
            Storage::disk('public')->delete($berita->foto);
        }

        $berita->delete();

        return redirect()->route('berita.index')
            ->with('success', 'Berita berhasil dihapus.');
    }
}
