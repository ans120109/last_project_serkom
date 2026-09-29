<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f7f5ef;
            color: #111;
            line-height: 1.6;
        }


        /* ================================
        CONTAINER
        ================================ */

        .container {
            width: 100%;
            max-width: 870px;
            margin: 0 auto;
        }


        /* ================================
        NAVBAR
        ================================ */

        .navbar {
            width: 100%;
            min-height: 72px;
            padding: 0 6%;
            background: #0d1b3e;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-sizing: border-box;
        }

        /* NAVBAR */
        .navbar {
            width: 100%;
            height: 72px;
            padding: 0 6%;
            background: #0d1b3e;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-sizing: border-box;
        }

        /* LOGO */
        .logo {
            color: #d99a22;
            font-size: 20px;
            font-weight: bold;
            white-space: nowrap;
        }

        /* MENU */
        .nav-menu {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 22px;
            list-style: none;
            margin: 0;
            padding: 0;
            white-space: nowrap;
        }

        /* ITEM MENU */
        .nav-menu li {
            display: flex;
            align-items: center;
            list-style: none;
        }

        /* LINK MENU */
        .nav-menu li a {
            color: #ffffff;
            text-decoration: none;
            font-size: 14px;
            white-space: nowrap;
        }

        /* HOVER */
        .nav-menu li a:hover,
        .nav-menu li a.active {
            color: #d99a22;
        }


        /* =========================
        ADMIN SEKOLAH
        ========================= */

        .nav-user {
            display: inline-flex !important;
            flex-direction: row !important;
            align-items: center !important;
            justify-content: center !important;

            gap: 8px;

            height: 38px;
            padding: 3px 12px 3px 5px;

            border: 1px solid #6c7895;
            border-radius: 22px;

            background: transparent;

            color: #ffffff !important;
            text-decoration: none;

            white-space: nowrap !important;
            box-sizing: border-box;
        }

        /* Lingkaran A */
        .nav-user-avatar {
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;

            width: 28px;
            height: 28px;
            min-width: 28px;

            border-radius: 50%;

            background: #d99a22;
            color: #203e0d !important;

            font-size: 14px;
            font-weight: bold;

            flex-shrink: 0;
        }

        /* Nama Admin Sekolah */
        .nav-user-name {
            display: inline-block !important;

            color: #ffffff !important;

            font-size: 14px;
            font-weight: 500;

            white-space: nowrap !important;
            line-height: normal;

            flex-shrink: 0;
        }


        /* ================================
        CONTENT
        ================================ */

        .content {
            min-height: calc(100vh - 76px);

            padding: 40px 20px 70px;
        }


        /* Judul halaman */

        .page-title {
            font-size: 30px;
            font-weight: 400;

            margin-bottom: 5px;
        }


        /* Subtitle */

        .page-subtitle {
            color: #6f7782;
            font-size: 16px;

            margin-bottom: 25px;
        }


        /* Garis */

        .divider {
            border: 0;
            border-top: 1px solid #ddd;

            margin-bottom: 30px;
        }


        /* ================================
        CARD
        ================================ */

        .card {
            background: white;

            border-radius: 7px;

            padding: 20px;

            margin-bottom: 16px;

            box-shadow: 0 4px 14px rgba(0, 0, 0, 0.07);
        }


        /* Judul card */

        .card h2 {
            display: flex;
            align-items: center;

            font-size: 23px;
            font-weight: 700;

            margin-bottom: 8px;

            color: #111;
        }


        /* Icon lingkaran */

        .academic-icon {
            width: 45px;
            height: 45px;

            background: #d99a22;

            border-radius: 50%;

            display: inline-flex;
            align-items: center;
            justify-content: center;

            font-size: 22px;

            margin-right: 12px;

            flex-shrink: 0;
        }


        /* Isi card */

        .muted {
            color: #68717d;
            font-size: 15px;
        }


        /* ================================
        FOOTER
        ================================ */

        .footer {
            background: #0d1b3e;
            color: white;
            padding: 40px 20px 20px;
        }

        .footer .container {
            max-width: 870px;
        }


        /* Judul sekolah */

        .footer h3 {
            font-size: 18px;
            margin-bottom: 25px;
            color: white;
        }


        /* ================================
        INFORMASI KONTAK
        ================================ */

        .footer-contact {
            display: grid;

            grid-template-columns: 1fr 1fr;

            column-gap: 60px;
            row-gap: 22px;
        }


        /* Item kontak */

        .contact-item {
            display: flex;
            align-items: flex-start;

            gap: 12px;

            min-width: 0;
        }


        /* Icon */

        .contact-icon {
            width: 38px;
            height: 38px;

            background: #d99a22;

            border-radius: 50%;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 18px;

            flex-shrink: 0;
        }


        /* Bagian teks */

        .contact-item div {
            min-width: 0;
        }


        /* Judul */

        .contact-item strong {
            display: block;

            font-size: 14px;

            margin-bottom: 3px;

            color: white;
        }


        /* Isi */

        .contact-item p {
            color: #d4d8df;

            font-size: 14px;

            margin: 0;

            line-height: 1.5;
        }


        /* ================================
        FOOTER BOTTOM
        ================================ */

        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.2);

            margin-top: 30px;

            padding-top: 15px;

            color: #cbd0d8;

            font-size: 13px;
        }


        /* ================================
        FOOTER RESPONSIVE
        ================================ */

        @media (max-width: 600px) {

            .footer {
                padding: 30px 15px 20px;
            }

            .footer-contact {
                grid-template-columns: 1fr;
                gap: 18px;
            }
        }


        /* ================================
        RESPONSIVE - TABLET
        ================================ */

        @media (max-width: 1100px) {

            .navbar {
                padding-left: 30px;
                padding-right: 30px;
                gap: 20px;
            }

            .nav-menu {
                gap: 16px;
            }

            .nav-menu a {
                font-size: 13px;
            }

            .logo {
                font-size: 20px;
            }
        }


        /* ================================
        RESPONSIVE - LAYAR KECIL
        ================================ */

        @media (max-width: 850px) {

            .navbar {
                min-height: auto;

                padding: 18px 25px;

                flex-direction: column;

                align-items: center;

                gap: 15px;
            }

            .logo {
                font-size: 21px;

                text-align: center;

                white-space: normal;
            }

            .nav-menu {
                width: 100%;

                justify-content: center;

                flex-wrap: wrap;

                gap: 12px 20px;
            }

            .nav-menu a {
                font-size: 14px;
            }

            .content {
                padding-top: 30px;
            }
        }


        /* ================================
        RESPONSIVE - HP
        ================================ */

        @media (max-width: 600px) {

            .navbar {
                padding: 16px 15px;
            }

            .logo {
                font-size: 20px;
            }

            .nav-menu {
                flex-direction: column;

                align-items: center;

                gap: 12px;
            }

            .nav-menu li {
                width: 100%;
                text-align: center;
            }

            .nav-menu a {
                display: inline-block;
            }

            .btn-login {
                margin-top: 3px;
            }


            /* Content */

            .content {
                padding: 30px 15px 50px;
            }

            .page-title {
                font-size: 27px;
            }

            .page-subtitle {
                font-size: 15px;
            }


            /* Card */

            .card {
                padding: 18px;
            }

            .card h2 {
                font-size: 20px;
            }

            .academic-icon {
                width: 42px;
                height: 42px;

                font-size: 20px;

                margin-right: 10px;
            }

            .muted {
                font-size: 14px;
            }


            /* Footer */

            .footer {
                padding: 30px 15px 20px;
            }
        }
    </style>
