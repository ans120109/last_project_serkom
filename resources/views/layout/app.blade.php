<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        @yield('title', 'SMA Cendekia Nusantara')
    </title>

    {{-- CSS UTAMA --}}
    <link rel="stylesheet" href="{{ asset('asset/css/style.css') }}">

    @stack('styles')

</head>


<body>

    {{-- ================================
         NAVBAR
    ================================= --}}

    <nav class="navbar">

        <div class="logo">
            SMA Cendekia Nusantara
        </div>


        <ul class="nav-menu">

            {{-- Profil --}}
            <li>
                <a href="{{ route('profile') }}" class="{{ request()->routeIs('profile') ? 'active' : '' }}">
                    Profil
                </a>
            </li>


            {{-- Berita --}}
            <li>
                <a href="{{ route('berita') }}" class="{{ request()->routeIs('berita*') ? 'active' : '' }}">
                    Berita & Pengumuman
                </a>
            </li>


            {{-- Akademik --}}
            <li>
                <a href="{{ route('akademik') }}" class="{{ request()->routeIs('akademik') ? 'active' : '' }}">
                    Akademik
                </a>
            </li>


            {{-- Ekstrakurikuler --}}
            <li>
                <a href="{{ route('ekstrakurikuler.index') }}"
                    class="{{ request()->routeIs('ekstrakurikuler.*') ? 'active' : '' }}">
                    Ekstrakurikuler
                </a>
            </li>


            {{-- Profile Sekolah --}}
            <li>
                <a href="{{ route('profile-sekolah') }}"
                    class="{{ request()->routeIs('profile-sekolah') ? 'active' : '' }}">
                    Profile Sekolah
                </a>
            </li>


            {{-- Data Siswa & Guru --}}
            <li>
                <a href="#">
                    Data Siswa & Guru
                </a>
            </li>


            @auth

                {{-- Data User --}}
                <li>
                    <a href="{{ route('admin.users.index') }}"
                        class="{{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                        Data User
                    </a>
                </li>


                {{-- User --}}
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
                {{-- Login --}}
                <li>
                    <a href="{{ route('login') }}">
                        Masuk Guru / Admin
                    </a>
                </li>

            @endauth

        </ul>

    </nav>



    {{-- ================================
         CONTENT
    ================================= --}}

    <main class="content">

        <div class="container">

            @yield('content')

        </div>

    </main>



    {{-- ================================
         FOOTER
    ================================= --}}

    <footer class="footer">

        <div class="container">

            <h3>
                SMA Cendekia Nusantara
            </h3>


            <div class="footer-contact">


                {{-- Alamat --}}
                <div class="contact-item">

                    <span>📍</span>

                    <div>

                        <strong>
                            Alamat
                        </strong>

                        <p>
                            Jl. Pendidikan Raya No. 45,
                            Tasikmalaya, Jawa Barat 46113
                        </p>

                    </div>

                </div>



                {{-- Telepon --}}
                <div class="contact-item">

                    <span>☎️</span>

                    <div>

                        <strong>
                            Telepon
                        </strong>

                        <p>
                            (0265) 555-0123
                        </p>

                    </div>

                </div>



                {{-- Email --}}
                <div class="contact-item">

                    <span>✉️</span>

                    <div>

                        <strong>
                            Email
                        </strong>

                        <p>
                            tu@cendekianusantara.sch.id
                        </p>

                    </div>

                </div>



                {{-- Jam Pelayanan --}}
                <div class="contact-item">

                    <span>🕐</span>

                    <div>

                        <strong>
                            Jam Pelayanan
                        </strong>

                        <p>
                            Senin–Jumat, 07.00–15.00 WIB
                        </p>

                    </div>

                </div>


            </div>


            <div class="footer-bottom">

                © 2026 SMA Cendekia Nusantara

            </div>

        </div>

    </footer>


    @stack('scripts')

</body>

</html>
