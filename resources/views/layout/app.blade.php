<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'SMA Cendekia Nusantara')</title>

    <link rel="stylesheet" href="{{ asset('asset/css/style.css') }}">
    @stack('styles')
</head>
<body>

    {{-- NAVBAR --}}
    <nav class="navbar-custom">
        <div class="nav-inner">

            <a href="{{ url('/') }}" class="nav-brand">
                SMA Cendekia Nusantara
            </a>

            <ul class="nav-menu">

                <li>
                    <a href="{{ route('profil') }}"
                       class="{{ request()->routeIs('profil') ? 'active' : '' }}">
                        Profil
                    </a>
                </li>

                <li>
                    <a href="{{ route('berita.index') }}"
                       class="{{ request()->routeIs('berita.*') ? 'active' : '' }}">
                        Berita & Pengumuman
                    </a>
                </li>

                <li>
                    <a href="{{ route('galeri.index') }}"
                       class="{{ request()->routeIs('galeri.*') ? 'active' : '' }}">
                        Galeri
                    </a>
                </li>

                <li>
                    <a href="{{ route('akademik') }}"
                       class="{{ request()->routeIs('akademik') ? 'active' : '' }}">
                        Akademik
                    </a>
                </li>

                <li>
                    <a href="{{ route('ekstrakurikuler.index') }}"
                       class="{{ request()->routeIs('ekstrakurikuler.*') ? 'active' : '' }}">
                        Ekstrakurikuler
                    </a>
                </li>

                <li>
                    <a href="{{ route('profile-sekolah') }}"
                       class="{{ request()->routeIs('profile-sekolah') ? 'active' : '' }}">
                        Profile Sekolah
                    </a>
                </li>

                <li>
                    <a href="{{ route('siswa-guru.create') }}"
                       class="{{ request()->routeIs('siswa-guru.*') ? 'active' : '' }}">
                        Siswa & Guru
                    </a>
                </li>

                @auth
                   @if (Auth::user()->role === 'admin' || Auth::user()->role === 'operator')
                        <li>
                            <a href="{{ route('admin.users.index') }}"
                            class="{{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                                Data User
                            </a>
                        </li>
                    @endif

                    <li>
                        <a href="{{ route('profile') }}" class="nav-user">
                            <span class="nav-user-avatar">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </span>
                            <span class="nav-user-name">
                                {{ Auth::user()->name }}
                            </span>
                        </a>
                    </li>
                    @else
                        <li>
                            <a href="{{ route('login') }}" class="btn-login">
                                Masuk Guru / Admin
                            </a>
                        </li>
                @endauth

            </ul>

        </div>
    </nav>

    {{-- KONTEN --}}
    <main>
        @yield('content')
    </main>

    {{-- FOOTER --}}
    <footer class="footer-custom">
        <div class="footer-inner">
            <h3>SMA Cendekia Nusantara</h3>

            <div class="footer-contact">
                <div class="contact-item">
                    <span>📍</span>
                    <div>
                        <strong>Alamat</strong>
                        <p>Jl. Pendidikan Raya No. 45, Tasikmalaya, Jawa Barat 46113</p>
                    </div>
                </div>

                <div class="contact-item">
                    <span>☎️</span>
                    <div>
                        <strong>Telepon</strong>
                        <p>(0265) 555-0123</p>
                    </div>
                </div>

                <div class="contact-item">
                    <span>✉️</span>
                    <div>
                        <strong>Email</strong>
                        <p>tu@cendekianusantara.sch.id</p>
                    </div>
                </div>

                <div class="contact-item">
                    <span>🕐</span>
                    <div>
                        <strong>Jam Pelayanan</strong>
                        <p>Senin–Jumat, 07.00–15.00 WIB</p>
                    </div>
                </div>
            </div>

            <div class="footer-bottom">
                &copy; {{ date('Y') }} SMA Cendekia Nusantara
            </div>
        </div>
    </footer>

    @stack('scripts')
</body>
</html>
