@extends('layout.app')

@section('title', 'Tambah User - Admin')

@section('content')
<div class="user-form-container">
    <h1>Tambah User</h1>

    <form action="{{ route('admin.users.store') }}" method="POST" class="user-form">
        @csrf

        <div class="form-group">
            <label>Nama Lengkap</label>
            <input type="text" name="name" value="{{ old('name') }}">
            @error('name') <p class="form-error">{{ $message }}</p> @enderror
        </div>

        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" value="{{ old('username') }}">
            @error('username') <p class="form-error">{{ $message }}</p> @enderror
        </div>

        <div class="form-group">
            <label>Role</label>
            <select name="role">
                <option value="">-- Pilih Role --</option>
                <option value="admin" {{ old('role') === 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="guru" {{ old('role') === 'guru' ? 'selected' : '' }}>Guru</option>
                <option value="siswa" {{ old('role') === 'siswa' ? 'selected' : '' }}>Siswa</option>
            </select>
            @error('role') <p class="form-error">{{ $message }}</p> @enderror
        </div>

        <div class="form-group">
            <label>Kata Sandi</label>
            <input type="password" name="password">
            @error('password') <p class="form-error">{{ $message }}</p> @enderror
        </div>

        <div class="form-group">
            <label>Konfirmasi Kata Sandi</label>
            <input type="password" name="password_confirmation">
        </div>

        <div class="form-actions">
            <a href="{{ route('admin.users.index') }}" class="btn-secondary">Batal</a>
            <button type="submit" class="btn-primary">Simpan</button>
        </div>
    </form>
</div>
@endsection

@push('styles')
<style>
.user-form-container {
    max-width: 480px;
    margin: 0 auto;
    padding: 40px 20px;
}

.user-form-container h1 {
    font-size: 24px;
    font-weight: 700;
    color: #1e293b;
    margin-bottom: 24px;
}

.user-form {
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

.form-group input,
.form-group select {
    width: 100%;
    padding: 10px 12px;
    border: 1px solid #cbd5e1;
    border-radius: 8px;
    font-size: 14px;
    box-sizing: border-box;
}

.form-error {
    color: #dc2626;
    font-size: 13px;
    margin-top: 4px;
}

.form-actions {
    display: flex;
    gap: 12px;
    margin-top: 8px;
}

.btn-primary {
    background-color: #ca8a04;
    color: #fff;
    padding: 10px 18px;
    border-radius: 8px;
    border: none;
    font-weight: 600;
    font-size: 14px;
    cursor: pointer;
}

.btn-primary:hover {
    background-color: #a16207;
}

.btn-secondary {
    background-color: #f1f5f9;
    color: #334155;
    padding: 10px 18px;
    border-radius: 8px;
    text-decoration: none;
    font-weight: 600;
    font-size: 14px;
}

.btn-secondary:hover {
    background-color: #e2e8f0;
}
</style>
@endpush
