@extends('layout.app')

@section('title', 'Galeri')

@section('content')
<main class="content">
    <div class="container">
        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:10px;">
            <div>
                <h1 class="page-title">Galeri</h1>
                <p class="page-subtitle">Dokumentasi kegiatan sekolah.</p>
            </div>

            @auth
                @if (Auth::user()->role === 'admin' || Auth::user()->role === 'operator')
                    <a href="{{ route('galeri.create') }}" class="btn-action">
                        + Tambah Foto
                    </a>
                @endif
            @endauth
        </div>

        <hr class="divider">

        @if (session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (isset($galeri) && $galeri->count() > 0)

            <div style="display:grid; grid-template-columns:repeat(auto-fill, minmax(220px, 1fr)); gap:16px;">
                @foreach ($galeri as $item)
                    <div class="card" style="padding:0; overflow:hidden; margin-bottom:0;">

                        @if ($item->foto)
                            <img src="{{ asset('storage/' . $item->foto) }}"
                                 alt="{{ $item->judul ?? 'Foto' }}"
                                 style="width:100%; height:180px; object-fit:cover; display:block;">
                        @else
                            <div style="width:100%; height:180px; background:#f0f0f0; display:flex; align-items:center; justify-content:center; color:#888;">
                                Tidak ada foto
                            </div>
                        @endif

                        <div style="padding:12px 16px;">
                            <strong style="display:block; font-size:15px; color:#0d1b3e; margin-bottom:4px;">
                                {{ $item->judul ?? 'Tanpa Judul' }}
                            </strong>
                            {{-- <p class="muted" style="font-size:13px; margin:0;">
                                {{ $item->deskripsi ?? '' }}
                            </p> --}}

                            @auth
                                @if (Auth::user()->role === 'admin' || Auth::user()->role === 'operator')
                                    <div class="action-buttons" style="margin-top:10px;">
                                        <form action="{{ route('galeri.destroy', $item->id) }}"
                                              method="POST"
                                              onsubmit="return confirm('Yakin hapus foto ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-action btn-danger"
                                                    style="font-size:12px; padding:4px 10px;">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                @endif
                            @endauth
                        </div>

                    </div>
                @endforeach
            </div>

        @else

            <div class="card">
                <h2>📸 Galeri Kegiatan</h2>
                <p class="muted">Belum ada foto.</p>

                @auth
                    @if (Auth::user()->role === 'admin' || Auth::user()->role === 'operator')
                        <div class="action-buttons" style="margin-top:12px;">
                            <a href="{{ route('galeri.create') }}" class="btn-action">
                                + Tambah Foto Pertama
                            </a>
                        </div>
                    @endif
                @endauth
            </div>

        @endif

    </div>
</main>
@endsection
