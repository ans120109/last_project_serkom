@extends('layout.app')

@section('title', 'Detail User')

@section('content')

<div class="user-edit-page">

    <div class="user-page-header">

        <h1>
            Detail Data User
        </h1>

        <p>
            Informasi lengkap akun pengguna.
        </p>

    </div>


    <div class="user-edit-card">

        {{-- NAMA --}}

        <div class="user-form-group">

            <label>
                Nama Lengkap
            </label>

            <div class="user-form-control">
                {{ $user->name }}
            </div>

        </div>


        {{-- USERNAME --}}

        <div class="user-form-group">

            <label>
                Username
            </label>

            <div class="user-form-control">
                {{ $user->username }}
            </div>

        </div>


        {{-- ROLE --}}

        <div class="user-form-group">

            <label>
                Role
            </label>

            <div class="user-form-control">
                {{ ucfirst($user->role) }}
            </div>

        </div>


        {{-- STATUS --}}

        <div class="user-form-group">

            <label>
                Status Akun
            </label>

            <div class="user-form-control">
                {{ $user->isInactive() ? 'Nonaktif' : 'Aktif' }}
            </div>

        </div>


        {{-- TERAKHIR AKTIF --}}

        <div class="user-form-group">

            <label>
                Terakhir Aktif
            </label>

            <div class="user-form-control">
                @if ($user->last_active_at)
                    {{ $user->last_active_at->translatedFormat('d F Y, H:i') }}
                    ({{ $user->last_active_at->diffForHumans() }})
                @else
                    Belum tercatat
                @endif
            </div>

        </div>


        {{-- TERDAFTAR --}}

        <div class="user-form-group">

            <label>
                Terdaftar Sejak
            </label>

            <div class="user-form-control">
                {{ $user->created_at?->translatedFormat('d F Y, H:i') ?? '-' }}
            </div>

        </div>


        {{-- BUTTON --}}

        <div class="user-form-actions">

            <a
                href="{{ route('admin.users.edit', $user) }}"
                class="user-btn user-btn-primary"
            >
                Edit
            </a>


            <a
                href="{{ route('admin.users.index') }}"
                class="user-btn user-btn-secondary"
            >
                Kembali
            </a>

        </div>

    </div>

</div>

@endsection
