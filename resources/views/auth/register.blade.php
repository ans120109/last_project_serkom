<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Register - Panel Sekolah
    </title>

    {{-- CSS UTAMA --}}
    <link
        rel="stylesheet"
        href="{{ asset('asset/css/style.css') }}"
    >

</head>


<body>


    <div class="form-page">


        <div class="form-box">


            {{-- LOGO --}}

            <div class="form-logo">

                <div class="logo-icon">
                    🎓
                </div>

            </div>


            {{-- JUDUL --}}

            <h1>
                Daftar Akun
            </h1>


            <p class="description">
                Buat akun untuk mengakses panel sekolah
            </p>


            {{-- ERROR VALIDASI --}}

            @if ($errors->any())

                <div class="alert alert-danger">

                    <strong>
                        Terdapat kesalahan:
                    </strong>

                    <ul>

                        @foreach ($errors->all() as $error)

                            <li>
                                {{ $error }}
                            </li>

                        @endforeach

                    </ul>

                </div>

            @endif


            {{-- PESAN SUCCESS --}}

            @if (session('success'))

                <div class="alert alert-success">

                    {{ session('success') }}

                </div>

            @endif


            {{-- FORM REGISTER --}}

            <form
                id="registerForm"
                method="POST"
                action="{{ route('register.process') }}"
            >

                @csrf


                {{-- NAMA --}}

                <div class="form-group">

                    <label for="name">
                        Nama Lengkap
                    </label>

                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="{{ old('name') }}"
                        placeholder="Masukkan nama lengkap"
                        required
                        autocomplete="name"
                    >

                </div>


                {{-- USERNAME --}}

                <div class="form-group">

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


                {{-- ROLE --}}

                <div class="form-group">

                    <label for="role">
                        Role
                    </label>

                    <select
                        id="role"
                        name="role"
                        required
                    >

                        <option value="">
                            -- Pilih Role --
                        </option>

                        <option
                            value="siswa"
                            {{ old('role') == 'siswa' ? 'selected' : '' }}
                        >
                            Siswa
                        </option>

                        <option
                            value="operator"
                            {{ old('role') == 'operator' ? 'selected' : '' }}
                        >
                            Operator
                        </option>

                        <option
                            value="admin"
                            {{ old('role') == 'admin' ? 'selected' : '' }}
                        >
                            Admin
                        </option>

                    </select>

                </div>


                {{-- PASSWORD --}}

                <div class="form-group">

                    <label for="password">
                        Password
                    </label>

                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Minimal 8 karakter"
                        required
                        autocomplete="new-password"
                    >

                </div>


                {{-- KONFIRMASI PASSWORD --}}

                <div class="form-group">

                    <label for="password_confirmation">
                        Konfirmasi Password
                    </label>

                    <input
                        type="password"
                        id="password_confirmation"
                        name="password_confirmation"
                        placeholder="Ulangi password"
                        required
                        autocomplete="new-password"
                    >

                </div>


                {{-- BUTTON REGISTER --}}

                <button
                    type="submit"
                    class="register-button"
                >
                    Daftar
                </button>


            </form>


            {{-- LOGIN --}}

            <div class="form-link">

                <span>
                    Sudah punya akun?
                </span>

                <a href="{{ route('login') }}">
                    Login
                </a>

            </div>


            {{-- KEMBALI --}}

            <div class="form-link back-link">

                <a href="{{ route('akademik') }}">
                    ← Kembali ke halaman sekolah
                </a>

            </div>


        </div>


    </div>


    {{-- JAVASCRIPT --}}

    <script src="{{ asset('asset/js/script.js') }}"></script>

</body>

</html>
