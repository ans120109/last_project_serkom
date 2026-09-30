<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index()
    {
        $berita = Berita::with('penulis')
            ->orderBy('tanggal', 'desc')
            ->get();

        return view('berita', compact('berita'));
    }

    public function create()
    {
        return view('berita.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'jenis' => 'required|in:Berita,Pengumuman',
            'isi' => 'required|string',
        ]);

        Berita::create($validated + [
            // Diambil dari session login, bukan dari input form,
            // supaya penulis tidak bisa dipalsukan lewat request.
            'id_user' => $request->user()->id,
        ]);

        return redirect()
            ->route('berita')
            ->with('success', 'Berita berhasil ditambahkan.');
    }

    public function edit(Berita $berita)
    {
        $berita->load('penulis');

        return view('berita.edit', compact('berita'));
    }

    public function update(Request $request, Berita $berita)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'jenis' => 'required|in:Berita,Pengumuman',
            'isi' => 'required|string',
        ]);

        $berita->update($validated);

        return redirect()
            ->route('berita')
            ->with('success', 'Berita berhasil diperbarui.');
    }

    public function destroy(Berita $berita)
    {
        $berita->delete();

        return redirect()
            ->route('berita')
            ->with('success', 'Berita berhasil dihapus.');
    }
}
