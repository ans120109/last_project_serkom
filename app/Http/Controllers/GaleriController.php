<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    public function index()
    {
        $galeri = Galeri::latest()->get();
        return view('galeri.index', compact('galeri'));
    }

    public function create()
    {
        return view('galeri.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul'     => 'required|string|max:255',
            // 'deskripsi' => 'nullable|string',
            'foto'      => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = $request->only(['judul',]);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('galeri', 'public');
        }

        Galeri::create($data);

        return redirect()->route('galeri.index')
            ->with('success', 'Foto berhasil ditambahkan.');
    }

    public function show(Galeri $galeri)
    {
        return view('galeri.show', compact('galeri'));
    }

    public function destroy(Galeri $galeri)
    {
        if ($galeri->foto && Storage::disk('public')->exists($galeri->foto)) {
            Storage::disk('public')->delete($galeri->foto);
        }

        $galeri->delete();

        return redirect()->route('galeri.index')
            ->with('success', 'Foto berhasil dihapus.');
    }
}
