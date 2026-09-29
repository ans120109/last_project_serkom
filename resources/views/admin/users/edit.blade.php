@extends('layout.app')

@section('title', 'Edit Data User')

@section('content')

<div class="user-edit-page">

    <div class="user-page-header">

        <h1>
            Edit Data User
        </h1>

        <p>
            Ubah informasi akun pengguna.
        </p>

    </div>


    <div class="user-edit-card">

        <form
            action="{{ route('admin.users.update', $user->id) }}"
            method="POST"
        >

            @csrf

            @method('PUT')


            {{-- NAMA --}}

            <div class="user-form-group">

                <label for="name">
                    Nama Lengkap
                </label>

                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name', $user->name) }}"
                    class="user-form-control"
                    required
                >

                @error('name')

                    <div class="user-error">
                        {{ $message }}
                    </div>

                @enderror

            </div>


            {{-- USERNAME --}}

            <div class="user-form-group">

                <label for="username">
                    Username
                </label>

                <input
                    type="text"
                    id="username"
                    name="username"
                    value="{{ old('username', $user->username) }}"
                    class="user-form-control"
                    required
                >

                @error('username')

                    <div class="user-error">
                        {{ $message }}
                    </div>

                @enderror

            </div>


            {{-- ROLE --}}

            <div class="user-form-group">

                <label for="role">
                    Role
                </label>

                <select
                    id="role"
                    name="role"
                    class="user-form-control"
                    required
                >

                    <option
                        value="siswa"
                        {{ old('role', $user->role) === 'siswa' ? 'selected' : '' }}
                    >
                        Siswa
                    </option>

                    <option
                        value="operator"
                        {{ old('role', $user->role) === 'operator' ? 'selected' : '' }}
                    >
                        Operator
                    </option>

                    <option
                        value="admin"
                        {{ old('role', $user->role) === 'admin' ? 'selected' : '' }}
                    >
                        Admin
                    </option>

                </select>

                @error('role')

                    <div class="user-error">
                        {{ $message }}
                    </div>

                @enderror

            </div>


            {{-- STATUS --}}

            <div class="user-form-group">

                <label for="status">
                    Status Akun
                </label>

                <select
                    id="status"
                    name="status"
                    class="user-form-control"
                    required
                >

                    <option
                        value="aktif"
                        {{ old('status', $user->status) === 'aktif' ? 'selected' : '' }}
                    >
                        Aktif
                    </option>

                    <option
                        value="nonaktif"
                        {{ old('status', $user->status) === 'nonaktif' ? 'selected' : '' }}
                    >
                        Nonaktif
                    </option>

                </select>

                @error('status')

                    <div class="user-error">
                        {{ $message }}
                    </div>

                @enderror

            </div>


            {{-- BUTTON --}}

            <div class="user-form-actions">

                <button
                    type="submit"
                    class="user-btn user-btn-primary"
                >
                    Simpan Perubahan
                </button>


                <a
                    href="{{ route('admin.users.index') }}"
                    class="user-btn user-btn-secondary"
                >
                    Batal
                </a>

            </div>

        </form>

    </div>

</div>

@endsection
