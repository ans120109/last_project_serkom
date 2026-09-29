@extends('layout.app')

@section('title', 'Edit Data User')

@section('content')

<div class="container">

    <div class="page-header">
        <h1>Edit Data User</h1>

        <p>
            Ubah informasi akun pengguna.
        </p>

        <hr>
    </div>


    <div class="form-card">

        <form action="{{ route('users.update', $user->id) }}" method="POST">

            @csrf
            @method('PUT')


            {{-- Nama --}}
            <div class="form-group">

                <label for="name">
                    Nama Lengkap
                </label>

                <input
                    type="text"
                    id="name"
                    name="name"
                    class="form-control"
                    value="{{ old('name', $user->name) }}"
                    required
                >

                @error('name')
                    <div class="form-error">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            {{-- Username --}}
            <div class="form-group">

                <label for="username">
                    Username
                </label>

                <input
                    type="text"
                    id="username"
                    name="username"
                    class="form-control"
                    value="{{ old('username', $user->username) }}"
                    required
                >

                @error('username')
                    <div class="form-error">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            {{-- Role --}}
            <div class="form-group">

                <label for="role">
                    Role
                </label>

                <select
                    id="role"
                    name="role"
                    class="form-control"
                    required
                >

                    <option value="siswa"
                        {{ old('role', $user->role) == 'siswa' ? 'selected' : '' }}>
                        Siswa
                    </option>

                    <option value="operator"
                        {{ old('role', $user->role) == 'operator' ? 'selected' : '' }}>
                        Operator
                    </option>

                    <option value="admin"
                        {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>
                        Admin
                    </option>

                </select>

                @error('role')
                    <div class="form-error">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            {{-- Status --}}
            <div class="form-group">

                <label for="status">
                    Status Akun
                </label>

                <select
                    id="status"
                    name="status"
                    class="form-control"
                    required
                >

                    <option value="aktif"
                        {{ old('status', $user->status) == 'aktif' ? 'selected' : '' }}>
                        Aktif
                    </option>

                    <option value="nonaktif"
                        {{ old('status', $user->status) == 'nonaktif' ? 'selected' : '' }}>
                        Nonaktif
                    </option>

                </select>

                @error('status')
                    <div class="form-error">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            {{-- Tombol --}}
            <div class="form-actions">

                <button
                    type="submit"
                    class="btn btn-primary"
                >
                    Simpan Perubahan
                </button>

                <a
                    href="{{ route('users.index') }}"
                    class="btn btn-secondary"
                >
                    Batal
                </a>

            </div>

        </form>

    </div>

</div>

@endsection
