@extends('layout.app')

@section('title', 'Berita & Pengumuman')

@push('styles')
<style>
    .berita-meta { display: flex; flex-wrap: wrap; gap: 8px 18px; align-items: center;
                   margin-bottom: 12px; font-size: 13px; color: #4b5563; }
    .berita-meta .meta-item { display: inline-flex; align-items: center; gap: 5px; }
    .berita-meta strong { color: #0d1b3e; font-weight: 600; }
    .badge-jenis { display: inline-block; padding: 3px 10px; border-radius: 999px;
                   font-size: 12px; font-weight: 600; background: #fef3c7; color: #92400e; }
    .badge-jenis.pengumuman { background: #dbeafe; color: #1e40af; }
</style>
@endpush

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

    {{-- Variabel $berita dikirim oleh BeritaController@index (sudah eager-load relasi penulis) --}}
    @forelse($berita as $b)
        <div class="card">
            <h2>{{ $b->judul }}</h2>

            <div class="berita-meta">
                <span class="badge-jenis {{ $b->jenis === 'Pengumuman' ? 'pengumuman' : '' }}">
                    {{ $b->jenis }}
                </span>
                <span class="meta-item">
                    Tanggal: <strong>{{ $b->tanggal?->translatedFormat('d F Y') ?? '-' }}</strong>
                </span>
                <span class="meta-item">
                    Diinput oleh: <strong>{{ $b->penulis->name ?? 'Tidak diketahui' }}</strong>
                    ({{ $b->penulis->username ?? '-' }})
                </span>
                <span class="meta-item">
                    Pada: <strong>{{ $b->created_at?->translatedFormat('d F Y, H:i') ?? '-' }}</strong>
                </span>
            </div>

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
