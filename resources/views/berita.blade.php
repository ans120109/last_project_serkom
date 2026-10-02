@extends('layout.app')

@section('title', 'Berita & Pengumuman')

@section('content')
<main class="content">
    <div class="container">

        {{-- Header --}}
        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom: 10px;">
            <div>
                <h1 class="page-title">Berita & Pengumuman</h1>
                <p class="page-subtitle">Daftar berita terbaru dari sekolah.</p>
            </div>
            <a href="{{ route('berita.create') }}" class="btn-action">
                + Tambah Berita
            </a>
        </div>

        <hr class="divider">

        {{-- Alert sukses --}}
        @if (session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif

        {{-- Daftar Berita --}}
        @forelse ($berita as $item)
            <div class="card">
                <div style="display:flex; justify-content:space-between; align-items:flex-start; gap:16px;">

                    {{-- Kiri: Teks --}}
                    <div style="flex:1; min-width:0;">
                        <h2>{{ $item->judul }}</h2>

                        <p class="muted" style="margin-bottom: 8px;">
                            {{ $item->penulis ?? 'Admin' }}
                            &middot;
                            {{ optional($item->tanggal)->format('d M Y') }}
                        </p>

                        <p class="muted" style="margin-bottom: 0;">
                            {{ \Illuminate\Support\Str::limit(strip_tags($item->isi), 150) }}
                        </p>
                    </div>

                    {{-- Kanan: Tombol Aksi --}}
                    <div class="action-buttons" style="margin-top:0; flex-shrink:0;">
                        <a href="{{ route('berita.edit', $item->id) }}" class="btn-action">
                            Edit
                        </a>

                        <form action="{{ route('berita.destroy', $item->id) }}"
                              method="POST"
                              onsubmit="return confirm('Yakin hapus berita ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-action btn-danger">
                                Hapus
                            </button>
                        </form>
                    </div>

                </div>
            </div>
        @empty
            <div class="card">
                <p class="muted">Belum ada berita. Klik <strong>+ Tambah Berita</strong> untuk memulai.</p>
            </div>
        @endforelse

    </div>
</main>
@endsection
