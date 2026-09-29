@extends('layout.app')

@section('title', 'Login')

@section('content')

<div class="login-page">

    <div class="login-card">

        {{-- LOGO --}}
        <div class="login-logo">
            🏫
        </div>

        {{-- JUDUL --}}
        <h1>Login</h1>

        <p class="login-subtitle">
            Masuk ke Panel Sekolah
        </p>


        {{-- PESAN ERROR --}}
        @if(session('error'))
            <div class="login-alert login-alert-error">
                {{ session('error') }}
            </div>
        @endif


        @if(session('success'))
            <div class="login-alert login-alert-success">
                {{ session('success') }}
            </div>
        @endif


        @if($errors->any())
            <div class="login-alert login-alert-error">
                {{ $errors->first() }}
            </div>
        @endif


        {{-- FORM LOGIN --}}
        <form
            action="{{ route('login.process') }}"
            method="POST"
        >

            @csrf


            {{-- USERNAME --}}
            <div class="login-form-group">

                <label for="username">
                    Username
                </label>

                <input
                    type="text"
                    id="username"
                    name="username"
                    value="{{ old('username') }}"
                    placeholder="Masukkan username"
                    required
                    autocomplete="username"
                >

            </div>


            {{-- PASSWORD --}}
            <div class="login-form-group">

                <label for="password">
                    Kata Sandi
                </label>

                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Masukkan kata sandi"
                    required
                    autocomplete="current-password"
                >

            </div>


            {{-- BUTTON --}}
            <button
                type="submit"
                class="login-button"
            >
                Login
            </button>

        </form>


        {{-- REGISTER --}}
        <div class="login-register">

            Belum punya akun?

            <a href="{{ route('register') }}">
                Register
            </a>

        </div>


        {{-- KEMBALI --}}
        <a
            href="{{ url('/') }}"
            class="login-back"
        >
            ← Kembali ke halaman sekolah
        </a>

    </div>

</div>

@endsection
