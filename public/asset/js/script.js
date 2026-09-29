// =====================================================
// SCRIPT.JS
// WEBSITE SEKOLAH - LARAVEL
// =====================================================

document.addEventListener("DOMContentLoaded", function () {

    // =================================================
    // NAVBAR MOBILE
    // =================================================

    const menuButton = document.querySelector(".menu-button");
    const navMenu = document.querySelector(".nav-menu");

    if (menuButton && navMenu) {

        menuButton.addEventListener("click", function () {
            navMenu.classList.toggle("active");
        });

    }


    // =================================================
    // TAHUN OTOMATIS
    // =================================================

    const yearElements = document.querySelectorAll(".current-year");

    yearElements.forEach(function (element) {
        element.textContent = new Date().getFullYear();
    });


    // =================================================
    // REGISTER
    // =================================================
    // Bagian ini hanya melakukan validasi.
    // Data register tetap dikirim ke Laravel.
    // =================================================

    const registerForm = document.getElementById("registerForm");

    if (registerForm) {

        registerForm.addEventListener("submit", function (event) {

            const nama = document.getElementById("nama");
            const email = document.getElementById("email");
            const password = document.getElementById("password");
            const konfirmasi = document.getElementById("konfirmasi");


            // Pastikan semua input tersedia
            if (
                !nama ||
                !email ||
                !password ||
                !konfirmasi
            ) {
                return;
            }


            // Hapus spasi pada nama dan email
            nama.value = nama.value.trim();
            email.value = email.value.trim();


            // Cek nama
            if (nama.value === "") {

                event.preventDefault();

                alert("Nama lengkap harus diisi.");

                nama.focus();

                return;
            }


            // Cek email
            if (email.value === "") {

                event.preventDefault();

                alert("Email harus diisi.");

                email.focus();

                return;
            }


            // Cek password
            if (password.value.length < 6) {

                event.preventDefault();

                alert("Password minimal 6 karakter.");

                password.focus();

                return;
            }


            // Cek konfirmasi password
            if (password.value !== konfirmasi.value) {

                event.preventDefault();

                alert("Konfirmasi password tidak sama.");

                konfirmasi.focus();

                return;
            }

            // Jika semua benar,
            // form akan diteruskan ke Laravel.
        });

    }


    // =================================================
    // LOGIN
    // =================================================
    //
    // PENTING:
    // Login TIDAK menggunakan localStorage.
    //
    // Form login akan dikirim ke:
    // POST /login
    //
    // Kemudian LoginController akan menjalankan:
    // Auth::attempt()
    //
    // =================================================

    const loginForm = document.getElementById("loginForm");

    if (loginForm) {

        loginForm.addEventListener("submit", function (event) {

            const email = document.getElementById("email");
            const password = document.getElementById("password");


            if (!email || !password) {
                return;
            }


            email.value = email.value.trim();


            // Cek email
            if (email.value === "") {

                event.preventDefault();

                alert("Email harus diisi.");

                email.focus();

                return;
            }


            // Cek password
            if (password.value === "") {

                event.preventDefault();

                alert("Password harus diisi.");

                password.focus();

                return;
            }


            // =================================================
            // JANGAN menggunakan:
            //
            // event.preventDefault();
            // localStorage.setItem("isLogin", "true");
            // window.location.href = "/profile";
            //
            // Karena login harus diproses oleh Laravel.
            // =================================================

        });

    }


    // =================================================
    // LOGOUT
    // =================================================
    //
    // Logout juga diproses oleh Laravel.
    // =================================================

    const logoutButtons =
        document.querySelectorAll(".logout-button");


    logoutButtons.forEach(function (button) {

        button.addEventListener("click", function (event) {

            const konfirmasi = confirm(
                "Apakah kamu yakin ingin logout?"
            );


            if (!konfirmasi) {

                event.preventDefault();

            }

        });

    });


    // =================================================
    // PENCARIAN BERITA
    // =================================================

    const searchBerita =
        document.getElementById("searchBerita");

    const beritaItems =
        document.querySelectorAll(".berita-item");


    if (searchBerita) {

        searchBerita.addEventListener("input", function () {

            const keyword =
                this.value.toLowerCase().trim();


            beritaItems.forEach(function (item) {

                const text =
                    item.textContent.toLowerCase();


                if (text.includes(keyword)) {

                    item.style.display = "";

                } else {

                    item.style.display = "none";

                }

            });

        });

    }


    // =================================================
    // FORM KONTAK
    // =================================================

    const contactForm =
        document.getElementById("contactForm");


    if (contactForm) {

        contactForm.addEventListener("submit", function (event) {

            const nama =
                document.getElementById("nama");

            const email =
                document.getElementById("email");

            const pesan =
                document.getElementById("pesan");


            if (!nama || !email || !pesan) {
                return;
            }


            nama.value = nama.value.trim();
            email.value = email.value.trim();
            pesan.value = pesan.value.trim();


            // Validasi nama
            if (nama.value === "") {

                event.preventDefault();

                alert("Nama harus diisi.");

                nama.focus();

                return;
            }


            // Validasi email
            if (email.value === "") {

                event.preventDefault();

                alert("Email harus diisi.");

                email.focus();

                return;
            }


            // Validasi pesan
            if (pesan.value === "") {

                event.preventDefault();

                alert("Pesan harus diisi.");

                pesan.focus();

                return;
            }

        });

    }


    // =================================================
    // TOMBOL KEMBALI
    // =================================================

    const backButtons =
        document.querySelectorAll(".btn-back");


    backButtons.forEach(function (button) {

        button.addEventListener("click", function () {

            window.history.back();

        });

    });


    // =================================================
    // KONFIRMASI HAPUS
    // =================================================

    const deleteButtons =
        document.querySelectorAll(".btn-delete");


    deleteButtons.forEach(function (button) {

        button.addEventListener("click", function (event) {

            const yakin = confirm(
                "Apakah kamu yakin ingin menghapus data ini?"
            );


            if (!yakin) {

                event.preventDefault();

            }

        });

    });


    // =================================================
    // PASSWORD TOGGLE
    // =================================================

    const passwordToggle =
        document.querySelector(".password-toggle");

    const passwordInput =
        document.querySelector(".password-input");


    if (passwordToggle && passwordInput) {

        passwordToggle.addEventListener("click", function () {

            if (passwordInput.type === "password") {

                passwordInput.type = "text";

                passwordToggle.textContent = "Sembunyikan";

            } else {

                passwordInput.type = "password";

                passwordToggle.textContent = "Tampilkan";

            }

        });

    }

});
