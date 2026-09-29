@extends('layout.app')

@section('title', 'Edit Ekstrakurikuler')

@section('content')
<div class="ekskul-form-container">
    <h1>Edit Ekstrakurikuler</h1>

    <form action="{{ route('ekstrakurikuler.update', $ekstrakurikuler) }}" method="POST" enctype="multipart/form-data" class="ekskul-form">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Nama Ekstrakurikuler</label>
            <input type="text" name="nama" value="{{ old('nama', $ekstrakurikuler->nama) }}">
            @error('nama') <p class="form-error">{{ $message }}</p> @enderror
        </div>

        <div class="form-group">
            <label>Deskripsi</label>
            <textarea name="deskripsi" rows="4">{{ old('deskripsi', $ekstrakurikuler->deskripsi) }}</textarea>
            @error('deskripsi') <p class="form-error">{{ $message }}</p> @enderror
        </div>

        <div class="form-group">
            <label>Jadwal (opsional)</label>
            <input type="text" name="jadwal" value="{{ old('jadwal', $ekstrakurikuler->jadwal) }}">
        </div>

        @if ($ekstrakurikuler->gambar)
            <img src="{{ Storage::url($ekstrakurikuler->gambar) }}" class="preview-image" style="display:block;">
        @endif

        <div class="form-group">
            <label>Ganti Gambar (opsional)</label>
            <input type="file" name="gambar" id="gambar-input" accept="image/*">
            @error('gambar') <p class="form-error">{{ $message }}</p> @enderror
            <img id="preview-gambar" class="preview-image" style="display:none;">
        </div>

        <button type="submit" class="btn-primary">Update</button>
    </form>
</div>
@endsection

@push('styles')
<style>
.ekskul-form-container {
    max-width: 560px;
    margin: 0 auto;
    padding: 40px 20px;
}

.ekskul-form-container h1 {
    font-size: 24px;
    font-weight: 700;
    color: #1e293b;
    margin-bottom: 24px;
}

.ekskul-form {
    display: flex;
    flex-direction: column;
    gap: 16px;
}

.form-group label {
    display: block;
    font-weight: 600;
    font-size: 14px;
    color: #334155;
    margin-bottom: 6px;
}

.form-group input[type="text"],
.form-group input[type="file"],
.form-group textarea {
    width: 100%;
    padding: 10px 12px;
    border: 1px solid #cbd5e1;
    border-radius: 8px;
    font-size: 14px;
    box-sizing: border-box;
}

.form-group textarea {
    resize: vertical;
}

.form-error {
    color: #dc2626;
    font-size: 13px;
    margin-top: 4px;
}

.preview-image {
    margin-top: 10px;
    width: 100px;
    height: 100px;
    object-fit: cover;
    border-radius: 8px;
}
</style>
@endpush

@push('scripts')
<script>
document.getElementById('gambar-input').addEventListener('change', function (e) {
    const file = e.target.files[0];
    const preview = document.getElementById('preview-gambar');

    if (file) {
        const reader = new FileReader();
        reader.onload = function (event) {
            preview.src = event.target.result;
            preview.style.display = 'block';
        };
        reader.readAsDataURL(file);
    } else {
        preview.style.display = 'none';
    }
});
</script>
@endpush
