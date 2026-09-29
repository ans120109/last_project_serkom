@extends('layout.app')

@section('title', $ekstrakurikuler->nama)

@section('content')
<div class="ekskul-detail-container">
    <a href="{{ route('ekstrakurikuler.index') }}" class="back-link">&larr; Kembali ke daftar</a>

    <h1>{{ $ekstrakurikuler->nama }}</h1>

    @if ($ekstrakurikuler->jadwal)
        <p class="ekskul-jadwal">🗓 {{ $ekstrakurikuler->jadwal }}</p>
    @endif

    @if ($ekstrakurikuler->gambar)
        <img src="{{ Storage::url($ekstrakurikuler->gambar) }}" class="ekskul-detail-image">
    @endif

    <p class="ekskul-detail-desc">{{ $ekstrakurikuler->deskripsi }}</p>
</div>
@endsection

@push('styles')
<style>
.ekskul-detail-container {
    max-width: 700px;
    margin: 0 auto;
    padding: 40px 20px;
}

.back-link {
    color: #ca8a04;
    font-size: 14px;
    text-decoration: none;
}

.back-link:hover {
    text-decoration: underline;
}

.ekskul-detail-container h1 {
    font-size: 28px;
    font-weight: 700;
    color: #1e293b;
    margin: 16px 0 4px;
}

.ekskul-jadwal {
    color: #94a3b8;
    font-size: 14px;
    margin: 0 0 20px;
}

.ekskul-detail-image {
    width: 100%;
    border-radius: 14px;
    object-fit: cover;
    margin-bottom: 24px;
}

.ekskul-detail-desc {
    color: #334155;
    line-height: 1.7;
    font-size: 15px;
}
</style>
@endpush
