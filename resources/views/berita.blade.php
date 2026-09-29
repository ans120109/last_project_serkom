@extends('layout.app')

@section('title', 'Berita & Pengumuman')

@section('content')
    <h1 class="page-title">Berita & Pengumuman</h1>
    <p class="page-subtitle">Informasi terbaru dari SMA Cendekia Nusantara.</p>

    @auth
        <a href="{{ route('berita.create') }}" class="btn">+ Tambah Berita</a>
    @endauth

    <hr class="divider">

    @if(session('success'))
        <div class="card" style="background:#dcfce7;color:#166534">{{ session('success') }}</div>
    @endif

    {{-- Ganti $beritas dengan nama variabel dari BeritaController@index --}}
    @forelse($beritas ?? [] as $b)
        <div class="card">
            <h2>{{ $b->judul }}</h2>
            <p class="muted" style="margin-bottom:10px">{{ $b->created_at->format('d M Y') }}</p>
            <p>{{ \Illuminate\Support\Str::limit($b->isi, 250) }}</p>

            @auth
                <div style="margin-top:14px;display:flex;gap:8px">
                    <a href="{{ route('berita.edit', $b->id) }}" class="btn btn-outline">Edit</a>
                    <form action="{{ route('berita.destroy', $b->id) }}" method="POST"
                          onsubmit="return confirm('Hapus berita ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </div>
            @endauth
        </div>
    @empty
        <div class="card">
            <p class="muted">Belum ada berita atau pengumuman.</p>
        </div>
    @endforelse
@endsection
