@extends('layout.app')

@section('title', $berita->judul)

@section('content')
<main class="content">
    <div class="container">

        <h1 class="page-title">{{ $berita->judul }}</h1>
        <p class="page-subtitle">
            {{ $berita->penulis ?? 'Admin' }}
            &middot;
            {{ optional($berita->tanggal)->format('d M Y') }}
        </p>
        <hr class="divider">

        <div class="card">

            @if ($berita->foto)
                <img src="{{ asset('storage/' . $berita->foto) }}"
                     alt="{{ $berita->judul }}"
                     style="width:100%; max-height:400px; object-fit:cover; border-radius:6px; margin-bottom:20px;">
            @endif

            <div style="line-height:1.8; color:#333;">
                {!! nl2br(e($berita->isi)) !!}
            </div>

            <div class="action-buttons" style="margin-top:24px; padding-top:16px; border-top:1px solid #eee;">
                <a href="{{ route('berita.edit', $berita->id) }}" class="btn-action">
                    Edit
                </a>
                <a href="{{ route('berita.index') }}" class="btn-action" style="background:#6c757d;">
                    Kembali
                </a>
            </div>

        </div>

    </div>
</main>
@endsection
