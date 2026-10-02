@extends('layout.app')

@section('title', 'Tambah User')

@section('content')
<main class="content">
    <div class="container">

        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:10px;">
            <div>
                <h1 class="page-title">Tambah User</h1>
                <p class="page-subtitle">Buat akun pengguna baru.</p>
            </div>
            <a href="{{ route('admin.users.index') }}" class="btn-action" style="background:#6c757d;">
                ← Kembali
            </a>
        </div>

        <hr class="divider">

        @if ($errors->any())
            <div style="background:#f8d7da; color:#721c24; padding:12px 16px; border-radius:5px; margin-bottom:16px;">
                <ul style="margin:0; padding-left:20px;">
                    @foreach ($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card">
            <form action="{{ route('admin.users.store') }}" method="POST">
                @csrf

                <div style="margin-bottom:16px;">
                    <label style="display:block; font-weight:600; margin-bottom:6px;">
                        Nama Lengkap <span style="color:red;">*</span>
                    </label>
                    <input type="text" name="name" value="{{ old('name') }}" required
                           style="width:100%; padding:8px 12px; border:1px solid #ccc; border-radius:4px; font-size:14px;">
                </div>

                <div style="margin-bottom:16px;">
                    <label style="display:block; font-weight:600; margin-bottom:6px;">
                        Username <span style="color:red;">*</span>
                    </label>
                    <input type="text" name="username" value="{{ old('username') }}" required
                           style="width:100%; padding:8px 12px; border:1px solid #ccc; border-radius:4px; font-size:14px;">
                </div>

                <div style="display:grid; grid-template-columns:1fr 1fr; gap:16px; margin-bottom:16px;">
                    <div>
                        <label style="display:block; font-weight:600; margin-bottom:6px;">
                            Password <span style="color:red;">*</span>
                        </label>
                        <input type="password" name="password" required
                               style="width:100%; padding:8px 12px; border:1px solid #ccc; border-radius:4px; font-size:14px;">
                    </div>
                    <div>
                        <label style="display:block; font-weight:600; margin-bottom:6px;">
                            Konfirmasi Password <span style="color:red;">*</span>
                        </label>
                        <input type="password" name="password_confirmation" required
                               style="width:100%; padding:8px 12px; border:1px solid #ccc; border-radius:4px; font-size:14px;">
                    </div>
                </div>

                <div style="margin-bottom:16px;">
                    <label style="display:block; font-weight:600; margin-bottom:6px;">
                        Role <span style="color:red;">*</span>
                    </label>
                    <select name="role" required
                            style="width:100%; padding:8px 12px; border:1px solid #ccc; border-radius:4px; font-size:14px;">
                        <option value="">-- Pilih Role --</option>
                        <option value="admin"    {{ old('role') === 'admin'    ? 'selected' : '' }}>Admin</option>
                        <option value="operator" {{ old('role') === 'operator' ? 'selected' : '' }}>Operator</option>
                        <option value="user"     {{ old('role') === 'user'     ? 'selected' : '' }}>User</option>
                    </select>
                </div>

                <div style="margin-bottom:20px; padding:16px; background:#f9f9f9; border-radius:6px;">
                    <label style="display:block; font-weight:600; margin-bottom:10px;">
                        Status Akun
                    </label>

                    @php
                        $currentStatus = old('is_active', '1');
                    @endphp

                    <div style="display:flex; gap:20px; align-items:center;">
                        <label style="display:flex; align-items:center; gap:8px; cursor:pointer;">
                            <input type="radio" name="is_active" value="1"
                                   {{ $currentStatus == '1' ? 'checked' : '' }}>
                            <span style="color:#28a745; font-weight:600;">● Aktif</span>
                        </label>

                        <label style="display:flex; align-items:center; gap:8px; cursor:pointer;">
                            <input type="radio" name="is_active" value="0"
                                   {{ $currentStatus == '0' ? 'checked' : '' }}>
                            <span style="color:#dc3545; font-weight:600;">● Nonaktif</span>
                        </label>
                    </div>
                </div>

                <div class="action-buttons" style="margin-top:20px; padding-top:16px; border-top:1px solid #eee;">
                    <button type="submit" class="btn-action">Simpan</button>
                    <a href="{{ route('admin.users.index') }}" class="btn-action" style="background:#6c757d;">Batal</a>
                </div>

            </form>
        </div>

    </div>
</main>
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