</head>
    <body>
        <nav class="navbar">

            <div class="logo">
                SMA Cendekia Nusantara
            </div>

            <ul class="nav-menu">

                <li>
                    <a href="{{ route('profile') }}">
                        Pengguna
                    </a>
                </li>

                <li>
                    <a href="{{ route('berita') }}">
                        Berita & Pengumuman
                    </a>
                </li>

                <li>
                    <a href="{{ route('akademik') }}" class="active">Akademik</a>
                </li>

                <li>
                    <a href="{{ route('ekstrakurikuler.index') }}">
                        Ekstrakurikuler
                    </a>
                </li>

                <li>
                    <a href="{{ route('profile-sekolah') }}">
                        Profile Sekolah
                    </a>
                </li>

                <li>
                    <a href="{{route('siswa-guru.create')}}">
                        Data siswa & Guru
                    </a>
                </li>


                @auth
                    <li>
                        <a href="{{ route('admin.users.index') }}">
                            Data User
                        </a>
                    </li>

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
                        <a class="btn-login" href="{{ route('login') }}">
                            Masuk Guru / Admin
                        </a>
                    </li>
                @endauth

            </ul>

        </nav>

        <main class="content">
            <div class="container">
                <h1 class="page-title">Akademik</h1>
                <p class="page-subtitle">Program pembelajaran dan informasi akademik sekolah.</p>
                <hr class="divider">

                <div class="card">
                    <h2><span class="academic-icon">📚</span>Program Akademik</h2>
                    <p class="muted">Pembelajaran MIPA, IPS, Bahasa, komputer, riset ilmiah, dan pengembangan karakter
                        siswa.</p>
                </div>

                <div class="card">
                    <h2><span class="academic-icon">🔬</span>Laboratorium</h2>
                    <p class="muted">Fasilitas laboratorium sains dan komputer untuk mendukung pembelajaran berbasis
                        praktik.</p>
                </div>

                <div class="card">
                    <h2><span class="academic-icon">📅</span>Jadwal Pelajaran</h2>
                    <p class="muted">Jadwal pelajaran setiap kelas dikelola oleh operator dan dapat diperoleh melalui tata
                        usaha.</p>
                </div>

                <div class="card">
                    <h2><span class="academic-icon">🏆</span>Kegiatan & Prestasi</h2>
                    <p class="muted">Kegiatan olimpiade, ekstrakurikuler, lomba, serta berbagai program pengembangan bakat
                        siswa.</p>
                </div>
            </div>
        </main>

        <footer class="footer">
            <div class="container">

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
                    © 2026 SMA Cendekia Nusantara
                </div>

            </div>
        </footer>

        <script>
       // =====================================
        // NAVBAR MOBILE
        // =====================================

        const menuButton = document.querySelector(".menu-button");
        const navMenu = document.querySelector(".nav-menu");

        if (menuButton && navMenu) {
            menuButton.addEventListener("click", function () {
                navMenu.classList.toggle("active");
            });
        }


        // =====================================
        // TAHUN OTOMATIS
        // =====================================

        document.querySelectorAll(".current-year").forEach(function (element) {
            element.textContent = new Date().getFullYear();
        });


        // =====================================
        // REGISTER
        // =====================================

        const registerForm = document.getElementById("registerForm");

        if (registerForm) {

            registerForm.addEventListener("submit", function (event) {

                event.preventDefault();

                const nama = document.getElementById("nama").value.trim();
                const email = document.getElementById("email").value.trim();
                const password = document.getElementById("password").value;
                const konfirmasi = document.getElementById("konfirmasi").value;

                if (nama === "" || email === "" || password === "" || konfirmasi === "") {
                    alert("Semua data harus diisi.");
                    return;
                }

                if (password.length < 6) {
                    alert("Password minimal 6 karakter.");
                    return;
                }

                if (password !== konfirmasi) {
                    alert("Konfirmasi password tidak sama.");
                    return;
                }

                const user = {
                    nama: nama,
                    email: email,
                    password: password
                };

                localStorage.setItem("userSekolah", JSON.stringify(user));

                alert("Registrasi berhasil!");

                window.location.href = "login.html";
            });
        }


        // =====================================
        // LOGIN
        // =====================================

        const loginForm = document.getElementById("loginForm");

        if (loginForm) {

            loginForm.addEventListener("submit", function (event) {

                event.preventDefault();

                const email = document.getElementById("email").value.trim();
                const password = document.getElementById("password").value;

                const savedUser = localStorage.getItem("userSekolah");

                if (!savedUser) {
                    alert("Akun belum tersedia. Silakan register terlebih dahulu.");
                    return;
                }

                const user = JSON.parse(savedUser);

                if (email === user.email && password === user.password) {

                    localStorage.setItem("isLogin", "true");

                    alert("Login berhasil. Selamat datang, " + user.nama + "!");

                    window.location.href = "profile.html";

                } else {
                    alert("Email atau password salah.");
                }
            });
        }


        // =====================================
        // LOGOUT
        // =====================================

        const logoutButton = document.getElementById("logoutButton");

        if (logoutButton) {

            logoutButton.addEventListener("click", function () {

                localStorage.removeItem("isLogin");

                alert("Anda berhasil logout.");

                window.location.href = "login.html";
            });
        }


        // =====================================
        // PROTEKSI HALAMAN
        // =====================================

        const protectedPages = [
            "profile.html",
            "akademik.html"
        ];

        const currentPage = window.location.pathname.split("/").pop();

        if (protectedPages.includes(currentPage)) {

            const isLogin = localStorage.getItem("isLogin");

            if (isLogin !== "true") {
                alert("Silakan login terlebih dahulu.");
                window.location.href = "login.html";
            }
        }


        // =====================================
        // NAMA USER
        // =====================================

        const userNameElements = document.querySelectorAll(".user-name");

        const savedUser = localStorage.getItem("userSekolah");

        if (savedUser) {

            const user = JSON.parse(savedUser);

            userNameElements.forEach(function (element) {
                element.textContent = user.nama;
            });
        }


        // =====================================
        // PENCARIAN BERITA
        // =====================================

        const searchBerita = document.getElementById("searchBerita");
        const beritaItems = document.querySelectorAll(".berita-item");

        if (searchBerita) {

            searchBerita.addEventListener("input", function () {

                const keyword = this.value.toLowerCase();

                beritaItems.forEach(function (item) {

                    const text = item.textContent.toLowerCase();

                    if (text.includes(keyword)) {
                        item.style.display = "block";
                    } else {
                        item.style.display = "none";
                    }
                });
            });
        }


        // =====================================
        // FORM KONTAK
        // =====================================

        const contactForm = document.getElementById("contactForm");

        if (contactForm) {

            contactForm.addEventListener("submit", function (event) {

                event.preventDefault();

                const nama = document.getElementById("nama").value.trim();
                const email = document.getElementById("email").value.trim();
                const pesan = document.getElementById("pesan").value.trim();

                if (nama === "" || email === "" || pesan === "") {
                    alert("Silakan lengkapi semua data.");
                    return;
                }

                alert("Pesan berhasil dikirim. Terima kasih, " + nama + "!");

                contactForm.reset();
            });
        }
    </script>
    </body>
</html>
