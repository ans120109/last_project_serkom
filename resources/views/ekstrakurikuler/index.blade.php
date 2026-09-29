@extends('layout.app')

@section('title', 'Ekstrakurikuler - SMA Cendekia Nusantara')

@section('content')
<div class="ekskul-container">

    <div class="ekskul-header">
        <div>
            <h1>Ekstrakurikuler</h1>
            <p class="ekskul-subtitle">Daftar kegiatan ekstrakurikuler yang tersedia di sekolah.</p>
        </div>

        @auth
            @if (in_array(Auth::user()->role, ['admin', 'guru']))
                <a href="{{ route('ekstrakurikuler.create') }}" class="btn-primary">
                    + Tambah Ekstrakurikuler
                </a>
            @endif
        @endauth
    </div>

    @if (session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif

    <hr class="ekskul-divider">

    <div class="ekskul-list">
        @forelse ($ekstrakurikulers as $ekskul)
            <div class="ekskul-card">

                <div class="ekskul-card-left">
                    @if ($ekskul->gambar)
                        <img src="{{ Storage::url($ekskul->gambar) }}" alt="{{ $ekskul->nama }}" class="ekskul-thumbnail">
                    @else
                        <div class="ekskul-thumbnail ekskul-thumbnail-placeholder">🏆</div>
                    @endif

                    <div>
                        <h2>
                            <a href="{{ route('ekstrakurikuler.show', $ekskul) }}">{{ $ekskul->nama }}</a>
                        </h2>
                        <p class="ekskul-desc">{{ Str::limit($ekskul->deskripsi, 120) }}</p>
                        @if ($ekskul->jadwal)
                            <p class="ekskul-jadwal">🗓 {{ $ekskul->jadwal }}</p>
                        @endif
                    </div>
                </div>

                @auth
                    @if (in_array(Auth::user()->role, ['admin', 'guru']))
                        <div class="ekskul-actions">
                            <a href="{{ route('ekstrakurikuler.edit', $ekskul) }}" class="link-edit">Edit</a>
                            <button type="button" class="link-delete" onclick="confirmDelete('{{ $ekskul->id_ekstrakurikuler }}')">
                                Hapus
                            </button>
                            <form id="delete-form-{{ $ekskul->id_ekstrakurikuler }}"
                                  action="{{ route('ekstrakurikuler.destroy', $ekskul) }}"
                                  method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </div>
                    @endif
                @endauth

            </div>
        @empty
            <p class="ekskul-empty">Belum ada data ekstrakurikuler.</p>
        @endforelse
    </div>

</div>
@endsection

@push('styles')
<style>
.ekskul-container {
    max-width: 900px;
    margin: 0 auto;
    padding: 40px 20px;
}

.ekskul-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    gap: 16px;
    flex-wrap: wrap;
}

.ekskul-header h1 {
    font-size: 28px;
    font-weight: 700;
    color: #1e293b;
    margin: 0 0 4px;
}

.ekskul-subtitle {
    color: #64748b;
    margin: 0;
}

.ekskul-divider {
    border: none;
    border-top: 1px solid #e2e8f0;
    margin: 24px 0;
}

.btn-primary {
    background-color: #ca8a04;
    color: #fff;
    padding: 10px 18px;
    border-radius: 8px;
    text-decoration: none;
    font-weight: 600;
    font-size: 14px;
    white-space: nowrap;
    transition: background-color 0.2s;
}

.btn-primary:hover {
    background-color: #a16207;
}

.alert-success {
    background-color: #dcfce7;
    color: #166534;
    padding: 12px 16px;
    border-radius: 8px;
    margin-top: 16px;
}

.ekskul-list {
    display: flex;
    flex-direction: column;
    gap: 16px;
}

.ekskul-card {
    background: #fff;
    border-radius: 14px;
    box-shadow: 0 1px 3px rgba(0,0,0,0.08);
    padding: 24px;
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    gap: 16px;
    flex-wrap: wrap;
}

.ekskul-card-left {
    display: flex;
    gap: 16px;
}

.ekskul-thumbnail {
    width: 64px;
    height: 64px;
    border-radius: 12px;
    object-fit: cover;
    flex-shrink: 0;
}

.ekskul-thumbnail-placeholder {
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #fef3c7;
    font-size: 24px;
}

.ekskul-card h2 {
    font-size: 17px;
    font-weight: 700;
    margin: 0 0 4px;
}

.ekskul-card h2 a {
    color: #1e293b;
    text-decoration: none;
}

.ekskul-card h2 a:hover {
    color: #ca8a04;
}

.ekskul-desc {
    color: #64748b;
    font-size: 14px;
    margin: 0 0 8px;
}

.ekskul-jadwal {
    color: #94a3b8;
    font-size: 13px;
    margin: 0;
}

.ekskul-actions {
    display: flex;
    gap: 12px;
    align-items: center;
}

.link-edit {
    color: #2563eb;
    font-size: 14px;
    text-decoration: none;
}

.link-edit:hover {
    text-decoration: underline;
}

.link-delete {
    color: #dc2626;
    font-size: 14px;
    background: none;
    border: none;
    cursor: pointer;
    padding: 0;
}

.link-delete:hover {
    text-decoration: underline;
}

.ekskul-empty {
    text-align: center;
    color: #94a3b8;
    padding: 40px 0;
}
</style>
@endpush

@push('scripts')
<script>
function confirmDelete(id) {
    if (confirm('Yakin ingin menghapus data ekstrakurikuler ini?')) {
        document.getElementById('delete-form-' + id).submit();
    }
}
</script>
@endpush
